@extends('panel.layout.header')

@section('main_container')


<style>
    /* Add a blur effect to the background when the modal is open */
    .modal-open {
        overflow: hidden;
    }

    .modal-open.modal-backdrop {
        filter: blur(1px);
    }

    /* Increase the max width of the popup */
    .modal-dialog {
        max-width: 80vw;
        /* adjust the width to your liking */
        margin: 30px auto;
    }
</style>
<div class="page-content-wrap">
    <div class="row">

        <div class="col-md-12" style="margin-top:1px;">
            <div class="panel panel-default">
                <h5 class="panel-title"
                    style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                    align="center">
                    <i class="fa fa-users"></i> &nbsp;New Client
                </h5>



            </div>

        </div>

    </div>
</div>

<!-- START DEFAULT DATATABLE -->
<div class="row">


    <div class="row">


        <div class="col-md-12" align="center">

            <!-- START DEFAULT DATATABLE -->
            <div class="col-md-3" align="center"></div>
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
                            <p class="classic">Visited</p>
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

                    <div style="margin-top: 10vh; font-size: large">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>

                    <div class="icon-box box-1">
                        <a href="{{ route('allenquiry') }}">
                            <img src="{{ asset('panel/assets/images/cards/8.png')}}" alt="" class="classic-1" />
                            <p class="classic">All Enquiries</p>
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

        <div class="col-md-12" style="margin-top:5px;">
            {{-- <div class="col-md-12" align="right" style="margin-bottom: 1vh;">
                <button id="on" type="button" class="btn mjks" data-toggle="modal" data-target="#popup1"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i class="fa fa-plus"
                        aria-hidden="true"></i>
                    Add New Client</button>
            </div> --}}
            <!-- START DEFAULT DATATABLE -->

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable" style="overflow:auto !important;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Customer Name</th>
                            <th>Project Details</th>
                            <th>Dealer</th>
                            <th>Client Stage</th>
                            <th>Status</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($enquery as $index => $enquiry)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <div class="popup-container">
                                    <span class="popup-btn">{{ $enquiry->client_name->name }}</span>
                                    <div class="popup-content">
                                        <p>Mobile Number: {{ $enquiry->client_name->contact }} <br>Address: {{
                                            $enquiry->client_name->address }}<br>
                                        </p>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="popup-container">
                                    <span class="popup-btn">Project Name: {{ $enquiry->project_name->project_name
                                        }}</span>
                                    <div class="popup-content">
                                        <p>Plot No: {{ $enquiry->plot_name->plot_no ?? '' }}</p>
                                        <p> Rate: {{ $enquiry->plot_name->rate ?? '' }}</p>
                                        <p> Amount: {{ $enquiry->plot_name->amount ?? '' }}</p>

                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="popup-container">
                                    <span class="popup-btn">{{ $enquiry->dealer_id ?? '' }}</span>
                                    <div class="popup-content">
                                        <p>Name: {{ $enquiry->emoloyee_name->name ?? '' }} @if($enquiry->broker_id)
                                            <?php $agent = \App\Models\AgentRegistrationMaster::find($enquiry->broker_id); ?>
                                            {{$agent->name ?? ''}}
                                            @endif
                                        </p>


                                    </div>
                                </div>
                            </td>
                            {{-- <td>
                                <select class="form-control select" data-live-search="true" onchange="openModal(this)">
                                    <option value="">select</option>
                                    <option data-id="{{ $enquiry->id }}" value="Added_client">Added client</option>
                                    <option data-id="{{ $enquiry->id }}" value="Visit">Visited</option>
                                    <option data-id="{{ $enquiry->id }}" value="Proposal">Proposal</option>
                                    <option data-id="{{ $enquiry->id }}" value="initiate_sale">Raise Token</option>
                                </select>
                            </td> --}}
                            <td>
                                <select class="form-control select" data-live-search="true" onchange="openModal(this)">
                                    <option value="">select</option>
                                    <option data-id="{{ $enquiry->id }}" value="Added_client" {{ $enquiry->client_status
                                        == 'Added_client' ?
                                        'selected' : '' }}>Added client</option>
                                    <option data-id="{{ $enquiry->id }}" value="Visit" {{ $enquiry->client_status ==
                                        'Visit' ? 'selected' : ''
                                        }}>Visited</option>
                                    <option data-id="{{ $enquiry->id }}" value="Proposal" {{ $enquiry->client_status ==
                                        'Proposal' ? 'selected' : ''
                                        }}>Proposal</option>
                                    <option data-id="{{ $enquiry->id }}" value="initiate_sale" {{ $enquiry->
                                        client_status == 'initiate_sale' ?
                                        'selected' : '' }}>Raise Token</option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control select" data-live-search="true" name="plot_sale_status">
                                    @foreach($statuses as $status)
                                    <option value="{{ $status->id }}" {{ $enquiry->status_id ==
                                        $status->id
                                        ? 'selected' : '' }}>{{
                                        $status->plot_sale_status }}</option>
                                    @endforeach


                                </select>
                            </td>


                            <td>
                                <!-- <button data-toggle="modal" data-target="#popup3" style="background-color:#1abc3d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye" style="margin-left:5px;"></i></button> -->
                                <button
                                    style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="modal" data-id="{{ $enquiry->id }}"
                                    data-target="#myModaledit123"><i class="fa fa-edit"
                                        style="margin-left:5px;"></i>Edit</button>
                                {{-- <button
                                    style="background-color:#22ff00ca; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    data-toggle="modal" data-target="#myModal" title="FollowUP"><i
                                        class="fa fa-file-text" style="margin-left:5px;"></i></button> --}}

                                <button
                                    style="background-color:#083202ca; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" id="followUpButton" class="btn btn-info" data-id="{{ $enquiry->id }}"
                                    data-stage="{{ $enquiry->client_status }}" data-status="{{ $enquiry->status_id }}"
                                    data-toggle="modal" data-target="#myModal">
                                    <i class="fa fa-file-text" style="margin-left:5px;"></i> FollowUP
                                </button>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>

            <!-- END DEFAULT DATATABLE -->


        </div>
    </div>
    <!-- <div class="col-md-12" style="margin-top:5px;">



                        <div class="panel-body" style="margin-bottom:15px;">
                           <table class="table datatable">
                               <thead>
                                   <tr>
                                       <th>Sr. No.</th>
                                       <th>Customer Details</th>
                                       <th>Property Details</th>
                                       <th>Agent</th>

                                       <th>Action</th>
                                   </tr>
                               </thead>
                               <tbody>
                                   <tr>
                                       <td>1</td>

                                       <td ><div class="popover__wrapper">
                                        <a href="#">
                                          <h2 class="popover__title">Sharique Sheikh</h2>
                                        </a>
                                        <div class="popover__content">
                                          <div class="modal-area">
                                            <p>Address: Amravati<br>
                                                Mobile No. : 9579915551<br>
                                              </p>
                                          </div>
                                        </div>
                                      </div></td>

                                     <td ><div class="popover__wrapper">
                                        <a href="#">
                                          <h2 class="popover__title">1239 sq ft</h2>
                                        </a>
                                        <div class="popover__content">
                                          <div class="modal-area">
                                            <p>Open space<br>

                                              </p>
                                          </div>
                                        </div>
                                      </div></td>
                                      <td ><div class="popover__wrapper">
                                        <a href="#">
                                          <h2 class="popover__title">Kapil Sharma</h2>
                                        </a>
                                        <div class="popover__content">
                                          <div class="modal-area">
                                            <p>Address: Amravati<br>
                                                Mobile No. : 9579915551<br>
                                              </p>
                                          </div>
                                        </div>
                                      </div></td>

                                       <td>

                                        <button data-toggle="modal" data-target="#popup3" style="background-color:#1abc3d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye" style="margin-left:5px;"></i></button>
                                        <button style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                        <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                    </td>
                                   </tr>


                               </tbody>
                           </table>
                       </div>



               </div> -->

