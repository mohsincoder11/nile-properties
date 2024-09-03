@extends('panel.layout.user_model_layout')
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
    <!-- END X-NAVIGATION -->



    <div class="row">
        <!-- <div class="col-md-3"></div> -->
        <div class="col-md-12" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <!-- <h5 class="panel-title" style="color:#FFFFFF; background-color:#754d35; width:100%; font-size:14px;" align="center"> <i class="fa fa-plus"></i> Added Party</h5> -->

            <div class="col-md-12" style="text-align: center;margin-top: 5px;">
                <h6 class="panel-title"
                    style="color:#FFFFFF; background-color:#1681b6; width:100%;height: 50%; font-size:16px;" align="center">
                    <i class="fa fa-file-text"> &nbsp;<label style="margin: 7px;">Customer Details</label> </i>
                </h6>

            </div>

            <div style="margin-top: 50px"></div>

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                @auth
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile Number</th>
                                <th>Role</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>

                                @php
                                    $index = 0;
                                @endphp
                                <td>{{ $index + 1 }}</td> {{-- Ensure that these attributes exist on the authenticated user
                        object --}}
                                <td>{{ auth()->user()->name ?? '' }}</td>
                                <td>{{ auth()->user()->email ?? '' }}</td>
                                <td>{{ auth()->user()->contact ?? '' }}</td> <!-- Handle optional attributes -->
                                <td>{{ auth()->user()->role ?? '' }}</td> <!-- Handle optional attributes -->
                            </tr>
                        </tbody>
                    </table>
                @else
                    <div class="alert alert-warning text-center">
                        <strong>Please log in to view the data.</strong>
                    </div>
                @endauth
            </div>

            <!-- END DEFAULT DATATABLE -->


        </div>
        <div class="col-md-4"></div>
    </div>


    {{-- ---------------------------------------------------- --}}


    <div class="row">
        <!-- <div class="col-md-3"></div> -->
        <div class="col-md-12" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <!-- <h5 class="panel-title" style="color:#FFFFFF; background-color:#754d35; width:100%; font-size:14px;" align="center"> <i class="fa fa-plus"></i> Added Party</h5> -->

            <div class="col-md-12" style="text-align: center;margin-top: 5px;">
                <h6 class="panel-title"
                    style="color:#FFFFFF; background-color:#1681b6; width:100%;height: 50%; font-size:16px;" align="center">
                    <i class="fa fa-file-text"> &nbsp;<label style="margin: 7px;">Plot Status Details</label> </i>
                </h6>

            </div>

            <div style="margin-top: 50px"></div>

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
                                <th>Status</th>

                                {{-- <th>Upload Registration Receipt</th> --}}
                                {{-- <th>Action</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientDetails as $index => $enquiry)
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
                                                            <strong>Nominee Name:</strong>
                                                            {{ $nominee->name ?? 'N/A' }}<br>
                                                            <strong>Age:</strong> {{ $nominee->age ?? 'N/A' }}<br>
                                                            <strong>Relation:</strong>
                                                            {{ $nominee->relation ?? 'N/A' }}<br>
                                                        </p>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>
                                        <div class="popover__wrapper">
                                            <a href="#">
                                                <h2 class="popover__title">
                                                    {{ $enquiry->plot_stage_status ?? 'Payment Collection' }}</h2>
                                            </a>
                                            <div class="popover__content1">

                                            </div>
                                        </div>
                                    </td>

                                    {{-- <td>
                                        <form id="form-{{ $enquiry->id }}"
                                            action="{{ route('registrationcomplete_with_date_file') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group align-items-center">

                                                <input type="file" id="registration_receipt-{{ $enquiry->id }}"
                                                    name="registration_receipt" accept="image/*"
                                                    class="custom-file-input">
                                            </div>
                                    </td>
                                    <td>
                                        <div class="align-items-center" style="display: flex!important;">

                                            <div class="input-group datepicker-container">
                                                <input type="text" id="date1-{{ $enquiry->id }}"
                                                    value="{{ old('date', $enquiry->legal_clearance_date ? \Carbon\Carbon::parse($enquiry->legal_clearance_date)->format('m/d/Y') : '') }}"
                                                    name="date" class="form-control datepicker"
                                                    placeholder="DD/MM/YYYY" required />
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
                                            @if ($enquiry->is_registration_completed == 1)
                                                <button data-id="{{ $enquiry->id }}"
                                                    style="background-color:rgb(255, 0, 195); border:none; max-height:25px; margin-top:2px; margin-bottom:-5px; argin-left:5px;"
                                                    type="button" class="btn btn-info check-status-btn"
                                                    data-placement="top" title="Approved">
                                                    <i class="fa fa-check" style="margin-left:5px;"></i>
                                                </button>
                                            @else
                                                <button data-id="{{ $enquiry->id }}"
                                                    style="background-color:blue; border:none; max-height:25px; margin-top:2px; margin-bottom:-5px;"
                                                    type="button" class="btn btn-info check-status-btn"
                                                    data-placement="top" title="Check">
                                                    <i class="fa fa-check" style="margin-left:5px;"></i>
                                                </button>
                                            @endif

                                            <script>
                                                const checkStatusUrl = "{{ route('checkstatusforregistrationcomplete_legalclrarance', ['id' => ':id']) }}";
                                            </script>
                                        </div>
                                    </td> --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>



            </div>

            <!-- END DEFAULT DATATABLE -->


        </div>
        <div class="col-md-4"></div>
    </div>

    <div class="row">
        <!-- <div class="col-md-3"></div> -->
        <div class="col-md-12" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <!-- <h5 class="panel-title" style="color:#FFFFFF; background-color:#754d35; width:100%; font-size:14px;" align="center"> <i class="fa fa-plus"></i> Added Party</h5> -->

            <div class="col-md-12" style="text-align: center;margin-top: 5px;">
                <h6 class="panel-title"
                    style="color:#FFFFFF; background-color:#1681b6; width:100%;height: 50%; font-size:16px;" align="center">
                    <i class="fa fa-file-text"> &nbsp;<label style="margin: 7px;">Uplod Quires</label> </i>
                </h6>

            </div>

            <div style="margin-top: 50px"></div>

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <div class="card-body">



                    <div class="form-group">
                        <form action="{{ route('uplodqueriesbyclient') }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <div class="form-group" style="margin-bottom:90px;">
                                    <div class="col-md-2" style="margin-top:15px;"></div>

                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Select Firm</label>
                                        <select class="form-control selectpicker" id="firm-select" name="firm_id"
                                            data-live-search="true">
                                            <option value="">Select Firm</option>
                                            @foreach ($firm as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Select Layout</label>
                                        <select name="project_id" class="form-control selectpicker" data-live-search="true"
                                            id="project-select">
                                            <option value="">Select Option</option>
                                            <!-- Options to be dynamically added -->
                                        </select>
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Select Plot</label>
                                        <select id="plot-select" name="plot_no" class="form-control selectpicker"
                                            data-live-search="true">
                                            <!-- Plot options will be appended dynamically -->
                                        </select>
                                    </div>
                                    <div class="col-md-2" style="margin-top:15px;">
                                        <label>Select Client</label>
                                        <select id="client-select" name="client_id" class="form-control selectpicker"
                                            data-live-search="true">
                                            <!-- Client options to be dynamically added -->
                                        </select>
                                    </div>

                                </div>
                            </div>

                            <div>
                                <textarea class="form-control" id="query" name="query" rows="4" placeholder="Enter your query here..."></textarea>
                            </div>

                            <div class="text-center" style="margin-top:5px;">
                                <button type="submit" class="btn btn-primary mt-3">Submit</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
            <div class="col-md-12" style="text-align: center;margin-top: 5px;">
                <h6 class="panel-title"
                    style="color:#FFFFFF; background-color:#1681b6; width:100%;height: 50%; font-size:16px;"
                    align="center">
                    <i class="fa fa-file-text"> &nbsp;<label style="margin: 7px;"> Quires Details</label> </i>
                </h6>

            </div>
            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">

                @if (!empty($queries) && $queries->count() > 0)
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Firm</th>
                                <th>Project</th>
                                <th>Plot Number</th>
                                <th>Client</th>
                                <th>Query</th>
                                <th>Admin Response</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($queries as $query)
                                <tr>
                                    <td>{{ $query->id }}</td>
                                    <td>{{ $query->firm->name ?? '' }}</td>
                                    <td>{{ $query->project->project_name ?? '' }}</td>
                                    <td>{{ $query->plot->plot_no ?? '' }}</td>
                                    <td>{{ $query->client->name ?? '' }}</td>
                                    <td>{{ $query->query }}</td>
                                    <td>{{ $query->admin_response ?? '' }}</td>
                                    <td>{{ $query->created_at->format('Y-m-d H:i:s') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <tr>
                        <td>
                            <p align="center">No queries found.</p>
                        </td>

                    </tr>
                @endif

            </div>

            <!-- END DEFAULT DATATABLE -->


        </div>



        <div class="col-md-4"></div>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


    <script>
        $(document).ready(function() {
            $('#firm-select').on('change', function() {
                var firmId = $(this).val();

                if (firmId) {
                    $.ajax({
                        url: '{{ route('getProjectsByFirmbyuser.firm', ['firm_id' => 'FIRM_ID']) }}'
                            .replace('FIRM_ID', firmId),
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            var $projectSelect = $('#project-select');
                            $projectSelect.empty(); // Clear the dropdown
                            $projectSelect.append('<option value="">Select Option</option>');

                            $.each(data, function(key, project) {
                                $projectSelect.append('<option value="' + project.id +
                                    '">' + project.project_name + '</option>');
                            });

                            $projectSelect.selectpicker('refresh'); // Refresh Bootstrap Select
                        },
                        error: function(xhr, status, error) {
                            console.error("Error:", error);
                            alert("An error occurred while fetching projects.");
                        }
                    });
                } else {
                    var $projectSelect = $('#project-select');
                    $projectSelect.empty(); // Clear the dropdown
                    $projectSelect.append('<option value="">Select Option</option>');
                    $projectSelect.selectpicker('refresh'); // Refresh Bootstrap Select
                }
            });

            $('#project-select').change(function() {
                var projectId = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('fetchPlotspaymentsectionbyuser') }}",
                    data: {
                        projectId: projectId
                    },
                    success: function(response) {
                        var plotSelect = $('#plot-select');
                        plotSelect.empty(); // Clear existing options
                        plotSelect.append('<option value="">Select plot</option>');
                        $.each(response, function(index, plot) {
                            plotSelect.append('<option value="' + plot.plot_no + '">' +
                                plot.plot_no + '</option>');
                        });
                        plotSelect.selectpicker('refresh'); // Refresh Bootstrap Select
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                    }
                });
            });

            $('#plot-select').change(function() {
                var plotNo = $(this).val(); // Get selected plot number

                var projectId = $('#project-select').val(); // Get selected project ID

                $.ajax({
                    type: "GET",
                    url: "{{ route('getClientIdByPlot') }}", // Route to be created
                    data: {

                        plot_no: plotNo,
                        project_id: projectId // Include project ID in the request
                    },
                    success: function(response) {
                        var clientSelect = $('#client-select');
                        clientSelect.empty(); // Clear the dropdown

                        if (response.clients && response.clients.length > 0) {
                            // Append each client ID and name to the dropdown

                            clientSelect.append('<option value="">Select client</option>');
                            $.each(response.clients, function(index, client) {
                                clientSelect.append('<option value="' + client
                                    .client_id + '">' + client.client_name +
                                    '</option>');
                            });
                        } else {
                            clientSelect.append('<option value="">No clients found</option>');
                        }
                        clientSelect.selectpicker('refresh'); // Refresh Bootstrap Select
                    },
                    error: function(xhr, status, error) {
                        console.error("Error:", error);
                        alert("An error occurred while fetching the client information.");
                    }
                });
            });
        });
    </script>
@endsection
