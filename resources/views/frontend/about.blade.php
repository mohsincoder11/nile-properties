@extends('frontend.layouts.header')

@section('main-container')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <h6>About</h6>
                        <hr>
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form class="row g-2" method="post" action="{{route('about.update')}}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$about_data->id}}" required>
                            <div class="col-md-3"></div>
                            <div class="col-md-4">

                                {{-- To show data base data into blade page (is stored in about_data variable or not)
                                --}}
                                {{-- @json($about_data) --}}
                                <div>
                                    <label for="inputFirstName" class="form-label" style="margin-bottom:-5px">Upload
                                        Mascot Img <span style="color: red;">(Size
                                            492px*508px)</span></label>
                                    <input type="file" class="form-control" id="Caste" name="image">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div style="margin-top:px; padding:16px;">
                                    @if($about_data->image)
                                    {{-- Display the submitted image --}}
                                    <img src="{{asset('public/images/' . $about_data->image) }}" alt=""
                                        style="height="50px" width="50px"">
                                    @else
                                    {{-- Display a default image if no image is submitted --}}
                                    <img src="{{asset('public/frontend/assets/images/about-us.png') }}" alt=""
                                        style="height="50px" width="50px"">
                                    @endif
                                   

                                </div>
                            </div>

                            <div class="container" style="margin-top:2%;">



                                <textarea id="main_description" name="text">{{$about_data->text}}</textarea>

                            </div>
                            <div style="padding-bottom:20px; margin-top:20px;" align="center">
                                <button type="submit" class="btn btn-primary">Update</button>

                            </div>
                    </div>

                </div>

            </div>


        </div>
        </form>
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">


                </div>


            </div>

        </div>

        <script>
            $('#main_description').summernote({
						placeholder: 'Write Text Here',
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

@endsection
