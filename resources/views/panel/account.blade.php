@extends('panel.layout.header')

@section('main_container')




<!-- START DEFAULT DATATABLE -->
<div class="row">

    <div class="panel panel-default">
        <h5 class="panel-title"
            style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;" align="center">
            <i class="fa fa-classic"></i> &nbsp; Accounts Clearance
        </h5>
        <div class="col-md-12" align="center" style="margin-top: 2vh;">

            <!-- START DEFAULT DATATABLE -->
            <!-- <div class="col-md-1"></div> -->
            @include('panel.plot-sale-header')



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
