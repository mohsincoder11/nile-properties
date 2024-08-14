@extends('panel.layout.user_model_layout')

@section('main_container')

<div class="page-content-wrap">
    {{-- <div class="row">

        <a href="#"> <button id="on" type="button" class="btn mjks"
                style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6;"><i class="fa fa-plus"></i>Add
                New Sale</button>
        </a>
        <a href=""> <button id="on" type="button" class="btn mjks"
                style="color:#FFFFFF; height:30px; width:auto;background-color: #c27809;"><i class="fa fa-line-chart"
                    aria-hidden="true"></i>Sales Summary
            </button>
        </a>

        <a href=""> <button id="on" type="button" class="btn mjks"
                style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6;"><i class="fa fa-upload"
                    aria-hidden="true"></i>Upload Demand Letter</button>
        </a>
        <a href=""> <button id="on" type="button" class="btn mjks"
                style="color:#FFFFFF; height:30px; width:auto;background-color: #c27809;"><i class="fa fa-download"
                    aria-hidden="true"></i>Amounts Recived</button>
        </a>

        <a href=""> <button id="on" type="button" class="btn mjks"
                style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6;"><i class="fa fa-search"
                    aria-hidden="true"></i>Due Customers</button>
        </a>
        <a href=""> <button id="on" type="button" class="btn mjks"
                style="color:#FFFFFF; height:30px; width:auto;background-color: #c27809;"><i
                    class="fa fa-download"></i>Download Due Customers</button>
        </a>
        <a href="customer-stages.html"> <button id="on" type="button" class="btn mjks"
                style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6;"><i class="fa fa-sitemap"
                    aria-hidden="true"></i>Customers stages</button>
        </a>
        <a href=""> <button id="on" type="button" class="btn mjks"
                style="color:#FFFFFF; height:30px; width:auto;background-color: #c27809;"><i class="fa fa-child"
                    aria-hidden="true"></i>Availability</button>
        </a>
        <a href=""> <button id="on" type="button" class="btn mjks"
                style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6;"><i class="fa fa-inbox"
                    aria-hidden="true"></i>Availability Block</button>
        </a>
        <a href=""> <button id="on" type="button" class="btn mjks"
                style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6; margin-top:2px;"><i
                    class="fa fa-check" aria-hidden="true"></i> Approvals</button>
            <a href=""> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6; margin-top:2px;"><i
                        class="fa fa-times-circle" aria-hidden="true"></i> Cancelled Customers</button>
                <a href=""> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6; margin-top:2px;"><i
                            class="fa fa-upload" aria-hidden="true"></i>Uploads Unit Details</button>
                    <a href=""> <button id="on" type="button" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6; margin-top:2px;"><i
                                class="fa fa-child" aria-hidden="true"></i>Availability Customers</button>
                    </a>




    </div> --}}
    <div class="col-md-12" style="margin-top:5px;">
        <div class="panel panel-default">
            <h5 class="panel-title"
                style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                align="center">
                <i class="fa fa-list"></i> &nbsp;Accounts Clearance
            </h5>

        </div>

    </div>

</div>


<!-- START DEFAULT DATATABLE -->
<div class="row">

    <div class="panel panel-default">
        <div class="col-md-12" align="center" style="margin-top: 2vh;">

            <!-- START DEFAULT DATATABLE -->
            <!-- <div class="col-md-1"></div> -->
            <div class="col-md-12" align="center">
                <div class="icon-box-container" style="margin-left: 12%;">

                    <div class="icon-box box-3" style="padding: 1vh;">
                        <a href="{{ route('user_model.initiatesale')}}">
                            <img src="{{ asset('panel/assets/images/cards/13.png') }}" alt="" class="classic-1">
                            <p class="classic">ADD NEW SALE</p>
                        </a>
                    </div>

                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-1" style="padding: 1vh;">
                        <a href="{{ route('user_model.newsale')}}">
                            <img src="{{ asset('panel/assets/images/cards/9.png') }}" alt="" class="classic-1">
                            <p class="classic">NEW SALE CONFIRMED</p>
                        </a>
                    </div>

                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-2">
                        <a href="{{ route('user_model.paymentcollection')}}">
                            <img src="{{ asset('panel/assets/images/cards/7.png') }}" alt="" class="classic-1">
                            <p class="classic">PAYMENT COLLECTION</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-3">
                        <a href="{{ route('user_model.registration')}}">
                            <img src="{{ asset('panel/assets/images/cards/11.png') }}" alt="" class="classic-1">
                            <p class="classic">REQUEST FOR REGISTRATION</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>

                    <div class="icon-box box-1">
                        <a href="{{ route('user_model.account')}}">
                            <img src="{{ asset('panel/assets/images/cards/6.png') }}" alt="" class="classic-1">
                            <p class="classic">ACCOUNTS CLEARANCE</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-2">
                        <a href="{{ route('user_model.legalclearance')}}">
                            <img src="{{ asset('panel/assets/images/cards/4.png') }}" alt="" class="classic-1">
                            <p class="classic">LEGAL CLEARANCE</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-3">
                        <a href="{{ route('user_model.registrationcompleted')}}">
                            <img src="{{ asset('panel/assets/images/cards/8.png') }}" alt="" class="classic-1">
                            <p class="classic">REGISTRATION COMPLETED</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-1">
                        <a href="{{ route('user_model.saledeedscan')}}">
                            <img src="{{ asset('panel/assets/images/cards/12.png') }}" alt="" class="classic-1">
                            <p class="classic">SALEDEED SCAN</p>
                        </a>

                    </div>
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>
                    <div class="icon-box box-2">
                        <a href="{{ route('user_model.handover')}}">
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
                            <th>Customer Name</th>
                            <th>Mobile Number</th>

                            <th>Project Name</th>
                            <th>Sale Value</th>
                            <th>Received</th>
                            <th>Due Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
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

                                <button data-toggle="modal" data-target="#popup1"
                                    style="background-color:blue; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-placement="top" title="Approved"><i
                                        class="fa fa-check" style="margin-left:5px;"></i></button>


                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>



        </div>

    </div>
</div>

</div>



</div>

<!-- PAGE CONTENT WRAPPER -->
<div class="modal" id="popup1" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span
                        class="sr-only">Close</span></button>
                <h4 class="modal-title" id="H4">Verify and Approve</h4>
            </div>


            <div class="modal-body" style="height:30%;padding: 10px;">
                <div class="col-md-12" style="margin-bottom: 2vh;">
                    <input type="checkbox" id="vehicle1" name="vehicle1" value="Bike">
                    <label for="vehicle1"> Delay Charges / Any other charges</label><br>
                    <input type="checkbox" id="vehicle2" name="vehicle2" value="Car">
                    <label for="vehicle2">GST Amount Cleared (For construstion flats)</label><br>
                    <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                    <label for="vehicle3">Challan Amount</label><br>
                    <input type="checkbox" id="vehicle3" name="vehicle3" value="Boat">
                    <label for="vehicle3">Registration Expenses</label><br>


                    <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF;margin-top: 1vh; height:30px;float: right; width:auto;background-color: #006699;">
                        Approve
                    </button>

                </div>

            </div>
            <div class="modal-footer" style="border: none !important; background-color: #FFF !important;">
                <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div>
<!-- MES -->


@stop