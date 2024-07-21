@extends('panel.layout.header')

@section('main_container')


<div class="page-content-wrap">


    <div class="row">
        <div class="col-md-12" style="margin-top:5px;">
            <a href="{{ route('plot.transfer') }}">
                <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #d54e10; ">
                    <i class="fa fa-user"></i> Plot Transfer
                </button>
            </a>
            <a href="{{ route('plot.shifting') }}">
                <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #990066;">
                    <i class="fa fa-plus"></i> Plot Shifting
                </button>
            </a>
            <a href="{{ route('plot.edit.sale') }}">
                <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #009999;">
                    <i class="fa fa-plus"></i> Edit Sale
                </button>
            </a>
            <a href="{{ route('plot.edit.bank.details') }}">
                <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #731ca5;">
                    <i class="fa fa-plus"></i> Edit Bank Loan Details
                </button>
            </a>
        </div>
        <div class="col-md-12" style="text-align: center;margin-top: 5px;">
            <h6 class="panel-title"
                style="color:#FFFFFF; background-color:#731ca5; width:100%;height: 50%; font-size:16px;" align="center">
                <i class="fa fa-edit"><label style="margin: 7px;">Edit Bank Loan Details</label> </i>
            </h6>

        </div>
        <div class="col-md-12" style="margin-top: 5px;">

            <table width="100%">
                <thead>
                    <tr style="height:30px;">
                        <th>Loan Sanction Amount</th>
                        <th>Loan Amount</th>
                        <th>Loan Status</th>
                        <th>Loan Sanction Date</th>
                        <th>Bank Name</th>
                        <th>Loan File No</th>
                        <th>AOS Status</th>

                    </tr>

                </thead>
                <tbody>

                    <tr width="100%">
                        <td style="padding: 2px;" width="4%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="3%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="3%">
                            <select class="form-control select" data-live-search="true">
                                <option></option>
                                <option></option>
                                <option></option>

                            </select>
                        </td>
                        <td style="padding: 2px;" width="3%"><input type="date" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="5%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>

                        <td style="padding: 2px;" width="3%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="3%">
                            <select class="form-control select" data-live-search="true">
                                <option></option>
                                <option></option>
                                <option></option>

                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>




        </div>
        <div class="col-md-12" style="margin-top: 5px;">


            <div class="col-md-12" style="margin-top:2vh;margin-bottom: 1vh;" align="right">

                <a> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                        <i class="fa fa-plus" aria-hidden="true"></i>Submit</button></a>

            </div>

        </div>

    </div>


</div>
@stop
@section('js')
@stop
