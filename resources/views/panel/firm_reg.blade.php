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
            <a href="{{route('firm_reg')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                        class="fa fa-sitemap"></i>Firm</button>
            </a>
            <a href="{{route('firm_reg')}}"> <button id="on" type="button" class="btn mjks"
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

    {{-- <div class="col-md-11" width="90%">
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


    <form action="{{route('firm_reg_store')}}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="row">
            <div class="col-md-12" style="margin-top: 2vh;">
                <table width="100%">
                    <tr style="height:30px;">
                        <th width="3%">Firm </th>
                        <th width="3%">Email</th>
                        <th width="3%">Mobile No.</th>
                        <th width="3%">City/Village</th>
                        <th width="3%">Address</th>
                        <th width="3%">Pincode</th>
                        <th width="3%">AADHAR</th>
                        <th width="3%">AADHAR No.</th>

                    </tr>


                    <tr>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required />
                        </td>
                        <td style="padding: 2px;" width="4%">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="contact_number"
                                value="{{ old('contact_number') }}" required />
                        </td>
                        <td style="padding: 2px;" width="4%">
                            <input type="text" class="form-control" name="city" value="{{ old('city') }}" required />
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" required name="address" value="{{ old('address') }}"
                                required />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" required name="pincode" value="{{ old('pincode') }}"
                                required />
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <input type="file" class="form-control" required name="aadhar" value="{{ old('aadhar') }}"
                                required />
                        </td>
                        <td style="padding: 2px;" width="4%">
                            <input type="text" class="form-control" required name="aadhar_number"
                                value="{{ old('aadhar_number') }}" required />
                        </td>
                    </tr>
                </table>
                <table width="50%">
                    <tr style="height:30px;">

                        <th width="1%">PAN</th>
                        <th width="1%">PAN No.</th>
                        {{-- <th width="3%">Username</th>
                        <th width="3%">Password</th> --}}
                    </tr>
                    <tr>

                        <td style="padding: 2px;" width="1%">
                            <input type="file" class="form-control" required name="pan" value="{{ old('pan') }}"
                                required />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" required name="pan_number"
                                value="{{ old('pan_number') }}" required />
                        </td>
                        {{-- <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" required name="username"
                                value="{{ old('username') }}" required />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" required name="password"
                                value="{{ old('password') }}" required />
                        </td> --}}

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

                <tr>
                    {{-- <td style="padding:5px;" align="center">
                        <label>SBI</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>23455879808</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>SBI0012H8679</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>Sharique Sheikh</label>
                    </td>

                    <td style="text-align:center; color:#FF0000"><button><i class="fa fa-trash-o"></i></button>

                    </td> --}}
                </tr>
            </tbody>

        </table>
    </div>

</div>

</div>
<div class="row">
    <div class="col-md-12" style="margin-top:15px;">

        <!-- START DEFAULT DATATABLE -->

        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <!-- <th>Select Role</th> -->
                        <th>Firm/Email/Mobile/City/Address</th>
                        <th>AADHAR</th>

                        <th>AADHAR No</th>
                        <th>PAN</th>
                        <th>PAN No</th>
                        {{-- <th>Username</th> --}}
                        <th>Bank Details</th>
                        {{-- <th>Bank Name</th>
                        <th>Account Number</th>
                        <th>IFSC</th>
                        <th>Account Holder Name</th> --}}
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($agent as $agent)


                    <tr>

                        <td>{{$loop->index+1}}</td>
                        <td>{{ $agent->name }} / {{ $agent->email }} / {{ $agent->contact_number }} / {{ $agent->city }}
                            / {{ $agent->address }}</td>
                        {{-- <td></td> --}}
                        <td>
                            @php
                            $aadharPath = asset('firm/' . $agent->aadhar);
                            $aadharFileName = basename($agent->aadhar);
                            $defaultImagePath = asset('images/default-image.png');
                            $aadharExists = file_exists(public_path('firm/' . $agent->aadhar));
                            @endphp
                            <a href="{{ $aadharPath }}" target="_blank" download>
                                <span style="color: #002df4"> AADHAR</span>
                            </a>
                        </td>
                        <td>{{ $agent->aadhar_number }}</td>
                        <td>
                            @php
                            $panPath = asset('firm/' . $agent->pan);
                            $panFileName = basename($agent->pan);
                            $panExists = file_exists(public_path('firm/' . $agent->pan));
                            @endphp
                            <a href="{{ $panPath }}" target="_blank" download>
                                <span style="color: #0501fc"> PAN</span>

                            </a>
                        </td>
                        <td>{{$agent->pan_number}}</td>
                        {{-- <td>{{$agent->username}}</td> --}}
                        {{-- <td><button id="on" type="button" data-toggle="modal" data-target="#popup3"
                                class="btn mjks" style="color:#FFFFFF; height:30px; width:auto;"> <i></i>View</button>
                        </td> --}}
                        {{-- <td>
                            <button class="btn mjks open-modal" data-toggle="modal" data-target="#popup3"
                                data-agent-id="{{ $agent->id }}" style="color:#FFFFFF; height:30px; width:auto;">
                                <i></i>View
                            </button>
                        </td> --}}

                        <td>
                            {{-- <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#service-area-view"
                                class="btn btn-primary serviceareaview" id="{{ $agent->id }}"><i
                                    class="fas fa-eye"></i></a> --}}

                            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#service-area-view"
                                class=" serviceareaview" id="{{ $agent->id }}">
                                {{-- href="{{route('firm_reg_edit', $agent->id)}}"> --}}
                                <button
                                    style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    title="Show"><i class="fa fa-eye" style="margin-left:5px;"></i></button><i
                                    class="fas fa-eye"></i>
                            </a>

                        </td>

                        <td>
                            <div style="display: flex;">
                                <div>
                                    <a onclick="openEditModal('{{route('firm_reg_edit', $agent->id)}}')">
                                        {{-- href="{{route('firm_reg_edit', $agent->id)}}"> --}}
                                        <button
                                            style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Edit"><i class="fa fa-edit"
                                                style="margin-left:5px;"></i></button>
                                    </a>
                                </div>
                                {{-- <a href="{{route('firm_destroy', $agent->id)}}">
                                    <button
                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                        title="Delete">
                                        <i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                </a> --}}
                                <div style="margin-left: 5px;">
                                    <a onclick="openDeleteModal('{{ route('firm_destroy', $agent->id) }}')">
                                        <button
                                            style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info" data-toggle="tooltip"
                                            data-placement="top" title="Delete">
                                            <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
        </div>

        <!-- END DEFAULT DATATABLE -->


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

{{--
<div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="H4">Added City</h4>
            </div>
            <div class="modal-body" style="height:30%;padding: 10px;">
                <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                    <table class="table datatable">
                        <thead>


                            <tr>
                                <th>Sr. No.</th>

                                <th>Account Holder Name</th>

                                <th>Bank Name</th>

                                <th>Account Number</th>

                                <th>IFSC</th>
                            </tr>

                        </thead>
                        <tbody>
                            @foreach ($bankDetails as $bankDetails )
                            <tr>
                                <td>{{$loop->index+1}}</td>

                                <td>{{$bankDetails->account_holder_name}}</td>

                                <td>{{$bankDetails->bank_name}}</td>

                                <td>{{$bankDetails->account_number}}</td>

                                <td>{{$bankDetails->ifsc}}</td>
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
</div> --}}
<!-- ==========================End city Model===================================== -->

<!-- Modal -->
{{-- <div class="modal fade" id="popup3" tabindex="-1" role="dialog" aria-labelledby="popup3Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popup3Label">Agent Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="agentIdDisplay"> --}}
                <!-- Input field to display firm_id -->


                <!-- Include the bank details table -->
                {{-- @include('panel.bank_details_table') --}}
                {{--
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}


{{-- <div id="service-area-view" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="max-width:800px;">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <h4 class="modal-title" id="myModalLabel">Service Area Details</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal fade in" aria-label="Close"
                    fdprocessedid="k7jfjv"></button>
            </div>
            <div class="modal-body" id="appendbodyserviceareaview">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div> --}}

<div class="modal" id="service-area-view" tabindex="-1" role="dialog" aria-labelledby="smallModalHead"
    aria-hidden="true">
    <div class="modal-dialog " style="max-width:800px;">
        <div class=" modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="H4">Agent Details</h4>
            </div>
            <div id="appendbodyserviceareaview" class="modal-body" style="height:30%;padding: 10px;">
                <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                    <div class="col-md-12">


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
              if (accountHolderName.trim() === '' || bankName.trim() === '' || accountNumber.trim() === '' || ifsc.trim() === '') {
                // If any field is empty, do not proceed
                alert('Please fill in all fields before adding a new row.');
                return;
            }

            var markup =
                    '<tr><td><input type="text" name="account_holder_name[]" required="" style="border:none; width: 100%;" value="' +  accountHolderName+ '"></td>' +
                    '<td><input type="text" name="bank_name[]" required="" style="border:none; width: 100%;" value="' + bankName  + '"></td>' +
                    '<td><input type="text" name="account_number[]" required="" style="border:none; width: 100%;" value="' +  accountNumber+ '"></td>' +
                    '<td><input type="text" name="ifsc[]" required="" style="border:none; width: 100%;" value="' + ifsc + '"></td>' +
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
            }
        );
        // Find and remove selected table rows
        $("tbody").delegate(".delete-row", "click", function() {
            var mpsqnty=$(this).parents("tr").find('input[name="mpsqnty[]"]').val()
            var grandtotal1 =$('#grandtotal1').val();
            var total1= parseFloat(grandtotal1)-parseFloat(mpsqnty)
            $('#grandtotal1').val(total1);
            $(this).parents("tr").remove();
    });
    });
