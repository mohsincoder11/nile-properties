@extends('panel.layout.header')
@section('main_container')
<style>
    .mjbo {
        outline: 2px solid #08c8ea;
        outline-offset: 2px;
    }

    .mjprofile {
        background: #fff;
        border: 1px solid #ccc;
        border-radius: 20px;
        border-color: rgba(0, 0, 0, .2);
        color: #000;
        -webkit-box-shadow: 0 2px 10px rgba(0, 0, 0, .2);
        box-shadow: 0 2px 10px rgba(0, 0, 0, .2);
    }

    .mjks {
        background-color: #006699;
        color: #FFF !important;
    }

    .mjks:hover {
        background-color: #a8dbee;
        color: #fff !important;
    }

    .tree {
        color: #000000;
    }

    .tree:hover {
        color: #003300;
    }

    .subtree {
        color: #006699;
    }

    .subtree:hover {
        color: #0099cc;
    }

    .subtreeactive {
        color: #006699;
    }

    .mjksactive {
        background-color: #006699;
        color: #000 !important;
    }

    .mjkslink {
        background-color: #ffffff;
        color: white;

    }

    .mjkslink:hover {
        background-color: #006699;

    }
</style>
<div class="page-content-wrap">
    <!-- <div class="page-content-wrap">
                 -->
    <div class="row">

        <div class="col-md-12" style="margin-top:5px;">
            <a href="{{ route('expense.master') }}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #d54e10; "><i
                        class="fa fa-user"></i>Expense Masters</button>
            </a>

            <a href="{{ route('expense.income') }}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #990066;"><i
                        class="fa fa-plus"></i>Income/Billing</button>
            </a>
            <a href="{{ route('expense.entry') }}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #009999;"><i
                        class="fa fa-plus"></i>Expense Entry</button>
            </a>
        </div>
    </div>
    <!-- </div> -->


    <div class="row">
        <div class="col-md-12" style="text-align: center;margin-top: 5px;">
            <h6 class="panel-title"
                style="color:#FFFFFF; background-color:#d54e10; width:100%;height: 50%; font-size:16px;" align="center">
                <i class="fa fa-file-text"><label style="margin: 7px;">Expense Master</label> </i>
            </h6>


        </div>
        <div class="col-md-6" style="margin-top: 2vh;">
            <h3 style="font-weight: bold;">Expense Category</h3>
            <div class="col-md-12" style="margin-top: 2vh;">
                <table width="50%">
                    <tr style="height:30px;">

                        <th width="5%">Add Expense Category</th>

                        <th width="1%"></th>
                    </tr>


                    <tr>


                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </td>

                        <td>
                            <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-floppy-o" aria-hidden="true"></i>
                                Submit</button>
                        </td>
                    </tr>

                </table>
            </div>

            <div class="col-md-12" style="margin-top: 2vh;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Added Expense Category</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Expense 1</td>

                            <td>


                                <button
                                    style="background-color:#0d710d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                <button
                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6" style="margin-top: 2vh;">
            <h3 style="font-weight: bold;">Expense Head</h3>
            <div class="col-md-12" style="margin-top: 2vh;">
                <table width="100%">
                    <tr style="height:30px;">

                        <th width="25%">Select Expense Category</th>

                        <th width="25%" style="padding-left: 1vh;">Add Expense Head</th>

                    </tr>


                    <tr>


                        <td style="padding: 2px;" width="25%">
                            <select class="form-control select" data-live-search="true">
                                <option>Expense 1</option>
                                <option>Expense 2</option>
                                <option>Expense 3</option>

                            </select>
                        </td>
                        <td style="padding: 2px;padding-left: 1vh;" width="25%">
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </td>

                        <td>
                            <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-floppy-o" aria-hidden="true"></i>
                                Submit</button>
                        </td>
                    </tr>

                </table>
            </div>

            <div class="col-md-12" style="margin-top: 2vh;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Selected Expense Category</th>
                            <th>Added Expense Head</th>

                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Expense 1</td>

                            <td>Xerox</td>
                            <td>


                                <button
                                    style="background-color:#0d710d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></button>
                                <button
                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                            </td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

</div>


<!-- START DEFAULT DATATABLE -->


</div>
@stop


@section('js')
@stop