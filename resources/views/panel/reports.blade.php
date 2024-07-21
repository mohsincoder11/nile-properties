@extends('panel.layout.header')

@section('main_container')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12" style="text-align: center;margin-top: 5px;">

            <a href="#"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #0c82c6;"><i
                        class="fa fa-plus"></i>Add New Sale</button>
            </a>
            <a href=""> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #c27809;"><i
                        class="fa fa-line-chart" aria-hidden="true"></i>Sales Summary
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
                                    class="fa fa-child" aria-hidden="true"></i>Availability
                                Customers</button>
                        </a>




        </div>
        <div class="col-md-12" style="margin-top:5px;">
            <div class="panel panel-default">
                <h5 class="panel-title"
                    style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                    align="center">
                    <i class="fa fa-file-text"></i> &nbsp;Reports
                </h5>



            </div>

        </div>

    </div>
</div>

@stop