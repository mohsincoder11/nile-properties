@extends('webscite.layout')

@section('content')
<!--Page Title-->
<section class="page-banner curve-offwhite"
    style="background-image:url({{asset('public/images1/background/stories-1.png') }});">
    <div class="auto-container">
        <h1 class="spectral" style="font-size: 60px;"><img src="{{asset('public/images1/starting-title.gif') }}"
                style="height:250px;" alt="">Food & Culture</h1>
        <a href="{{ route('user.indexGet') }}" class="home-btn"><span class="flaticon-house-outline"></span></a>
    </div>
</section>
<!--End Page Title-->


<!-- Welcome Section -->
<section class="welcome-section" style="padding-bottom:0px; padding-top:40px;">

    <div class="auto-container">
        <div class="row">
            <!-- Image Column -->
            <div class="image-column col-lg-6 col-md-12 col-sm-12"
                style="padding-left: 0; padding-bottom: 0; margin-bottom: 0;">
                <div class="inner-column" style="padding-left: 0; padding-bottom: 80px; padding-top: 20px;">
                    <figure class="image wow fadeInLeft">

                        @if ($foodandculture->image)
                        <img style="max-width: 100%; height: auto;"
                            src="{{asset('public/images/' . $foodandculture->image) }}" alt="Image">
                        @else
                        <!-- Provide the path to your default image -->
                        <img style="max-width: 100%; height: auto;"
                            src="{{asset('public/frontend/assets/images/about-us.png') }}" alt="Default Image">
                        @endif
                    </figure>
                </div>
            </div>

            <!-- Content Column -->
            <div class="content-column col-lg-6 col-md-12 col-sm-12" style="margin-bottom:0px; margin-bottom:5%;">
                <div class="inner-column">
                    <div class="sec-title" style="margin-bottom:10px;">
                        <h2 style="color:black; font-family: 'ADLaM Display', sans-serif; font-size:48px;">{{
                            $foodandculture->title }}
                        </h2>
                    </div>
                    <div class="offer-block col-lg-12 col-md-6 col-sm-12 wow fadeInUp" style="margin-bottom:0px;">
                        <div class="row">
                            <div class=""> {!! $foodandculture->text !!}

                            </div>
                            <p class="font1 spectral" style="text-align: justify;"></p>
                            <p class="font1 spectral" style="text-align: justify;"></p>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

@stop
