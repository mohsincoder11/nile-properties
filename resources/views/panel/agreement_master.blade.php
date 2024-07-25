@extends('panel.layout.header')

@section('main_container')

<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12 panel panel-default" style="margin-top: 5px;">
            <h5 class="panel-title"
                style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                align="center"><i class="fa fa-file"></i> &nbsp;
                Notification
            </h5>
        </div>
        <div class="col-md-2" style="margin-top: 1vh;"></div>
        <div class="col-md-8" style="margin-top: 1vh;">
            <table width="100%">
                <tr style="height:30px;">
                    <th width="2%">Title</th>
                    <th width="3%">Add Notification</th>

                    <th width="1%">Select User</th>

                    <th width="2%"></th>
                </tr>


                <tr>
                    <td style="padding: 2px;" width="2%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>

                    <td style="padding: 2px;" width="2%">
                        <textarea rows="2" cols="20" class="form-control" id="editor" placeholder=""
                            name=" "></textarea>
                    </td>


                    <td style="padding: 2px;" width="1%">
                        <select class="form-control select" data-live-search="true">
                            <option>All Users</option>
                            <option>User 1</option>
                            <option>User 2</option>

                        </select>
                    </td>

                    <td>
                        <button id="on" type="button" class="btn mjks"
                            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                class="fa fa-floppy-o" aria-hidden="true"></i>
                            Submit</button>
                    </td>
                </tr>

            </table>
        </div>

    </div>
    <div class="row">
        <div class="col-md-2" style="margin-top: 2vh;"></div>
        <div class="col-md-8" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Title</th>
                            <th>Added Notification</th>
                            <th>Selected User</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Test</td>
                            <td>Test Test</td>

                            <td>Employee</td>


                            <td>

                                <button
                                    style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
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

            <!-- END DEFAULT DATATABLE -->


        </div>
    </div>

</div>

@stop
@section('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script>
    // Initialize Quill
        var quill = new Quill('#editor', {
          theme: 'snow' // You can choose a different theme if you prefer
        });
        // Function to update the hidden input with Quill content and submit the form
        function submitForm() {
          var editorContent = document.querySelector('.ql-editor').innerHTML;
          document.getElementById('editor-content').value = editorContent;
          // Submit the form
          document.getElementById('myForm').submit();
        }
</script>
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
@stop
