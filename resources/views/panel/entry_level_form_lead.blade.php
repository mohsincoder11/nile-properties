@extends('panel.layout.header')

@section('main_container')



<div class="row">
    <div class="col-md-12">

        <div class="panel-body" style="padding:1px 5px 2px 5px;">

            <div class="col-md-12" style="margin-top:5px;">
                <!-- <label style="color:#000; background-color:#FFCC00; width:7%; height:25px; padding-top:5px;margin-top: 1vh;" align="center"><span class=""></span> <strong>Project Entry</strong></label> -->

                <a href="{{ route('crm_lead_management') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #990066;"><i
                            class="fa fa-plus"></i>Assign Lead</button>
                </a>
                <a href="{{ route('fetchentrylevelformleadStore') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #009999;"><i
                            class="fa fa-plus"></i>Add Lead</button>
                </a>
            </div>
        </div>
    </div>

</div>
<div class="row">
    <div class="col-md-12" style="text-align: center;margin-top: 5px;">
        <h6 class="panel-title" style="color:#FFFFFF; background-color:#006699; width:100%;height: 50%; font-size:16px;"
            align="center">
            <i class="fa fa-file-text"><label style="margin: 7px;">Add Lead</label> </i>
        </h6>
        <!-- <a href="project_entry.html"> <button id="on" type="button" class="btn mjks"
                                            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                                class="fa fa-plus"></i>Project Entry</button>
                                    </a> -->

    </div>
</div>

<!-- </div> -->
<div class="row">
    <div class="col-md-12" style="margin-top: 2vh;">
        <!-- <div class="panel panel-default" >
                           <div class="panel-body" > -->
        <!-- <div class="col-md-4"></div> -->
        <div>



            <form action="{{ route('entrylevelformleadStore') }}" method="post">


                @csrf
                <table width="100%">
                    <tr style="height:30px;">
                        <th width="3%">Name </th>
                        <th width="3%">Email</th>
                        <th width="3%">Mobile No.</th>
                        <th width="3%">WhatsApp No.</th>
                        <th width="3%">City</th>
                        <th width="3%">Address</th>
                        <th width="3%">Source Lead</th>


                        <th></th>

                    </tr>


                    <tr>
                        <td style="padding: 2px;" width="4%">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required />
                        </td>
                        <td style="padding: 2px;" width="4%">
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" required />
                        </td>
                        <td style="padding: 2px;" width="4%">
                            <input type="text" class="form-control" name="mobile" maxlength="10"
                                value="{{ old('mobile') }}" required />
                        </td>
                        <td style="padding: 2px;" width="4%">
                            <input type="text" class="form-control" name="whatsapp_no" maxlength="10"
                                value="{{ old('whatsapp_no') }}" required />
                        </td>
                        <td style="padding: 2px;" width="2%">
                            <select class="form-control select" data-live-search="true" name="city_id" required>
                                {{-- <option value="" disabled selected>Select City</option>
                                <option value="Nagpur">Nagpur</option>
                                <option value="Pune">Pune</option>
                                <option value="Indore">Indore</option> --}}
                                <option value="">--Select--</option>
                                @foreach ($city as $city_name)
                                <option value="{{$city_name->id}}" {{ old('city_id')==$city_name->id ? 'selected' :
                                    '' }}>{{$city_name->city}}</option>

                                @endforeach


                            </select>
                        </td>

                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="address" value="{{ old('address') }}"
                                required />
                        </td>
                        <td style="padding: 2px;" width="5%">
                            <input type="text" class="form-control" name="source_lead" value="{{ old('source_lead') }}"
                                required />
                        </td>

                        <td style="padding: 2px;" width="5%">
                            <button id="on" type="submit" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-plus"></i>ADD</button>
                        </td>
                    </tr>

                </table>



        </div>
        </form>
        <!-- </div>
                     </div> -->

    </div>
    <div class="row">
        <!-- <div class="col-md-3"></div> -->
        <div class="col-md-12" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <!-- <h5 class="panel-title" style="color:#FFFFFF; background-color:#754d35; width:100%; font-size:14px;" align="center"> <i class="fa fa-plus"></i> Added Party</h5> -->
            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Name </th>
                            <th>Email </th>
                            <th>Mobile Number</th>
                            <th>WhatsApp Number</th>
                            <th>City</th>
                            <th>Address</th>
                            {{-- <th>Employee Name</th> --}}
                            <th>Date</th>
                            <th>Employee Assign</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entryLevelLeads as $index=>$branch)



                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$branch->name}}</td>
                            <td>{{$branch->email}}</td>
                            <td>{{$branch->mobile}}</td>
                            <td>{{$branch->whatsapp_no}}</td>
                            {{-- <td>{{$branch->city_id}}</td> --}}
                            <td> @if($branch->city_name)
                                {{ $branch->city_name->city}}
                                @else
                                null
                                @endif</td>
                            <td>{{$branch->address}}</td>
                            {{-- <td>{{$branch->employee_name->name ?? ''}}</td> --}}
                            <td>
                                @if ($branch->created_at)
                                {{ $branch->created_at->format('d-m-Y') }}
                                @else
                                N/A
                                @endif
                            </td>
                            <td>
                                <select class="form-control select" data-live-search="true" id="employee_id"
                                    data-id="{{ $branch->id }}" name="employee_id" onchange="openModal(this)">
                                    <option value="">Select Employee</option>
                                    @foreach($employee as $emp)
                                    <option value="{{ $emp->id }}" {{ $branch->employee_id == $emp->id ? 'selected' : ''
                                        }}>
                                        {{ $emp->name }}
                                    </option>
                                    @endforeach
                                </select>
                            </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- END DEFAULT DATATABLE -->


        </div>
        <div class="col-md-4"></div>
    </div>
</div>
{{-- <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="popup3Label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="popup3Label">Lead Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Mobile</th>
                            <th>WhatsApp No.</th>
                            <th>City</th>
                            <th>Address</th>
                        </tr>
                    </thead>
                    <tbody id="leadDetailsBody">
                        <!-- Data will be dynamically populated here -->
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}

<div class="modal fade" id="confirmationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('update_entry_level_lead') }}" method="post">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input id="statusInput" type="hidden" name="employee_id">
                    <input id="table_idInput" type="hidden" name="id">
                    <p>Are you sure you want to assign the lead?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div style="position: fixed; bottom: 0; width: 100%;">
    <div class="col-md-12" style="width: 100%;">
        <div class="col-md-6" style="float: left; width: 50%;">
            @if ($errors->any())
            <div class="alert alert-danger mt-2"
                style="background-color: rgba(209, 215, 209, 0.1); color: #1f1e1e; border: 1px solid #d6dad6; padding: 10px; border-radius: 5px;">
                <ul style="margin: 0; padding: 0; list-style-type: none;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="col-md-6" style="float: left; width: 50%;">
            @if(session('success'))
            <div id="successscript" class="alert alert-success"
                style="background-color: rgba(209, 215, 209, 0.1); color: #1f1e1e; border: 1px solid #abafab; padding: 10px; border-radius: 5px;">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
</div>
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

@endsection

@section('js')
<script>
    // Function to open the modal and set selected option value and enquiry ID
   function openModal(select) {
var selectedEmployeeId = select.value;
var leadId = select.getAttribute('data-id'); // Get data-id from select element

$('#statusInput').val(selectedEmployeeId); // Set selected employee ID to statusInput
$('#table_idInput').val(leadId); // Set data-id (lead ID) to table_idInput

$('#confirmationModal').modal('show'); // Show the modal
}


</script>
@stop
