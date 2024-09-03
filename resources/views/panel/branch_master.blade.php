@extends('panel.layout.header')

@section('main_container')




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
        <div class="row">
            <div class="col-md-12" style="margin-top: 2vh;">
                <!-- <div class="panel panel-default" >
                               <div class="panel-body" > -->
                <!-- <div class="col-md-4"></div> -->
                <div>

                    <div class="col-md-11">
                        @if ($errors->any())
                            <div class="alert alert-danger mt-2">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div id="successscript" class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif

                    </div>

                    <form action="{{ route('branchStore') }}" method="post">


                        @csrf
                        <table width="100%">
                            <tr style="height:30px;">
                                <th width="3%">Select City</th>
                                <th width="3%">Name of Branch</th>
                                <th width="3%">Address</th>
                                <th width="3%">Contact Person</th>
                                <th width="3%">Mobile No.</th>
                                <th width="3%">Latitude</th>
                                <th width="3%">Longitude</th>
                                <th></th>

                            </tr>


                            <tr>
                                <td style="padding: 2px;" width="2%">
                                    <select class="form-control select" data-live-search="true" name="city_id" required>
                                        {{-- <option value="" disabled selected>Select City</option>
                                    <option value="Nagpur">Nagpur</option>
                                    <option value="Pune">Pune</option>
                                    <option value="Indore">Indore</option> --}}
                                        <option value="">--Select--</option>
                                        @foreach ($city as $city_name)
                                            <option value="{{ $city_name->id }}"
                                                {{ old('city_id') == $city_name->id ? 'selected' : '' }}>
                                                {{ $city_name->city }}</option>
                                        @endforeach


                                    </select>
                                </td>
                                <td style="padding: 2px;" width="4%">
                                    <input type="text" class="form-control" name="branch" value="{{ old('branch') }}"
                                        required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                                        required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="text" class="form-control" name="contact_person"
                                        value="{{ old('contact_person') }}" required />
                                </td>
                                <td style="padding: 2px;" width="3%">
                                    <input type="text" class="form-control" name="contact_number" placeholder=""
                                        value="{{ old('contact_number') }}" maxlength="10" required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="text" class="form-control" name="latitude" placeholder=" "
                                        value="{{ old('latitude') }}" required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="text" class="form-control" name="longitude" placeholder=""
                                        value="{{ old('longitude') }}" required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <button id="on" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;"> <i
                                            class="fa fa-plus"></i>ADD</button>
                                </td>
                            </tr>

                        </table>



                </div>
                </form>
                <!-- </div>
                         </div> -->

            </div>
            <div class="row">
                <!-- <div class="col-md-3"></div> -->
                <div class="col-md-12" style="margin-top:15px;">

                    <!-- START DEFAULT DATATABLE -->

                    <!-- <h5 class="panel-title" style="color:#FFFFFF; background-color:#754d35; width:100%; font-size:14px;" align="center"> <i class="fa fa-plus"></i> Added Party</h5> -->
                    <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>City</th>
                                    <th>Name of Branch</th>
                                    <th>Address</th>
                                    <th>Contact Person</th>
                                    <th>Mobile Number</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($branch as $index => $branch)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>

                                        {{-- <td>{{$branch->city_id}}</td> --}}
                                        <td>
                                            @if ($branch->city_name)
                                                {{ $branch->city_name->city }}
                                            @else
                                                null
                                            @endif
                                        </td>
                                        <td>{{ $branch->branch }}</td>
                                        <td>{{ $branch->address }}</td>
                                        <td>{{ $branch->contact_person }}</td>
                                        <td>{{ $branch->contact_number }}</td>
                                        <td>{{ $branch->latitude }}</td>
                                        <td>{{ $branch->longitude }}</td>
                                        <td>
                                            {{-- <a href="{{route('branchMasterEdit', $branch->id)}}">
                                        <button
                                            style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i class="fa fa-edit"
                                                style="margin-left:5px;"></i></button>
                                    </a> --}}



                                            <a onclick="openEditModal('{{ route('branchMasterEdit', $branch->id) }}')">
                                                <button
                                                    style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info" data-toggle="tooltip"
                                                    data-placement="top" title="Edit"><i class="fa fa-edit"
                                                        style="margin-left:5px;"></i></button>
                                            </a>


                                            {{-- <a href="{{route('destroy', $branch->id)}}">
                                        <button
                                            style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                style="margin-left:5px;"></i></button>
                                    </a> --}}

                                            <a onclick="openDeleteModal('{{ route('destroy', $branch->id) }}')">
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

                    <!-- END DEFAULT DATATABLE -->


                </div>
                <div class="col-md-4"></div>
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

    <!-- MESSAGE BOX-->

@endsection
