@extends('panel.layout.header')

@section('main_container')

<link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
<style>
    a {
        text-decoration: none;
    }

    .popover__title {
        font-size: 14px;
        line-height: 2px;
        text-decoration: none;
        color: rgb(0, 0, 0);
        text-align: center;
        padding: 0px 0;
    }

    .popover__wrapper {
        position: relative;
        margin-top: 1vh;
        display: inline-block;
    }

    .popover__content {
        opacity: 0;
        visibility: hidden;
        position: absolute;
        left: -40px;
        transform: translate(0, 10px);
        background-color: #fcfcfc;
        padding: 1rem;
        box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
        width: 250%;
    }

    .popover__content:before {
        position: absolute;
        z-index: 100;
        content: "";
        right: calc(50% - 10px);
        top: -8px;
        border-style: solid;
        border-width: 0 10px 10px 10px;
        border-color: transparent transparent #bfbfbf transparent;
        transition-duration: 0.3s;
        transition-property: transform;
    }

    .popover__wrapper:hover .popover__content {
        z-index: 100;
        opacity: 1;
        visibility: visible;
        transform: translate(0, -20px);
        transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
    }


    .modal1 {
        background: rgba(255, 255, 255, 0.7);
        position: fixed;
        width: 100%;
        height: 50%;
        top: 0px;
        left: 0px;
        bottom: 0px;
        transition: all .5s ease-in-out;
        opacity: 0;
        z-index: -1;
    }
