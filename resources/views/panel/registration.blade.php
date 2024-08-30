@extends('panel.layout.header')

@section('main_container')



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

        .popover_wrapper:hover .popover_content {
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
    <!-- START DEFAULT DATATABLE -->
    <div class="row">

        <div class="panel panel-default">

            <h5 class="panel-title"
                style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;" align="center">
                <i class="fa fa-classic"></i> &nbsp;Request For Registration
            </h5>
            <div class="col-md-12" align="center"
                style="margin-top: 1vh;>

            <!-- START DEFAULT DATATABLE -->
            <div class=" col-md-12"
                align="center">
                <div class="icon-box-container" style="margin-left: 16%;">

                    <div class="icon-box box-3" style="padding: 1vh;">
                        <a href="{{ route('initiatesale') }}">
                            <img src="{{ asset('panel/assets/images/cards/13.png') }}" alt="" class="classic-1">
                            <p class="classic">ADD NEW SALE</p>
                        </a>
                    </div>

                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-1" style="padding: 1vh;">
                        <a href="{{ route('newsale') }}">
                            <img src="{{ asset('panel/assets/images/cards/9.png') }}" alt="" class="classic-1">
                            <p class="classic">NEW SALE CONFIRMED</p>
                        </a>
                    </div>

                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-2">
                        <a href="{{ route('paymentcollection') }}">
                            <img src="{{ asset('panel/assets/images/cards/7.png') }}" alt="" class="classic-1">
                            <p class="classic">PAYMENT COLLECTION</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-3">
                        <a href="{{ route('registration') }}">
                            <img src="{{ asset('panel/assets/images/cards/11.png') }}" alt="" class="classic-1">
                            <p class="classic">REQUEST FOR REGISTRATION</p>
                        </a>

                    </div>
                    {{-- <div style="margin-top: 10vh;font-size: large;">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </div> --}}

                    {{-- <div class="icon-box box-1">
                    <a href="{{ route('account')}}">
                        <img src="{{ asset('panel/assets/images/cards/6.png') }}" alt="" class="classic-1">
                        <p class="classic">ACCOUNTS CLEARANCE</p>
                    </a>

                </div> --}}
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-2">
                        <a href="{{ route('legalclearance') }}">
                            <img src="{{ asset('panel/assets/images/cards/4.png') }}" alt="" class="classic-1">
                            <p class="classic">LEGAL CLEARANCE</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-3">
                        <a href="{{ route('registrationcompleted') }}">
                            <img src="{{ asset('panel/assets/images/cards/8.png') }}" alt="" class="classic-1">
                            <p class="classic">REGISTRATION COMPLETED</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-1">
                        <a href="{{ route('saledeedscan') }}">
                            <img src="{{ asset('panel/assets/images/cards/12.png') }}" alt="" class="classic-1">
                            <p class="classic">SALEDEED SCAN</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-2">
                        <a href="{{ route('handover') }}">
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
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inquery as $index => $enquiry)
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
                                                @foreach ($enquiry->clients as $client)
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
                                                @foreach ($enquiry->nominees as $nominee)
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
                                    <button data-id="{{ $enquiry->id ?? '' }}"
                                        style="background-color:green; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info view-details-btn" data-placement="top"
                                        title="View">
                                        <i class="fa fa-eye" style="margin-left:5px;"></i>
                                    </button>

                                    <!-- Hidden form that will be submitted if conditions are met -->
                                    <form id="form-{{ $enquiry->id }}"
                                        action="{{ route('registrationcompleteapprove_legalclrarance') }}" method="POST"
                                        style="display:none;">
                                        @csrf
                                        <input type="hidden" name="enquiry_id" value="{{ $enquiry->id ?? '' }}">
                                        <!-- Other form fields go here if needed -->
                                    </form>

                                    <!-- Button to trigger the check and form submission -->
                                    @if ($enquiry->is_request_registration_completed == 1)
                                        <button data-id="{{ $enquiry->id ?? '' }}"
                                            style="background-color:rgb(255, 0, 195); border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info check-status-btn" data-placement="top"
                                            title="Approved">
                                            <i class="fa fa-check" style="margin-left:5px;"></i>
                                        </button>
                                    @else
                                        <button data-id="{{ $enquiry->id ?? '' }}"
                                            style="background-color:blue; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info check-status-btn" data-placement="top"
                                            title="Check">
                                            <i class="fa fa-check" style="margin-left:5px;"></i>
                                        </button>
                                    @endif
                                    <button data-id="{{ $enquiry->id ?? '' }}"
                                        style="background-color:purple; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info open-modal-btn" data-placement="top"
                                        title="Admin Response">
                                        <i class="fa fa-comment" style="margin-left:5px;"></i>
                                    </button>

                                    <!-- Generate the URL for the named route in the Blade template -->
                                    <script>
                                        const checkStatusUrl = "{{ route('checkstatusforregistrationcomplete_legalclrarance', ['id' => ':id']) }}";
                                    </script>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>



        </div>

    </div>
    <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="H4">Emi - Other charges - Documents details</h4>
                </div>
                <div class="modal-body" id="appendbody">

                </div>
                <div class="modal-footer" style="border: none !important; background-color: #fff !important">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>

            </div>
        </div>
    </div>
    <!-- Modal HTML -->
    <!-- Modal HTML -->
    <!-- Modal HTML Structure -->
    <!-- Modal HTML -->
    <div class="modal fade" id="popup333" tabindex="-1" role="dialog" aria-labelledby="popup333Label"
        aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-fullscreen" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popup333Label">Admin Response</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="margin-top: -25px">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="appendbody">
                    <!-- Table to display queries and admin response -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Index</th>
                                <th>Client ID</th>
                                <th>Query</th>
                                <th>Admin Response</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="queries-list">
                            <!-- Dynamic rows will be inserted here -->
                        </tbody>
                    </table>
                    {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                    <div style="text-align: right;">
                        <button type="button" id="submit-responses" class="btn btn-primary submit-all-responses">Submit
                            All Responses</button>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    {{-- <button type="button" id="submit-responses" class="btn btn-primary submit-all-responses">Submit All Responses</button>  --}}
                </div>
            </div>
        </div>
    </div>


    </div>

    </div>
@stop
@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.addEventListener('click', function(event) {
                if (event.target.classList.contains('open-modal-btn')) {
                    const initialEnquiryId = event.target.getAttribute('data-id');

                    // Fetch data based on initialEnquiryId
                    fetch({{ route('fetchqueries', ['id' => ':id']) }}.replace(':id', initialEnquiryId))
                        .then(response => response.json())
                        .then(data => {
                            if (data.error) {
                                alert('No data found');
                                return;
                            }

                            // Populate the modal with data
                            const queriesList = document.getElementById('queries-list');
                            queriesList.innerHTML = '';

                            data.forEach((query, index) => {
                                const adminResponse = query.admin_response ? query
                                    .admin_response : '';

                                queriesList.innerHTML += `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${query.client_id}</td>
                            <td>${query.query}</td>

                             <td>
                        <textarea class="form-control admin-response" rows="2" data-id="${query.id}" placeholder="Enter response here...">${adminResponse}</textarea>
                    </td>
                            <td>
                                <button type="button" class="btn btn-primary submit-response" data-id="${query.id}">Submit</button>
                            </td>
                        </tr>
                    `;
                            });

                            // Show the modal
                            $('#popup333').modal('show');
                        })
                        .catch(error => {
                            console.error('Error fetching data:', error);
                            alert('Error fetching data.');
                        });
                }

                if (event.target.classList.contains('submit-response')) {
                    const queryId = event.target.getAttribute('data-id');
                    const responseText = document.querySelector(textarea[data - id = "${queryId}"]).value;

                    if (!responseText.trim()) {
                        alert('Please enter a response.');
                        return;
                    }

                    // Send the admin response to the server
                    fetch({{ route('updateAdminResponse') }}, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for security
                            },
                            body: JSON.stringify({
                                query_id: queryId,
                                admin_response: responseText
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('Response submitted successfully.');
                            } else {
                                alert('Failed to submit response.');
                            }
                        })
                        .catch(error => {
                            console.error('Error submitting response:', error);
                            alert('Error submitting response.');
                        });
                }
                if (event.target.classList.contains('submit-all-responses')) {
                    const responses = [];
                    document.querySelectorAll('.admin-response').forEach(function(textarea) {
                        const queryId = textarea.getAttribute('data-id');
                        const responseText = textarea.value.trim();

                        if (responseText) {
                            responses.push({
                                query_id: queryId,
                                admin_response: responseText
                            });
                        }
                    });

                    if (responses.length === 0) {
                        alert('No responses to submit.');
                        return;
                    }

                    // Send all responses to the server
                    fetch({{ route('submitAllResponses') }}, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Add CSRF token for security
                            },
                            body: JSON.stringify({
                                responses: responses
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                alert('All responses submitted successfully.');
                                $('#popup333').modal('hide');
                            } else {
                                alert('Failed to submit all responses.');
                            }
                        })
                        .catch(error => {
                            console.error('Error submitting all responses:', error);
                            alert('Error submitting all responses.');
                        });
                }
            });
        });
    </script>



    <script>
        $(document).on('click', '.view-details-btn', function() {
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
                success: function(data) {
                    if (data.html) {
                        $("#appendbody").html(data.html);
                    } else if (data.error) {
                        $("#appendbody").html('<p>' + data.error + '</p>');
                    }
                },
                error: function() {
                    $("#appendbody").html('<p>An error occurred while fetching the details.</p>');
                }
            });
        });

        $(document).on('click', '.check-status-btn', function() {
            const enquiryId = $(this).data('id');
            if (enquiryId) {
                checkConditionsAndSubmitForm(enquiryId, this);
            }
        });

        function checkConditionsAndSubmitForm(enquiryId, buttonElement) {
            // Replace the placeholder in the URL with the actual enquiryId
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
                        // Submit the specific form for this enquiry
                        document.getElementById('form-' + enquiryId).submit();
                    } else {
                        // Show a popup message if the conditions are not met
                        alert(data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
@stop
