<!-- START DEFAULT DATATABLE -->

@extends('panel.layout.header')

@section('main_container')




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

        <div class="col-md-1" align="center"></div>
        <!-- <div class="col-md-12">
    <div class="col-md-2" align="center">
        <div class="card">
            <h5><span style="color: #FFF;" class="fa fa-home"><b style="color: #FFF;">
                        Sharique</b></span></h5>
            <p style="color: #FFF;font-size: x-small;">Gadge Nagar/2,Amravati
                <br>Folloup Date :2021-03-21
            </p>
        </div>
    </div>
    <div class="col-md-2" align="center">
        <div class="card">
            <h5><span style="color: #FFF;" class="fa fa-home"><b style="color: #FFF;">
                        Lorem</b></span></h5>
            <p style="color: #FFF;font-size: x-small;">Gadge Nagar/2,Amravati
                <br>Folloup Date :2021-03-21
            </p>
        </div>
    </div>
    <div class="col-md-2" align="center">
        <div class="card">
            <h5><span style="color: #FFF;" class="fa fa-home"><b style="color: #FFF;">
                        Yash</b></span></h5>
            <p style="color: #FFF;font-size: x-small;">Gadge Nagar/2,Amravati
                <br>Folloup Date :2021-03-21
            </p>
        </div>
    </div>
    <div class="col-md-2" align="center">
        <div class="card">
            <h5><span style="color: #FFF;" class="fa fa-home"><b style="color: #FFF;">
                        Tarique</b></span></h5>
            <p style="color: #FFF;font-size: x-small;">Gadge Nagar/2,Amravati
                <br>Folloup Date :2021-03-21
            </p>
        </div>
    </div>
    <div class="col-md-2" align="center">
        <div class="card">
            <h5><span style="color: #FFF;" class="fa fa-home"><b style="color: #FFF;">
                        Lorem</b></span></h5>
            <p style="color: #FFF;font-size: x-small;">Gadge Nagar/2,Amravati
                <br>Folloup Date :2021-03-21
            </p>
        </div>
    </div>
    <div class="col-md-2" align="center">
        <div class="card">
            <h5><span style="color: #FFF;" class="fa fa-home"><b style="color: #FFF;">
                        Yash</b></span></h5>
            <p style="color: #FFF;font-size: x-small;">Gadge Nagar/2,Amravati
                <br>Folloup Date :2021-03-21
            </p>
        </div>
    </div>
