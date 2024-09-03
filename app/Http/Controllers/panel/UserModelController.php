<?php

namespace App\Http\Controllers\panel;

use Razorpay\Api\Api;
use App\Models\Enquiry;
use App\Models\Occupation;
use App\Mail\PaymentFailed;
use App\Models\TokenStatus;
use Illuminate\Support\Str;
use App\Mail\PaymentSuccess;
use App\Models\BranchMaster;
use App\Models\OtherCharges;
use App\Models\ProjectEntry;
use Illuminate\Http\Request;
use App\Models\InitialEnquiry;
use App\Models\PlotSaleStatus;
use Illuminate\Support\Carbon;
use App\Models\ClientDetailInitial;
// use App\Models\UserModelPlotQuery;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\EmiPaymentCollection;
use App\Models\NomineeDetailInitial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Models\OtherChargesForClient;
use App\Models\FirmRegistrationMaster;
use App\Models\ProjectEntryAppendData;
use App\Models\AgentRegistrationMaster;
use Razorpay\Api\Errors\BadRequestError;
use App\Models\CustomerRegistrationMaster;
use App\Models\EmployeeRegistrationMaster;
use App\Models\RazorpayPaymentOfUserModel;
use Razorpay\Api\Errors\SignatureVerificationError;
use App\Models\{PlotRegistrationDocumentByClient, UserModelPlotQuery};

class UserModelController extends Controller
{




    public function userfetchPlotDetails(Request $request)
    {
        $plotId = $request->get('plotId');

        // Assuming `ProjectEntryAppendData` is your model and it has plot details
        $plotDetails = ProjectEntryAppendData::where('id', $plotId)->first();

        if ($plotDetails) {
            // Extract values from plotDetails
            $amount = (float) $plotDetails->amount;
            $minimumDownPayment = (float) $plotDetails->minimum_down_payment;
            $tenureMonths = (int) $plotDetails->tenure;

            // Calculate balance amount
            $balanceAmount = $amount - $minimumDownPayment;
            $balanceAmount = max($balanceAmount, 0); // Ensure balance amount is not negative

            // Calculate EMI per month
            $emiPerMonth = $tenureMonths > 0 ? $balanceAmount / $tenureMonths : 0;

            // Calculate daily EMI based on 360 days (assuming 12 months = 360 days)
            $emiPerDay = $tenureMonths > 0 ? $emiPerMonth / 30 : 0; // Dividing by 30 to get per day amount

            // Prepare the data to send back
            $data = [
                'plotDetails' => $plotDetails,
                'balanceAmount' => $balanceAmount,
                'emiPerMonth' => $emiPerMonth,
                'emiPerDay' => $emiPerDay,
            ];

            return response()->json($data);
        }

        return response()->json(['error' => 'Plot not found'], 404);
    }
    public function userdashboard()
    {

        $firm = FirmRegistrationMaster::all();

        $userId = auth()->id();
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $queries = UserModelPlotQuery::with('firm', 'project', 'client', 'plot')->where('client_id', $userId)->get();


        $customerRegistration = CustomerRegistrationMaster::where('user_id', $userId)->first();

        if ($customerRegistration) {
            $clientId = $customerRegistration->user_id;


            $clientDetails = InitialEnquiry::where('client_id', $clientId)->with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        } else {
            $clientDetails = collect();
        }
        return view('panel.user_model.user_dashboard', compact('nominee', 'client', 'clientDetails', 'firm', 'queries'));
    }



    public function getProjectsByFirmbyuser($firm_id)
    {
        // Get the authenticated user's ID
        $userId = auth()->id();

        // Retrieve distinct project IDs from InitialEnquiry for the authenticated user
        $initialEnquiries = InitialEnquiry::where('client_id', $userId)
            ->where('firm_id', $firm_id)
            ->distinct()
            ->pluck('project_id');

        // Retrieve projects by firm_id where the project_id is in the initialEnquiries
        $projects = ProjectEntry::where('firm_id', $firm_id)
            ->whereIn('id', $initialEnquiries)
            ->get();

        // Return the projects as a JSON response
        return response()->json($projects);
    }


    public function fetchPlotspaymentsectionbyuser(Request $request)
    {
        // Retrieve the project ID from the request
        $projectId = $request->input('projectId');

        // Get the authenticated user's ID
        $userId = auth()->id();

        // Retrieve distinct plot numbers from InitialEnquiry for the given user and project
        $initialEnquiries = InitialEnquiry::where('client_id', $userId)
            ->where('project_id', $projectId)
            ->distinct()
            ->pluck('plot_no');

        // Retrieve plots where the plot_no is in the initialEnquiries
        $plots = ProjectEntryAppendData::where('project_entry_id', $projectId)
            ->whereIn('id', $initialEnquiries)
            ->get();

        // Return the filtered plots as a JSON response
        return response()->json($plots);
    }

    public function paymentcollection(Request $request)
    {
        $userId = auth()->id();



        $client = ClientDetailInitial::all();
        $projects = InitialEnquiry::with('project')->distinct()->get(['project_id']);
        $firm = FirmRegistrationMaster::all();
        // Fetch EMI payments for the first initial enquiry record
        $charges = OtherCharges::all();

        return view('panel.user_model.user_payment_collection', compact('client', 'projects', 'firm', 'charges'));
    }
    public function getrazorpaygetway(Request $request)
    {
        // Retrieve all form data
        $data = $request->all();

        // Pass the data to the view using compact
        return view('razorpay-gateway', compact('data'));
    }

