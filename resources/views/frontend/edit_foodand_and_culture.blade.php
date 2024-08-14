@extends('frontend.layouts.header')

@section('main-container')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Update Food & Culture</h5>
                        <hr />
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <div class="form-body mt-4">
                            <div class="page-content" style="padding-top:0px;">

                                <form action="{{route('foodandculture.update', ['id' => $food->id])}}" method="post"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="col-md-12 mx-auto">




                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-3">
                                                <div class="mb-3">


                                                    <div style="margin-top: -12px;">
                                                        <label for="inputFirstName" class="form-label"
                                                            style="margin-bottom:-5px">Image
                                                            of Hero <span
                                                                style="color: red;">(370px*303px)</span></label>
                                                        <input type="file" value="{{ old('image', $food->image) }}"
                                                            class="form-control" id="file" onchange="showImagePreview()"
                                                            name="image">
                                                        @if ($errors->has('image'))
                                                        <span class="text-danger">{{ $errors->first('image') }}</span>
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
                                                    <input type="text" class="form-control" placeholder="Enter Title"
                                                        name="title" value="{{ old('title', $food->title) }}">
                                                    @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>



                                        <div class="mb-3" style="margin-top:2%;">

                                            <textarea id="main_description"
                                                name="text">{{ old('text', $food->text) }}</textarea>
                                            @if ($errors->has('text'))
                                            <span class="text-danger">{{ $errors->first('text') }}</span>
                                            @endif
                                        </div>


                                        </select>
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
            </div>
            <script>
                $('#main_description').summernote({
            							placeholder: 'Write Description Here',
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

        <!-- Modal -->
        <div class="modal fade" id="exampleScrollableModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <section class="program-section" style="padding-top:20px;">

                        <div class="row g-2" id="appendbody">

                        </div>

                        {{-- <div class="auto-container">


                            <div class="row" style="margin-top:4%; margin-left: %;">
                                <!-- Program Block -->
                                <div class="program-block col-lg-12 col-md-12 col-sm-12 wow fadeInUp">
                                    <div class="inner-box">
                                        <div class="image-box">

                                            <figure class="image" style="border-bottom-left-radius: 0px !important;">
                                                <img src="assets/images/indic-heroes.png" alt=""
                                                    style="height:250px; width:250px; margin-left:128px;">
                                            </figure>
                                        </div>


                                    </div>
                                    <div class="lower-content"
                                        style="padding-top:14px; padding-left: 18px; padding-right: 18px;">

                                        <h5 class="spectral" style="color:black;">India's Earliest Woman P.HD &
                                            Scientist
                                            Who Was Denied a Job By the Nizam of Hyderabad</h5>
                                        <div class="text spectral font1"
                                            style=" padding-top:12px; text-align: justify; margin-bottom:0px;">
                                            <img src="assets/images/circle.png" style="height:13px;" alt="">
                                            Born in 1916 in Bengaluru, Nagamani Kulkarni studied chemistry at
                                            IISC, Bengaluru and
                                            got her PhD from the prestigious institute.
                                        </div>
                                        <div class="text spectral font1"
                                            style=" padding-top:12px; text-align: justify; margin-bottom:0px;">
                                            <img src="assets/images/circle.png" style="height:13px;" alt="">
                                            After her marriage to a fellow scientist from IISC, the couple moved
                                            to hyderabad State
                                            in 1944.
                                        </div>
                                        <div class="text spectral font1"
                                            style=" padding-top:12px; text-align: justify;margin-bottom:0px;">
                                            <img src="assets/images/circle.png" style="height:13px;" alt="">



                                            Despite having a doctorate, Nagamani couldn't find employment, as
                                            women weren't allowed
                                            to work during the Nizam's rule.
                                        </div>
                                        <div class="text spectral font1"
                                            style=" padding-top:12px; text-align: justify;">
                                            <img src="assets/images/circle.png" style="height:13px;" alt="">


                                            Only after the Nizam was deposed & Hyderabad liberated in 1948, she
                                            joined Osmania
                                            University and later chaired its chemistry dept.
                                        </div><br><br>


                                    </div>
                                </div>


                            </div>
                        </div> --}}
                    </section>
                    {{-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save
                            changes</button>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

    @stop
