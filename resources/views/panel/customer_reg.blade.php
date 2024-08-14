@extends('panel.layout.header')

@section('main_container')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12" style="margin-top:5px;">
            <label style="color:#000; background-color:#FFCC00; width:7%; height:25px; padding-top:5px;margin-top: 1vh;"
                align="center"><span class="fa fa-desktop"></span> <strong>Masters</strong></label>


            <a href="{{route('city_master')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #993800;"><i
                        class="fa fa-database"></i>City/Occupation/Layout Feature/Plot Sale Status/Transaction Type
                    Masters</button>
            </a>
            <a href="{{route('branch')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                        class="fa fa-sitemap"></i>Branch</button>
            </a>


            <a href="{{route('agent_reg')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #218dbb;"><i
                        class="fa fa-users"></i>Agent/Broker Registration</button>
            </a>

            <a href="{{route('emp_reg')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #540338; "><i
                        class="fa fa-user"></i>Employee Registration</button>
            </a>
            <a href="{{route('customerReg')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #8dd510; "><i
                        class="fa fa-user"></i>Customer Registration</button>
            </a>
            <a href="{{route('agrrementmaster')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #d5cb10; "><i
                        class="fa fa-user"></i>Agreement Master
                </button>
            </a>

        </div>
    </div>
    {{--
    <div class="col-md-11" width="90%">
        @if ($errors->any())
        <div class="alert alert-danger mt-2">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if(session('success'))
        <div id="successscript" class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
    </div> --}}

    <form action="{{route('customerRegStore')}}" method="post" enctype="multipart/form-data">
        @csrf


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
                            <select class="form-control select" data-live-search="true" name="title">
                                <option {{ old('title')=='Mr.' ? 'selected' : '' }}>Mr.</option>
                                <option {{ old('title')=='Mrs.' ? 'selected' : '' }}>Mrs.</option>
                                <option {{ old('title')=='Ku.' ? 'selected' : '' }}>Ku.</option>
                                <option {{ old('title')=='Shri.' ? 'selected' : '' }}>Shri.</option>
                                <option {{ old('title')=='Miss' ? 'selected' : '' }}>Miss</option>
                                <option {{ old('title')=='Mast.' ? 'selected' : '' }}>Mast.</option>
                                <option {{ old('title')=='Smt.' ? 'selected' : '' }}>Smt.</option>

                            </select>
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <select class="form-control select" data-live-search="true" name="occupation_id" required>
                                {{-- <option>Govt</option>
                                <option>Business</option>
                                <option>Other</option> --}}
                                <option value="">--Select--</option>
                                @foreach ($occupation as $occupation_name)
                                <option value="{{$occupation_name->id}}" {{ old('occupation_id')==$occupation_name->id ?
                                    'selected' : '' }}>{{$occupation_name->occupation}}</option>

                                @endforeach


                            </select>
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" required />
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" maxlength="10" name="contact"
                                value="{{ old('contact') }}" required />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="city" value="{{ old('city') }}" required />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="pin_code" value="{{ old('pin_code') }}"
                                required />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                                required />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="age" value="{{ old('age') }}" required />
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
                        <td style="padding:2px;">
                            <div style="width:100%;" class="input-group">
                                <input type="date" class="form-control" name="dob" value="{{ old('dob') }}" required />
                            </div>
                        </td>
                        <td style="padding:2px;">
                            <select id="marital_status" name="marital_status" class="form-control"
                                onchange="toggleMarriageDate()">
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                                <option value="divorced">Divorced</option>
                                <option value="widowed">Widowed</option>
                            </select>
                        </td>
                        <td style="padding:2px;">
                            <div style="width:100%;" class="input-group">
                                <input type="date" id="marriage_date" class="form-control" name="marriage_date"
                                    value="{{ old('marriage_date') }}" />
                            </div>
                        </td>
                        <td style="padding:2px;">
                            <select style="width:100%;" class="form-control select" data-live-search="true"
                                name="branch_id">
                                <option value="">--Select--</option>
                                @foreach ($branch as $branch_name)
                                <option value="{{$branch_name->id}}" {{ old('branch_id')==$branch_name->id ? 'selected'
                                    : ''
                                    }}>{{$branch_name->branch}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td style="padding:2px;">
                            <input type="file" class="form-control" name="aadhar" value="{{ old('aadhar') }}"
                                required />
                        </td>
                        <td style="padding:2px;">
                            <input type="text" class="form-control" name="aadhar_no" value="{{ old('aadhar_no') }}"
                                required />
                        </td>
                        <td style="padding:2px;">
                            <input type="file" class="form-control" name="pan" value="{{ old('pan') }}" required />
                        </td>
                        <td style="padding:2px;">
                            <input type="text" class="form-control" name="pan_no" value="{{ old('pan_no') }}"
                                required />
                        </td>
                        <td style="padding:2px;">
                            <button id="on" type="submit" class="btn"
                                style="color:#FFFFFF;height:30px;width:auto;background-color:#006699;">
                                <i class="fa fa-floppy-o" aria-hidden="true"></i> SUBMIT
                            </button>
                        </td>
                    </tr>
                </table>

            </div>

        </div>

    </form>
    <div class="row">
        <div class="col-md-12" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Title</th>
                            <th>Name </th>
                            <th>Occupation</th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                            <th>City/Village</th>
                            <th>Pincode</th>
                            <th>Address</th>
                            <th>Age</th>
                            <th>DOB</th>
                            <th>Marital Status </th>
                            <th>Marriage Date</th>
                            <th>Branch</th>
                            <th>AADHAR</th>
                            <th>AADHAR No</th>
                            <th>PAN</th>
                            <th>PAN No</th>
                            <th>Action</th>

                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($registration as $index=>$reg)


                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$reg->title}}</td>
                            <td>{{$reg->name}}</td>
                            {{-- <td>{{$reg->occupation_id}}</td> --}}
                            <td> @if($reg->occupation_name)
                                {{ $reg->occupation_name->occupation}}
                                @else
                                null
                                @endif</td>
                            <td>{{$reg->email}}</td>
                            <td>{{$reg->contact}}</td>
                            <td>{{$reg->city}}</td>
                            <td>{{$reg->pin_code}}</td>
                            <td>{{$reg->address}}</td>
                            <td>{{$reg->age}}</td>
                            <td>{{$reg->dob}}</td>

                            <td>
                                {{$reg->marital_status ?? ''}}
                            </td>
                            <td>{{$reg->marriage_date}}</td>
                            {{-- <td>{{$reg->occupation_id}}</td> --}}
                            <td>
                                @if($reg->branch_name)
                                {{ $reg->branch_name->branch}}
                                @else
                                null
                                @endif
                            </td>
                            <td>
                                @php
                                $aadharPath = asset('customer_reg/' . $reg->aadhar);
                                @endphp
                                <a href="{{ $aadharPath }}" target="_blank" download="aadhar">
                                    <span style="color: #0910e8"> AADHAR</span> </a>
                            </td>
                            <td>{{$reg->aadhar_no}}</td>
                            <td>
                                @php
                                $panPath = asset('customer_reg/' . $reg->pan);
                                @endphp
                                <a href="{{ $panPath }}" target="_blank" download="pan">

                                    <span style="color: #0910e8"> PAN</span> </a>
                                </a>
                            </td>
                            <td>{{$reg->pan_no}}</td>

                            <td>
                                <div style="display: flex;">
                                    <div>

                                        <a onclick="openEditModal('{{route('edit', $reg->id)}}')">
                                            {{-- href="{{route('edit', $reg->id)}}"> --}}
                                            <button
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="submit" class="btn btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"
                                                    style="margin-left:5px;"></i></button>
                                        </a>
                                    </div>
                                    <div style="margin-left: 5px;">
                                        {{-- <a href="{{route('customerRegDestroy', $reg->id)}}">
                                            <button style="background-color:#ff0000; border:none; max-height:25px;
                                                margin-top:-5px; margin-bottom:-5px;" type="button"
                                                class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                                title="Delete">
                                                <i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                        </a> --}}

                                        <a onclick="openDeleteModal('{{ route('customerRegDestroy', $reg->id) }}')">
                                            <button
                                                style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Delete">
                                                <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                                            </button>
                                        </a>
                                    </div>
                                    {{-- <a href="{{route('customerRegDestroy', $reg->id)}}">
                                        <button type="button" class="btn1 btn-outline-danger"
                                            onclick="confirmDelete({{ $reg->id }})"><i
                                                class='bx bx-trash me-0'></i></button>
                                    </a> --}}
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            <!-- END DEFAULT DATATABLE -->


        </div>
    </div>

    <div style="position: fixed; bottom: 0; width: 100%;">
        <div class="col-md-12" style="width: 100%;">
            <div class="col-md-6" style="float: left; width: 50%;">
                @if ($errors->any())
                <div class="alert alert-danger mt-2"
                    style="background-color: rgba(209, 215, 209, 0.1); color: #1f1e1e; border: 1px solid #abafab; padding: 10px; border-radius: 5px;">
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




<!-- START DEFAULT DATATABLE -->


</div>



</div>

<!-- PAGE CONTENT WRAPPER -->


</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->

@endsection


@section('js')
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
@endsection
{{-- <script>
    function confirmDelete(customerRegId) {
            var result = confirm('Are you sure you want to delete this Customer Registration?');
            if (!result) {
                event.preventDefault(); // Prevent the default action (deletion) if user clicks "Cancel"
            } else {
                window.location.href = '{{ url("customerRegDestroy") }}/' + customerRegId;
            }
        }
</script> --}}
