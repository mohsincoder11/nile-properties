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

<section class="contact-section">
    <div class="auto-container">
        <div class="row">

            <div class="form-column col-lg-6 col-md-12 col-sm-12" style="margin-top:5%;">
                <h1 align="center" style="margin-bottom: 5px;" class="spectral"> <b style="color:black;">Forget
                        Your Password ?</b></h1>


                <div class="contact-form">


                    <div class="container">


                        <div class="row justify-content-md-center">
                            <div class="col-md-12 text-center">

                                <div class="row">
                                    <div class="col-sm-12 mt-5">


                                        <form action="{{route('user.ForgetPasswordVerify') }}" method="post">
                                            @csrf
                                            <div class="text-left">
                                                @if(session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                                @endif
                                            </div>


                                            <div class="form-group col-md-6 col-md-12 col-sm-12">
                                                <input type="email" name="email" placeholder="Enter Your Email Address">
                                            </div>

                                            <div class="col-lg-12 col-md-12 col-sm-12" align="center">
                                                <a href="#"> <button type="submit"
                                                        class="theme-btn btn-style-one spectral padding2 button-11"
                                                        style="border-radius:35px; background-color: 5E69FF !important; padding-left:170px; padding-right:170px; color: white; ">Reset
                                                        Password</button></a>
                                            </div>


                                        </form>






                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            &nbsp; &nbsp;
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <img src="public/images1/otp.png">
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
    <!--Footer Bottom-->
    @stop
