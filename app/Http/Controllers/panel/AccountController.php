<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\ExpenseIncome;
use Illuminate\Http\Request;
use App\Models\FirmRegistrationMaster;
use App\Models\InitialEnquiry;
use App\Models\EmiPaymentCollection;
use App\Models\OtherCharges;
use App\Models\OtherChargesForClient;
use Carbon\Carbon;

use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function exepence_entry()
    {
        return view('panel.expense_entry');
    }
    public function exepence_master()
    {
        return view('panel.expense_master');
    }
    public function income()
    {
        $firm = FirmRegistrationMaster::all();

        return view('panel.expense_income', compact('firm'));
    }

    public function expense_store(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request data
        $rules = [
            'bill_no' => 'required|string|max:255',
            'firm_id' => 'required|integer',
            'project_id' => 'required|integer',
            'plot_no' => 'required|integer',
            'income_category' => 'required|string|max:255',
            // 'client_id' => 'required|integer', 
            'bank_name' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'remarks' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'mode_of_payment' => 'required|string|max:255',
            'attach_proof' => 'required|file|mimes:jpg,png,pdf|max:2048', //
            'narration' => 'required|string|max:1000',
        ];

        // Create a validator instance
        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors());

            // Redirect back with validation errors and old input
        }

        // Handle file upload for 'attach_proof'
        if ($request->hasFile('attach_proof')) {
            $fileName = time() . '.' . $request->attach_proof->extension();
            $request->attach_proof->move(public_path('expense-entries'), $fileName);
        } else {
            $fileName = null;
        }
        // Insert data into the database
        $record = new ExpenseIncome();
        $record->bill_no = $request->bill_no;
        $record->firm_id = $request->firm_id;
        $record->project_id = $request->project_id;
        $record->plot_no = $request->plot_no;
        $record->income_category = $request->income_category;
        $record->client_id = $request->client_id;
        $record->bank_name = $request->bank_name;
        $record->amount = $request->amount;
        $record->remarks = $request->remarks;
        $record->emi_no = $request->emi_no ?? NULL;
        $record->other_charges_id = $request->other_charges_type ?? NULL;
        $record->mode_of_payment = $request->mode_of_payment;
        $record->attach_proof = $fileName;
        $record->narration = $request->narration;
        $record->save();
        if (isset($request->income_category) && $request->income_category == 'EMI') {
            EmiPaymentCollection::where('id', $request->emi_no)->update(['status' => 'paid', 'paid_amt' => $request->amount]);
        } else if (isset($request->income_category) && $request->income_category == 'Other') {
            OtherChargesForClient::where('id', $request->other_charges_type)->update(
                ['status' => 'paid']
            );
        }
        // Return a response, maybe redirect to a page with a success message
        return redirect()->back()->with('success', 'Record added successfully.');
    }

    public function get_sold_plot_details(Request $request)
    {
        $existingEnquiry = InitialEnquiry::where('project_id', $request->project_id)
            ->where('firm_id', $request->firm_id)
            ->where('plot_no', $request->plot_no)
            ->first();

        if ($existingEnquiry) {
            $totalemi = EmiPaymentCollection::select('emi_payments_collections.id', 'edop', 'inst_amt', 'status')
                ->where('initial_enquiry_id', $existingEnquiry->id)
                ->orderby('id', 'asc')->get();

            $today = Carbon::today();

            $plot_info = [
                'plot_no' => $existingEnquiry->plotnumber->plot_no,
                'total_cost' => $existingEnquiry->total_cost ?? 0,
                'paid_amount' => $totalemi->filter(function ($emi) {
                    return $emi->status === 'paid';
                })->sum('inst_amt'),
                'balance_amount' => round($totalemi->filter(function ($emi) {
                    return $emi->status === 'pending';
                })->sum('inst_amt')), // You can calculate this value if you have the logic for it
                'total_emi_count' => $totalemi->count(),
                'paid_emi' => $totalemi->filter(function ($emi) {
                    return $emi->status === 'paid';
                })->count(),
                'due_emi' => $totalemi->filter(function ($emi) use ($today) {
                    return Carbon::parse($emi->edop)->lt($today) && $emi->status === 'Pending';
                })->count(),
                'penalty' => 0, // Replace this with actual logic if needed
                'other_charges' => OtherChargesForClient::where('project_id', $request->project_id)
                    ->where('firm_id', $request->firm_id)
                    ->where('plot_id', $request->plot_no)->sum('amount'), // Replace this with actual logic if needed
            ];
        } else {
            $totalemi = [];
            $plot_info = [];
        }
        return response()->json(['total_emi' => $totalemi, 'plot_info' => $plot_info]);

    }

    public function get_sold_plot_other_charges(Request $request)
    {
        $other_charges = OtherChargesForClient::with('chargesname')
            ->where('project_id', $request->project_id)
            ->where('firm_id', $request->firm_id)
            ->where('plot_id', $request->plot_no)
            ->get();

        if ($other_charges) {

            return response()->json(['other_charges' => $other_charges]);
        } else {
            return response()->json(['other_charges' => []]);
        }

    }




}