@extends('frontend.layouts.header')

@section('main-container')
<!--end header -->
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <h6>Print Color and Play</h6>
                        <hr>
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

                        <form class="row g-2" action="{{ route('print.submitprint') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-8"></div>


                            {{-- <div class="col-md-8"> --}}

                                <div class="row justify-content-center">
                                    <div class="col-md-1 "></div>
                                    <div class="col-md-4">
                                        <div>
                                            <label for="inputFirstName" class="form-label"
                                                style="margin-bottom:-5px">Upload
                                                Thumbnail <span style="color: red;">(Size 370px*310px)</span></label>
                                            <input type="file" class="form-control" id="file"
                                                onchange="showImagePreview()" name="image" required>
                                            {{-- @if ($errors->has('image'))
                                            <span class="text-danger">{{ $errors->first('image') }}</span>
                                            @endif --}}
                                        </div>
                                    </div>
                                    <div class="col-md-1" style="margin-top: 15px; margin-left: -15px;">
                                        <div class="mb-3">


                                            {{-- Display a default image if no image is submitted --}}
                                            <img id="imagePreview"
                                                src="{{asset('public/frontend/assets/images/about-us.png') }}" alt=""
                                                style="height: 50px; width: 50px; ">



                                        </div>
                                    </div>


                                    <div class="col-md-4">
                                        <div>
                                            <label for="inputFirstName" class="form-label"
                                                style="margin-bottom:-5px">Upload
                                                File </label>
                                            <input type="file" class="form-control" id="file1"
                                                onchange="showImagePreview1()" name="fileimage" required>
                                            {{-- @if ($errors->has('fileimage'))
                                            <span class="text-danger">{{ $errors->first('fileimage') }}</span>
                                            @endif --}}
                                        </div>
                                    </div>
                                    <div class="col-md-1" style="margin-top: 15px; margin-left: -15px;">
                                        <div class="mb-3">


                                            {{-- Display a default image if no image is submitted --}}
                                            <img id="imagePreview1"
                                                src="{{asset('public/frontend/assets/images/about-us.png') }}" alt=""
                                                 style="height: 50px; width: 50px; ">



                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div style="margin-top:5px; padding:16px;">
                                            <button type="submit" class="btn btn-primary">Submit</button>

                                        </div>
                                    </div>
                                </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>


    </div>



    <div class="col-md-8" style="margin-left: 10%; width: 80%; margin-top: -40px;">

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
                                            <th>Images</th>
                                            <th>File</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($PrintColor as $PrintColor)
                                        <tr>
                                            <th>{{ $loop->index + 1 }}</th>
                                            {{-- <td><img src="" alt="img"></td> --}}

                                            <td>
                                                <img height="50px" width="50px"
                                                    src="{{asset('public/images/' . $PrintColor->image) }}" alt="" />
                                            </td>


                                            <td>
                                                <a href="{{asset('public/images/' . $PrintColor->fileimage) }}"
                                                    target="_blank">
                                                    <img height="50px" width="50px"
                                                        src="{{asset('public/images/' . $PrintColor->fileimage) }}"
                                                        alt="" />
                                                </a>
                                            </td>

                                            <td>
                                                <a
                                                    onclick="openCustomModal('{{ route('print.destroyprint', $PrintColor->id) }}')">
                                                    <button style="margin-top: 15px;" type="button"
                                                        class="btn1 btn-outline-danger" title="Delete">
                                                        <i class='bx bx-trash me-0'></i>
                                                    </button>
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
                @endsection
                @section('js')
                <script>
                    function showImagePreview1() {
                                    var input = document.getElementById('file1');
                                    var imagePreview = document.getElementById('imagePreview1');
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
                @stop
