@extends('panel.layout.header')

@section('main_container')

<form action="{{route('emp_reg_store')}}" method="post" enctype="multipart/form-data">
    @csrf
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
                            <option value="Admin">Admin</option>
                            <option value="Reception">Reception</option>
                            <option value="Employee">Employee</option>
                        </select>
                    </td>
                    <td style="padding: 2px;" width="5%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="4%">
                        <input type="text" class="form-control" name="email" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="contact_number" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="4%">
                        <input type="text" class="form-control" name="city" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="5%">
                        <input type="text" class="form-control" name="address" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="1%">
                        <input type="text" class="form-control" name="pincode" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="5%">
                        <input type="file" class="form-control" name="aadhar" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="4%">
                        <input type="text" class="form-control" name="aadhar_number" placeholder="" />
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
                        <input type="text" class="form-control" name="pan_number" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="username" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="password" placeholder="" />
                    </td>

                </tr>
            </table>

            <div class="col-md-12" style="margin-top: 5px;margin-bottom: 5px;">
                <img src="{{ asset('/panel/img/line.png') }}" width="100%" />
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
                        <input type="text" class="form-control" id="accountNumber" placeholder="" />
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
                            style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-plus"></i>ADD</button>


                        <button id="on" type="submit" class="btn mjks btn-submit-row"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                class="fa fa-floppy-o" aria-hidden="true"></i>
                            Submit</button>
                    </td>


                </tr>
            </table>



            <div class="col-md-8" style="margin-top:10px;" align="right">
                <table width="100%" border="1" id="bank_details">
                    <tr style="background-color:#f0f0f0; height:30px;">
                        <th width="20%" style="text-align:center">Account Holder Name</th>
                        <th width="20%" style="text-align:center">Bank Name</th>
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




    {{-- MODAL --}}
    <div class="col">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal">Extra large</button> -->
        <!-- Modal -->
        <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <section class="programs-section pt-xs-30 pt-md-60 pb-xs-55 pb-md-70 pb-lg-20"
                        style="margin-top:25px;">
                        <div class="container">
                            <div class="row">
                                <div class="program-preview">
                                    <div class="col-12">

                                        <div class="row g-2" id="appendbody">

                                        </div>



                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL END --}}

    <div class="row">
        <div class="col-md-12" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable">
                    <thead>


                        <tr>
                            <th>Sr. No.</th>
                            <th>Select Role</th>
                            <th>Name/Mobile/City/Address</th>
                            <th>AADHAR</th>
                            <th>PAN</th>
                            <th>AADHAR No</th>
                            <th>PAN No</th>
                            {{-- <th>Bank Details</th> --}}

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($emp as $emp)

                        <tr>

                            <td>{{$loop->index+1}}</td>
                            <td>{{$emp->role}}</td>
                            <td>{{$emp->name}}/{{$emp->contact_number}}/{{$emp->city}}/{{$emp->address}}</td>

                            <td>
                                <img src="{{asset('panel/img/png.png')}}" width="20" height="20" />
                            </td>
                            <td>{{$emp->aadhar_number}}</td>
                            <td>
                                <img src="{{asset('panel/img/png.png')}}" width="20" height="20" />
                            </td>
                            <td>{{$emp->pan_number}}</td>



                            {{-- <td>

                                <button type="button" class="btn1 btn-outline-success viewinfo" title="View"
                                    data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" id="{{ $emp->id }}">
                                    View</button>

                                --}}



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
            </div>

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

    @section('js')
    {{--
    <script>
        $(document).ready(function () {
            // Add new row when the "Add" button is clicked
            $('.add-row').click(function () {
                // Clone the first row of the bank details table
                var newRow = $('.bank-details-row:first').clone();

                // Remove add and submit buttons from cloned rows
                newRow.find('.add-row, .btn-submit-row').remove();

                // Append the cloned row to the bank details table
                $('#bankDetailsTable tbody').append(newRow);

                // Clear the input values in the cloned row
                newRow.find('input').val('');

                // Update the second table with the stored data
                updateSecondTable();
            });

            // Function to update the second table with stored data
            function updateSecondTable() {
                // Clear existing rows in the second table
                $('#bank_details tbody').empty();

                // Loop through each row in the bank details table
                $('#bankDetailsTable tbody tr').each(function () {
                    // Fetch the values from the current row
                    var bankName = $(this).find('[name="bank_name[]"]').val();
                    var accountNumber = $(this).find('[name="account_number[]"]').val();
                    var ifsc = $(this).find('[name="ifsc[]"]').val();
                    var accountHolderName = $(this).find('[name="account_holder_name[]"]').val();

                    // Append a new row to the second table with the stored data
                    var newTableRow =
                        '<tr>' +
                        '<td style="padding:5px;" align="center"><label>' + bankName + '</label></td>' +
                        '<td style="padding:5px;" align="center"><label>' + accountNumber + '</label></td>' +
                        '<td style="padding:5px;" align="center"><label>' + ifsc + '</label></td>' +
                        '<td style="padding:5px;" align="center"><label>' + accountHolderName + '</label></td>' +
                        '<td style="text-align:center; color:#FF0000"><button class="delete-row"><i class="fa fa-trash-o"></i></button></td>' +
                        '</tr>';

                    // Append the new row to the second table
                    $('#bank_details tbody').append(newTableRow);
                });
            }

            // Handle the delete action when the delete button is clicked
            $('#bank_details').on('click', '.delete-row', function () {
                $(this).closest('tr').remove();
            });
        });
    </script>
    --}}

    {{-- <script>
        $(document).ready(function() {
        $(document).on('click', '.viewinfo', function() {
            var entry_id = $(this).attr('id');
            $("#appendbody").empty();
            $.ajax({
                url: '{{ route("getBankDetails") }}',
                type: 'get',
                data: {
                    entry_id: entry_id
                    // summary_id:summary_id
                },
                dataType: 'json',
                success: function(data) {
                    $("#appendbody").html(data);
                }
            });
        });


    })
    </script> --}}


    <script>
        $(document).ready(function() {
        $(".add-row").click(function() {
            // Get values from input fields
            var bankName = $('#bankName').val();
            var accountNumber = $('#accountNumber').val();
            var ifsc = $('#ifsc').val();
            var accountHolderName = $('#accountHolderName').val();

              // Check if all fields are not empty
              if (bankName.trim() === '' || accountNumber.trim() === '' || ifsc.trim() === '' || accountHolderName.trim() === '') {
                // If any field is empty, do not proceed
                alert('Please fill in all fields before adding a new row.');
                return;
            }

            var markup =
                    '<tr><td><input type="text" name="bank_name[]" required="" style="border:none; width: 100%;" value="' + bankName + '"></td>' +
                    '<td><input type="text" name="account_number[]" required="" style="border:none; width: 100%;" value="' + accountNumber + '"></td>' +
                    '<td><input type="text" name="ifsc[]" required="" style="border:none; width: 100%;" value="' + ifsc + '"></td>' +
                    '<td><input type="text" name="account_holder_name[]" required="" style="border:none; width: 100%;" value="' + accountHolderName + '"></td>' +
                               '<td><button type="button" class="btn1 btn-outline-danger delete-row"><i class="fa fa-trash-o"></i></button></td></tr>';
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
    @endsection
