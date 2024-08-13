@extends('panel.layout.header')

@section('main_container')

<div class="page-content-wrap">

    <div class="col-md-12" style="margin-top:5px;">
        <div class="panel panel-default">
            <h5 class="panel-title"
                style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                align="center">
                <i class="fa fa-list"></i> &nbsp;Handover Completed
            </h5>



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

                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
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
                                            vb
                                        </td>


                                    </tr>
                                -->
                    </tbody>
                </table>
            </div>



        </div>

    </div>
</div>



@stop