</script>


{{-- <script>
    $(document).ready(function () {
        $('.open-modal').click(function () {
            // console.log('Element clicked');
            var agentId = $(this).data('agent-id');
            $('#agentIdDisplay').val(agentId);

            console.log('Hello');
            // Add an AJAX call to fetch bank details for the specific agent
            $.ajax({
    url: '/get-bank-details/' + agentId,
    type: 'GET',
    success: function (data) {
        console.log('AJAX request succeeded!');
        console.log('Data received:', data);
        $('#bankDetailsTable tbody').html(data.html);
    },
    error: function (error) {
        console.log('AJAX request failed!');
        console.log(error);
    }
});


        });
    });
</script> --}}


{{-- <script>
    $(document).ready(function() {
    $(".open-modal").on('click', function() {
        var agentId = $(this).data('agent-id');
        console.log('alert');
        $.ajax({
            type: "get",
            url: 'get-bank-details/' + agentId,
            dataType: "json",
            // data: {
            //     bank_information: $(this).val()
            // },
            success: function(response) {
                $("#agentIdDisplay").html(response.html);
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
    });
</script> --}}

{{-- <script>
    $(document).on('click', '.serviceareaview', function() { $("#service-area-view").modal({
            backdrop: "static",
            keyboard: false,
            });
            var entry_id = $(this).attr('firm_id');
            $("#appendbodyserviceareaview").empty();
            $.ajax({
            url: 'viewserviceareas',
            type: 'get',
            data: {
            entry_id: entry_id
            // console.log(entry_id);
            },
            dataType: 'json',
            success: function(data) {
            $("#appendbodyserviceareaview").html(data.html);
            }
            });
            });
</script> --}}



<script>
    $(document).on('click', '.serviceareaview', function() {
        // $("#service-area-view").modal({
        // backdrop: "static",
        // keyboard: false,
        // });
        $("#service-area-view").modal('show');
        console.log(this);
        var entry_id = $(this).attr('id');
        console.log(entry_id);
        $("#appendbodyserviceareaview").empty();
        $.ajax({
        url: 'firmviewserviceareas',
        type: 'get',
        data: {
        entry_id: entry_id
        },
        dataType: 'json',
        success: function(data) {
        $("#appendbodyserviceareaview").html(data.html);
        }
        });
        });
</script>










@endsection
