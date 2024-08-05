@extends('panel.layout.header')

@section('main_container')

<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12" style="margin-top:5px;">
            <label style="color:#000; background-color:#FFCC00; width:7%; height:25px; padding-top:5px;margin-top: 1vh;"
                align="center"><span class="fa fa-desktop"></span> <strong>Masters</strong></label>


            <a href="{{route('city_master')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #993800;"><i
                        class="fa fa-database"></i>City/Occupation/Layout Feature/Plot Sale Status/Transaction Type
                    Masters</button>
            </a>
            <a href="{{route('branch')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                        class="fa fa-sitemap"></i>Branch</button>
            </a>
            <a href="{{route('firm_reg')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                        class="fa fa-sitemap"></i>Firm</button>
            </a>

            <a href="{{route('agent_reg')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #218dbb;"><i
                        class="fa fa-users"></i>Agent/Broker Registration</button>
            </a>

            <a href="{{route('emp_reg')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #540338; "><i
                        class="fa fa-user"></i>Employee Registration</button>
            </a>
            <a href="{{route('customerReg')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #8dd510; "><i
                        class="fa fa-user"></i>Customer Registration</button>
            </a>
            <a href="{{route('agrrementmaster')}}"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #d5cb10; "><i
                        class="fa fa-user"></i>Agreement Master
                </button>
            </a>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12 panel panel-default" style="margin-top: 5px;">
            <h5 class="panel-title"
                style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                align="center"><i class="fa fa-file"></i> &nbsp;
                Agreement Master
            </h5>
        </div>
        <div class="col-md-12">
            <div class="form-group" style="margin-top:10px;">
                <div class="col-md-4" style="margin-top:15px;"></div>

                <div class="col-md-2" style="margin-top:15px;">
                    <label>Document Name</label>
                    <td style="padding: 2px;" width="3%">
                        <input type="text" class="form-control" name="name" placeholder="" />
                    </td>
                </div>
                <div class="col-md-2" style="margin-top:15px;">
                    <label> Language</label>
                    <select name="layout_id" id="layout_id" required="" class="form-control select"
                        data-live-search="true">
                        <option value="">English</option>
                        <option value="">Hindi</option>
                        <option value="">Marathi</option>

                    </select>
                </div>


            </div>
        </div>


    </div>
    <div class="row">

        <div class="col-md-2" style="margin-top: 1vh;"></div>
        <div class="col-md-10" style="margin-top: 1vh;">
            <table style=" width: 78% !important;">


                <tr>

                    <td style="padding: 2px;">
                        <div id="editor" style="height: 500px; "></div>
                    </td>





                </tr>

            </table>
        </div>
        <div class="col-md-2" style="margin-top: 1vh;"></div>

    </div>
    <div align="center" style="margin-top:1%;">
        <button id="on" type="button" class="btn mjks"
            style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i class="fa fa-floppy-o"
                aria-hidden="true"></i>
            Submit</button>
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
                            <th>Document Name</th>
                            <th>Language</th>
                            <th>Description</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Saudaa Chitthi</td>
                            <td>Hindi</td>

                            <td>plot no 1234.</td>


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
