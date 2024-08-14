@extends('panel.layout.header')
@section('main_container')
{{--
<meta name="csrf-token" content="{{ csrf_token() }}"> --}}
<!-- DataTables CSS -->

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12" style="margin-top:5px;" align="center">
            <a href="{{ route('landowner_index') }}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #ba1280; "><i
                        class="fa fa-user"></i>Land
                    Owner</button>
            </a>
            <a href="{{ route('landowner_account') }}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #105fd5; "><i
                        class="fa fa-users"></i>Land
                    Purchase</button>
            </a>
            <!-- <a href="land_owner_payment.html"> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #d56c10; "><i
                                    class="fa fa-users"></i>Payment To Land Owner</button>
                        </a> -->
        </div>
    </div>
    <div class="row">
        <form action="{{ route('landpurchase.store') }}" method="post">
            @csrf
            <div class="col-md-12" style="margin-top: 2vh;">
                <table width="100%">
                    <tr style="height:30px;">
                        <th width="5%">Select Land Owner</th>
                        <th width="5%"></th>
                        <th width="3%"></th>
                        <th width="3%"></th>
                        <th width="3%"></th>
                    </tr>
                    <tr>
                        <td style="padding: 2px;" width="5%">
                            <select class="form-control select" data-live-search="true" id="modal_land_id"
                                name="land_owner_id">
                                @foreach($agent as $agent)
                                <option value="{{ $agent->id }}">{{ $agent->name }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td style="padding: 2px;" width="7%">
                            <label class="control-label">
                                City : <font color="#000099" id="agentCity"></font>
                                <input type="hidden" name="city" id="agentCity1" value="" />
                            </label>
                        </td>
                        <td style="padding: 2px;" width="10%">
                            <label class="control-label">
                                Mobile : <font color="#000099" id="agentMobile"></font>
                                <input type="hidden" name="contact_number" id="agentMobile1" value="" />
                            </label>
                        </td>
                        <td style="padding: 2px;" width="10%">
                            <label class="control-label">
                                Email : <font color="#000099" id="agentEmail"></font>
                                <input type="hidden" name="email" id="agentEmail1" value="" />
                            </label>
                        </td>
                    </tr>
                    <tr style="height:30px;">
                        <!-- <th width="5%">Select Land Owner</th>
                                <th width="5%">Postal Address</th>
                                <th width="3%">Mobile No.</th> -->
                        <th width="3%">Mauza</th>
                        <th width="3%">Khasara No.</th>

                        <th width="3%">P.H.No</th>

                        <th width="5%">Area in Hectres/Acres</th>
                        {{-- <th width="3%"></th> --}}
                        <th width="5%">Per Acre Cost</th>
                        <th width="5%">Total Land Cost</th>
                        <!-- <th width="5%">Down Payment</th>
                                <th width="5%">Balance Payment</th> -->
                        <th width="8%">Payment Period (In months)</th>
                        <th width="5%"></th>

                    </tr>
                    <tr>

                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="mauza" placeholder="" required />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="khasara_no" placeholder="" required />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="ph_no" placeholder="" required />
                        </td>
                        {{-- <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="area" placeholder="" required />
                        </td> --}}
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="area" placeholder="" required />
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="per_acre_cost" placeholder="" required />
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="total_land_cost" placeholder="" required />
                        </td>
                        <!-- <td style="padding: 2px;" width="5%">
                                    <input type="text" class="form-control" name="name" placeholder="" required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="text" class="form-control" name="name" placeholder="" required />
                                </td> -->
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="payment_period" placeholder="" required />
                        </td>

                        <td style="padding: 2px;" width="3%">

                            <button id="on" type="submit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-floppy-o" aria-hidden="true"></i>
                                Submit</button>
                        </td>
                    </tr>


                </table>



            </div>
        </form>
    </div>

    <div class="row">

        <div class="col-md-12" style="margin-top: 5vh;">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Land Owner/Postal Address/Mobile No.</th>
                        <th>Mauza</th>
                        <th>Khasara No.</th>
                        <th>P.H.No</th>
                        <th>Area in Hectres/Acres</th>
                        <th>Per Acre Cost</th>
                        <th>Total Land Cost</th>
                        <th>Amount Paid</th>
                        <th>Balance Payment</th>
                        <th>Payment Period</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($landPurchases as $key => $landPurchase)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $landPurchase->landownername->name ?? '' }}/{{ $landPurchase->city ?? '' }}/{{
                            $landPurchase->contact_number ?? ''
                            }}</td>
                        <td>{{ $landPurchase->mauza ?? '' }}</td>
                        <td>{{ $landPurchase->khasara_no ?? '' }}</td>
                        <td>{{ $landPurchase->ph_no ?? '' }}</td>
                        <td>{{ $landPurchase->area ?? '' }}</td>
                        <td>{{ $landPurchase->per_acre_cost ?? '' }}</td>
                        <td>{{ $landPurchase->total_land_cost ?? '' }}</td>
                        <td>{{ $landPurchase->amount_paid ?? '' }}</td>
                        <td>{{ $landPurchase->balance_payment ?? '' }}</td>
                        <td>{{ $landPurchase->payment_period ?? '' }}</td>
                        <td>
                            <button data-toggle="modal" data-target="#popup1" data-id="{{ $landPurchase->id ?? '' }}"
                                style="background-color: green; border: none; max-height: 25px; margin-top: -5px; margin-bottom: -5px;"
                                type="button" class="btn btn-info btn-payment" data-placement="top" title="Payment">
                                <i class="fa fa-rupee" style="margin-left: 5px;"></i>Payment
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


    </div>

