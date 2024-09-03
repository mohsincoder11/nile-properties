@extends('panel.layout.header')

@section('main_container')

    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-12">

                <div class="panel-body" style="padding:1px 5px 2px 5px;">


                    <div class="col-md-12" style="margin-top:5px;">
                        <div class="panel panel-default">
                            <h5 class="panel-title"
                                style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                                align="center">
                                <i class="fa fa-bars"></i> &nbsp;Add Role
                            </h5>

                        </div>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{route('user-roles-store')}}" method="post">
                        @csrf
                        <div class="col-md-12" style="margin-top: 10px; margin-left:500px; margin-bottom:20px" >
                            <div class="d-flex justify-content-center">
                                <div class="col-md-2 d-flex flex-column align-items-center">
                                    <label class="control-label">Add Role<font color="#FF0000">*</font></label>
                                    <input type="text" class="form-control" name="role" placeholder="" required />
                                </div>
                            </div>


                        </div>

{{-- --------------------------------------------------------------------------------------------------------- --}}

                        <hr>
                        <div class="col-md-12" style="margin-top: 5px;margin-bottom: 20px;">
                            {{-- <img src="{{ asset('public/img/line.png') }}" width="100%" /> --}}
                        </div>

                        @php
                        $permission = $roleEdit->permission ?? [];
                    @endphp


                        <div class="row g-2" style="margin-left: 10px">
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label" style="font-weight: bold; font-size:13px"> Master
                                    :</label>
                            </div>

                            <div class="col-md-10">

                            <div class="col-md-8">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="city_master"
                                        name="permission[]" id="flexCheckDefault6"  {{ in_array('city_master', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault6">City / Other Charges / Token / Occupation /
                                        Layout Feature / Plot Sale Status / Transaction Type / Whatsapp Number</label>
                                </div>
                            </div>


                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="branch"
                                        name="permission[]" id="flexCheckDefault6"  {{ in_array('branch', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault6">Branch</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="firm_reg"
                                        name="permission[]" id="flexCheckDefault6"  {{ in_array('firm_reg', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault6">Firm</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="agent_reg"
                                        name="permission[]" id="flexCheckDefault6"  {{ in_array('agent_reg', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault6">Agent / Broker Reg. </label>
                                </div>
                            </div>

                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="emp_reg"
                                            name="permission[]" id="flexCheckDefault6"  {{ in_array('emp_reg', $permission) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexCheckDefault6">Team Reg. </label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="customerReg"
                                            name="permission[]" id="flexCheckDefault6"  {{ in_array('customerReg', $permission) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="flexCheckDefault6">Customer Reg. </label>
                                    </div>
                                </div>

                                <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="agrrementmaster"
                                        name="permission[]" id="flexCheckDefault6"  {{ in_array('agrrementmaster', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault6">Agreement Master</label>
                                </div>
                            </div>
                            </div>

                            </div>

                        </div>
                        <hr>

                        <div class="row g-2" style="margin-top: 20px; margin-left:10px">
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label" style="font-weight: bold; font-size:13px">Project:
                                    </label>
                            </div>

                            <div class="col-md-10">

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="project.index"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('project.index', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Project Entry</label>
                                </div>
                            </div>

                        </div>



                    </div>
                {{-- </div> --}}
                        <hr>


                        <div class="row g-2" style="margin-top: 20px; margin-left:10px">
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label" style="font-weight: bold; font-size:13px">CRM:
                                    </label>
                            </div>

                            <div class="col-md-10">

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="crm_lead_management"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('crm_lead_management', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Leads Management</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="allenquiry"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('allenquiry', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">All Enquiry</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="enquiry"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('enquiry', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">New Enquiry</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="newclientindex"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('newclientindex', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Added Client </label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="visitindex"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('visitindex', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Visited</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="proposalindex"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('proposalindex', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Proposal</label>
                                </div>
                            </div>


                        </div>

                        </div>

                        <hr>


                        <div class="row g-2" style="margin-top: 20px; margin-left:10px">
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label" style="font-weight: bold; font-size:13px">Sales Stages:
                                    </label>
                            </div>

                            <div class="col-md-10">

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="initiatesale"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('initiatesale', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Add New Sale</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="newsale"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('newsale', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">New Sale Confirmed</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="paymentcollection"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('paymentcollection', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Payment Collection</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="registration"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('registration', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Request For Reg. </label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="legalclearance"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('legalclearance', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Legal Clearance</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="registrationcompleted"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('registrationcompleted', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Registration Completed</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="saledeedscan"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('saledeedscan', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Saledeed Scan</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="handover"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('handover', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Handover Completed</label>
                                </div>
                            </div>
                        </div>
                        </div>

                        <hr>


                        <div class="row g-2" style="margin-top: 20px; margin-left:10px">
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label" style="font-weight: bold; font-size:13px">Business:
                                    </label>
                            </div>

                            <div class="col-md-10">

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="commission-plans.index"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('commission-plans.index', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Commission Plan Master</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="downlineindex"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('downlineindex', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Business</label>
                                </div>
                            </div>
                        </div>
                        </div>

                        <hr>


                        <div class="row g-2" style="margin-top: 20px; margin-left:10px">
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label" style="font-weight: bold; font-size:13px">Reports:
                                    </label>
                            </div>

                            <div class="col-md-10">

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="reports"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('reports', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Report</label>
                                </div>
                            </div>
                        </div>
                        </div>


                        <hr>


                        <div class="row g-2" style="margin-top: 20px; margin-left:10px">
                            <div class="col-md-2">
                                <label for="inputFirstName" class="form-label" style="font-weight: bold; font-size:13px">More:
                                    </label>
                            </div>

                            <div class="col-md-10">

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="landowner_index"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('landowner_index', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Land Owners</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="expense.master"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('expense.master', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">Account</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="user-logs"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('user-logs', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">User Logs</label>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="user-roles"
                                        name="permission[]" id="flexCheckDefault" {{ in_array('user-roles', $permission) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="flexCheckDefault">User Roles </label>
                                </div>
                            </div>

                        </div>

                        </div>

                    {{-- apppended supervisor data end --}}
   <div class="col-md-2" style="margin-top:20px;" align="left">
                                <button id="on" type="submit" class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:auto;">
                                    <i class="fa fa-file"></i>Submit</button>

                            </div>
                        </form>
                    <div class="row">

                        <div class="col-md-12" style="margin-top:15px;">
                            <div class="panel panel-default">
                                <h5 class="panel-title"
                                    style="color:#ffffff; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                                    align="center">
                                    <i class="fa fa-bars"></i> &nbsp;Added Roles
                                </h5>



                            </div>
                        </div>


                            <!-- END DEFAULT DATATABLE -->


                        </div>
                        <div class="col-md-2" style="margin-top:15px;"></div>
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

@stop
@section('js')
    <script>
        $(document).ready(function() {


            // Toggle password visibility
            $('.toggle-password').click(function() {
                var input = $(this).closest('.input-group').find('input');
                var icon = $(this).find('i');
                if (input.attr('type') === 'password') {
                    input.attr('type', 'text');
                    icon.removeClass('fa-eye').addClass('fa-eye-slash');
                } else {
                    input.attr('type', 'password');
                    icon.removeClass('fa-eye-slash').addClass('fa-eye');
                }
            });




            $(".add-row-purchase").click(function() {
                var acc_holder_name = $('#acc_holder_name').val();
                var bank = $('#bank').val();
                var ac_n = $('#ac_n').val();
                var ifsc_code = $('#ifsc').val();

                // Check if any of the fields are empty
                if (acc_holder_name === '' || bank === '' || ac_n === '' || ifsc_code === '') {
                    // If any field is empty, show a message
                    alert('Please fill all the fields before appending.');
                } else {
                    // If all fields are filled, proceed with appending
                    var markup =
                        '<tr>' +
                        '<td>' +
                        '<input type="hidden" name="acc_holder_name[]" required="" style="border:none; width: 100%;" value="' +
                        acc_holder_name + '">' +
                        '<input type="text" required="" style="border:none; width: 100%;" value="' + acc_holder_name +
                        '">' +
                        '</td>' +
                        '<td>' +
                        '<input type="hidden" name="bank[]" required="" style="border:none; width: 100%;" value="' +
                        bank + '">' +
                        '<input type="text" required="" style="border:none; width: 100%;" value="' + bank +
                        '">' +
                        '</td>' +
                        '<td>' +
                        '<input type="hidden" name="ac_n[]" required="" style="border:none; width: 100%;" value="' +
                        ac_n + '">' +
                        '<input type="text" required="" style="border:none; width: 100%;" value="' + ac_n +
                        '">' +
                        '</td>' +
                        '<td>' +
                        '<input type="text" name="ifsc[]" required="" style="border:none; width: 100%;" value="' +
                        ifsc_code + '">' +
                        '</td>' +
                        '<td style="text-align:center; color:#FF0000">' +
                        '<button class="delete-row"><i class="fa fa-trash-o"></i></button>' +
                        '</td>' +
                        '</tr>';

                    $(".add_more_purchase").append(markup);

                    // Clear the input fields
                    $('#acc_holder_name').val('');
                    $('#bank').val('');
                    $('#ac_n').val('');
                    $('#ifsc').val('');
                }
            });

            $("tbody").delegate(".delete-row", "click", function() {
                $(this).parents("tr").remove();
            });
        });
    </script>
@stop
