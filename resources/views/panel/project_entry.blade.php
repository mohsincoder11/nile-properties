@extends('panel.layout.header')

@section('main_container')
    <!-- END X-NAVIGATION -->

    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <div class="panel-body" style="padding:1px 5px 2px 5px;">

                    <div class="col-md-12" style="margin-top:5px;">
                        <label
                            style="color:#000; background-color:#FFCC00; width:7%; height:25px; padding-top:5px;margin-top: 1vh;"
                            align="center"><span class=""></span> <strong>Project Entry</strong></label>

                        <a href="{{ route('project.index') }}"> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #990066;"><i
                                    class="fa fa-plus"></i>Project Entry</button>
                        </a>
                        <a href="{{ route('project.addedProjectEntry') }}"> <button id="on" type="button"
                                class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #009999;"><i
                                    class="fa fa-plus"></i>Added Project Entry</button>
                        </a>


                        {{-- bulck upload --}}
                        {{-- <form action="{{ route('bulkploat') }}" method="post" style="float:right; display:flex;"
                        enctype="multipart/form-data">

                        @csrf
                        <div style="display: flex; gap: 2px; align-items: center;">

                            <label style="font-weight: bold; font-size: large; color: #009919;">Plot Entry</label>
                            <div style="padding: 2px;" width="5%">
                                <select class="form-control select" data-live-search="true" name="project_entry_id">
                                    @foreach ($project as $projects)
                                    <option value="{{ $projects->id }}">{{ $projects->project_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <input type="file" name="file" id="" style="width: 80px;" class="" required>

                            <button id="on" type="submit" class="btn mjks"
                                style="color: #FFFFFF; margin-left:5px; height: 30px; width: auto; background-color: #009919;">
                                <i class="fa fa-upload" aria-hidden="true"></i>Bulk Import
                            </button>

                            <a href="{{ asset('bulkupload/plot_entry.xlsx') }}">
                                <button id="on" type="button" class="btn mjks"
                                    style="color: #FFFFFF; height: 30px; width: auto; background-color: #173b9f;">
                                    <i class="fa fa-file" aria-hidden="true"></i>Sample
                                </button>
                            </a>
                        </div>
                    </form> --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif --}}
        <div class="row">
            <div class="col-md-12" style="text-align: center;margin-top: 5px;">
                <h6 class="panel-title"
                    style="color:#FFFFFF; background-color:#006699; width:100%;height: 50%; font-size:16px;" align="center">
                    <i class="fa fa-file-text"><label style="margin: 7px;">Project Entry</label> </i>
                </h6>
                <!-- <a href="project_entry.html"> <button id="on" type="button" class="btn mjks"
                                                                                                                                                                            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                                                                                                                                                                class="fa fa-plus"></i>Project Entry</button>
                                                                                                                                                                    </a> -->

            </div>
            <form method="post" action="{{ route('project.store') }}" enctype="multipart/form-data">
                <div class="col-md-12" style="margin-top: 5px;">
                    @csrf
                    <table width="100%">
                        <thead>
                            <tr style="height:30px;">
                                <th>Select Branch</th>
                                <th>Select Firm</th>
                                <th>Project Code</th>
                                <th>Project Name</th>
                                <th>Mobile Number</th>
                                <th>WhatsApp Number</th>
                                <th>Email</th>
                                <th>Mauja</th>
                                <th>Kh No.</th>



                            </tr>

                        </thead>
                        <tbody>

                            <tr width="100%">
                                <td style="padding: 2px;" width="3%">
                                    <select class="form-control select" name="city_id" data-live-search="true">
                                        @foreach ($cities as $city)
                                            <option value="{{ $city->id }}">{{ $city->city }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="padding: 2px;" width="3%">
                                    <select class="form-control select" name="firm_id" data-live-search="true">
                                        @foreach ($firm as $city)
                                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <td style="padding: 2px;" width="3%">
                                    <input type="text" class="form-control" name="project_code" placeholder=""
                                        required />
                                </td>
                                <td style="padding: 2px;" width="4%"><input type="text" class="form-control"
                                        name="project_name" placeholder="" required /></td>
                                <td style="padding: 2px;" width="3%"><input type="text" class="form-control"
                                        name="mobile_number" placeholder="" maxlength="10" required /></td>
                                <td style="padding: 2px;" width="3%"><input type="text" class="form-control"
                                        name="whatsapp_number" maxlength="10" placeholder="" required /></td>

                                <td style="padding: 2px;" width="3%"><input type="email" class="form-control"
                                        name="email" placeholder="" required /></td>
                                <td style="padding: 2px;" width="3%"><input type="text" class="form-control"
                                        name="mauja" placeholder="" required /></td>
                                <td style="padding: 2px;" width="3%"><input type="text" class="form-control"
                                        name="kh_no" placeholder="" required /></td>

                            </tr>
                        </tbody>
                    </table>




                </div>
                <div class="col-md-12" style="margin-top: 5px;">

                    <table width="100%">
                        <thead>
                            <tr style="height:30px;">

                                <th>P.H.N</th>
                                <th>Taluka</th>
                                <th>District</th>
                                <th>No. of Plots</th>
                                <th>Area (Sq. Ft) </th>
                                <th>Area (Sq. Mt) </th>
                                <th>Embedded Map </th>
                                {{-- <th>Sale Status</th> --}}
                                <!-- <th>Layout Description</th> -->
                                <th>Area Plottable (Sq. Ft)</th>
                                <th>Amenities (Sq. Ft)</th>
                                <th>Open Space (Sq. Ft)</th>

                            </tr>

                        </thead>
                        <tbody>

                            <tr width="100%">

                                <td style="padding: 2px;" width="3%"><input type="text" class="form-control"
                                        name="phn" placeholder="" required /></td>
                                <td style="padding: 2px;" width="5%"><input type="text" class="form-control"
                                        name="taluka" placeholder="" required /></td>
                                <td style="padding: 2px;" width="3%"><input type="text" class="form-control"
                                        name="district" placeholder="" required /></td>
                                <td style="padding: 2px;" width="3%"><input type="text" class="form-control"
                                        id="no_of_plots" name="no_of_plots" placeholder="" required /></td>
                                <td style="padd   ing: 2px;" width="3%">
                                    <input type="text" class="form-control" id="areasqrft_manual"
                                        name="areasqrft_manual" placeholder="" required />
                                </td>
                                <td style="padding: 2px;" width="3%">
                                    <input type="text" class="form-control" id="areasqrmt_manual"
                                        name="areasqrmt_manual" placeholder="" required />
                                </td>
                                <td style="padding: 2px;" width="3%">
                                    <input type="text" class="form-control" name="embedded_map" placeholder=""
                                        required />
                                </td>
                                {{-- <td style="padding: 2px;" width="5%">
                                <select class="form-control select" data-live-search="true" name="sale_status_id">
                                    @foreach ($status as $status)
                                    <option value="{{ $status->id }}">{{ $status->plot_sale_status }}</option>
                                    @endforeach
                                </select>
                            </td> --}}
                                <!-- <td style="padding: 2px;"width="7%">
                                                                                                                                                                                <textarea rows="1" cols="10" class="form-control"></textarea></td> -->
                                <td style="padding: 2px;" width="5%">
                                    <input type="text" class="form-control" name="area_plottable" placeholder=""
                                        required />
                                </td>
                                <td style="padding: 2px;" width="3%">
                                    <input type="text" class="form-control" name="amenities" placeholder=""
                                        required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="text" class="form-control" name="open_space" placeholder=""
                                        required />
                                </td>
                            </tr>
                        </tbody>
                    </table>




                </div>
                <div class="col-md-12" style="margin-top: 5px;">

                    <table width="100%">
                        <thead>
                            <tr style="height:30px;">
                                <th>Dev.Charge (₹)</th>
                                <th>Other Charges(%)</th>
                                <th>Site Map</th>
                                <th>Brochure</th>
                                <th>Schedule Payment</th>
                                <th>Youtube URL</th>
                                <th>Status</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr width="100%">
                                <td style="padding: 2px;" width="3%">
                                    <input type="text" class="form-control" name="dev_charge" placeholder=""
                                        required />
                                </td>
                                <td style="padding: 2px;" width="3%">
                                    <input type="text" class="form-control" name="other_charges_percentage"
                                        placeholder="" required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="file" class="form-control" name="site_map" placeholder=""
                                        required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="file" class="form-control" name="brochure" placeholder=""
                                        required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="file" class="form-control" name="schedule_payment" placeholder=""
                                        required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="text" class="form-control" name="youtube_url" placeholder=""
                                        required />
                                </td>

                                <td style="padding: 2px;" width="1%">
                                    <label class="switch">
                                        <input type="checkbox" id="statusCheckbox" name="status" checked required>
                                        <span class="slider round"></span>
                                    </label>
                                </td>


                                <td style="padding: 2px;" width="7%">
                                    <input type="text" class="form-control" name="latitude" placeholder=""
                                        required />
                                </td>
                                <td style="padding: 2px;" width="7%">
                                    <input type="text" class="form-control" name="longitude" placeholder=""
                                        required />
                                </td>
                            </tr>
                        </tbody>
                    </table>




                </div>


                <div class="col-md-12" style="margin-top: 5px;">

                    <table width="100%">
                        <thead>
                            <tr style="height:30px;">

                                <th>Agent Name</th>
                                <th>Agent Designation</th>
                                <th>Profile Picture</th>
                                <th>FaceBook</th>
                                <th>Twitter</th>
                                <th>LinkedIn</th>
                                <th>Instagram</th>

                            </tr>

                        </thead>
                        <tbody>
                            <tr width="100%">


                                <td style="padding: 2px;" width="4%">
                                    <input type="text" class="form-control" name="agent_name" placeholder=""
                                        required />
                                </td>
                                <td style="padding: 2px;" width="4%">
                                    <input type="text" class="form-control" name="agent_designation" placeholder=""
                                        required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="file" class="form-control" name="profile_picture" placeholder=""
                                        required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="text" class="form-control" name="facebook" placeholder=""
                                        required />
                                </td>
                                <td style="padding: 2px;" width="5%">
                                    <input type="text" class="form-control" name="twitter" placeholder="" required />
                                </td>
                                <td style="padding: 2px;" width="7%">
                                    <input type="text" class="form-control" name="linkedin" placeholder=""
                                        required />
                                </td>
                                <td style="padding: 2px;" width="7%">
                                    <input type="text" class="form-control" name="instagram" placeholder=""
                                        required />
                                </td>
                            </tr>
                        </tbody>
                    </table>


                    {{-- ------------------------------------------------------------------- --}}
                    {{-- FAQs section --}}

                </div>

                <div class="col-md-12">
                    <img src="{{ asset('/panel/img/line.png') }}" width="100%" />
                </div>

                <div class="col-md-12" style="margin-top: 1px;">

                    <div class="row">
                        <!-- FAQs section -->

                        <div class="col-md-5">
                            <table width="100%">
                                <tr style="height:50px;">
                                    <th width="40%" style="font-size: 14px">Add New Question</th>
                                </tr>
                            </table>
                            <table>
                                <tr style="height:30px;">
                                    <th width="30%" style="vertical-align: top;">Question</th>

                                    <td style="padding: 2px; " width="70%">
                                        <input type="text" class="form-control" id="question" placeholder="" />
                                    </td>

                                </tr>
                                <tr>

                                    <th width="30%" style="vertical-align: top;">Answer</th>

                                    <td style="padding: 2px;" width="50%">
                                        <textarea class="form-control" id="answer" placeholder="" rows="3"></textarea>
                                    </td>
                                    <td style="vertical-align: bottom; padding:8px">
                                        <a> <button id="on" type="button" class="btn mjks add-faqs"
                                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699; ">
                                                <i class="fa fa-plus " aria-hidden="true"></i></button></a>
                                    </td>
                                </tr>
                            </table>



                            <table width="100%" border="1" style="margin-top: 5px;">
                                <tr style="background-color:#f0f0f0; height:30px;">
                                    <th width="3%" style="text-align:center">Sr.No</th>
                                    <th width="10%" style="text-align:center">Added Question</th>
                                    <th width="10%" style="text-align:center">Added Answer</th>


                                    <th width="5%" style="text-align:center">Action</th>
                                </tr>

                                <tbody class="add_more_faqs">
                                    <tr>




                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        {{-- ============================= --}}

                        {{-- Business Hours --}}

                        <div class="col-md-6" style="margin-left: 80px">
                            <h5 style="color: black; font-weight: bold; margin-top: 20px">Business Hours</h5>
                            <br>
                            @foreach ($day as $day)
                                <div class="row">
                                    <div class="col-lg-3">
                                        <label class="form-label">{{ $day->days }}</label>
                                        <input type="hidden" name="days[]" value="{{ $day->id }}">
                                        <div>
                                            <input type="checkbox" name="is_close_{{ $day->id }}"
                                                id="is_close_{{ $day->id }}"
                                                style="width: 15px; height: 15px; border: 2px solid #333;"
                                                onchange="toggleTimeFields('{{ $day->id }}')">
                                            <label class="form-check-label" for="is_close_{{ $day->id }}"
                                                style="margin-left: 10px">Closed</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6" id="openCloseFields_{{ $day->id }}">
                                        <div class="row">
                                            <div class="col-lg-6" style="position: relative; margin-top: 15px">
                                                <label for="open_at_{{ $day->id }}"
                                                    style="position: absolute; top: -10px; left: 5px; background-color: white; padding: 0 5px;">Open
                                                    at</label>
                                                <input type="time" name="open_at_{{ $day->id }}"
                                                    id="open_at_{{ $day->id }}" class="form-control openCloseField"
                                                    style="height: 50px;" value="10:00">
                                            </div>

                                            <div class="col-lg-6" style="position: relative; margin-top: 15px">
                                                <label for="close_at_{{ $day->id }}"
                                                    style="position: absolute; top: -10px; left: 5px; background-color: white; padding: 0 5px;">Close
                                                    at</label>
                                                <input type="time" name="close_at_{{ $day->id }}"
                                                    id="close_at_{{ $day->id }}" class="form-control openCloseField"
                                                    style="height: 50px;" value="22:00">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{--
                </div> --}}

                        {{-- ============================= --}}


                        {{-- ---------------------------------------------------------- --}}
                        {{-- layout image section --}}
                        <div class="col-md-12">
                            <img src="{{ asset('/panel/img/line.png') }}" width="100%" />
                        </div>
                        <div class="col-md-12" style="margin-top: 1px;">

                            <div class="col-md-4">
                                <table width="100%">
                                    <tr style="height:30px;">
                                        <th width="30%">
                                            Layout Image
                                            <span style="color: #FF0000; font-size: smaller; margin-left: 5px;">Size (6000
                                                *
                                                3357)</span>
                                        </th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td style="padding: 2px;" width="50%">
                                            <input type="file" class="form-control" id="layout_image"
                                                placeholder="" />
                                        </td>
                                        <td>
                                            <a> <button id="on" type="button" class="btn mjks add-row-image"
                                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                                                    <i class="fa fa-plus " aria-hidden="true"></i></button></a>
                                        </td>
                                    </tr>
                                </table>



                                <table width="100%" border="1" style="margin-top: 5px;">
                                    <tr style="background-color:#f0f0f0; height:30px;">
                                        <th width="3%" style="text-align:center">Sr.No</th>
                                        <th width="10%" style="text-align:center">Added Layout Image</th>

                                        <th width="5%" style="text-align:center">Action</th>
                                    </tr>

                                    <tbody class="add_more_image">
                                        <tr>




                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="col-md-8">
                                <table width="100%">
                                    <thead>
                                        <tr>

                                            <th>Features</th>

                                            <th style="height:50px;">Layout Description</th>
                                        </tr>

                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="padding: 2px; " width="50%">
                                                <div style="margin-bottom:5%;">
                                                    @foreach ($feature as $feature)
                                                        <input type="checkbox" id="{{ $feature->id }}"
                                                            name="layout_feature[]"
                                                            value="{{ $feature->layout_feature }}">
                                                        <label style="margin-bottom: 5px;"
                                                            for="{{ $feature->id }}">{{ $feature->layout_feature }}</label>
                                                    @endforeach

                                                </div>
                                            </td>


                                            <td style="padding: 2px;">
                                                <div id="editor-container" style="height: 100px;"></div>
                                                <input type="hidden" name="layout_description" id="content" required>
                                            </td>



                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <img src="{{ asset('/panel/img/line.png') }}" width="100%" />

                        </div>


                        <div class="col-md-12" style="margin-top:2vh;">
                            <div style=" display:flex; justify-content:end;">
                                <form id="upload-form" enctype="multipart/form-data">
                                    <div style="display: flex; gap: 2px; align-items: center;">
                                        <input type="file" name="file" id="file" style="width: 80px;"
                                            class="">
                                        <button id="upload-button" type="button" class="btn mjks"
                                            style="color: #FFFFFF; margin-left:5px; height: 30px; width: auto; background-color: #009919;">
                                            <i class="fa fa-upload" aria-hidden="true"></i>Bulk Import
                                        </button>
                                        <a href="{{ asset('bulkupload/plot_entry.xlsx') }}">
                                            <button type="button" class="btn mjks"
                                                style="color: #FFFFFF; height: 30px; width: auto; background-color: #173b9f;">
                                                <i class="fa fa-file" aria-hidden="true"></i>Sample
                                            </button>
                                        </a>
                                    </div>
                                </form>

                            </div>

                            {{-- <div id="plotrecordlenrth" style="display: none';">
                    </div> --}}



                            <div style=" display:flex; justify-content:end;">
                                <div id="remainings">

                                    <label id="remaining" style="font-weight: bold;color: #9b0707;"></label>
                                </div>
                            </div>

                            {{-- <a> <button type="submit" id="on" type="file" class="btn mjks" class="fileinput btn-primary"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #009919;">
                            <i class="fa fa-upload" aria-hidden="true"></i>Bulk Import</button></a>

                    <a href="{{ asset('bulkupload/plot_entry.xlsx') }}"> <button id="on" type="button" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #173b9f;">
                            <i class="fa fa-file" aria-hidden="true"></i>Sample</button></a> --}}




                            <table width="100%">
                                <tr style="height:30px;">
                                    <th width="5%">Plot No.</th>
                                    <th width="5%">Plot Width</th>
                                    <th width="5%">Plot Length</th>

                                    <th width="5%">Area (Sq. Ft)</th>
                                    <th width="5%">Area (Sq. Mt)</th>
                                    <th width="5%">East</th>
                                    <th width="5%">West</th>
                                    <th width="5%">North</th>
                                    <th width="5%">South</th>
                                    <th width="5%">Rate(Sq.Ft)</th>
                                    <th width="5%">Amount</th>
                                    <th>Minimum Down Payment</th>
                                    <th>tenure</th>
                                    <th></th>
                                </tr>


                                <tr>
                                    <td style="padding: 2px;" width="5%">
                                        <input type="text" class="form-control" id="plotno" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="5%">
                                        <input type="text" class="form-control" id="plotwidth" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="5%">
                                        <input type="text" class="form-control" id="plotlength" placeholder="" />
                                    </td>

                                    <td style="padding: 2px;" width="5%">
                                        <input type="text" class="form-control" id="areasqrft" placeholder=""
                                            disabled />
                                    </td>
                                    <td style="padding: 2px;" width="5%">
                                        <input type="text" class="form-control" id="areasqrmt" placeholder=""
                                            disabled />
                                    </td>
                                    <td style="padding: 2px;" width="5%">
                                        <input type="text" class="form-control" id="east" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="5%">
                                        <input type="text" class="form-control" id="west" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="5%">
                                        <input type="text" class="form-control" id="north" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="5%">
                                        <input type="text" class="form-control" id="south" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="5%">
                                        <input type="text" class="form-control" id="rate" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="5%">
                                        <input type="text" class="form-control" id="amount" placeholder=""
                                            disabled />
                                    </td>
                                    <td style="padding: 2px;" width="5%">
                                        <input type="number" class="form-control" name="minimum_down_payment"
                                            id="minimum_down_payment" placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="5%">
                                        <input type="number" class="form-control" name="tenure" id="tenure"
                                            placeholder="" />
                                    </td>
                                    <td style="padding: 2px;" width="5%">
                                        <button id="disblebutton" type="button" class="btn mjks add-row"
                                            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"> <i
                                                class="fa fa-plus "></i>ADD</button>
                                    </td>
                                </tr>

                            </table>
                            <table width="100%" border="1" style="margin-top: 5px;">
                                <tr style="background-color:#f0f0f0; height:30px;">
                                    {{-- <th width="3%" style="text-align:center">Sr.No</th> --}}
                                    <th width="5%" style="text-align:center">Plot No</th>
                                    <th width="5%" style="text-align:center">Plot Width</th>
                                    <th width="5%" style="text-align:center">Plot Length</th>
                                    <th width="5%" style="text-align:center">Area(Sq. Ft)</th>
                                    <th width="5%" style="text-align:center">Area(Sq. Mt)</th>
                                    <th width="5%" style="text-align:center">East</th>
                                    <th width="5%" style="text-align:center">West</th>
                                    <th width="5%" style="text-align:center">North</th>
                                    <th width="5%" style="text-align:center">South</th>
                                    <th width="5%" style="text-align:center">Rate(Sq. Ft) </th>
                                    <th width="5%" style="text-align:center">Amount </th>
                                    <th width="5%" style="text-align:center">minimum_down_payment </th>
                                    <th width="5%" style="text-align:center">tenure </th>
                                    <th width="5%" style="text-align:center">Action</th>
                                </tr>
                                <tbody class="add_more">

                                    <tr>
                                        {{-- <td style="padding:5px;" align="center">
                                    <label>1</label>
                                </td>
                                <td style="padding:5px;" align="center"></td>
                                <td style="padding:5px;" align="center"></td>
                                <td style="padding:5px;" align="center"></td>
                                <td style="padding:5px;" align="center"></td>
                                <td style="padding:5px;" align="center"></td>
                                <td style="padding:5px;" align="center"></td>
                                <td style="padding:5px;" align="center"></td>
                                <td style="padding:5px;" align="center"></td>
                                <td style="padding:5px;" align="center"></td>
                                <td style="padding:5px;" align="center"></td>

                                <td style="text-align:center; color:#FF0000"><button><i
                                            class="fa fa-trash-o"></i></button>

                                </td> --}}
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-12" style="margin-top:2vh;margin-bottom: 1vh;" align="right">

                            <button id="on" type="submit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                                <i class="fa fa-plus" aria-hidden="true"></i>Add Project Entry</button>

                        </div>


                    </div>


                </div>
            </form>

        </div>




        <!-- START DEFAULT DATATABLE -->


    </div>



    </div>

    <!-- PAGE CONTENT WRAPPER -->


    </div>
    <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->

    <!-- MESSAGE BOX-->
    <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                <div class="mb-content">
                    <p>Are you sure you want to log out?</p>
                    <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a href="#" class="btn btn-success btn-lg">Yes</a>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MESSAGE BOX-->

@stop
@section('js')
    <script src="{{ asset('https://cdn.quilljs.com/1.3.6/quill.js') }}"></script>

    <script>
        const areasqrftInput = document.getElementById('areasqrft');
        const rateInput = document.getElementById('rate');
        const amountInput = document.getElementById('amount');

        rateInput.addEventListener('input', () => {
            const areasqrftValue = parseFloat(areasqrftInput.value);
            const rateValue = parseFloat(rateInput.value);
            const amountValue = areasqrftValue * rateValue;
            amountInput.value = amountValue.toFixed(2);
        });
    </script>
    <script>
        // Initialize Quill
        var quill = new Quill('#editor-container', {
            theme: 'snow',
            placeholder: 'Write something...',
        });
        // Listen for 'text-change' event to update the hidden input
        quill.on('text-change', function() {
            // Get the HTML content of the Quill editor
            var htmlContent = quill.root.innerHTML;
            // Update the value of the hidden input
            document.getElementById('content').value = htmlContent;
        });
    </script>

    <script>
        $(document).ready(function() {

            function calculateArea() {
                var width = parseFloat($('#plotwidth').val());
                var length = parseFloat($('#plotlength').val());

                if (!isNaN(width) && !isNaN(length)) {
                    var areaSqFt = width * length;

                    $('#areasqrft').val(areaSqFt.toFixed(2));

                    var areaSqM = areaSqFt * 0.092903;
                    $('#areasqrmt').val(areaSqM.toFixed(2));
                } else {
                    $('#areasqrft').val('0.00');
                    $('#areasqrmt').val('0.00');
                }
            }

            $('#plotwidth, #plotlength').on('input', function() {
                calculateArea();



            });


            //calculate sqrmt


            //end

            //calculate sqrmt manual


            function convertSqFtToSqM(sqFt) {
                return sqFt * 0.092903;
            }

            function convertSqMToSqFt(sqM) {
                return sqM * 10.7639;
            }

            $('#areasqrft_manual').on('input', function() {
                var sqFtValue = parseFloat($(this).val());
                if (!isNaN(sqFtValue)) {
                    var sqMValue = convertSqFtToSqM(sqFtValue);
                    $('#areasqrmt_manual').val(sqMValue.toFixed(2));
                } else {
                    $('#areasqrmt_manual').val('');
                }
            });

            $('#areasqrmt_manual').on('input', function() {
                var sqMValue = parseFloat($(this).val());
                if (!isNaN(sqMValue)) {
                    var sqFtValue = convertSqMToSqFt(sqMValue);
                    $('#areasqrft_manual').val(sqFtValue.toFixed(2));
                } else {
                    $('#areasqrft_manual').val('');
                }
            });
            //end






            //label remaining function
            function calculateRemainingPlots() {
                var no_of_plots_value = parseInt($('#no_of_plots').val());
                var plotrecordlenrth_count = plotrecordlenrth;

                if (!isNaN(no_of_plots_value)) {
                    var remaining_plots = no_of_plots_value - plotrecordlenrth_count;

                    if (remaining_plots > 0) {
                        $('#remaining').text(remaining_plots + " remaining plots.");
                        $('#remaining').css('display', 'block'); // Display the div
                        $('#disblebutton').prop('disabled', false);
                        $('#upload-button').prop('disabled', false);

                    } else {
                        $('#remaining').css('display',
                            'none'); // Hide the div if remaining_plots is not greater than 0
                        $('#disblebutton').prop('disabled', true);
                        $('#upload-button').prop('disabled', true);
                    }
                } else {
                    $('#remaining').css('display',
                        'none'); // Hide the div if no_of_plots_value is not a valid number
                    // $('#disblebutton').prop('disabled', true);
                }
            }

            // Trigger calculation on change of no_of_plots input
            $('#no_of_plots').on('input', function() {
                calculateRemainingPlots();
            });
            //end


            var plotrecordlenrth = 0;
            $('#upload-button').on('click', function(e) {
                e.preventDefault();
                var formData = new FormData($('#upload-form')[0]);

                // Get the CSRF token
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                formData.append('_token', csrfToken);

                var file = $('#file')[0].files[0];
                var reader = new FileReader();

                reader.onload = function(event) {
                    // Append base64 data to form data
                    formData.append('fileData', event.target.result);
                    submitFormData(formData);
                }

                reader.readAsDataURL(file); // Convert file to base64 data
            });

            // Function to submit form data via AJAX
            function submitFormData(formData) {
                $.ajax({
                    url: '{{ route('bulkploatappendatrow') }}',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        if (response.success) {
                            $('#file').val('');
                            var rows = response.data;

                            var rowCount = $(".add_more tr").length;
                            calculateRemainingPlots(); // Ensure this function is defined

                            rows.forEach(function(row, index) {
                                plotrecordlenrth++; // Make sure this variable is defined and initialized earlier
                                calculateRemainingPlots();

                                var markup =
                                    '<tr>' +
                                    '<td><input type="text" name="plotno[]" required style="border:none; width: 100%;" value="' +
                                    row.plot_no + '"></td>' +
                                    '<td><input type="text" name="plotwidth[]" required style="border:none; width: 100%;" value="' +
                                    row.plot_width + '"></td>' +
                                    '<td><input type="text" name="plotlength[]" required style="border:none; width: 100%;" value="' +
                                    row.plot_length + '"></td>' +
                                    '<td><input type="text" name="areasqrft[]" required style="border:none; width: 100%;" value="' +
                                    row.area_sqrft + '"></td>' +
                                    '<td><input type="text" name="areasqrmt[]" required style="border:none; width: 100%;" value="' +
                                    row.area_sqrmt + '"></td>' +
                                    '<td><input type="text" name="east[]" required style="border:none; width: 100%;" value="' +
                                    row.east + '"></td>' +
                                    '<td><input type="text" name="west[]" required style="border:none; width: 100%;" value="' +
                                    row.west + '"></td>' +
                                    '<td><input type="text" name="south[]" required style="border:none; width: 100%;" value="' +
                                    row.south + '"></td>' +
                                    '<td><input type="text" name="north[]" required style="border:none; width: 100%;" value="' +
                                    row.north + '"></td>' +
                                    '<td><input type="text" name="rate[]" required style="border:none; width: 100%;" value="' +
                                    row.rate + '"></td>' +
                                    '<td><input type="text" name="amount[]" required style="border:none; width: 100%;" value="' +
                                    row.amount + '"></td>' +
                                    '<td><input type="text" name="minimum_down_payment[]" required style="border:none; width: 100%;" value="' +
                                    row.minimum_down_payment + '"></td>' +
                                    '<td><input type="text" name="tenure[]" required style="border:none; width: 100%;" value="' +
                                    row.tenure + '"></td>' +
                                    '<td style="text-align:center; color:#FF0000"><button class="delete-row"><i class="fa fa-trash-o"></i></button></td>' +
                                    '</tr>';

                                $(".add_more").append(markup);
                            });

                            $("#plotrecordlenrth").text(plotrecordlenrth);
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('An error occurred while uploading the file.');
                    }
                });
            }

            // Find and remove selected table rows
            $("tbody").delegate(".delete-row", "click", function() {
                $(this).parents("tr").remove();
                // plotrecordlenrth--;
                $("#plotrecordlenrth").text(plotrecordlenrth);
            });
            // alert();
            $(".add-row").click(function() {
                // Get values from input fields
                var plotNo = $('#plotno').val();
                var plotWidth = $('#plotwidth').val();
                var plotLength = $('#plotlength').val();
                var areaSqrft = $('#areasqrft').val();
                var areaSqrmt = $('#areasqrmt').val();
                var East = $('#east').val();
                var West = $('#west').val();
                var South = $('#south').val();
                var North = $('#north').val();
                var Rate = $('#rate').val();
                var Amount = $('#amount').val();
                var minimum_down_payment = $('#minimum_down_payment').val();
                var tenure = $('#tenure').val();

                // Check if all fields are not empty
                if (plotNo.trim() === '' || plotWidth.trim() === '' || plotLength.trim() === '' || areaSqrft
                    .trim() === '' || areaSqrmt.trim() === '' || East.trim() === '' || West.trim() === '' ||
                    South.trim() === '' || North.trim() === '' || Rate.trim() === '' || Amount.trim() ===
                    '' || minimum_down_payment.trim() === '' || tenure.trim() === ''
                ) {
                    // If any field is empty, do not proceed
                    alert('Please fill in all fields before adding a new row.');
                    return;
                }

                var rowCount = $(".add_more tr").length;
                var srNo = rowCount;

                var markup =
                    '<tr>' +
                    '<td><input type="text" name="plotno[]" required="" style="border:none; width: 100%;" value="' +
                    plotNo + '"></td>' +
                    '<td><input type="text" name="plotwidth[]" required="" style="border:none; width: 100%;" value="' +
                    plotWidth + '"></td>' +
                    '<td><input type="text" name="plotlength[]" required="" style="border:none; width: 100%;" value="' +
                    plotLength + '"></td>' +
                    '<td><input type="text" name="areasqrft[]" required="" style="border:none; width: 100%;" value="' +
                    areaSqrft + '"></td>' +
                    '<td><input type="text" name="areasqrmt[]" required="" style="border:none; width: 100%;" value="' +
                    areaSqrmt + '"></td>' +
                    '<td><input type="text" name="east[]" required="" style="border:none; width: 100%;" value="' +
                    East + '"></td>' +
                    '<td><input type="text" name="west[]" required="" style="border:none; width: 100%;" value="' +
                    West + '"></td>' +
                    '<td><input type="text" name="south[]" required="" style="border:none; width: 100%;" value="' +
                    South + '"></td>' +
                    '<td><input type="text" name="north[]" required="" style="border:none; width: 100%;" value="' +
                    North + '"></td>' +
                    '<td><input type="text" name="rate[]" required="" style="border:none; width: 100%;" value="' +
                    Rate + '"></td>' +
                    '<td><input type="text" name="amount[]" required="" style="border:none; width: 100%;" value="' +
                    Amount + '"></td>' +
                    '<td><input type="text" name="minimum_down_payment[]" required="" style="border:none; width: 100%;" value="' +
                    minimum_down_payment + '"></td>' +
                    '<td><input type="text" name="tenure[]" required="" style="border:none; width: 100%;" value="' +
                    tenure + '"></td>' +
                    '<td style="text-align:center; color:#FF0000"><button class="delete-row"><i class="fa fa-trash-o"></i></button></td>' +
                    '</tr>';

                $(".add_more").append(markup);
                plotrecordlenrth++;
                calculateRemainingPlots();
                $("#plotrecordlenrth").text(plotrecordlenrth);

                // Clear the input fields
                $('#plotno').val('');
                $('#plotwidth').val('');
                $('#plotlength').val('');
                $('#areasqrft').val('');
                $('#areasqrmt').val('');
                $('#east').val('');
                $('#west').val('');
                $('#south').val('');
                $('#north').val('');
                $('#rate').val('');
                $('#amount').val('');
                $('#minimum_down_payment').val('');
                $('#tenure').val('');

                // Focus on the first input field for quicker data entry
                $('#plotno').focus();
            });

            // Find and remove selected table rows
            $("tbody").delegate(".delete-row", "click", function() {
                var mpsqnty = $(this).parents("tr").find('input[name="mpsqnty[]"]').val()
                var grandtotal1 = $('#grandtotal1').val();
                var total1 = parseFloat(grandtotal1) - parseFloat(mpsqnty)
                $('#grandtotal1').val(total1);
                $(this).parents("tr").remove();
                plotrecordlenrth--;
                calculateRemainingPlots();
                $("#plotrecordlenrth").text(plotrecordlenrth);
            });
        });
    </script>
    <script>
        document.getElementById('statusCheckbox').addEventListener('change', function() {
            var hiddenInput = document.querySelector('input[name="status"]');
            hiddenInput.value = this.checked ? 1 : 0; // Use 1 for checked, 0 for unchecked
        });
    </script>

    <script>
        $(document).ready(function() {
            $(".add-row-image").click(function() {
                // Get the input file element
                var inputElement = document.getElementById('layout_image');

                // Check if a file is selected
                if (!inputElement.files || inputElement.files.length === 0) {
                    alert('Please select an image file.');
                    return;
                }

                // Use FileReader to display the selected image
                var fileReader = new FileReader();
                fileReader.onload = function(e) {
                    var imageSrc = e.target.result;

                    // Create a new row with the image
                    var rowCount = $(".add_more_image tr").length;
                    var srNo = rowCount;



                    var markup =
                        '<tr>' +
                        '<td style="text-align:center;">' + srNo + '</td>' +
                        '<td><input type="hidden" name="layout_image[]" value="' + imageSrc +
                        '"><img src="' + imageSrc +
                        '" style="max-width: 100px; max-height: 100px;"></td>' +
                        '<td style="text-align:center; color:#FF0000"><button class="delete-row-image"><i class="fa fa-trash-o"></i></button></td>' +
                        '</tr>';

                    $(".add_more_image").append(markup);
                };

                // Read the selected file as Data URL
                fileReader.readAsDataURL(inputElement.files[0]);

                // Clear the input file
                $('#layout_image').val('');
            });

            // Find and remove selected table rows
            $("tbody").delegate(".delete-row-image", "click", function() {
                $(this).parents("tr").remove();
            });
        });
    </script>




    <script>
        $(document).ready(function() {
            // alert();
            $(".add-faqs").on("click", function() {
                // Get values from input fields
                var question = $('#question').val();
                var answer = $('#answer').val();

                // Check if all fields are not empty
                if (question.trim() === '' || answer.trim() === '') {
                    // If any field is empty, do not proceed
                    alert('Please fill in all fields before adding a new row.');
                    return;
                }

                var rowCount = $(".add_more_faqs tr").length;


                var srNo = rowCount;


                // srNo++;
                var markup =
                    '<tr>' +
                    '<td style="text-align:center;">' + srNo + '</td>' +
                    '<td><input type="text" name="question[]" required="" style="border:none; width: 100%;" value="' +
                    question + '"></td>' +
                    '<td><input type="text" name="answer[]" required="" style="border:none; width: 100%;" value="' +
                    answer + '"></td>' +

                    '<td style="text-align:center; color:#FF0000"><button class="delete-row"><i class="fa fa-trash-o"></i></button></td>' +
                    '</tr>';

                // <button type="button" class="btn1 btn-outline-danger delete-row"><i class="fa fa-trash-o"></i></button>
                // </td></tr>';
                $(".add_more_faqs").append(markup);
                // Clear the input fields
                $('#question').val('');
                $('#answer').val('');
                //    $('#expense').val('');
            });
            // Find and remove selected table rows
            $("tbody").delegate(".delete-row", "click", function() {
                var mpsqnty = $(this).parents("tr").find('input[name="mpsqnty[]"]').val()
                var grandtotal1 = $('#grandtotal1').val();
                var total1 = parseFloat(grandtotal1) - parseFloat(mpsqnty)
                $('#grandtotal1').val(total1);
                $(this).parents("tr").remove();
            });
        });
    </script>

    <!-- jQuery library -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> --}}

    <!-- Your script containing toggleTimeFields function -->
    <script>
        function toggleTimeFields(dayId) {
            console.log("Toggling time fields for day ID: " + dayId);

            var checkbox = $('#is_close_' + dayId);
            var openCloseFields = $('#openCloseFields_' + dayId).find('.openCloseField');

            if (checkbox.prop('checked')) {
                console.log("Checkbox is checked");
                openCloseFields.prop('disabled', true);
            } else {
                console.log("Checkbox is not checked");
                openCloseFields.prop('disabled', false);
            }
        }
    </script>

    {{-- Script to disable open_at and close_at fields and show closed in business hours when restro is closed --}}
    <script>
        function toggleTimeFields(dayId) {
            console.log("Toggling time fields for day ID: " + dayId);

            var checkbox = document.getElementById('is_close_' + dayId);
            var openCloseFields = document.querySelectorAll('#openCloseFields_' + dayId + ' .openCloseField');

            if (checkbox.checked) {
                console.log("Checkbox is checked");
                openCloseFields.forEach(field => field.disabled = true);
            } else {
                console.log("Checkbox is not checked");
                openCloseFields.forEach(field => field.disabled = false);
            }
        }
    </script>
@endsection
