@extends('panel.layout.header')

@section('main_container')

<div class="page-content-wrap">
    <div class="row">

        <div class="col-md-12" style="margin-top:1px;">
            <div class="panel panel-default">
                <h5 class="panel-title"
                    style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                    align="center">
                    <i class="fa fa fa-list"></i> &nbsp;New Enquiry
                </h5>



            </div>









        </div>

    </div>
</div>
<div class="row">


    <div class="col-md-12" align="center">

        <!-- START DEFAULT DATATABLE -->
        <div class="col-md-4" align="center"></div>
        <div class="col-md-8" align="center">
            <div class="icon-box-container">
                <div class="icon-box box-2">
                    <a href="{{ route('enquiry') }}">
                        <img src="{{ asset('panel/assets/images/cards/3.png')}}" alt="" class="classic-1" />
                        <p class="classic">New Enquiry </p>
                    </a>
                </div>
                <div style="margin-top: 10vh; font-size: large">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </div>

                <div class="icon-box box-3" style="padding: 1vh">
                    <a href="{{ route('newclientindex') }}">
                        <img src="{{ asset('panel/assets/images/cards/man.png')}}" alt="" class="classic-1" />
                        <p class="classic">Added Client</p>
                    </a>
                </div>

                <div style="margin-top: 10vh; font-size: large">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </div>
                <div class="icon-box box-1" style="padding: 1vh">
                    <a href="{{ route('visitindex') }}">
                        <img src="{{ asset('panel/assets/images/cards/map.png')}}" alt="" class="classic-1" />
                        <p class="classic">Visit</p>
                    </a>
                </div>

                <div style="margin-top: 10vh; font-size: large">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </div>
                {{-- <div class="icon-box box-2">
                    <a href="{{ route('followupindex') }}">
                        <img src="{{ asset('panel/assets/images/cards/followup.png')}}" alt="" class="classic-1" />
                        <p class="classic">Follow Up</p>
                    </a>
                </div> --}}
                {{-- <div style="margin-top: 10vh; font-size: large">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </div> --}}
                <div class="icon-box box-3">
                    <a href="{{ route('proposalindex') }}">
                        <img src="{{ asset('panel/assets/images/cards/proposal.png')}}" alt="" class="classic-1" />
                        <p class="classic">Proposal</p>
                    </a>
                </div>
                {{-- <div style="margin-top: 10vh; font-size: large">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </div> --}}

                {{-- <div class="icon-box box-1">
                    <a href="{{ route('negotiationindex') }}">
                        <img src="{{ asset('panel/assets/images/cards/meet.png')}}" alt="" class="classic-1" />
                        <p class="classic">Negotiation</p>
                    </a>
                </div>
                <div style="margin-top: 10vh; font-size: large">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </div>
                <div class="icon-box box-2">
                    <a href="{{ route('tokenindex') }}">
                        <img src="{{ asset('panel/assets/images/cards/coin.png')}}" alt="" class="classic-1" />
                        <p class="classic">Token/Book</p>
                    </a>
                </div> --}}

                <!-- Add more boxes as needed -->
            </div>
        </div>

        <div class="col-md-1" align="center"></div>
        <!-- <div class="col-md-12">
            <div class="col-md-2" align="center">
                <div class="card">
                    <h5><span style="color: #FFF;" class="fa fa-home"><b style="color: #FFF;">
                                Sharique</b></span></h5>
                    <p style="color: #FFF;font-size: x-small;">Gadge Nagar/2,Amravati
                        <br>Folloup Date :2021-03-21
                    </p>
                </div>
            </div>
            <div class="col-md-2" align="center">
                <div class="card">
                    <h5><span style="color: #FFF;" class="fa fa-home"><b style="color: #FFF;">
                                Lorem</b></span></h5>
                    <p style="color: #FFF;font-size: x-small;">Gadge Nagar/2,Amravati
                        <br>Folloup Date :2021-03-21
                    </p>
                </div>
            </div>
            <div class="col-md-2" align="center">
                <div class="card">
                    <h5><span style="color: #FFF;" class="fa fa-home"><b style="color: #FFF;">
                                Yash</b></span></h5>
                    <p style="color: #FFF;font-size: x-small;">Gadge Nagar/2,Amravati
                        <br>Folloup Date :2021-03-21
                    </p>
                </div>
            </div>
            <div class="col-md-2" align="center">
                <div class="card">
                    <h5><span style="color: #FFF;" class="fa fa-home"><b style="color: #FFF;">
                                Tarique</b></span></h5>
                    <p style="color: #FFF;font-size: x-small;">Gadge Nagar/2,Amravati
                        <br>Folloup Date :2021-03-21
                    </p>
                </div>
            </div>
            <div class="col-md-2" align="center">
                <div class="card">
                    <h5><span style="color: #FFF;" class="fa fa-home"><b style="color: #FFF;">
                                Lorem</b></span></h5>
                    <p style="color: #FFF;font-size: x-small;">Gadge Nagar/2,Amravati
                        <br>Folloup Date :2021-03-21
                    </p>
                </div>
            </div>
            <div class="col-md-2" align="center">
                <div class="card">
                    <h5><span style="color: #FFF;" class="fa fa-home"><b style="color: #FFF;">
                                Yash</b></span></h5>
                    <p style="color: #FFF;font-size: x-small;">Gadge Nagar/2,Amravati
                        <br>Folloup Date :2021-03-21
                    </p>
                </div>
            </div> -->
    </div>