</div> -->
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-top:5px;">

            <!-- START DEFAULT DATATABLE -->

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable" style="overflow:auto !important;">
                    <thead>
                        <tr>
                            <th>Sr.No.</th>
                            <th>Name</th>
                            <th>Agent ID</th>
                            <th>Level</th>
                            <th>Profile</th>
                            <th>Target (Monthly)</th>
                            <th>Regular Percentages</th>
                            <th>Percentages</th>
                            <!-- <th>Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pratik</td>
                            <td>1080</td>
                            <td>L1</td>
                            <td>Contractor</td>
                            <td>05</td>
                            <td>10%</td>
                            <td>20%</td>
                            <!-- <td>
                                            <button data-toggle="modal" data-target="#popup3" style="background-color:#1abc3d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;" type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye" style="margin-left:5px;"></i></button>

                                        </td> -->
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
                <h4 class="modal-title" id="H4">Commission Plan</h4>
            </div>
            <div class="modal-body" style="height:30%;padding: 10px;">

                <div class="col-md-12">
                    <table width="100%" border="1" style="margin-top: 5px;">
                        <tr style="background-color:#f0f0f0; height:30px;">
                            <th width="5%" style="text-align:center">Profile</th>
                            <th width="5%" style="text-align:center">Target (Monthly)</th>

                            <th width="5%" style="text-align:center">Regular Percentages</th>
                            <th width="5%" style="text-align:center">Level</th>
                            <th width="5%" style="text-align:center">Referral Percentages</th>


                        </tr>


                        <tr>
                            <td style="padding:5px;">
                                <label>Assistant Sales Executive</label>
                            </td>
                            <td style="padding:5px;" align="center">1 Lac to 4 Lac</td>
                            <td style="padding:5px;" align="center">5%</td>
                            <td style="padding:5px;" align="center">Level 1</td>
                            <td style="padding:5px;" align="center"></td>

                        </tr>
                        <tr>
                            <td style="padding:5px;">
                                <label>Sales Executive</label>
                            </td>
                            <td style="padding:5px;" align="center">4 Lac to 7 Lac</td>
                            <td style="padding:5px;" align="center">7%</td>
                            <td style="padding:5px;" align="center">Level 2</td>
                            <td style="padding:5px;" align="center"></td>

                        </tr>
                        <tr>
                            <td style="padding:5px;">
                                <label>Senior Sales Executive</label>
                            </td>
                            <td style="padding:5px;" align="center">7 Lac to 10 Lac</td>
                            <td style="padding:5px;" align="center">9%</td>
                            <td style="padding:5px;" align="center">Level 3</td>
                            <td style="padding:5px;" align="center"></td>

                        </tr>
                        <tr>
                            <td style="padding:5px;">
                                <label>Sale Representative</label>
                            </td>
                            <td style="padding:5px;" align="center">10 Lac to 20 Lac</td>
                            <td style="padding:5px;" align="center">11%</td>
                            <td style="padding:5px;" align="center">Level 4</td>
                            <td style="padding:5px;" align="center"></td>

                        </tr>
                        <tr>
                            <td style="padding:5px;">
                                <label>Assistant Sale Representative</label>
                            </td>
                            <td style="padding:5px;" align="center">20 Lac to 40 Lac</td>
                            <td style="padding:5px;" align="center">13%</td>
                            <td style="padding:5px;" align="center">Level 5</td>
                            <td style="padding:5px;" align="center"></td>

                        </tr>
                        <tr>
                            <td style="padding:5px;">
                                <label>Senior Sale Representative</label>
                            </td>
                            <td style="padding:5px;" align="center">40 Lac to 70 Lac</td>
                            <td style="padding:5px;" align="center">15%</td>
                            <td style="padding:5px;" align="center">Level 6</td>
                            <td style="padding:5px;" align="center"></td>

                        </tr>
                        <tr>
                            <td style="padding:5px;">
                                <label>Assistant Manager</label>
                            </td>
                            <td style="padding:5px;" align="center">70 Lac to 1 Cr</td>
                            <td style="padding:5px;" align="center">16%</td>
                            <td style="padding:5px;" align="center">Level 7</td>
                            <td style="padding:5px;" align="center"></td>

                        </tr>
                        <tr>
                            <td style="padding:5px;">
                                <label>Manager</label>
                            </td>
                            <td style="padding:5px;" align="center">1 Cr to 2 Cr</td>
                            <td style="padding:5px;" align="center">17%</td>
                            <td style="padding:5px;" align="center">Level 8</td>
                            <td style="padding:5px;" align="center"></td>

                        </tr>
                        <tr>
                            <td style="padding:5px;">
                                <label>Senior Manager</label>
                            </td>
                            <td style="padding:5px;" align="center">2 Cr to 4 Cr</td>
                            <td style="padding:5px;" align="center">18%</td>
                            <td style="padding:5px;" align="center">Level 9</td>
                            <td style="padding:5px;" align="center"></td>

                        </tr>
                        <tr>
                            <td style="padding:5px;">
                                <label>Director</label>
                            </td>
                            <td style="padding:5px;" align="center">4 Cr to 6 Cr</td>
                            <td style="padding:5px;" align="center">19%</td>
                            <td style="padding:5px;" align="center">Level 10</td>
                            <td style="padding:5px;" align="center"></td>

                        </tr>
                        <tr>
                            <td style="padding:5px;">
                                <label>King</label>
                            </td>
                            <td style="padding:5px;" align="center">6 Cr to 8 Cr</td>
                            <td style="padding:5px;" align="center">20%</td>
                            <td style="padding:5px;" align="center">Level 11</td>
                            <td style="padding:5px;" align="center"></td>

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
<!-- END MESSAGE BOX-->
@stop
