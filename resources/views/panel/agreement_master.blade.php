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

    <form id="myForm" method="POST" action="{{ route('agrrementmaster.store') }}">
        @csrf
        <div class="row">
            <div class="col-md-12 panel panel-default" style="margin-top: 5px;">
                <h5 class="panel-title"
                    style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                    align="center"><i class="fa fa-file"></i> &nbsp;
                    Agreement Master
                </h5>
            </div>
            {{-- <div class="col-md-12" style="display: flex; justify-content: flex-end; gap: 2px; "> @php
                $files = [
                'Agreement' => 'Agreement.html',
                'Receipt' => 'Receipt.html',
                'Saudachithhi' => 'Saudachithhi.html',
                'Saudhachithhi NATP' => 'Saudhachithhi_NATP.html',
                'Agreement NATP' => 'Agreement_NATP.html',

                ];
                @endphp

                @foreach ($files as $label => $fileName)
                @php
                $filePath = public_path("sample_agreement/{$fileName}");
                @endphp

                @if (file_exists($filePath))
                <a href='{{ asset("sample_agreement/$fileName") }}' target="_blank">
                    <button id="on" type="button" class="btn mjks"
                        style="color: #FFFFFF; height: 30px; width: auto; background-color: #006699;">
                        <i class="fa fa-file-pdf-o"></i> {{ $label }}
                    </button>
                </a>
                @else
                <button id="on" type="button" class="btn mjks"
                    style="color: #FFFFFF; height: 30px; width: auto; background-color: #006699;" disabled>
                    <i class="fa fa-file-pdf-o"></i> {{ $label }} (Not Available)
                </button>
                @endif
                <br><br>
                @endforeach
            </div> --}}
            <div class="col-md-12">
                <div class="form-group" style="margin-top: 10px;">
                    <div class="col-md-4" style="margin-top: 15px;"></div>
                    <div class="col-md-2" style="margin-top: 15px;">
                        <label>Document Name</label>
                        <td style="padding: 2px;" width="3%">
                            <input type="text" class="form-control" name="document_name" placeholder="" />
                        </td>
                    </div>
                    <div class="col-md-2" style="margin-top: 15px;">
                        <label>Language</label>
                        <select name="language" id="language" required class="form-control select"
                            data-live-search="true">
                            <option value="English">English</option>
                            <option value="Hindi">Hindi</option>
                            <option value="Marathi">Marathi</option>
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
                            <div id="editor" style="height: 500px;"></div>
                            <input type="hidden" name="content" id="editor-content">
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-md-2" style="margin-top: 1vh;"></div>
        </div>
        <div align="center" style="margin-top: 1%;">
            <button id="on" type="button" class="btn mjks" onclick="submitForm()">
                <i class="fa fa-floppy-o" aria-hidden="true"></i> Submit
            </button>
        </div>
    </form>
    <div class="row">
        <div class="col-md-2" style="margin-top: 2vh;"></div>
        <div class="col-md-8" style="margin-top: 15px;">
            <div class="panel-body" style="margin-top: 5px; margin-bottom: 15px;">
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
                        @foreach($agree as $index => $agreement)
                        <tr>
                            <td>{{ $loop->index + 1 }}</td>
                            <td>{{ $agreement->document_name ?? '' }}</td>
                            <td>{{ $agreement->language ?? '' }}</td>
                            <td>{!! \Illuminate\Support\Str::limit(($agreement->description ?? ''), 5) !!}
                                {{--
                            <td>{!! $agreement->description ?? '' !!}</td> --}}
                            </td>
                            <td>
                                <div style="display: flex;">
                                    <div>
                                        <button
                                            style="background-color: #28a745; border: none; max-height: 25px; margin-top: -5px; margin-bottom: -5px;"
                                            type="button" data-id="{{ $agreement->id ?? '' }}"
                                            class="btn btn-info view-details-btn" data-toggle="tooltip"
                                            data-placement="top" title="View"><i class="fa fa-eye"
                                                style="margin-left: 5px;"></i></button>
                                    </div>
                                    <div style="margin-left:5px;">
                                        <button
                                            style="background-color: #3399ff; border: none; max-height: 25px; margin-top: -5px; margin-bottom: -5px;"
                                            type="button" data-id="{{ $agreement->id ?? '' }}"
                                            class="btn btn-info edit-button" data-toggle="tooltip" data-placement="top"
                                            title="Edit">
                                            <i class="fa fa-edit" style="margin-left: 5px;"></i>
                                        </button>
                                    </div>
                                    <div style="margin-left:5px;">
                                        <button data-id="{{ $agreement->id ?? '' }}"
                                            style="background-color: #ff0000; border: none; max-height: 25px; margin-top: -5px; margin-bottom: -5px;"
                                            type="button" class="btn btn-info delete-btn" data-toggle="tooltip"
                                            data-placement="top" title="Delete">
                                            <i class="fa fa-trash-o" style="margin-left: 5px;"></i>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Modal -->
        <!-- Modal -->
        <div style="position: fixed; bottom: 0; width: 100%;">
            <div class="col-md-12" style="width: 100%;">
                <div class="col-md-6" style="float: left; width: 50%;">
                    @if ($errors->any())
                    <div id="successscript" class="alert alert-danger mt-2"
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


