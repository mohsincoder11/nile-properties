@extends('panel.layout.header')
@section('main_container')



    {{-- @if ($errors->any())
<div class="alert alert-danger mt-2">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif --}}


    <div class="modal" id="customModal" style="width:50% !important; margin-left:25%;">
        <div class="modal-dialog" style="width:50% !important; margin-left:25%;">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Confirmation</h4>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeCustomModal()">&times;</button>
                </div>

                <!-- Modal Body -->
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>

                <!-- Modal Footer -->
                <div class="modal-footer">
                    <!-- Use an anchor tag instead of a button to allow setting the href dynamically -->
                    <a id="deleteLink" class="btn btn-danger">Yes</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        onclick="closeCustomModal()">No</button>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12" style="margin-top:5px;">
                <label style="color:#000; background-color:#FFCC00; width:7%; height:25px; padding-top:5px;margin-top: 1vh;"
                    align="center"><span class="fa fa-desktop"></span> <strong>Masters</strong></label>


                <a href="{{ route('city_master') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #993800;"><i
                            class="fa fa-database"></i>City/Occupation/Layout Feature/Plot Sale Status/Transaction Type
                        Masters</button>
                </a>
                <a href="{{ route('branch') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                            class="fa fa-sitemap"></i>Branch</button>
                </a>
                <a href="{{ route('firm_reg') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                            class="fa fa-sitemap"></i>Firm</button>
                </a>

                <a href="{{ route('agent_reg') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #218dbb;"><i
                            class="fa fa-users"></i>Agent/Broker Registration</button>
                </a>

                <a href="{{ route('emp_reg') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #540338; "><i
                            class="fa fa-user"></i>Team Registration</button>
                </a>
                <a href="{{ route('customerReg') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #8dd510; "><i
                            class="fa fa-user"></i>Customer Registration</button>
                </a>
                <a href="{{ route('agrrementmaster') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #d5cb10; "><i
                            class="fa fa-user"></i>Agreement Master
                    </button>
                </a>


            </div>
        </div>
        <!-- </div> -->
        {{--
    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}


        <div class="row">

            <div class="col-md-8">
                {{-- @if (session('success'))
            <div id="successscript" class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif --}}
            </div>
            <div class="col-md-12" style="margin-top: 2vh;">

                <form action="{{ route('city_store') }}" method="post">
                    @csrf

                    <div class="col-md-2">
                        <label class="control-label">Add City<font color="#FF0000">*</font></label>
                        <input type="text" class="form-control" name="city" placeholder="" required />
                    </div>

                    <div class="col-md-2" style="margin-top:15px;">
                        <button id="on" type="submit" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-plus"></i>ADD</button>
                        <button id="on" type="button" data-toggle="modal" data-target="#popup3" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-gear"></i>Manage</button>

                    </div>
            </div>
            </form>
            <div class="col-md-12" style="margin-top: 2vh;">

                <form action="{{ route('other_charges_store') }}" method="post">
                    @csrf

                    <div class="col-md-2">
                        <label class="control-label">Add Other Charges<font color="#FF0000">*</font></label>
                        <input type="text" class="form-control" name="other_charges" placeholder="" required />
                    </div>

                    <div class="col-md-2" style="margin-top:15px;">
                        <button id="on" type="submit" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-plus"></i>ADD</button>
                        <button id="on" type="button" data-toggle="modal" data-target="#popup0003"
                            class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;"> <i
                                class="fa fa-gear"></i>Manage</button>

                    </div>
            </div>
            </form>

            <div class="col-md-12" style="margin-top: 2vh;">

                <form action="{{ route('token_store') }}" method="post">
                    @csrf

                    <div class="col-md-2">
                        <label class="control-label">Add Token<font color="#FF0000">*</font></label>
                        <input type="text" class="form-control" name="token" required placeholder="" />
                    </div>

                    <div class="col-md-2" style="margin-top:15px;">
                        <button id="on" type="submit" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-plus"></i>ADD</button>
                        <button id="on" type="button" data-toggle="modal" data-target="#popup12345_1"
                            class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;"> <i
                                class="fa fa-gear"></i>Manage</button>

                    </div>
            </div>
            </form>

            <form action="{{ route('occupation_store') }}" method="post">
                @csrf
                <div class="col-md-12" style="margin-top: 2vh;">
                    <div class="col-md-2">
                        <label class="control-label">Add Occupation<font color="#FF0000">*</font></label>
                        <input type="text" class="form-control" name="occupation" required placeholder="" />
                    </div>
                    <div class="col-md-2" style="margin-top:15px;">
                        <button id="on" type="submit" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-plus"></i>ADD</button>
                        <button id="on" type="button" data-toggle="modal" data-target="#popup4"
                            class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;"> <i
                                class="fa fa-gear"></i>Manage</button>

                    </div>
                </div>
            </form>

            <form action="{{ route('layout_feature_store') }}" method="post">
                @csrf
                <div class="col-md-12" style="margin-top: 2vh;">
                    <div class="col-md-2">
                        <label class="control-label">Add Layout Feature<font color="#FF0000">*</font></label>
                        <input type="text" class="form-control" name="layout_feature" required placeholder="" />
                    </div>
                    <div class="col-md-2" style="margin-top:15px;">
                        <button id="on" type="submit" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-plus"></i>ADD</button>
                        <button id="on" type="button" data-toggle="modal" data-target="#popup5"
                            class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;"> <i
                                class="fa fa-gear"></i>Manage</button>

                    </div>
                </div>
            </form>

            <form action="{{ route('plot_sale_status_store') }}" method="post">
                @csrf
                <div class="col-md-12" style="margin-top: 2vh;">
                    <div class="col-md-2">
                        <label class="control-label">Add Plot Sale Status<font color="#FF0000">*</font></label>
                        <input type="text" class="form-control" required name="plot_sale_status" placeholder="" />
                    </div>
                    <div class="col-md-2" style="margin-top:15px;">
                        <button id="on" type="submit" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-plus"></i>ADD</button>
                        <button id="on" type="button" data-toggle="modal" data-target="#popup6"
                            class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;"> <i
                                class="fa fa-gear"></i>Manage</button>

                    </div>
                </div>
            </form>


            <form action="{{ route('transaction_type_store') }}" method="post">
                @csrf
                <div class="col-md-12" style="margin-top: 2vh;">
                    <div class="col-md-2">
                        <label class="control-label">Add Transaction Type<font color="#FF0000">*</font></label>
                        <input type="text" class="form-control" required name="transaction_type" placeholder="" />
                    </div>
                    <div class="col-md-2" style="margin-top:15px;">
                        <button id="on" type="submit" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-plus"></i>ADD</button>
                        <button id="on" type="button" data-toggle="modal" data-target="#popup7"
                            class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;"> <i
                                class="fa fa-gear"></i>Manage</button>

                    </div>
                </div>
            </form>

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
                    @if (session('success'))
                        <div id="successscript" class="alert alert-success"
                            style="background-color: rgba(209, 215, 209, 0.1); color: #1f1e1e; border: 1px solid #abafab; padding: 10px; border-radius: 5px;">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>


    <!-- END PAGE CONTAINER -->
    <!-- ============================Model for City====================================== -->
    <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added City</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>


                                <tr>
                                    <th>Sr. No.</th>

                                    <th>Added City</th>

                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($city as $city)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>

                                        <td>{{ $city->city }}</td>

                                        <td>

                                            <button data-toggle="modal" data-target="#popup8" type="button"
                                                value="{{ $city->id }}" city_name="{{ $city->city }}"
                                                class="btn btn-primary editbtn btn-sm"
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;">
                                                <i class="fa fa-edit" style="margin-left:5px;"></i></button>

                                            <a onclick="openDeleteModal('{{ route('city_destroy', $city->id) }}')">
                                                <button
                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                                    data-placement="top" title="Delete">
                                                    <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                                                </button>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>



    <!-- other harges-->
    <div class="modal" id="popup0003" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Other Charges</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>


                                <tr>
                                    <th>Sr. No.</th>

                                    <th>Added Other Charges</th>

                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($other as $city)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>

                                        <td>{{ $city->other_charges }}</td>

                                        <td>

                                            <button data-toggle="modal" data-target="#popup0008" type="button"
                                                value="{{ $city->id }}" other_charges="{{ $city->other_charges }}"
                                                class="btn btn-primary editotherbtn btn-sm"
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;">
                                                <i class="fa fa-edit" style="margin-left:5px;"></i></button>

                                            <a
                                                onclick="openDeleteModal('{{ route('other_charges_destroy', $city->id) }}')">
                                                <button
                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                                    data-placement="top" title="Delete">
                                                    <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                                                </button>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="popup12345_1" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Token</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>


                                <tr>
                                    <th>Sr. No.</th>

                                    <th>Added token</th>

                                    <th>Action</th>
                                </tr>

                            </thead>
                            <tbody>
                                @foreach ($token as $token)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>

                                        <td>{{ $token->token }}</td>

                                        <td>

                                            <button data-toggle="modal" data-target="#popup12345_2" type="button"
                                                value="{{ $token->id }}" token_name="{{ $token->token }}"
                                                class="btn btn-primary editbtntoken btn-sm"
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;">
                                                <i class="fa fa-edit" style="margin-left:5px;"></i></button>

                                            <a onclick="openDeleteModal('{{ route('token_destroy', $token->id) }}')">
                                                <button
                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                                    data-placement="top" title="Delete">
                                                    <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                                                </button>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ==========================End token Model===================================== -->
    <!-- ============================================Occupation Model================================= -->
    <div class="modal" id="popup4" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Occupation</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>

                                    <th>Added Occupation</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($occupation as $occupation)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>

                                        <td>{{ $occupation->occupation }}</td>


                                        <td>
                                            <button type="button" value="{{ $occupation->id }}"
                                                occupation_name="{{ $occupation->occupation }}"
                                                class="btn btn-primary editbtnoccupation btn-sm"
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;">
                                                <i class="fa fa-edit" style="margin-left:5px;"></i></button>


                                            <a
                                                onclick="openDeleteModal('{{ route('occupation_destroy', $occupation->id) }}')">
                                                <button
                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                                    data-placement="top" title="Delete">
                                                    <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                                                </button>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    <!-- =============================================================End Model========================== -->
    <!-- ================================================Layout Model===================================== -->
    <div class="modal" id="popup5" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Layout Feature</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>

                                    <th>Added Feature</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($layout as $layout)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>

                                        <td>{{ $layout->layout_feature }}</td>


                                        <td>

                                            <button type="button" value="{{ $layout->id }}"
                                                layout_name="{{ $layout->layout_feature }}" data-toggle="modal"
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                class="btn editbtnlayout btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"
                                                    style="margin-left:5px;"></i></button>

                                            <a onclick="openDeleteModal('{{ route('layout_destroy', $layout->id) }}')">
                                                <button
                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                                    data-placement="top" title="Delete">
                                                    <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach


                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================End Layout Model========================= -->
    <!-- =========================================sale status model===================== -->
    <div class="modal" id="popup6" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Plot Sale Status</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>

                                    <th>Added Sale Status</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($plot as $plot)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>

                                        <td>{{ $plot->plot_sale_status }}</td>

                                        <td>

                                            <button value="{{ $plot->id }}"
                                                plot_name="{{ $plot->plot_sale_status }}" data-toggle="modal"
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn editbtnplot btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"
                                                    style="margin-left:5px;"></i></button>

                                            {{-- <a href="{{route('plot_destroy', $plot->id)}}">
                                        <button
                                            style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                style="margin-left:5px;"></i></button>
                                    </a> --}}

                                            <a onclick="openDeleteModal('{{ route('plot_destroy', $plot->id) }}')">
                                                <button
                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                                    data-placement="top" title="Delete">
                                                    <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>
    <!-- ======================================End model================================== -->
    <!-- =========================================Transaction model===================== -->
    <div class="modal" id="popup7" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Added Transaction Types</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>

                                    <th>Added Transaction Type</th>

                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $transaction)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>

                                        <td>{{ $transaction->transaction_type }}</td>


                                        <td>

                                            <button data-toggle="modal" value="{{ $transaction->id }}"
                                                transaction_name="{{ $transaction->transaction_type }}"
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn editbtntransaction btn-info"
                                                data-toggle="tooltip" data-placement="top" title="Edit"><i
                                                    class="fa fa-edit" style="margin-left:5px;"></i></button>

                                            {{-- <a href="{{route('transaction_destroy', $transaction->id)}}">
                                        <button
                                            style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                style="margin-left:5px;"></i></button>
                                    </a> --}}

                                            <a
                                                onclick="openDeleteModal('{{ route('transaction_destroy', $transaction->id) }}')">
                                                <button
                                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                                    data-placement="top" title="Delete">
                                                    <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>


    <form action="{{ route('update_whatsapp') }}" style="margin-left: 20px;" method="post">
        @csrf
        <input type="hidden" value="" id="whatsapp_id" name="whatsapp_id" />

        <div class="col-md-2" style="margin-top:10px;">
            <label class="control-label"> Whatsapp Number<font color="#FF0000">*</font></label>
            <input type="text" class="form-control" maxlength="10" required name="number" id="whatsapp_type"
                value="{{ $whatsapp->number ?? '' }}" style="width: 92%;" placeholder="" />
        </div>

        <div class="col-md-2" style="margin-top:27px;padding-left: 10px;">
            <button id="on" type="submit" class="btn mjks"
                style="color:#FFFFFF; height:30px; width:auto; margin-right:30px;"> <i
                    class="fa fa-plus"></i>Update</button>


        </div>
    </form>


    <!-- ======================================edit model========================================== -->

    {{-- City Edit Modal --}}

    <div class="modal" id="popup8" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Update City</h4>
                </div>



                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <div class="col-md-12">
                            <form action="{{ route('update_city') }}" method="post">
                                @csrf
                                <input type="hidden" value="" id="city_id" name="city_id" />
                                <div class="col-md-6">
                                    <label class="control-label"> City<font color="#FF0000">*</font></label>
                                    <input type="text" id="city" value="" class="form-control"
                                        name="city" required placeholder="" />
                                </div>

                                <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                    <button id="updateCityBtn" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;"> <i
                                            class="fa fa-plus"></i>Update</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                </div>
            </div>
        </div>
    </div>



    <div class="modal" id="popup0008" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Update Other Charges</h4>
                </div>



                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <div class="col-md-12">
                            <form action="{{ route('update_other_charges') }}" method="post">
                                @csrf
                                <input type="hidden" value="" id="other_charges_id" name="other_charges_id" />
                                <div class="col-md-6">
                                    <label class="control-label"> Other Charges<font color="#FF0000">*</font></label>
                                    <input type="text" id="other_charges" value="" class="form-control"
                                        name="other_charges" required placeholder="" />
                                </div>

                                <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                    <button id="updateOtherBtn" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;"> <i
                                            class="fa fa-plus"></i>Update</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                </div>
            </div>
        </div>
    </div>
    {{-- Token Edit Modal --}}

    <div class="modal" id="popup12345_2" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Update token</h4>
                </div>



                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <div class="col-md-12">
                            <form action="{{ route('update_token') }}" method="post">
                                @csrf
                                <input type="hidden" value="" id="token_id" name="token_id" />
                                <div class="col-md-6">
                                    <label class="control-label"> token<font color="#FF0000">*</font></label>
                                    <input type="text" id="token" required value="" class="form-control"
                                        name="token" placeholder="" />
                                </div>

                                <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                    <button id="updatetokenBtn" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;"> <i
                                            class="fa fa-plus"></i>Update</button>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                </div>
            </div>
        </div>
    </div>
    {{-- Occupation Edit Modal --}}

    <div class="modal" id="popup9" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Update Occupation</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <div class="col-md-12">

                            <form action="{{ route('update_occupation') }}" method="post">
                                @csrf

                                <input type="hidden" value="" id="occupation_id" name="occupation_id" />

                                <div class="col-md-6">
                                    <label class="control-label">Occupation<font color="#FF0000">*</font></label>
                                    <input type="text" value="" required id="occupation" class="form-control"
                                        name="occupation" placeholder="" />
                                </div>

                                <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                    <button id="updateOccupationBtn" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;"> <i
                                            class="fa fa-plus"></i>Update</button>



                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>


    {{-- Layout Edit Modal --}}

    <div class="modal" id="popup10" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Update Layout Feature</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <div class="col-md-12">
                            <form action="{{ route('update_layout') }}" method="post">
                                @csrf
                                <input type="hidden" value="" id="layout_id" name="layout_id" />
                                <div class="col-md-8">
                                    <label class="control-label">Layout Feature<font color="#FF0000">*</font></label>
                                    <input type="text" class="form-control" required id="layout_feature"
                                        name="layout_feature" placeholder="" />
                                </div>

                                <div class="col-md-4" style="margin-top:15px;padding-left: 10px;">
                                    <button id="on" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;"> <i
                                            class="fa fa-plus"></i>Update</button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    {{-- Plot Edit Modal --}}

    <div class="modal" id="popup11" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Update Plot Sale Status</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <div class="col-md-12">

                            <form action="{{ route('update_plot') }}" method="post">
                                @csrf
                                <input type="hidden" value="" id="plot_id" name="plot_id" />


                                <div class="col-md-6">
                                    <label class="control-label">Plot Sale Status<font color="#FF0000">*</font></label>
                                    <input type="text" class="form-control" id="plot_sale_status" required
                                        name="plot_sale_status" placeholder="" />
                                </div>

                                <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                    <button id="on" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;"> <i
                                            class="fa fa-plus"></i>Update</button>


                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

    {{-- Transaction Edit Modal --}}

    <div class="modal" id="popup12" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Update Transaction Type</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <div class="col-md-12">

                            <form action="{{ route('update_transaction') }}" method="post">
                                @csrf
                                <input type="hidden" value="" id="transaction_id" name="transaction_id" />

                                <div class="col-md-6">
                                    <label class="control-label"> Transaction Type<font color="#FF0000">*</font></label>
                                    <input type="text" class="form-control" required name="transaction_type"
                                        id="transaction_type" placeholder="" />
                                </div>

                                <div class="col-md-6" style="margin-top:15px;padding-left: 10px;">
                                    <button id="on" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;"> <i
                                            class="fa fa-plus"></i>Update</button>


                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>


