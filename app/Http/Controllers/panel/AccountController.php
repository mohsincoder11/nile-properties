<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\ExpenseIncome;
use Illuminate\Http\Request;
use App\Models\FirmRegistrationMaster;
use App\Models\InitialEnquiry;
use App\Models\EmiPaymentCollection;

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

        return view('panel.expense_income',compact('firm'));
    }

    public function expense_store(Request $request)
{
    dd($request->all());
    // Validate the incoming request data
    $request->validate([
        'bill_no' => 'required|string|max:255',
        'firm_id' => 'required|integer',
        'project_id' => 'required|integer',
        'income_category' => 'required|string|max:255',
        'client_id' => 'required|integer',
        'bank_name' => 'required|string|max:255',
        'amount' => 'required|numeric',
        'remarks' => 'required|string|max:255',
        'emi_no' => 'required|integer',
        'emi_amount' => 'required|numeric',
        'mode_of_payment' => 'required|string|max:255',
        'attach_proof' => 'required|file|mimes:jpg,png,pdf|max:2048',
        'narration' => 'required|string|max:1000',
    ]);

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
    $record->income_category = $request->income_category;
    $record->client_id = $request->client_id;
    $record->bank_name = $request->bank_name;
    $record->amount = $request->amount;
    $record->remarks = $request->remarks;
    $record->emi_no = $request->emi_no;
    $record->emi_amount = $request->emi_amount;
    $record->mode_of_payment = $request->mode_of_payment;
    $record->attach_proof = $fileName;
    $record->narration = $request->narration;
    $record->save();

    // Return a response, maybe redirect to a page with a success message
    return redirect()->route('expenses.index')->with('success', 'Record added successfully.');
}

public function get_sold_plot_details(Request $request ){
    $existingEnquiry = InitialEnquiry::where('project_id', $request->project_id)
    ->where('firm_id', $request->firm_id)
    ->where('plot_no', $request->plot_no)
    ->first();
    
    if($existingEnquiry){

    $totalemi=EmiPaymentCollection::select('edop','inst_amt','status')->where('initial_enquiry_id',$existingEnquiry->id)->orderby('id','asc')->get();
}
    else{
        $totalemi=[];
    }
    return response()->json(['total_emi'=>$totalemi]);

}


}