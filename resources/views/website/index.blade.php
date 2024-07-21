@extends('website.layout.layout')
@section('main_container')


{{-- @if ($errors->any())
<div class="alert alert-danger mt-2">
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
@endif --}}


<div class="clearfix"></div>

<!-- Banner -->
<div class="slider" id="slider1">
    <!-- Slides -->
    <div style="background-image:url('{{asset('website/images/plot.jpg')}}');"></div>
    <div style="background-image:url('{{asset('website/images/plotimg1.png')}}')"></div>
    <!-- The Arrows -->
    <i class="left" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100">
            <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z"></path>
        </svg></i>
    <i class="right" class="arrows" style="z-index:2; position:absolute;"><svg viewBox="0 0 100 100">
            <path d="M 10,50 L 60,100 L 70,90 L 30,50  L 70,10 L 60,0 Z" transform="translate(100, 100) rotate(180) ">
            </path>
        </svg></i>

</div>
<!--slider end-->


<div class="clearfix"></div>

<div class="container " style="margin-bottom:5%;">
    <div class="row">
        <div class="col-md-12">
            <h3 class="headline_part centered margin-bottom-35 margin-top-70">Our Projects <span></span></h3>
        </div>

        @foreach ($brochures as $brochure)
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="utf_carousel_item">

                <a href="{{ route('listing-details', ['id' => $brochure->id]) }}"
                    class="utf_listing_item-container compact">
                    <div class="utf_listing_item">

                        <img src="{{asset('/' . $brochure->brochure) }}" alt="">

                        {{-- <a href="{{ asset('images/' . $brochure->image)}}"></a> --}}
                        <div class="utf_listing_item_content">
                            <div class="utf_listing_prige_block">
                                <!-- <span class="utp_approve_item"><i class="utf_approve_listing"></i></span> -->
                            </div>
                            <h3>{{$brochure->project_name}}</h3>
                            <span><i class="fa fa-map-marker"></i>{{$brochure->taluka}}</span>
                            <span><i class="fa fa-phone"></i>{{$brochure->mobile_number}}</span>
                        </div>
                    </div>
                    <div>

                        {{-- <span class="like-icon"></span> --}}
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        {{-- <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="utf_carousel_item"> <a href="#" class="utf_listing_item-container compact">
                    <div class="utf_listing_item"> <img src="{{asset('website/images/plotimg1.png')}}" alt="">

                        <div class="utf_listing_item_content">
                            <div class="utf_listing_prige_block">
                                <!-- <span class="utp_approve_item"><i class="utf_approve_listing"></i></span> -->
                            </div>
                            <h3>Nile Properties Land Layout</h3>
                            <span><i class="fa fa-map-marker"></i>Nagpur</span>
                            <span><i class="fa fa-phone"></i> (+91)8888888888</span>
                        </div>
                    </div>
                    <div>

                        <span class="like-icon"></span>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="utf_carousel_item"> <a href="#" class="utf_listing_item-container compact">
                    <div class="utf_listing_item"> <img src="{{asset('website/images/plotimg1.png')}}" alt="">

                        <div class="utf_listing_item_content">
                            <div class="utf_listing_prige_block">
                                <!-- <span class="utp_approve_item"><i class="utf_approve_listing"></i></span> -->
                            </div>
                            <h3>Nile Properties Land Layout</h3>
                            <span><i class="fa fa-map-marker"></i>Nagpur</span>
                            <span><i class="fa fa-phone"></i>(+91)8888888888</span>
                        </div>
                    </div>
                    <div>

                        <span class="like-icon"></span>
                    </div>
                </a>
            </div>
        </div> --}}


        {{-- <div class="col-md-12 centered_content"> <a href="#" class="button border margin-top-20">View More
                Projects</a> </div> --}}
    </div>
</div>





<!---modal code--->

@endsection
