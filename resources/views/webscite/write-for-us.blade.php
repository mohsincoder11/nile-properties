@extends('webscite.layout')
@section('content')

<style>
    @media only screen and (max-width: 600px) {
        .padding2 {
            padding-right: 140px;
            padding-left: 140px;
        }
    }

    @media only screen and (min-width: 600px) {
        .margin-left5 {
            margin-left: 50px;
        }
    }

    @media only screen and (max-width: 600px) {
        .diaplay11 {
            display: none;
        }
    }

    @media only screen and (max-width: 600px) {
        .padding11 {
            padding-left: 140px !important;
            padding-right: 140px !important;
        }

        .font11 {
            font-size: 37px !important;
        }
    }
</style>
<style>
    .spectral {
        font-family: 'Spectral', serif;
    }

    .font1 {
        font-size: 17px !important;
    }

    .padding-17 {
        padding-top: 22px !important;
        padding-bottom: 15px !important;
    }

    .padding-18 {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }
</style>
<style>
    .circle {
        height: 50px;
        width: 50px;
        background-color: #555;
        border-radius: 50%;
    }
</style>
<style>
    .banner-carousel .slide-item .image-layer {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-repeat: no-repeat;
        background-position: center;
        background-size: cover;
    }


    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
    }

    /* The popup form - hidden by default */
    .form-popup {
        display: none;
        position: absolute;
        bottom: 27%;

        right: 32%;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    .form-popup-2 {
        display: none;
        position: absolute;
        bottom: 27%;

        right: 28%;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text],
    .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus,
    .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
        opacity: 1;
    }
</style>
<style>
    @media only screen and (min-width: 600px) {
        .padding-15 {
            padding-left: 109px !important;
        }
    }
</style>

<!-- <style>
    @media only screen and (max-width: 600px) {
        .banner-carousel1 .slide-item1 .image-layer1 {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 70%;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
        }
    }
</style> -->




<!-- End Main Header -->

<!--Page Title-->
<section class="page-banner curve-offwhite" style="background-image:url(public/images1/background/stories-1.png);">
    <div class="auto-container">
        <h1 class="spectral" style="font-size: 52px;"><img src="public/images1/starting-title.gif" style="height:250px;"
                alt="">Write For Us </h1>
        <a href="{{ route('user.indexGet') }}" class="home-btn"><span class="flaticon-house-outline"></span></a>
    </div>
</section>
<!--End Page Title-->



<!-- Contact Section -->
<section class="contact-section">
    <div class="auto-container">
        <div class="row">
            <div class="form-column col-lg-2 col-md-12 col-sm-12"></div>
            <div class="form-column col-lg-8 col-md-12 col-sm-12">
                <div class="sec-title-1">

                    <h2 class="spectral font11" style="padding-top:5px;font-size: 50px; text-align: center;">
                        Write us a Message</h2>

                </div>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                <div class="contact-form">
                    <form method="post" action="{{ route('user.writeForUsPost') }}" id="contact-form1"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                <input type="text" name="username" placeholder="Full name" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                <input type="email" name="email" placeholder="Email address" required>
                            </div>
                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                <input type="text" name="number" minlength="10" maxlength="10"
                                    pattern="[1-9]{1}[0-9]{9}" placeholder="Phone Number"
                                    oninput="setCustomValidity('')"
                                    onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Phone number must be 10 digits' : '');">
                            </div>
                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                <input class="form-control" type="file" id="formFileDisabled" name="image"
                                    style="border-radius:12px; background-color:#f2f5f6;" required>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <textarea name="message" placeholder="Write message" required></textarea>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12" align="center">
                                <button class="theme-btn btn-style-one spectral padding2 padding11"
                                    style="border-radius:15px; background-color: 5E69FF !important; color: white; padding-left:250px; padding-right:250px;"
                                    type="submit">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="form-column col-lg-2 col-md-12 col-sm-12"></div>

        </div>
    </div>
</section>

<!-- <button class="open-button" onclick="openForm()">Open Form</button> -->

<div class="form-popup" id="myForm">
    <form action="/action_page.php" class="form-container">
        <h4 class="spectral">Write your feedback</h4>


        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <textarea name="message" placeholder="" style="height:200px; width:200px;"></textarea>
        </div>
        <button type="button" class="btn cancel" onclick="closeForm()">Submit</button>
    </form>
