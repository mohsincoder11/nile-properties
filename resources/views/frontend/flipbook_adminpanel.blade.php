@extends('frontend.layouts.header')

@section('main-container')



<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Add Flipbook</h5>
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

                                <form role="form" method="post" action="{{ route('flipbook.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-md-12 mx-auto">


                                        <div class="row">

                                            <div class="col-md-3">
                                                <div class="mb-4">


                                                    <div style="margin-top: 8px;">
                                                        <label for="inputFirstName" class="form-label"
                                                            style="margin-bottom:-5px">Logo <span
                                                                style="color: red;">(370px*303px)</span></label>
                                                        <input type="file" class="form-control" id="file"
                                                            onchange="showImagePreview()" name="logo">
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
                                                        placeholder="" name="title" value="{{ old('title') }}">
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
                                                        placeholder="" name="website" value="{{ old('website') }}"
                                                        required>
                                                    @if ($errors->has('website'))
                                                    <span class="text-danger">{{ $errors->first('website') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-2" align="center">
                                                <div style="margin-top:16px; padding-left:0px; padding-top:10px;">
                                                    <button type="submit" class="btn btn-primary">Submit</button>

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


    <div class="overlay toggle-icon"></div>
    <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>


</div>

<div class="col-md-12" style="margin-left: 15%; width: 77%; margin-top: -40px;">

    <div class="card-body">
        <div class="tab-content py-3">
            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive" style="white-space: initial !important;">
                            <table id="example1" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="">Sr. No</th>
                                        <th width="%">Logo</th>
                                        <th width="">Title</th>


                                        <th width="">Website</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($Collaborators as $Collaborators)


                                    <tr>

                                        <td>{{$loop->index+1}}</td>

                                        <td> @if($Collaborators->logo)
                                            {{-- Display the submitted image --}}
                                            <img src="{{asset('public/images/' . $Collaborators->logo) }}" alt=""
                                                style="height: 50px;">
                                            @else
                                            {{-- Display a default image if no image is submitted --}}
                                            <img src="{{asset('public/frontend/assets/images/about-us.png') }}" alt=""
                                                style="height: 50px;">
                                            @endif


                                        </td>
                                        <td>{{$Collaborators->title}}</td>

                                        <td>{{$Collaborators->website}}</td>
                                        <td>
                                            <a href="{{ route('flipbook.edit', $Collaborators->id) }}"
                                                class="btn1 btn-outline-success" title="edit">
                                                <i class='bx bx-edit-alt me-0'></i>
                                            </a>

                                            <a href="#"
                                                onclick="openCustomModal('{{ route('flipbook.destroy', $Collaborators->id) }}')">
                                                <button type="button" class="btn1 btn-outline-danger" title="Delete">
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