</div>
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

<!-- Modal -->
<div class="modal fade" id="myModaledit123" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 80vw; margin: 30px auto;">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Change Project and Plot</h4>
            </div>
            <div id="modal-body123" class="modal-body">
                <!-- Content will be loaded here by AJAX -->
            </div>
        </div>
    </div>
</div>


<!---- folloup popup -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document" style="max-width: 80vw; margin: 30px auto;">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Follow Up</h4>
            </div>
            <div class="modal-body">
                <form action="{{ route('folloupstore') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12 text-center">

                            <input type="hidden" name="enquiry_id" id="modal_enquiry_id" value="">
                            <div class="col-md-2">
                                <label for="status">Client Stage</label>
                                <select class="form-control select" data-live-search="true" id="modal_client_stage"
                                    name="client_stage">
                                    <option value="">select</option>
                                    <option data-id="Added_client" value="Added_client">Added client</option>
                                    <option data-id="Visit" value="Visit">Visited</option>
                                    <option data-id="Proposal" value="Proposal">Proposal</option>
                                    <option data-id="initiate_sale" value="initiate_sale">Raise Token</option>

                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="status">Status</label>
                                <select class="form-control select" data-live-search="true" id="modal_status_id"
                                    name="status_id">
                                    @foreach($statuses as $status)
                                    <option value="{{ $status->id }}">{{
                                        $status->plot_sale_status }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="remark">Remark</label>
                                <textarea type="text" rows="1" class="form-control" name="remark" id="remark"
                                    style="width: 100%;"></textarea>
                            </div>
                            <div class="col-md-3">
                                <label for="date-time">Next Follow Up Date</label>
                                <input type="datetime-local" class="form-control" name="follow_up_next_date"
                                    id="date-time" style="width: 100%;" required>
                            </div>

                            <div class="col-md-2" style="margin-top: 2%;">
                                <button type="submit" class="btn btn-primary" style="width: 100%;">Add</button>
                            </div>
                        </div>

                    </div>
                </form>

            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Date and Time</th>
                            <th>Status</th>
                            <th>Remark</th>
                            <th>Client Stage</th>
                            <th>Next Follow Up Date</th>
                        </tr>
                    </thead>
                    <tbody id="followUpTableBody">
                        {{-- <td>02/26/2024</td>
                        <td>Cold</td>
                        <td>Call</td>
                        <td>Visited</td>
                        <td>12/26/2024</td> --}}

                        <!-- Table rows will be generated dynamically here -->
                    </tbody>
                </table>



            </div>
        </div>
    </div>
</div>
<!-- Second modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel2">Action</h4>
            </div>
            <div class="modal-body">
                <!-- Content of the second modal here -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--end-->

<!-- PAGE CONTENT WRAPPER -->
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
                        <div class="col-md-3">
                            <label class="control-label">Sponsor ID<font color="#FF0000">*</font></label>
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Name<font color="#FF0000">*</font></label>
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Email<font color="#FF0000">*</font></label>
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Mobile No.<font color="#FF0000">*</font></label>
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </div>
                        <div class="col-md-3">
                            <label class="control-label">Occupation<font color="#FF0000">*</font></label>
                            <select class="form-control select" data-live-search="true">
                                <option>Test</option>
                                <option>Test</option>
                                <option>test</option>

                            </select>
                        </div>
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label class="control-label">City/Village<font color="#FF0000">*</font></label>
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </div>
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label class="control-label">Address<font color="#FF0000">*</font></label>
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </div>
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label class="control-label">Pincode<font color="#FF0000">*</font></label>
                            <input type="number" class="form-control" name="name" placeholder="" />
                        </div>
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label class="control-label">DOB<font color="#FF0000">*</font></label>
                            <input type="date" class="form-control" name="name" placeholder="" />
                        </div>
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label class="control-label">Age<font color="#FF0000">*</font></label>
                            <input type="number" class="form-control" name="name" placeholder="" />
                        </div>
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label class="control-label">Marriage Date<font color="#FF0000">*</font></label>
                            <input type="date" class="form-control" name="name" placeholder="" />
                        </div>
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label class="control-label">Branch<font color="#FF0000">*</font></label>
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </div>
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label class="control-label">Status<font color="#FF0000">*</font></label>
                            <select class="form-control select" data-live-search="true">
                                <option>Warm</option>
                                <option>Hot</option>
                                <option>Cool</option>

                            </select>
                        </div>
                        <div class="col-md-3" style="margin-top: 5px;">
                            <label class="control-label">Stages<font color="#FF0000">*</font></label>
                            <select class="form-control select" data-live-search="true">

                                <option data-id="" value="Added client">Added client</option>
                                <option data-id="" value="Visit">Visited</option>
                                <option data-id="" value="Proposal">Proposal</option>
                                <option data-id="" value="initiate_sale">Raise Token</option>

                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="control-label">Remark<font color="#FF0000">*</font></label>
                            <textarea rows="2" cols="20" class="form-control" id="editor" placeholder=""
                                name=" "></textarea>
                        </div>
                        <div class="col-md-2" style="margin-top:4vh;">
                            <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"> <i
                                    class="fa fa-file"></i>SUBMIT</button>

                        </div>
                    </div>
                </div>

                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('update_client_status') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="statusInput" type="hidden" name="client_status">
                    <input id="enquiryIdInput" type="hidden" name="enquiry_id">
                    Are you sure you want to update the Client Stage?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
@stop



@section('js')
<script>
    $(document).ready(function(){
        // $('[data-toggle="tooltip"]').tooltip();

        // Handle the button click event
        $('button[data-target="#myModaledit123"]').on('click', function() {
            var enquiryId = $(this).data('id');

            $.ajax({
                url: "{{ route('get.enquiry.data') }}", // The route name
                type: "GET",
                data: { id: enquiryId },
                success: function(response) {
                    // Load the response HTML into the modal body with ID modal-body123
                    $('#modal-body123').html(response.html);
                },
                error: function(xhr) {
                    console.error("An error occurred: " + xhr.status + " " + xhr.statusText);
                }
            });
        });

       $(document).on('click', '#followUpButton', function() {
    var enquiryId = $(this).data('id');
    var clientStage = $(this).data('stage');
    var statusId = $(this).data('status');

    // Set values in the modal fields
    $('#modal_enquiry_id').val(enquiryId);
    $('#modal_client_stage').val(clientStage);
    $('#modal_status_id').val(statusId);

    // AJAX call to fetch follow-up data
    $.ajax({
url: "{{ route('enquiry.follow-up') }}",
    method: 'GET',
    data: { enquiryId: enquiryId },
    success: function(response) {
    // Update the table body with the fetched data
    $('#followUpTableBody').html(response.html);

    // Show the modal
    $('#myModal').modal('show');
    },
    error: function(xhr) {
    console.error('An error occurred while fetching follow-up data:', xhr);
    }
    });
    });



    });
</script>


<script>
    // Function to open the modal and set selected option value and enquiry ID
    function openModal(select) {
        var selectedOption = select.value;
        var enquiryId = select.options[select.selectedIndex].getAttribute('data-id');
        $('#statusInput').val(selectedOption);
        $('#enquiryIdInput').val(enquiryId);
        $('#confirmationModal').modal('show');
    }


</script>

@stop
