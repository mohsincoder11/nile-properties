@extends('panel.layout.header')
@section('main_container')



<!-- END X-NAVIGATION -->

<!-- <div class="page-content-wrap">
             <div class="row">
                        <div class="col-md-12">

                               <div class="panel-body" style="padding:1px 5px 2px 5px;">

                                        <div class="col-md-12" style="margin-top:5px;">
                            <label style="color:#000; background-color:#FFCC00; width:7%; height:25px; padding-top:5px;margin-top: 1vh;" align="center"><span class="fa fa-desktop"></span> <strong>Dashboard</strong></label>


                                            <a href="project_entry.html"> <button id="on" type="button" class="btn mjks"
                                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                                    class="fa fa-plus"></i>Project Entry</button>
                                        </a>
                                        <a href="#"> <button id="on" type="button" class="btn mjks"
                                            style="color:#FFFFFF; height:30px; width:auto;background-color: #990066;"><i
                                                class="fa fa-plus"></i>Enquiry</button>
                                    </a>

                                          </div>

                                </div>
                            </div>
                            </div>


                    </div> -->


{{-- --------------------------------------------------- --}}

<div class="row">
    <!-- <div class="col-md-3"></div> -->
    <div class="col-md-12" style="margin-top:15px;">

        <!-- START DEFAULT DATATABLE -->

        <!-- <h5 class="panel-title" style="color:#FFFFFF; background-color:#754d35; width:100%; font-size:14px;" align="center"> <i class="fa fa-plus"></i> Added Party</h5> -->

        <div class="col-md-12" style="text-align: center;margin-top: 5px;">
            <h6 class="panel-title"
                style="color:#FFFFFF; background-color:#1681b6; width:100%;height: 50%; font-size:16px;" align="center">
                <i class="fa fa-file-text"> &nbsp;<label style="margin: 7px;">Customer Enquiry Details</label> </i>
            </h6>

        </div>

        <div style="margin-top: 50px"></div>

        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Project Name</th>
                        <th>Plot No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Message</th>
                        <th>Action</th>
                        {{-- <th width="10%">Action</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($enquiry as $enquiries)
                    <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>
                            {{--
                            <pre>{{ print_r($enquiries, true) }}</pre> --}}

                            @if($enquiries->project_name)
                            {{$enquiries->project_name->project_name}}
                            @else
                            null
                            @endif

                            {{$enquiries->project_id}}
                        </td>
                        <td>{{$enquiries->plot_id}}</td>
                        <td>{{$enquiries->name}}</td>
                        <td>{{$enquiries->email}}</td>
                        <td>{{$enquiries->contact}}</td>
                        <td>{{$enquiries->message}}</td>
                        {{-- <td>read_client_registrations, read_layout, read_plot</td> --}}
                        <td>
                            {{-- <a href="#"><button
                                    style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    title="Edit Data"><i class="fa fa-pencil" style="margin-left:5px;"></i></button></a>
                            --}}

                            <a onclick="openDeleteModal('{{route('destroy-dash', $enquiries->id)}}')">
                                <button onclick="a(2);"
                                    style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                    title="Remove"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                            </a>
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


{{-- ---------------------------------------------------- --}}
</div>


<!-- START DEFAULT DATATABLE -->


</div>



</div>

<!-- PAGE CONTENT WRAPPER -->


</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->


@endsection