    public function store_installment_of_user(Request $request)
    {
        // dd($request->all());        // Validate request data
        $request->validate([
            // 'initial_enquiry_id' => 'required|integer',
            // 'installment' => 'required|integer',
            // 'date' => 'nullable|date',
            // 'payment_type' => 'nullable|string',
            // 'paid_amount' => 'required|numeric',
            // 'bank_name' => 'nullable|string',
            // 'account_no' => 'nullable|string',
            // 'cheque_no' => 'nullable|string',
            // 'ifsc' => 'nullable|string',
            // 'remark' => 'nullable|string',
            // 'razorpay_payment_id' => 'required|string',
            // 'razorpay_order_id' => 'required|string',
            // 'razorpay_signature' => 'required|string',
        ]);

        // Find the installment record
        // Find the installment record
        $installment = EmiPaymentCollection::where('initial_enquiry_id', $request->initial_enquiry_id)
            ->where('inst_no', $request->installment)
            ->first();

        if ($installment) {
            // Calculate the remaining amount
            $remainingAmount = $installment->inst_amt - $request->paid_amount;
            $remainingAmount = $remainingAmount < 0 ? 0 : $remainingAmount;

            // Update the existing installment
            $installment->update([
                'pay_date' => $request->date,
                'payment_type' => $request->payment_type,
                'paid_amt' => $request->paid_amount,
                'bank_name' => $request->bank_name,
                'account_no' => $request->account_no,
                'cheque_no' => $request->cheque_no,
                'ifsc' => $request->ifsc,
                'remark' => $request->remark,
                'status' => 'Pending', // Ensure correct status
                'rem_amt' => $remainingAmount,
            ]);

            // Find the next installment
            $nextInstallment = EmiPaymentCollection::where('initial_enquiry_id', $request->initial_enquiry_id)
                ->where('inst_no', '>', $installment->inst_no)
                ->first();

            // If there is a next installment, add the remaining amount to it
            if ($nextInstallment) {
                $nextInstallment->update([
                    'inst_amt' => $nextInstallment->inst_amt + $remainingAmount,
                ]);
            }

            // Prepare for Razorpay order
            $amount = 1; // Set the amount dynamically if needed
            $receiptId = Str::random(20);

            $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

            $order = $api->order->create([
                'receipt' => $receiptId,
                'amount' => $amount * 100, // Amount in paise
                'currency' => 'INR',
            ]);

            // Store Razorpay payment data
            RazorpayPaymentOfUserModel::create([
                'user_id' => Auth::id(), // Get the authenticated user's ID
                'amount' => $amount,
                'status' => 'Pending',
                'order_id' => $order['id'],
            ]);

            // Prepare response data
            $response = [
                'orderId' => $order['id'],
                'razorpayId' => env('RAZORPAY_KEY_ID'),
                'amount' => $amount * 100,
                'name' => Auth::user()->name,
                'currency' => 'INR',
                'email' => Auth::user()->email,
                'contactNumber' => Auth::user()->contact,
                'address' => Auth::user()->address ?? 'Not Provided', // Ensure address exists or provide default
                'description' => 'Payment for Nile Properties',
            ];

            return response()->json(['success' => 'Installment payment saved successfully.', 'response' => $response]);
        } else {
            return response()->json(['error' => 'Installment payment not found.'], 404);
        }
    }

