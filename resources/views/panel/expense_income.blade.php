@extends('panel.layout.header')
@section('main_container')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <style>
        #editor {
            height: 100px;
        }

        .container {
            overflow: scroll;
            height: 180px;
            width: 100%;
        }

        table {
            border-collapse: collapse;
        }

        table th,
        table td {
            max-width: 300px;
            padding: 8px 16px;
            border: 1px solid #ddd;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        table thead {
            position: sticky;
            inset-block-start: 0;
            background-color: #ddd;
        }
    </style>
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12" style="margin-top:5px;">
                <a href="{{ route('expense.master') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #d54e10; "><i
                            class="fa fa-user"></i>Expense
                        Masters</button>
                </a>

                <a href="{{ route('expense.income') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #990066;"><i
                            class="fa fa-plus"></i>Income/Billing</button>
                </a>
                <a href="{{ route('expense.entry') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #009999;"><i
                            class="fa fa-plus"></i>Expense
                        Entry</button>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12" style="text-align: center;margin-top: 5px;">
                <h6 class="panel-title"
                    style="color:#FFFFFF; background-color:#990066; width:100%;height: 50%; font-size:16px;" align="center">
                    <i class="fa fa-file-text"><label style="margin: 7px;">Income/Billing</label> </i>
                </h6>


            </div>
            <form action="{{ route('expense.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12" style="margin-top: 2vh;">
                    <div class="col-md-2">
                        <label class="control-label">Bill No.<font color="#FF0000">*</font></label>
                        <input type="text" class="form-control" name="bill_no" placeholder="" />
                    </div>

                    <div class="col-md-2">
                        <label class="control-label">Select Firm<font color="#FF0000">*</font></label>
                        <select id="firm-select" name="firm_id" class="form-control select" data-live-search="true">
                            <option value="">Select Option</option>
                            @foreach ($firm as $firm)
                                <option value="{{ $firm->id }}" data-project-id="{{ $firm->id }}">
                                    {{ $firm->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Select Project<font color="#FF0000">*</font></label>
                        <select id="project-select" name="project_id" class="form-control select" data-live-search="true">
                            <option value="">Select Option</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="control-label">Select Plot<font color="#FF0000">*</font></label>
                        <select id="plot-select" name="plot_no" class="form-control select" data-live-search="true">
                            <option value="">Select Option</option>
                            <!-- Plot options will be appended dynamically -->
                        </select>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="col-md-2" style="margin-top: 2vh;">
                        <label class="control-label">Income Category<font color="#FF0000">*</font></label>
                        <select name="income_category" class="form-control select" data-live-search="true">
                            <option value="Client">Client</option>
                            <option value="Loan">Loan</option>
                        </select>
                    </div>
                    <div class="col-md-2" style="margin-top: 2vh;">
                        <label class="control-label">Client List<font color="#FF0000">*</font></label>
                        <select name="client_id" class="form-control select" data-live-search="true">
                            <option value="1">Client 1</option>
                            <option value="2">Client 2</option>
                            <option value="3">Client 3</option>
                        </select>
                    </div>
                    <div class="col-md-2" style="margin-top: 1vh;">
                        <label class="control-label">Plot No: <font color="#ff0000">11</font></label>
                    </div>
                    <div class="col-md-2" style="margin-top: 1vh;">
                        <label class="control-label">Total Cost: <font color="#ff0000">1,10,00000</font></label>
                    </div>
                    <div class="col-md-2" style="margin-top: 1vh;">
                        <label class="control-label">Paid Amount: <font color="#ff0000">10</font></label>
                    </div>
                    <div class="col-md-2" style="margin-top: 1vh;">
                        <label class="control-label">Balance Amount: <font color="#ff0000">5</font></label>
                    </div>
                    <div class="col-md-2" style="margin-top: 1vh;">
                        <label class="control-label">Total EMI: <font color="#ff0000">0</font></label>
                    </div>
                    <div class="col-md-2" style="margin-top: 1vh;">
                        <label class="control-label">Paid EMI: <font color="#ff0000">0.00</font></label>
                    </div>
                    <div class="col-md-1" style="margin-top: 1vh;">
                        <label class="control-label">Due EMI: <font color="#ff0000">1100</font></label>
                    </div>
                    <div class="col-md-1" style="margin-top: 1vh;">
                        <label class="control-label">Penalty: <font color="#ff0000">1100</font></label>
                    </div>
                    <div class="col-md-2" style="margin-top: 1vh;">
                        <label class="control-label">Other Charges: <font color="#ff0000">1100</font></label>
                    </div>
                    <div class="col-md-7" style="margin-top: 2vh;"></div>

                    <div class="col-md-2" style="margin-top: 2vh;">
                        <label class="control-label">Bank<font color="#FF0000">*</font></label>
                        <input type="text" class="form-control" name="bank_name" placeholder="" />
                    </div>
                    <div class="col-md-2" style="margin-top: 2vh;">
                        <label class="control-label">Amount<font color="#FF0000">*</font></label>
                        <input type="text" class="form-control" name="amount" placeholder="" />
                    </div>
                    <div class="col-md-2" style="margin-top: 2vh;">
                        <label class="control-label">Remarks<font color="#FF0000">*</font></label>
                        <input type="text" class="form-control" name="remarks" placeholder="" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="col-md-8" style="margin-top: 5px;">
                        <div class="col-md-2" style="margin-top: 2vh;">
                            <label class="control-label">EMI No<font color="#FF0000">*</font></label>
                            <select class="form-control select" name="emi_no" data-live-search="true">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="col-md-2" style="margin-top: 2vh;">
                            <label class="control-label">Amount<font color="#FF0000">*</font></label>
                            <input type="text" class="form-control" name="emi_amount" placeholder="" />
                        </div>
                        <div class="col-md-2" style="margin-top: 2vh;">
                            <label class="control-label">Mode of Payment<font color="#FF0000">*</font></label>
                            <select class="form-control select" name="mode_of_payment" data-live-search="true">
                                <option value="Bank NEFT/RTGS">Bank NEFT/RTGS</option>
                                <option value="Online Banking">Online Banking</option>
                                <option value="UPI">UPI</option>
                                <option value="Bank Deposit">Bank Deposit</option>
                                <option value="Cash">Cash</option>
                            </select>
                        </div>
                        <div class="col-md-2" style="margin-top: 2vh;">
                            <label class="control-label">Attach Proof<font color="#FF0000">*</font></label>
                            <input type="file" class="form-control" name="attach_proof" placeholder="" />
                        </div>
                        <div class="col-md-6" style="margin-top: 2vh;">
                            <label class="control-label">Narration<font color="#FF0000">*</font></label>
                            <textarea rows="2" cols="10" class="form-control" name="narration"></textarea>
                        </div>
                        <div class="col-md-4" style="margin-top:6vh;margin-bottom: 1vh;" align="left">
                            <button id="on" type="sybmit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                                <i class="fa fa-print" aria-hidden="true"></i>Receipt & Print
                            </button>
                        </div>
                    </div>

                    <div class="col-md-4" style="margin-top: 5vh;float: left;margin-left: -25vh;">


                        <div class="container">
                            <table width="100%">
                                <thead>
                                    <tr>
                                        <th>EMI No</th>
                                        <th>Date of Payment</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="emi_tbody">
                                    
                                   
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </form>




        </div>





    </div>
@stop


@section('js')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#firm-select').on('change', function() {

                var firmId = $(this).val();
                if (firmId) {
                    $.ajax({
                        url: '{{ route('projects.by.firm', ['firm_id' => 'FIRM_ID']) }}'.replace(
                            'FIRM_ID', firmId),
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#project-select').empty(); // Clear the dropdown
                            $('#project-select').append(
                                '<option value="">Select Option</option>');
                            $.each(data, function(key, project) {
                                $('#project-select').append('<option value="' + project
                                    .id + '">' + project.project_name + '</option>');
                            });
                        }
                    });
                } else {
                    $('#project-select').empty(); // Clear the dropdown
                    $('#project-select').append('<option value="">Select Option</option>');
                }
            });

            $('#project-select').change(function() {
                var projectId = $(this).val();

                if (projectId) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('fetchPlots') }}", // Using the route name
                        data: {
                            projectId: projectId
                        },
                        success: function(response) {
                            console.log(response); // Log the response data
                            var plotSelect = $('#plot-select');
                            plotSelect.empty(); // Clear existing options
                            plotSelect.append('<option value="">Select Plot</option>');
                            $.each(response, function(index, plot) {
                                plotSelect.append('<option value="' + plot.id + '">' +
                                    plot.plot_no + '</option>');
                            });
                            // Reinitialize Bootstrap Select if needed
                            plotSelect.selectpicker('refresh');
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } 
                
            });


            $('#plot-select').change(function() {
                var project_id = $("#project-select").val();
                var firm_id = $("#firm-select").val();
                var plot_no = $(this).val();

                if (project_id) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('get-sold-plot-details') }}", // Using the route name
                        data: {
                            project_id: project_id,
                            firm_id:firm_id,
                            plot_no:plot_no

                        },
                        success: function(response) {
                            $("#emi_tbody").empty();
                            $.each(response.total_emi, function(index, emi) {
                            $("#emi_tbody").append('<tr>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + emi.edop + '</td>' +
                                    '<td>' + emi.inst_amt + '</td>' +
                                    '<td>' + emi.status + '</td>' +
                                '</tr>');
                            })

                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } 
                
            });



        })
    </script>
@stop
