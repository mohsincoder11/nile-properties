@extends('panel.layout.header')

@section('main_container')

@include('panel.layout.alerts')

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
        @if(isset($PlotTransfer_edit) && $PlotTransfer_edit!=null)
        <form action="{{ route('plot-transfers.update', $PlotTransfer_edit->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="col-md-12" style="margin-top: 5px;">
                <h3>Edit Basic Details</h3>
                <table width="100%">
                    <thead>
                        <tr style="height:30px;">
                            <th>Application Number</th>
                            <th>Full Name</th>
                            <th>Email</th>
                            <th>Mobile Number</th>
                            <th>Alternate Number</th>
                            <th>Upload Photo</th>
                            @if ($PlotTransfer_edit->upload_photo)
                            <th>File</th>
                            @endif

                            <th>DOB</th>
                            <th>City</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr width="100%">
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" name="application_number" value="{{ $PlotTransfer_edit->application_number }}" placeholder="" readonly />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" name="full_name" value="{{ $PlotTransfer_edit->full_name }}" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="4%">
                                <input type="text" class="form-control" name="email" value="{{ $PlotTransfer_edit->email }}" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" name="mobile_number" value="{{ $PlotTransfer_edit->mobile_number }}" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" name="alternate_number" value="{{ $PlotTransfer_edit->alternate_number }}" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="file" class="form-control" name="upload_photo" placeholder="" />
                               
                            </td>
                            @if ($PlotTransfer_edit->upload_photo)
                            <td style="padding: 2px;" width="1%">
                               <a href="{{asset($PlotTransfer_edit->upload_photo) }}" target="_blank"> <img src="{{asset($PlotTransfer_edit->upload_photo) }}" width="100" height="100" /></a>
                            </td>
                            @endif

                            <td style="padding: 2px;" width="3%">
                                <input type="date" class="form-control" name="dob" value="{{ $PlotTransfer_edit->dob }}" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" name="city" value="{{ $PlotTransfer_edit->city }}" placeholder="" />
                            </td>
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
                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" name="address" value="{{ $PlotTransfer_edit->address }}" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" name="nationality" value="{{ $PlotTransfer_edit->nationality }}" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" name="state" value="{{ $PlotTransfer_edit->state }}" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" name="company_name" value="{{ $PlotTransfer_edit->company_name }}" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="3%">
                                <input type="text" class="form-control" name="pincode" value="{{ $PlotTransfer_edit->pincode }}" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" name="ownership_change" value="{{ $PlotTransfer_edit->ownership_change }}" placeholder="" />
                            </td>
                            <td style="padding: 2px;" width="5%">
                                <input type="text" class="form-control" name="designation" value="{{ $PlotTransfer_edit->designation }}" placeholder="" />
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="col-md-12" style="margin-top:2vh;margin-bottom: 1vh;" align="right">
                    <button id="on" class="btn mjks" type="submit"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                        <i class="fa fa-plus" aria-hidden="true"></i>update</button>
                        <a href="{{ route('plot.transfer') }}" id="on" class="btn mjks" type="submit"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #a4a4a4;">
                        <i class="fa fa-times" aria-hidden="true"></i>Cancel</a>
                </div>
            </div>
        </form>
        
        @else
        <form action="{{ route('plot-transfers.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                            <input type="text" class="form-control" name="application_number" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="full_name" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="4%">
                            <input type="text" class="form-control" name="email" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="mobile_number" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="alternate_number" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="file" class="form-control" name="upload_photo" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="date" class="form-control" name="dob" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="city" placeholder="" />
                        </td>
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
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="address" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="nationality" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="state" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="company_name" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="pincode" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="ownership_change" placeholder="" />
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="designation" placeholder="" />
                        </td>
                    </tr>
                </tbody>
            </table>


            <div class="col-md-12" style="margin-top:2vh;margin-bottom: 1vh;" align="right">

                 <button id="on"  class="btn mjks" type="submit"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                        <i class="fa fa-plus" aria-hidden="true"></i>Submit</button>

            </div>

        </div>
    </form>
    @endif
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
                    @foreach ($PlotTransfer as $index => $pt)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $pt->application_number }}</td>
                        <td>{{ $pt->full_name }} / {{ $pt->dob }}</td>
                        <td>{{ $pt->mobile_number }} / {{ $pt->alternate_number }}</td>
                        <td>
                            @if ($pt->upload_photo)
                              <a href="{{ asset($pt->upload_photo) }}" target="_blank">  <img src="{{ asset($pt->upload_photo) }}" width="20" height="20" /></a>
                            @else
                                No File
                            @endif
                        </td>
                        <td>{{ $pt->city }} / {{ $pt->address }} / {{ $pt->pincode }}</td>
                        <td>{{ $pt->nationality }} / {{ $pt->state }}</td>
                        <td>{{ $pt->company_name }}</td>
                        <td>{{ $pt->ownership_change }}</td>
                        <td>{{ $pt->designation }}</td>
                        <td>
                            <a href="{{ route('plot-transfers.edit', $pt->id) }}"
                                style="background-color:#0d710d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></a>
                                <a onclick="openDeleteModal('{{ route('plot-transfers.delete', $pt->id) }}')">
                                    <button
                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info" data-toggle="tooltip"
                                        data-placement="top" title="Delete">
                                        <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                                    </button>
                                </a>

                        </td>
                    </tr>
                @endforeach


                </tbody>
            </table>
        </div>
        <div class="col-md-12">
            <img src="{{ asset('/panel/img/line.png') }}" width="100%" />
        </div>
       
        @if(isset($PersonalDetail_edit) && $PersonalDetail_edit!=null)
        <form action="{{ route('personal-details.update', $PersonalDetail_edit->id) }}" method="POST">
            @csrf
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
                        <input type="text" class="form-control" name="spouse_name" value="{{ $PersonalDetail_edit->spouse_name }}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="spouse_mobile" value="{{ $PersonalDetail_edit->spouse_mobile }}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="anniversary" value="{{ $PersonalDetail_edit->anniversary }}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <input type="text" class="form-control" name="father_name" value="{{ $PersonalDetail_edit->father_name }}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <input type="text" class="form-control" name="mother_name" value="{{ $PersonalDetail_edit->mother_name }}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="nominee" value="{{ $PersonalDetail_edit->nominee }}" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="nominee_mobile" value="{{ $PersonalDetail_edit->nominee_mobile }}" placeholder="" />
                    </td>
                </tr>
            </table>
    
        </div>

        <div class="col-md-12" style="margin-top:2vh;margin-bottom: 1vh;" align="right">

            <a> <button id="on" type="submit" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                    <i class="fa fa-plus" aria-hidden="true"></i>Update</button></a>

        </div>
        </form>
        @else
        <form action="{{ route('personal-details.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                        <input type="text" class="form-control" name="spouse_name" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="spouse_mobile" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="anniversary" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <input type="text" class="form-control" name="father_name" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="2%">
                        <input type="text" class="form-control" name="mother_name" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="nominee" placeholder="" />
                    </td>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="nominee_mobile" placeholder="" />
                    </td>
                </tr>
            </table>
            
        </div>

        <div class="col-md-12" style="margin-top:2vh;margin-bottom: 1vh;" align="right">

            <a> <button id="on" type="submit" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;">
                    <i class="fa fa-plus" aria-hidden="true"></i>Submit</button></a>

        </div>
    </form>
    @endif

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
                    @foreach ($PersonalDetail as $index => $p_detail)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $p_detail->spouse_name }}</td>
                        <td>{{ $p_detail->spouse_mobile }}</td>
                        <td>{{ $p_detail->anniversary }}</td>
                        <td>{{ $p_detail->father_name }}</td>
                        <td>{{ $p_detail->mother_name }}</td>
                        <td>{{ $p_detail->nominee }}</td>
                        <td>{{ $p_detail->nominee_mobile }}</td>
                        <td>
                            <a href="{{ route('personal-details.edit', $p_detail->id) }}"
                                style="background-color:#0d710d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                title="Edit"><i class="fa fa-edit" style="margin-left:5px;"></i></a>
                                <a onclick="openDeleteModal('{{ route('personal-details.delete', $p_detail->id) }}')">
                                    <button
                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="button" class="btn btn-info" data-toggle="tooltip"
                                        data-placement="top" title="Delete">
                                        <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                                    </button>
                                </a>

                        </td>
                    </tr>
                    @endforeach


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
