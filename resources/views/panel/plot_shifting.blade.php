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
                style="color:#FFFFFF; background-color:#990066; width:100%;height: 50%; font-size:16px;" align="center">
                <i class="fa fa-file-text"><label style="margin: 7px;">Plot Shifting</label> </i>
            </h6>

        </div>
        <div class="col-md-12" style="margin-top: 5px;">
            <h3>Sale Details</h3>
            <table width="100%">
                <thead>
                    <tr style="height:30px;">
                        <th>Select Project</th>
                        <th>Owner Type</th>
                        <th>Owner Name</th>
                        <th>Facing</th>
                        <th>Floor</th>
                        <th>Unit Size</th>
                        <th>UDS</th>
                        <th>BHK</th>
                    </tr>

                </thead>
                <tbody>

                    <tr width="100%">
                        <td style="padding: 2px;" width="3%">
                            <select class="form-control select" data-live-search="true">
                                <option>Project 1</option>
                                <option>Project 2</option>
                                <option>Project 3</option>

                            </select>
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="4%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="3%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="3%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>

                        <td style="padding: 2px;" width="3%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="3%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="3%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>

                    </tr>
                </tbody>
            </table>




        </div>
        <div class="col-md-12" style="margin-top: 5px;">

            <table width="100%">
                <thead>
                    <tr style="height:30px;">

                        <th>Price per unit</th>
                        <th>No. of car parkings</th>
                        <th>Legal Documents</th>
                        <th>Flat cost</th>
                        <th>Enter GST(%)</th>
                        <th>East facing charge</th>
                        <th>Car Parking</th>

                    </tr>

                </thead>
                <tbody>

                    <tr width="100%">

                        <td style="padding: 2px;" width="5%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="3%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="5%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="5%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </td>

                    </tr>
                </tbody>
            </table>
            <table width="100%">
                <thead>
                    <tr style="height:30px;">

                        <th>Premium</th>
                        <th>Floor Rise</th>
                        <th>Amminities</th>
                        <th>Infra</th>
                        <th>Total</th>
                        <th>GST</th>
                        <th>After GST total</th>
                        <th>Mode of payment</th>
                        <th>Swapping charges</th>
                    </tr>

                </thead>
                <tbody>

                    <tr width="100%">

                        <td style="padding: 2px;" width="5%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="3%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="5%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="5%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <select class="form-control select" data-live-search="true">
                                <option>Bank NEFT/RTGS</option>
                                <option>Online Banking</option>
                                <option>UPI</option>
                                <option>Bank Deposit</option>
                                <option>Cash</option>
                            </select>
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="60%">
                <thead>
                    <tr style="height:30px;">

                        <th>Milestone title</th>
                        <th>Schedule Date</th>
                        <th>Percentage(%)</th>
                        <th></th>
                    </tr>

                </thead>
                <tbody>

                    <tr width="100%">

                        <td style="padding: 2px;" width="5%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="3%"><input type="Date" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="5%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="5%">
                            <a> <button id="on" type="button" class="btn mjks"
                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                                    <i class="fa fa-plus" aria-hidden="true"></i></button></a>
                        </td>
                    </tr>
                </tbody>
            </table>
            <table width="60%" border="1" style="margin-top: 2vh;">
                <tr style="background-color:#f0f0f0; height:30px;">
                    <th width="3%" style="text-align:center">Sr.No</th>
                    <th width="10%" style="text-align:center">Milestone title</th>
                    <th width="10%" style="text-align:center">Schedule Date</th>
                    <th width="10%" style="text-align:center">Percentage(%)</th>
                    <th width="5%" style="text-align:center">Action</th>
                </tr>


                <tr>
                    <td style="padding:5px;" align="center">
                        <label>1</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>Testing</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>1-07-2024</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>8%</label>
                    </td>


                    <td style="text-align:center; color:#FF0000"><button><i class="fa fa-trash-o"></i></button>

                    </td>
                </tr>

            </table>
            <div class="col-md-12" style="margin-top:2vh;margin-bottom: 1vh;" align="right">

                <a> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                        <i class="fa fa-plus" aria-hidden="true"></i>Submit</button></a>

            </div>

        </div>
        <div class="col-md-12" style="margin-top: 5vh;margin-bottom: 5vh;overflow-x: scroll;">
            <table class="table datatable">
                <thead>
                    <tr width="100%">
                        <th>Sr. No.</th>
                        <th>Selected Project</th>
                        <th>Owner Type</th>
                        <th>Owner Name</th>
                        <th>Facing/Floor</th>

                        <th>Unit size</th>
                        <th>UDS</th>
                        <th>BHK</th>
                        <th>Price per unit</th>
                        <th>No of car parkings</th>
                        <th>Legal documents</th>
                        <th>Flat cost</th>
                        <th>Enter GST(%)</th>
                        <th>East facing charge</th>

                        <th>Car parking</th>
                        <th>Premium</th>
                        <th>Floor Rise</th>
                        <th>Amminities</th>
                        <th>Infra</th>
                        <th>Total</th>
                        <th>GST</th>
                        <th>After GST total</th>
                        <th>Mode of payment</th>
                        <th>Swapping charges</th>

                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>NA13724</td>
                        <td>Fred Ludy</td>
                        <td>9579915551</td>

                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            </td<td>
                        </td>
                        <td></td>
                        <td></td>
                        <td></td>
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
        <div class="col-md-12">
            <img src="{{ asset('/panel/img/line.png') }}" width="100%" />
        </div>

    </div>


</div>
@stop
@section('js')
@stop