    public function handleRazorpayCallback(Request $request)
    {
        try {
            $paymentId = $request->input('razorpay_payment_id');
            $orderId = $request->input('razorpay_order_id');
            $amount = $request->input('paid_amount');
            $initialEnquiryId = $request->input('initial_enquiry_id');
            $installment = $request->input('installment');

            // Log the request data for debugging purposes
            \Log::info('Razorpay Callback Received', $request->all());

            // Find the installment record
            $installmentRecord = EmiPaymentCollection::where('initial_enquiry_id', $initialEnquiryId)
                ->where('inst_no', $installment)
                ->first();

            if ($installmentRecord) {
                $installmentRecord->update(['status' => 'Paid']);
            } else {
                \Log::error('Installment not found.', [
                    'initial_enquiry_id' => $initialEnquiryId,
                    'installment' => $installment,
                ]);
                return response()->json(['error' => 'Installment not found.'], 404);
            }

            // Find the payment record using the order ID
            $payment = RazorpayPaymentOfUserModel::where('order_id', $orderId)->first();

            if ($payment) {
                $payment->update([
                    'user_id' => auth()->id(),
                    'amount' => $amount,
                    'payment_id' => $paymentId,
                    'payment_status' => 'Paid',
                    'initial_enquiry_id' => $initialEnquiryId,
                    'installment' => $installment,
                    'is_approved_by_admin' => 0,
                ]);

                $user = CustomerRegistrationMaster::where('user_id', $payment->user_id)->first();

                if ($user) {
                    // Direct email sending based on payment status
                    if ($payment->payment_status === 'Failed') {
                        $message = "Dear {$user->name},\n\n"
                            . "Unfortunately, your payment with ID {$paymentId} has failed.\n"
                            . "Order ID: {$orderId}\n"
                            . "Amount: {$amount}\n\n"
                            . "Please try again or contact support for assistance.\n\n"
                            . "Best regards,\nNile Properties";

                        Mail::raw($message, function ($mail) use ($user) {
                            $mail->to($user->email)
                                ->subject('Payment Failed');
                        });
                    } else if ($payment->payment_status === 'Paid') {
                        $message = "Dear {$user->name},\n\n"
                            . "Your payment with ID {$paymentId} was successful.\n"
                            . "Order ID: {$orderId}\n"
                            . "Amount: {$amount}\n\n"
                            . "Thank you for your payment.\n\n"
                            . "Best regards,\nNile Properties";

                        Mail::raw($message, function ($mail) use ($user) {
                            $mail->to($user->email)
                                ->subject('Payment Successful');
                        });
                    }

                    $user->save();

                    // Sending OTP and other operations
                    $phone = $user->contact;
                    if ($phone) {
                        $otp = rand(1000, 9999);
                        $msg = 'Dear Sir/Mam, Your OTP is ' . $otp . '. Sent by WEBMEDIA';
                        $msg = urlencode($msg);
                        $data1 = "uname=habitm1&pwd=habitm1&senderid=WMEDIA&to={$phone}&msg={$msg}&route=T&peid=1701159196421355379&tempid=1707161527969328476";

                        $ch = curl_init('http://bulksms.webmediaindia.com/sendsms?');
                        curl_setopt($ch, CURLOPT_POST, true);
                        curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        curl_exec($ch);
                        curl_close($ch);

                        session(['otp' => $otp, 'userId' => $user->id]);
                    }

                    return response()->json(['success' => 'Payment completed successfully.']);
                } else {
                    Log::error('User associated with payment not found.', [
                        'payment_id' => $paymentId,
                        'order_id' => $orderId,
                        'user_id' => $payment->user_id,
                    ]);
                    return response()->json(['error' => 'User associated with payment not found.'], 404);
                }
            } else {
                Log::error('Payment record not found.', [
                    'order_id' => $orderId,
                    'payment_id' => $paymentId,
                ]);
                return response()->json(['error' => 'Payment record not found.'], 404);
            }
        } catch (\Exception $e) {
            Log::error('Razorpay Callback Error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all(),
            ]);
            return response()->json(['error' => 'An error occurred while processing the payment.'], 500);
        }
    }




    public function userinitiatesale()
    {

        $tokenStatuses = TokenStatus::all();

        $enquiries = Enquiry::with('client_name')
            ->where('client_status', 'initiate_sale')
            ->get(['client_id', 'broker_id']);
        $projects = ProjectEntry::all();
        $statuses = PlotSaleStatus::all();
        $employees = EmployeeRegistrationMaster::all();
        $agent = AgentRegistrationMaster::all();
        $clients = CustomerRegistrationMaster::all();
        $occupation = Occupation::all();
        $branch = BranchMaster::all();
        $firm = FirmRegistrationMaster::all();

        return view(
            'panel.user_model.user_initiate_sale',
            compact(
                'tokenStatuses',
                'enquiries',
                'projects',
                'firm',
                'statuses',
                'employees',
                'occupation',
                'branch',
                'agent',
                'clients',
            )
        );
    }


    public function userinitiatesalestore(Request $request)
    {
        // dd($request->all());


        $existingEnquiry = InitialEnquiry::where('project_id', $request->project_id)
            ->where('firm_id', $request->firm_id)
            ->where('plot_no', $request->plot_no)
            ->first();

        if ($existingEnquiry) {
            return redirect()->back()->with('error', 'This plot is already taken.');
        }

        // Ensure all required fields are present
        $requiredFields = [
            'title',
            'name',
            'occupation_id',
            'email',
            'contact',
            'city',
            'pin_code',
            'address',
            'age',
            'dob',
            'branch_id',
            'aadhar_no',
            'pan_no',
        ];

        // Required fields for existing clients
        $requiredFields1 = [
            'title_existing',
            'name_existing',
            'occupation_id_existing',
            'email_existing',
            'contact_existing',
            'city_existing',
            'pin_code_existing',
            'address_existing',
            'age_existing',
            'dob_existing',
            'branch_id_existing',
            'aadhar_no_existing',
            'pan_no_existing',
        ];



        // If neither new nor existing fields are filled, return an error
        if (!$requiredFields && !$requiredFields1) {
            return redirect()->back()->with('error', 'Please fill all required fields.');
        }




        // Step 1: Store initial enquiry details
        $initialEnquiry = new InitialEnquiry();

        $initialEnquiry->project_id = $request->project_id;
        $initialEnquiry->is_plot_booked_by_user_model = 1;

        $initialEnquiry->firm_id = $request->firm_id;
        $initialEnquiry->client_id = auth()->id();

        $initialEnquiry->measurement = $request->Measurement;
        $initialEnquiry->square_meter = $request->square_meter;
        $initialEnquiry->square_ft = $request->square_ft;
        $initialEnquiry->rate = $request->rate;
        $initialEnquiry->plot_no = $request->plot_no;
        $initialEnquiry->total_cost = $request->total_cost;
        $initialEnquiry->discount_amount = $request->discount_amount;
        $initialEnquiry->discount_type = $request->discount_type;
        $initialEnquiry->final_amount = $request->final_amount;
        $initialEnquiry->down_payment = $request->down_payment;
        $initialEnquiry->balance_amount = $request->balence_amount;
        $initialEnquiry->tenure = $request->tenure;
        $initialEnquiry->emi_amount = $request->emi_ammount;
        $initialEnquiry->booking_date = now();
        $initialEnquiry->agreement_date =  $request->aggriment_date;
        // $initialEnquiry->status_token = $request->staus_token;
        $initialEnquiry->emi_start_date =  $request->emi_start_date;
        $initialEnquiry->plot_sale_status = $request->plot_sale_status;
        $initialEnquiry->a_rate = $request->a_rate;
        $initialEnquiry->source_type = $request->source_type;
        if ($request->has('employee')) {
            $initialEnquiry->employee_id = $request->employee;
        } elseif ($request->has('agent_id')) {
            $initialEnquiry->agent_id = $request->agent_id;
        } else {
            $initialEnquiry->direct_sourse = 'yes';
        }
        $initialEnquiry->remark = $request->remark;
        $initialEnquiry->mauja = $request->mauja;
        $initialEnquiry->kh_no = $request->kh_no;
        $initialEnquiry->phn = $request->phn;
        $initialEnquiry->taluka = $request->taluka;
        $initialEnquiry->district = $request->district;
        $initialEnquiry->east = $request->east;
        $initialEnquiry->west = $request->west;
        $initialEnquiry->north = $request->north;
        $initialEnquiry->south = $request->south;
        $initialEnquiry->save();

        $plotRegistrationDocument = new PlotRegistrationDocumentByClient([
            'document_name' => null,
            'plot_id' => null,
            'firm_id' => null,
            'project_id' => null,
            'client_id' => null,
            'status' => 'unpaid',
            'initial_enquiry_id' => $initialEnquiry->id,
        ]);

        $plotRegistrationDocument->save();

        // Storing data in OtherChargesForClient model
        $otherCharges = new OtherChargesForClient([
            'amount' => null,
            'charges_id' => null,
            'client_id' => null,
            'plot_id' => null,
            'firm_id' => null,
            'project_id' => null,
            'status' => 'unpaid',
            'initial_enquiry_id' => $initialEnquiry->id,
        ]);

        $otherCharges->save();

        // Step 2: Store nominee details if not empty
        if (!empty($request->nominee_name)) {
            $nomineesCount = count($request->nominee_name);
            for ($i = 0; $i < $nomineesCount; $i++) {
                if (!empty($request->nominee_name[$i]) && !empty($request->nominee_age[$i]) && !empty($request->nominee_relation[$i]) && !empty($request->nominee_dob[$i]) && !empty($request->nominee_aadhar[$i]) && !empty($request->nominee_pan[$i])) {
                    $nominee = new NomineeDetailInitial();
                    $nominee->initial_enquiry_id = $initialEnquiry->id;
                    $nominee->name = $request->nominee_name[$i];
                    $nominee->age = $request->nominee_age[$i];
                    $nominee->relation = $request->nominee_relation[$i];
                    $nominee->dob = Carbon::createFromFormat('d/m/Y', $request->nominee_dob[$i])->toDateString();
                    $nominee->aadhar = $request->nominee_aadhar[$i];
                    $nominee->pan = $request->nominee_pan[$i];
                    $nominee->save();
                }
            }
        }

        // Generate EMI Payments
        $emiStartDate = Carbon::parse($request->emi_start_date);
        for ($i = 0; $i < $request->tenure; $i++) {
            $emiPayment = new EmiPaymentCollection();
            $emiPayment->initial_enquiry_id = $initialEnquiry->id;
            $emiPayment->inst_no = $i + 1;
            $emiPayment->inst_amt = $request->emi_ammount;
            $emiPayment->status = 'pending';
            $emiPayment->edop = $emiStartDate->copy()->addMonths($i)->toDateString();
            $emiPayment->save();
        }

        if ($request->title) {

            foreach ($request->title as $index => $title) {
                // Check if any required fields are empty
                if (
                    !isset($title) ||
                    !isset($request->name[$index]) ||
                    !isset($request->occupation_id[$index]) ||
                    !isset($request->email[$index]) ||
                    !isset($request->contact[$index]) ||
                    !isset($request->city[$index]) ||
                    !isset($request->pin_code[$index]) ||
                    !isset($request->address[$index]) ||
                    !isset($request->age[$index]) ||
                    !isset($request->dob[$index]) ||
                    !isset($request->branch_id[$index]) ||
                    !isset($request->aadhar_no[$index]) ||
                    !isset($request->pan_no[$index])
                ) {
                    continue; // Skip this iteration if any required fields are missing
                }

                // Handle file uploads for aadhar and pan images
                $image_name_array = [];
                foreach ($request->aadhar as $key => $image) {
                    $extension = explode('/', mime_content_type($image))[1];
                    $data = base64_decode(substr($image, strpos($image, ',') + 1));
                    $imgname1 = 'e' . rand(000, 999) . $key . time() . '.' . $extension;
                    file_put_contents(public_path('customer_reg/') . '/' . $imgname1, $data);
                    $image_name_array[] = $imgname1;
                }
                $aadharImages = implode(',', $image_name_array);

                $answerKey = [];
                foreach ($request->pan as $key => $image) {
                    $extension = explode('/', mime_content_type($image))[1];
                    $data = base64_decode(substr($image, strpos($image, ',') + 1));
                    $imgname = 'e' . rand(000, 999) . $key . time() . '.' . $extension;
                    file_put_contents(public_path('customer_reg/') . '/' . $imgname, $data);
                    $answerKey[] = $imgname;
                }
                $panImages = implode(',', $answerKey);

                // Create a new customer registration record
                $reg = new CustomerRegistrationMaster();
                $reg->title = $title;
                $reg->name = $request->name[$index];
                $reg->occupation_id = $request->occupation_id[$index];
                $reg->email = $request->email[$index];
                $reg->contact = $request->contact[$index];
                $reg->city = $request->city[$index];
                $reg->pin_code = $request->pin_code[$index];
                $reg->address = $request->address[$index];
                $reg->age = $request->age[$index];
                $reg->dob = $request->dob[$index];
                $reg->marital_status = $request->marital_status[$index];
                $reg->marriage_date = $request->marriage_date[$index];
                $reg->branch_id = $request->branch_id[$index];
                $reg->aadhar = $aadharImages;
                $reg->aadhar_no = $request->aadhar_no[$index];
                $reg->pan = $panImages;
                $reg->pan_no = $request->pan_no[$index];
                $reg->save();
                $client = new ClientDetailInitial();
                $client->initial_enquiry_id = $initialEnquiry->id;
                $client->name = $request->name[$index];
                $client->phone = $request->contact[$index];
                $client->address = $request->address[$index];
                $client->client_id = $reg->id;
                $client->save();
                // Handle client details


                // Check if `existing_client_id` is not set or is empty, then store new client details

            }
        }

        // if (isset($request->existing_client_id[$index]) && !empty($request->existing_client_id[$index])) {
        //     $client = new ClientDetailInitial();
        //     $client->initial_enquiry_id = $initialEnquiry->id;
        //     $client->name = $request->name_existing[$index];
        //     $client->phone = $request->contact_existing[$index];
        //     $client->address = $request->address_existing[$index];
        //     $client->client_id = $request->existing_client_id[$index];
        //     $client->save();
        // }
        if ($request->has('existing_client_id')) {
            foreach ($request->existing_client_id as $index => $existingClientId) {
                if (!empty($existingClientId)) {
                    $existingClient = new ClientDetailInitial();
                    $existingClient->initial_enquiry_id = $initialEnquiry->id;
                    $existingClient->name = $request->name_existing[$index];
                    $existingClient->phone = $request->contact_existing[$index];
                    $existingClient->address = $request->address_existing[$index];
                    $existingClient->client_id = $existingClientId;
                    $existingClient->save();
                }
            }
        }
        //dd(1);
        return redirect()->route('user_model.newsale')->with('success', 'Data saved successfully.');
    }

    public function userinitiatesaleupdate(Request $request, $id)
    {
        // Step 1: Validation (Add necessary validation rules)
        $request->validate([
            'plot_no' => 'required',
            'firm_id' => 'required',
            'project_id' => 'required',
            // Add other necessary validations
        ]);

        // Step 2: Update initial enquiry details
        $initialEnquiry = InitialEnquiry::find($id);
        if (!$initialEnquiry) {
            return redirect()->back()->with('error', 'Enquiry not found.');
        }

        // Update plot registration documents
        $plotRegistrationDocuments = PlotRegistrationDocumentByClient::where('initial_enquiry_id', $id)->get();
        foreach ($plotRegistrationDocuments as $plotRegistrationDocument) {
            $plotRegistrationDocument->update([
                'plot_id' => $request->plot_no,
                'firm_id' => $request->firm_id,
                'project_id' => $request->project_id
            ]);
        }

        // Update other charges
        $otherChargesList = OtherChargesForClient::where('initial_enquiry_id', $id)->get();
        foreach ($otherChargesList as $otherCharges) {
            $otherCharges->update([
                'plot_id' => $request->plot_no,
                'firm_id' => $request->firm_id,
                'project_id' => $request->project_id
            ]);
        }

        // Update the initial enquiry
        $initialEnquiry->update([
            'is_plot_booked_by_user_model' => 1,

            'project_id' => $request->project_id,
            'firm_id' => $request->firm_id,
            'measurement' => $request->Measurement,
            'square_meter' => $request->square_meter,
            'square_ft' => $request->square_ft,
            'rate' => $request->rate,
            'plot_no' => $request->plot_no,
            'total_cost' => $request->total_cost,
            'discount_amount' => $request->discount_amount,
            'discount_type' => $request->discount_type,
            'final_amount' => $request->final_amount,
            'down_payment' => $request->down_payment,
            'balance_amount' => $request->balance_amount,
            'tenure' => $request->tenure,
            'emi_amount' => $request->emi_ammount,
            'booking_date' => Carbon::createFromFormat('d/m/Y', $request->booking_date)->toDateString(),
            'agreement_date' => Carbon::createFromFormat('d/m/Y', $request->aggriment_date)->toDateString(),
            'status_token' => $request->status_token,
            'emi_start_date' => Carbon::createFromFormat('d/m/Y', $request->emi_start_date)->toDateString(),
            'plot_sale_status' => $request->plot_sale_status,
            'a_rate' => $request->a_rate,
            'source_type' => $request->source_type,
            'employee_id' => $request->has('employee') ? $request->employee : null,
            'agent_id' => $request->has('agent_id') ? $request->agent_id : null,
            'direct_source' => $request->has('employee') || $request->has('agent_id') ? null : 'yes',
            'remark' => $request->remark,
            'mauja' => $request->mauja,
            'kh_no' => $request->kh_no,
            'phn' => $request->phn,
            'taluka' => $request->taluka,
            'district' => $request->district,
            'east' => $request->east,
            'west' => $request->west,
            'north' => $request->north,
            'south' => $request->south,
        ]);

        // Step 3: Update EMI payments if no payment made for the first installment
        $existingEmiPayments = EmiPaymentCollection::where('initial_enquiry_id', $id)
            ->where('inst_no', 1)
            ->whereNotNull('paid_amt')
            ->exists();

        if (!$existingEmiPayments) {
            EmiPaymentCollection::where('initial_enquiry_id', $id)->delete();
            $emiStartDate = Carbon::createFromFormat('d/m/Y', $request->emi_start_date);
            for ($i = 0; $i < $request->tenure; $i++) {
                EmiPaymentCollection::create([
                    'initial_enquiry_id' => $initialEnquiry->id,
                    'inst_no' => $i + 1,
                    'inst_amt' => $request->emi_amount,
                    'status' => 'pending',
                    'edop' => $emiStartDate->copy()->addMonths($i)->toDateString(),
                ]);
            }
        }

        // Step 4: Update nominee details
        if (!empty($request->nominee_name)) {
            foreach ($request->nominee_name as $i => $name) {
                if (!empty($name) && !empty($request->nominee_age[$i]) && !empty($request->nominee_relation[$i]) && !empty($request->nominee_dob[$i]) && !empty($request->nominee_aadhar[$i]) && !empty($request->nominee_pan[$i])) {
                    NomineeDetailInitial::create([
                        'initial_enquiry_id' => $initialEnquiry->id,
                        'name' => $name,
                        'age' => $request->nominee_age[$i],
                        'relation' => $request->nominee_relation[$i],
                        'dob' => Carbon::createFromFormat('d/m/Y', $request->nominee_dob[$i])->toDateString(),
                        'aadhar' => $request->nominee_aadhar[$i],
                        'pan' => $request->nominee_pan[$i],
                    ]);
                }
            }
        }

        // Step 5: Update or create new client details
        if (!empty($request->title)) {
            foreach ($request->title as $index => $title) {
                if (!isset($title) || !isset($request->name[$index]) || !isset($request->occupation_id[$index]) || !isset($request->email[$index]) || !isset($request->contact[$index]) || !isset($request->city[$index]) || !isset($request->pin_code[$index]) || !isset($request->address[$index]) || !isset($request->age[$index]) || !isset($request->dob[$index]) || !isset($request->branch_id[$index]) || !isset($request->aadhar_no[$index]) || !isset($request->pan_no[$index])) {
                    continue;
                }

                $aadharImages = $this->handleFileUploads($request->aadhar, 'customer_reg');
                $panImages = $this->handleFileUploads($request->pan, 'customer_reg');

                // Create a new customer registration record
                $reg = CustomerRegistrationMaster::create([
                    'title' => $title,
                    'name' => $request->name[$index],
                    'occupation_id' => $request->occupation_id[$index],
                    'email' => $request->email[$index],
                    'contact' => $request->contact[$index],
                    'city' => $request->city[$index],
                    'pin_code' => $request->pin_code[$index],
                    'address' => $request->address[$index],
                    'age' => $request->age[$index],
                    'dob' => $request->dob[$index],
                    'marital_status' => $request->marital_status[$index],
                    'marriage_date' => $request->marriage_date[$index],
                    'branch_id' => $request->branch_id[$index],
                    'aadhar' => $aadharImages,
                    'aadhar_no' => $request->aadhar_no[$index],
                    'pan' => $panImages,
                    'pan_no' => $request->pan_no[$index],
                ]);

                ClientDetailInitial::create([
                    'initial_enquiry_id' => $initialEnquiry->id,
                    'name' => $request->name[$index],
                    'phone' => $request->contact[$index],
                    'address' => $request->address[$index],
                    'client_id' => $reg->id,
                ]);
            }
        }

        // Step 6: Handle existing clients
        if (!empty($request->existing_client_id)) {
            foreach ($request->existing_client_id as $index => $existingClientId) {
                if (!empty($existingClientId)) {
                    ClientDetailInitial::create([
                        'initial_enquiry_id' => $initialEnquiry->id,
                        'name' => $request->name_existing[$index],
                        'phone' => $request->contact_existing[$index],
                        'address' => $request->address_existing[$index],
                        'client_id' => $existingClientId,
                    ]);
                }
            }
        }

        // Step 7: Redirect with success message
        return redirect()->route('user_model.newsale')->with('success', 'Enquiry updated successfully.');
    }

    public function userinitiatesaleedit($inquiryId)
    {
        $inquiry = InitialEnquiry::with('clientsigle', 'clientsigle.agent', 'clients.clientn', 'nominees')->find($inquiryId);
        //dd($inquiry);
        $enquiries = Enquiry::with('client_name')
            ->where('client_status', 'initiate_sale')
            ->get(['client_id', 'broker_id', 'plot_no']);
        $projects = ProjectEntry::all();
        $statuses = PlotSaleStatus::all();
        $employees = EmployeeRegistrationMaster::all();
        $tokenStatuses = TokenStatus::all();
        $agent = AgentRegistrationMaster::all();

        $occupation = Occupation::all();
        $branch = BranchMaster::all();
        $firm = FirmRegistrationMaster::all();
        $clients = CustomerRegistrationMaster::all();

        $plot = ProjectEntryAppendData::all();

        return view(
            'panel.user_model.user_initiate_sale_edit',
            compact(
                'clients',
                'inquiry',
                'occupation',
                'branch',
                'firm',
                'plot',

                'enquiries',
                'projects',
                'statuses',
                'employees',
                'tokenStatuses',
                'agent',
            )
        );
    }

    public function userinitiatesaledelete($id)
    {



        // Find the initial enquiry by its ID
        $initialEnquiry = InitialEnquiry::find($id);

        if ($initialEnquiry) {
            // Delete associated client details
            ClientDetailInitial::where('initial_enquiry_id', $id)->delete();
            OtherChargesForClient::where('initial_enquiry_id', $id)->delete();
            PlotRegistrationDocumentByClient::where('initial_enquiry_id', $id)->delete();

            // Delete associated nominee details
            NomineeDetailInitial::where('initial_enquiry_id', $id)->delete();
            EmiPaymentCollection::where('initial_enquiry_id', $id)->delete();
            // Delete the initial enquiry itself
            $initialEnquiry->delete();

            return redirect()->back()->with('success', 'Data deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Data not found.');
        }
    }
    public function usernewsale()
    {
        $userId = auth()->id();
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();


        $customerRegistration = CustomerRegistrationMaster::where('user_id', $userId)->first();

        if ($customerRegistration) {
            $clientId = $customerRegistration->user_id;


            $clientDetails = InitialEnquiry::where('client_id', $clientId)->with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        } else {
            $clientDetails = collect();
        }

        return view('panel.user_model.user_new_sale', compact('nominee', 'client', 'clientDetails'));
    }


    public function userregistration()
    {

        $userId = auth()->id();
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();


        $customerRegistration = CustomerRegistrationMaster::where('user_id', $userId)->first();

        if ($customerRegistration) {
            $clientId = $customerRegistration->user_id;


            $clientDetails = InitialEnquiry::where('client_id', $clientId)->with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        } else {
            $clientDetails = collect();
        }

        return view('panel.user_model.user_registration', compact('nominee', 'client', 'clientDetails'));
    }
    public function useraccount()
    {
        return view('panel.user_model.user_account');
    }


    public function userlegalclearance()
    {

        $userId = auth()->id();
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();


        $customerRegistration = CustomerRegistrationMaster::where('user_id', $userId)->first();

        if ($customerRegistration) {
            $clientId = $customerRegistration->user_id;


            $clientDetails = InitialEnquiry::where('client_id', $clientId)->with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        } else {
            $clientDetails = collect();
        }
        return view('panel.user_model.user_legal_clearance', compact('nominee', 'client', 'clientDetails'));
    }
    public function userregistrationcompleted()
    {
        $userId = auth()->id();
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();


        $customerRegistration = CustomerRegistrationMaster::where('user_id', $userId)->first();

        if ($customerRegistration) {
            $clientId = $customerRegistration->user_id;


            $clientDetails = InitialEnquiry::where('client_id', $clientId)->with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        } else {
            $clientDetails = collect();
        }
        return view('panel.user_model.user_registration_completed', compact('nominee', 'client', 'clientDetails'));
    }

    public function usersaledeedscan()
    {
        $userId = auth()->id();
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();


        $customerRegistration = CustomerRegistrationMaster::where('user_id', $userId)->first();

        if ($customerRegistration) {
            $clientId = $customerRegistration->user_id;


            $clientDetails = InitialEnquiry::where('client_id', $clientId)->with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        } else {
            $clientDetails = collect();
        }
        return view('panel.user_model.user_saledeed_scan', compact('nominee', 'client', 'clientDetails'));
    }
    public function userhandover()
    {
        $userId = auth()->id();
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();


        $customerRegistration = CustomerRegistrationMaster::where('user_id', $userId)->first();

        if ($customerRegistration) {
            $clientId = $customerRegistration->user_id;


            $clientDetails = InitialEnquiry::where('client_id', $clientId)->with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        } else {
            $clientDetails = collect();
        }
        return view('panel.user_model.user_handover', compact('nominee', 'client', 'clientDetails'));
    }

    public function usercreateRazorpayOrder(Request $request)
    {
        try {
            // Convert the amount to paise
            $amount = $request->amount * 100;

            // Initialize Razorpay API with credentials
            $api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));

            // Create an order in Razorpay
            $order = $api->order->create([
                'receipt' => 'order_rcptid_' . time(), // Unique receipt id
                'amount' => $amount,
                'currency' => 'INR',
            ]);

            // Find the charge record to update
            $charge = OtherChargesForClient::where('project_id', $request->project_id)
                ->where('plot_id', $request->plot_id)
                ->where('client_id', $request->client_id)
                ->where('amount', $request->amount)
                ->first();

            // If the record exists, update it with the new order ID
            if ($charge) {
                $charge->update([
                    'order_id' => $order['id'],
                ]);
            } else {
                // Optionally handle the case where the record doesn't exist
            }

            // Return a successful response with the order ID and Razorpay Key ID
            return response()->json([
                'order_id' => $order['id'],
                'razorpay_key_id' => env('RAZORPAY_KEY_ID'), // Include Razorpay Key ID
            ], 200);
        } catch (BadRequestError $e) {
            // Razorpay API specific error handling
            return response()->json([
                'error' => 'Razorpay API error: ' . $e->getMessage(),
            ], 400);
        } catch (\Exception $e) {
            // General error handling
            return response()->json([
                'error' => 'Something went wrong: ' . $e->getMessage(),
            ], 500);
        }
    }



    public function userhandleRazorpayCallback(Request $request)
    {
        $order_id = $request->input('user_razorpay_order_id');
        $payment_id = $request->input('user_razorpay_payment_id');

        // Find the charge record using the order ID
        $charge = OtherChargesForClient::where('order_id', $order_id)->first();

        if ($charge) {
            // Update the record with the payment ID and status
            $charge->update([
                'payment_id' => $payment_id,
                'status' => 'paid',
            ]);

            return response()->json(['success' => true, 'message' => 'Payment successful!']);
        } else {
            // Record not found, handle as payment failure
            return response()->json(['success' => false, 'message' => 'Payment failed: Order not found.']);
        }
    }
    private function handleFileUploads($files, $directory)
    {
        $image_name_array = [];
        foreach ($files as $key => $image) {
            $extension = explode('/', mime_content_type($image))[1];
            $data = base64_decode(substr($image, strpos($image, ',') + 1));
            $imgname = 'e' . rand(000, 999) . $key . time() . '.' . $extension;
            file_put_contents(public_path($directory) . '/' . $imgname, $data);
            $image_name_array[] = $imgname;
        }
        return implode(',', $image_name_array);
    }

    public function uploadQueriesByClient(Request $request)
    {
        // dd(1);
        // Validate the incoming request data
        $request->validate([
            'firm_id' => 'required|',
            'project_id' => 'required|',
            'plot_no' => 'required|',
            'client_id' => 'required|',
            'query' => 'required|',
        ]);

        // Check and handle missing fields
        if ($request->has(['firm_id', 'project_id', 'plot_no', 'client_id', 'query'])) {
            // Fetch the matching InitialEnquiry record
            $initialEnquiry = InitialEnquiry::where([
                ['firm_id', $request->input('firm_id')],
                ['project_id', $request->input('project_id')],
                ['plot_no', $request->input('plot_no')],
            ])->first();
            // dd($initialEnquiry);

            if ($initialEnquiry) {
                // Create a new record in the UserModelPlotQuery table with initial_enquiry_id
                UserModelPlotQuery::create([
                    'firm_id' => $request->input('firm_id'),
                    'project_id' => $request->input('project_id'),
                    'plot_no' => $request->input('plot_no'),
                    'client_id' => $request->input('client_id'),
                    'query' => $request->input('query'),
                    'initial_enquiry_id' => $initialEnquiry->id, // Store the matched InitialEnquiry ID
                ]);

                // Redirect back with a success message
                return redirect()->back()->with('success', 'Query uploaded successfully!');
            } else {
                // Redirect back with an error message if InitialEnquiry record is not found
                return redirect()->back()->with('error', 'No matching InitialEnquiry record found.');
            }
        } else {
            // Redirect back with an error message if fields are missing
            return redirect()->back()->with('error', 'Some required fields are missing.');
        }
    }

    public function fetchQueries($id)
    {
        $query = UserModelPlotQuery::where('initial_enquiry_id', $id)->get();

        if ($query) {
            return response()->json($query);
        }

        return response()->json(['error' => 'No data found'], 404);
    }

    // Update admin response
    public function updateAdminResponse(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:user_model_plots_related_queries,id',
            'admin_response' => 'required|string',
        ]);

        $query = UserModelPlotQuery::find($request->id);

        if ($query) {
            $query->admin_response = $request->admin_response;
            $query->save();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 500);
    }

    public function updateAdminResponseBulk(Request $request)
    {
        $request->validate([
            'responses' => 'required|array',
            'responses.*.id' => 'required|exists:user_model_plots_related_queries,id',
            'responses.*.admin_response' => 'required|string',
        ]);

        $responses = $request->responses;
        $success = true;

        foreach ($responses as $response) {
            $query = UserModelPlotQuery::find($response['id']);
            if ($query) {
                $query->admin_response = $response['admin_response'];
                $query->save();
            } else {
                $success = false;
                break;
            }
        }

        return response()->json(['success' => $success]);
    }
}
