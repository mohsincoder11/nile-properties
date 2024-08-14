@extends('frontend.layouts.header')

@section('main-container')

<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <!-- <div class="card-title d-flex align-items-center">

									<h5 class="mb-0 text-primary">Add City</h5>
								</div> -->
                        <h6>Slider</h6>
                        <hr>

                        {{-- <form class="row g-2" action="{{route('user.submit_slider')}}" method="POST"
                            enctype="multipart/form-data"> --}}


                            {{-- @csrf --}}
                            @if(session('success1'))
                            <div class="alert alert-success">
                                {{ session('success1') }}
                            </div>
                            @endif

                            @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                            @endif
                            <form class="row" action="{{route('user.submit_slider')}}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-1"></div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="inputFirstName" class="form-label" style="margin-bottom:5px">Upload
                                            Slider <span style="color: red;">(Size 1580px*800px)</span></label>
                                        <input type="file" class="form-control" id="file" onchange="showImagePreview()"
                                            name="image" required>
                                        @if ($errors->has('image'))
                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-md-1" style="margin-top: 20px; margin-left: -15px; margin-right: 25px;">
                                    <div class="mb-3">


                                        {{-- Display a default image if no image is
                                        submitted --}}
                                        <img id="imagePreview"
                                            src="{{asset('public/frontend/assets/images/about-us.png') }}" alt=""
                                            style="height: 50px; ">



                                    </div>
                                </div>


                                <div class="col-md-3">
                                    <div style="margin-top:24px;">
                                        <button type="submit" class="btn btn-primary">Submit</button>

                                    </div>
                                </div>
                            </form>

                    </div>

                </div>
            </div>
        </div>




    </div>
    <div class="row">

        <div class="col-md-3">
        </div>
        <div class="col-md-6">

            <div class="card-body">
                <div class="tab-content py-2">
                    <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th> Sr. No</th>

                                                <th>Banner</th>

                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($Slider as $Slider)

                                            <tr>

                                                <td>{{$loop->index+1}}</td>
                                                <td>

                                                    <a href="{{asset('public/images/' . $Slider->image)}}"
                                                        target="_blank">
                                                        <img src="{{asset('public/images/' . $Slider->image)}}" alt=""
                                                            style="height: 50px; width:100px;" />
                                                    </a>

                                                </td>

                                                <td>
                                                    <a href="#"
                                                        onclick="openCustomModal('{{ route('user.destroySlider', $Slider->id) }}')">
                                                        <button style="margin-top:15px;" type="button"
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
                </div>
            </div>
        </div>

    </div>
</div>


@stop

@section('js')



@endsection
