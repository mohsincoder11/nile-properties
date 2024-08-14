@extends('panel.layout.user_model_layout')

@section('main_container')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12" style="margin-top:5px;">
            <div class="panel panel-default">
                <form action="{{ route('initiatesale_store') }}" method="post" enctype="multipart/form-data">
                    @csrf


                    <div class="col-md-12">

                        <h5 class="panel-title"
                            style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                            align="center">
                            <i class="fa fa-list"></i> &nbsp;Initiate Sale
                        </h5>

                    </div>
                    <div class="col-md-12" align="center">
                        <div class="icon-box-container" style="margin-left: 12%;">

                            <div class="icon-box box-3" style="padding: 1vh;">
                                <a href="{{ route('user_model.initiatesale')}}">
                                    <img src="{{ asset('panel/assets/images/cards/13.png') }}" alt="" class="classic-1">
                                    <p class="classic">ADD NEW SALE</p>
                                </a>
                            </div>

                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-1" style="padding: 1vh;">
                                <a href="{{ route('user_model.newsale')}}">
                                    <img src="{{ asset('panel/assets/images/cards/9.png') }}" alt="" class="classic-1">
                                    <p class="classic">NEW SALE CONFIRMED</p>
                                </a>
                            </div>

                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-2">
                                <a href="{{ route('user_model.paymentcollection')}}">
                                    <img src="{{ asset('panel/assets/images/cards/7.png') }}" alt="" class="classic-1">
                                    <p class="classic">PAYMENT COLLECTION</p>
                                </a>

                            </div>
                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-3">
                                <a href="{{ route('user_model.registration')}}">
                                    <img src="{{ asset('panel/assets/images/cards/11.png') }}" alt="" class="classic-1">
                                    <p class="classic">REQUEST FOR REGISTRATION</p>
                                </a>

                            </div>
                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>

                            <div class="icon-box box-1">
                                <a href="{{ route('user_model.account')}}">
                                    <img src="{{ asset('panel/assets/images/cards/6.png') }}" alt="" class="classic-1">
                                    <p class="classic">ACCOUNTS CLEARANCE</p>
                                </a>

                            </div>
                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-2">
                                <a href="{{ route('user_model.legalclearance')}}">
                                    <img src="{{ asset('panel/assets/images/cards/4.png') }}" alt="" class="classic-1">
                                    <p class="classic">LEGAL CLEARANCE</p>
                                </a>

                            </div>
                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-3">
                                <a href="{{ route('user_model.registrationcompleted')}}">
                                    <img src="{{ asset('panel/assets/images/cards/8.png') }}" alt="" class="classic-1">
                                    <p class="classic">REGISTRATION COMPLETED</p>
                                </a>

                            </div>
                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-1">
                                <a href="{{ route('user_model.saledeedscan')}}">
                                    <img src="{{ asset('panel/assets/images/cards/12.png') }}" alt="" class="classic-1">
                                    <p class="classic">SALEDEED SCAN</p>
                                </a>

                            </div>
                            <div style="margin-top: 10vh;font-size: large;">
                                <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                            </div>
                            <div class="icon-box box-2">
                                <a href="{{ route('user_model.handover')}}">
                                    <img src="{{ asset('panel/assets/images/cards/10.png') }}" alt="" class="classic-1">
                                    <p class="classic">HANDOVER COMPLETE</p>
                                </a>

                            </div>



                            <!-- Add more boxes as needed -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12" style="margin-top: 2vh;">
                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <div class="col-md-5"></div>
                            <div class="col-md-2">
                                <label class="control-label">Select Existing Customer<font color="#000099">
                                    </font></label>
                                <select id="client-select" class="form-control select" data-live-search="true">
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
                    <div class="row" style="margin-top: 2vh;">
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
                                    <tr>
                                        <td style="padding:5px;" align="center">
                                            <label>Mr. Sahil</label>
                                        </td>
                                        <td style="padding:5px;" align="center">
                                            <label>9898989898</label>
                                        </td>
                                        <td style="padding:5px;" align="center">
                                            <label>Nagpur</label>
                                        </td>
                                        <td style="padding:5px;" align="center">
                                            <label>101</label>
                                        </td>


                                        <td style="text-align:center; color:#FF0000"><button><i
                                                    class="fa fa-trash-o"></i></button>

                                        </td>
                                    </tr>
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
                                            <option>Father</option>
                                            <option>Wife</option>
                                            <option>Mother</option>
                                            <option>Sun</option>
                                        </select>
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <div class="input-group" style="display: flex;">
                                            <input type="text" id="nominee-dob" class="form-control datepicker"
                                                placeholder="DD-MM-YYYY" />
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
                                    <tr>
                                        <td style="padding:5px;" align="center">
                                            <label>Mr. Sahil</label>
                                        </td>
                                        <td style="padding:5px;" align="center">
                                            <label>9898989898</label>
                                        </td>
                                        <td style="padding:5px;" align="center">
                                            <label>Nagpur</label>
                                        </td>
                                        <td style="padding:5px;" align="center">
                                            <label>101</label>
                                        </td>
                                        <td style="padding:5px;" align="center">
                                            <label>1435 9087 5673</label>
                                        </td>
                                        <td style="padding:5px;" align="center">
                                            <label>MHKPT6070P</label>
                                        </td>

                                        <td style="text-align:center; color:#FF0000"><button><i
                                                    class="fa fa-trash-o"></i></button>

                                        </td>
                                    </tr>
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
                                        <select id="project-select" name="project_id" class="form-control select"
                                            data-live-search="true">
                                            @foreach($projects as $project)
                                            <option value="{{ $project->id }}" data-project-id="{{ $project->id }}">{{
                                                $project->project_name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <select id="plot-select" name="plot_no" class="form-control select"
                                            data-live-search="true">
                                            <!-- Plot options will be appended dynamically -->
                                        </select>
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" name="Measurement" placeholder=""
                                            required />
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
                                        <input type="text" class="form-control" name="rate" placeholder=""
                                            oninput="calculateAmounts()" required />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <label id="total_cost" class="control-label">
                                            <input id="total_cost_input" type="hidden" name="total_cost">
                                            <font id="total_cost_display" color="#ff0000"></font>
                                        </label>
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" name="discount_amount" placeholder=""
                                            oninput="calculateAmounts()" required />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <select class="form-control select" data-live-search="true" name="discount_type"
                                            id="discount_type" onchange="calculateAmounts()">
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
                                                class="form-control datepicker" placeholder="DD-MM-YYYY" required />
                                            <div class="" style="padding: 5px;">
                                                <span class="input-group-text" style="font-size: 20px;  "><i
                                                        class="glyphicon glyphicon-calendar"></i></span>
                                            </div>
                                        </div>


                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <div class="input-group" style="display: flex;">
                                            <input type="text" id="aggriment_date" name="aggriment_date"
                                                class="form-control datepicker" placeholder="DD-MM-YYYY" required />
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
                                                class="form-control datepicker" placeholder="DD-MM-YYYY" required />
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
                                    <th width="1" id="employee-label-container">Executive Name</th>
                                    <th width="2%">Remarks</th>

                                </tr>


                                <tr>
                                    <td style="padding: 2px;" width="1%">
                                        <select class="form-control select" data-live-search="true"
                                            id="plot_sale_status" name="plot_sale_status">
                                            @foreach($statuses as $status)
                                            <option value="{{ $status->plot_sale_status ?? '' }}">
                                                {{ $status->plot_sale_status ?? ''}}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" name="a_rate" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="2%">
                                        <input type="radio" id="executive_name" name="source_type" value="executive"
                                            onclick="toggleEmployeeSelect()" checked>
                                        <label for="executive_name">Executive Name</label>
                                        <input type="radio" id="direct_sourse" name="source_type" value="direct"
                                            onclick="toggleEmployeeSelect()">
                                        <label for="direct_sourse">Direct Source</label>
                                    </td>
                                    <td id="employee-select-container" style="padding: 2px; width: 1%;">
                                        <select class="form-control select" data-live-search="true" id="employee-select"
                                            name="employee">
                                            @foreach($employees as $employee)
                                            <option value="{{ $employee->id }}">
                                                {{ $employee->name }}
                                            </option>
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
                        <h5 class="panel-title"
                            style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                            align="center">
                            <i class="fa fa-area-chart"></i> &nbsp;Plot/Unit Transaction
                        </h5>

                        <div class="col-md-12" style="margin-top: 2vh;">
                            <table width="70%">
                                <tr style="height:30px;">

                                    <th width="1%">Mauja</th>
                                    <th width="1%">Kh No.</th>
                                    <th width="1%">P.H.N.</th>
                                    <th width="1%">Taluka</th>

                                    <th width="1%">District</th>

                                </tr>


                                <tr>

                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" name="mauja" placeholder="" required />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="number" class="form-control" name="kh_no" placeholder=""
                                            required />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="number" class="form-control" name="phn" placeholder="" required />
                                    </td>

                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" name="taluka" placeholder="" required />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" name="district" placeholder=""
                                            required />
                                    </td>

                                </tr>

                            </table>

                        </div>
                    </div>
                    <div class="row" style="margin-top: 1vh;">
                        <h5 class="panel-title"
                            style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                            align="center">
                            <i class="fa fa-area-chart"></i> &nbsp;Direction
                        </h5>

                        <div class="col-md-12" style="margin-top: 2vh;">
                            <table width="70%">
                                <tr style="height:30px;">

                                    <th width="1%">East</th>
                                    <th width="1%">West</th>
                                    <th width="1%">North</th>
                                    <th width="1%">South</th>
                                    <th width="2%"></th>
                                </tr>


                                <tr>

                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" name="east" placeholder="" required />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="number" class="form-control" name="west" placeholder="" required />
                                    </td>
                                    <td style="padding: 2px;" width="1%">
                                        <input type="number" class="form-control" name="north" placeholder=""
                                            required />
                                    </td>

                                    <td style="padding: 2px;" width="1%">
                                        <input type="text" class="form-control" name="south" placeholder="" required />
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




                </form>


            </div>

        </div>
    </div>
</div>

<!-- START DEFAULT DATATABLE -->


</div>

@stop
@section('js')

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
    const directSourceRadio = document.getElementById('direct_sourse');
    const employeeSelect = document.getElementById('employee-select');

    if (directSourceRadio.checked) {
    employeeSelect.disabled = true;
    employeeSelect.value = ""; // Set value to null
    } else {
    employeeSelect.disabled = false;
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

// Get the tenure in days and calculate EMI
let tenureDays = parseInt(document.getElementsByName('tenure')[0].value) || 0;
let tenureMonths = Math.ceil(tenureDays / 30); // Convert days to months

// Calculate EMI amount
let emiAmount = tenureMonths > 0 ? balanceAmount / tenureMonths : 0;

// Update the EMI amount display and hidden input
document.getElementById('emi_ammount_display').textContent = emiAmount.toFixed(2);
document.getElementById('emi_ammount_input').value = emiAmount.toFixed(2);
}
</script>
<script>
    $(document).ready(function() {
$('#project-select').change(function() {
var projectId = $(this).val();

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
$.each(response, function(index, plot) {
plotSelect.append('<option value="' + plot.plot_no + '">' + plot.plot_no + '</option>');
});
// Reinitialize Bootstrap Select if needed
plotSelect.selectpicker('refresh');
},
error: function(xhr, status, error) {
console.error(error);
}
});
});
});

