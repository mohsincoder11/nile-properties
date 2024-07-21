@extends('webscite.layout')
@section('content')
<!-- End Main Header -->
<!--Page Title-->
<!--- <section class="page-banner curve-offwhite" style="background-image:url(public/images1/background/1.jpg);">
        <div class="auto-container">
            <h1>Contact Us</h1>
            <a href="index.html" class="home-btn"><span class="flaticon-house-outline"></span></a>
        </div>
    </section>--->
<!--End Page Title-->

<!-- Contact Section -->
<section class="contact-section" style="padding-top:0px;">
    <div class="auto-container">

        <div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-5">
                        <img src="public/images1/logo-1.png" alt="" style="width:600px;" align="center">
                    </div>
                    <div class="col-md-3">

                    </div>
                </div>

            </div>
        </div>
        <div class="row">


            <div class="form-column col-lg-6 col-md-12 col-sm-12">



                <img src="public/images1/img1.png" style="margin-bottom:25px; height:400px;">


                <div class="row" style="margin-top:15px;">


                    <div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
                        <button class="theme-btn btn-style-one spectral padding2" name="submit-form"
                            style="border-radius:0px; background-color: 5E69FF !important; padding-left:70px; padding-right:70px;">
                            <a style="color: white" href="{{route('user.indexGet') }}"> Explore <img
                                    src="public/images1/arrow.png" alt="" style="width: 40px;"></a> </button>
                    </div>
                </div>


            </div>

            <div class="form-column col-lg-6 col-md-12 col-sm-12">



                <img src="public/images1/img2.png" style="margin-bottom:25px; height:400px;">


                <div class="row" style="margin-top:15px;">


                    <div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
                        <button class="theme-btn btn-style-one spectral padding2" href="index.html" name="submit-form"
                            style="border-radius:0px; background-color: 5E69FF !important; padding-left:70px; padding-right:70px;"><a
                                style="color: white;" href="{{route('user.indexGet') }}">Continue <img
                                    src="public/images1/arrow.png" alt="" style="width: 40px;"></a></button>
                    </div>
                </div>


            </div>

        </div>
    </div>
</section>
<!--End Contact Section -->



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
    @stop
