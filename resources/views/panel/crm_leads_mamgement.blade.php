@extends('panel.layout.header')

@section('main_container')

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">

            <div class="panel-body" style="padding:1px 5px 2px 5px;">

                <div class="col-md-12" style="margin-top:5px;">
                    <!-- <label style="color:#000; background-color:#FFCC00; width:7%; height:25px; padding-top:5px;margin-top: 1vh;" align="center"><span class=""></span> <strong>Project Entry</strong></label> -->

                    <a href="{{ route('crm_lead_management') }}"> <button id="on" type="button" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #990066;"><i
                                class="fa fa-plus"></i>Assign Lead</button>
                    </a>
                    <a href="{{ route('fetchentrylevelformleadStore') }}"> <button id="on" type="button"
                            class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #009999;"><i
                                class="fa fa-plus"></i>Add Lead</button>
                    </a>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12" style="text-align: center;margin-top: 5px;">
            <h6 class="panel-title"
                style="color:#FFFFFF; background-color:#006699; width:100%;height: 50%; font-size:16px;" align="center">
                <i class="fa fa-file-text"><label style="margin: 7px;">Assign Lead</label> </i>
            </h6>
            <!-- <a href="project_entry.html"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                            class="fa fa-plus"></i>Project Entry</button>
                                </a> -->

        </div>
        <div class="col-md-3" style="margin-top: 5px;"></div>
        <div class="col-md-9" style="margin-top: 5px;">

            <table width="100%">
                <thead>
                    <tr style="height:30px;">
                        <th>Select Employee</th>
                        <th>Upload CSV</th>
                        <th></th>

                    </tr>

                </thead>
                <tbody>

                    <tr width="100%">
                        <form action="{{ route('employees.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <td style="padding: 2px;" width="1%">
                                <select class="form-control select" name="employee_id" data-live-search="true">
                                    <option value="" disabled> Select Employee</option>
                                    @foreach($employeesdropdown as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="padding: 2px;" width="1%">
                                <input type="file" class="form-control" name="file" placeholder="" required />
                            </td>
                            <td style="padding: 2px;" width="2%">
                                <button id="on" type="submit" class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                                    <i class="fa fa-plus"></i>Upload</button>
                                <a href="{{ asset('panel/excel/sample-file.xlsx') }}"><button id="on" type="button"
                                        class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                                        <i class="fa fa-download"></i>Download Sample</button></a>
                            </td>


                        </form>
                    </tr>
                </tbody>
            </table>

        </div>

        <div style="margin:20px 20px;">
            <!-- <div class="panel-body" style="margin-bottom:15px;"> -->
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>City</th>
                        <th>Address</th>

                        <th>Number Of Records</th>
                        <th>Date</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($employeesWithCounts as $employee)
                    <tr>
                        <td>{{ $loop->index+1 }}</td>
                        <td>{{ $employee->name ?? ''}}</td>
                        <td>{{ $employee->email ?? ''}} </td>
                        <td>{{ $employee->contact_number ?? ''}}</td>

                        <td>{{ $employee->city ?? ''}}</td>

                        <td>{{ $employee->address ?? ''}}</td>
                        <td>{{ $employee->count ?? ''}}</td>
                        <td>{{ \Carbon\Carbon::parse($employee->date)->format('d-m-y')?? ''}}</td>
                        <td>

                            <div class="form-group1 " style=" display: flex;">

                                <div style="margin-left:5px; margin-top:5px;">
                                    <button
                                        style="background-color:green; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        data-id="{{ $employee->employee_id ?? '' }}"
                                        data-datename=" {{ $employee->date ?? '' }}"
                                        class="btn btn-info view-details-btn" data-toggle="modal" data-target="#popup3"
                                        data-placement="top" title="View Details">
                                        <i class="fa fa-eye" style="margin-left:5px;"></i>
                                    </button>
                                </div>

                                <!-- <button
                                                style="background-color:blue; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info" data-placement="top" title="Check"><i
                                                    class="fa fa-check" style="margin-left:5px;"></i></button> -->

                            </div>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <!-- </div> -->
        </div>

        <div class="col-md-12">
            <img src="{{ asset('/panel/img/line.png') }}" width="100%" />
        </div>


    </div>
    <!-- old one-->
    {{-- <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Assign Lead</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">

                    <div class="col-md-2"></div>
                    <div class="col-md-10">
                        <table width="80%">
                            <tr style="height:30px;">


                                <th width="1%">Date</th>


                                <th width="1%">Remark</th>

                            </tr>


                            <tr>


                                <td style="padding: 2px;" width="1%">
                                    <div class="input-group">
                                        <input type="hidden" id="dp-3" class="form-control datepicker"
                                            value="01-05-2020" data-date="01-05-2020" data-date-format="dd-mm-yyyy"
                                            data-date-viewmode="years" />
                                    </div>

                                    <div class="input-group">
                                        <input type="text" id="dp-3" class="form-control " value="10-10-2020"
                                            data-date="01-05-2020" data-date-format="dd-mm-yyyy"
                                            data-date-viewmode="years" />
                                        <span class="input-group-addon"><span
                                                class="glyphicon glyphicon-calendar"></span></span>
                                    </div>
                                </td>

                                <td style="padding: 2px;" width="1%">
                                    <textarea type="text" class="form-control" name="name" placeholder="" rows="1"
                                        cols="5">
                                                </textarea>
                                </td>
                            </tr>

                        </table>


                    </div>
                    <!-- <div class="col-md-12">
                                    <table width="100%" border="1" style="margin-top: 5px;">
                                        <tr style="background-color:#f0f0f0; height:30px;">
                                            <th width="3%" style="text-align:center">Sr.No</th>
                                            <th width="10%" style="text-align:center">Date</th>

                                            <th width="5%" style="text-align:center">Remark</th>
                                        </tr>


                                        <tr>
                                            <td style="padding:5px;" align="center">
                                                <label>1</label>
                                            </td>
                                            <td style="padding:5px;" align="center">
                                                13-06-24
                                            </td>


                                            <td style="text-align:center; color:black">Convey Tomorrow

                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding:5px;" align="center">
                                                <label>2</label>
                                            </td>
                                            <td style="padding:5px;" align="center">
                                                14-06-24
                                            </td>


                                            <td style="text-align:center; color:black"> Convey Pickup

                                            </td>
                                        </tr>

                                    </table>



                                </div>  -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>


                                <th>Date</th>


                                <th>Remark</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>



                                <td>14/06/2024</td>

                                <td>Convey Tomorrow</td>



                            </tr>
                            <tr>
                                <td>2</td>



                                <td>15/06/2024</td>

                                <td>Convey Pickup</td>



                            </tr>

                        </tbody>
                    </table>

                </div>
                <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div> --}}
    <!-- new one -->
    <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="popup3Label" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popup3Label">Lead Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>WhatsApp No.</th>
                                <th>City</th>
                                <th>Address</th>
                            </tr>
                        </thead>
                        <tbody id="leadDetailsBody">
                            <!-- Data will be dynamically populated here -->
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div style="position: fixed; bottom: 0; width: 100%;">
        <div class="col-md-12" style="width: 100%;">
            <div class="col-md-6" style="float: left; width: 50%;">
                @if ($errors->any())
                <div class="alert alert-danger mt-2"
                    style="background-color: rgba(209, 215, 209, 0.1); color: #1f1e1e; border: 1px solid #d6dad6; padding: 10px; border-radius: 5px;">
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

@stop

@section('js')
<script>
    $(document).ready(function() {
        $('.view-details-btn').click(function() {
            var employeeId = $(this).data('id');
            var dateId = $(this).data('datename');
            $.ajax({
                url: '{{ route('fetchLeadDetails') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    employeeId: employeeId ,
                    dateId: dateId
                },
               success: function(response) {
            var modalBody = $('#leadDetailsBody');
            modalBody.empty(); // Clear existing content
            if (response.length > 0) {
            $.each(response, function(index, leadDetails) {
            var row = '<tr>' +
                '<td>' + (index + 1) + '</td>' +
                '<td>' + leadDetails.name + '</td>' +
                '<td>' + leadDetails.email + '</td>' +
                '<td>' + leadDetails.mobile + '</td>' +
                '<td>' + leadDetails.whatsapp_no + '</td>' +
                '<td>' + leadDetails.city + '</td>' +
                '<td>' + leadDetails.address + '</td>' +
                '</tr>';
            modalBody.append(row);
            });
            } else {
            modalBody.html('<tr><td colspan="7">No leads found.</td></tr>');
            }
            },
                error: function(xhr, status, error) {
                    console.error('Error fetching lead details:', error);
                    var modalBody = $('#leadDetailsBody'); // Define modalBody within error function
                    modalBody.html('<tr><td colspan="7">Error fetching lead details.</td></tr>');
                }
            });
        });
    });
</script>
@stop