</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
document.getElementById('add-client-btn').addEventListener('click', function () {
const clientSelect = document.getElementById('client-select');
const selectedOption = clientSelect.options[clientSelect.selectedIndex];

if (selectedOption.value !== '') {
const clientName = selectedOption.getAttribute('data-client-name');
const clientPhone = selectedOption.getAttribute('data-client-phone');
const clientAddress = selectedOption.getAttribute('data-client-address');
const clientSponsor = selectedOption.getAttribute('data-client-sponsor');

const tableBody = document.querySelector('#client-details-table tbody');
const newRow = document.createElement('tr');

newRow.innerHTML = `
<td style="padding:5px;" align="center">
    <label>${clientName}</label>
    <input type="hidden" name="client_name[]" value="${clientName}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientPhone}</label>
    <input type="hidden" name="client_phone[]" value="${clientPhone}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientAddress}</label>
    <input type="hidden" name="clients_address[]" value="${clientAddress}">
</td>
<td style="padding:5px;" align="center">
    <label>${clientSponsor}</label>
    <input type="hidden" name="client_sponsor[]" value="${clientSponsor}">
</td>
<td style="text-align:center; color:#FF0000">
    <button class="delete-client-btn"><i class="fa fa-trash-o"></i></button>
</td>
`;

tableBody.appendChild(newRow);
}
});

// Handle deleting client details from the table
document.querySelector('#client-details-table').addEventListener('click', function (e) {
if (e.target && (e.target.matches('.delete-client-btn') || e.target.matches('.delete-client-btn i'))) {
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
            format: 'dd-mm-yyyy'
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
                        <button class="delete-nominee-btn btn btn-danger"><i class="fa fa-trash-o"></i></button>
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