</div>

</div>


<!-- START DEFAULT DATATABLE -->


</div>



<!-- END PAGE CONTAINER -->
<div class="modal" id="popup1" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="H4">Payment</h4>
            </div>

            <div class="modal-body" style="height: 30%; padding: 10px;">
                <div id="success-message" class="alert alert-success" style="display: none;"></div>
                <div class="col-md-12" style="margin-top: 10px;">
                    <form id="payment-form" action="{{ route('storepayment') }}" method="post">
                        @csrf
                        <input type="hidden" id="land_owner_id" name="land_owner_id" value="">
                        <table width="100%" border="1">
                            <tr style="background-color: #f0f0f0; height: 30px;">
                                <th width="5%" style="text-align: center">Date of Payment</th>
                                <th width="20%" style="text-align: center">Particulars</th>
                                <th width="10%" style="text-align: center">Amount</th>
                                <th width="8%" style="text-align: center">Payment Mode</th>
                                <th width="20%" style="text-align: center">Remarks/Amt Details</th>
                                <th width="5%" style="text-align: center">Action</th>
                            </tr>
                            <tr>
                                <td style="padding: 5px;" align="center">
                                    <input type="date" class="form-control" name="date_of_payment"
                                        placeholder="Date of Payment" />
                                </td>
                                <td style="padding: 5px;" align="center">
                                    <input type="text" class="form-control" name="particulars"
                                        placeholder="Particulars" />
                                </td>
                                <td style="padding: 5px;" align="center">
                                    <input type="text" class="form-control" name="amount" placeholder="Amount" />
                                </td>
                                <td style="padding: 5px;" align="center">
                                    <select class="form-control select" data-live-search="true" name="payment_mode">
                                        <option value="">Select Option</option>
                                        <option value="NEFT">NEFT/RTGS/IMPS/Net Banking</option>
                                        <option value="Cheque">Cheque</option>
                                        <option value="Cash">Cash</option>
                                        <option value="Cash_Deposit">Cash Deposit</option>
                                        <option value="UPI">UPI</option>
                                    </select>
                                </td>
                                <td style="padding: 5px;" align="center">
                                    <input type="text" class="form-control" name="remarks"
                                        placeholder="Remarks/Amt Details" />
                                </td>
                                <td style="text-align: center; color: #FF0000">
                                    <button type="submit"><i class="fa fa-plus"></i></button>
                                </td>
                            </tr>
                        </table>
                    </form>
                    <table width="100%" style="margin-top: 2vh;">
                        <tr>
                            <td style="padding: 2px; font-weight: bold;" width="10%">
                                <label class="control-label" id="total_land_cost_label">Total Land Cost : <font
                                        color="#ff0000">---
                                    </font></label>
                            </td>
                            <td style="padding: 2px; font-weight: bold;" width="10%">
                                <label class="control-label" id="paid_amount_label">Paid Amount: <font color="#ed1ac3">
                                        ---</font>
                                </label>
                            </td>
                            <td style="padding: 2px; font-weight: bold;" width="10%">
                                <label class="control-label" id="balance_amount_label">Balance Amount : <font
                                        color="#025212">---
                                    </font></label>
                            </td>
                            <td style="padding: 2px; font-weight: bold;" width="10%">
                                <label class="control-label" id="payment_period_label">Payment Period Remaining : <font
                                        color="#000099">---</font></label>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-12" style="margin-top: 5vh;">
                        <table id="payment_table" class="table">
                            <thead>
                                <tr>
                                    <th>Date of Payment</th>
                                    <th>Particulars</th>
                                    <th>Amount</th>
                                    <th>Payment Mode</th>
                                    <th>Remarks/Amt Details</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="payment-records">
                                <!-- Existing records can be here, but we'll dynamically add new records here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div>



