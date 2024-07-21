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

        </div>
    </div>



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
    </div>

    <form action="{{route('update')}}" method="post" enctype="multipart/form-data">
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

                        <input type="hidden" name="id" value="{{$customerEdit->id}}" />
                        <td style="padding: 2px;" width="1%">
                            <select class="form-control select" data-live-search="true" name="title">
                                <option value="Mr." {{ old('title', $customerEdit->title) == 'Mr.' ? 'selected' : ''
                                    }}>Mr.</option>
                                <option value="Mrs." {{ old('title', $customerEdit->title) == 'Mrs.' ? 'selected' : ''
                                    }}>Mrs.</option>
                                <option value="Ku." {{ old('title', $customerEdit->title) == 'Ku.' ? 'selected' : ''
                                    }}>Ku.</option>
                                <option value="Shri." {{ old('title', $customerEdit->title) == 'Shri.' ? 'selected' : ''
                                    }}>Shri.</option>
                                <option value="Miss" {{ old('title', $customerEdit->title) == 'Miss' ? 'selected' : ''
                                    }}>Miss</option>
                                <option value="Mast." {{ old('title', $customerEdit->title) == 'Mast.' ? 'selected' : ''
                                    }}>Mast.</option>
                                <option value="Smt." {{ old('title', $customerEdit->title) == 'Smt.' ? 'selected' : ''
                                    }}>Smt.</option>

                            </select>
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" name="name"
                                value="{{ old('name', $customerEdit->name) }}" placeholder="" required />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <select class="form-control select" data-live-search="true" name="occupation_id" required>
                                {{-- <option>Govt</option>
                                <option>Business</option>
                                <option>Other</option> --}}
                                <option value="">--Select--</option>
                                @foreach ($occupation as $occupation_name)
                                <option value="{{$occupation_name->id}}" {{ old('occupation_id', $customerEdit->
                                    occupation_id) == $occupation_name->id ? 'selected' : '' }}>
                                    {{$occupation_name->occupation}}</option>

                                @endforeach

                            </select>
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="email" placeholder=""
                                value="{{$customerEdit->email}}" required />
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" name="contact" placeholder=""
                                value="{{$customerEdit->contact}}" required />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="city" placeholder=""
                                value="{{$customerEdit->city}}" required />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="pin_code" placeholder=""
                                value="{{$customerEdit->pin_code}}" required />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="address" placeholder=""
                                value="{{$customerEdit->address}}" required />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="age" placeholder=""
                                value="{{$customerEdit->age}}" required />
                        </td>
                    </tr>

                </table>

                <table width="100%">
                    <tr style="height:30px;">
                        <th width="1%">DOB</th>

                        <th width="1%">Marital Status</th>
                        <th width="1%">Marriage Date</th>
                        <th width="1%">Branch</th>
                        <th width="1">AADHAR</th>
                        <th width="1%">AADHAR No.</th>
                        <th width="1%">PAN</th>
                        <th width="1%">PAN No.</th>

                        <th width="1%"></th>

                    </tr>


                    <tr>
                        <td style="padding: 2px;" width="1%">
                            <div class="input-group">
                                <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020"
                                    data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                            </div>


                            <div class="input-group">
                                <input type="date" id="dp-3" class="form-control datepicker"
                                    value="{{ old('dob', $customerEdit->dob)}}" data-date="01-05-2020"
                                    data-date-format="dd-mm-yyyy" data-date-viewmode="years" name="dob"
                                    value="{{$customerEdit->dob}}" />
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </div>

                            {{-- <div class="input-group">
                                <input type="date" id="dp-3" class="form-control datepicker"
                                    value="{{ old('dob', $customerEdit->dob) }}" data-date="01-05-2020"
                                    data-date-format="dd-mm-yyyy" data-date-viewmode="years" name="dob" />
                                <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-calendar"></span></span>
                            </div> --}}

                        </td>

                        <td style="padding:2px;">
                            <select id="marital_status" name="marital_status" class="form-control"
                                onchange="toggleMarriageDate()">
                                <option value="single" {{ old('marital_status')=='single' ? 'selected' : '' }}>Single
                                </option>
                                <option value="married" {{ old('marital_status')=='married' ? 'selected' : '' }}>Married
                                </option>
                                <option value="divorced" {{ old('marital_status')=='divorced' ? 'selected' : '' }}>
                                    Divorced</option>
                                <option value="widowed" {{ old('marital_status')=='widowed' ? 'selected' : '' }}>Widowed
                                </option>
                            </select>
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <div class="input-group">
                                <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020"
                                    data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                            </div>

                            <div class="input-group">
                                <input type="date" id="dp-3" class="form-control datepicker" data-date="01-05-2020"
                                    data-date-format="dd-mm-yyyy" data-date-viewmode="years" name="marriage_date"
                                    value="{{old ('marriage_date', $customerEdit->marriage_date)}}" />
                                <span class="input-group-addon"><span
                                        class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <select class="form-control select" data-live-search="true" name="branch_id" required>
                                {{-- <option>Nagpur</option>
                                <option>Wardha</option>
                                <option>Amravati</option> --}}
                                <option value="">--Select--</option>
                                @foreach ($branch as $branch_name)
                                <option value="{{$branch_name->id}}" {{ old('branch_id', $customerEdit->branch_id) ==
                                    $branch_name->id ? 'selected' : '' }}>{{$branch_name->branch}}</option>

                                @endforeach


                            </select>
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="file" class="form-control" name="aadhar" placeholder="" value="" />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="aadhar_no" placeholder=""
                                value="{{$customerEdit->aadhar_no}}" required />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="file" class="form-control" name="pan" placeholder="" value="" />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="pan_no" placeholder=""
                                value="{{$customerEdit->pan_no}}" required />
                        </td>
                        <td>

                            <button id="on" type="submit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-floppy-o" aria-hidden="true"></i>
                                Update</button>
                        </td>
                    </tr>

                </table>

            </div>

        </div>

    </form>

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
