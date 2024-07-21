@extends('panel.layout.header')

@section('main_container')



<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12" style="margin-top: 1px">
            <div class="panel panel-default">
                <h5 class="panel-title" style="
                    color: #ffffff;
                    background-color: #006699;
                    width: 100%;
                    font-size: 14px;
                    margin-top: 1vh;
                  " align="center">
                    <i class="fa fa-navicon"></i> &nbsp;Commision Plan
                </h5>
            </div>
        </div>
    </div>
</div>

<!-- START DEFAULT DATATABLE -->
<div class="row">
    <div class="col-md-12" align="center" style="margin-top: 1px">
        <!-- START DEFAULT DATATABLE -->

        <div class="col-md-12">
            <table width="100%">
                <tr style="height: 30px">
                    <th width="3%">Profile Name</th>
                    <th width="3%">Monthly Target From(INR)</th>
                    <th width="3%">Monthly Target To(INR)</th>
                    <th width="3%">Regular Benefit(%)</th>
                    <th width="3%">Referral(%)</th>
                    <th></th>
                </tr>

                <tr>
                    <td style="padding: 2px" width="1%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>
                    <td style="padding: 2px" width="1%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>
                    <td style="padding: 2px" width="1%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>
                    <td style="padding: 2px" width="1%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>
                    <td style="padding: 2px" width="1%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>
                    <td style="padding: 2px" width="5%">
                        <button id="on" type="button" class="btn mjks" style="
                        color: #ffffff;
                        height: 30px;
                        width: auto;
                        background-color: #006699;
                      ">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add
                        </button>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-top: 5px">
            <!-- START DEFAULT DATATABLE -->
            <table width="100%" border="1" style="margin-top: 5px">
                <tr style="background-color: #f0f0f0; height: 30px">
                    <th width="3%" style="text-align: center">Sr.No</th>
                    <th width="10%" style="text-align: center">Profile</th>
                    <th width="5%" style="text-align: center">
                        Target (Monthly)
                    </th>
                    <th width="10%" style="text-align: center">
                        Regular Percentages(%)
                    </th>

                    <th width="5%" style="text-align: center">
                        Referral Percentages(%)
                    </th>
                </tr>

                <tr>
                    <td style="padding: 5px" align="center">
                        <label>1</label>
                    </td>
                    <td style="padding: 5px" align="center">
                        Assistant Sales Executive
                    </td>
                    <td style="padding: 5px" align="center">1 Lac to 4 Lac</td>
                    <td style="padding: 5px" align="center">5</td>

                    <td style="padding: 5px" align="center">0</td>
                </tr>
                <tr>
                    <td style="padding: 5px" align="center">
                        <label>2</label>
                    </td>
                    <td style="padding: 5px" align="center">Sales Executive</td>
                    <td style="padding: 5px" align="center">4 Lac to 7 Lac</td>
                    <td style="padding: 5px" align="center">7</td>

                    <td style="padding: 5px" align="center">0</td>
                </tr>
                <tr>
                    <td style="padding: 5px" align="center">
                        <label>3</label>
                    </td>
                    <td style="padding: 5px" align="center">
                        Senior Sales Executive
                    </td>
                    <td style="padding: 5px" align="center">7 Lac to 10 Lac</td>
                    <td style="padding: 5px" align="center">9</td>

                    <td style="padding: 5px" align="center">0</td>
                </tr>
                <tr>
                    <td style="padding: 5px" align="center">
                        <label>4</label>
                    </td>
                    <td style="padding: 5px" align="center">
                        Sale Representative
                    </td>
                    <td style="padding: 5px" align="center">10 Lac to 20 Lac</td>
                    <td style="padding: 5px" align="center">11</td>

                    <td style="padding: 5px" align="center">0</td>
                </tr>
                <tr>
                    <td style="padding: 5px" align="center">
                        <label>5</label>
                    </td>
                    <td style="padding: 5px" align="center">
                        Assistant Sale Representative
                    </td>
                    <td style="padding: 5px" align="center">20 Lac to 40 Lac</td>
                    <td style="padding: 5px" align="center">13</td>

                    <td style="padding: 5px" align="center">0</td>
                </tr>
                <tr>
                    <td style="padding: 5px" align="center">
                        <label>6</label>
                    </td>
                    <td style="padding: 5px" align="center">
                        Senior Sale Representative
                    </td>
                    <td style="padding: 5px" align="center">40 Lac to 70 Lac</td>
                    <td style="padding: 5px" align="center">15</td>

                    <td style="padding: 5px" align="center">0</td>
                </tr>
                <tr>
                    <td style="padding: 5px" align="center">
                        <label>7</label>
                    </td>
                    <td style="padding: 5px" align="center">Assistant Manager</td>
                    <td style="padding: 5px" align="center">70 Lac to 1 Cr</td>
                    <td style="padding: 5px" align="center">16</td>

                    <td style="padding: 5px" align="center">0</td>
                </tr>
                <tr>
                    <td style="padding: 5px" align="center">
                        <label>8</label>
                    </td>
                    <td style="padding: 5px" align="center">Manager</td>
                    <td style="padding: 5px" align="center">1 Cr to 2 Cr</td>
                    <td style="padding: 5px" align="center">17</td>

                    <td style="padding: 5px" align="center">0</td>
                </tr>
                <tr>
                    <td style="padding: 5px" align="center">
                        <label>9</label>
                    </td>
                    <td style="padding: 5px" align="center">Senior Manager</td>
                    <td style="padding: 5px" align="center">2 Cr to 4 Cr</td>
                    <td style="padding: 5px" align="center">18</td>

                    <td style="padding: 5px" align="center">0</td>
                </tr>
                <tr>
                    <td style="padding: 5px" align="center">
                        <label>10</label>
                    </td>
                    <td style="padding: 5px" align="center">Director</td>
                    <td style="padding: 5px" align="center">4 Cr to 6 Cr</td>
                    <td style="padding: 5px" align="center">19</td>

                    <td style="padding: 5px" align="center">0</td>
                </tr>
                <tr>
                    <td style="padding: 5px" align="center">
                        <label>11</label>
                    </td>
                    <td style="padding: 5px" align="center">King</td>
                    <td style="padding: 5px" align="center">6 Cr to 8 Cr</td>
                    <td style="padding: 5px" align="center">20</td>

                    <td style="padding: 5px" align="center">0</td>
                </tr>
            </table>

            <!-- END DEFAULT DATATABLE -->
        </div>
    </div>
</div>
@stop
@section('js')
@stop