@extends('panel.layout.header')

@section('main_container')
<div class="page-content-wrap">
    <div class="row">

        <div class="col-md-12" style="margin-top:5px;">
            <div class="panel panel-default">
                <h5 class="panel-title"
                    style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                    align="center">
                    <i class="fa fa-list"></i> &nbsp;Legal Clearance
                </h5>


            </div>

        </div>

    </div>
</div>

<!-- START DEFAULT DATATABLE -->
<div class="row">

    <div class="panel panel-default">
        @include('panel.plot-sale-header')

    </div>

    <div class="col-md-1"></div>

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
                    <th></th>

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
                                data-date="01-05-2020" data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                        </div>

                        <div class="input-group">
                            <input type="text" id="dp-3" class="form-control " value="10-10-2020" data-date="01-05-2020"
                                data-date-format="dd-mm-yyyy" data-date-viewmode="years" />
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                        <!-- <i class="fa fa-check" style="margin-left:5px;"></i> -->
                    </td>

                    <td>
                        <button
                            style="background-color:green; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                            type="button" class="btn btn-info" data-placement="top" title="Approve"><i
                                class="fa fa-check" style="margin-left:5px;"></i></button>
                        <button
                            style="background-color:green; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                            type="button" class="btn btn-info" data-placement="top" title="View"><i class="fa fa-eye"
                                style="margin-left:5px;"></i></button>
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