</div>


<div class="row">

    <div class="col-md-12" style="margin-top: 2vh;">
        {{-- <h4 style="font-weight: bold;">New Direct Seller Signup</h4> --}}
        <div class="col-md-1" style="margin-top: 2vh;"></div>
        <div class="col-md-11" style="margin-top: 2vh; margin-left:20%;">

            <form action="{{route('enquiry_store')}}" method="post">
                @csrf

                <table width="70%">
                    <tr style="height:30px;">
                        <th width="1%">Select Dealer</th>
                        <th width="1%">Employee</th>
                        <th width="1%">Agent</th>
                        <th width="1%">Project</th>
                        <th width="1%">Status</th>
                        <th width="1%">Plot</th>
                        <th width="1%">Client</th>
                        <th width="1%"></th>

                    </tr>

                    <tr>
                        <td style="padding: 2px;" width="1%">
                            <select class="form-control" name="dealer_id" id="selectdealer">
                                <option value="">--Select--</option>
                                <option value="Employee">Employee</option>
                                <option value="Agent">Agent</option>



                            </select>
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <select class="form-control" name="employee_id" id="selectemployee">
                                {{-- <option value="">All</option> --}}
                                <option value="">--Select--</option>

                                @foreach ($employee as $employee_name)
                                <option value="{{$employee_name->id}}">{{$employee_name->name}}</option>

                                @endforeach

                            </select>
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <select class="form-control" name="agent_id" id="selectagent">
                                {{-- <option value="">All</option> --}}
                                <option value="">--Select--</option>

                                @foreach ($agent as $agent_name)
                                <option value="{{$agent_name->id}}">{{$agent_name->name}}</option>

                                @endforeach

                            </select>
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <select class="form-control" name="project_id" id="selectProject">
                                {{-- <option value="">All</option> --}}
                                <option value="">--Select--</option>

                                @foreach ($project as $project_name)
                                <option value="{{$project_name->id}}">{{$project_name->project_name}}</option>

                                @endforeach

                            </select>
                        </td>

                        <td style="padding: 2px;" width="1%">
                            <select class="form-control select" data-live-search="true" name="status_id"
                                id="selectStatus">
                                <option value="">Select</option>
                                @foreach ($status as $status_name)
                                <option value="{{$status_name->id}}">{{$status_name->plot_sale_status ?? '' }}
                                </option>

                                @endforeach
                            </select>
                        </td>
                        <td style="padding: 2px;text-align: left;" width="1%">
                            <select class="form-control" name="plot_no" id="selectPlot">
                                <option value="">--Select--</option>

                                @foreach ($plot as $plot_name)
                                <option value="{{$plot_name->plot_no}}">{{$plot_name->plot_no}}</option>
                                @endforeach

                            </select>
                        </td>
                        <td style="padding: 2px;text-align: left;" width="1%">
                            <select class="form-control select" data-live-search="true" name="client_id"
                                id="selectClient">
                                <option value="">--Select--</option>

                                @foreach ($client as $client_name)
                                <option value="{{$client_name->id}}">{{$client_name->name}}</option>
                                @endforeach

                            </select>
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <button id="on" title="Add New Client" type="button" class="btn mjks" data-toggle="modal"
                                data-target="#popup1"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                            <button id="on" type="submit" class="btn mjks btn-submit-row"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-floppy-o" aria-hidden="true"></i>
                                Submit</button>
                        </td>


                    </tr>

                </table>
                <table width="30%" style="display: none;">
                    <tr style="height:30px;">
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="name" placeholder="" disabled />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="name" placeholder="" disabled />
                        </td>
                    </tr>

                </table>

            </form>

        </div>

        <div class="col-md-12">
            <table width="100%" style=" margin-top:2vh;">
                <tr style="padding:5px;">
                    <td style="padding: 2px; width: 1%;">
                        <div style="width: 100%;" id="clientDetailsContainer"></div>
                    </td>
                </tr>
            </table>

        </div>
        <div class="col-md-2"></div>
        <div class="col-md-10">
            <table max-width="100%">
                <td style="padding: 2px;" width="2%">
                    <div id="plot_button"></div>

                </td>
            </table>
        </div>


        {{-- <div class="col-md-8" style="margin-top: 2vh;" id="plot_button">
            <div class="row">
                <div class="col-md-12" style="margin-top: 2vh;">
                    @foreach ($plot as $plot)
                    @php
                    // Assuming you have a relationship named `status` in your `ProjectEntryAppendData` model
                    $status = $plot->status; // Adjust this according to your actual relationship name
                    $backgroundColor = 'green'; // Default color

                    if ($status) {
                    switch ($status->plot_sale_status) {
                    case 'Enquiry':
                    $backgroundColor = 'purple';
                    break;
                    case 'Booked':
                    $backgroundColor = 'orange';
                    break;
                    // Add more cases for other status values if needed
                    // ...
                    }
                    }
                    @endphp

                    <div class="col-md-2 plot-button-container mb-3" style="margin-bottom: 20px;">
                        <button id="on" type="button" class="btn mjks plot-button" data-toggle="modal"
                            data-target="#popup2"
                            style="color:#ffffff; height:50px; width:100px; font-weight: bold; background-color: {{ $backgroundColor }};">
                            {{ $plot->plot_no }} <br>
                            <span>{{ $plot->area_sqrft }} Sq. Ft.</span>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        --}}





        <div style="position: fixed; bottom: 0; width: 100%;">
            <div class="col-md-12" style="width: 100%;">
                <div class="col-md-6" style="float: left; width: 50%;">
                    @if ($errors->any())
                    <div class="alert alert-danger mt-2"
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