@endsection


@section('js')
    <script>
        $(document).ready(function() {

            $(document).on('click', '.editbtn', function() {
                var city_id = $(this).val(); // Corrected variable name
                // alert(city_id);

                $('#popup8').modal('show');

                //*********************************************
                // I did this because i want to work on only two fields id and city
                // but when want to work on multiple fields we have to do this using ajax (backend)

                $('#city').val($(this).attr('city_name'));
                $('#city_id').val($(this).attr('value'));

                // $.ajax({
                //     type: "GET",
                //     url: "/edit_city/" + city_id, // Corrected variable name
                //     success: function (response) {
                //         // console.log(response.city.city);
                //         $('#city').val(response.city);
                //         $('#city_id').val(city_id);
                //     }
                // });


            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.editotherbtn', function() {
                var city_id = $(this).val(); // Corrected variable name

                $('#popup0008').modal('show');


                $('#other_charges').val($(this).attr('other_charges'));
                $('#other_charges_id').val($(this).attr('value'));




            });
        });
    </script>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.editbtntoken', function() {
                var city_id = $(this).val(); // Corrected variable name
                // alert(city_id);

                $('#popup12345_2').modal('show');

                //*********************************************
                // I did this because i want to work on only two fields id and city
                // but when want to work on multiple fields we have to do this using ajax (backend)

                $('#token').val($(this).attr('token_name'));
                $('#token_id').val($(this).attr('value'));

                // $.ajax({
                //     type: "GET",
                //     url: "/edit_token/" + city_id, // Corrected variable name
                //     success: function (response) {
                //         // console.log(response.city.city);
                //         $('#city').val(response.city);
                //         $('#city_id').val(city_id);
                //     }
                // });


            });
        });
    </script>

    <script>
        $(document).ready(function() {

            $(document).on('click', '.editbtnoccupation', function() {
                var occupation_id = $(this).val(); // Corrected variable name
                // alert(occupation_id);

                $('#popup9').modal('show');

                //*********************************************
                // I did this because i want to work on only two fields id and city
                // but when want to work on multiple fields we have to do this using ajax (backend)

                $('#occupation').val($(this).attr('occupation_name'));
                $('#occupation_id').val($(this).attr('value'));


            });
        });
    </script>

    {{-- LAYOUT --}}

    <script>
        $(document).ready(function() {

            $(document).on('click', '.editbtnlayout', function() {
                var layout_id = $(this).val(); // Corrected variable name
                // alert(occupation_id);

                $('#popup10').modal('show');

                //*********************************************
                // I did this because i want to work on only two fields id and city
                // but when want to work on multiple fields we have to do this using ajax (backend)

                $('#layout_feature').val($(this).attr('layout_name'));
                $('#layout_id').val($(this).attr('value'));


            });
        });
    </script>



    {{-- PLOT --}}

    <script>
        $(document).ready(function() {

            $(document).on('click', '.editbtnplot', function() {
                var plot_id = $(this).val(); // Corrected variable name
                // alert(occupation_id);

                $('#popup11').modal('show');

                //*********************************************
                // I did this because i want to work on only two fields id and city
                // but when want to work on multiple fields we have to do this using ajax (backend)

                $('#plot_sale_status').val($(this).attr('plot_name'));
                $('#plot_id').val($(this).attr('value'));


            });
        });
    </script>

    {{-- Transaction --}}

    <script>
        $(document).ready(function() {
            $(document).on('click', '.editbtntransaction', function() {
                var transaction_id = $(this).val();
                $('#popup12').modal('show');

                $('#transaction_type').val($(this).attr('transaction_name'));
                $('#transaction_id').val($(this).attr('value'));

            });
        });
    </script>
@stop


{{--

<script>
    var deleteModalVisible = false;

    function openCustomModal(deleteUrl) {
        // Set the delete URL in the modal
        document.getElementById('customModal').deleteUrl = deleteUrl;

        // Show the delete confirmation modal
        $('#customModal').modal('show');
        deleteModalVisible = true;
    }

    function deleteItem() {
        // Get the delete URL from the modal
        var deleteUrl = document.getElementById('customModal').deleteUrl;

        // Redirect to the delete URL
        window.location.href = deleteUrl;

        // Hide the delete confirmation modal
        $('#customModal').modal('hide');
        deleteModalVisible = false;
    }

    function closeCustomModal() {
        // Hide the delete confirmation modal only if it's not already hidden
        if (deleteModalVisible) {
            $('#customModal').modal('hide');
            deleteModalVisible = false;
        }
    }

    // Event listener for when the delete confirmation modal is hidden
    $('#customModal').on('hidden.bs.modal', function () {
        deleteModalVisible = false;
    });
</script>

@stop --}}
