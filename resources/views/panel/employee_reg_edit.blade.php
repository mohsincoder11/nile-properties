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

            @if (session('success'))
                <div id="successscript" class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <form action="{{ route('emp_reg_update') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $employeeEdit->id }}" />

            <div class="row">
                <div class="col-md-12" style="margin-top: 2vh;">
                    <table width="100%">
                        <tr style="height:30px;">
                            <th width="1%">Select Role</th>
                            <th width="3%">Name</th>
                            <th width="3%">Email</th>
                            <th width="3%">Mobile No.</th>
                            <th width="3%">City/Village</th>
                            <th width="3%">Address</th>
                            <th width="3%">Pincode</th>
                            <th width="3%">AADHAR</th>
                            <th width="3%">AADHAR No.</th>

                        </tr>


                        <tr>
                            <td style="padding: 2px;" width="3%">
                                <select class="form-control select" data-live-search="true" name="role">
                                    <option value="" disabled selected>Select Role</option>
                                    <option value="Admin"
                                        {{ old('role', $employeeEdit->role) == 'Admin' ? 'selected' : '' }}>
                                        Admin</option>
                                    <option value="Reception"
                                        {{ old('role', $employeeEdit->role) == 'Reception' ? 'selected' : '' }}>
                                        Reception</option>
                                    <option value="Employee"
                                        {{ old('role', $employeeEdit->role) == 'Employee' ? 'selected' : '' }}>
                                        Employee</option>
                                </select>
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" name="name" placeholder=""
                                    value="{{ $employeeEdit->name }}" />
                            </td>
                            <td style="padding: 2px;" width="4%">
                                <input type="text" class="form-control" name="email" placeholder=""
                                    value="{{ $employeeEdit->email }}" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" name="contact_number" placeholder=""
                                    value="{{ $employeeEdit->contact_number }}" />
                            </td>
                            <td style="padding: 2px;" width="4%">
                                <input type="text" class="form-control" name="city" placeholder=""
                                    value="{{ $employeeEdit->city }}" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" name="address" placeholder=""
                                    value="{{ $employeeEdit->address }}" />
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <input type="text" class="form-control" name="pincode" placeholder=""
                                    value="{{ $employeeEdit->pincode }}" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="file" class="form-control" name="aadhar" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="4%">
                                <input type="text" class="form-control" name="aadhar_number" placeholder=""
                                    value="{{ $employeeEdit->aadhar_number }}" />
                            </td>
                        </tr>
                    </table>
                    <table width="50%">
                        <tr style="height:30px;">

                            <th width="3%">PAN</th>
                            <th width="3%">PAN No.</th>
                            <th width="3%">Username</th>
                            <th width="3%">Password</th>
                        </tr>
                        <tr>

                            <td style="padding: 2px;" width="3%">
                                <input type="file" class="form-control" name="pan" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <input type="text" class="form-control" name="pan_number" placeholder=""
                                    value="{{ $employeeEdit->pan_number }}" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" name="username" placeholder=""
                                    value="{{ $employeeEdit->username }}" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" name="password" placeholder="" />
                            </td>

                        </tr>

                    </table>

                    <div class="col-md-12" style="margin-top: 5px;margin-bottom: 5px;">
                        {{-- <img src="{{ asset('/panel/img/line.png') }}" width="100%" /> --}}
                        <!-- <h6>Bank Details</h6> -->
                    </div>
                    <table width="50%" id="bankDetailsTable">
                        <tr style="height:30px;">

                            <th width="3%">Account Holder Name</th>
                            <th width="3%">Bank Name</th>
                            <th width="3%">Account Number</th>
                            <th width="3%">IFSC</th>
                            <th></th>

                        </tr>
                        <tr class="bank-details-row">

                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" id="accountHolderName" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <input type="text" class="form-control" id="bankName" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" id="accountNumber" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" id="ifsc" placeholder="" />
                            </td>

                            <td style="padding: 2px;" width="3%">
                                <button id="on" type="button" class="btn mjks btn-success add-row"
                                    style="color:#FFFFFF; height:30px; width:auto;">
                                    <i class="fa fa-plus"></i>ADD</button>


                                <button id="on" type="submit" class="btn mjks btn-submit-row"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                        class="fa fa-floppy-o" aria-hidden="true"></i>
                                    SUBMIT</button>
                            </td>


                        </tr>
                    </table>

        </form>



        <div class="col-md-8" style="margin-top:10px;" align="right">
            <table width="100%" border="1" id="bank_details">
                <tr style="background-color:#f0f0f0; height:30px;">
                    <th width="20%" style="text-align:center"> Account Holder Name</th>
                    <th width="20%" style="text-align:center">Bank Name </th>
                    <th width="20%" style="text-align:center">Account No</th>
                    <th width="20%" style="text-align:center">IFSC</th>
                    <th width="20%" style="text-align:center">Action</th>
                </tr>
                <tbody class="add_more">


                    @foreach ($empListEdit as $empListEdit)
                        <tr>
                            {{-- <td style="padding:5px;" align="center">
                        <label>1</label>
                    </td> --}}
                            <td>
                                <input type="hidden" name="existing_id[]" value="{{ $empListEdit->id }}"> <input
                                    type="hidden" name="employee_id[]" value="{{ $empListEdit->employee_id }}"><input
                                    type="text" required="" style="border:none; width: 100%;"
                                    name="account_holder_name[]" value="{{ $empListEdit->account_holder_name }}">
                            </td>
                            <td><input type="text" name="bank_name[]" required=""
                                    style="border:none; width: 100%;" value={{ $empListEdit->bank_name }}></td>

                            <td><input type="text" name="account_number[]" required=""
                                    style="border:none; width: 100%;" value={{ $empListEdit->account_number }}></td>

                            <td><input type="text" name="ifsc[]" required="" style="border:none; width: 100%;"
                                    value={{ $empListEdit->ifsc }}></td>

                            <td style="text-align:center;">
                                <a href="{{ route('emp_list_destroy', $empListEdit->id) }}">
                                    <button type="button" style="color:#FF0000" class="delete-row"><i
                                            class="fa fa-trash-o"></i></button>
                                </a>
                            </td>

                        </tr>
                    @endforeach


                </tbody>

            </table>
        </div>

    </div>

    </div>
    <div class="row">
        <div class="col-md-12" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            {{-- <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Select Role</th>
                        <th>Name/Email/Mobile/City/Address</th>
                        <th>AADHAR</th>
                        <th>PAN</th>
                        <th>AADHAR No</th>
                        <th>PAN No</th>
                        <th>Username</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($emp as $emp)


                    <tr>

                        <td>{{$loop->index+1}}</td>
                        <td>{{$emp->role}}</td>
                        <td>{{ $emp->name }} / {{ $emp->email }} / {{ $emp->contact_number }} / {{ $emp->city }} / {{
                            $emp->address }}</td>
                        <td></td>
                        <td>{{$emp->aadhar_number}}</td>
                        <td></td>
                        <td>{{$emp->pan_number}}</td>
                        <td>{{$emp->username}}</td>
                        <td>

                            <button
                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>

                            <a href="{{route('emp_destroy', $emp->id)}}">
                                <button
                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                            </a>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div> --}}

            <!-- END DEFAULT DATATABLE -->


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



