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
                style="color:#FFFFFF; background-color:#009999; width:100%;height: 50%; font-size:16px;" align="center">
                <i class="fa fa-edit"><label style="margin: 7px;">Edit Sale</label> </i>
            </h6>

        </div>
        <div class="col-md-12" style="margin-top: 5px;">
            <h3>Sale Details</h3>
            <table width="100%">
                <thead>
                    <tr style="height:30px;">
                        <th>Select Project</th>
                        <th></th>
                        <th></th>
                        <th>Unit Size</th>
                        <th>Price per unit</th>
                        <th>Flat cost</th>
                        <th>Amenities</th>
                        <th>GST</th>
                        <th>After GST Total</th>
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
                            <select class="form-control select" data-live-search="true">
                                <option></option>
                                <option></option>
                                <option></option>

                            </select>
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <select class="form-control select" data-live-search="true">
                                <option></option>
                                <option></option>
                                <option></option>

                            </select>
                        </td>
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
                        <td style="padding: 2px;" width="3%"><input type="text" class="form-control" name="name"
                                placeholder="" /></td>
                    </tr>
                </tbody>
            </table>




        </div>
        <div class="col-md-12" style="margin-top: 5px;">

            <!-- <table width="100%">
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

                                    <td style="padding: 2px;" width="5%"><input type="text" class="form-control"
                                            name="name" placeholder="" /></td>
                                    <td style="padding: 2px;" width="3%"><input type="text" class="form-control"
                                            name="name" placeholder="" /></td>
                                    <td style="padding: 2px;" width="5%"><input type="text" class="form-control"
                                            name="name" placeholder="" /></td>
                                    <td style="padding: 2px;" width="5%"><input type="text" class="form-control"
                                            name="name" placeholder="" /></td>
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
                        </table> -->
            <!-- <table width="100%">
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

                                    <td style="padding: 2px;" width="5%"><input type="text" class="form-control"
                                            name="name" placeholder="" /></td>
                                    <td style="padding: 2px;" width="3%"><input type="text" class="form-control"
                                            name="name" placeholder="" /></td>
                                    <td style="padding: 2px;" width="5%"><input type="text" class="form-control"
                                            name="name" placeholder="" /></td>
                                    <td style="padding: 2px;" width="5%"><input type="text" class="form-control"
                                            name="name" placeholder="" /></td>
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

                                    <td style="padding: 2px;" width="5%"><input type="text" class="form-control"
                                            name="name" placeholder="" /></td>
                                    <td style="padding: 2px;" width="3%"><input type="Date" class="form-control"
                                            name="name" placeholder="" /></td>
                                    <td style="padding: 2px;" width="5%"><input type="text" class="form-control"
                                            name="name" placeholder="" /></td>
                                    <td style="padding: 2px;" width="5%">
                                        <a> <button id="on" type="button" class="btn mjks"
                                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                                                <i class="fa fa-plus" aria-hidden="true"></i></button></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table> -->
            <div class="col-md-12">
                <img src="{{ asset('/panel/img/line.png') }}" width="100%" />
            </div>
            <h3>Dynamic Payment Details</h3>
            <table width="100%" border="1" style="margin-top: 2vh;">
                <tr style="background-color:#f0f0f0; height:30px;">
                    <th width="10%" style="text-align:center">Milestone Title</th>

                    <th width="10%" style="text-align:center">Schedule Date</th>
                    <th width="10%" style="text-align:center">Percentage(%)</th>
                    <th width="5%" style="text-align:center"><button><i class="fa fa-plus"></i></button></th>
                </tr>


                <tr>
                    <td style="padding:5px;" align="center">
                        <label>Booking Advance</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>1-07-2024</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>15%</label>
                    </td>
                    <td style="text-align:center; color:#FF0000"><button><i class="fa fa-minus"></i></button>

                    </td>
                </tr>
                <tr>
                    <td style="padding:5px;" align="center">
                        <label>Agreement Time</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>1-07-2024</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>15%</label>
                    </td>
                    <td style="text-align:center; color:#FF0000"><button><i class="fa fa-minus"></i></button>

                    </td>
                </tr>
                <tr>
                    <td style="padding:5px;" align="center">
                        <label>Footing Time</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>1-07-2024</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>15%</label>
                    </td>
                    <td style="text-align:center; color:#FF0000"><button><i class="fa fa-minus"></i></button>

                    </td>
                </tr>
                <tr>
                    <td style="padding:5px;" align="center">
                        <label>Cellar Slab</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>1-07-2024</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>15%</label>
                    </td>
                    <td style="text-align:center; color:#FF0000"><button><i class="fa fa-minus"></i></button>

                    </td>
                </tr>
                <tr>
                    <td style="padding:5px;" align="center">
                        <label>First Floor Slab</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>1-07-2024</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>15%</label>
                    </td>
                    <td style="text-align:center; color:#FF0000"><button><i class="fa fa-minus"></i></button>

                    </td>
                </tr>
                <tr>
                    <td style="padding:5px;" align="center">
                        <label>Second Floor Slab</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>1-07-2024</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>15%</label>
                    </td>
                    <td style="text-align:center; color:#FF0000"><button><i class="fa fa-minus"></i></button>

                    </td>
                </tr>
                <tr>
                    <td style="padding:5px;" align="center">
                        <label>Third Floor Slab</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>1-07-2024</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>15%</label>
                    </td>
                    <td style="text-align:center; color:#FF0000"><button><i class="fa fa-minus"></i></button>

                    </td>
                </tr>
                <tr>
                    <td style="padding:5px;" align="center">
                        <label>Fourth Floor Slab</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>1-07-2024</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>15%</label>
                    </td>
                    <td style="text-align:center; color:#FF0000"><button><i class="fa fa-minus"></i></button>

                    </td>
                </tr>
                <tr>
                    <td style="padding:5px;" align="center">
                        <label>Fifth Floor Slab</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>1-07-2024</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>15%</label>
                    </td>
                    <td style="text-align:center; color:#FF0000"><button><i class="fa fa-minus"></i></button>

                    </td>
                </tr>
                <tr>
                    <td style="padding:5px;" align="center">
                        <label>Flooring & Painting</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>1-07-2024</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>15%</label>
                    </td>
                    <td style="text-align:center; color:#FF0000"><button><i class="fa fa-minus"></i></button>

                    </td>
                </tr>
                <tr>
                    <td style="padding:5px;" align="center">
                        <label>Possession & Registration</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>1-07-2024</label>
                    </td>
                    <td style="padding:5px;" align="center">
                        <label>15%</label>
                    </td>
                    <td style="text-align:center; color:#FF0000"><button><i class="fa fa-minus"></i></button>

                    </td>
                </tr>
            </table>
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
