@extends('panel.layout.header')
@section('main_container')
<style>
    .modal-lg {
        max-width: 80%;
        /* Adjust the percentage to make the modal larger or smaller */
    }

    .modal-content {
        border-radius: 10px;
        border: none;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
    }
</style>
<div class="page-content-wrap">

    <div class="row">
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
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12" style="text-align: center;margin-top: 5px;">
            <h6 class="panel-title"
                style="color:#FFFFFF; background-color:#006699; width:100%;height: 50%; font-size:16px;" align="center">
                <i class="fa fa-file-text"><label style="margin: 7px;">Added Project Entry</label> </i>
            </h6>

        </div>
        <div class="col-md-12">

            <!-- START DEFAULT DATATABLE -->

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable" style="overflow:auto !important;">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Branch</th>
                            <th>Project Code</th>

                            <th>Project Name</th>

                            <th>Area (Sq. Ft)</th>
                            <th>Area (Sq. Mt)</th>

                            <th>No.of Plots</th>

                            <th>Mauja</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <!-- Add this inside your table -->
                    <tbody>
                        @foreach ($projects as $index => $project)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $project->cityname->city ?? null }}</td>
                            <td>{{ $project->project_code ?? null }}</td>
                            <td>{{ $project->project_name ?? null }}</td>
                            <td>{{ $project->areasqrft_manual ?? null }}</td>
                            <td>{{ $project->areasqrmt_manual ?? null }}</td>
                            <td>{{ $project->no_of_plots ?? null }}</td>
                            <td>{{ $project->mauja ?? null }}</td>
                            <td>
                                <button data-bs-toggle="modal" data-bs-target="#service-area-view"
                                    style="background-color:#1abc3d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                    type="button" class="btn btn-info serviceareaview" id="{{ $project->id }}"
                                    data-toggle="tooltip" data-placement="top" title="View"><i class="fa fa-eye"
                                        style="margin-left:5px;"></i></button>

                                {{-- <a href="javascript:void(0)" data-bs-toggle="modal"
                                    data-bs-target="#service-area-view" class="btn btn-primary serviceareaview"
                                    id="{{ $item->area_id }}">View</a> --}}

                                <a href="{{ route('project.edit', $project->id) }}"
                                    style="background-color: #3399ff; border: none; max-height: 25px; margin-top: -5px; margin-bottom: -5px;"
                                    class="btn btn-info" data-toggle="tooltip" data-placement="top" title="Edit">
                                    <i class="fa fa-edit" style="margin-left: 5px;"></i>
                                </a>
                                <form action="{{ route('project.destroy', $project->id) }}" method="POST"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button
                                        style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                        type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                        title="Delete"><i class="fa fa-trash-o" style="margin-left:5px;"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <div style="position: fixed; bottom: 0; width: 100%;">
        <div class="col-md-12" style="width: 100%;">
            <div class="col-md-6" style="float: left; width: 50%;">
                @if ($errors->any())
                <div class="alert alert-danger mt-2"
                    style="background-color: rgba(209, 215, 209, 0.1); color: #1f1e1e; border: 1px solid #abafab; padding: 10px; border-radius: 5px;">
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
<div id="service-area-view" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true" style="max-width: 100vw; width: 99%;">
    <!-- Adjust the inline CSS to set maximum width and width to 99% -->
    <div class="modal-dialog" style="max-width: none; width: 99%;">
        <!-- Remove the modal-lg class to allow for maximum size -->
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span
                            aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="H4">Project Entry Details</h4>
                </div>
            </div>
            <div class="modal-body" id="appendbodyserviceareaview">
                <!-- Your content here -->
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
</div>


<!-- START DEFAULT DATATABLE -->


</div>



</div>

<!-- PAGE CONTENT WRAPPER -->


</div>
<!-- END PAGE CONTENT -->
</div>

@stop
@section('js')
<script>
    $(document).on('click', '.serviceareaview', function() { $("#service-area-view").modal({

        backdrop: "static",
        keyboard: false,
        });
        var entry_id = $(this).attr('id');
        $("#appendbodyserviceareaview").empty();
        $.ajax({
        url: 'viewservicearea',
        type: 'get',
        data: {
        entry_id: entry_id

        },
        dataType: 'json',
        success: function(data) {
        $("#appendbodyserviceareaview").html(data.html);
        }
        });
        });
</script>
@stop