</style>
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
        <div class="col-md-12" align="center" style="margin-top: 1vh;">

            <!-- START DEFAULT DATATABLE -->
            <div class="col-md-12" align="center">
                <div class="icon-box-container" style="margin-left: 16%;">

                    <div class="icon-box box-3" style="padding: 1vh;">
                        <a href="{{ route('initiatesale')}}">
                            <img src="{{ asset('panel/assets/images/cards/13.png') }}" alt="" class="classic-1">
                            <p class="classic">ADD NEW SALE</p>
                        </a>
                    </div>

                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-1" style="padding: 1vh;">
                        <a href="{{ route('newsale')}}">
                            <img src="{{ asset('panel/assets/images/cards/9.png') }}" alt="" class="classic-1">
                            <p class="classic">NEW SALE CONFIRMED</p>
                        </a>
                    </div>

                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-2">
                        <a href="{{ route('paymentcollection')}}">
                            <img src="{{ asset('panel/assets/images/cards/7.png') }}" alt="" class="classic-1">
                            <p class="classic">PAYMENT COLLECTION</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-3">
                        <a href="{{ route('registration')}}">
                            <img src="{{ asset('panel/assets/images/cards/11.png') }}" alt="" class="classic-1">
                            <p class="classic">REQUEST FOR REGISTRATION</p>
                        </a>

                    </div>
                    {{-- <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>

                    <div class="icon-box box-1">
                        <a href="{{ route('account')}}">
                            <img src="{{ asset('panel/assets/images/cards/6.png') }}" alt="" class="classic-1">
                            <p class="classic">ACCOUNTS CLEARANCE</p>
                        </a>

                    </div> --}}
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-2">
                        <a href="{{ route('legalclearance')}}">
                            <img src="{{ asset('panel/assets/images/cards/4.png') }}" alt="" class="classic-1">
                            <p class="classic">LEGAL CLEARANCE</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-3">
                        <a href="{{ route('registrationcompleted')}}">
                            <img src="{{ asset('panel/assets/images/cards/8.png') }}" alt="" class="classic-1">
                            <p class="classic">REGISTRATION COMPLETED</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-1">
                        <a href="{{ route('saledeedscan')}}">
                            <img src="{{ asset('panel/assets/images/cards/12.png') }}" alt="" class="classic-1">
                            <p class="classic">SALEDEED SCAN</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-2">
                        <a href="{{ route('handover')}}">
                            <img src="{{ asset('panel/assets/images/cards/10.png') }}" alt="" class="classic-1">
                            <p class="classic">HANDOVER COMPLETE</p>
                        </a>

                    </div>



                    <!-- Add more boxes as needed -->
                </div>
            </div>

        </div>
        <div class="col-md-12" style="margin-top:5px;">



            <div class="panel-body" style="margin-bottom:15px;">

                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Firm Name</th>
                            <th>Project Name</th>
                            <th>Plot No</th>
                            <th>Square Ft</th>
                            <th>Plot Cost</th>
                            <th>Customer Name</th>
                            <th>Nominee</th>
                            <th>Upload Registration Receipt</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inquery as $index => $enquiry)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $enquiry->firm->name ?? 'N/A' }}</td>
                            <td>{{ $enquiry->project->project_name ?? 'N/A' }}</td>
                            <td>{{ $enquiry->plotnumber->plot_no ?? 'N/A' }}</td>
                            <td>{{ $enquiry->square_ft ?? 'N/A' }}Ft</td>
                            <td>{{ $enquiry->total_cost ?? 'N/A' }}</td>
                            <td>
                                <div class="popover__wrapper">
                                    <a href="#">
                                        <h2 class="popover__title">Clients</h2>
                                    </a>
                                    <div class="popover__content">
                                        <div class="modal-area">
                                            @foreach($enquiry->clients as $client)
                                            <p>
                                                <strong>Client Name:</strong> {{ $client->name ?? 'N/A' }}<br>
                                                <strong>Mobile:</strong> {{ $client->phone ?? 'N/A' }}<br>
                                                <strong>Address:</strong> {{ $client->address ?? 'N/A' }}<br>
                                            </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="popover__wrapper">
                                    <a href="#">
                                        <h2 class="popover__title">Nominee</h2>
                                    </a>
                                    <div class="popover__content">
                                        <div class="modal-area">
                                            @foreach($enquiry->nominees as $nominee)
                                            <p>
                                                <strong>Nominee Name:</strong> {{ $nominee->name ?? 'N/A' }}<br>
                                                <strong>Age:</strong> {{ $nominee->age ?? 'N/A' }}<br>
                                                <strong>Relation:</strong> {{ $nominee->relation ?? 'N/A' }}<br>
                                            </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </td>

                            <td>
                                <form id="form-{{ $enquiry->id }}" action="{{ route('saleded_with_date_file') }}"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group align-items-center">

                                        <input type="file" id="registration_receipt-{{ $enquiry->id }}"
                                            name="registration_receipt" accept="image/*" class="custom-file-input">
                                    </div>
                            </td>
                            <td>
                                <div class="align-items-center" style="display: flex!important;">

                                    <div class="input-group datepicker-container">
                                        <input type="text" id="date1-{{ $enquiry->id }}"
                                            value="{{ old('date', $enquiry->legal_clearance_date ? \Carbon\Carbon::parse($enquiry->legal_clearance_date)->format('m/d/Y') : '') }}"
                                            name="date" class="form-control datepicker" placeholder="DD/MM/YYYY"
                                            required />
                                        <span class="input-group-text" style="font-size: 20px;"></span>
                                    </div>
                                    <input type="hidden" name="enquiry_id" value="{{ $enquiry->id ?? '' }}">
                                    </form>
                                    <button data-id="{{ $enquiry->id }}"
                                        style="background-color:green; border:none; max-height:25px; margin-top:2px; margin-bottom:-5px;margin-left:5px;"
                                        type="button" class="btn btn-info view-details-btn" data-placement="top"
                                        title="View">
                                        <i class="fa fa-eye" style="margin-left:5px;"></i>
                                    </button>
                                    @if($enquiry->is_saleded_completed == 1)
                                    <button data-id="{{ $enquiry->id }}"
                                        style="background-color:rgb(255, 0, 195); border:none; max-height:25px; margin-top:2px; margin-bottom:-5px; argin-left:5px;"
                                        type="button" class="btn btn-info check-status-btn" data-placement="top"
                                        title="Approved">
                                        <i class="fa fa-check" style="margin-left:5px;"></i>
                                    </button>
                                    @else
                                    <button data-id="{{ $enquiry->id }}"
                                        style="background-color:blue; border:none; max-height:25px; margin-top:2px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info check-status-btn" data-placement="top"
                                        title="Check">
                                        <i class="fa fa-check" style="margin-left:5px;"></i>
                                    </button>
                                    @endif

                                    <script>
                                        const checkStatusUrl = "{{ route('checkstatusforregistrationcomplete_legalclrarance', ['id' => ':id']) }}";
                                    </script>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>



        </div>

    </div>
    <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body" id="appendbody">

                </div>
                <div class="modal-footer" style="border: none !important; background-color: #fff !important">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>

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
