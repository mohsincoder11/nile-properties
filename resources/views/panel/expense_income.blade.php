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
                    <select name="income_category" id="income-category" class="form-control select"
                        data-live-search="true">
                        <option value="EMI">EMI</option>
                        <option value="Other">Other Charges</option>
                    </select>
                </div>
                <div class="col-md-2 other-charges-section" style="margin-top: 2vh; display: none;">
                    <label class="control-label">Other Charges Type<font color="#FF0000">*</font></label>
                    <select class="form-control select" name="other_charges_type" id="other_charges_type"
                        data-live-search="true">

                    </select>
                </div>
                <div class="col-md-2 emi-section" style="margin-top: 2vh;">
                    <label class="control-label">EMI No<font color="#FF0000">*</font></label>
                    <select class="form-control select" name="emi_no" id="emi_no" data-live-search="true">

                    </select>
                </div>
                <div class="col-md-2" style="margin-top: 2vh;">
                    <label class="control-label">Amount<font color="#FF0000">*</font></label>
                    <input type="text" class="form-control" name="amount" id="amount" placeholder="" />
                </div>
                {{-- <div class="col-md-2" style="margin-top: 2vh;">
                    <label class="control-label">Client List<font color="#FF0000">*</font></label>
                    <select name="client_id" class="form-control select" data-live-search="true">
                        <option value="1">Client 1</option>
                        <option value="2">Client 2</option>
                        <option value="3">Client 3</option>
                    </select>
                </div> --}}
            </div>
            <div class="col-md-12 info_div" style="display:none">
                <div class="col-md-2" style="margin-top: 1vh;">
                    <label class="control-label">Plot No: <font id="text_plot_no" color="#ff0000">11</font></label>
                </div>
                <div class="col-md-2" style="margin-top: 1vh;">
                    <label class="control-label">Total Cost: <font id="text_total_cost" color="#ff0000">1,10,00000
                        </font></label>
                </div>
                <div class="col-md-2" style="margin-top: 1vh;">
                    <label class="control-label">Paid Amount: <font id="text_paid_amount" color="#ff0000">10</font>
                    </label>
                </div>
                <div class="col-md-2" style="margin-top: 1vh;">
                    <label class="control-label">Balance Amount: <font id="text_balance_amount" color="#ff0000">5</font>
                    </label>
                </div>
                <div class="col-md-2" style="margin-top: 1vh;">
                    <label class="control-label">Total EMI: <font id="text_total_emi" color="#ff0000">0</font></label>
                </div>
                <div class="col-md-2" style="margin-top: 1vh;">
                    <label class="control-label">Paid EMI: <font id="text_paid_emi" color="#ff0000">0.00</font></label>
                </div>
                <div class="col-md-1" style="margin-top: 1vh;">
                    <label class="control-label">Due EMI: <font id="text_due_emi" color="#ff0000">1100</font></label>
                </div>
                <div class="col-md-1" style="margin-top: 1vh;">
                    <label class="control-label">Penalty: <font id="text_penalty" color="#ff0000">1100</font></label>
                </div>
                <div class="col-md-2" style="margin-top: 1vh;">
                    <label class="control-label">Other Charges: <font id="text_other_charges" color="#ff0000">1100
                        </font></label>
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-2" style="margin-top: 2vh;">
                    <label class="control-label">Bank<font color="#FF0000">*</font></label>
                    <input type="text" class="form-control" name="bank_name" placeholder="" />
                </div>

                <div class="col-md-2" style="margin-top: 2vh;">
                    <label class="control-label">Remarks<font color="#FF0000">*</font></label>
                    <input type="text" class="form-control" name="remarks" placeholder="" />
                </div>
            </div>

            <div class="col-md-12">
                <div class="col-md-8" style="margin-top: 5px;">





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
                        <table width="100%" id="emi_table">
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

                        <table width="100%" id="other_charges_table" style="display: none;">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date</th>
                                    <th>Type of Payment</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody id="other_charges_table_tbody">


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
            toggleSections();

            // Toggle between EMI and Other Charges sections based on the selected category
            $('#income-category').change(function() {
                toggleSections();
            });

            function toggleSections() {
                var selectedCategory = $('#income-category').val();

                if (selectedCategory === 'EMI') {
                    $('.emi-section').show();
                    $('.other-charges-section').hide();
                    $("#other_charges_table").hide();
                    $("#emi_table").show();

                } else {
                    $('.emi-section').hide();
                    $('.other-charges-section').show();
                    $("#other_charges_table").show();
                    $("#emi_table").hide();
                }

                // Update the table content based on the selected category
            }

            $('#firm-select').on('change', function() {
                $('.info_div').hide();

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
                $('.info_div').hide();

                if (projectId) {
                    $.ajax({
                        type: "GET",
                        url: "{{ route('fetchPlotspaymentsection') }}", // Using the route name
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


            $('#income-category,#plot-select').change(function() {
                var project_id = $("#project-select").val();
                var firm_id = $("#firm-select").val();
                var plot_no = $('#plot-select').val();
                if (project_id && $('#income-category').val() == 'EMI') {
                    $("#emi_table").show();
                    $("#other_charges_table").hide();
                    $.ajax({
                        type: "GET",
                        url: "{{ route('get-sold-plot-details') }}", // Using the route name
                        data: {
                            project_id: project_id,
                            firm_id: firm_id,
                            plot_no: plot_no

                        },
                        success: function(response) {

                            $("#emi_tbody").empty();
                            $("#emi_no").empty();
                            $("#emi_no").append('<option value="">select option</option');
                            $.each(response.total_emi, function(index, emi) {
                                $("#emi_tbody").append('<tr>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + emi.edop + '</td>' +
                                    '<td>' + emi.inst_amt + '</td>' +
                                    '<td>' + emi.status.toUpperCase() + '</td>' +
                                    '</tr>');
                                    if(emi.status=='pending'){
                                        $("#emi_no").append('<option value="' + emi.id +
                                    '" amount="' + emi.inst_amt + '">' + (index +
                                    1) + '</option>');
                                    }


                            })
                            let plot_info = response.plot_info;
                            if (plot_info.length!=0) {



                                $('#text_plot_no').text(plot_info.plot_no);
                                $('#text_total_cost').text(plot_info.total_cost);
                                $('#text_paid_amount').text(plot_info.paid_amount);
                                $('#text_balance_amount').text(plot_info.balance_amount);
                                $('#text_total_emi').text(plot_info.total_emi_count);
                                $('#text_paid_emi').text(plot_info.paid_emi);
                                $('#text_due_emi').text(plot_info.due_emi);
                                $('#text_penalty').text(plot_info.penalty);
                                $('#text_other_charges').text(plot_info.other_charges);
                                // Display the info div
                                $('.info_div').show();
                            } else {
                                $('#text_plot_no').text('');
                                $('#text_total_cost').text('');
                                $('#text_paid_amount').text('');
                                $('#text_balance_amount').text('');
                                $('#text_total_emi').text('');
                                $('#text_paid_emi').text('');
                                $('#text_due_emi').text('');
                                $('#text_penalty').text('');
                                $('#text_other_charges').text('');
                                $('.info_div').hide();


                            }

                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                } else if (project_id && $('#income-category').val() == 'Other') {
                    $("#emi_table").hide();
                    $("#other_charges_table").show();
                    $.ajax({
                        type: "GET",
                        url: "{{ route('get-sold-plot-other_charges') }}", // Using the route name
                        data: {
                            project_id: project_id,
                            firm_id: firm_id,
                            plot_no: plot_no

                        },
                        success: function(response) {

                            $("#other_charges_table_tbody").empty();
                            $("#other_charges_type").empty();
                            $("#other_charges_type").append(
                                '<option value="">select option</option');

                            $.each(response.other_charges, function(index, other_charges) {
                                $("#other_charges_table_tbody").append('<tr>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + date_format(other_charges.created_at) +
                                    '</td>' +
                                    '<td>' + other_charges.chargesname
                                    .other_charges + '</td>' +

                                    '<td>' + other_charges.amount + '</td>' +
                                    '<td>' + other_charges.status.toUpperCase() +
                                    '</td>' +
                                    '</tr>');
                                    if(other_charges.status=='pending'){
                                    $("#other_charges_type").append('<option value="' +
                                    other_charges.id + '" amount="' + other_charges
                                    .amount + '">' + other_charges.chargesname
                                    .other_charges + '</option>');
                                    }




                            })

                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                }



            });

            $("#other_charges_type,#emi_no").change(function() {
                var selectedAmount = $(this).find('option:selected').attr('amount');
                $("#amount").val(selectedAmount);
            });


            function date_format(date) {
                var dateStr = date;

                // Parse the date string to a Date object
                var dateObj = new Date(dateStr);
                // Format the date to Y-m-d
                var formattedDate = dateObj.getFullYear() + '-' +
                    ('0' + (dateObj.getMonth() + 1)).slice(-2) + '-' +
                    ('0' + dateObj.getDate()).slice(-2);
                return formattedDate;
            }


        })
</script>
@stop