@extends('panel.layout.header')

@section('main_container')

<!-- START DEFAULT DATATABLE -->
<div class="row">


    <div class="col-md-12" align="center" style="margin-top: 1px;">

        <!-- START DEFAULT DATATABLE -->
        <div class="col-md-4" align="center"></div>
        <div class="col-md-8" align="center">
            <div class="icon-box-container">

                <div class="icon-box box-3" style="padding: 1vh;">
                    <a href="{{ route('downlineindex') }}">
                        <img src="{{ asset('panel/assets/images/cards/14.png') }}" alt="" class="classic-1">
                        <p class="classic">My Downline</p>
                    </a>
                </div>

                <div style="margin-top: 10vh;font-size: large;">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </div>
                <div class="icon-box box-1" style="padding: 1vh;">
                    <a href="{{ route('positionindex') }}">
                        <img src="{{ asset('panel/assets/images/cards/15.png') }}" alt="" class="classic-1">
                        <p class="classic">My Position</p>
                    </a>
                </div>

                <div style="margin-top: 10vh;font-size: large;">
                    <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                </div>
                <div class="icon-box box-2" style="padding: 1vh;">
                    <a href="{{ route('downlinebuisnessindex') }}">
                        <img src="{{ asset('panel/assets/images/cards/16.png') }}" alt="" class="classic-1">
                        <p class="classic">Downline Business</p>
                    </a>

                </div>






                <!-- Add more boxes as needed -->
            </div>
        </div>


        <div class="col-md-12">
            <table width="100%">
                <tr style="height:30px;">
                    <th width="3%">From Date</th>
                    <th width="3%">To Date</th>
                    <th width="3%">Select Position</th>
                    <th width="3%">Select Agent</th>

                    <th></th>

                </tr>


                <tr>
                    <td style="padding: 2px;" width="1%">
                        <div class="input-group">
                            <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020"
                                data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                        </div>

                        <div class="input-group">
                            <input type="text" id="dp-3" class="form-control " value="10-10-2020" data-date="01-05-2020"
                                data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </td>
                    <td style="padding: 2px;" width="1%">
                        <div class="input-group">
                            <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020"
                                data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                        </div>

                        <div class="input-group">
                            <input type="text" id="dp-3" class="form-control " value="10-10-2020" data-date="01-05-2020"
                                data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <select class="form-control select" data-live-search="true" id="profile" name="profile">
                            <option></option>
                            @foreach ($level as $levels)
                            <option>{{$levels->profile}}</option>
                            @endforeach
                            {{-- <option>Assistant Sales Executive (Level 1)</option>
                            <option>Sales Executive (Level 2)</option>
                            <option>Senior Sales Executive (Level 3)</option>
                            <option>Sale Representative (Level 4)</option>
                            <option>Assistant Sale Representative (Level 5)</option>
                            <option>Senior Sale Representative (Level 6)</option>
                            <option>Assistant Manager (Level 7)</option>
                            <option>Manager (Level 8)</option>
                            <option>Senior Manager (Level 9)</option>
                            <option>Director (Level 10)</option>
                            <option>King (Level 11)</option> --}}
                        </select>
                    </td>
                    <td style="padding: 2px;" width="4%">
                        <select class="form-control select" data-live-search="true" id="agent">
                            {{-- <option>Sharique</option>
                            <option>Shrikant</option>
                            <option>Yash</option> --}}

                        </select>
                    </td>

                    <td style="padding: 2px;" width="5%">
                        <button id="on" type="button" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                class="fa fa-search" aria-hidden="true"></i>
                            Search</button>
                    </td>
                </tr>

            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-top:5px;">

            <!-- START DEFAULT DATATABLE -->

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable" style="overflow:auto !important;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Position</th>
                            <th>Level</th>
                            <th>Name</th>
                            <th>Agent ID</th>
                            <th>Downline</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            <td>1.</td>

                            <td>Assistant Sales Executive</td>
                            <td>Level 1</td>
                            <td>Bhawana</td>
                            <td>Nile109</td>
                            <td>NA</td>
                            <td>
                                <button data-toggle="modal" data-target="#popup3"
                                    style="background-color:#1abc3d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    title="View Downline"><i class="fa fa-eye" style="margin-left:5px;"></i>
                                    Downline</button>
                                <button data-toggle="modal" data-target="#popup4"
                                    style="background-color:#1abc3d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    title="View Business"><i class="fa fa-eye" style="margin-left:5px;"></i>
                                    Business</button>
                                <!-- <button style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                            <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button> -->
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>

            <!-- END DEFAULT DATATABLE -->


        </div>
    </div>