</div>

</div>


<!-- START DEFAULT DATATABLE -->


</div>



</div>

<!-- PAGE CONTENT WRAPPER -->


</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
<!-- ----Model---- -->
<div class="modal" id="popup1" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
    <div class="modal-dialog modal-basic">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="H4">Add New Client</h4>
            </div>
            <div class="modal-body" style="height:30%">
                <div class="col-md-12">
                    <div class="row">
                        <form action="{{route('client_store')}}" method="post">
                            @csrf
                            <div class="col-md-3">
                                <label class="control-label">Title<font color="#FF0000">*</font></label>
                                <select class="form-control select" data-live-search="true" name="title">
                                    <option {{ old('title')=='Mr.' ? 'selected' : '' }}>Mr.</option>
                                    <option {{ old('title')=='Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                    <option {{ old('title')=='Ku.' ? 'selected' : '' }}>Ku.</option>
                                    <option {{ old('title')=='Shri.' ? 'selected' : '' }}>Shri.</option>
                                    <option {{ old('title')=='Miss' ? 'selected' : '' }}>Miss</option>
                                    <option {{ old('title')=='Mast.' ? 'selected' : '' }}>Mast.</option>
                                    <option {{ old('title')=='Smt.' ? 'selected' : '' }}>Smt.</option>

                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Name<font color="#FF0000">*</font></label>
                                <input type="text" class="form-control" name="name" placeholder="" />
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Email<font color="#FF0000">*</font></label>
                                <input type="text" class="form-control" name="email" placeholder="" />
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Mobile No.<font color="#FF0000">*</font></label>
                                <input type="text" class="form-control" name="contact" placeholder="" />
                            </div>
                            <div class="col-md-3">
                                <label class="control-label">Occupation<font color="#FF0000">*</font></label>
                                <select class="form-control select" data-live-search="true" name="occupation_id">
                                    @foreach($occupations as $occupation)
                                    <option value="{{ $occupation->id }}">{{ $occupation->occupation }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="col-md-3" style="margin-top: 5px;">
                                <label class="control-label">City/Village<font color="#FF0000">*</font></label>
                                <input type="text" class="form-control" name="city" placeholder="" />
                            </div>
                            <div class="col-md-3" style="margin-top: 5px;">
                                <label class="control-label">Address<font color="#FF0000">*</font></label>
                                <input type="text" class="form-control" name="address" placeholder="" />
                            </div>
                            <div class="col-md-3" style="margin-top: 5px;">
                                <label class="control-label">Pincode<font color="#FF0000">*</font></label>
                                <input type="number" class="form-control" name="pin_code" placeholder="" />
                            </div>
                            <div class="col-md-3" style="margin-top: 5px;">
                                <label class="control-label">DOB<font color="#FF0000">*</font></label>
                                <input type="date" class="form-control" name="dob" placeholder="" />
                            </div>
                            <div class="col-md-3" style="margin-top: 5px;">
                                <label class="control-label">Age<font color="#FF0000">*</font></label>
                                <input type="number" class="form-control" name="age" placeholder="" />
                            </div>
                            <div class="col-md-3" style="margin-top: 5px;">
                                <label class="control-label">Marital Status<font color="#FF0000">*</font></label>
                                <select id="marital_status" name="marital_status" class="form-control"
                                    onchange="toggleMarriageDate()">
                                    <option value="single">Single</option>
                                    <option value="married">Married</option>
                                    <option value="divorced">Divorced</option>
                                    <option value="widowed">Widowed</option>
                                </select>
                            </div>

                            <div class="col-md-3" style="margin-top: 5px;">
                                <label class="control-label">Marriage Date<font color="#FF0000">*</font></label>
                                <input type="date" id="marriage_date" class="form-control" name="marriage_date"
                                    placeholder="" />
                            </div>
                            <div class="col-md-3" style="margin-top: 5px;">
                                <label class="control-label">Branch<font color="#FF0000">*</font></label>
                                <select style="width:100%;" class="form-control select" data-live-search="true"
                                    name="branch_id">
                                    <option value="">--Select--</option>
                                    @foreach ($branch as $branch_name)
                                    <option value="{{$branch_name->id}}" {{ old('branch_id')==$branch_name->id ?
                                        'selected'
                                        : ''
                                        }}>{{$branch_name->branch}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3" style="margin-top: 5px;">
                                <label class="control-label">AADHAR<font color="#FF0000">*</font></label>
                                <input type="file" class="form-control" name="aadhar" value="{{ old('aadhar') }}"
                                    required />
                            </div>
                            <div class="col-md-3" style="margin-top: 5px;">
                                <label class="control-label">AADHAR No<font color="#FF0000">*</font></label>
                                <input type="text" class="form-control" name="aadhar_no" value="{{ old('aadhar_no') }}"
                                    required />
                            </div>
                            <div class="col-md-3" style="margin-top: 5px;">
                                <label class="control-label">PAN<font color="#FF0000">*</font></label>
                                <input type="file" class="form-control" name="pan" value="{{ old('pan') }}" required />
                            </div>
                            <div class="col-md-3" style="margin-top: 5px;">
                                <label class="control-label">PAN No<font color="#FF0000">*</font></label>
                                <input type="text" class="form-control" name="pan_no" value="{{ old('pan_no') }}"
                                    required />
                            </div>
                            <div class="col-md-2" style="margin-top:4vh;">
                                <button id="on" type="submit" class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                                    <i class="fa fa-file"></i> SUBMIT
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- -------Model------------- -->
<!-- ----Model----
<div class="modal" id="popup2" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
    <div class="modal-dialog modal-basic">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="H4">Enquiry Details</h4>
            </div>
            <div class="modal-body" style="height:30%">
                <div class="col-md-12">
                    <div class="row">
                        {{-- <h5 style="font-weight: bold;color: blue;">Online : 20</h5>
                        <table width="100%" border="1" style="margin-top: 5px;">
                            <tr style="background-color:#f0f0f0; height:30px;">
                                <th width="3%" style="text-align:center">Sr.No</th>
                                <th width="10%" style="text-align:center">Client Name</th>
                                <th width="10%" style="text-align:center">Mobile</th>
                                <th width="10%" style="text-align:center">Date</th>
                                <th width="10%" style="text-align:center">Source</th>

                            </tr>


                            <tr>
                                <td style="padding:5px;" align="center">
                                    <label>1</label>
                                </td>
                                <td style="padding:5px;" align="center">
                                    <lable>Test</lable>
                                </td>
                                <td style="padding:5px;" align="center">
                                    <label>000 000 0000</label>
                                </td>

                                <td style="padding:5px;" align="center">
                                    <lable>24-12-2023</lable>
                                </td>
                                <td style="padding:5px;" align="center">
                                    <lable>Facebook</lable>
                                </td>
                            </tr>

                        </table>

                        <h5 style="font-weight: bold;color: green;">Offline : 60</h5>
                        <table width="100%" border="1" style="margin-top: 5px;">
                            <tr style="background-color:#f0f0f0; height:30px;">
                                <th width="3%" style="text-align:center">Sr.No</th>
                                <th width="10%" style="text-align:center">Client Name</th>
                                <th width="10%" style="text-align:center">Mobile</th>
                                <th width="10%" style="text-align:center">Date</th>
                                <th width="10%" style="text-align:center">Emp ID/Name</th>

                            </tr>


                            <tr>
                                <td style="padding:5px;" align="center">
                                    <label>1</label>
                                </td>
                                <td style="padding:5px;" align="center">
                                    <lable>Test</lable>
                                </td>
                                <td style="padding:5px;" align="center">
                                    <label>000 000 0000</label>
                                </td>

                                <td style="padding:5px;" align="center">
                                    <lable>24-12-2023</lable>
                                </td>
                                <td style="padding:5px;" align="center">
                                    <lable>EMP-1098</lable>
                                </td>
                            </tr>

                        </table> --}}

                        {{-- <h5 style="font-weight: bold;color: brown;">Agent : 05</h5> --}}
                        <table width="100%" border="1" style="margin-top: 5px;">
                            <tr style="background-color:#f0f0f0; height:30px;">
                                <th width="3%" style="text-align:center">Sr.No</th>
                                <th width="10%" style="text-align:center">Client Name</th>
                                <th width="10%" style="text-align:center">plot no</th>
                                <th width="10%" style="text-align:center">Mobile</th>
                                <th width="10%" style="text-align:center">Date</th>
                                {{-- <th width="10%" style="text-align:center">Agent ID/Name</th> --}}

                            </tr>

                            @foreach ($enquiry as $enquiry)
                            <tr>
                                <td style="padding:5px;" align="center">
                                    <label>{{$loop->index+1}}</label>
                                </td>
                                <td style="padding:5px;" align="center">
                                    <lable>{{$client->where('id', $enquiry->client_id)->first()->name ?? ''}}</lable>
                                </td>
                                <td style="padding:5px;" align="center">
                                    <label>{{$enquiry->plot_no ?? ''}}</label>
                                </td>

                                <td style="padding:5px;" align="center">
                                    <label>{{$client->where('id', $enquiry->client_id)->first()->contact ?? ''}}</label>
                                </td>

                                <td style="padding:5px;" align="center">
                                    <lable>{{ $enquiry->created_at->format('d-m-Y') }}</lable>
                                </td>
                                {{-- <td style="padding:5px;" align="center">
                                    <lable>EMP-1098</lable>
                                </td> --}}
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>

                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> -->
<div class="modal" id="popup2" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
    <div class="modal-dialog modal-basic">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="H4">Enquiry Details</h4>
            </div>
            <div class="modal-body" style="height:30%">
                <div class="col-md-12">
                    <div class="row">
                        <table width="100%" border="1" style="margin-top: 5px;">
                            <thead>
                                <tr style="background-color:#f0f0f0; height:30px;">
                                    <th width="3%" style="text-align:center">Sr.No</th>
                                    <th width="10%" style="text-align:center">Client Name</th>
                                    <th width="10%" style="text-align:center">Plot No</th>
                                    <th width="10%" style="text-align:center">Mobile</th>
                                    <th width="10%" style="text-align:center">Date</th>
                                </tr>
                            </thead>
                            <tbody id="enquiryTableBody">
                                <!-- Dynamic content will be inserted here -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



{{-- @section('js')

<script>
    $(document).ready(function () {
        // Handle status dropdown change event
        $('#selectStatus').change(function () {
            var statusId = $(this).val();

            // Make an AJAX request to fetch projects based on the selected status
            $.ajax({
                url: "{{ url('get-projects') }}/" + statusId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {

                    // console.log('AJAX Success:', data);
                    // Update the options of the project dropdown
                    var selectProject = $('#selectProject');
                    selectProject.empty();

                    // Add a default option
                    selectProject.append('<option value="">--Select--</option>');

                    // Add fetched projects to the dropdown
                    $.each(data, function (key, value) {
                        selectProject.append('<option value="' + value.id + '">' + value.project_name + '</option>');
                    });
                },

                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>
@endsection --}}

@section('js')
<script>
    $(document).ready(function() {
            $('#selectdealer').change(function() {
                var selectedValue = $(this).val();
                if (selectedValue === "Employee") {
                    $('#selectemployee').prop('disabled', false).val("");
                    $('#selectagent').prop('disabled', true).val("");
                } else if (selectedValue === "Agent") {
                    $('#selectemployee').prop('disabled', true).val("");
                    $('#selectagent').prop('disabled', false).val("");
                } else {
                    $('#selectemployee').prop('disabled', true).val("");
                    $('#selectagent').prop('disabled', true).val("");
                }
            });

            // Initialize the state on page load
            $('#selectdealer').trigger('change');
        });
</script>

{{-- to show project as per status and plots corresponding to status and projects--}}

{{-- <script>
    $(document).ready(function () {
    // Handle project and status dropdown change event
    $('#selectProject, #selectStatus').change(function () {
        var projectId = $('#selectProject').val();
        var statusId = $('#selectStatus').val();

        // Make an AJAX request to fetch projects and plots based on the selected project and status
        $.ajax({
            url: "{{ url('get-project-details') }}/" + statusId + "/" + (projectId ? projectId : ''),
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                // Update the options of the project dropdown
                var selectProject = $('#selectProject');
                selectProject.empty(); // Clear existing options
                selectProject.append('<option value="">--Select--</option>');

                // Add fetched projects to the dropdown
                $.each(data.projects, function (key, value) {
                    var selected = (projectId == value.id) ? 'selected' : ''; // Check if it's the selected project
                    selectProject.append('<option value="' + value.id + '" ' + selected + '>' + value.project_name + '</option>');
                });

                // Update the options of the plot dropdown
                var selectPlot = $('#selectPlot');
                selectPlot.empty().append('<option value="">--Select--</option>');

                // Add fetched plots to the dropdown
                $.each(data.plots, function (key, value) {
                    selectPlot.append('<option value="' + value.id + '">' + value.plot_no + '</option>');
                });
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});
</script> --}}
<script>
    function getEnquiryData(button) {
var plotNo = $(button).data('plot_no');
var projectEntryId = $(button).data('project_entry_id');

$.ajax({
url: '{{ route('getEnquiryData') }}', // The route to your controller method
type: 'GET',
data: {
plot_no: plotNo,
project_entry_id: projectEntryId
},
success: function (data) {
// Update the modal body with the retrieved data
var tbody = '';
$.each(data.enquiries, function (index, enquiry) {
tbody += '<tr>' +
    '<td style="padding:5px;" align="center">' + (index + 1) + '</td>' +
    '<td style="padding:5px;" align="center">' + (enquiry.client_name ? enquiry.client_name : 'N/A') + '</td>' +
    '<td style="padding:5px;" align="center">' + (enquiry.plot_no ? enquiry.plot_no : 'N/A') + '</td>' +
    '<td style="padding:5px;" align="center">' + (enquiry.contact ? enquiry.contact : 'N/A') + '</td>' +
    '<td style="padding:5px;" align="center">' + (enquiry.date ? enquiry.date : 'N/A') + '</td>' +
    '</tr>';
});

$('#enquiryTableBody').html(tbody);
},
error: function (xhr, status, error) {
console.error(error);
}
});
}
</script>
<script>
    $(document).ready(function () {



    // Handle status dropdown change event
    $('#selectProject').change(function () {
        var statusId = $(this).val();

        // Make an AJAX request to fetch projects based on the selected status
        $.ajax({
            url: "{{ url('getplots') }}/" + statusId,
            type: 'GET',
            dataType: 'json',
            success: function (data) {

                // console.log('AJAX Success:', data);
                // Update the options of the project dropdown
                var selectPlot = $('#selectPlot');
                selectPlot.empty();

                // Add a default option
                selectPlot.append('<option value="">--Select--</option>');

                // Add fetched projects to the dropdown
                $.each(data, function (key, value) {
                    selectPlot.append('<option value="' + value.plot_no + '">' + value.plot_no + '</option>');
                });
            },

            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });
});
</script>



{{-- To show correspong plot button --}}
{{-- <script>
    $(document).ready(function() {
    $("#selectProject").on('change', function() {
        console.log('alart');
        $.ajax({
            type: "get",
            url: '{{ route('get-plot') }}',
            dataType: "json",
            data: {
                project_code: $(this).val()
            },
            success: function(data) {
                $("#plot_button").html(data);
            },
        });
    })
})
</script> --}}


{{-- to make ajax request to show only that plot-buttons which are corresponding to the selected project --}}
<script>
    $(document).ready(function() {
$("#selectProject").on('change', function() {
    console.log('alert');
    $.ajax({
        type: "get",
        url: '{{ route('get-plot') }}',
        dataType: "json",
        data: {
            project_code: $(this).val()
        },
        success: function(response) {
            $("#plot_button").html(response.html);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
});
</script>





<!-- Script to show client details when client name is selected-->
<script>
    $(document).ready(function () {
        // Handle client dropdown change event
        $('#selectClient').change(function () {
            var clientId = $(this).val();

            // Make an AJAX request to fetch client details
            $.ajax({
                url: "{{ url('get-client-details') }}/" + clientId,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    // Update the HTML content to display client details



                    $('#clientDetailsContainer').html(`
<div class="col-md-12" style="margin-top:5px;">
    <table width="100%" border="1">
        <tr style="background-color:#f0f0f0; height:30%; padding:5px;">
            <th style="padding: 5px;"><label style=" font-size:14px;">Name</label></th>
            {{--  <th style="padding: 5px;"><label style=" font-size:14px;">Occupation</label></th>  --}}
            <th style="padding: 5px;"><label style=" font-size:14px;">Mobile No</label></th>
            <th style="padding: 5px;"><label style=" font-size:14px;">Email</label></th>
            <th style="padding: 5px;"><label style=" font-size:14px;">DOB</label></th>
            <th style="padding: 5px;"><label style=" font-size:14px;">Age</label></th>
            <th style="padding: 5px;"><label style=" font-size:14px;">City</label></th>
            <th style="padding: 5px;"><label style=" font-size:14px;">Address</label></th>

            <th style="padding: 5px;"><label style=" font-size:14px;">Marriage Date</label></th>

        </tr>
        <tr>
            <td style="padding: 5px;" width="5%">${data.name}</td>
            {{--  <td style="padding: 5px;" width="5%">${data.occupation_name->occupation}</td>  --}}
          <td style="padding: 5px;" width="5%">${data.contact ? data.contact : '-'}</td>
        <td style="padding: 5px;" width="5%">${data.email ? data.email : '-'}</td>
        <td style="padding: 5px;" width="5%">${data.dob ? data.dob : '-'}</td>
        <td style="padding: 5px;" width="2%">${data.age ? data.age : '-'}</td>
        <td style="padding: 5px;" width="5%">${data.city ? data.city : '-'}</td>
        <td style="padding: 5px;" width="15%">${data.address ? data.address : '-'} ${data.pin_code ? data.pin_code : '-'}</td>
        <td style="padding: 5px;" width="5%">${data.marriage_date ? data.marriage_date : '-'}</td>

        </tr>
    </table>
</div>






                    `);
                },
                error: function (xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>





@endsection