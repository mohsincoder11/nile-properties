@extends('webscite.layout')
@section('content')

<!--Page Title-->
<section class="page-banner curve-offwhite spectral"
    style="background-image:url(public/images1/background/disclaimer.png);">
    <div class="auto-container">
        <h1 class="spectral">Disclaimer</h1>
        <a href="{{route('user.indexGet') }}" class="home-btn"><span class="flaticon-house-outline"></span></a>
    </div>
</section>
<!--End Page Title-->

<!-- About Section -->
<section class="about-section spectral">

    <div class="auto-container">
        <h2 style="text-align: center; color: black;" class="spectral">Contributors</h2>
        <div class="sec-title">
            <p style=" font-size:24px; margin-top:25px;">Want to contribute a story / write up to Bharatiya
                Stories? We will be happy to publish the content provided.</p>
            <div class="text" style=" margin-top:9px;">You give us an undertaking the content is written by you
                and not copied / downloaded from the web. Content includes images and other graphics too.</div>
            <div class="text">You make the content child friendly with appropriate language.</div>
            <div class="text">Your name will be published as a contributor and hence you will need to give your
                name and contact number. </div>
            <div class="text">Your story – if based on regional or family tradition or folklore – kindly mention
                the source and the origin. This helps make it more authentic.
            </div>

        </div>

    </div>
    <div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
        <a href="{{ route('user.disclaimer1Get') }}"><button class="theme-btn btn-style-one spectral padding2"
                name="submit-form"
                style="border-radius:0px; background-color: 5E69FF !important; padding-left:70px; padding-right:70px; color: white">
                <img src="public/images1/left-arrow.png" alt="" style="width: 40px;"> Previous Page </button></a>


    </div>

</section>
<!-- End About Section -->


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
                                        <div class="logo"><a href="index.html"><img src="public/images/footer-logo.png"
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
