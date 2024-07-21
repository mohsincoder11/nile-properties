@extends('frontend.layouts.header')

@section('main-container')


<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Add Stories</h5>
                        <hr />

                        <div class="col-md-8 mx-auto">


                            <form role="form" method="post" action="{{ route('file-import') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-5">
                                        <label for="excelFile" class="form-label">Upload Excel
                                            File</label>
                                        <input type="file" class="form-control" id="excelFile" name="file"
                                            accept=".xlsx, .xls" required>
                                    </div>
                                    <div class="col-md-2" style="width: 172px; margin-top:28px;">

                                        <button type="submit" class="btn btn-dark" style="background-color: #0d6efd;">
                                            <i class='bx bx-cloud-upload mr-1'></i>Bulk Upload
                                        </button>
                                    </div>

                                    <div class="col-md-2" style="width: 172px; margin-top:28px;">
                                        <a href="{{asset('public/bulkupload/storybulckuploadfile1.xlsx') }}">
                                            <button type="button" class="btn btn-dark"
                                                style="background-color: #0d6efd;">
                                                <i class='bx bx-cloud-download mr-1'></i>Sample File
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>


                        <div class="form-body mt-4">
                            <div class="page-content" style="padding-top: 0px;">

                                <form role="form" method="post" action="{{route('stories.store')}}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="col-md-12 mx-auto">


                                        @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                        @endif
                                        @if(session('success1'))
                                        <div class="alert alert-success">
                                            {{ session('success1') }}
                                        </div>
                                        @endif


                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="mb-1" style="margin-top: 8px;">
                                                    <label for="inputFirstName" class="form-label"
                                                        style="margin-bottom:-5px">Thumbnail <span
                                                            style="color: red;">(370px*303px)</span></label>
                                                    <input type="file" class="form-control"
                                                        onchange="showImagePreview()" id="file" name="image">

                                                    {{-- @if ($errors->has('image'))
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                    @endif --}}

                                                    @if ($errors->has('image'))
                                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                                    @endif
                                                    @if (old('image'))
                                                    <div>
                                                        <img height="50px" width="50px"
                                                            src="{{asset('public/images/' . old('image')) }}"
                                                            alt="Previous Logo">
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div style="margin-left:-35px;" class="col-md-1">
                                                <div style="margin-top:px; padding:16px;">


                                                    {{-- Display a default image if no image is submitted --}}
                                                    <img id="imagePreview"
                                                        src="{{asset('public/frontend/assets/images/about-us.png') }}"
                                                        alt="" style="height: 50px; ">



                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-2">
                                                    <label for="inputProductTitle" class="form-label">
                                                        Title</label>
                                                    <input type="text" class="form-control" id="inputProductTitle"
                                                        placeholder="" name="title" value="{{ old('title') }}" required>
                                                    @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-2">
                                                    <label for="inputProductDescription"
                                                        class="form-label">Author</label>
                                                    <!-- <textarea class="form-control" id="inputProductDescription"
																rows="1"></textarea> -->
                                                    <input type="text" class="form-control" id="inputProductTitle"
                                                        placeholder="" name="author" value="{{ old('author') }}"
                                                        required>
                                                    @if ($errors->has('author'))
                                                    <span class="text-danger">{{ $errors->first('author') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-2">
                                                    <label for="inputProductDescription"
                                                        class="form-label">Artist</label>
                                                    <!-- <textarea class="form-control" id="inputProductDescription"
																rows="1"></textarea> -->
                                                    <input type="text" class="form-control" id="inputProductTitle"
                                                        placeholder="" name="artist" value="{{ old('artist') }}"
                                                        required>
                                                </div>
                                            </div>

                                            <!-- ... existing code ... -->



                                            <!-- ... existing code ... -->

                                        </div>



                                        <div class="mb-2" style="margin-top:3%;">

                                            <textarea id="main_description" name="text">  {{ old('title') }} </textarea>
                                        </div>
                                        <!-- <label class="form-label">Status</label>
												<select class="form-select form-select-sm" style="width:150px;">
													<option>Active</option>
													<option>Inactive</option>

												</select> -->
                                        <div class="col-md-12" align="center">
                                            <div style="margin-top:2px; padding-left:0px; padding-top:10px;">
                                                <button type="submit" class="btn btn-primary">Add</button>

                                            </div>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
            <script>
                $('#main_description').summernote({
							placeholder: 'Write Story Here',
							tabsize: 2,
							height: 500,
							toolbar: [
								['style', ['style']],
								['font', ['bold', 'underline', 'clear']],
								['color', ['color']],
								['para', ['ul', 'ol', 'paragraph']],
								['table', ['table']],
								['insert', ['link', 'picture', 'video']],
								['view', ['fullscreen', 'codeview', 'help']]
							]
						});
            </script>
        </div>
    </div>

    <div class="col">
        <!-- Button trigger modal -->
        <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal">Extra large</button> -->
        <!-- Modal -->
        <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    {{-- <div class="modal-header">
                        <h5 class="modal-title">Kutty Pullaiyaar and Chandran (Auther: Rohit Kale &nbsp;Artist:
                            Neha Joshi) </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div> --}}
                    <section class="programs-section pt-xs-30 pt-md-60 pb-xs-55 pb-md-70 pb-lg-20"
                        style="margin-top:25px;">
                        <div class="container">
                            <div class="row">
                                <div class="program-preview">
                                    <div class="col-12">

                                        <div class="row g-2" id="appendbody">

                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>



<!--end page wrapper -->
<!--start overlay-->
<div class="overlay toggle-icon"></div>
<!--end overlay-->
<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
<!--End Back To Top Button-->

</div>
<!--end wrapper-->
<div class="col-md-12" style="margin-left: 14%; width: 77%; margin-top: -40px;">

    <div class="card-body">
        <div class="tab-content py-3">
            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Thumbnail</th>
                                        <th>Title</th>
                                        <th>Author</th>

                                        <th>Artist</th>


                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($Stories as $Stories )
                                    <tr>

                                        <td>{{$loop->index+1}}</td>
                                        {{-- <td><img src="" alt="img"></td> --}}
                                        <td>
                                            @if ($Stories->image)
                                            <a href="{{asset('public/images/' . $Stories->image) }}" target="_blank">
                                                <img height="50px" width="50px"
                                                    src="{{asset('public/images/' . $Stories->image) }}" alt="" />
                                            </a>
                                            @else
                                            <img height="50px" width="50px"
                                                src="{{asset('public/frontend/assets/images/about-us.png') }}" alt="" />
                                            @endif
                                        </td>
                                        <td>{{$Stories->title}}</td>
                                        <td>{{$Stories->author}}</td>
                                        <td>{{$Stories->artist}}</td>

                                        <td>
                                            <div style="display: flex; gap: 10px;">
                                                <button type="button" class="btn1 btn-outline-success viewinfo"
                                                    title="Show" data-bs-toggle="modal"
                                                    data-bs-target="#exampleExtraLargeModal" id="{{ $Stories->id }}"><i
                                                        class='bx bx-show-alt me-0'></i></button>

                                                <form method="GET"
                                                    action="{{ route('stories.edit', ['id' => $Stories->id]) }}">
                                                    @csrf
                                                    <button type="submit" class="btn1 btn-outline-success" title="Edit">
                                                        <i class='bx bx-edit-alt me-0' title="edit"></i>
                                                    </button>
                                                </form>

                                                <a href="#"
                                                    onclick="openCustomModal('{{ route('stories.destroyStories', $Stories->id)}}')">
                                                    <button title="Delete" type="button" class="btn1 btn-outline-danger"
                                                        title="button">
                                                        <i class='bx bx-trash me-0'></i>
                                                    </button>
                                                </a>

                                            </div>
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
    </div>
</div>




@endsection


@section('js')
<script>
    $(document).ready(function() {
        $(document).on('click', '.viewinfo', function() {
            var entry_id = $(this).attr('id');
            $("#appendbody").empty();
            $.ajax({
                url: 'getStoryDetails',
                type: 'get',
                data: {
                    entry_id: entry_id
                    // summary_id:summary_id
                },
                dataType: 'json',
                success: function(data) {
                    $("#appendbody").html(data);
                }
            });
        });


    })
</script>


@stop
