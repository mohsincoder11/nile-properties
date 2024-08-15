@extends('panel.layout.header')

@section('main_container')


<div class="page-content-wrap">

    <div class="col-md-12" style="margin-top:5px;">
        <div class="panel panel-default">
            <h5 class="panel-title"
                style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                align="center">
                <i class="fa fa-list"></i> &nbsp;Saledeed Scan
            </h5>



        </div>

    </div>

</div>


<!-- START DEFAULT DATATABLE -->
<div class="row">

    <div class="panel panel-default">
        @include('panel.plot-sale-header')

        <div class="col-md-12" style="margin-top:5px;">



            <div class="panel-body" style="margin-bottom:15px;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Customer Name</th>
                            <th>Nominee</th>
                            <th>Upload Saleded Scan Document</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                                        <td>1</td>
                                        <td>Sharique Sheikh</td>
                                        <td>9579915551 </td>

                                        <td>Sheikh Properties</td>
                                        <td>1998745</td>
                                        <td>15000</td>
                                        <td>
                                        14890
                                        </td>


                                        <td>

                                            <input type="file" class="form-control" name="name" placeholder="" />
                                        </td>
                                    </tr> -->

                    </tbody>
                </table>
            </div>



        </div>

    </div>
</div>

</div>
@stop
@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<script>
    $(document).ready(function () {
                    // Initialize all datepickers with unique IDs
                    $('.datepicker').datepicker({
                        dateFormat: 'dd/mm/yy'
                    });

                    // Set today's date for each datepicker input
                    // $('.datepicker').each(function () {
                    //     const today = new Date();
                    //     const day = String(today.getDate()).padStart(2, '0');
                    //     const month = String(today.getMonth() + 1).padStart(2, '0'); // Months are zero-indexed
                    //     const year = today.getFullYear();
                    //     const formattedDate = `${day}/${month}/${year}`;
                    //     $(this).val(formattedDate);
                    // });

                    // Handle view details button click
                    $(document).on('click', '.view-details-btn', function () {
                        $("#popup3").modal({
                            backdrop: "static",
                            keyboard: false,
                        });
                        var inquiryId = $(this).data('id'); // Get the data-id value
                        $("#appendbody").empty();
                        $.ajax({
                            url: '{{ route('inquiry.docs.details') }}',
                            type: 'get',
                            data: {
                                id: inquiryId
                            },
                            dataType: 'json',
                            success: function (data) {
                                if (data.html) {
                                    $("#appendbody").html(data.html);
                                } else if (data.error) {
                                    $("#appendbody").html('<p>' + data.error + '</p>');
                                }
                            },
                            error: function () {
                                $("#appendbody").html('<p>An error occurred while fetching the details.</p>');
                            }
                        });
                    });

                    // Handle check status button click
                    $(document).on('click', '.check-status-btn', function () {
                        const enquiryId = $(this).data('id');
                        if (enquiryId) {
                            checkConditionsAndSubmitForm(enquiryId, this);
                        }
                    });

                    function checkConditionsAndSubmitForm(enquiryId, buttonElement) {
                        const url = checkStatusUrl.replace(':id', enquiryId);

                        fetch(url, {
                            method: 'GET',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                            }
                        })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    document.getElementById('form-' + enquiryId).submit();
                                } else {
                                    alert(data.message);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }
                });
</script>
@stop