</div>

</div>



</div>

<!-- PAGE CONTENT WRAPPER -->
<div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="H4">View Downline</h4>
            </div>
            <div class="modal-body" style="height:30%;padding: 10px;">

                <div class="col-md-12">
                    <table width="100%" border="1" style="margin-top: 5px;">
                        <tr style="background-color:#f0f0f0; height:30px;">
                            <th width="3%" style="text-align:center">Sr.No</th>
                            <th width="10%" style="text-align:center">Position</th>
                            <th width="5%" style="text-align:center">Level</th>
                            <th width="10%" style="text-align:center">Name</th>
                            <th width="5%" style="text-align:center">Agent ID</th>
                            <th width="5%" style="text-align:center">Mobile Number</th>
                            <th width="5%" style="text-align:center">Email</th>

                        </tr>


                        <tr>
                            <td style="padding:5px;" align="center">
                                <label>1</label>
                            </td>
                            <td style="padding:5px;" align="center">Assistant Sales Executive</td>
                            <td style="padding:5px;" align="center">Level 1</td>
                            <td style="padding:5px;" align="center">Bhawana</td>
                            <td style="padding:5px;" align="center">Nile 109</td>
                            <td style="padding:5px;" align="center">000 000 0000</td>
                            <td style="padding:5px;" align="center">test@gmail.com</td>
                        </tr>


                    </table>
                </div>
            </div>
            <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div>

<div class="modal" id="popup4" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="H4">View Business</h4>
            </div>
            <div class="modal-body" style="height:30%;padding: 10px;">

                <div class="col-md-12">
                    <table width="100%" border="1" style="margin-top: 5px;">
                        <tr style="background-color:#f0f0f0; height:30px;">
                            <th width="3%" style="text-align:center">Sr.No</th>
                            <th width="10%" style="text-align:center">Project Name</th>
                            <th width="5%" style="text-align:center">Plot No</th>
                            <th width="10%" style="text-align:center">Customer ID</th>
                            <th width="15%" style="text-align:center">Customer Name</th>
                            <th width="5%" style="text-align:center">Total Amount</th>
                        </tr>


                        <tr>
                            <td style="padding:5px;" align="center">
                                <label>1</label>
                            </td>
                            <td style="padding:5px;" align="center">Nile City</td>
                            <td style="padding:5px;" align="center">A-2388</td>
                            <td style="padding:5px;" align="center">C-1023</td>
                            <td style="padding:5px;" align="center">Sharique</td>
                            <td style="padding:5px;" align="center">3000000</td>

                        </tr>


                    </table>
                </div>
            </div>
            <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div>
<!-- MESSAGE BOX-->
<div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
    <div class="mb-container">
        <div class="mb-middle">
            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
            <div class="mb-content">
                <p>Are you sure you want to log out?</p>
                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
            </div>
            <div class="mb-footer">
                <div class="pull-right">
                    <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                </div>
            </div>
        </div>
    </div>
</div>

@stop

@section('js')
<script>
    $(document).ready(function() {
console.log(1);
        $(document).on("change", "#profile", function() {
            console.log($(this).val());
            $.ajax({
                url: "{{ route('get_agent_by_profile') }}",
                data: {
                    id: $(this).val(),
                },
                success: function(result) {
                    $("#agent").empty();
                    $.each(result['agent'], function(a, b) {
                        $("#agent").append('<option value="' + b.id + '">' + b
                            .name + '</option>');
                    })
                    $("#agent").selectpicker('refresh');

                }
            });
        })

    })
</script>
@stop