</div>
<div class="form-popup" id="myForm1">
    <form action="/action_page.php" class="form-container">
        <h4 class="spectral">Write your feedback</h4>


        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <textarea name="message" placeholder="" style="height:200px; width:200px;"></textarea>
        </div>
        <button type="button" class="btn cancel" onclick="closeForm1()">Submit</button>
    </form>

</div>
<div class="form-popup" id="myForm2">
    <form action="/action_page.php" class="form-container">
        <h4 class="spectral">Write your feedback</h4>


        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <textarea name="message" placeholder="" style="height:200px; width:200px;"></textarea>
        </div>
        <button type="button" class="btn cancel" onclick="closeForm2()">Submit</button>
    </form>
</div>
<div class="form-popup" id="myForm3">
    <form action="/action_page.php" class="form-container">
        <h4 class="spectral">Write your feedback</h4>


        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <textarea name="message" placeholder="" style="height:200px; width:200px;"></textarea>
        </div>
        <button type="button" class="btn cancel" onclick="closeForm3()">Submit</button>
    </form>
</div>
<div class="form-popup" id="myForm4">
    <form action="/action_page.php" class="form-container">
        <h4 class="spectral">Write your feedback</h4>


        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <textarea name="message" placeholder="" style="height:200px; width:200px;"></textarea>
        </div>
        <button type="button" class="btn cancel" onclick="closeForm4()">Submit</button>
    </form>
</div>
<div class="form-popup" id="myForm5">
    <form action="/action_page.php" class="form-container">
        <h4 class="spectral">Write your feedback</h4>


        <div class="form-group col-lg-12 col-md-12 col-sm-12">
            <textarea name="message" placeholder="" style="height:200px; width:200px;"></textarea>
        </div>
        <button type="button" class="btn cancel" onclick="closeForm5()">Submit</button>
    </form>
</div>

<!--End Contact Section -->


<!--Main Footer-->
<footer class="main-footer">
    <div class="parallax-scene parallax-scene-7 anim-icons">
        <span data-depth="0.60" class="parallax-layer icon icon-sun-gray"></span>
        <span data-depth="0.60" class="parallax-layer icon icon-star-gray"></span>
        <span data-depth="0.60" class="parallax-layer icon icon-star-gray-2"></span>
        <span data-depth="0.60" class="parallax-layer icon icon-star-gray-3"></span>
        <span data-depth="0.40" class="parallax-layer icon icon-balloon-gray"></span>
    </div>

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
    @stop
    @section('js')


    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }

        function openForm1() {
            document.getElementById("myForm1").style.display = "block";
        }

        function closeForm1() {
            document.getElementById("myForm1").style.display = "none";
        }
        function openForm2() {
            document.getElementById("myForm2").style.display = "block";
        }

        function closeForm2() {
            document.getElementById("myForm2").style.display = "none";
        }
        function openForm3() {
            document.getElementById("myForm3").style.display = "block";
        }

        function closeForm3() {
            document.getElementById("myForm3").style.display = "none";
        }
        function openForm4() {
            document.getElementById("myForm4").style.display = "block";
        }

        function closeForm4() {
            document.getElementById("myForm4").style.display = "none";
        }
        function openForm5() {
            document.getElementById("myForm4").style.display = "block";
        }

        function closeForm5() {
            document.getElementById("myForm5").style.display = "none";
        }
    </script>

    <script src="{{asset('public/js/jquery.js')}}"></script>
    <script src="{{asset('public/js/popper.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/js/jquery-ui.js')}}"></script>
    <script src="{{asset('public/js/jquery.fancybox.js')}}"></script>
    <script src="{{asset('public/js/owl.js')}}"></script>
    <script src="{{asset('public/js/wow.js')}}"></script>
    <script src="{{asset('public/js/appear.js')}}"></script>
    <script src="{{asset('public/js/validate.js')}}"></script>
    <script src="{{asset('public/js/parallax.min.js')}}"></script>
    <script src="{{asset('public/js/script.js')}}"></script>
    <!--Google Map APi Key-->
    <script
        src="{{asset('public/https://maps.googleapis.com/maps/api/js?key=AIzaSyDcaOOcFcQ0hoTqANKZYz-0ii-J0aUoHjk')}}">
    </script>
    <script src="{{asset('public/js/map-script.js')}}"></script>
    <!--End Google Map APi-->
    @stop
