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

            <form action="{{ route('downlinebuisnessindex') }}" method="GET">
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
                                <input type="text" id="dp-3" class="form-control " value="01-09-2024"
                                    data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" name="from_date"/>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <div class="input-group">
                                <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020"
                                    data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                            </div>

                            <div class="input-group">
                                <input type="text" id="dp-3" class="form-control " value="30-09-2024"
                                    data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" name="to_date"/>
                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <select class="form-control" data-live-search="true" name="profile" id="profile">
                                <option>Select</option>
                                @foreach ($level as $levels)
                                    <?php $formattedProfile = str_replace(' ', '_', $levels->profile); ?>
                                    <option value="{{ $formattedProfile }}" @if (app()->request->input('profile') == $formattedProfile)
                                        selected
                                    @endif >{{ $levels->profile }}</option>
                                @endforeach
                            </select>
                        </td>
                       {{-- @json($agent) --}}
                        <td style="padding: 2px;" width="4%">
                            <select class="form-control selectpicker" data-live-search="true" name="agent_id" id="agent">
                                @foreach ($agent as $agents)
                                <option value="{{$agents->id}}" @if (app()->request->input('agent_id') == $agents->id)
                                    selected
                                @endif>{{$agents->name}}</option>
                                @endforeach
                                {{-- <option>Sharique</option>
                            <option>Shrikant</option>
                            <option>Yash</option> --}}

                            </select>
                        </td>

                        <td style="padding: 2px;" width="5%">
                            <button id="on" type="submit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-search" aria-hidden="true"></i>
                                Search</button>
                        </td>
                    </tr>

                </table>
            </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-12" style="margin-top:5px;">

                <!-- START DEFAULT DATATABLE -->

                <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                    <table class="table datatable" style="overflow:auto !important;">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Name</th>
                                <th>Agent ID</th>
                                <th>Profile</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($business as $businesss)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$businesss->agent->name}}</td>
                                <td>{{$businesss->agent->agent_number}}</td>
                                <td>{{$businesss->agent->profile}}</td>
                        
                    
                                <td>
                                    {{-- <button data-toggle="modal" data-target="#popup3"
                                        style="background-color:#1abc3d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                        title="View Downline"><i class="fa fa-eye" style="margin-left:5px;"></i>
                                        Downline</button> --}}
                                    <button data-toggle="modal" data-target="#popup4" id="{{$businesss->agent_id}}"
                                        style="background-color:#1abc3d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info view_business" data-toggle="tooltip" data-placement="top"
                                        title="View Business"><i class="fa fa-eye" style="margin-left:5px;"></i>
                                        Business</button>
                                    <!-- <button style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                                <button style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button> -->
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



    </div>

    <!-- PAGE CONTENT WRAPPER -->
    <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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

    <div class="modal" id="popup4" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">View Business</h4>
                </div>
                <div class="modal-body" style="height:30%;padding: 10px;">

                    <div class="col-md-12" id="table_append">
                        
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
                        profile: $(this).val(),
                    },
                    success: function(result) {
                        $("#agent").empty();
                        // Assuming result is an array of agent objects
                        $.each(result, function(index, agent) {
                            $("#agent").append('<option value="' + agent.id + '">' +
                                agent.name + '</option>');
                        });

                    //     if ($("#agent").hasClass('selectpicker')) {
                    //     $("#agent").selectpicker('refresh');
                    // }

                    }
                });
            })

        })
    </script>
  
    
    
  <script>
    $(document).ready(function() {
        $(".view_business").on('click', function() {
            console.log('alart');
            $.ajax({
                type: "get",
                url: '{{ route('get_business') }}',
                dataType: "json",
                data: {
                    id: $(this).attr('id')
                },
                success: function(data) {
                    $("#table_append").html(data);

                },
            });
        })
    })
</script>

@stop