<!--edit model payment -->
<div id="editPaymentModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Payment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="edit-payment-form" action="{{ route('updatePayment') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" id="edit_payment_id" name="payment_id" value="">
                <div class="modal-body">
                    <!-- Form fields for editing payment details -->
                    <div class="form-group">
                        <label>Date of Payment</label>
                        <input type="date" class="form-control" id="edit_date_of_payment" name="date_of_payment">
                    </div>
                    <div class="form-group">
                        <label>Particulars</label>
                        <input type="text" class="form-control" id="edit_particulars" name="particulars">
                    </div>
                    <div class="form-group">
                        <label>Amount</label>
                        <input type="text" class="form-control" id="edit_amount" name="amount">
                    </div>
                    <div class="form-group">
                        <label>Payment Mode</label>
                        <select class="form-control" id="edit_payment_mode" name="payment_mode">
                            <option value="NEFT">NEFT/RTGS/IMPS/Net Banking</option>
                            <option value="Cheque">Cheque</option>
                            <option value="Cash">Cash</option>
                            <option value="Cash_Deposit">Cash Deposit</option>
                            <option value="UPI">UPI</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Remarks</label>
                        <input type="text" class="form-control" id="edit_remarks" name="remarks">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update Changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


@stop
@section('js')


<script>
    $(document).ready(function() {
        $('#modal_land_id').change(function() {
            var agentId = $(this).val();
            if (agentId) {
                $.ajax({
                    url: '{{ route("agents.show") }}', // Update with your route name for agent details
                    method: 'POST',
                    data: {
                        agent_id: agentId,
                        _token: '{{ csrf_token() }}' // Add CSRF token if not using X-CSRF-TOKEN header
                    },
                    success: function(data) {
                        $('#agentCity').text(data.city || 'N/A');
                        $('#agentCity1').val(data.city || '');
                        $('#agentMobile').text(data.contact_number || 'N/A');
                        $('#agentMobile1').val(data.contact_number || '');
                        $('#agentEmail').text(data.email || 'N/A');
                        $('#agentEmail1').val(data.email || '');
                    },
                    error: function() {
                        alert('Error retrieving agent details');
                    }
                });
            } else {
                $('#agentCity').text('');
                $('#agentMobile').text('');
                $('#agentEmail').text('');
                $('#agentCity1').val('');
                $('#agentMobile1').val('');
                $('#agentEmail1').val('');
            }
        });


    });

</script>
<script>
    $(document).ready(function() {
        var landPurchaseId;

        function showSuccessMessage(message) {
            $('#success-message').text(message);
            $('#success-message').show();
            setTimeout(function() {
                $('#success-message').hide();
            }, 3000);
        }

        function initializeDataTable() {
            $('#payment_table').dataTable();
        }

        function destroyDataTable() {
            if ($.fn.DataTable.isDataTable('#payment_table')) {
                $('#payment_table').DataTable().destroy();
            }
        }

        function fetchPaymentData() {
            $.ajax({
                url: '{{ route('getPaymentData') }}',
                method: 'GET',
                data: { id: landPurchaseId },
                success: function(response) {
                    destroyDataTable();
                    $('#payment-records').empty();
                    if (response.payments.length > 0) {
                        response.payments.forEach(function(payment) {
                            var dateOfPayment = new Date(payment.date_of_payment);
                            var formattedDate = `${dateOfPayment.getDate()}-${dateOfPayment.getMonth() + 1}-${dateOfPayment.getFullYear()}`;
                            var newRow = `
                                <tr data-payment-id="${payment.id}">
                                    <td>${formattedDate}</td>
                                    <td>${payment.particulars}</td>
                                    <td>${payment.amount}</td>
                                    <td>${payment.payment_mode}</td>
                                    <td>${payment.remarks || 'NA'}</td>
                                    <td>
                                        <div style="display:flex;">
                                            <div>
                                                <button class="btn-edit btn btn-info" data-id="${payment.id}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </div>
                                            <div style="margin-left:5px;">
                                                <button class="btn-delete btn btn-danger" data-id="${payment.id}" data-toggle="tooltip" data-placement="top" title="Delete">
                                                    <i class="fa fa-trash-o"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            `;
                            $('#payment-records').append(newRow);
                        });

                        // destroyDataTable();
                        initializeDataTable();
                    } else {
                        $('#payment-records').append('<tr><td colspan="6" class="text-center">No payment records available</td></tr>');
                    }

                    // Update summary table with dynamic data
                    $('#total_land_cost_label').html(`Total Land Cost : <font color="#ff0000">${response.latest_payment.total_land_cost}</font>`);
                    $('#paid_amount_label').html(`Paid Amount: <font color="#ed1ac3">${response.latest_payment.paid_amount}</font>`);
                    $('#balance_amount_label').html(`Balance Amount : <font color="#025212">${response.latest_payment.balance_amount}</font>`);
                    $('#payment_period_label').html(`Payment Period Remaining : <font color="#000099">${response.latest_payment.payment_period_remaining}</font>`);
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching payment data:', error);
                    alert('Error fetching payment data: ' + xhr.responseText);
                }
            });
        }

        $('.btn-payment').on('click', function() {
            landPurchaseId = $(this).data('id');
        });

        $('#popup1').on('show.bs.modal', function() {
            $('#land_owner_id').val(landPurchaseId);
            fetchPaymentData();
        });

        $('#popup1').on('hide.bs.modal', function() {
            destroyDataTable();
            $('#payment-records').empty();
            $('#land_owner_id').val('');
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#payment-form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route('storepayment') }}',
                method: 'POST',
                data: formData,
                success: function(response) {
                    destroyDataTable();
                    showSuccessMessage('Your payment has been successfully recorded!');
                    $('#total_land_cost_label').html(`Total Land Cost : <font color="#ff0000">${response.total_land_cost}</font>`);
                    $('#paid_amount_label').html(`Paid Amount: <font color="#ed1ac3">${response.paid_amount}</font>`);
                    $('#balance_amount_label').html(`Balance Amount : <font color="#025212">${response.balance_amount}</font>`);
                    $('#payment_period_label').html(`Payment Period Remaining : <font color="#000099">${response.payment_period_remaining}</font>`);

                    $('#payment-form').find(':input').not('#land_owner_id').val('');

                    var newPayment = response.payment;
                    var dateOfPayment = new Date(newPayment.date_of_payment);
                    var formattedDate = `${dateOfPayment.getDate()}-${dateOfPayment.getMonth() + 1}-${dateOfPayment.getFullYear()}`;
                    var newRow = `
                        <tr data-payment-id="${newPayment.id}">
                            <td>${formattedDate}</td>
                            <td>${newPayment.particulars}</td>
                            <td>${newPayment.amount}</td>
                            <td>${newPayment.payment_mode}</td>
                            <td>${newPayment.remarks || 'NA'}</td>
                            <td>
                                <button class="btn-edit btn btn-info" data-id="${newPayment.id}" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn-delete btn btn-danger" data-id="${newPayment.id}" data-toggle="tooltip" data-placement="top" title="Delete">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </td>
                        </tr>
                    `;

                    $('#payment-records').append(newRow);
                    initializeDataTable();
                },
                error: function(xhr, status, error) {
                    alert('Error adding payment: ' + xhr.responseText);
                    $('#payment-form').find(':input').not('#land_owner_id').val('');
                }
            });
        });

        $(document).on('click', '.btn-delete', function() {
            var paymentId = $(this).data('id');

            $.ajax({
                url: '{{ route('deletePayment') }}',
                method: 'DELETE',
                data: { id: paymentId },
                success: function(response) {
                    showSuccessMessage('Payment record deleted successfully.');
                    fetchPaymentData(); // Re-fetch payment data to update the table
                },
                error: function(xhr, status, error) {
                    alert('Error deleting payment record: ' + xhr.responseText);
                }
            });
        });

        $(document).on('click', '.btn-edit', function() {
            var paymentId = $(this).data('id');

            $.ajax({
                url: '{{ route('getPaymentDetails') }}',
                method: 'GET',
                data: { id: paymentId },
                success: function(response) {
                    var isoDate = response.date_of_payment;
                    var formattedDate = new Date(isoDate).toISOString().split('T')[0];

                    $('#edit_date_of_payment').val(formattedDate);
                    $('#edit_payment_id').val(response.id);
                    $('#edit_particulars').val(response.particulars);
                    $('#edit_amount').val(response.amount);
                    $('#edit_payment_mode').val(response.payment_mode);
                    $('#edit_remarks').val(response.remarks);

                    $('#editPaymentModal').modal('show');
                },
                error: function(xhr, status, error) {
                    alert('Error fetching payment details: ' + xhr.responseText);
                }
            });
        });

        $('#edit-payment-form').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '{{ route('updatePayment') }}',
                method: 'PUT',
                data: formData,
                success: function(response) {
                    $('#editPaymentModal').modal('hide');
                    showSuccessMessage('Payment record updated successfully.');
fetchPaymentData(); // Re-fetch payment data to update the table
                    // var updatedPayment = response.payment;
                    // var updatedRow = `
                    //     <td>${updatedPayment.date_of_payment}</td>
                    //     <td>${updatedPayment.particulars}</td>
                    //     <td>${updatedPayment.amount}</td>
                    //     <td>${updatedPayment.payment_mode}</td>
                    //     <td>${updatedPayment.remarks || 'NA'}</td>
                    //     <td>
                    //         <button class="btn-edit btn btn-info" data-id="${updatedPayment.id}" data-toggle="tooltip" data-placement="top" title="Edit">
                    //             <i class="fa fa-edit"></i>
                    //         </button>
                    //         <button class="btn-delete btn btn-danger" data-id="${updatedPayment.id}" data-toggle="tooltip" data-placement="top" title="Delete">
                    //             <i class="fa fa-trash-o"></i>
                    //         </button>
                    //     </td>
                    // `;

                    // $(`tr[data-payment-id="${updatedPayment.id}"]`).html(updatedRow);
                },
                error: function(xhr, status, error) {
                    alert('Error updating payment record: ' + xhr.responseText);
                }
            });
        });
    });
</script>
@stop