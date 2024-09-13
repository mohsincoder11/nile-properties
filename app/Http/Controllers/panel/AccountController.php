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
use App\Models\account_department\Expence_Category;
use App\Models\account_department\Expence_Head;
use Dompdf\Dompdf;
use Dompdf\Options;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function exepence_entry()
    {
        return view('panel.expense_entry');
    }
    public function exepence_master()
    {
        $expence_categorys = Expence_Category::all();
        $expence_head = Expence_Head::all();
        return view('panel.expense_master',compact('expence_head','expence_categorys'));
    }

    public function expence_category_create(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'expence_category' => 'required|',

        ]);
        $expence_category = new Expence_Category();
        $expence_category->expence_category = $request->expence_category;

        $expence_category->save();
        return redirect()->route('expense.master')->with('success', 'expence_category added successfully!');
    }

 

    public function expence_category_delete($id)
    {
     Expence_Category::find($id)->delete();
        return redirect()->route('expense.master')->with('success', 'expence_category is Deleted Successfully');
    }

    
    

    public function edit_expence_category($id){

        $expence_categoryAll = Expence_Category::all();
        $expence_categoryEdit = Expence_Category::find($id);
        return view('panel.expence_category_edit', compact('expence_categoryAll', 'expence_categoryEdit'));
    }

    public function update_expence_category(Request $request)
    {
        $expence_category = Expence_Category::find($request->id);
        $expence_category->expence_category = $request->expence_category;
        $expence_category->save();


        return redirect(route('expense.master'))->with('success', 'Successfully Updated !');
    }

    public function expence_category_head(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'expence_category_id' => 'required|',
            'expence_head' => 'required|',

        ]);
        for($i=0;$i<count($request->expence_head); $i++){
            if (isset($request->expence_head[$i])){
        $expence_category = new Expence_Head();
        $expence_category->expence_category_id = $request->expence_category_id[$i];
        $expence_category->expence_head = $request->expence_head[$i];

        $expence_category->save();
            }
        }
    
        return redirect()->route('expense.master')->with('success', 'expence_category added successfully!');
    }
    
    public function edit_expence_head($id){
        $expence_categorys = Expence_Category::all();
        $expence_head = Expence_Head::all();
        $expence_head_edit = Expence_Head::find($id);
        // echo json_encode($expence_head_edit);
        // echo json_encode($id);
        // exit();
        return view('panel.expence_head_edit', compact('expence_head', 'expence_head_edit','expence_categorys'));
    }


    public function update_expence_head(Request $request)
    {
        $expence_head = Expence_Head::find($request->id);
        $expence_head->expence_category_id = $request->expence_category_id;
        $expence_head->expence_head = $request->expence_head;
        $expence_head->save();


        return redirect(route('expense.master'))->with('success', 'Successfully Updated !');
    }

    public function expence_head_delete($id)
    {
     Expence_Head::find($id)->delete();
        return redirect()->route('expense.master')->with('success', 'expence head is Deleted Successfully');
    }


    public function income()
    {
        $firm = FirmRegistrationMaster::all();
        $currentYear = now()->year;
        $lastRecord = ExpenseIncome::orderBy('id', 'desc')->first();
    
        $serialNumber = $lastRecord ? $lastRecord->id + 1 : 1;
    
        $receiptNumber = 'NP' . $currentYear . str_pad($serialNumber, 4, '0', STR_PAD_LEFT);

        return view('panel.expense_income', compact('firm','receiptNumber'));
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
           // 'attach_proof' => 'required|file|mimes:jpg,png,pdf|max:2048', //
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
        return redirect()->route('emi_receipt',$record->id)->with('success', 'Record added successfully.');
    }

    // public function receipt($id)
    // {
    //     // dump($id);
    //     $expensedata = ExpenseIncome::where('id', $id)->first();

    //     // Call the numberToWords method from the same class
    //     $amountInWords = $this->numberToWords($expensedata->amount);

    //     $data = InitialEnquiry::where('project_id', $expensedata->project_id)
    //         ->where('firm_id', $expensedata->firm_id)
    //         ->where('plot_no', $expensedata->plot_no)
    //         ->first();

    //     return view('panel.receipt.emi_receipt', compact('data', 'expensedata', 'amountInWords'));
        
    // }

    public function receipt($id)
    {
        // Fetch the expense data
        $expensedata = ExpenseIncome::where('id', $id)->first();
        $amountInWords = $this->numberToWords($expensedata->amount);
    
        $data = InitialEnquiry::where('project_id', $expensedata->project_id)
            ->where('firm_id', $expensedata->firm_id)
            ->where('plot_no', $expensedata->plot_no)
            ->first();

        $isPdf = true;

        // Generate the HTML content for PDF
        $html = view('panel.receipt.emi_receipt', compact('data','isPdf','expensedata', 'amountInWords'))->render();
    
        // Setup Dompdf options
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->set('isRemoteEnabled', true); // Enable remote URL handling
        
        // Initialize Dompdf
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
    
        // Generate the filename
        $filename = 'receipt_' . $id . '.pdf';
    
        // Define the folder path where you want to store the PDF
        $folderPath = public_path('receipt/');  // Example folder: 'public/pdfs/'
    
        // Ensure the folder exists
        if (!file_exists($folderPath)) {
            mkdir($folderPath, 0777, true); // Create the folder if it doesn't exist
        }
    
        // Store the PDF in the specified folder
        file_put_contents($folderPath . $filename, $dompdf->output());
    
        $expensedataupdate = ExpenseIncome::where('id', $id)->first();
        $expensedataupdate->receipt_pdf = $filename;
        $expensedataupdate->save();


        if (isset($expensedata->income_category) && $expensedata->income_category == 'EMI') {
            EmiPaymentCollection::where('id', $expensedata->emi_no)->update(['receipt_pdf' => $filename]);
        } else if (isset($expensedata->income_category) && $expensedata->income_category == 'Other') {
            OtherChargesForClient::where('id', $expensedata->other_charges_type)->update(
                ['receipt_pdf' => $filename]
            );
        }

        // After saving the PDF, return the view (panel.receipt.emi_receipt)
        return view('panel.receipt.emi_receipt', compact('data', 'expensedata', 'amountInWords'));
    }

    // Define the numberToWords function as a method of this class
    private function numberToWords($number)
    {
        $hyphen = '-';
        $conjunction = ' and ';
        $separator = ', ';
        $negative = 'negative ';
        $decimal = ' paisa ';
        $dictionary = [
            0 => 'zero',
            1 => 'one',
            2 => 'two',
            3 => 'three',
            4 => 'four',
            5 => 'five',
            6 => 'six',
            7 => 'seven',
            8 => 'eight',
            9 => 'nine',
            10 => 'ten',
            11 => 'eleven',
            12 => 'twelve',
            13 => 'thirteen',
            14 => 'fourteen',
            15 => 'fifteen',
            16 => 'sixteen',
            17 => 'seventeen',
            18 => 'eighteen',
            19 => 'nineteen',
            20 => 'twenty',
            30 => 'thirty',
            40 => 'forty',
            50 => 'fifty',
            60 => 'sixty',
            70 => 'seventy',
            80 => 'eighty',
            90 => 'ninety',
            100 => 'hundred',
            1000 => 'thousand',
            100000 => 'lakh',
            10000000 => 'crore'
        ];
    
        if (!is_numeric($number)) {
            return false;
        }
    
        if ($number < 0) {
            return $negative . $this->numberToWords(abs($number));
        }
    
        $rupees = (int) $number;
        $paisa = round(($number - $rupees) * 100); // Convert decimal to paisa
    
        $rupeesInWords = $this->convertToIndianWords($rupees, $dictionary, $hyphen, $conjunction, $separator);
        $paisaInWords = $paisa > 0 ? $this->convertToIndianWords($paisa, $dictionary, $hyphen, $conjunction, $separator) : '';
    
        $string = $rupeesInWords . ' rupees';
    
        if ($paisaInWords) {
            $string .= ' and ' . $paisaInWords . $decimal;
        }
    
        return ucfirst($string);
    }
    
    private function convertToIndianWords($number, $dictionary, $hyphen, $conjunction, $separator)
    {
        switch (true) {
            case $number < 21:
                return $dictionary[$number];
            case $number < 100:
                $tens = ((int) ($number / 10)) * 10;
                $units = $number % 10;
                return $dictionary[$tens] . ($units ? $hyphen . $dictionary[$units] : '');
            case $number < 1000:
                $hundreds = (int) ($number / 100);
                $remainder = $number % 100;
                return $dictionary[$hundreds] . ' ' . $dictionary[100] . ($remainder ? $conjunction . $this->convertToIndianWords($remainder, $dictionary, $hyphen, $conjunction, $separator) : '');
            case $number < 100000:
                $thousands = (int) ($number / 1000);
                $remainder = $number % 1000;
                return $this->convertToIndianWords($thousands, $dictionary, $hyphen, $conjunction, $separator) . ' ' . $dictionary[1000] . ($remainder ? $separator . $this->convertToIndianWords($remainder, $dictionary, $hyphen, $conjunction, $separator) : '');
            case $number < 10000000:
                $lakhs = (int) ($number / 100000);
                $remainder = $number % 100000;
                return $this->convertToIndianWords($lakhs, $dictionary, $hyphen, $conjunction, $separator) . ' ' . $dictionary[100000] . ($remainder ? $separator . $this->convertToIndianWords($remainder, $dictionary, $hyphen, $conjunction, $separator) : '');
            default:
                $crores = (int) ($number / 10000000);
                $remainder = $number % 10000000;
                return $this->convertToIndianWords($crores, $dictionary, $hyphen, $conjunction, $separator) . ' ' . $dictionary[10000000] . ($remainder ? $separator . $this->convertToIndianWords($remainder, $dictionary, $hyphen, $conjunction, $separator) : '');
        }
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

    // function convertNumberToWords($number)
    // {
    //     $hyphen      = '-';
    //     $conjunction = ' and ';
    //     $separator   = ', ';
    //     $negative    = 'negative ';
    //     $decimal     = ' point ';
    //     $dictionary  = [
    //         0                   => 'zero',
    //         1                   => 'one',
    //         2                   => 'two',
    //         3                   => 'three',
    //         4                   => 'four',
    //         5                   => 'five',
    //         6                   => 'six',
    //         7                   => 'seven',
    //         8                   => 'eight',
    //         9                   => 'nine',
    //         10                  => 'ten',
    //         11                  => 'eleven',
    //         12                  => 'twelve',
    //         13                  => 'thirteen',
    //         14                  => 'fourteen',
    //         15                  => 'fifteen',
    //         16                  => 'sixteen',
    //         17                  => 'seventeen',
    //         18                  => 'eighteen',
    //         19                  => 'nineteen',
    //         20                  => 'twenty',
    //         30                  => 'thirty',
    //         40                  => 'forty',
    //         50                  => 'fifty',
    //         60                  => 'sixty',
    //         70                  => 'seventy',
    //         80                  => 'eighty',
    //         90                  => 'ninety',
    //         100                 => 'hundred',
    //         1000                => 'thousand',
    //         1000000             => 'million',
    //         1000000000          => 'billion',
    //         1000000000000       => 'trillion',
    //         1000000000000000    => 'quadrillion',
    //         1000000000000000000 => 'quintillion'
    //     ];

    //     if (!is_numeric($number)) {
    //         return false;
    //     }

    //     if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
    //         // overflow
    //         trigger_error(
    //             'convertNumberToWords only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
    //             E_USER_WARNING
    //         );
    //         return false;
    //     }

    //     if ($number < 0) {
    //         return $negative . convertNumberToWords(abs($number));
    //     }

    //     $string = $fraction = null;

    //     if (strpos($number, '.') !== false) {
    //         list($number, $fraction) = explode('.', $number);
    //     }

    //     switch (true) {
    //         case $number < 21:
    //             $string = $dictionary[$number];
    //             break;
    //         case $number < 100:
    //             $tens   = ((int) ($number / 10)) * 10;
    //             $units  = $number % 10;
    //             $string = $dictionary[$tens];
    //             if ($units) {
    //                 $string .= $hyphen . $dictionary[$units];
    //             }
    //             break;
    //         case $number < 1000:
    //             $hundreds  = $number / 100;
    //             $remainder = $number % 100;
    //             $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
    //             if ($remainder) {
    //                 $string .= $conjunction . convertNumberToWords($remainder);
    //             }
    //             break;
    //         default:
    //             $baseUnit = pow(1000, floor(log($number, 1000)));
    //             $numBaseUnits = (int) ($number / $baseUnit);
    //             $remainder = $number % $baseUnit;
    //             $string = convertNumberToWords($numBaseUnits) . ' ' . $dictionary[$baseUnit];
    //             if ($remainder) {
    //                 $string .= $remainder < 100 ? $conjunction : $separator;
    //                 $string .= convertNumberToWords($remainder);
    //             }
    //             break;
    //     }

    //     if (null !== $fraction && is_numeric($fraction)) {
    //         $string .= $decimal;
    //         $words = [];
    //         foreach (str_split((string) $fraction) as $number) {
    //             $words[] = $dictionary[$number];
    //         }
    //         $string .= implode(' ', $words);
    //     }

    //     return $string;
    // }
}

