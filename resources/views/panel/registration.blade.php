@extends('panel.layout.header')

@section('main_container')




<!-- START DEFAULT DATATABLE -->
<div class="row">

    <div class="panel panel-default">

        <h5 class="panel-title"
            style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;" align="center">
            <i class="fa fa-classic"></i> &nbsp;Request For Registration
        </h5>
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
