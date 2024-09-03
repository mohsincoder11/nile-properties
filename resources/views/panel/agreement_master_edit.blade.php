@extends('panel.layout.header')

@section('main_container')
    <style>
        /* Style for the modal backdrop */
        .modal-backdrop {
            position: fixed;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: transparent !important;
        }

        /* Ensure the modal content has proper styling */
        .modal-content {
            position: relative;
            background-color: #fff;
            /* Background color of the modal */
            /* border-radius: 0.3rem; */
            /* box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); */
        }

        /* Optional: Custom styling for the modal */
        /* Ensure modal body scrolls if content overflows */
        .modal-dialog {
            max-height: 90vh;
            /* Adjust this value as needed */
            overflow: hidden;
        }

        .modal-content {
            height: 100%;
            display: flex;
            flex-direction: column;
        }

        .modal-body {
            overflow-y: auto;
            /* Optionally set max-height for modal body */
            max-height: calc(90vh - 120px);
            /* Adjust as needed, considering header and footer height */
        }

        .modal-footer {
            /* Ensure footer does not affect the body scroll */
            margin-top: auto;
        }
    </style>
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12" style="margin-top:5px;">
                <label style="color:#000; background-color:#FFCC00; width:7%; height:25px; padding-top:5px;margin-top: 1vh;"
                    align="center"><span class="fa fa-desktop"></span> <strong>Masters</strong></label>


                <a href="{{ route('city_master') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #993800;"><i
                            class="fa fa-database"></i>City/Occupation/Layout Feature/Plot Sale Status/Transaction Type
                        Masters</button>
                </a>
                <a href="{{ route('branch') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                            class="fa fa-sitemap"></i>Branch</button>
                </a>
                <a href="{{ route('firm_reg') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                            class="fa fa-sitemap"></i>Firm</button>
                </a>

                <a href="{{ route('agent_reg') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #218dbb;"><i
                            class="fa fa-users"></i>Agent/Broker Registration</button>
                </a>

                <a href="{{ route('emp_reg') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #540338; "><i
                            class="fa fa-user"></i>Team Registration</button>
                </a>
                <a href="{{ route('customerReg') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #8dd510; "><i
                            class="fa fa-user"></i>Customer Registration</button>
                </a>
                <a href="{{ route('agrrementmaster') }}"> <button id="on" type="button" class="btn mjks"
                        style="color:#FFFFFF; height:30px; width:auto;background-color: #d5cb10; "><i
                            class="fa fa-user"></i>Agreement Master
                    </button>
                </a>


            </div>
        </div>



        <form id="myForm" method="POST" action="{{ route('agreement-master.update', $agreement->id) }}">
            @csrf
            @method('POST')
            <!-- Use PUT if you're using the conventional method for updating -->

            <div class="row">
                <div class="col-md-12 panel panel-default" style="margin-top: 5px;">
                    <h5 class="panel-title"
                        style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                        align="center"><i class="fa fa-file"></i> &nbsp;
                        Edit Agreement Master
                    </h5>
                </div>
                <div class="col-md-12">
                    <div class="form-group" style="margin-top: 10px;">
                        <div class="col-md-4" style="margin-top: 15px;"></div>
                        <div class="col-md-2" style="margin-top: 15px;">
                            <label>Document Name</label>
                            <input type="text" class="form-control" name="document_name"
                                value="{{ $agreement->document_name }}" />
                        </div>
                        <div class="col-md-2" style="margin-top: 15px;">
                            <label>Language</label>
                            <select name="language" id="language" required class="form-control select"
                                data-live-search="true">
                                <option value="English" {{ $agreement->language == 'English' ? 'selected' : '' }}>English
                                </option>
                                <option value="Hindi" {{ $agreement->language == 'Hindi' ? 'selected' : '' }}>Hindi
                                </option>
                                <option value="Marathi" {{ $agreement->language == 'Marathi' ? 'selected' : '' }}>Marathi
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2" style="margin-top: 1vh;"></div>
                <div class="col-md-10" style="margin-top: 1vh;">
                    <table style="width: 78% !important;">
                        <tr>
                            <td style="padding: 2px;">
                                <div id="editor" style="height: 500px;">{!! $agreement->description !!}</div>
                                <input type="hidden" name="description" id="editor-content">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-2" style="margin-top: 1vh;"></div>
            </div>
            <div align="center" style="margin-top: 1%;">
                <button id="on" type="button" class="btn mjks" onclick="submitForm()">
                    <i class="fa fa-floppy-o" aria-hidden="true"></i> Update
                </button>
            </div>
        </form>

    </div>

@stop

@section('js')
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Initialize Quill editor with full toolbar
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'font': []
                    }, {
                        'size': []
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'script': 'super'
                    }, {
                        'script': 'sub'
                    }],
                    [{
                        'header': '1'
                    }, {
                        'header': '2'
                    }, 'blockquote', 'code-block'],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }, {
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'direction': 'rtl'
                    }, {
                        'align': []
                    }],
                    ['link', 'image', 'video', 'formula'],
                    ['clean']
                ]
            }
        });

        // Set the editor content
        quill.root.innerHTML = {!! json_encode($agreement->description) !!};

        function submitForm() {
            var editorContent = quill.root.innerHTML;
            document.getElementById('editor-content').value = editorContent;
            document.getElementById('myForm').submit();
        }
    </script>
@stop