</div>
<div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="display: flex; flex-direction: column; height: 100%;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="H4">Agreement Details</h4>
            </div>
            <div class="modal-body" id="appendbody">
                <!-- Content will be injected here -->
            </div>
            <div class="modal-footer" style="border: none !important; background-color: #fff !important">
                <!-- Footer content if needed -->
            </div>
        </div>
    </div>
</div>

@stop
@section('js')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<script>
    $(document).on('click', '.view-details-btn', function() {
    var inquiryId = $(this).data('id'); // Get the data-id value

    $("#popup3").modal({
    backdrop: "static",
    keyboard: false
    });

    $("#appendbody").empty();

    $.ajax({
    url: '{{ route("agreements.show", ":id") }}'.replace(':id', inquiryId),
    type: 'get',
    dataType: 'json',
    success: function(data) {
    if (data.html) {
    $("#appendbody").html(data.html);
    } else if (data.error) {
    $("#appendbody").html('<p>' + data.error + '</p>');
    }
    },
    error: function() {
    $("#appendbody").html('<p>An error occurred while fetching the details.</p>');
    }
    });
    });

    // Add the blur effect to the modal backdrop
    $('#popup3').on('show.bs.modal', function () {
    $('.modal-backdrop').addClass('modal-backdrop');
    });

    $('#popup3').on('hide.bs.modal', function () {
    $('.modal-backdrop').removeClass('modal-backdrop');
    });
</script>
<script>
    // Initialize Quill editor with full toolbar
        var quill = new Quill('#editor', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{ 'font': [] }, { 'size': [] }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{ 'color': [] }, { 'background': [] }],
                    [{ 'script': 'super' }, { 'script': 'sub' }],
                    [{ 'header': '1' }, { 'header': '2' }, 'blockquote', 'code-block'],
                    [{ 'list': 'ordered' }, { 'list': 'bullet' }, { 'indent': '-1' }, { 'indent': '+1' }],
                    [{ 'direction': 'rtl' }, { 'align': [] }],
                    ['link', 'image', 'video', 'formula'],
                    ['clean']
                ]
            }
        });

        function submitForm() {
            var editorContent = quill.root.innerHTML;
            document.getElementById('editor-content').value = editorContent;
            document.getElementById('myForm').submit();
        }
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.edit-button', function() {
            var agreementId = $(this).data('id'); // Get the data-id value

            // Redirect to the edit route
            window.location.href = '{{ route("agreement-master.edit", ":id") }}'.replace(':id', agreementId);
        });
    });
</script>
<script>
    $(document).ready(function() {
        $(document).on('click', '.delete-btn', function() {
            var agreementId = $(this).data('id'); // Get the data-id value

            if (confirm('Are you sure you want to delete this agreement?')) {
                $.ajax({
                    url: '{{ route("agreement-master.destroy", ":id") }}'.replace(':id', agreementId),
                    type: 'get',
                    data: {
                        _token: '{{ csrf_token() }}' // CSRF token for security
                    },
                    success: function(response) {
                        // Handle success (e.g., remove the row from the table, show a message)
                       // alert('Agreement deleted successfully.');
                        // Optionally reload the page or update the UI
                        location.reload(); // Reload the page
                    },
                    error: function(xhr) {
                        // Handle error
                        alert('An error occurred while deleting the agreement.');
                    }
                });
            }
        });
    });
</script>
@stop
