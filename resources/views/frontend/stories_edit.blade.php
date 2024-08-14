@extends('frontend.layouts.header')

@section('main-container')


<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Update Stories</h5>
                        <hr />
                        <div class="form-body mt-4">
                            <div class="page-content" style="padding-top: 0px;">

                                <form method="post" action="{{ route('stories.update', ['id' => $story->id]) }}"
                                    enctype="multipart/form-data"> @csrf

                                    <div class="col-md-12 mx-auto">

                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif
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
                                                <div class="mb-2" style="margin-top: 8px;">
                                                    <label for="inputFirstName" class="form-label"
                                                        style="margin-bottom:-5px">Thumbnail <span
                                                            style="color: red;">(370px*303px)</span></label>
                                                    <input type="file" class="form-control"
                                                        value="{{ old('image', $story->image) }}" id="file"
                                                        onchange="showImagePreview()" name="image">


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
                                                <div class="mb-1">
                                                    <label for="inputProductTitle" class="form-label">
                                                        Title</label>
                                                    <input type="text" class="form-control" id="inputProductTitle"
                                                        placeholder="" name="title"
                                                        value="{{ old('title', $story->title) }}">
                                                    @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-1">
                                                    <label for="inputProductDescription"
                                                        class="form-label">Author</label>
                                                    <!-- <textarea class="form-control" id="inputProductDescription"
																rows="1"></textarea> -->
                                                    <input type="text" class="form-control"
                                                        value="{{ old('author', $story->author) }}"
                                                        id="inputProductTitle" placeholder="" name="author"
                                                        value="{{ old('author') }}">
                                                    @if ($errors->has('author'))
                                                    <span class="text-danger">{{ $errors->first('author') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <div class="mb-1">
                                                    <label for="inputProductDescription"
                                                        class="form-label">Artist</label>
                                                    <!-- <textarea class="form-control" id="inputProductDescription"
																rows="1"></textarea> -->
                                                    <input type="text" class="form-control" id="inputProductTitle"
                                                        placeholder="" value="{{ old('artist', $story->artist) }}"
                                                        name="artist" value="{{ old('artist') }}">
                                                </div>
                                            </div>

                                        </div>


                                        <div class="mb-3" style="margin-top:3%;">
                                            <textarea id="main_description"
                                                name="text">{{ old('text', $story->text) }}</textarea>
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

@stop

@section('js')
<script>
    function showImagePreview() {
                var input = document.getElementById('file');
                var imagePreview = document.getElementById('imagePreview');
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        imagePreview.src = e.target.result;
                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    imagePreview.src = ''; // Clear the image source if no file is selected.
                }
            }
</script>

@endsection
