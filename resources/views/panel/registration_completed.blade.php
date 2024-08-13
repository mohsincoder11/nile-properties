@extends('panel.layout.header')

@section('main_container')

<div class="page-content-wrap">
    <div class="row">
        <!-- <div class="col-md-12" style="text-align: center;margin-top: 5px;">

                        <a href=""> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6;"><i
                                    class="fa fa-plus"></i>Add New Sale</button>
                        </a>
                        <a href=""> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #c27809;"><i
                                    class="fa fa-line-chart" aria-hidden="true"></i>Sales Summary
                            </button>
                        </a>

                    <a href=""> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6;"><i
                                    class="fa fa-upload" aria-hidden="true"></i>Upload Demand Letter</button>
                        </a>
                        <a href=""> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #c27809;"><i
                                    class="fa fa-download" aria-hidden="true"></i>Amounts Recived</button>
                        </a>

                        <a href=""> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6;"><i
                                    class="fa fa-search" aria-hidden="true"></i>Due Customers</button>
                        </a>
                        <a href=""> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #c27809;"><i
                                    class="fa fa-download"></i>Download Due Customers</button>
                        </a>
                        <a href="#"> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6;"><i
                                    class="fa fa-sitemap" aria-hidden="true"></i>Customers stages</button>
                        </a>
                        <a href=""> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #c27809;"><i
                                    class="fa fa-child" aria-hidden="true"></i>Availability</button>
                        </a>
                        <a href=""> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6;"><i class="fa fa-inbox" aria-hidden="true"></i>Availability Block</button>
                        </a>
                        <a href=""> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6; margin-top:2px;"><i
                                    class="fa fa-check" aria-hidden="true"></i> Approvals</button>
                            <a href=""> <button id="on" type="button" class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6; margin-top:2px;"><i class="fa fa-times-circle" aria-hidden="true"></i> Cancelled Customers</button>
                                <a href=""> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6; margin-top:2px;"><i
                                            class="fa fa-upload" aria-hidden="true"></i>Uploads Unit Details</button>
                                    <a href=""> <button id="on" type="button" class="btn mjks"
                                            style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6; margin-top:2px;"><i
                                                class="fa fa-child" aria-hidden="true"></i>Availability Customers</button>
                                    </a>




                    </div> -->
        <div class="col-md-12" style="margin-top:5px;">
            <div class="panel panel-default">
                <h5 class="panel-title"
                    style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                    align="center">
                    <i class="fa fa-list"></i> &nbsp;Registration Completed
                </h5>

            </div>

        </div>

    </div>
</div>

<!-- START DEFAULT DATATABLE -->
<div class="row">

    <div class="panel panel-default">
        @include('panel.plot-sale-header')

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
                            <th>Registered Date</th>
                            <th></th>
                            <th>Upload Registration Receipt</th>

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
                                <div class="input-group">
                                    <input type="hidden" id="dp-3" class="form-control datepicker" value="01-05-2020"
                                        data-date="01-05-2020" data-date-format="dd-mm-yyyy"
                                        data-date-viewmode="years" />
                                </div>

                                <div class="input-group">
                                    <input type="text" id="dp-3" class="form-control " value="10-10-2020"
                                        data-date="01-05-2020" data-date-format="dd-mm-yyyy"
                                        data-date-viewmode="years" />
                                    <span class="input-group-addon"><span
                                            class="glyphicon glyphicon-calendar"></span></span>
                                </div>
                                <!-- <i class="fa fa-check" style="margin-left:5px;"></i> -->
                            </td>
                            <td>
                                <button
                                    style="background-color:green; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-placement="top" title="Approve"><i
                                        class="fa fa-check" style="margin-left:5px;"></i></button>
                            </td>
                            <td>

                                <input type="file" class="form-control" name="name" placeholder="" />
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