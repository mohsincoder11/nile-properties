@extends('webscite.layout')
@section('content')

<!-- End Main Header -->
<!--Page Title-->
{{-- @json($Stories) --}}

<section class="page-banner curve-offwhite"
    style="background-image: url('{{asset('public/images1/background/stories-1.png') }}');">

    <div class="auto-container">

        <h1 class="spectral" style="font-size: 40px;"><img src="{{ asset ('images1/starting-title.gif')}}"
                style="height:250px;" alt="">{!!
            html_entity_decode($Stories->title) !!}</h1>

        <p style="z-index: 5000000; position: absolute; font-size:20px; margin-top: -90px ; color: white; margin-left:52%;"
            class="z-index-2 spectral"><b>Author:<b>{!!
                    html_entity_decode($Stories->author) !!}</b> &nbsp;&nbsp; <b>Artist:<b>{!!
                        html_entity_decode($Stories->artist) !!}</b></p>
        <p class="display-mobile-1 spectral"
            style="z-index: 5000000; position: absolute; font-size:20px; margin-top: 4px ; color: white; ">
            {{-- <b>Auther: Rohit Kale</b> &nbsp; <b>Artist: Neha Joshi</b> --}}
        </p>
        <!-- <h4 class="spectral" style="font-size: 12px;">Kutty Pullaiyaar and Chandran </h4> -->


        <a href="{{ route('user.indexGet') }}" class="home-btn"><span class="flaticon-house-outline"></span></a>
    </div>

</section>
<!--End Page Title-->


<section class="programs-section pt-xs-30 pt-md-60 pb-xs-55 pb-md-70 pb-lg-20" style="margin-top:60px;">
    <div class="container">

        <div class="row">
            <div class="program-preview">
                <div class="col-12">


                    <div class="text-card-wrapper"
                        style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); border-radius: 10px; overflow: hidden; margin-top: 12px;">
                        <div class="text spectral" style="padding: 12px; text-align: justify; margin-bottom:5%;">
                            {!! $Stories->text !!}
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>
</section>





@stop
