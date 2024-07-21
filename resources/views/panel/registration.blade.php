@extends('panel.layout.header')

@section('main_container')

<div class="page-content-wrap">
    <div class="row">

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
        <a href="#"> <button id="on" type="button" class="btn mjks"
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




    </div>
    <div class="col-md-12" style="margin-top:5px;">
        <div class="panel panel-default">
            <h5 class="panel-title"
                style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                align="center">
                <i class="fa fa-list"></i> &nbsp;Registration Checklist
            </h5>

        </div>

    </div>

</div>


<!-- START DEFAULT DATATABLE -->
<div class="row">

    <div class="panel panel-default">
        <div class="col-md-12" align="center">

            <!-- START DEFAULT DATATABLE -->
            <div class="col-md-12" align="center">
                <div class="icon-box-container" style="margin-left: 12%;">

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
                    <div style="margin-top: 10vh;font-size: large;">
                        <i class="fa fa-angle-double-right" aria-hidden="true"></i>
                    </div>

                    <div class="icon-box box-1">
                        <a href="{{ route('account')}}">
                            <img src="{{ asset('panel/assets/images/cards/6.png') }}" alt="" class="classic-1">
                            <p class="classic">ACCOUNTS CLEARANCE</p>
                        </a>

                    </div>
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
                            <th>Customer Name</th>
                            <th>Mobile Number</th>
                            <th>UIN Number</th>

                            <th>Project Name</th>
                            <th>Unit Number</th>
                            <th>Checklist</th>
                            <th>Collected</th>
                            <th>Due Checklist</th>

                            <th>View</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Sharique Sheikh</td>
                            <td>9579915551 </td>
                            <td>STP/1/2024/14564</td>

                            <td>Sheikh Properties</td>
                            <td>145</td>
                            <td>20</td>
                            <td>
                                0
                            </td>
                            <td>
                                0
                            </td>

                            <td>

                                <button
                                    style="background-color:green; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-placement="top" title="View"><i
                                        class="fa fa-eye" style="margin-left:5px;"></i></button>
                                <button
                                    style="background-color:blue; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-placement="top" title="Check"><i
                                        class="fa fa-check" style="margin-left:5px;"></i></button>


                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Sharique Sheikh</td>
                            <td>9579915551 </td>
                            <td>STP/1/2024/14564</td>

                            <td>Sheikh Properties</td>
                            <td>145</td>
                            <td>20</td>
                            <td>
                                0
                            </td>
                            <td>
                                0
                            </td>

                            <td>

                                <button
                                    style="background-color:green; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-placement="top" title="View"><i
                                        class="fa fa-eye" style="margin-left:5px;"></i></button>
                                <button
                                    style="background-color:blue; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-placement="top" title="Check"><i
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
@stop