@extends('panel.layout.user_model_layout')

@section('main_container')
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css">
<div class="page-content-wrap" style="height: 200px;">
    <div class="row">

        <div class="col-md-12" style="margin-top:5px;">
            <div class="panel panel-default">
                <h5 class="panel-title"
                    style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                    align="center">
                    <i class="fa fa-rupee"></i> &nbsp;Payment Collection
                </h5>

                <div class="col-md-12" align="center" style="margin-top: 2vh;">

                    <!-- START DEFAULT DATATABLE -->
                    <div class="col-md-12" align="center">
                        <div class="icon-box-container" style="margin-left: 16%;">

                            <div class="icon-box box-3" style="padding: 1vh;">
                                <a href="{{ route('user_model.initiatesale') }}">
                                    <img src="{{ asset('panel/assets/images/cards/13.png') }}" alt="" class="classic-1">
                                    <p class="classic">ADD NEW SALE</p>
                                </a>
                            </div>

                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-1" style="padding: 1vh;">
                                <a href="{{ route('user_model.newsale') }}">
                                    <img src="{{ asset('panel/assets/images/cards/9.png') }}" alt="" class="classic-1">
                                    <p class="classic">NEW SALE CONFIRMED</p>
                                </a>
                            </div>

                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-2">
                                <a href="{{ route('user_model.paymentcollection') }}">
                                    <img src="{{ asset('panel/assets/images/cards/7.png') }}" alt="" class="classic-1">
                                    <p class="classic">PAYMENT COLLECTION</p>
                                </a>

                            </div>
                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-3">
                                <a href="{{ route('user_model.registration') }}">
                                    <img src="{{ asset('panel/assets/images/cards/11.png') }}" alt="" class="classic-1">
                                    <p class="classic">REQUEST FOR REGISTRATION</p>
                                </a>

                            </div>
                            {{-- <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div> --}}

                            {{-- <div class="icon-box box-1">
                                <a href="{{ route('user_model.account') }}">
                                    <img src="{{ asset('panel/assets/images/cards/6.png') }}" alt="" class="classic-1">
                                    <p class="classic">ACCOUNTS CLEARANCE</p>
                                </a>

                            </div> --}}
                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-2">
                                <a href="{{ route('user_model.legalclearance') }}">
                                    <img src="{{ asset('panel/assets/images/cards/4.png') }}" alt="" class="classic-1">
                                    <p class="classic">LEGAL CLEARANCE</p>
                                </a>

                            </div>
                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-3">
                                <a href="{{ route('user_model.registrationcompleted') }}">
                                    <img src="{{ asset('panel/assets/images/cards/8.png') }}" alt="" class="classic-1">
                                    <p class="classic">REGISTRATION COMPLETED</p>
                                </a>

                            </div>
                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-1">
                                <a href="{{ route('user_model.saledeedscan') }}">
                                    <img src="{{ asset('panel/assets/images/cards/12.png') }}" alt="" class="classic-1">
                                    <p class="classic">SALEDEED SCAN</p>
                                </a>

                            </div>
                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-2">
                                <a href="{{ route('user_model.handover') }}">
                                    <img src="{{ asset('panel/assets/images/cards/10.png') }}" alt="" class="classic-1">
                                    <p class="classic">HANDOVER COMPLETE</p>
                                </a>

                            </div>



                            <!-- Add more boxes as needed -->
                        </div>
                    </div>



                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group" style="margin-top:10px;">
                            <div class="col-md-2" style="margin-top:15px;"></div>

                            <div class="col-md-2" style="margin-top:15px;">
                                <label>Select Firm</label>
                                <select class="form-control selectpicker" id="firm-select" name="firm_id"
                                    data-live-search="true">
                                    <option value="">Select Firm</option>
                                    @foreach($firm as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2" style="margin-top:15px;">
                                <label>Select Layout</label>
                                {{-- <select id="project-select" name="project_id" class="form-control select"
                                    data-live-search="true">
                                    <option value="">Select Project</option>
                                    @foreach($projects as $project)
                                    <option value="{{ $project->project_id }}"
                                        data-project-id="{{ $project->project_id }}">{{
                                        $project->project->project_name }}</option>
                                    @endforeach
                                </select> --}}

                                <select name="project_id" class="form-control selectpicker" data-live-search="true"
                                    id="project-select">
                                    <option value="">Select Option</option>
                                </select>
                                {{-- <select id="project-select" name="project_id" class="custom-select">
                                    <option value="">Select Project</option>
                                </select> --}}

                            </div>
                            <div class="col-md-2" style="margin-top:15px;">
                                <label>Select Plot</label>
                                <select id="plot-select" name="plot_no" class="form-control selectpicker"
                                    data-live-search="true">
                                    <!-- Plot options will be appended dynamically -->
                                </select>
                            </div>
                            <div class="col-md-2" style="margin-top:15px;">
                                <label>Select Client</label>
                                <select id="client-select" class="form-control selectpicker" data-live-search="true">
                                    {{-- <option value="">Select a client</option>
                                    @foreach($client as $enquiry)
                                    <option value="{{ $enquiry->id }}" data-client-name="{{ $enquiry->name }}"
                                        data-client-phone="{{ $enquiry->contact }}"
                                        data-client-address="{{ $enquiry->address }}"
                                        data-client-sponsor="{{ $enquiry->broker_id ?? '' }}">
                                        {{ $enquiry->name }}
                                    </option>
                                    @endforeach --}}
                                </select>
                            </div>
                            <div class="col-md-2" style="margin-top:3.1rem;" align="center">

                                <div class="input-group"
                                    style="margin-top:-5px; margin-bottom:15px;margin-left:-125px;">

                                    <button type="button" id="view-button" class="btn btn-primary"><span
                                            class="fa fa-stack-overflow"></span> View
                                        Account</button>

                                </div>
                            </div>

                        </div>
                    </div>

                    <table class="table" width="100%" style="font-size: 16px;">
                        <tbody id="dynamic-data">
                            <!-- Dynamic data will be injected here by AJAX -->
                        </tbody>
                    </table>

                    <div class="row">

                        <div class="panel panel-default">

                            <div class="col-md-12" style="margin-top:5px;" id="dynamic-data-two">












                            </div>

                        </div>
                    </div>

                </div>
                <h5 class="panel-title"
                    style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                    align="center">
                    <i class="fa fa-rupee"></i> &nbsp;Other charges
                </h5>
            </div>
            <div class="col-md-12" style="margin-left: 15%;;">
                <form id="other-charges-form" action="{{ route('othercharge_store') }}" method="post">
                    @csrf
                    <div class="col-md-2" style="margin-top:5px;"></div>
                    <div class="col-md-2" style="margin-top:5px;">
                        <label>Enter other Amount</label>
                        <input type="text" class="form-control" name="amount" placeholder="" />
                        <input type="hidden" class="form-control" name="project_id" id="other_project_id"
                            placeholder="" />
                        <input type="hidden" class="form-control" name="plot_id" id="other_plot_id" placeholder="" />
                        <input type="hidden" class="form-control" name="client_id" id="other_client_id"
                            placeholder="" />
                        <input type="hidden" class="form-control" name="firm_id" id="other_firm_id" placeholder="" />
                    </div>
                    <div class="col-md-2" style="margin-top:5px;">
                        <label>Select Charges</label>
                        <select name="charges_id" required="" class="form-control selectpicker" data-live-search="true">
                            <option value="">Select Charge</option>
                            @foreach($charges as $charge)
                            <option value="{{ $charge->id }}">{{ $charge->other_charges }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2" style="margin-top: 5px;">
                        <button id="submit_other_charges" type="button" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto; background-color: #006699; margin-top: 3vh;">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add other charges
                        </button>
                    </div>
                </form>
                {{-- <div class="col-md-2" style="margin-top: 5px;">
                    <button id="on" type="button" class="btn mjks" data-toggle="modal" data-target="#popup1"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;margin-top: 3vh;">
                        <i class="fa fa-file" aria-hidden="true"></i> Add other charges Receipt
                    </button>
                </div> --}}
            </div>
            <div class="col-md-12" style="margin-top: 2vh; ">
                <table width="100%" border="1">
                    <thead>
                        <tr style="background-color:#f0f0f0; height:30px;">
                            <th style="text-align:center">Type of Payment</th>
                            <th style="text-align:center">Date</th>
                            <th style="text-align:center">Amount</th>
                            <th style="text-align:center">Status</th>
                            <th style="text-align:center">Plot No</th>
                            <th style="text-align:center">Project Name</th>
                            <th style="text-align:center">Firm Name</th>
                        </tr>
                    </thead>
                    <tbody id="charges-table-body">
                        <!-- Dynamic content will be inserted here -->
                    </tbody>
                </table>
            </div>
        </div>
        <form id="user-razorpay-form" method="POST" action="{{ route('user.razorpay.callback') }}"
            style="display: none;">
            @csrf
            <input type="text" name="user_razorpay_order_id" id="user_razorpay_order_id">
            <input type="text" name="user_razorpay_payment_id" id="user_razorpay_payment_id">
            <input type="text" name="project_id" id="user_project_id">
            <input type="text" name="plot_id" id="user_plot_id">
            <input type="text" name="client_id" id="user_client_id">
            <input type="text" name="amount" id="user_razorpay_amount">
            <button type="button"> Save</button>
            <!-- Add other necessary form fields here -->
        </form>
        <div class="col-md-12" style="margin-top:5vh;">
            <div class="panel panel-default">
                <h5 class="panel-title"
                    style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                    align="center">
                    <i class="fa fa-check"></i> &nbsp;Registration Checklist
                </h5>
            </div>
            <div class="col-md-12" style="margin-top: 2vh;margin-bottom: 10vh;">
                <table width="100%" border="1">
                    <tr style="background-color:#f0f0f0; height:30px;">
                        <th style="text-align:center">Particulars</th>
                        <th style="text-align:center">Status</th>
                        <th style="text-align:center">Collected By</th>
                        <th style="text-align:center">Collected Date</th>
                        <!-- <th  style="text-align:center">Payment Mode</th>
                                <th  style="text-align:center">Reference Number</th>
                                <th  style="text-align:center">Paid Amount</th>

                                <th  style="text-align:center">Action</th> -->
                    </tr>


                    <!-- <tr>
                                <td style="padding:5px;" align="center">
                                    <label>Payment made towards</label>
                                </td>
                                <td style="padding:5px;" align="center">
                                    <label>22-03-2024</label>
                                </td>
                                <td style="padding:5px;" align="center">
                                    <label>650000</label>
                                </td>
                                <td style="padding:5px;" align="center">
                                    <label>24-03-2024</label>
                                </td>

                            </tr> -->

                </table>
            </div>
        </div>
        <form id="razorpay-form" action="{{ route('razorpay.callback') }}" method="POST" style="display: none;">
            @csrf
            <input type="text" id="initial_enquiry_iduser" name="initial_enquiry_id" value="">
            <input type="text" id="installmentuser" name="installment" value="">
            <input type="text" name="date" id="razorpay_date" value="">
            <input type="text" name="payment_type" id="razorpay_payment_type" value="">
            <input type="text" name="paid_amount" id="razorpay_paid_amount" value="">
            <input type="text" name="bank_name" id="razorpay_bank_name" value="">
            <input type="text" name="account_no" id="razorpay_account_no" value="">
            <input type="text" name="cheque_no" id="razorpay_cheque_no" value="">
            <input type="text" name="ifsc" id="razorpay_ifsc" value="">
            <input type="text" name="remark" id="razorpay_remark" value="">
            <label> razorpay_order_id</label>
            <input type="text" name="razorpay_order_id" id="razorpay_order_id" value="">
            <label> razorpay_payment_id</label>
            <input type="text" name="razorpay_payment_id" id="razorpay_payment_id" value="">
            <label> razorpay_signature</label>
            <input type="text" name="razorpay_signature" id="razorpay_signature" value="">
            <button id="rzp-paymentresponse" type="button" class="btn btn-primary">
                <i class="fa fa-credit-card"></i> Pay Now
            </button>
        </form>
        <div class="col-md-12" style="margin-top:1vh;">
            <div class="panel panel-default">
                <h5 class="panel-title"
                    style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px; margin-top: 1vh;"
                    align="center">
                    <i class="fa fa-file"></i> &nbsp;Registration Document Uploads
                </h5>
            </div>

            <form id="upload-documents-form" action="{{ route('upload.documents') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-2" style="margin-top:5px;"></div>
                    <div class="col-md-3" style="margin-top:5px;">
                        <label for="registration_receipt">Registration Receipt</label>
                        <input type="file" class="form-control" name="documents[]" multiple>
                    </div>
                    <div class="col-md-1" style="margin-top:5px;"></div>
                    <div class="col-md-3" style="margin-top:5px;">
                        <label for="selected_scan_copies">Selected Scan Copies</label>
                        <input type="file" class="form-control" name="documents[]" multiple>
                        <input type="hidden" class="form-control" name="project_id" id="oother_project_id"
                            placeholder="" />
                        <input type="hidden" class="form-control" name="plot_id" id="oother_plot_id" placeholder="" />
                        <input type="hidden" class="form-control" name="client_id" id="oother_client_id"
                            placeholder="" />
                        <input type="hidden" class="form-control" name="firm_id" id="oother_firm_id" placeholder="" />
                    </div>
                    <div class="col-md-2" style="margin-top:21px;">
                        <button type="button" id="submit-documents" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="col-md-12" style="margin-top:1vh;">
            <div class="panel panel-default">
                <h5 class="panel-title"
                    style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                    align="center">
                    <i class="fa fa-file-text"></i> &nbsp;Documents
                </h5>
            </div>
            <div class="col-md-12" style="margin-top: 2vh;margin-bottom: 10vh;">
                <table width="100%" border="1">
                    <thead>
                        <tr style="background-color:#f0f0f0; height:30px;">
                            <th style="text-align:center">Document Name</th>
                            <th style="text-align:center">Updated By</th>
                            <th style="text-align:center">Updated Date</th>
                            <th style="text-align:center">Download</th>
                            <th style="text-align:center">Plot No</th>
                            <th style="text-align:center">Project Name</th>
                            <th style="text-align:center">Firm Name</th>
                        </tr>
                    </thead>
                    <tbody id="documents-table-body">
                        <!-- Dynamic content will be inserted here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- payment store model  start -->
    <!-- Store Installment Modal -->

    <!-- model here rezor pay or install ment store-->


    <div class="modal fade" id="storeInstallmentModal" tabindex="-1" role="dialog"
        aria-labelledby="storeInstallmentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="storeInstallmentModalLabel">Store Installment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="storeInstallmentForm" autocomplete="off" role="form" method="POST">
                        @csrf
                        <input type="hidden" id="initial_enquiry_id" name="initial_enquiry_id" value="">
                        <input type="hidden" id="installment" name="installment" value="">

                        <div class="row">
                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Date <font color="#FF0000">*</font></label>
                                <input type="date" id="date2" class="form-control" name="date" required>
                            </div>

                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Payment Type <font color="#FF0000">*</font></label>
                                <select id="payment_type2" class="form-control selectpicker" data-live-search="true"
                                    name="payment_type" required>
                                    <option value="">Select</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="NEFT / RTGS">NEFT / RTGS</option>
                                    <option value="UPI / WALLET">UPI / WALLET</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Amount <font color="#FF0000">*</font></label>
                                <input type="number" class="form-control" id="paid_amount2" name="paid_amount" required>
                            </div>

                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Bank Name</label>
                                <input type="text" id="bank_name2" class="form-control" name="bank_name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Acc No</label>
                                <input type="text" id="account_no2" class="form-control" name="account_no">
                            </div>

                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Cheque No</label>
                                <input type="text" id="cheque_no2" class="form-control" name="cheque_no">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6" style="margin-top:15px;">
                                <label>IFSC</label>
                                <input type="text" id="ifsc2" class="form-control" name="ifsc">
                            </div>

                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Remark</label>
                                <input type="text" id="remark2" class="form-control" name="remark">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12" style="margin-top:30px;" align="center">
                                <button type="button" id="submitForm" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Submit
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Razorpay Form -->


                    <!-- Razorpay Script -->


                </div>
            </div>
        </div>
    </div>


    <!-- payment store model  end -->

    <!-- payment edit model  start -->
    <!-- Edit Installment Modal -->
    <div class="modal fade" id="editInstallmentModal" tabindex="-1" role="dialog"
        aria-labelledby="editInstallmentModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editInstallmentModalLabel">Edit Installment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">


                    <form id="editInstallmentForm" autocomplete="off" role="form"
                        action="{{ route('update_installment') }}" method="POST">
                        @csrf
                        <input type="hidden" id="initial_enquiry_id_one" name="initial_enquiry_id">
                        <input type="hidden" id="installment_one" name="installment">
                        <div class="row">
                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Date <font color="#FF0000">*</font></label>
                                <input type="date" id="date1" class="form-control" name="date" required>
                            </div>
                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Payment Type <font color="#FF0000">*</font></label>
                                <select id="payment_type1" class="form-control selectpicker" data-live-search="true"
                                    name="payment_type" required>
                                    <option value="">Select</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Cheque">Cheque</option>
                                    <option value="NEFT / RTGS">NEFT / RTGS</option>
                                    <option value="UPI / WALLET">UPI / WALLET</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Amount <font color="#FF0000">*</font></label>
                                <input type="number" class="form-control" id="paid_amount1" name="paid_amount" required>
                            </div>
                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Bank Name</label>
                                <input type="text" id="bank_name1" class="form-control" name="bank_name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Acc No</label>
                                <input type="text" id="account_no1" class="form-control" name="account_no">
                            </div>
                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Cheque No</label>
                                <input type="text" id="cheque_no1" class="form-control" name="cheque_no">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6" style="margin-top:15px;">
                                <label>IFSC</label>
                                <input type="text" id="ifsc1" class="form-control" name="ifsc">
                            </div>
                            <div class="col-md-6" style="margin-top:15px;">
                                <label>Remark</label>
                                <input type="text" id="remark1" class="form-control" name="remark">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" style="margin-top:30px;" align="center">
                                <button type="button" id="submitEditForm" name="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Edit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="paymentSuccessModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Payment Successful</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your payment has been successfully processed. Thank you!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="window.location.reload();">Reload
                        Page</button>
                </div>
            </div>
        </div>
    </div>
    <!-- payment edit model  end -->
    <div style="position: fixed; bottom: 0; width: 100%;">
        <div class="col-md-12" style="width: 100%;">
            <div class="col-md-6" style="float: left; width: 50%;">
                @if ($errors->any())
                <div id="successscript" class="alert alert-danger mt-2"
                    style="background-color: rgba(209, 215, 209, 0.1); color: #1f1e1e; border: 1px solid #d6dad6; padding: 10px; border-radius: 5px;">
                    <ul style="margin: 0; padding: 0; list-style-type: none;">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
            </div>
            <div class="col-md-6" style="float: left; width: 50%;">
                @if(session('success'))
                <div id="successscript" class="alert alert-success"
                    style="background-color: rgba(209, 215, 209, 0.1); color: #1f1e1e; border: 1px solid #abafab; padding: 10px; border-radius: 5px;">
                    {{ session('success') }}
                </div>
                @endif
            </div>
        </div>
    </div>
</div>



</div>
</div>
@stop

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
    document.getElementById('razorpay_date').value = document.getElementById('date2').value;
    document.getElementById('razorpay_payment_type').value = document.getElementById('payment_type2').value;
    document.getElementById('razorpay_paid_amount').value = document.getElementById('paid_amount2').value;
    document.getElementById('razorpay_bank_name').value = document.getElementById('bank_name2').value;
    document.getElementById('razorpay_account_no').value = document.getElementById('account_no2').value;
    document.getElementById('razorpay_cheque_no').value = document.getElementById('cheque_no2').value;
    document.getElementById('razorpay_ifsc').value = document.getElementById('ifsc2').value;
    document.getElementById('razorpay_remark').value = document.getElementById('remark2').value;
</script>

<script>
    $(document).ready(function() {
    $('#firm-select').on('change', function() {
        var firmId = $(this).val();

        if (firmId) {
            $.ajax({
                url: '{{ route("projects.by.firm", ["firm_id" => "FIRM_ID"]) }}'.replace('FIRM_ID', firmId),
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var $projectSelect = $('#project-select');
                    $projectSelect.empty(); // Clear the dropdown
                    $projectSelect.append('<option value="">Select Option</option>');

                    $.each(data, function(key, project) {
                        $projectSelect.append('<option value="' + project.id + '">' + project.project_name + '</option>');
                    });

                    $projectSelect.selectpicker('refresh'); // Refresh Bootstrap Select
                },
                error: function(xhr, status, error) {
                    console.error("Error:", error);
                    alert("An error occurred while fetching projects.");
                }
            });
        } else {
            var $projectSelect = $('#project-select');
            $projectSelect.empty(); // Clear the dropdown
            $projectSelect.append('<option value="">Select Option</option>');
            $projectSelect.selectpicker('refresh'); // Refresh Bootstrap Select
        }
    });
});
</script>
<script>
    $(document).ready(function() {
    // Handle project select change
   $('#project-select').change(function() {
var projectId = $(this).val();
$.ajax({
type: "GET",
url: "{{ route('fetchPlotspaymentsection') }}",
data: { projectId: projectId },
success: function(response) {
var plotSelect = $('#plot-select');
plotSelect.empty(); // Clear existing options
plotSelect.append('<option value="">Select plot</option>');
$.each(response, function(index, plot) {
plotSelect.append('<option value="' + plot.plot_no + '">' + plot.plot_no + '</option>');
});
plotSelect.selectpicker('refresh'); // Refresh Bootstrap Select if needed
},
error: function(xhr, status, error) {
console.error(error);
}
});
});

    function setModalData(button) {
    var instNo = $(button).data('inst');
    var enquiryId = $(button).data('id');
    $('#installment').val(instNo);
    $('#initial_enquiry_id').val(enquiryId);
    $('#installmentuser').val(instNo);
    $('#initial_enquiry_iduser').val(enquiryId);
    }

    function setModalDataone(button) {
    var instNo = $(button).data('instone');
    var enquiryId = $(button).data('idone');
    var paidAmount = $(button).data('paid_amount');
    var payDate = $(button).data('pay_date').split(' ')[0];
    var paymentType = $(button).data('payment_type');
    var bankName = $(button).data('bank_name');
    var accountNo = $(button).data('account_no');
    var chequeNo = $(button).data('cheque_no');
    var ifsc = $(button).data('ifsc');
    var remark = $(button).data('remark');

    $('#installment_one').val(instNo);
    $('#initial_enquiry_id_one').val(enquiryId);
    $('#paid_amount1').val(paidAmount);
    $('#date1').val(payDate);
    $('#payment_type1').val(paymentType);
    $('#bank_name1').val(bankName);
    $('#account_no1').val(accountNo);
    $('#cheque_no1').val(chequeNo);
    $('#ifsc1').val(ifsc);
    $('#remark1').val(remark);

    // Ensure the correct option is selected in the payment_type dropdown
    $('#payment_type1 option').each(function() {
    if ($(this).val() == paymentType) {
    $(this).prop('selected', true);
    }
    });
    }

    function get_client_project() {
    var clientId = $('#client-select').val();
    var projectId = $('#project-select').val();
    var plotNo = $('#plot-select').val();

    $.ajax({
    url: '{{ route("getClientProjectPlotData") }}',
    type: 'GET',
    data: { client_id: clientId, project_id: projectId, plot_no: plotNo },
    success: function(response) {
    $('#dynamic-data').html(response.html);
    }
    });
    }

    function get_table_data() {
    var projectId = $('#project-select').val();
    var plotNo = $('#plot-select').val();

    $.ajax({
    url: '{{ route("getClientProjectPlotDatatwo") }}',
    type: 'GET',
    data: { project_id: projectId, plot_no: plotNo },
    success: function(response) {
    $('#dynamic-data-two').html(response.html);
    $('#dynamic-data-three').DataTable({
    "paging": true,
    "lengthChange": true,
    "searching": true,
    "ordering": true,
    "info": true,
    "autoWidth": false,
    "responsive": true,
    "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    });
    $('#dynamic-data-two').on('click', '.btn-info', function() {
    setModalData(this);
    });
    $('#dynamic-data-two').on('click', '.btn-info-one', function() {
    setModalDataone(this);
    });
    }
    });
    }

    $('#view-button').click(function(e) {
    e.preventDefault();
    var clientId = $('#client-select').val();
    var projectId = $('#project-select').val();
    var plotNo = $('#plot-select').val();
    get_client_project();
    get_table_data();
    });

    $('#submitEditForm').click(function(event) {
    event.preventDefault();
    var formData = $('#editInstallmentForm').serialize();
    $.ajax({
    url: '{{ route('update_installment') }}',
    method: 'POST',
    data: formData,
    success: function(response) {
    if (response.success) {
    alert(response.success);
    $('#editInstallmentModal').modal('hide');
    get_client_project();
    get_table_data();
    clearModalData();
    } else {
    alert(response.error || 'An error occurred');
    }
    },
    error: function(xhr) {
    var response = xhr.responseJSON;
    if (response && response.errors) {
    var errorMessage = 'Validation errors:\n';
    $.each(response.errors, function(key, errors) {
    errorMessage += errors.join('\n') + '\n';
    });
    alert(errorMessage);
    } else {
    alert('An error occurred');
    }
    }
    });
    });
    $('#submitForm').click(function(event) {
    event.preventDefault();

    var formData = $('#storeInstallmentForm').serialize();

    $.ajax({
    url: '{{ route('store_installment_of_user') }}',
    method: 'POST',
    data: formData,
    success: function(response) {
    if (response.success) {
    // alert(response.success);
    // Optionally close the modal

    // console.log(response);
    document.getElementById('razorpay_order_id').value = response.response.orderId;
$('#storeInstallmentModal').find('input[type="text"], input[type="date"], input[type="number"],select').val('').trigger('change');
$('#storeInstallmentModal').modal('hide');
    initRazorpay(response);
    get_client_project();
    get_table_data();
     clearModalData();

    // Optionally update the page content dynamically
    } else {
    alert(response.error || 'An error occurred');
    }
    },
    error: function(xhr) {
    var response = xhr.responseJSON;
    if (response && response.errors) {
    var errorMessage = 'Validation errors:\n';
    $.each(response.errors, function(key, errors) {
    errorMessage += errors.join('\n') + '\n';
    });
    alert(errorMessage);
    } else {
    alert('An error occurred');
    }
    }
    });
    });

    function clearModalData() {
    // Clear the form fields
    $('#installment_one').val('');
    $('#initial_enquiry_id_one').val('');
    $('#paid_amount').val('');
    $('#date').val('');
    $('#payment_type').val('').trigger('change');
    $('#bank_name').val('');
    $('#account_no').val('');
    $('#cheque_no').val('');
    $('#ifsc').val('');
    $('#remark').val('');
    }
    function initRazorpay(response) {
    var options = {
    "key": "{{ env('RAZORPAY_KEY_ID') }}",
    "amount": document.getElementById('razorpay_paid_amount').value * 100,
    "name": "Nile Properties",
    "description": document.getElementById('installment').value + " Installment transaction",
    "image": "{{ asset('panel/logo/favicon.png') }}",
    "order_id": response.orderId,
    "handler": function(response) {
    console.log("Razorpay Payment Successful:", response);

    // Populate hidden fields with Razorpay response data
    document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
    document.getElementById('razorpay_signature').value = response.razorpay_signature || '';

    // Submit the form via AJAX
    $.ajax({
    url: '{{ route('razorpay.callback') }}',
    method: 'POST',
    data: $('#razorpay-form').serialize(),
    timeout: 30000, // 30 seconds timeout
    success: function(response) {
    if (response.success) {
    get_client_project();
    get_table_data();
    clearModalData();
    alert('Payment completed successfully!');
    } else {
    alert('Error: ' + (response.error || 'An error occurred'));
    }
    },
    error: function(xhr) {
    var response = xhr.responseJSON;
    if (response && response.error) {
    alert('Error: ' + response.error);
    } else {
    alert('An error occurred while processing the payment.');
    }
    }
    });
    },
    "prefill": {
    "name": "{{ auth()->user()->name }}",
    "email": "{{ auth()->user()->email }}"
    },
    "theme": {
    "color": "#3399cc"
    }
    };

    var rzp = new Razorpay(options);
    rzp.open();
    }

    // Show modal
    function showModal() {
    $('#myModal').modal('show');
    }

    // Handle form submission
    $('#storeInstallmentForm').on('submit', function(e) {
    e.preventDefault();
    showModal();
    });


    });
</script>
<script>
    $(document).ready(function() {
        const routeUrl = "{{ route('get.other.charges') }}";
        const createOrderUrl = "{{ route('user.create.razorpay.order') }}";

        // Handle view button click to fetch charges data
        $('#view-button').on('click', function() {
            const projectId = $('#project-select').val();
            const plotId = $('#plot-select').val();
            const clientId = $('#client-select').val();

            const url = `${routeUrl}?project_id=${projectId}&plot_id=${plotId}&client_id=${clientId}`;

            $.ajax({
                url: url,
                method: 'GET',
                success: function(data) {
                    const tbody = $('#charges-table-body');
                    tbody.empty(); // Clear existing content

                    data.forEach(function(item) {
                        const row = `
                            <tr>
                                <td style="padding:5px;" align="center"><label>${item.payment_type}</label></td>
                                <td style="padding:5px;" align="center"><label>${item.date}</label></td>
                                <td style="padding:5px;" align="center" class="amount-cell">
                                    <a href="#" class="btn btn-link"
                                        data-amount="${item.amount}"
                                        data-project-id="${projectId}"
                                        data-plot-id="${plotId}"
                                        data-client-id="${clientId}">${item.amount}</a>
                                </td>
                                <td style="padding:5px;" align="center"><label>${item.status}</label></td>
                                <td style="padding:5px;" align="center"><label>${item.plot_no}</label></td>
                                <td style="padding:5px;" align="center"><label>${item.project_name}</label></td>
                                <td style="padding:5px;" align="center"><label>${item.firm_name}</label></td>
                            </tr>
                        `;
                        tbody.append(row);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('There was a problem with the AJAX request:', error);
                }
            });
        });

        // Handle amount cell click to trigger Razorpay order creation
     $('#charges-table-body').on('click', '.amount-cell a', function(event) {
    event.preventDefault();

    const amount = $(this).data('amount');
    const projectId = $(this).data('project-id');
    const plotId = $(this).data('plot-id');
    const clientId = $(this).data('client-id');

    // Set the values to the form fields before making the AJAX call
    $('#user_razorpay_amount').val(amount);
    $('#user_project_id').val(projectId);
    $('#user_plot_id').val(plotId);
    $('#user_client_id').val(clientId);

    $.ajax({
    url: createOrderUrl,
    method: 'POST',
    data: {
    amount: amount,
    project_id: projectId,
    plot_id: plotId,
    client_id: clientId,
    _token: '{{ csrf_token() }}'
    },
    success: function(response) {
    // Set the returned order_id in the hidden field
    $('#user_razorpay_order_id').val(response.order_id);

    // Now you can trigger the Razorpay payment modal here
  const options = {
    "key": "{{ env('RAZORPAY_KEY') }}", // Your Razorpay Key
    "amount": amount * 100, // Amount is in paise
    "currency": "INR",
    "name": "Nile Properties",
    "description": "Other Charges",
    "image": "{{ asset('panel/logo/favicon.png') }}",
    "order_id": response.order_id, // This is a Razorpay order_id
    "handler": function (response) {
    // Set the payment_id and order_id in the hidden fields
    $('#user_razorpay_order_id').val(response.razorpay_order_id);
    $('#user_razorpay_payment_id').val(response.razorpay_payment_id);

    // Submit the form via AJAX
    $.ajax({
    url: $('#user-razorpay-form').attr('action'),
    method: 'POST',
    data: $('#user-razorpay-form').serialize(),
    success: function(response) {
    // Show success or failure alert based on the response
    if (response.success) {
    alert(response.message); // Success alert
    $('#view-button').trigger('click');
    } else {
    alert(response.message); // Failure alert
    }
    },
    error: function(xhr, status, error) {
    alert('An error occurred. Please try again later.'); // Error alert
    }
    });
    },
    "prefill": {
    "name": "{{ auth()->user()->name }}",
    "email": "{{ auth()->user()->email }}"
    },
    "theme": {
    "color": "#3399cc"
    }
    };

    // Create and open Razorpay instance
    const rzp1 = new Razorpay(options);
    rzp1.open();

    },
    error: function(xhr, status, error) {
    console.error('Error generating order ID:', error);
    }
    });
    });
        // Optional: Update hidden fields on change of select boxes
        $('#project-select').on('change', function() {
            $('#other_project_id').val($(this).val());
        });
        $('#plot-select').on('change', function() {
            $('#other_plot_id').val($(this).val());
        });
        $('#client-select').on('change', function() {
            $('#other_client_id').val($(this).val());
        });
        $('#firm-select').on('change', function() {
            $('#other_firm_id').val($(this).val());
        });

        $('#project-select').on('change', function() {
            $('#oother_project_id').val($(this).val());
            });
            $('#plot-select').on('change', function() {
            $('#oother_plot_id').val($(this).val());
            });
            $('#client-select').on('change', function() {
            $('#oother_client_id').val($(this).val());
            });
            $('#firm-select').on('change', function() {
            $('#oother_firm_id').val($(this).val());
            });
    });
</script>
<script>
    $(document).ready(function() {
    $('#submit_other_charges').on('click', function() {
    var form = $('#other-charges-form');
    var formData = form.serialize();

    $.ajax({
    type: "POST",
    url: form.attr('action'),
    data: formData,
    success: function(response) {
    if (response.success) {
    // Construct the new row
    var newRow = `
    <tr>
        <td style="padding:5px;" align="center"><label>${response.data.charges_id}</label></td>
        <td style="padding:5px;" align="center"><label>${new Date().toISOString().split('T')[0]}</label></td>
        <td style="padding:5px;" align="center"><label>${response.data.amount}</label></td>
        <td style="padding:5px;" align="center"><label>${response.data.plot_id}</label></td>
        <td style="padding:5px;" align="center"><label>${response.data.project_name}</label></td>
        <td style="padding:5px;" align="center"><label>${response.data.firm_name}</label></td>
    </tr>
    `;

    // Append the new row to the table
    $('#charges-table-body').append(newRow);

    // Optionally, clear the form fields after submission
    form[0].reset();
    } else {
    alert('Failed to save charges.');
    }
    },
    error: function(xhr, status, error) {
    console.error('There was a problem with the AJAX request:', error);
    }
    });
    });
    });
</script>

<script>
    $(document).ready(function() {
        $('#submit-documents').on('click', function() {
            var form = $('#upload-documents-form')[0];
            var formData = new FormData(form);

            $.ajax({
                type: "POST",
                url: $(form).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (Array.isArray(response) && response.length > 0) {
                        var documentsTableBody = $('#documents-table-body');

                        // Clear existing content if needed
                        // documentsTableBody.empty();

                        // Append new documents to the table
                        response.forEach(function(document) {
                            // Use the asset helper to construct the document path
                            var documentPath = `{{ asset('documents/${document.document_name}') }}`;
                            var row = `
                                <tr>
                                    <td style="padding:5px;" align="center"><label>${document.document_name}</label></td>
                                    <td style="padding:5px;" align="center"><label>${document.updated_by}</label></td>
                                    <td style="padding:5px;" align="center"><label>${document.updated_date}</label></td>
                                    <td style="padding:5px;" align="center">
                                        <a style="color:blue;" href="${documentPath}" target="_blank">Download</a>
                                    </td>
                                    <td style="padding:5px;" align="center"><label>${document.plot_no}</label></td>
                                    <td style="padding:5px;" align="center"><label>${document.project_name}</label></td>
                                    <td style="padding:5px;" align="center"><label>${document.firm_name}</label></td>
                                </tr>
                            `;
                            documentsTableBody.append(row);
                        });

                        // Optionally, clear the form fields after submission
                        form.reset();
                    } else {
                        alert('Failed to upload documents.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('There was a problem with the AJAX request:', error);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
const routeUrl = "{{ route('document.fetch') }}";

$('#view-button').on('click', function() {
const projectId = $('#project-select').val();
const plotId = $('#plot-select').val();
const clientId = $('#client-select').val();

const url = `${routeUrl}?project_id=${projectId}&plot_id=${plotId}&client_id=${clientId}`;

$.ajax({
url: url,
method: 'GET',
success: function(data) {
console.log(data); // Log the response for debugging
var documentsTableBody = $('#documents-table-body');
documentsTableBody.empty(); // Clear existing content

if (Array.isArray(data) && data.length > 0) {
data.forEach(function(document) {
// Construct the full URL for the document
var documentPath = `{{ asset('documents') }}/${document.document_name}`;
var row = `
<tr>
    <td style="padding:5px;" align="center"><label>${document.document_name}</label></td>
    <td style="padding:5px;" align="center"><label>${document.clientname ? document.clientname.name :
            'N/A'}</label></td>
    <td style="padding:5px;" align="center"><label>${new Date(document.created_at).toLocaleDateString()}</label></td>
    <td style="padding:5px;" align="center">
        <a href="${documentPath}" style="color:blue;" target="_blank">Download</a>
    </td>
    <td style="padding:5px;" align="center"><label>${document.plotname.plot_no}</label></td>
    <td style="padding:5px;" align="center"><label>${document.projectname ? document.projectname.project_name :
            'N/A'}</label></td>
    <td style="padding:5px;" align="center"><label>${document.firmname ? document.firmname.name : 'N/A'}</label>
    </td>
</tr>
`;
documentsTableBody.append(row);
});
} else {
// documentsTableBody.append('<tr><td colspan="7" align="center">No documents found</td></tr>');
}
},
error: function(xhr, status, error) {
console.error('There was a problem with the AJAX request:', error);
}
});
});
});
</script>
<script>
    $(document).ready(function() {
    $('#plot-select').change(function() {
        var plotNo = $(this).val(); // Get selected plot number

        $.ajax({
            type: "GET",
            url: "{{ route('getClientIdByPlot') }}", // Route to be created
            data: { plot_no: plotNo }, // Send plot number as a parameter
            success: function(response) {
                var clientSelect = $('#client-select');
                clientSelect.empty(); // Clear the dropdown

                if (response.clients && response.clients.length > 0) {
                    // Append each client ID and name to the dropdown
                    clientSelect.append('<option value="">select client</option>');
                    $.each(response.clients, function(index, client) {
                        clientSelect.append('<option value="' + client.client_id + '">' + client.client_name + '</option>');
                    });
                } else {
                    clientSelect.append('<option value="">No clients found</option>');
                }
                clientSelect.selectpicker('refresh'); // Refresh Bootstrap Select
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
                alert("An error occurred while fetching the client information.");
            }
        });
    });
});
</script>

<script>
    // Function to sync form fields between storeInstallmentForm and razorpay-form
    function syncField(sourceId, targetId) {
    document.getElementById(targetId).value = document.getElementById(sourceId).value;
    }

    // Attach event listeners to all input fields in the storeInstallmentForm
    document.getElementById('initial_enquiry_id').addEventListener('input', function() {
    syncField('initial_enquiry_id', 'razorpay_initial_enquiry_id');
    });

    document.getElementById('installment').addEventListener('input', function() {
    syncField('installment', 'razorpay_installment');
    });

    document.getElementById('date2').addEventListener('input', function() {
    syncField('date2', 'razorpay_date');
    });

  // Sync dropdown (select) field between storeInstallmentForm and razorpay-form
document.getElementById('payment_type2').addEventListener('change', function() {
document.getElementById('razorpay_payment_type').value = this.value;
});
    document.getElementById('paid_amount2').addEventListener('input', function() {
    syncField('paid_amount2', 'razorpay_paid_amount');
    });

    document.getElementById('bank_name2').addEventListener('input', function() {
    syncField('bank_name2', 'razorpay_bank_name');
    });

    document.getElementById('account_no2').addEventListener('input', function() {
    syncField('account_no2', 'razorpay_account_no');
    });

    document.getElementById('cheque_no2').addEventListener('input', function() {
    syncField('cheque_no2', 'razorpay_cheque_no');
    });

    document.getElementById('ifsc2').addEventListener('input', function() {
    syncField('ifsc2', 'razorpay_ifsc');
    });

    document.getElementById('remark2').addEventListener('input', function() {
    syncField('remark2', 'razorpay_remark');
    });
</script>
{{-- <script>
    function initRazorpay(response) {
        var options = {
            "key": "{{ env('RAZORPAY_KEY_ID') }}",
            "amount": document.getElementById('razorpay_paid_amount').value * 100,
            "name": "Nile Properties",
            "description": document.getElementById('installment').value + " Installment transaction",
            "image": "{{ asset('panel/logo/favicon.png') }}",
            "order_id": response.orderId,
            "handler": function(response) {
                console.log("Razorpay Payment Successful:", response);

                // Populate hidden fields with Razorpay response data
                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                document.getElementById('razorpay_signature').value = response.razorpay_signature || '';

                // Submit the form via AJAX
                $.ajax({
                    url: '{{ route('razorpay.callback') }}',
                    method: 'POST',
                    data: $('#razorpay-form').serialize(),
                    timeout: 30000, // 30 seconds timeout
                    success: function(response) {
                        if (response.success) {
                            // Delay the execution of subsequent functions by 5 seconds
                            //  setTimeout(function() {
                                get_client_project();
                                get_table_data();
                                clearModalData();
                                alert('Payment completed successfully!');
                            // }, 5000); // 5000 milliseconds = 5 seconds
                        } else {
                            alert('Error: ' + (response.error || 'An error occurred'));
                        }
                    },
                    error: function(xhr) {
                        var response = xhr.responseJSON;
                        if (response && response.error) {
                            alert('Error: ' + response.error);
                        } else {
                            alert('An error occurred while processing the payment.');
                        }
                    }
                });
            },
            "prefill": {
                "name": "{{ auth()->user()->name }}",
                "email": "{{ auth()->user()->email }}"
            },
            "theme": {
                "color": "#3399cc"
            }
        };

        var rzp = new Razorpay(options);
        rzp.open();
    }

    function showModal() {
        $('#myModal').modal('show');
    }

    $(document).ready(function() {
        $('#storeInstallmentForm').on('submit', function(e) {
            e.preventDefault();
            showModal();
        });
    });
</script> --}}
@endsection