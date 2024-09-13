@extends('panel.layout.header')

@section('main_container')
   

    <div class="page-content-wrap">
        <!-- <div class="page-content-wrap">
                         -->
                         <div class="row">
                            <div class="col-md-12" style="margin-top:5px;">
                                <a href="{{ route('expense.master') }}"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #d54e10; "><i
                                            class="fa fa-user"></i>Expense
                                        Masters</button>
                                </a>
                    
                                <a href="{{ route('expense.income') }}"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #990066;"><i
                                            class="fa fa-plus"></i>Income/Billing</button>
                                </a>
                                <a href="{{ route('expense.entry') }}"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #009999;"><i
                                            class="fa fa-plus"></i>Expense
                                        Entry</button>
                                </a>
                            </div>
                        </div>
        <!-- </div> -->
        <div class="row">
            <div class="col-md-12" style="text-align: center;margin-top: 5px;">
                <h6 class="panel-title"
                    style="color:#FFFFFF; background-color:#d54e10; width:100%;height: 50%; font-size:16px;" align="center">
                    <i class="fa fa-file-text"><label style="margin: 7px;">Expense Master</label> </i>
                </h6>


            </div>
            <div class="col-md-6" style="margin-top: 2vh;">
                <h3 style="font-weight: bold;">Expense Category</h3>
                <form action="{{ route('expence_category_create') }}" method="post">
                    @csrf
                    <div class="col-md-12" style="margin-top: 2vh;">
                        <table width="50%">
                            <tr style="height:30px;">

                                <th width="5%">Add Expense Category</th>

                                <th width="1%"></th>
                            </tr>


                            <tr>


                                <td style="padding: 2px;" width="1%">
                                    <input type="text" class="form-control" name="expence_category" placeholder="" />
                                </td>

                                <td>
                                    <button id="on" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                            class="fa fa-floppy-o" aria-hidden="true"></i>
                                        Submit</button>
                                </td>
                            </tr>

                        </table>
                    </div>
                </form>
                <div class="col-md-12" style="margin-top: 2vh;">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Added Expense Category</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expence_categorys as $expence_category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $expence_category->expence_category }}</td>

                                    <td>

                                        <a href="{{ route('edit_expence_category', $expence_category->id) }}">
                                            <button
                                                style="background-color:#0d710d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"
                                                    style="margin-left:5px;"></i></button>
                                        </a>
                                        <a href="{{ route('expence_category_delete', $expence_category->id) }}" onclick="return confirm('Are you sure, want to delete this?')">
                                            <button
                                                style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                    style="margin-left:5px;"></i></button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6" style="margin-top: 2vh;">
                <h3 style="font-weight: bold;">Expense Head</h3>
                <form action="{{ route('expence_category_head') }}" method="post">
                    @csrf
                    <div class="col-md-12" style="margin-top: 2vh;">
                        <table width="100%">
                            <tr style="height:30px;">

                                <th width="25%">Select Expense Category</th>

                                <th width="25%" style="padding-left: 1vh;">Add Expense Head</th>

                            </tr>


                            <tr>


                                <td style="padding: 2px;" width="25%">
                                    <select class="form-control select" data-live-search="true" id="expence_category_id">
                                        <option value="">Select</option>
                                        @foreach ($expence_categorys as $expence)
                                            <option value="{{ $expence->id }}">{{ $expence->expence_category }}</option>
                                        @endforeach

                                    </select>
                                </td>
                                <td style="padding: 2px;padding-left: 1vh;" width="25%">
                                    <input type="text" class="form-control" id="expence_head" placeholder="" />
                                </td>
                                <td class="col-md-2" style="margin-top:20px;" align="left">
                                    <button id="on" type="button" class="btn mjks add-row"
                                        style="color:#FFFFFF; height:30px; width:auto;">
                                        <i class="fa fa-plus "></i></button>
        
                                </td>
                                <div class="col-md-6" style="margin-top:10px;" align="right">
                                    <table width="100%" border="1" style="margin-top:10px;">
                                        <tr style="background-color:#f0f0f0; height:30px;">
                                            <th width="20%" style="text-align:center">Expence Name</th>
                                            <th width="20%" style="text-align:center">Expence Head</th>
                                             <th width="20%" style="text-align:center">Action</th>
                                        </tr>
        
        
                                        <tbody class="add_more">
        
        
        
                                        </tbody>
                                    </table>
                                </div>

                                <td>
                                    <button id="on" type="submit" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;margin:5%"><i
                                            class="fa fa-floppy-o" aria-hidden="true"></i>
                                        Submit</button>
                                </td>
                            </tr>

                        </table>
                    </div>
                </form>
                <div class="col-md-6" style="margin-top: 2vh;">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Selected Expense Category</th>
                                <th>Added Expense Head</th>

                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($expence_head as $expence_heads)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $expence_heads->expence_name->expence_category ?? '' }}</td>

                                    <td>{{ $expence_heads->expence_head }}</td>
                                    <td>

                                        <a href="{{ route('edit_expence_head', $expence_heads->id) }}">
                                            <button
                                                style="background-color:#0d710d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"
                                                    style="margin-left:5px;"></i></button>
                                        </a>
                                        <a href="{{ route('expence_head_delete', $expence_heads->id) }}" onclick="return confirm('Are you sure, want to delete this?')">
                                            <button
                                                style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                    style="margin-left:5px;"></i></button>
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
    {{-- <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
        <div class="mb-container">
            <div class="mb-middle">
                <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                <div class="mb-content">
                    <p>Are you sure you want to log out?</p>
                    <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                </div>
                <div class="mb-footer">
                    <div class="pull-right">
                        <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                        <button class="btn btn-default btn-lg mb-control-close">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MESSAGE BOX-->

    <!-- START PRELOADS -->
    <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
    <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
    <!-- END PRELOADS -->
    <!-- START SCRIPTS -->
    <script type="text/javascript" src="../../js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- END PLUGINS -->
    <!-- THIS PAGE PLUGINS -->
    <script type='text/javascript' src='../../js/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="../../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-file-input.js"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-select.js"></script>
    <script type="text/javascript" src="../../js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dropzone/dropzone.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/fileinput/fileinput.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/filetree/jqueryFileTree.js"></script>
    <!-- END PAGE PLUGINS -->
    <!-- START TEMPLATE -->
    <script type="text/javascript" src="../../js/plugins.js"></script>
    <script type="text/javascript" src="../../js/actions.js"></script>
    <!-- END TEMPLATE -->


    <script>
        $(function () {
            $("#file-simple").fileinput({
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-danger",
                fileType: "any"
            });
            $("#filetree").fileTree({
                root: '/',

                expandSpeed: 100,
                collapseSpeed: 100,
                multiFolder: false
            }, function (file) {
                alert(file);
            }, function (dir) {
                setTimeout(function () {
                    page_content_onresize();
                }, 200);
            });
        });
    </script>
</body>

</html> --}}
@endsection
@section('js')
<script>
    $(document).ready(function() {
                    $(".add-row").click(function() {
                        var expence_category_id = $('#expence_category_id').val();
                        console.log(expence_category_id);
                        var expence_category = $('#expence_category_id option:selected').text();
                        var expence_head = $('#expence_head').val();

                        // Check if any of the fields are empty
                        if (expence_category_id === '' || expence_head === '') {
                            // If any field is empty, show a message
                            alert('Please fill all the fields before appending.');
                        } else {
                            // If all fields are filled, proceed with appending
                            var markup =
                                '<tr>' +
                                '<td>' +
                                '<input type="hidden" name="expence_category_id[]" required="" style="border:none; width: 20%;" value="' + expence_category_id + '">' +
                                '<input type="text" required="" style="border:none; width: 100%;" value="' + expence_category.trim() + '">' +
                                '</td>' + '<td>' +
                                '<input type="text" name="expence_head[]" required="" style="border:none; width: 100%;" value="' + expence_head + '">' +
                                '</td>' +
                                '<td style="text-align:center; color:#FF0000">' +
                                '<button class="delete-row"><i class="fa fa-trash-o"></i></button>' +
                                '</td>' +
                                '</tr>';

                            $(".add_more").append(markup);

                            // Clear the input fields

                            $('#expence_head').val('');
                        }
                    });

                    $("tbody").delegate(".delete-row", "click", function() {
                        $(this).parents("tr").remove();
                    });
                });
</script>
@stop