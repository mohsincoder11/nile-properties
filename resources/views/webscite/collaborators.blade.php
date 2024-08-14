@extends('webscite.layout')
@section('content')
<!-- End Main Header -->


<!--Page Title-->
<section class="page-banner curve-offwhite" style="background-image:url(public/images1/background/stories-1.png);">
    <div class="auto-container">
        <h1 class="spectral" style="font-size: 60px;"><img src="public/images1/starting-title.gif" style="height:250px;"
                alt="">Collaborators </h1>
        <a href="{{route('user.indexGet') }}" class="home-btn"><span class="flaticon-house-outline"></span></a>
    </div>
</section>
<!--End Page Title-->



<!-- Program Section -->
<section class="program-section" style="padding-top:20px;">

    <div class="auto-container">


        <div class="row">

            <!-- Program Block -->
            @foreach ($Collaborators as $item)




            <div class="program-block col-lg-4 col-md-12 col-sm-12 wow fadeInUp">
                <div class="inner-box">
                    <div class="image-box">
                         <figure class="image" style="border-bottom-left-radius: 0px !important;">
                            @if ($item->logo)
                            <img style="height: 303px; width:370px;" src="{{asset('public/images/' . $item->logo) }}"
                                alt="Image">
                            @else
                            <!-- Provide the path to your default image -->
                            <img style="height: 303px; width:370px;"
                                src="{{asset('public/frontend/assets/images/about-us.png') }}" alt="">
                            @endif
                        </figure>
                    </div>


                </div>
                <div class="lower-content" style="padding-top:14px; padding-left: 18px; padding-right: 18px; height:50%;">

                    <h3><a href="javascript:void(0);" class="spectral">{{$item->title}}</a></h3>
                    <div class="text spectral font1 " style=" padding-top:12px; text-align: justify; height:50%;">
                        {!! Str::limit(strip_tags($item->text), 400) !!}
                    </div>
                    <div align="center"
                        style="background-color: rgb(245, 241, 241); padding-top:2%;padding-bottom:2%;  ">

                        <a href="{{$item->facebook}}" target="_blank"><img src="public/images1/facebook-2222.png" alt=""
                                style="height:40px;"></a>
                        <a href="{{$item->website}}" target="_blank"><img src="public/images1/internet-2222.png" alt=""
                                style="height:40px;"></a>
                    </div>
                    <br>
                </div>
            </div>
            @endforeach



        </div>
    </div>
</section>
<!--End Program Section -->
<!--Main Footer-->
{{-- <footer class="main-footer">
    <div class="parallax-scene parallax-scene-7 anim-icons">
        <span data-depth="0.60" class="parallax-layer icon icon-sun-gray"></span>
        <span data-depth="0.60" class="parallax-layer icon icon-star-gray"></span>
        <span data-depth="0.60" class="parallax-layer icon icon-star-gray-2"></span>
        <span data-depth="0.60" class="parallax-layer icon icon-star-gray-3"></span>
        <span data-depth="0.40" class="parallax-layer icon icon-balloon-gray"></span>
    </div> --}}

    <!--footer upper-->
    <!-- <div class="footer-upper">
                <div class="auto-container">
                    <div class="row clearfix">

                        <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <div class="row clearfix">


                                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget logo-widget">
                                        <h4 class="widget-title">About Us</h4>
                                        <div class="text">Etiam rhoncus sit amet adip scing sed ipsum. Lorem ipsum dolor
                                            sit amet adipiscing sem neque.</div>
                                        <div class="logo"><a href="index.html"><img src="public/images1/footer-logo.png"
                                                    alt="" /></a></div>
                                    </div>
                                </div>


                                <div class="footer-column col-lg-6 col-lg-3 col-md-6 col-sm-12">
                                    <div class="footer-widget links-widget">
                                        <h4 class="widget-title">Activities</h4>
                                        <div class="widget-content">
                                            <ul class="activity-list">
                                                <li><a href="#">Table/Floor Toys</a></li>
                                                <li><a href="#">Outdoor Games</a></li>
                                                <li><a href="#">Building Blocks</a></li>
                                                <li><a href="#">Water Play</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="big-column col-xl-6 col-lg-12 col-md-12 col-sm-12">
                            <div class="row clearfix">

                                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget links-widget">
                                        <h4 class="widget-title">Quick Links</h4>
                                        <div class="widget-content">
                                            <ul class="list">
                                                <li><a href="#">About</a></li>
                                                <li><a href="#">Contact</a></li>
                                                <li><a href="#">Our Gallery</a></li>
                                                <li><a href="#">Programs</a></li>
                                                <li><a href="#">Events</a></li>
                                                <li><a href="#">Rules of School</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>


                                <div class="footer-column col-lg-6 col-md-6 col-sm-12">
                                    <div class="footer-widget contact-widget">
                                        <h4 class="widget-title">Contact Us</h4>
                                        <div class="widget-content">
                                            <ul class="contact-info">
                                                <li><span class="icon flaticon-phone-call-1"></span><a
                                                        href="tel:666-888-0000">666 888 0000</a></li>
                                                <li><span class="icon flaticon-message"></span><a
                                                        href="mailto:info@gaowa.com">info@gaowa.com</a></li>
                                                <li><span class="icon flaticon-pin-1"></span> 987 top broklyn street
                                                    road <br>new york, USA</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
    <!--Footer Bottom-->
    @stop
