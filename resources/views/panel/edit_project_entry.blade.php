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
                    <a href="{{ route('project.addedProjectEntry') }}"> <button id="on" type="button" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #009999;"><i
                                class="fa fa-plus"></i>Added Project Entry</button>
                    </a>


                    {{-- bulck upload --}}
                    {{-- <form action="" style="float:right; display:flex;">


                        <label style="font-weight: bold;font-size: large;color: #009919;">Plot Entry</label>
                        <input type="file" name="" id="">

                        <a> <button type="submit" id="on" type="file" class="btn mjks" class="fileinput btn-primary"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #009919;">
                                <i class="fa fa-upload" aria-hidden="true"></i>Bulk Import</button></a>

                        <a href="{{ asset('bulkupload/plot_entry.xlsx') }}"> <button id="on" type="button"
                                class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #173b9f;">
                                <i class="fa fa-file" aria-hidden="true"></i>Sample</button></a>

                    </form> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="text-align: center;margin-top: 5px;">
            <h6 class="panel-title"
                style="color:#FFFFFF; background-color:#006699; width:100%;height: 50%; font-size:16px;" align="center">
                <i class="fa fa-file-text"><label style="margin: 7px;">Edit Project Entry</label> </i>
            </h6>
            <!-- <a href="project_entry.html"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                            class="fa fa-plus"></i>Project Entry</button>
                                </a> -->

        </div>
        <form method="post" action="{{ route('project.update', ['id' => $project->id]) }}"
            enctype="multipart/form-data">
            <div class="col-md-12" style="margin-top: 5px;">
                @csrf
                @method('PUT')
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
                                <select class="form-control select" name="city_id" data-live-search="true" required>
                                    @foreach($cities as $city)
                                    <option value="{{ $city->id }}" {{ $city->id == $project->city_id ? 'selected' : ''
                                        }}>
                                        {{ $city->city }}
                                    </option> @endforeach
                                </select>
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <select class="form-control select" name="firm_id" data-live-search="true">
                                    @foreach($firm as $city)
                                    <option value="{{ $city->id }}" {{ $city->id == $project->firm_id ? 'selected' : ''
                                        }}>
                                        {{ $city->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" required value="{{ $project->project_code}}"
                                    name="project_code" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="4%"><input type="text" required
                                    value="{{ $project->project_name}}" class="form-control" name="project_name"
                                    placeholder="" /></td>
                            <td style="padding: 2px;" width="3%"><input type="text" class="form-control"
                                    name="mobile_number" placeholder="" required value="{{ $project->mobile_number}}" />
                            </td>
                            <td style="padding: 2px;" width="3%"><input type="text" class="form-control"
                                    name="whatsapp_number" placeholder="" required
                                    value="{{ $project->whatsapp_number}}" /></td>

                            <td style="padding: 2px;" width="3%"><input type="email" required
                                    value="{{ $project->email}}" class="form-control" name="email" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%"><input type="text" required
                                    value="{{ $project->mauja}}" class="form-control" name="mauja" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%"><input type="text" required
                                    value="{{ $project->kh_no}}" class="form-control" name="kh_no" placeholder="" />
                            </td>

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

                            <td style="padding: 2px;" width="3%"><input type="text" required value="{{ $project->phn}}"
                                    class="form-control" name="phn" placeholder="" /></td>
                            <td style="padding: 2px;" width="5%"><input type="text" required
                                    value="{{ $project->taluka}}" class="form-control" name="taluka" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%"><input type="text" required
                                    value="{{ $project->district}}" class="form-control" name="district"
                                    placeholder="" /></td>
                            <td style="padding: 2px;" width="3%"><input type="text" required
                                    value="{{ $project->no_of_plots}}" class="form-control" name="no_of_plots"
                                    placeholder="" /></td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" id="areasqrft_manual" name="areasqrft_manual"
                                    required value="{{ $project->areasqrft_manual}}" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" id="areasqrmt_manual" name="areasqrmt_manual"
                                    required value="{{ $project->areasqrmt_manual}}" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" required value="{{ $project->embedded_map}}"
                                    name="embedded_map" placeholder="" />
                            </td>

                            <!-- <td style="padding: 2px;"width="7%">
                                            <textarea rows="1" cols="10" class="form-control"></textarea></td> -->
                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" required value="{{ $project->area_plottable}}"
                                    name="area_plottable" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" required value="{{ $project->amenities}}"
                                    name="amenities" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" required value="{{ $project->open_space}}"
                                    name="open_space" placeholder="" />
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
                            <th>Brochure</th>
                            <th>Schedule Payment</th>
                            <th>Status</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr width="100%">
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" required value="{{ $project->dev_charge}}"
                                    name="dev_charge" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" required
                                    value="{{ $project->other_charges_percentage}}" name="other_charges_percentage"
                                    placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="file" class="form-control" value="{{ $project->site_map}}" name="site_map"
                                    placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="file" class="form-control" value="{{ $project->brochure ?? ''}}"
                                    name="brochure" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="file" class="form-control" value="{{ $project->schedule_payment}}"
                                    name="schedule_payment" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" required value="{{ $project->youtube_url}}"
                                    name="youtube_url" placeholder="" />
                            </td>

                            <td style="padding: 2px;" width="1%">
                                <label class="switch">
                                    <input type="checkbox" id="statusCheckbox" value="{{ $project->status }}"
                                        name="status" {{ ($project->status ==
                                    1 || $project->status == 'on') ? 'checked' : '' }}>
                                    <span class="slider round"></span>
                                </label>
                            </td>


                            <td style="padding: 2px;" width="7%">
                                <input type="text" class="form-control" required value="{{ $project->latitude}}"
                                    name="latitude" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="7%">
                                <input type="text" class="form-control" required value="{{ $project->longitude}}"
                                    name="longitude" placeholder="" />
                            </td>
                        </tr>
                    </tbody>
                </table>

                {{-- ------------------------------------------------------------------- --}}
                {{-- FAQs section --}}

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
                                <input type="text" class="form-control" name="agent_name"
                                    value="{{ $project->agent_name}}" />
                            </td>
                            <td style="padding: 2px;" width="4%">
                                <input type="text" class="form-control" name="agent_designation"
                                    value="{{ $project->agent_designation}}" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="file" class="form-control" name="profile_picture"
                                    value="{{ $project->profile_picture}}" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" name="facebook"
                                    value="{{ $project->facebook}}" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" name="twitter" value="{{ $project->twitter}}" />
                            </td>
                            <td style="padding: 2px;" width="7%">
                                <input type="text" class="form-control" name="linkedin"
                                    value="{{ $project->linkedin}}" />
                            </td>
                            <td style="padding: 2px;" width="7%">
                                <input type="text" class="form-control" name="instagram"
                                    value="{{ $project->instagram}}" />
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
                                @foreach ($faqs as $item)

                                <tr>
                                    <td class="appendrow2" style="padding:5px;" align="center">
                                        <label>{{ $loop->index+1 }}</label>
                                    </td>
                                    <td style="padding:5px;" align="center">{{ $item->question }}</td>
                                    <td style="padding:5px;" align="center">{{ $item->answer }}</td>
                                    <input type="hidden" name="question[]" value="{{ $item->question }}">
                                    <input type="hidden" name="answer[]" value="{{ $item->answer }}">
                                    <td style="text-align:center; color:#FF0000"><button data-id="{{ $item->id }}"
                                            type="button" class="editrenderdelete-row-faqs"><i
                                                class="fa fa-trash-o"></i></button></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


                    {{-- ============================= --}}

                    <div class="col-md-6" style="margin-left: 80px">
                        <h5 style="color: black; font-weight:bold; margin-top:20px">Business Hours</h5>
                        <br>
                        @foreach ($day as $day)
                        <div class="row">
                            <div class="col-lg-3">
                                <label class="form-label">{{$day->days}}</label>
                                <input type="hidden" name="days[]" value="{{ $day->id }}">
                                <div>
                                    @php
                                    $timeSlot = $timeSlots->where('days_id', $day->id)->first();
                                    @endphp
                                    <input type="checkbox" name="is_close_{{ $day->id }}" id="is_close_{{ $day->id }}"
                                        style="width: 15px; height: 15px; border: 2px solid #333;"
                                        onchange="toggleTimeFields('{{ $day->id }}')" {{ $timeSlot &&
                                        $timeSlot->is_close ? 'checked' : ''
                                    }}>
                                    <label class="form-check-label" for="is_close_{{ $day->id }}"
                                        style="margin-left: 10px">Closed</label>
                                </div>
                            </div>

                            <div class="col-lg-6" id="openCloseFields_{{ $day->id }}">
                                <div class="row">
                                    <div class="col-lg-6" style="position: relative; margin-top:15px">
                                        <label for="open_at_{{ $day->id }}"
                                            style="position: absolute; top: -10px; left: 5px; background-color: white; padding: 0 5px;">Open
                                            at</label>
                                        <input type="time" name="open_at_{{ $day->id }}" id="open_at_{{ $day->id }}"
                                            class="form-control" style="height: 50px;"
                                            value="{{ $timeSlot ? $timeSlot->open_at : '10:00' }}">
                                    </div>

                                    <div class="col-lg-6" style="position: relative; margin-top:15px">
                                        <label for="close_at_{{ $day->id }}"
                                            style="position: absolute; top: -10px; left: 5px; background-color: white; padding: 0 5px;">Close
                                            at</label>
                                        <input type="time" name="close_at_{{ $day->id }}" id="close_at_{{ $day->id }}"
                                            class="form-control" style="height: 50px;"
                                            value="{{ $timeSlot ? $timeSlot->close_at : '22:00' }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{--
                </div> --}}

                {{-- ============================= --}}



            </div>
            <div class="col-md-12">
                <img src="{{ asset('/panel/img/line.png') }}" width="100%" />
            </div>
            <div class="col-md-12" style="margin-top: 1px;">

                <div class="col-md-4">
                    <table width="100%">
                        <tr style="height:30px;">
                            <th width="30%">Layout Image</th>
                            <th></th>
                        </tr>
                        <tr>
                            <td style="padding: 2px;" width="50%">
                                <input type="file" class="form-control" id="layout_image" placeholder="" />
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

                            @foreach ($layoutImages as $item)
                            <tr class="existing-row" data-image-id="{{ $item->id }}">
                                <td style="text-align:center;">{{ $loop->index + 1 }}</td>
                                <td>
                                    <input type="hidden" name="existing_id[]" value="{{ $item->project_entry_id }}">
                                    <input type="hidden" name="layout_image[]" value="{{ $item->layout_image }}">
                                    <img src="{{ asset('/' . $item->layout_image) }}"
                                        style="max-width: 50px; max-height: 50px;">
                                </td>
                                <td style="text-align:center; color:#FF0000">
                                    <button type="button" class="editrenderdelete-row-image"><i
                                            class="fa fa-trash-o"></i></button>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                <div class="col-md-8">
                    <table width="100%">
                        <thead>
                            <tr style="height:30px;">

                                <th>Features</th>

                                <th>Layout Description</th>
                            </tr>

                        </thead>
                        <tbody>
                            <tr>
                                <td style="padding: 2px; width: 50%;">
                                    <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                                        @foreach ($features as $feature)
                                        <?php
                                        $layoutFeaturesArray = explode(', ', $project->layout_feature);
                                    ?>
                                        <div style="display: flex; align-items: center; margin-bottom: 10px;">
                                            <input type="checkbox" id="{{ $feature->id }}" name="layout_feature[]"
                                                value="{{ $feature->layout_feature }}" {{
                                                in_array($feature->layout_feature, $layoutFeaturesArray) ?
                                            'checked' : '' }}
                                            style="margin-right: 10px;">
                                            <label for="{{ $feature->id }}">{{ $feature->layout_feature }}</label>
                                        </div>
                                        @endforeach
                                    </div>
                                </td>

                                <td style="padding: 2px;">
                                    <div id="editor-container" style="height: 100px;">{!! $project->layout_description
                                        !!}</div>
                                    <input type="hidden" name="layout_description"
                                        value="{{$project->layout_description }}" id="content">
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
                            <input type="file" name="file" id="file" style="width: 80px;" class="">
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



                <table width="100%">
                    <tr style="height:30px;">
                        <th width="3%">Plot No.</th>
                        <th width="3%">Plot Width</th>
                        <th width="3%">Plot Length</th>

                        <th width="2%">Area (Sq. Ft)</th>
                        <th width="2%">Area (Sq. Mt)</th>
                        <th width="3%">East</th>
                        <th width="3%">West</th>
                        <th width="3%">North</th>
                        <th width="1%">South</th>
                        <th width="2%">Rate(Sq.Ft)</th>
                        <th width="2%">Amount</th>
                        <th></th>
                    </tr>


                    <tr>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" id="plotno" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" id="plotwidth" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" id="plotlength" placeholder="" />
                        </td>

                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" id="areasqrft" placeholder="" disabled />
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" id="areasqrmt" placeholder="" disabled />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" id="east" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" id="west" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="1%">
                            <input type="text" class="form-control" id="north" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" id="south" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" id="rate" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <input type="text" class="form-control" id="amount" placeholder="" disabled />
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <button id="on" type="button" class="btn mjks add-row"
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
                        <th width="5%" style="text-align:center">Area (Sq. Ft)</th>
                        <th width="5%" style="text-align:center">Area (Sq. Mt)</th>
                        <th width="5%" style="text-align:center">East</th>
                        <th width="5%" style="text-align:center">West</th>
                        <th width="5%" style="text-align:center">North</th>
                        <th width="5%" style="text-align:center">South</th>
                        <th width="5%" style="text-align:center">Rate(Sq.Ft) </th>
                        <th width="5%" style="text-align:center">amount </th>
                        <th width="5%" style="text-align:center">Action</th>
                    </tr>
                    <tbody class="add_more">

                        <tr>
                            @foreach ($appendData as $item)


                            {{-- <td class="appendrow" style="padding:5px;" align="center">
                                <label>{{ $loop->index+1 }}</label>
                            </td> --}}
                            <td style="padding:5px;" align="center">{{ $item->plot_no }}</td>
                            <td style="padding:5px;" align="center">{{ $item->plot_width }}</td>
                            <td style="padding:5px;" align="center">{{ $item->plot_length }}</td>
                            <td style="padding:5px;" align="center">{{ $item->area_sqrft }}</td>
                            <td style="padding:5px;" align="center">{{ $item->area_sqrmt }}</td>
                            <td style="padding:5px;" align="center">{{ $item->east}}</td>
                            <td style="padding:5px;" align="center">{{ $item->west }}</td>
                            <td style="padding:5px;" align="center">{{ $item->south }}</td>
                            <td style="padding:5px;" align="center">{{ $item->north }}</td>
                            <td style="padding:5px;" align="center">{{ $item->rate }}</td>
                            <td style="padding:5px;" align="center">{{ $item->amount ?? '' }}</td>

                            <td style="text-align:center; color:#FF0000"><button data-id="{{ $item->id }}" type="button"
                                    class="editrenderdelete-row-data"><i class="fa fa-trash-o"></i></button></td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-md-12" style="margin-top:2vh;margin-bottom: 1vh;" align="right">

                <button id="on" type="submit" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                    <i class="fa fa-plus" aria-hidden="true"></i>Update Project Entry</button>

            </div>


    </div>
    <div style="float: right;">
        <div class="col-md-11" width="90%">
            @if ($errors->any())
            <div class="alert alert-danger mt-2">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if(session('success'))
            <div id="successscript" class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif
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
    $(document).ready(function() {

//below is new data edit purpose i put sricpt  6/27/2024
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
$('#remaining').css('display', 'none'); // Hide the div if remaining_plots is not greater than 0
$('#disblebutton').prop('disabled', true);
$('#upload-button').prop('disabled', true);
}
} else {
$('#remaining').css('display', 'none'); // Hide the div if no_of_plots_value is not a valid number
// $('#disblebutton').prop('disabled', true);
}
}

// Trigger calculation on change of no_of_plots input
$('#no_of_plots').on('input', function() {
calculateRemainingPlots();
});
//end


var plotrecordlenrth=0;
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
url: '{{ route("bulkploatappendatrow") }}',
type: 'POST',
data: formData,
processData: false,
contentType: false,
success: function(response) {
if (response.success) {
$('#file').val('');
var rows = response.data;
var rowCount = $(".add_more tr").length;
calculateRemainingPlots();

rows.forEach(function(row, index) {

var srNo = rowCount + index + 1;
plotrecordlenrth++;
calculateRemainingPlots();
var markup =
'<tr>' +
    // '<td style="text-align:center;">' + srNo + '</td>' +
    '<td><input type="text" name="plotno[]" required style="border: none; width: 100%; text-align: center;" value="' + row.plot_no + '"></td>' +
    '<td><input type="text" name="plotwidth[]" required style="border: none; width: 100%; text-align: center;"value="' + row.plot_width + '"></td>' +
    '<td><input type="text" name="plotlength[]" required style="border: none; width: 100%; text-align: center;"value="' + row.plot_length + '"></td>' +
    '<td><input type="text" name="areasqrft[]" required style="border: none; width: 100%; text-align: center;"value="' + row.area_sqrft + '"></td>' +
    '<td><input type="text" name="areasqrmt[]" required style="border: none; width: 100%; text-align: center;" value="' + row.area_sqrmt + '"></td>' +
    '<td><input type="text" name="east[]" required style="border: none; width: 100%; text-align: center;" value="' + row.east + '"></td>' +
    '<td><input type="text" name="west[]" required style="border: none; width: 100%; text-align: center;" value="' + row.west + '"></td>' +
    '<td><input type="text" name="south[]" required style="border: none; width: 100%; text-align: center;" value="' + row.south + '"></td>' +
    '<td><input type="text" name="north[]" required style="border: none; width: 100%; text-align: center;" value="' + row.north + '"></td>' +
    '<td><input type="text" name="rate[]" required style="border: none; width: 100%; text-align: center;" value="' + row.rate + '"></td>' +
    '<td><input type="text" name="amount[]" required style="border: none; width: 100%; text-align: center;"value="' + row.amount + '"></td>' +
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



//end data which i put 6/27/2024







        // alert();
       $(".add-row").click(function()  {
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

              // Check if all fields are not empty
              if (plotNo.trim() === '' || plotWidth.trim() === '' || plotLength.trim() === '' || areaSqrft.trim() === '' || areaSqrmt.trim() === '' || East.trim() === '' || West.trim() === '' || South.trim() === '' || North.trim() === '' || Rate.trim() === ''|| Amount.trim() === '') {
                // If any field is empty, do not proceed
                alert('Please fill in all fields before adding a new row.');
                return;
            }

            var rowCount = $(".add_more tr").length;


            var srNo=$(".appendrow").length;
          srNo= parseInt(srNo)+parseInt(1);


            // srNo++;
            var markup =
    '<tr class="appendrow">' +
        // '<td style="text-align:center;">' + srNo + '</td>' +
        '<td><input type="text" name="plotno[]" required="" style="border: none; width: 100%; text-align: center;" value="' + plotNo + '"></td>' +
        '<td><input type="text" name="plotwidth[]" required="" style="border: none; width: 100%; text-align: center;" value="' + plotWidth + '"></td>' +
        '<td><input type="text" name="plotlength[]" required="" style="border: none; width: 100%; text-align: center;" value="' + plotLength + '"></td>' +
        '<td><input type="text" name="areasqrft[]" required="" style="border: none; width: 100%; text-align: center;" value="' + areaSqrft + '"></td>' +
        '<td><input type="text" name="areasqrmt[]" required="" style="border: none; width: 100%; text-align: center;" value="' + areaSqrmt + '"></td>' +
        '<td><input type="text" name="east[]" required="" style="border: none; width: 100%; text-align: center;" value="' + East + '"></td>' +
        '<td><input type="text" name="west[]" required="" style="border: none; width: 100%; text-align: center;" value="' + West + '"></td>' +
        '<td><input type="text" name="south[]" required="" style="border: none; width: 100%; text-align: center;" value="' + South + '"></td>' +
        '<td><input type="text" name="north[]" required="" style="border: none; width: 100%; text-align: center;" value="' + North + '"></td>' +
        '<td><input type="text" name="rate[]" required="" style="border: none; width: 100%; text-align: center;" value="' + Rate + '"></td>' +
        '<td><input type="text" name="amount[]" required="" style="border: none; width: 100%; text-align: center;" value="' + Amount + '"></td>' +
        '<td style="text-align:center; color:#FF0000"><button class="delete-row"><i class="fa fa-trash-o"></i></button></td>' +
    '</tr>';

                                // <button type="button" class="btn1 btn-outline-danger delete-row"><i class="fa fa-trash-o"></i></button>
                                // </td></tr>';
               $(".add_more").append(markup);
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
            }
        );
        // Find and remove selected table rows
        $("tbody").delegate(".delete-row", "click", function() {
            var mpsqnty=$(this).parents("tr").find('input[name="mpsqnty[]"]').val()
            var grandtotal1 =$('#grandtotal1').val();
            var total1= parseFloat(grandtotal1)-parseFloat(mpsqnty)
            $('#grandtotal1').val(total1);
            $(this).parents("tr").remove();
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
        $(".add-row-image").click(function()  {
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
var srNo=$(".new-row").length;
            srNo= parseInt(srNo)+parseInt(1);


                var markup =
                    '<tr class="new-row">' +
                        '<td style="text-align:center;">' + srNo + '</td>' +
                       '<td><input type="hidden" name="layout_image[]" value="' + imageSrc + '"><img src="' + imageSrc + '" style="max-width: 50px; max-height: 50px;"></td>' +
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
    $("tbody").on("click", ".editrenderdelete-row-image", function() {
   var deleteLayoutImageUrl = "{{ route('project.delete-layout-image', ':imageId') }}";
var row = $(this).closest("tr");

var imageId = row.data('image-id');

// Replace ':imageId' with the actual image ID
var url = deleteLayoutImageUrl.replace(':imageId', imageId);

$.ajax({
type: 'get',
url: url, // Use the generated URL
data: {},
success: function(response) {
row.remove();
},
error: function(error) {
console.error('Error deleting image:', error);
}
});
});
</script>


<script>
    var deleteLayoutDataUrl = '{{ route("project.delete-layout-data", ":id") }}';

$("tbody").on("click", ".editrenderdelete-row-data", function() {
var row = $(this).closest("tr");

// Use .attr() to get the value of the data-id attribute
var dataId = $(this).attr('data-id');

// Replace :id in the route with the actual dataId
var url = deleteLayoutDataUrl.replace(':id', dataId);

$.ajax({
type: 'GET', // Use GET instead of DELETE
url: url,
success: function(response) {
row.remove();
},
error: function(error) {
console.error('Error deleting data:', error);
}
});
});
</script>



<script>
    $("tbody").on("click", ".editrenderdelete-row-faqs", function() {
        var row = $(this).closest("tr");

        // Use .attr() to get the value of the data-id attribute
        var dataId = $(this).attr('data-id');

        $.ajax({
            type: 'get',
            url: '/project-delete-faqs/' + dataId, // Replace with your actual delete route
            success: function(response) {
                row.remove();
            },
            error: function(error) {
                console.error('Error deleting data:', error);
            }
        });
    });
</script>


{{-- script for faqs --}}

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


            var srNo=$(".appendrow2").length;
          srNo= parseInt(srNo)+parseInt(1);

            // srNo++;
            var markup =
    '<tr class="appendrow2">' +
        '<td style="text-align:center;">' + srNo + '</td>' +
        '<td><input type="text" name="question[]" required="" style="border:none; width: 100%;" value="' + question + '"></td>' +
        '<td><input type="text" name="answer[]" required="" style="border:none; width: 100%;" value="' + answer + '"></td>' +

        '<td style="text-align:center; color:#FF0000"><button class="delete-row-data"><i class="fa fa-trash-o"></i></button></td>' +
    '</tr>';

                                // <button type="button" class="btn1 btn-outline-danger delete-row-data"><i class="fa fa-trash-o"></i></button>
                                // </td></tr>';
               $(".add_more_faqs").append(markup);
                // Clear the input fields
            $('#question').val('');
            $('#answer').val('');
            //    $('#expense').val('');
            }
        );
        // Find and remove selected table rows
        $("tbody").delegate(".delete-row-data", "click", function() {
            var mpsqnty=$(this).parents("tr").find('input[name="mpsqnty[]"]').val()
            var grandtotal1 =$('#grandtotal1').val();
            var total1= parseFloat(grandtotal1)-parseFloat(mpsqnty)
            $('#grandtotal1').val(total1);
            $(this).parents("tr").remove();
    });
    });
</script>

{{-- to delete append data of faqs--}}

<script>
    $("tbody").on("click", ".editrenderdelete-row-faqs", function() {
   var deleteFaqsUrl = "{{ route('project.delete-faqs', ':id') }}";
    var row = $(this).closest("tr");

    // Use .attr() to get the value of the data-id attribute
    var dataId = $(this).attr('data-id');

    // Replace ':id' with the actual ID
    var url = deleteFaqsUrl.replace(':id', dataId);

    $.ajax({
    type: 'get',
    url: url, // Use the generated URL
    success: function(response) {
    row.remove();
    },
    error: function(error) {
    console.error('Error deleting data:', error);
    }
    });
    });
</script>


<script>
    function toggleTimeFields(dayId) {
    console.log("Toggling time fields for day ID: " + dayId);

    var checkbox = document.getElementById('is_close_' + dayId);
    var openCloseFields = document.querySelectorAll('#openCloseFields_' + dayId + ' input');

    if (checkbox.checked) {
    console.log("Checkbox is checked");
    openCloseFields.forEach(field => field.disabled = true);
    } else {
    console.log("Checkbox is not checked");
    openCloseFields.forEach(field => field.disabled = false);
    }
    }

    function initializeFields() {
    var checkboxes = document.querySelectorAll('[id^="is_close_"]');
    checkboxes.forEach(checkbox => {
    var dayId = checkbox.id.split('_')[2];
    toggleTimeFields(dayId);
    });
    }

    // Initialize fields on page load
    document.addEventListener('DOMContentLoaded', initializeFields);
</script>

@endsection
