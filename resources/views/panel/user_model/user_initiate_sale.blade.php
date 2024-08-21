@extends('panel.layout.user_model_layout')

@section('main_container')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    .details {
        display: none;
        position: absolute;
        background-color: white;
        border: 1px solid #ccc;
        padding: 10px;
        z-index: 1000;
    }

    .table-hover-row:hover .details {
        display: block;
    }

    #fileViewer {
        width: 100%;
        height: 100%;
        object-fit: contain;
        /* Ensures the image scales proportionally and fits within its container */
    }
</style>
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12" style="margin-top:5px;">
            <div class="panel panel-default">
                <form action="{{ route('user_model.userinitiatesalestore') }}" method="post"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="col-md-12" align="center" style="margin-top: 2vh;">

                        <!-- START DEFAULT DATATABLE -->
                        <div class="col-md-12" align="center">
                            <div class="icon-box-container" style="margin-left: 16%;">

                                <div class="icon-box box-3" style="padding: 1vh;">
                                    <a href="{{ route('user_model.initiatesale') }}">
                                        <img src="{{ asset('panel/assets/images/cards/13.png') }}" alt=""
                                            class="classic-1">
                                        <p class="classic">ADD NEW SALE</p>
                                    </a>
                                </div>

                                <div style="margin-top: 10vh;font-size: large;">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                </div>
                                <div class="icon-box box-1" style="padding: 1vh;">
                                    <a href="{{ route('user_model.newsale') }}">
                                        <img src="{{ asset('panel/assets/images/cards/9.png') }}" alt=""
                                            class="classic-1">
                                        <p class="classic">NEW SALE CONFIRMED</p>
                                    </a>
                                </div>

                                <div style="margin-top: 10vh;font-size: large;">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                </div>
                                <div class="icon-box box-2">
                                    <a href="{{ route('user_model.paymentcollection') }}">
                                        <img src="{{ asset('panel/assets/images/cards/7.png') }}" alt=""
                                            class="classic-1">
                                        <p class="classic">PAYMENT COLLECTION</p>
                                    </a>

                                </div>
                                <div style="margin-top: 10vh;font-size: large;">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                </div>
                                <div class="icon-box box-3">
                                    <a href="{{ route('user_model.registration') }}">
                                        <img src="{{ asset('panel/assets/images/cards/11.png') }}" alt=""
                                            class="classic-1">
                                        <p class="classic">REQUEST FOR REGISTRATION</p>
                                    </a>

                                </div>
                                {{-- <div style="margin-top: 10vh;font-size: large;">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                </div> --}}

                                {{-- <div class="icon-box box-1">
                                    <a href="{{ route('user_model.account') }}">
                                        <img src="{{ asset('panel/assets/images/cards/6.png') }}" alt=""
                                            class="classic-1">
                                        <p class="classic">ACCOUNTS CLEARANCE</p>
                                    </a>

                                </div> --}}
                                <div style="margin-top: 10vh;font-size: large;">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                </div>
                                <div class="icon-box box-2">
                                    <a href="{{ route('user_model.legalclearance') }}">
                                        <img src="{{ asset('panel/assets/images/cards/4.png') }}" alt=""
                                            class="classic-1">
                                        <p class="classic">LEGAL CLEARANCE</p>
                                    </a>

                                </div>
                                <div style="margin-top: 10vh;font-size: large;">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                </div>
                                <div class="icon-box box-3">
                                    <a href="{{ route('user_model.registrationcompleted') }}">
                                        <img src="{{ asset('panel/assets/images/cards/8.png') }}" alt=""
                                            class="classic-1">
                                        <p class="classic">REGISTRATION COMPLETED</p>
                                    </a>

                                </div>
                                <div style="margin-top: 10vh;font-size: large;">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                </div>
                                <div class="icon-box box-1">
                                    <a href="{{ route('user_model.saledeedscan') }}">
                                        <img src="{{ asset('panel/assets/images/cards/12.png') }}" alt=""
                                            class="classic-1">
                                        <p class="classic">SALEDEED SCAN</p>
                                    </a>

                                </div>
                                <div style="margin-top: 10vh;font-size: large;">
                                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                                </div>
                                <div class="icon-box box-2">
                                    <a href="{{ route('user_model.handover') }}">
                                        <img src="{{ asset('panel/assets/images/cards/10.png') }}" alt=""
                                            class="classic-1">
                                        <p class="classic">HANDOVER COMPLETE</p>
                                    </a>

                                </div>



                                <!-- Add more boxes as needed -->
                            </div>
                        </div>



                    </div>

                    <h5 class="panel-title"
                        style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 2vh; margin-bottom:5px;"
                        align="center">
                        <i class="fa fa-user"></i> &nbsp;Select Existing Customer Or New Customer
                    </h5>

                    <div class="row">
                        <div class="col-md-12" style="margin-top: 2vh;">

                            <div class="col-md-5"></div>
                            <div class="col-md-2">
                                <label class="control-label" style="margin-left: 5px;">Select
                                    Existing
                                    Customer<font color="#000099">
                                    </font></label>
                                {{-- <select id="client-select" class="form-control select" data-live-search="true">
                                    <option value="">Select a client</option>
                                    @foreach($enquiries as $enquiry)
                                    <option value="{{ $enquiry->client_name->id }}"
                                        data-client-name="{{ $enquiry->client_name->name }}"
                                        data-client-phone="{{ $enquiry->client_name->contact }}"
                                        data-client-address="{{ $enquiry->client_name->address }}"
                                        data-client-sponsor="{{ $enquiry->broker_id ?? '' }}">
                                        {{ $enquiry->client_name->name }}
                                    </option>
                                    @endforeach
                                </select> --}}
                                <select id="client-select" class="form-control select" data-live-search="true">
                                    <option value="">Select a client</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id ?? ''}}" data-client-name="{{ $client->name ?? ''}}"
                                        data-client-phone="{{ $client->contact ?? ''}}"
                                        data-client-address="{{ $client->address ?? ''}}"
                                        data-client-sponsor="{{ $client->sponsor_id ?? '' ?? ''}}"
                                        data-title="{{ $client->title ?? ''}}"
                                        data-occupation="{{ $client->occupation_name->occupation ?? ''}}"
                                        data-occupation-id="{{ $client->occupation_name->id ?? ''}}"
                                        data-email="{{ $client->email ?? ''}}" data-city="{{ $client->city ?? ''}}"
                                        data-pin-code="{{ $client->pin_code ?? ''}}" data-age="{{ $client->age ?? ''}}"
                                        data-dob="{{ $client->dob ?? ''}}"
                                        data-marriage-date="{{ $client->marriage_date ?? ''}}"
                                        data-branch-id="{{ $client->branch_name->id ?? ''}}"
                                        data-branch="{{ $client->branch_name->branch ?? ''}}"
                                        data-aadhar="{{ $client->aadhar ?? ''}}"
                                        data-aadhar-no="{{ $client->aadhar_no ?? ''}}"
                                        data-pan="{{ $client->pan ?? ''}}" data-pan-no="{{ $client->pan_no ?? ''}}"
                                        data-client-id="{{ $client->id ?? ''}}"
                                        data-marital-status="{{ $client->marital_status ?? ''}}">
                                        {{ $client->name ?? '' }}
                                    </option>
                                    @endforeach
                                </select>




                            </div>
                            <div class="col-md-3">
                                <button id="add-client-btn" type="button" class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;margin-top: 3vh;">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                            <div class="col-md-2"></div>
                        </div>

                    </div>
                    <div class="col-md-12" style="margin-top: 3vh;">
                        <label class="control-label" style="text-align: center; display: block;">
                            Fill New Customer Details<font color="#000099"></font>
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 2vh;">
                            <table width="100%">
                                <tr style="height:30px;">
                                    <th width="1%">Title</th>
                                    <th width="3%">Name</th>
                                    <th width="2%">Occupation</th>
                                    <th width="3%">Email</th>
                                    <th width="2%">Mobile No.</th>
                                    <th width="2%">City/Village</th>
                                    <th width="1%">Pincode</th>
                                    <th width="3%">Address</th>
                                    <th width="1%">Age</th>


                                </tr>


                                <tr>
                                    <td style="padding: 2px;" width="1%">
                                        <select class="form-control select" data-live-search="true" id="title"
                                            name="title">
                                            <option value="">Select Option</option>
                                            <option>Mr.</option>
                                            <option>Mrs.</option>
                                            <option>Ku.</option>
                                            <option>Shri.</option>
                                            <option>Miss</option>
                                            <option>Mast.</option>
                                            <option>Smt.</option>

                                        </select>
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <input type="text" class="form-control" id="name" value="" />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <select class="form-control select" data-live-search="true" id="occupation_id">
                                            {{-- <option>Govt</option>
                                            <option>Business</option>
                                            <option>Other</option> --}}
                                            <option value="">Select Option</option>
                                            @foreach ($occupation as $occupation_name)
                                            <option value="{{$occupation_name->id}}">
                                                {{$occupation_name->occupation}}</option>

                                            @endforeach


                                        </select>
                                    </td>
                                    <td style="padding: 2px;" width="3%">
                                        <input type="text" class="form-control" id="email" value="" />
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <input type="text" class="form-control" maxlength="10" id="contact" value="" />
                                    </td>
                                    <td style="padding: 2px;" width="3%">
                                        <input type="text" class="form-control" id="city" value="" />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" id="pin_code" value="" />
                                    </td>
                                    <td style="padding: 2px;" width="3%">
                                        <input type="text" class="form-control" id="address" value="" />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" id="age" value="" />
                                    </td>
                                </tr>

                            </table>
                            <table style="width:100%;border-collapse:collapse;">
                                <tr style="height:30px;">
                                    <th style="padding:5px;text-align:left;">DOB</th>
                                    <th style="padding:5px;text-align:left;">Select Marital Status</th>
                                    <th style="padding:5px;text-align:left;">Marriage Date</th>
                                    <th style="padding:5px;text-align:left;">Branch</th>
                                    <th style="padding:5px;text-align:left;">AADHAR</th>
                                    <th style="padding:5px;text-align:left;">AADHAR No.</th>
                                    <th style="padding:5px;text-align:left;">PAN</th>
                                    <th style="padding:5px;text-align:left;">PAN No.</th>
                                    <th style="padding:5px;text-align:left;"></th>
                                </tr>
                                <tr>
                                    {{-- <td style="padding:2px;">
                                        <div style="width:100%;" class="input-group">
                                            <input type="date" class="form-control" id="dob" value="" />
                                        </div>
                                    </td> --}}
                                    <td style="padding: 2px;">
                                        <div class="input-group" style="width:100%;">
                                            <input type="text" id="dob" value="{{ old('dob') }}" name="dob"
                                                class="form-control datepicker" placeholder="DD/MM/YYYY" />
                                            <div class="" style="padding: 5px;">
                                                <span class="input-group-text" style="font-size: 20px;  "></span>
                                            </div>
                                        </div>


                                    </td>
                                    <td style="padding:2px;">
                                        <select id="marital_status" name="marital_status" id="marital_status"
                                            class="form-control" onchange="toggleMarriageDate()">
                                            <option value="">Select Option</option>
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="divorced">Divorced</option>
                                            <option value="widowed">Widowed</option>
                                        </select>
                                    </td>
                                    {{-- <td style="padding:2px;">
                                        <div style="width:100%;" class="input-group">
                                            <input type="date" id="marriage_date" class="form-control"
                                                name="marriage_date" value="{{ old('marriage_date') }}" />
                                        </div>
                                    </td> --}}
                                    <td style="padding: 2px;">
                                        <div class="input-group" style="width:100%;">
                                            <input type="text" id="marriage_date" value="{{ old('marriage_date') }}"
                                                name="marriage_date" class="form-control datepicker"
                                                placeholder="DD/MM/YYYY" />
                                            <div class="" style="padding: 5px;">
                                                <span class="input-group-text" style="font-size: 20px;  "></span>
                                            </div>
                                        </div>


                                    </td>
                                    <td style="padding:2px;">
                                        <select style="width:100%;" class="form-control select" data-live-search="true"
                                            name="branch_id" id="branch_id">
                                            <option value="">Select Option</option>
                                            @foreach ($branch as $branch_name)
                                            <option value="{{$branch_name->id}}">{{$branch_name->branch}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="padding:2px;">
                                        <input type="file" class="form-control" id="aadhar" value="" />
                                    </td>
                                    <td style="padding:2px;">
                                        <input type="text" class="form-control" id="aadhar_no" value="" />
                                    </td>
                                    <td style="padding:2px;">
                                        <input type="file" class="form-control" id="pan" value="" />
                                    </td>
                                    <td style="padding:2px;">
                                        <input type="text" class="form-control" id="pan_no" value="" />
                                    </td>
                                    <td style="padding:2px;">
                                        <button id="submitbuttonappend" type="button" class="btn"
                                            style="color:#FFFFFF;height:30px;width:auto;background-color:#006699;">
                                            <i class="fa fa-floppy-o" aria-hidden="true"></i> ADD
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <h5 class="panel-title"
                        style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 2vh; margin-bottom:5px;"
                        align="center">
                        <i class="fa fa-user"></i> &nbsp;Customer Details
                    </h5>
                    <table class="table table-bordered mt-3" width="100%" border="1">
                        <thead>
                            <tr style="background-color:#f0f0f0 ; height:30px !important;" border="2">
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    Title</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    Name</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    Occupation</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    Email</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    Mobile No.</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    City/Village</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    Pincode</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    Address</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    Age
                                </th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    DOB
                                </th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    Marital Status</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    Marriage Date</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    Branch</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    AADHAR</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    AADHAR No.</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    PAN
                                </th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    PAN
                                    No.</th>
                                <th
                                    style="background-color:#f0f0f0; color:black!important; border-block: 1px; height:30px;">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody id="customerTableBody">
                            <!-- Rows will be added here -->
                        </tbody>
                    </table>

                    <div class="row" style="display: none;" style="margin-top: 2vh;">
                        <div class="col-md-12">
                            <table id="client-details-table" width="100%" border="1">
                                <thead>
                                    <tr style="background-color:#f0f0f0; height:30px;">
                                        <th style="text-align:center">Client Name</th>
                                        <th style="text-align:center">Mobile No</th>
                                        <th style="text-align:center">Address</th>
                                        <th style="text-align:center">Sponsor ID</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Client details will be appended here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row" style="margin-top: 1vh;">
                        <h5 class="panel-title"
                            style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                            align="center">
                            <i class="fa fa-user"></i> &nbsp;Nominee Details
                        </h5>

                        <div class="col-md-12" style="margin-top: 2vh;">
                            <table width="100%">
                                <tr style="height:30px;">
                                    <th width="2%">Nominee's Name</th>
                                    <th width="1%">Nominee's Age</th>
                                    <th width="3%">Nominee's Relation</th>
                                    <th width="2%">Nominee's DOB</th>
                                    <th width="2%">AADHAR No.</th>
                                    <th width="1%">PAN No.</th>
                                    <th width="1%"></th>
                                </tr>
                                <tr>
                                    <td style="padding: 2px;" width="2%">
                                        <input type="text" class="form-control" id="nominee-name" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <input type="number" class="form-control" id="nominee-age" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <select class="form-control select" data-live-search="true"
                                            id="nominee-relation">
                                            <option value="">Select Option</option>
                                            <option>Father</option>
                                            <option>Wife</option>
                                            <option>Mother</option>
                                            <option>Son</option>
                                        </select>
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <div class="input-group" style="display: flex;">
                                            <input type="text" id="nominee-dob" class="form-control datepicker"
                                                placeholder="DD/MM/YYYY" />
                                            <div class="input-group-append" style="padding: 5px;">
                                                <span class="input-group-text" style="font-size: 20px;  "><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <input type="text" class="form-control" id="nominee-aadhar" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" id="nominee-pan" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <button id="add-nominee-btn" type="button" class="btn mjks"
                                            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-12" style="margin-top: 1vh;">
                            <table id="nominee-details-table" width="100%" border="1">
                                <thead>
                                    <tr style="background-color:#f0f0f0; height:30px;">
                                        <th style="text-align:center">
                                            Nominee's Name</th>
                                        <th style="text-align:center">Nominee's Age</th>
                                        <th style="text-align:center">Nominee's Relation</th>
                                        <th style="text-align:center"> Nominee's DOB</th>
                                        <th style="text-align:center">AADHAR No.</th>
                                        <th style="text-align:center">PAN No.</th>
                                        <th style="text-align:center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Nominee details will be appended here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <h5 class="panel-title"
                            style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 2vh;"
                            align="center">
                            <i class="fa fa-list"></i> &nbsp;Project Details
                        </h5>

                        <div class="col-md-12" style="margin-top: 2vh;">
                            <table width="100%">
                                <tr style="height:30px;">
                                    <th width="2%">Firm</th>
                                    <th width="2%">Project</th>
                                    <th width="2%">Plot No.</th>
                                    <th width="1%">Measurement (ft x ft)</th>
                                    <th width="2%">Square Meter</th>

                                    <th width="1%">Square Ft</th>
                                    <th width="1%">Rate(per Sq Ft)</th>
                                    <th width="1%">Total Cost</th>
                                    <th width="1%">Discount Amount</th>
                                    <th width="1%">Discount Type</th>
                                </tr>


                                <tr>
                                    <td style="padding: 2px;" width="2%">
                                        <select id="firm-select" name="firm_id" class="form-control select"
                                            data-live-search="true">
                                            <option value="">Select Option</option>
                                            @foreach($firm as $firm)
                                            <option value="{{ $firm->id }}" data-project-id="{{ $firm->id }}">{{
                                                $firm->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td style="padding: 2px;" width="2%">
                                        <select id="project-select" name="project_id" class="form-control select"
                                            data-live-search="true">
                                            <option value="">Select Option</option>
                                        </select>
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <select id="plot-select" name="plot_no" class="form-control select"
                                            data-live-search="true">
                                            <option value="">Select Option</option>
                                            <!-- Plot options will be appended dynamically -->
                                        </select>
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" id="Measurement" name="Measurement"
                                            placeholder="" required />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" id="square_meter" name="square_meter"
                                            placeholder="" oninput="convertSquareUnits(); " required />
                                    </td>

                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" id="square_ft" name="square_ft"
                                            placeholder="" oninput="convertSquareUnits(); calculateAmounts()"
                                            required />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" id="rate" name="rate" placeholder=""
                                            oninput="calculateAmounts()" required />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <label id="total_cost" class="control-label">
                                            <input id="total_cost_input" type="hidden" id="total_cost"
                                                name="total_cost">
                                            <font id="total_cost_display" id="total_cost" color="#ff0000"></font>
                                        </label>
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" name="discount_amount" placeholder=""
                                            oninput="calculateAmounts()" required />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <select class="form-control select" data-live-search="true" name="discount_type"
                                            id="discount_type" onchange="calculateAmounts()">
                                            <option value="">Select Option</option>
                                            <option value="%">%</option>
                                            <option value="₹">₹</option>
                                        </select>
                                    </td>

                                </tr>

                            </table>

                            <table width="100%">
                                <tr style="height:30px;">
                                    <th width="1%">Final Amount</th>
                                    <th width="1%">Down Payment</th>
                                    <th width="1%">Balance Amount</th>
                                    <th width="1">Tenure</th>
                                    <th width="1%">EMI Amount</th>
                                    <th width="1%">Booking Date</th>
                                    <th width="1%">Agreement Date</th>

                                    <th width="1%">Status</th>
                                    <th width="1%">EMI Start Date</th>

                                </tr>


                                <tr>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" id="final_amount" name="final_amount"
                                            placeholder="" readonly />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" name="down_payment" placeholder=""
                                            oninput="calculateAmounts()" required />
                                    </td>
                                    <td id="balence_amount" style="padding: 2px;" width="1%">
                                        <input type="hidden" name="balence_amount" id="balence_amount_input">
                                        <label id="balence_amount_label" class="control-label">
                                            <font id="balence_amount_display" color="#ff0000"></font>
                                        </label>
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" name="tenure" placeholder=""
                                            oninput="calculateAmounts()" required />
                                    </td>
                                    <td id="emi_ammount" style="padding: 2px;" width="1%">
                                        <input type="hidden" name="emi_ammount" id="emi_ammount_input">
                                        <label id="emi_ammount_label" class="control-label">
                                            <font id="emi_ammount_display" color="#ff0000"></font>
                                        </label>
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <div class="input-group" style="display: flex;">
                                            <input type="text" id="booking_date" name="booking_date"
                                                class="form-control datepicker" placeholder="DD/MM/YYYY" required />
                                            <div class="" style="padding: 5px;">
                                                <span class="input-group-text" style="font-size: 20px;  "><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>


                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <div class="input-group" style="display: flex;">
                                            <input type="text" id="aggriment_date" name="aggriment_date"
                                                class="form-control datepicker" placeholder="DD/MM/YYYY" required />
                                            <div class="" style="padding: 5px;">
                                                <span class="input-group-text" style="font-size: 20px;  "><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <select class="form-control select" name="staus_token" data-live-search="true">
                                            @foreach ($tokenStatuses as $tokenStatus)
                                            <option value="{{ $tokenStatus->id }}">{{ $tokenStatus->token }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <div class="input-group" style="display: flex;">
                                            <input type="text" id="emi_start_date" name="emi_start_date"
                                                class="form-control datepicker" placeholder="DD/MM/YYYY" required />
                                            <div class="" style="padding: 5px;">
                                                <span class="input-group-text" style="font-size: 20px;  "><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            </table>

                            <table width="100%">
                                <tr style="height:30px;">
                                    <th width="1%">Plot Status</th>
                                    <th width="1%">A. Rate</th>
                                    <th width="2%">Refered By</th>
                                    <th width="1" id="agent-label-container">Agent Name</th>
                                    <th width="1" id="employee-label-container">Executive Name</th>
                                    <th width="2%">Remarks</th>

                                </tr>


                                <tr>
                                    <td style="padding: 2px;" width="1%">
                                        <select class="form-control select" data-live-search="true"
                                            id="plot_sale_status" name="plot_sale_status">
                                            <option value="">Select Option</option>
                                            @foreach($statuses as $status)
                                            <option value="{{ $status->id ?? '' }}">
                                                {{ $status->plot_sale_status ?? ''}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" name="a_rate" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <input type="radio" id="agent_name" name="source_type" value="agent"
                                            onclick="toggleEmployeeSelect()">
                                        <label for="agent_name">Agent Name</label>
                                        <input type="radio" id="executive_name" name="source_type" value="executive"
                                            onclick="toggleEmployeeSelect()">
                                        <label for="executive_name">Executive Name</label>
                                        <input type="radio" id="direct_sourse" name="source_type" value="direct"
                                            onclick="toggleEmployeeSelect()">
                                        <label for="direct_sourse">Direct Source</label>
                                    </td>
                                    <td id="agent-select-container" style="padding: 2px; width: 1%;">
                                        <select class="form-control select" data-live-search="true" id="agent-select"
                                            name="agent_id">
                                            <option value="">Select Option</option>
                                            @foreach($agent as $agent)
                                            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td id="employee-select-container" style="padding: 2px; width: 1%;">
                                        <select class="form-control select" data-live-search="true" id="employee-select"
                                            name="employee">
                                            <option value="">Select Option</option>
                                            @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>

                                    <td style="padding: 2px;" width="1%">
                                        <textarea type="text" class="form-control" name="remark" placeholder="" rows="2"
                                            cols="5"></textarea>
                                    </td>

                                </tr>

                            </table>

                        </div>
                    </div>
                    <div class="row">
                        {{-- <h5 class="panel-title"
                            style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                            align="center">
                            <i class="fa fa-area-chart"></i> &nbsp;Plot/Unit Transaction
                        </h5> --}}

                        <div class="col-md-12" style="margin-top: 2vh;">
                            <table width="100%">
                                <tr style="height:30px;">

                                    <th width="2%">Mauja</th>
                                    <th width="2%">Kh No.</th>
                                    <th width="2%">P.H.N.</th>
                                    <th width="2%">Taluka</th>

                                    <th width="2%">District</th>
                                    <th width="2%">East</th>
                                    <th width="2%">West</th>
                                    <th width="2%">North</th>
                                    <th width="2%">South</th>

                                </tr>


                                <tr>

                                    <td style="padding: 2px;" width="2%">
                                        <input type="text" class="form-control" id="mauja" name="mauja" placeholder=""
                                            required />
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <input type="text" class="form-control" id="kh_no" name="kh_no" placeholder=""
                                            required />
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <input type="text" class="form-control" id="phn" name="phn" placeholder=""
                                            required />
                                    </td>

                                    <td style="padding: 2px;" width="2%">
                                        <input type="text" class="form-control" id="taluka" name="taluka" placeholder=""
                                            required />
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <input type="text" class="form-control" id="district" name="district"
                                            placeholder="" required />
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <input type="text" class="form-control" id="east" name="east" placeholder=""
                                            required />
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <input type="text" class="form-control" id="west" name="west" placeholder=""
                                            required />
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <input type="text" class="form-control" id="north" name="north" placeholder=""
                                            required />
                                    </td>

                                    <td style="padding: 2px;" width="2%">
                                        <input type="text" class="form-control" id="south" name="south" placeholder=""
                                            required />
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <button id="" type="submit" class="btn mjks"
                                            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                                class="fa fa-floppy-o" aria-hidden="true"></i>
                                            Submit</button>
                                    </td>

                                </tr>

                            </table>

                        </div>
                    </div>
                    <div class="row" style="margin-top: 1vh;">
                        {{-- <h5 class="panel-title"
                            style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                            align="center">
                            <i class="fa fa-area-chart"></i> &nbsp;Direction
                        </h5> --}}

                        <div class="col-md-12" style="margin-top: 2vh;">
                            <table width="70%">
                                <tr style="height:30px;">



                                    <th width="2%"></th>
                                </tr>


                                <tr>



                                </tr>

                            </table>

                        </div>
                    </div>




                </form>


            </div>

        </div>
    </div>
</div>
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
        <div class="col-md-6" style="float: left; width: 50%;">
            @if(session('error'))
            <div id="successscript" class="alert alert-success"
                style="background-color: rgba(209, 215, 209, 0.1); color: #1f1e1e; border: 1px solid #abafab; padding: 10px; border-radius: 5px;">
                {{ session('error') }}
            </div>
            @endif
        </div>
    </div>
</div>
<!-- START DEFAULT DATATABLE -->

<div class="modal fade" id="fileModal" tabindex="-1" role="dialog" aria-labelledby="fileModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="fileModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img id="fileViewer" src="" alt="File Preview" style="width: 100%;">
            </div>
        </div>
    </div>
</div>
</div>

@stop
@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
{{-- <script>
    document.getElementById('submitbuttonappend').addEventListener('click', function () {
            // Get values from the form
            const title = document.getElementById('title').value;
            const name = document.getElementById('name').value;
            const occupation_id = document.getElementById('occupation_id').value;
            const email = document.getElementById('email').value;
            const contact = document.getElementById('contact').value;
            const city = document.getElementById('city').value;
            const pin_code = document.getElementById('pin_code').value;
            const address = document.getElementById('address').value;
            const age = document.getElementById('age').value;
            const dob = document.getElementById('dob').value;
            const marital_status = document.getElementById('marital_status').value;
            const marriage_date = document.getElementById('marriage_date').value;
            const branch_id = document.getElementById('branch_id').value;
            const aadhar_no = document.getElementById('aadhar_no').value;
            const pan_no = document.getElementById('pan_no').value;

            // Create a new row and append the form data to the table
            const newRow = document.createElement('tr');
            newRow.innerHTML = `
                <td>${title}</td>
                <td>${name}</td>
                <td>${occupation_id}</td>
                <td>${email}</td>
                <td>${contact}</td>
                <td>${city}</td>
                <td>${pin_code}</td>
                <td>${address}</td>
                <td>${age}</td>
                <td>${dob}</td>
                <td>${marital_status}</td>
                <td>${marriage_date}</td>
                <td>${branch_id}</td>
                <td>${aadhar_no}</td>
                <td>${pan_no}</td>
            `;

            // Append the new row to the table body
            document.getElementById('customerTableBody').appendChild(newRow);

            // Clear the form
            document.getElementById('customerForm').reset();
        });
</script> --}}
{{-- <script>
    function toggleMarriageDate() {
        const maritalStatus = document.getElementById('marital_status').value;
        const marriageDateInput = document.getElementById('marriage_date').parentNode.parentNode.parentNode;
        if (maritalStatus === 'married') {
            marriageDateInput.style.display = 'table-row';
        } else {
            marriageDateInput.style.display = 'none';
        }
    }

    document.getElementById('submitbuttonappend').addEventListener('click', function () {
        const title = document.getElementById('title').value;
        const name = document.getElementById('name').value;
        const occupation_id = document.getElementById('occupation_id').value;
        const email = document.getElementById('email').value;
        const contact = document.getElementById('contact').value;
        const city = document.getElementById('city').value;
        const pin_code = document.getElementById('pin_code').value;
        const address = document.getElementById('address').value;
        const age = document.getElementById('age').value;
        const dob = document.getElementById('dob').value;
        const marital_status = document.getElementById('marital_status').value;
        const marriage_date = document.getElementById('marriage_date').value;
        const branch_id = document.getElementById('branch_id').value;
        const aadhar_no = document.getElementById('aadhar_no').value;
        const pan_no = document.getElementById('pan_no').value;

        const formattedMarriageDate = marriage_date ? marriage_date : 'N/A';

        if (!title || !name || !occupation_id || !email || !contact || !city || !pin_code || !address || !age || !dob || !branch_id || !aadhar_no || !pan_no) {
            alert('Please fill all the fields before appending.');
            return;
        }

        const aadharFile = document.getElementById('aadhar').files[0];
        const panFile = document.getElementById('pan').files[0];
        const aadharFileURL = aadharFile ? URL.createObjectURL(aadharFile) : '';
      //  console.log(aadharFileURL);

      let file = e.target.files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(e) {
    blob1 = e.target.result;
};
    src2 = URL.createObjectURL(e.target.files[0]);
    let file = e.target.files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    reader.onload = function(e) {
    blob2 = e.target.result;
    };


        const panFileURL = panFile ? URL.createObjectURL(panFile) : '';

        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td><input type="hidden" name="title[]" value="${title}">${title}</td>
            <td><input type="hidden" name="name[]" value="${name}">${name}</td>
            <td><input type="hidden" name="occupation_id[]" value="${occupation_id}">${occupation_id}</td>
            <td><input type="hidden" name="email[]" value="${email}">${email}</td>
            <td><input type="hidden" name="contact[]" value="${contact}">${contact}</td>
            <td><input type="hidden" name="city[]" value="${city}">${city}</td>
            <td><input type="hidden" name="pin_code[]" value="${pin_code}">${pin_code}</td>
            <td><input type="hidden" name="address[]" value="${address}">${address}</td>
            <td><input type="hidden" name="age[]" value="${age}">${age}</td>
            <td><input type="hidden" name="dob[]" value="${dob}">${dob}</td>
            <td><input type="hidden" name="marital_status[]" value="${marital_status}">${marital_status}</td>
            <td><input type="hidden" name="marriage_date[]" value="${formattedMarriageDate}">${formattedMarriageDate}</td>
            <td><input type="hidden" name="branch_id[]" value="${branch_id}">${branch_id}</td>
           <td>
                <input type="hidden" name="aadhar[]" value="${aadharFile ? aadharFile.name : ''}">
                ${aadharFile ? aadharFile.name : 'N/A'}
                ${aadharFile ? `<a href="${aadharFileURL}" target="_blank"><i style="background-color:red;" class="fa fa-file-pdf-o"
                        aria-hidden="true"></i></a>` : ''}
            </td>
            <td><input type="hidden" name="aadhar_no[]" value="${aadhar_no}">${aadhar_no}</td>
            <td>
                <input type="hidden" name="pan[]" value="${panFile ? panFile.name : ''}">
                ${panFile ? panFile.name : 'N/A'}
                ${panFile ? `<a href="${panFileURL}" target="_blank"><i style="background-color:blue;" class="fa fa-file-pdf-o"
                        aria-hidden="true"></i></a>` : ''}
            </td>
            <td><input type="hidden" name="pan_no[]" value="${pan_no}">${pan_no}</td>
        `;

        document.getElementById('customerTableBody').appendChild(newRow);

        document.getElementById('title').value = '';
        document.getElementById('name').value = '';
        document.getElementById('occupation_id').value = '';
        document.getElementById('email').value = '';
        document.getElementById('contact').value = '';
        document.getElementById('city').value = '';
        document.getElementById('pin_code').value = '';
        document.getElementById('address').value = '';
        document.getElementById('age').value = '';
        document.getElementById('dob').value = '';
        document.getElementById('marital_status').value = 'single';
        document.getElementById('marriage_date').value = '';
        document.getElementById('branch_id').value = '';
        document.getElementById('aadhar_no').value = '';
        document.getElementById('pan_no').value = '';
        document.getElementById('aadhar').value = '';
        document.getElementById('pan').value = '';
    });
</script> --}}
<script>
    function toggleMarriageDate() {
    const maritalStatus = document.getElementById('marital_status').value;
    const marriageDateInput = document.getElementById('marriage_date').parentNode.parentNode.parentNode;
    if (maritalStatus === 'married') {
        marriageDateInput.style.display = 'table-row';
    } else {
        marriageDateInput.style.display = 'none';
    }
}

document.getElementById('submitbuttonappend').addEventListener('click', function () {
    const title = document.getElementById('title').value;
    const name = document.getElementById('name').value;
    const occupationSelect = document.getElementById('occupation_id');
    const occupation_id = occupationSelect.value;
    const occupation_name = occupationSelect.options[occupationSelect.selectedIndex].text;
    const email = document.getElementById('email').value;
    const contact = document.getElementById('contact').value;
    const city = document.getElementById('city').value;
    const pin_code = document.getElementById('pin_code').value;
    const address = document.getElementById('address').value;
    const age = document.getElementById('age').value;
    const dob = document.getElementById('dob').value;
    const marital_status = document.getElementById('marital_status').value;
    const marriage_date = document.getElementById('marriage_date').value;
    const branchSelect = document.getElementById('branch_id');
    const branch_id = branchSelect.value;
    const branch_name = branchSelect.options[branchSelect.selectedIndex].text;
    const aadhar_no = document.getElementById('aadhar_no').value;
    const pan_no = document.getElementById('pan_no').value;

    const formattedMarriageDate = marriage_date ? marriage_date : 'N/A';

    if (!title || !name || !occupation_id || !email || !contact || !city || !pin_code || !address || !age || !dob ||
        !branch_id || !aadhar_no || !pan_no) {
        alert('Please fill all the fields before appending.');
        return;
    }

    const aadharFile = document.getElementById('aadhar').files[0];
    const panFile = document.getElementById('pan').files[0];
    const panFileURL = panFile ? URL.createObjectURL(panFile) : '';
    const aadharFileURL = aadharFile ? URL.createObjectURL(aadharFile) : '';

    // Function to read file as base64
    const readAsBase64 = (file) => {
        return new Promise((resolve, reject) => {
            const reader = new FileReader();
            reader.onload = () => resolve(reader.result);
            reader.onerror = error => reject(error);
            reader.readAsDataURL(file);
        });
    };

    // Reading files and appending rows
    Promise.all([
        aadharFile ? readAsBase64(aadharFile) : Promise.resolve(''),
        panFile ? readAsBase64(panFile) : Promise.resolve('')
    ]).then(([aadharBase64, panBase64]) => {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
        <td><input type="hidden" name="title[]" value="${title}">${title}</td>
        <td><input type="hidden" name="name[]" value="${name}">${name}</td>
        <td><input type="hidden" name="occupation_id[]" value="${occupation_id}">${occupation_name}</td>
        <td><input type="hidden" name="email[]" value="${email}">${email}</td>
        <td><input type="hidden" name="contact[]" value="${contact}">${contact}</td>
        <td><input type="hidden" name="city[]" value="${city}">${city}</td>
        <td><input type="hidden" name="pin_code[]" value="${pin_code}">${pin_code}</td>
        <td><input type="hidden" name="address[]" value="${address}">${address}</td>
        <td><input type="hidden" name="age[]" value="${age}">${age}</td>
        <td><input type="hidden" name="dob[]" value="${dob}">${dob}</td>
        <td><input type="hidden" name="marital_status[]" value="${marital_status}">${marital_status}</td>
        <td><input type="hidden" name="marriage_date[]" value="${formattedMarriageDate}">${formattedMarriageDate}</td>
        <td><input type="hidden" name="branch_id[]" value="${branch_id}">${branch_name}</td>
        <td>
            <input type="hidden" name="aadhar[]" value="${aadharBase64}">

            ${aadharFile ? `<a href="${aadharFileURL}" target="_blank"><i style="background-color:red;" class="fa fa-file-pdf-o" aria-hidden="true"></i></a>` : ''}
        </td>
        <td><input type="hidden" name="aadhar_no[]" value="${aadhar_no}">${aadhar_no}</td>
        <td>
            <input type="hidden" name="pan[]" value="${panBase64}">

            ${panFile ? `<a href="${panFileURL}" target="_blank"><i style="background-color:blue;" class="fa fa-file-pdf-o" aria-hidden="true"></i></a>` : ''}
        </td>
        <td><input type="hidden" name="pan_no[]" value="${pan_no}">${pan_no}</td>
        <td style="text-align:center; color:#FF0000">
            <button type="button" class="remove-row-btn"><i class="fa fa-trash-o"></i></button>
        </td>
        `;

        document.getElementById('customerTableBody').appendChild(newRow);

        // Clear the input fields
        document.getElementById('title').value = '';
        document.getElementById('name').value = '';
        document.getElementById('occupation_id').value = '';
        document.getElementById('email').value = '';
        document.getElementById('contact').value = '';
        document.getElementById('city').value = '';
        document.getElementById('pin_code').value = '';
        document.getElementById('address').value = '';
        document.getElementById('age').value = '';
        document.getElementById('dob').value = '';
        document.getElementById('marital_status').value = 'single';
        document.getElementById('marriage_date').value = '';
        document.getElementById('branch_id').value = '';
        document.getElementById('aadhar_no').value = '';
        document.getElementById('pan_no').value = '';
        document.getElementById('aadhar').value = '';
        document.getElementById('pan').value = '';
    }).catch(error => {
        console.error('Error reading files: ', error);
        alert('An error occurred while processing the files. Please try again.');
    });
});

// Delegate the delete button click event to the table body
document.getElementById('customerTableBody').addEventListener('click', function (event) {
    if (event.target.classList.contains('remove-row-btn') || event.target.closest('.remove-row-btn')) {
        const row = event.target.closest('tr');
        if (row) {
            row.remove();
        }
    }
});
</script>
<script>
    function toggleMarriageDate() {
        var maritalStatus = document.getElementById('marital_status').value;
        var marriageDateInput = document.getElementById('marriage_date');
        if (maritalStatus === 'single') {
            marriageDateInput.value = '';
            marriageDateInput.disabled = true;
        } else {
            marriageDateInput.disabled = false;
        }
    }

    // Initial call to set the correct state based on the default or old value
    window.onload = function() {
        toggleMarriageDate();
    };
</script>
<script>
    // Conversion factor: 1 square meter = 10.7639 square feet
        const conversionFactor = 10.7639;

        function convertSquareUnits() {
            const squareMeterInput = document.getElementById('square_meter');
            const squareFeetInput = document.getElementById('square_ft');

            // Check which input triggered the event
            if (document.activeElement === squareMeterInput) {
                let squareMeters = parseFloat(squareMeterInput.value) || 0;
                let squareFeet = squareMeters * conversionFactor;
                squareFeetInput.value = squareFeet.toFixed(2);
            } else if (document.activeElement === squareFeetInput) {
                let squareFeet = parseFloat(squareFeetInput.value) || 0;
                let squareMeters = squareFeet / conversionFactor;
                squareMeterInput.value = squareMeters.toFixed(2);
            }
        }
</script>
<script>
    function toggleEmployeeSelect() {
    const agentRadio = document.getElementById('agent_name');
    const executiveRadio = document.getElementById('executive_name');
    const directSourceRadio = document.getElementById('direct_sourse');
    const agentSelect = document.getElementById('agent-select');
    const employeeSelect = document.getElementById('employee-select');

    if (agentRadio.checked) {
    agentSelect.disabled = false;
    employeeSelect.disabled = true;
    employeeSelect.value = ""; // Clear executive dropdown value
    } else if (executiveRadio.checked) {
    agentSelect.disabled = true;
    employeeSelect.disabled = false;
    agentSelect.value = ""; // Clear agent dropdown value
    } else if (directSourceRadio.checked) {
    agentSelect.disabled = true;
    employeeSelect.disabled = true;
    agentSelect.value = ""; // Clear agent dropdown value
    employeeSelect.value = ""; // Clear executive dropdown value
    }
    }

    // Call toggleEmployeeSelect on page load to set the initial state
    window.onload = function() {
    toggleEmployeeSelect();
    };
</script>
<script>
    function calculateAmounts() {
// Get the values of square feet and rate inputs
let squareFt = parseFloat(document.getElementsByName('square_ft')[0].value) || 0;
let rate = parseFloat(document.getElementsByName('rate')[0].value) || 0;

// Calculate the total cost
let totalCost = squareFt * rate;

// Update the total cost display
document.getElementById('total_cost_display').textContent = totalCost.toFixed(2);
document.getElementById('total_cost_input').value = totalCost.toFixed(2);

// Get the discount amount and type
let discountAmount = parseFloat(document.getElementsByName('discount_amount')[0].value) || 0;
let discountType = document.getElementById('discount_type').value;

// Calculate the final amount after applying the discount
let finalAmount = totalCost;

if (discountType === '%') {
finalAmount -= totalCost * (discountAmount / 100);
} else if (discountType === '₹') {
finalAmount -= discountAmount;
}

// Ensure the final amount doesn't go negative
finalAmount = Math.max(finalAmount, 0);

// Update the final amount input box
document.getElementById('final_amount').value = finalAmount.toFixed(2);

// Get the down payment
let downPayment = parseFloat(document.getElementsByName('down_payment')[0].value) || 0;

// Calculate the balance amount
let balanceAmount = finalAmount - downPayment;
balanceAmount = Math.max(balanceAmount, 0);

// Update the balance amount display and hidden input
document.getElementById('balence_amount_display').textContent = balanceAmount.toFixed(2);
document.getElementById('balence_amount_input').value = balanceAmount.toFixed(2);

// // Get the tenure in days and calculate EMI
// let tenureDays = parseInt(document.getElementsByName('tenure')[0].value) || 0;
// let tenureMonths = Math.ceil(tenureDays / 30); // Convert days to months

// // Calculate EMI amount
// let emiAmount = tenureMonths > 0 ? balanceAmount / tenureMonths : 0;

let tenureMonths = parseInt(document.getElementsByName('tenure')[0].value) || 0;

// Calculate EMI amount
let emiAmount = tenureMonths > 0 ? balanceAmount / tenureMonths : 0;

// Update the EMI amount display and hidden input
document.getElementById('emi_ammount_display').textContent = emiAmount.toFixed(2);
document.getElementById('emi_ammount_input').value = emiAmount.toFixed(2);
}
</script>
<script>
    $(document).ready(function() {$('#firm-select').on('change', function() {

    var firmId = $(this).val();
    if (firmId) {
    $.ajax({
    url: '{{ route("projects.by.firm", ["firm_id" => "FIRM_ID"]) }}'.replace('FIRM_ID', firmId),
    type: 'GET',
    dataType: 'json',
    success: function(data) {
    $('#project-select').empty(); // Clear the dropdown
    $('#project-select').append('<option value="">Select Option</option>');
    $.each(data, function(key, project) {
    $('#project-select').append('<option value="' + project.id + '">' + project.project_name + '</option>');
    });
    }
    });
    } else {
    $('#project-select').empty(); // Clear the dropdown
    $('#project-select').append('<option value="">Select Option</option>');
    }
    });


$('#project-select').change(function() {
var projectId = $(this).val();

if (projectId) {
$.ajax({
type: "GET",
url: "{{ route('fetchPlots') }}", // Using the route name
data: {
projectId: projectId
},
success: function(response) {
console.log(response); // Log the response data
var plotSelect = $('#plot-select');
plotSelect.empty(); // Clear existing options
plotSelect.append('<option value="">Select Plot</option>');
$.each(response, function(index, plot) {
plotSelect.append('<option value="' + plot.id + '">' + plot.plot_no + '</option>');
});
// Reinitialize Bootstrap Select if needed
plotSelect.selectpicker('refresh');
},
error: function(xhr, status, error) {
console.error(error);
}
});
} else {
var plotSelect = $('#plot-select');
plotSelect.empty(); // Clear existing options
plotSelect.append('<option value="">Select Plot</option>');
// Reinitialize Bootstrap Select if needed
plotSelect.selectpicker('refresh');
}
if (projectId) {
$.ajax({
type: "GET",
url: "{{ route('fetchProjectDetailsextra') }}", // Assuming this route is correctly defined in Laravel
data: {
projectId: projectId
},
success: function(response) {
console.log(response);

// Assuming the response contains project details
if (response) {
var projectDetails = response;

// Log the response to verify the values
console.log('Project Details:', projectDetails);

// Set values to input fields
$('input[name="mauja"]').val(projectDetails.mauja);
$('input[name="kh_no"]').val(projectDetails.kh_no);
$('input[name="phn"]').val(projectDetails.phn);
$('input[name="taluka"]').val(projectDetails.taluka);
$('input[name="district"]').val(projectDetails.district);
}
},
error: function(xhr, status, error) {
console.error(error);
}
});
} else {
// Clear the fields if no project is selected
$('input[name="mauja"]').val('');
$('input[name="kh_no"]').val('');
$('input[name="phn"]').val('');
$('input[name="taluka"]').val('');
$('input[name="district"]').val('');
}
});
$('#plot-select').change(function() {
var plotId = $(this).val();

if (plotId) {
$.ajax({
type: "GET",
url: "{{ route('fetchPlotDetails') }}", // Assuming this route is correctly defined in Laravel
data: {
plotId: plotId
},
success: function(response) {
console.log(response);

// Assuming the response contains plot details as an array
if (response && response.length > 0) {
var plotDetails = response[0]; // Access the first element of the array

// Log the values of plot_length and plot_width to check for issues
console.log('Plot Length:', plotDetails.plot_length);
console.log('Plot Width:', plotDetails.plot_width);
console.log(plotDetails);

// Ensure the values are correctly parsed as floats
var plotLength = parseFloat(plotDetails.plot_length);
var plotWidth = parseFloat(plotDetails.plot_width);

// Check if the parsed values are valid numbers
if (!isNaN(plotLength) && !isNaN(plotWidth)) {
var measurement = plotLength * plotWidth;
$('input[name="Measurement"]').val(measurement);
} else {
$('input[name="Measurement"]').val(''); // Clear if invalid
}

$('#square_meter').val(plotDetails.area_sqrmt);
$('#square_ft').val(plotDetails.area_sqrft);
$('input[name="rate"]').val(plotDetails.rate);
$('#total_cost_input').val(plotDetails.amount);
$('#total_cost_display').text(plotDetails.amount);

$('input[name="east"]').val(plotDetails.east);
$('input[name="west"]').val(plotDetails.west);
$('input[name="north"]').val(plotDetails.north);
$('input[name="south"]').val(plotDetails.south);
}
},
error: function(xhr, status, error) {
console.error(error);
}
});
} else {
// Clear the fields if no plot is selected
$('input[name="Measurement"]').val('');
$('#square_meter').val('');
$('#square_ft').val('');
$('input[name="rate"]').val('');
$('#total_cost_input').val('');
$('#total_cost_display').text('');

$('input[name="east"]').val('');
$('input[name="west"]').val('');
$('input[name="north"]').val('');
$('input[name="south"]').val('');
}
});

});

</script>
<!-- new for exsting client -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
document.getElementById('add-client-btn').addEventListener('click', function () {
const clientSelect = document.getElementById('client-select');
const selectedOption = clientSelect.options[clientSelect.selectedIndex];

if (selectedOption.value !== '') {
const clientData = {
title: selectedOption.getAttribute('data-title'),
name: selectedOption.getAttribute('data-client-name'),
occupation_id: selectedOption.getAttribute('data-occupation-id'),
occupation: selectedOption.getAttribute('data-occupation'),
email: selectedOption.getAttribute('data-email'),
phone: selectedOption.getAttribute('data-client-phone'),
city: selectedOption.getAttribute('data-city'),
pinCode: selectedOption.getAttribute('data-pin-code'),
address: selectedOption.getAttribute('data-client-address'),
age: selectedOption.getAttribute('data-age'),
dob: selectedOption.getAttribute('data-dob'),
maritalStatus: selectedOption.getAttribute('data-marital-status'),
marriageDate: selectedOption.getAttribute('data-marriage-date'),
branch: selectedOption.getAttribute('data-branch'),
branch_id: selectedOption.getAttribute('data-branch-id'),
aadhar: selectedOption.getAttribute('data-aadhar'),
aadharNo: selectedOption.getAttribute('data-aadhar-no'),
pan: selectedOption.getAttribute('data-pan'),
panNo: selectedOption.getAttribute('data-pan-no'),
id: selectedOption.getAttribute('data-client-id')
};

const tableBody = document.getElementById('customerTableBody');
const newRow = document.createElement('tr');

// Use Laravel's asset helper for document URLs
const aadharUrl = clientData.aadhar ? `{{ asset('customer_reg/${clientData.aadhar}') }}` : null;
const panUrl = clientData.pan ? `{{ asset('customer_reg/${clientData.pan}') }}` : null;

newRow.innerHTML = `
<td style="padding:5px;" align="center">
    <label>${clientData.title}</label>
    <input type="hidden" name="title_existing[]" value="${clientData.title}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.name}</label>
    <input type="hidden" name="name_existing[]" value="${clientData.name}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.occupation}</label>
    <input type="hidden" name="occupation_id_existing[]" value="${clientData.occupation_id}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.email}</label>
    <input type="hidden" name="email_existing[]" value="${clientData.email}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.phone}</label>
    <input type="hidden" name="contact_existing[]" value="${clientData.phone}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.city}</label>
    <input type="hidden" name="city_existing[]" value="${clientData.city}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.pinCode}</label>
    <input type="hidden" name="pin_code_existing[]" value="${clientData.pinCode}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.address}</label>
    <input type="hidden" name="address_existing[]" value="${clientData.address}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.age}</label>
    <input type="hidden" name="age_existing[]" value="${clientData.age}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.dob}</label>
    <input type="hidden" name="dob_existing[]" value="${clientData.dob}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.maritalStatus}</label>
    <input type="hidden" name="marital_status_existing[]" value="${clientData.maritalStatus}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.marriageDate}</label>
    <input type="hidden" name="marriage_date_existing[]" value="${clientData.marriageDate}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.branch}</label>
    <input type="hidden" name="branch_id_existing[]" value="${clientData.branch_id}">
</td>
<td style="padding:5px;" align="center">
    ${aadharUrl ? `<a href="${aadharUrl}" target="_blank" download="aadhar">
        <i class="fa fa-file-pdf-o" style="background-color:red;" aria-hidden="true"></i> AADHAR
    </a>` : 'N/A'}
    <input type="hidden" name="aadhar_existing[]" value="${clientData.aadhar}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.aadharNo}</label>
    <input type="hidden" name="aadhar_no_existing[]" value="${clientData.aadharNo}">
</td>
<td style="padding:5px;" align="center">
    ${panUrl ? `<a href="${panUrl}" target="_blank" download="pan">
        <i class="fa fa-file-pdf-o" style="background-color:blue;" aria-hidden="true"></i> PAN
    </a>` : 'N/A'}
    <input type="hidden" name="pan_existing[]" value="${clientData.pan}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientData.panNo}</label>
    <input type="hidden" name="pan_no_existing[]" value="${clientData.panNo}">
    <input type="hidden" name="existing_client_id[]" value="${clientData.id}">
</td>
<td style="text-align:center; color:#FF0000">
    <button type="button" class="remove-row-btn"><i class="fa fa-trash-o"></i></button>
</td>
`;

tableBody.appendChild(newRow);
}
});

// Handle deleting client details from the table
document.querySelector('#customerTableBody').addEventListener('click', function (e) {
if (e.target && (e.target.matches('.remove-row-btn') || e.target.matches('.remove-row-btn i'))) {
const row = e.target.closest('tr');
row.parentNode.removeChild(row);
}
});
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Initialize datepicker
        $('.datepicker').datepicker({
            format: 'DD/MM/YYYY'
        });

        // Handle adding nominee details to the table
        document.getElementById('add-nominee-btn').addEventListener('click', function () {
            const nomineeName = document.getElementById('nominee-name').value;
            const nomineeAge = document.getElementById('nominee-age').value;
            const nomineeRelation = document.getElementById('nominee-relation').value;
            const nomineeDOB = document.getElementById('nominee-dob').value;
            const nomineeAadhar = document.getElementById('nominee-aadhar').value;
            const nomineePAN = document.getElementById('nominee-pan').value;

            if (nomineeName && nomineeAge && nomineeRelation && nomineeDOB && nomineeAadhar && nomineePAN) {
                const tableBody = document.querySelector('#nominee-details-table tbody');
                const newRow = document.createElement('tr');

                newRow.innerHTML = `
                    <td style="padding:5px;" align="center">
                        <label>${nomineeName}</label>
                        <input type="hidden" name="nominee_name[]" value="${nomineeName}">
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>${nomineeAge}</label>
                        <input type="hidden" name="nominee_age[]" value="${nomineeAge}">
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>${nomineeRelation}</label>
                        <input type="hidden" name="nominee_relation[]" value="${nomineeRelation}">
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>${nomineeDOB}</label>
                        <input type="hidden" name="nominee_dob[]" value="${nomineeDOB}">
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>${nomineeAadhar}</label>
                        <input type="hidden" name="nominee_aadhar[]" value="${nomineeAadhar}">
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>${nomineePAN}</label>
                        <input type="hidden" name="nominee_pan[]" value="${nomineePAN}">
                    </td>
                    <td style="text-align:center; color:#FF0000">
                        <button class="delete-nominee-btn"><i class="fa fa-trash-o"></i></button>
                    </td>

                `;

                tableBody.appendChild(newRow);

                // Clear input fields after adding the row
                document.getElementById('nominee-name').value = '';
                document.getElementById('nominee-age').value = '';
                document.getElementById('nominee-relation').value = '';
                document.getElementById('nominee-dob').value = '';
                document.getElementById('nominee-aadhar').value = '';
                document.getElementById('nominee-pan').value = '';
            }
        });

        // Handle deleting nominee details from the table
        document.querySelector('#nominee-details-table').addEventListener('click', function (e) {
            if (e.target && (e.target.matches('.delete-nominee-btn') || e.target.matches('.delete-nominee-btn i'))) {
                const row = e.target.closest('tr');
                row.parentNode.removeChild(row);
            }
        });
    });
</script>
@stop
