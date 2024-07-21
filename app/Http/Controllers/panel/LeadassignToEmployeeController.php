<?php

namespace App\Http\Controllers\panel;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\LeadassignToEmployee;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\ProjectEntryAppendData;
use Maatwebsite\Excel\HeadingRowImport;
use App\Models\EntryLevelLeadManageModel;
use App\Models\EmployeeRegistrationMaster;

class LeadassignToEmployeeController extends Controller
{
    //

    public function index()
    {
        $employeesdropdown = EmployeeRegistrationMaster::with('employee_data')->get();

        // Get unique employee IDs from LeadassignToEmployee
        $employeeIds = LeadassignToEmployee::pluck('employee_id')->unique()->toArray();

        // Retrieve EmployeeRegistrationMaster records based on the retrieved employee IDs
        $employees = EmployeeRegistrationMaster::whereIn('id', $employeeIds)->get();

        // Count the occurrences of each employee ID in LeadassignToEmployee
        $employeesWithCounts = LeadassignToEmployee::select('leadassign_to_employee.employee_id', DB::raw('date(leadassign_to_employee.created_at) as date'), DB::raw('count(*) as count'), 'erm.name', 'erm.email', 'erm.contact_number', 'erm.city', 'erm.address')
            ->join('employee_registration_master as erm', 'leadassign_to_employee.employee_id', '=', 'erm.id')
            ->groupBy(['leadassign_to_employee.employee_id', 'date'])
            ->get();
        //   dd($employeesWithCounts);


        return view('panel.crm_leads_mamgement', compact('employeesWithCounts', 'employeesdropdown'));
    }
    public function fetchLeadDetails(Request $request)
    {
        $leadDetails = LeadassignToEmployee::where('employee_id', $request->employeeId)
            ->whereDate('created_at', $request->dateId)
            ->get();

        return response()->json($leadDetails);
    }

    public function entrylevelformleadStore(Request $request)
    {
        $validatedData = $request->validate([
            // 'employee_id' => 'required|',
            'name' => 'required|',
            'email' => 'required|',
            'mobile' => 'required|',
            'whatsapp_no' => 'nullable|',
            'city_id' => 'required|',
            'address' => 'nullable|',
            'source_lead' => 'required|',
        ]);

        $entryLevelLead = new EntryLevelLeadManageModel();
        // $entryLevelLead->employee_id = $request->employee_id;
        $entryLevelLead->name = $request->name;
        $entryLevelLead->email = $request->email;
        $entryLevelLead->mobile = $request->mobile;
        $entryLevelLead->whatsapp_no = $request->whatsapp_no;
        $entryLevelLead->city_id = $request->city_id;
        $entryLevelLead->address = $request->address;
        $entryLevelLead->source_lead = $request->source_lead;
        $entryLevelLead->save();
        return redirect()->back()->with('success', 'Entry level lead  added successfully.');


    }


    public function fetchentrylevelformleadStore()
    {
        $city = City::all();
        $employee = EmployeeRegistrationMaster::all();
        $entryLevelLeads = EntryLevelLeadManageModel::all();
        return view('panel.entry_level_form_lead', compact('entryLevelLeads', 'city', 'employee'));
    }
    public function update_entry_level_lead(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'id' => 'required',


        ]);

        // Find the enquiry by ID
        $enquiry = EntryLevelLeadManageModel::find($request->id);
        if (!$enquiry) {
            return redirect()->back()->with('error', 'Employee not found.');
        }

        // Update the client status
        $enquiry->employee_id = $request->employee_id;
        $enquiry->save();

        // Redirect back to the route where you display the table
        return redirect()->back()->with('success', 'Lead assign successfully.');
    }

    public function import(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'file' => 'required|mimes:xlsx,xls,csv',
            'employee_id' => 'required|',
        ]);

        $file = $request->file('file');
        $employeeId = $request->input('employee_id');

        // Load the file using Laravel Excel
        $rows = Excel::toArray([], $file);

        // Process each row
        foreach ($rows[0] as $index => $row) {
            // Skip the header row
            if ($index == 0) {
                continue;
            }

            // Skip rows with empty required fields
            if (empty($row[1]) || empty($row[2]) || empty($row[3]) || empty($row[5]) || empty($row[6])) {
                continue;
            }

            // Insert the row into the database with the employee_id
            LeadassignToEmployee::create([
                'employee_id' => $employeeId, // Add the employee_id here
                'name' => $row[1],
                'email' => $row[2],
                'mobile' => $row[3],
                'whatsapp_no' => $row[4],
                'city' => $row[5],
                'address' => $row[6],
            ]);
        }

        return redirect()->back()->with('success', 'File imported successfully.');
    }
}