@extends('frontend.layouts.header')

@section('main-container')



<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Edit Collaborators</h5>
                        <hr />
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
                        <div class="form-body mt-4">
                            <div class="page-content">

                                <form role="form" method="post" action="{{ route('collaborators.update', ['id' => $collaborators->id]) }}"
      enctype="multipart/form-data">
    @csrf
                                    <div class="col-md-12 mx-auto">


                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-3">
                                                <div class="mb-4">


                                                    <div style="margin-top: 8px;">
                                                        <label for="inputFirstName" class="form-label"
                                                            style="margin-bottom:-5px">Logo <span
                                                                style="color: red;">(370px*303px)</span></label>
                                                        <input type="file" value="{{$collaborators->logo}}" class="form-control" id="file"
                                                            onchange="showImagePreview()" name="logo" >
                                                        @if ($errors->has('logo'))
                                                        <span class="text-danger">{{ $errors->first('logo') }}</span>
                                                        @endif
                                                        @if (old('logo'))
                                                        <div>
                                                            <img height="50px" width="50px"
                                                                src="{{asset('public/images/' . old('logo')) }}"
                                                                alt="Previous Logo">
                                                        </div>
                                                        @endif
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="col-md-1" style="margin-top: 15px; margin-left: -15px;">
                                                <div class="mb-3">


                                                    {{-- Display a default image if no image is submitted --}}
                                                    <img id="imagePreview"
                                                        src="{{asset('public/frontend/assets/images/about-us.png') }}"
                                                        alt="" style="height: 50px; ">



                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">
                                                        Title</label>
                                                    <input type="text"  class="form-control" id="inputProductTitle"
                                                        placeholder="" name="title" value="{{$collaborators->title}}" >
                                                    @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>



                                        <div class="mb-3" style="margin-top:2%;">

                                            <textarea id="main_description" name="text"
                                                required>{{ $collaborators->text }} </textarea>
                                            @if ($errors->has('text'))
                                            <span class="text-danger">{{ $errors->first('text') }}</span>
                                            @endif
                                        </div>


                                        <div class="row">

                                            <div class="col-md-3"></div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">
                                                        Facebook Link</label>
                                                    <input type="text" class="form-control" id="inputProductTitle"
                                                        placeholder="" name="facebook" value="{{ $collaborators->facebook }}"
                                                        required>
                                                    @if ($errors->has('facebook'))
                                                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">
                                                        Website Link</label>
                                                    <input type="text" class="form-control" id="inputProductTitle"
                                                        placeholder="" name="website" value="{{ $collaborators->website }}"
                                                        required>
                                                    @if ($errors->has('website'))
                                                    <span class="text-danger">{{ $errors->first('website') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>
                                        <div class="col-md-12" align="center">
                                            <div style="margin-top:2px; padding-left:0px; padding-top:10px;">
                                                <button type="submit" class="btn btn-primary">Update</button>

                                            </div>
                                        </div>

                                    </div>

                                </form>

                            </div>
                        </div>
                        <!--end row-->

                    </div>
                </div>
                <script>
                    $('#main_description').summernote({
								placeholder: 'Write  Here',
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
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
						data-bs-target="#exampleExtraLargeModal">Extra large</button> -->
            <!-- Modal -->
            <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="page-content">
                            <div class="row">
                                <div class="col-md-12 mx-auto">
                                    <div class="card">
                                        <div class="card-body p-4">


                                            <h5 class="card-title">Add Question</h5>
                                            <hr />
                                            <div class="form-body mt-4">
                                                <div class="page-content">
                                                    <div class="border border-3 p-4 rounded">
                                                        <div class="col-md-12 mx-auto">

                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label for="inputProductDescription"
                                                                            class="form-label">Image <span
                                                                                style="color:red;">(370px*303px)</span></label>
                                                                        <input id="" type="file"
                                                                            accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                                                            multiple>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label for="inputProductTitle"
                                                                            class="form-label">
                                                                            Title</label>
                                                                        <input type="email" class="form-control"
                                                                            id="inputProductTitle" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label for="inputProductTitle"
                                                                            class="form-label">
                                                                            Question Text</label>
                                                                        <input type="email" class="form-control"
                                                                            id="inputProductTitle" placeholder="">
                                                                    </div>
                                                                </div>



                                                            </div>

                                                        </div>

                                                        <div class="col-md-12 mx-auto">


                                                            <div class="col-md-12 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductTitle"
                                                                                class="form-label">
                                                                                Option 1</label>
                                                                            <input type="email" class="form-control"
                                                                                id="inputProductTitle" placeholder="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductTitle"
                                                                                class="form-label">
                                                                                Option 2</label>
                                                                            <input type="email" class="form-control"
                                                                                id="inputProductTitle" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductTitle"
                                                                                class="form-label">
                                                                                Option 3</label>
                                                                            <input type="email" class="form-control"
                                                                                id="inputProductTitle" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductTitle"
                                                                                class="form-label">
                                                                                Option 4</label>
                                                                            <input type="email" class="form-control"
                                                                                id="inputProductTitle" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductTitle"
                                                                                class="form-label">
                                                                                Right Option</label>
                                                                            <input type="email" class="form-control"
                                                                                id="inputProductTitle" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductDescription"
                                                                                class="form-label">Short
                                                                                Description</label>
                                                                            <textarea class="form-control"
                                                                                id="inputProductDescription"
                                                                                rows="1"></textarea>
                                                                        </div>
                                                                    </div>





                                                                </div>





                                                                </select> -->
                                                                <div class="col-md-12" align="center">
                                                                    <div
                                                                        style="margin-top:2px; padding-left:0px; padding-top:10px;">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Add</button>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        $('#main_description').summernote({
													placeholder: 'Write  Here',
													tabsize: 2,
													height: 120,
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


                                <!-- Modal -->
                                <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">Contrary to popular belief, Lorem Ipsum is
                                                not simply random text. It has roots in a piece of classical
                                                Latin literature from 45 BC, making it over 2000 years old.
                                                Richard McClintock, a Latin professor at Hampden-Sydney College
                                                in Virginia, looked up one of the more obscure Latin words,
                                                consectetur.</div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

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
     @endsection