{{-- script to show data of fields into table after click on add button --}}
{{-- here second table is the table where we are showing the bank details, the value is not
coming from database --}}

@section('js')
    <script>
        $(document).ready(function() {
            $(".add-row").click(function() {
                // Get values from input fields
                var accountHolderName = $('#accountHolderName').val();
                var bankName = $('#bankName').val();
                var accountNumber = $('#accountNumber').val();
                var ifsc = $('#ifsc').val();

                // Check if all fields are not empty
                if (accountHolderName.trim() === '' || bankName.trim() === '' || accountNumber.trim() ===
                    '' || ifsc.trim() === '') {
                    // If any field is empty, do not proceed
                    alert('Please fill in all fields before adding a new row.');
                    return;
                }

                var markup =
                    '<tr><td><input type="text" name="account_holder_name[]" required="" style="border:none; width: 100%;" value="' +
                    accountHolderName + '"></td>' +
                    '<td><input type="text" name="bank_name[]" required="" style="border:none; width: 100%;" value="' +
                    bankName + '"></td>' +
                    '<td><input type="text" name="account_number[]" required="" style="border:none; width: 100%;" value="' +
                    accountNumber + '"></td>' +
                    '<td><input type="text" name="ifsc[]" required="" style="border:none; width: 100%;" value="' +
                    ifsc + '"></td>' +
                    '<td style="text-align:center; color:#FF0000"><button class="delete-row"><i class="fa fa-trash-o"></i></button></td></tr>';
                // <button type="button" class="btn1 btn-outline-danger delete-row"><i class="fa fa-trash-o"></i></button>
                // </td></tr>';
                $(".add_more").append(markup);

                // Clear the input fields
                $('#accountHolderName').val('');
                $('#bankName').val('');
                $('#accountNumber').val('');
                $('#ifsc').val('');


                //    $('#expense').val('');
                //     }
                // );
                // // Find and remove selected table rows
                // $("tbody").delegate(".delete-row", "click", function() {
                //     var mpsqnty=$(this).parents("tr").find('input[name="mpsqnty[]"]').val()
                //     var grandtotal1 =$('#grandtotal1').val();
                //     var total1= parseFloat(grandtotal1)-parseFloat(mpsqnty)
                //     $('#grandtotal1').val(total1);
                //     $(this).parents("tr").remove();
            });
        });
    </script>
@endsection
