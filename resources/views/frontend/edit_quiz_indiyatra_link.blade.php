@extends('frontend.layouts.header')

@section('main-container')



<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card" style="margin-left:-10%;">
                    <div class="card-body p-4">
                        <h5 class="card-title">Edit Quiz (Indiayatra)</h5>
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

                                <form role="form" method="post"
                                    action="{{ route('QuizIndiyatra.update', ['id' => $quiz->id]) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-12 mx-auto">


                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="mb-4">


                                                    <div style="margin-top: 8px;">
                                                        <label for="inputFirstName" class="form-label"
                                                            style="margin-bottom:-5px">Logo <span
                                                                style="color: red;">(370px*303px)</span></label>
                                                        <input type="file" class="form-control" id="file"
                                                            onchange="showImagePreview()" value="{{ $quiz->website }}"
                                                            name="logo">
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



                                                    <img id="imagePreview"
                                                        src="{{asset('public/frontend/assets/images/about-us.png') }}"
                                                        alt="" style="height: 50px; ">



                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">
                                                        Title</label>
                                                    <input type="text" class="form-control" id="inputProductTitle"
                                                        placeholder="" name="title" value="{{ $quiz->title }}">
                                                    @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">
                                                        Website Link</label>
                                                    <input type="text" class="form-control" id="inputProductTitle"
                                                        placeholder="" name="website" value="{{ $quiz->website }}">

                                                    @if ($errors->has('website'))
                                                    <span class="text-danger">{{ $errors->first('website') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2" align="center">
                                                <div style="margin-top:16px; padding-left:0px; padding-top:10px;">
                                                    <button type="submit" class="btn btn-primary">Update</button>

                                                </div>
                                            </div>


                                        </div>





                                        <div class="row">




                                        </div>


                                    </div>

                                </form>

                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>


    </div>
</div>
