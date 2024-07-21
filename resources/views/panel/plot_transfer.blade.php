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
                style="color:#FFFFFF; background-color:#006699; width:100%;height: 50%; font-size:16px;" align="center">
                <i class="fa fa-file-text"><label style="margin: 7px;">Plot Transfer</label> </i>
            </h6>

        </div>
        <div class="col-md-12" style="margin-top: 5px;">
            <h3>Basic Details</h3>
            <table width="100%">
                <thead>
                    <tr style="height:30px;">
                        <th>Application Number</th>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Alternate Number</th>
                        <th>Upload Photo</th>
                        <th>DOB</th>
                        <th>City</th>
                    </tr>

                </thead>
                <tbody>

                    <tr width="100%">
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="name" placeholder="" />
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

                        <td style="padding: 2px;" width="3%"><input type="file" class="form-control" name="name"
                                placeholder="" /></td>
                        <td style="padding: 2px;" width="3%"><input type="date" class="form-control" name="name"
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

                        <th>Address</th>
                        <th>Nationality</th>
                        <th>State</th>
                        <th>Company Name</th>
                        <th>Pincode</th>
                        <th>Ownership change changes</th>
                        <th>Designation</th>

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


            <div class="col-md-12" style="margin-top:2vh;margin-bottom: 1vh;" align="right">

                <a> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                        <i class="fa fa-plus" aria-hidden="true"></i>Submit</button></a>

            </div>

        </div>
        <div class="col-md-12" style="margin-top: 5vh;margin-bottom: 5vh;">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Application Number</th>
                        <th>Full Name/DOB</th>
                        <th>Mobile Number/Alternate Number</th>

                        <th>Photo</th>

                        <th>City/Address/Pincode</th>

                        <th>Nationality/State</th>
                        <th>Company Name</th>

                        <th>Ownership change changes</th>
                        <th>Designation</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>NA13724</td>
                        <td>Fred Ludy</td>
                        <td>000 000 0000/000 000 0000</td>

                        <td> <img src="{{asset('panel/img/png.png')}}" width="20" height="20" /></td>
                        <td></td>
                        <td></td>
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
        <div class="col-md-12" style="margin-top:2vh;">

            <label style="font-weight: bold;font-size: large;color: #009919;">Personal Details</label>


            <table width="100%">
                <tr style="height:30px;">
                    <th width="5%">Spouse Name</th>
                    <th width="5%">Spouse Mobile</th>
                    <th width="5%">Anniversary</th>

                    <th width="5%">Father Name</th>
                    <th width="5%">Mother Name</th>
                    <th width="5%">Nominee</th>
                    <th width="5%">Nominee Mobile</th>

                </tr>


                <tr>
                    <td style="padding: 2px;" width="5%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>

                    <td style="padding: 2px;" width="2%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>

                </tr>

            </table>

        </div>

        <div class="col-md-12" style="margin-top:2vh;margin-bottom: 1vh;" align="right">

            <a> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                    <i class="fa fa-plus" aria-hidden="true"></i>Submit</button></a>

        </div>
        <div class="col-md-12" style="margin-top: 5vh;margin-bottom: 5vh;">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Spouse Name</th>
                        <th>Spouse Mobile</th>
                        <th>Anniversary</th>
                        <th>Father Name</th>
                        <th>Mother Name</th>
                        <th>Nominee</th>
                        <th>Nominee Mobile</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>10-12-2023</td>
                        <td>Alicia</td>
                        <td></td>
                        <td></td>
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
    </div>


</div>

</div>


<!-- START DEFAULT DATATABLE -->


</div>


@stop
@section('js')
@stop
