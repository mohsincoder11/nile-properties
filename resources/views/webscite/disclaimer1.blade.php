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
        <h2 style="text-align: center; color: black;" class="spectral">Content Collaborators</h2>
        <div class="sec-title">
            <p style=" font-size:26px; margin-top:24px;">For content collaborators the basic requirements will
                be :</p>
            <div class="text" style=" margin-top:9px;">1. We will share the content with due acknowledgements.
            </div>
            <div class="text">2. We will not take any responsibility for the authenticity of the content.</div>
            <div class="text">3. We will not take any responsibility for any copyright / plagiarism issues.
            </div>
            <div class="text">4. Any feedback – both positive and negative – shall be shared. </div>
            <div class="text">5. Content maybe suitably altered to make it child friendly – only in terms of
                text and language. </div>
        </div>

    </div>
    <div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
        <a href="{{ route('user.disclaimerGet') }}"><button class="theme-btn btn-style-one spectral padding2"
                name="submit-form"
                style="border-radius:0px; background-color: 5E69FF !important; padding-left:70px; padding-right:70px; color: white">
                <img src="public/images1/left-arrow.png" alt="" style="width: 40px;"> Previous Page </button></a>

        <a href="{{ route('user.disclaimer2Get') }}"><button class="theme-btn btn-style-one spectral padding2"
                name="submit-form"
                style="border-radius:0px; background-color: 5E69FF !important; padding-left:70px; padding-right:70px; color: white">
                Next Page <img src="public/images1/arrow.png" alt="" style="width: 40px;"> </button></a>
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
