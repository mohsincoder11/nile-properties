<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Include CSRF token in the head section -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Nile Properties</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('panel/logo/logo.png')}}" type="image/x-icon" /> <!-- Style CSS -->
    <link rel="stylesheet" href="{{asset('website/css/stylesheet.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/mmenu.css')}}">
    <link rel="stylesheet" href="{{asset('website/css/style.css')}}" id="colors">

    <!-- Google Font -->
    <link
        href="{{asset('https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese')}}"
        rel="stylesheet">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800')}}" rel="stylesheet"
        type="text/css">
    <link rel="stylesheet"
        href="{{asset('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css')}}">


    {{-- to show popup of info, error and others --}}
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- include Axios --}}
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>
<style>
    body {
        font-family: Arial, sans-serif;
    }

    .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        z-index: 999;
        height: 60%;
        width: 80%
    }

    .overlay {
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background: rgba(0, 0, 0, 0.5);
        z-index: 998;
    }
</style>

<style>
    .slider,
    .slider>div {
        /* Images default to Center Center. Maybe try 'center top'? */
        background-position: center center;
        display: block;
        width: 100%;
        height: 500px;
        /* height: 100vh; */
        /* If you want fullscreen */
        position: relative;
        background-size: cover;
        background-repeat: no-repeat;
        background-color: #000;
        overflow: hidden;
        -moz-transition: transform .4s;
        -o-transition: transform .4s;
        -webkit-transition: transform .4s;
        transition: transform .4s;
    }

    .slider>div {
        position: absolute;
    }

    .slider>i {
        color: #5bbd72;
        position: absolute;
        font-size: 60px;
        margin: 20px;
        top: 40%;
        text-shadow: 0 10px 2px #223422;
        transition: .3s;
        width: 30px;
        padding: 10px 13px;
        background: #fff;
        background: rgba(255, 255, 255, .3);
        cursor: pointer;
        line-height: 0;
        box-sizing: content-box;
        border-radius: 0px;
        z-index: 4;
    }

    .slider>i svg {
        margin-top: 3px;
    }

    .slider>.left {
        left: -100px;
    }

    .slider>.right {
        right: -100px;
    }

    .slider:hover>.left {
        left: 0;
    }

    .slider:hover>.right {
        right: 0;
    }

    .slider>i:hover {
        background: #fff;
        background: rgba(255, 255, 255, .8);
        transform: translateX(-2px);
    }

    .slider>i.right:hover {
        transform: translateX(2px);
    }

    .slider>i.right:active,
    .slider>i.left:active {
        transform: translateY(1px);
    }

    .slider:hover>div {
        transform: scale(1.01);
    }

    .hoverZoomOff:hover>div {
        transform: scale(1);
    }

    /* The Dots */
    .slider>ul {
        position: absolute;
        bottom: 10px;
        left: 50%;
        z-index: 4;
        padding: 0;
        margin: 0;
        transform: translateX(-50%);
    }

    .slider>ul>li {
        padding: 0;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        list-style: none;
        float: left;
        margin: 10px 10px 0;
        cursor: pointer;
        border: 1px solid #fff;
        -moz-transition: .3s;
        -o-transition: .3s;
        -webkit-transition: .3s;
        transition: .3s;
    }

    .slider>ul>.showli {
        background-color: #7EC03D;
        -moz-animation: boing .5s forwards;
        -o-animation: boing .5s forwards;
        -webkit-animation: boing .5s forwards;
        animation: boing .5s forwards;
    }

    .slider>ul>li:hover {
        background-color: #7EC03D;
    }

    .slider>.show {
        z-index: 1;
    }

    .hideDots>ul {
        display: none;
    }

    .showArrows>.left {
        left: 0;
    }

    .showArrows>.right {
        right: 0;
    }

    .titleBar {
        z-index: 2;
        display: inline-block;
        background: rgba(0, 0, 0, .5);
        position: absolute;
        width: 100%;
        bottom: 0;
        transform: translateY(100%);
        padding: 20px 30px;
        transition: .3s;
        color: #fff;
    }

    .titleBar * {
        transform: translate(-20px, 30px);
        transition: all 700ms cubic-bezier(0.37, 0.31, 0.2, 0.85) 200ms;
        opacity: 0;
    }

    .titleBarTop .titleBar * {
        transform: translate(-20px, -30px);
    }

    .slider:hover .titleBar,
    .slider:hover .titleBar * {
        transform: translate(0);
        opacity: 1;
    }

    .titleBarTop .titleBar {
        top: 0;
        bottom: initial;
        transform: translateY(-100%);
    }

    .slider>div span {
        display: block;
        background: rgba(0, 0, 0, .5);
        position: absolute;
        bottom: 0;
        color: #fff;
        text-align: center;
        padding: 0;
        width: 100%;
    }


    @keyframes boing {
        0% {
            transform: scale(1.2);
        }

        40% {
            transform: scale(.6);
        }

        60% {
            transform: scale(1.2);
        }

        80% {
            transform: scale(.8);
        }

        100% {
            transform: scale(1);
        }
    }

    /* -------------------------------------- */

    #slider2 {
        max-width: 30%;
        margin-right: 20px;
    }

    .row2Wrap {
        display: flex;
    }

    .content {
        padding: 50px;
        margin-bottom: 100px;
    }

    html {
        height: 100%;
        box-sizing: border-box;
    }

    *,
    *:before,
    *:after {
        box-sizing: inherit;
    }

    h1,
    h2,
    h3 {
        font-family: 'Crimson Text', sans-serif;
        font-weight: 100;
    }

    body {
        font: 15px 'Titillium Web', Arial, sans-serif;
        background: radial-gradient(#121212, #000);
        height: 100%;
        color: #aaa;
        margin: 0;
        padding: 0;
    }

    .content {
        padding: 10px 15vw;
    }
</style>


<style>
    .custom-model-main {
        text-align: center;
        overflow: hidden;
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        /* z-index: 1050; */
        -webkit-overflow-scrolling: touch;
        outline: 0;
        opacity: 0;
        -webkit-transition: opacity 0.15s linear, z-index 0.15;
        -o-transition: opacity 0.15s linear, z-index 0.15;
        transition: opacity 0.15s linear, z-index 0.15;
        z-index: -1;
        overflow-x: hidden;
        overflow-y: auto;
    }

    .model-open {
        z-index: 99999;
        opacity: 1;
        overflow: hidden;
    }

    .custom-model-inner {
        -webkit-transform: translate(0, -25%);
        -ms-transform: translate(0, -25%);
        transform: translate(0, -25%);
        -webkit-transition: -webkit-transform 0.3s ease-out;
        -o-transition: -o-transform 0.3s ease-out;
        transition: -webkit-transform 0.3s ease-out;
        -o-transition: transform 0.3s ease-out;
        transition: transform 0.3s ease-out;
        transition: transform 0.3s ease-out, -webkit-transform 0.3s ease-out;
        display: inline-block;
        vertical-align: middle;
        width: 600px;
        margin: 30px auto;
        max-width: 97%;
    }

    .custom-model-wrap {
        display: block;
        width: 100%;
        position: relative;
        background-color: #fff;
        border: 1px solid #999;
        border: 1px solid rgba(0, 0, 0, 0.2);
        border-radius: 6px;
        -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
        box-shadow: 0 3px 9px rgba(0, 0, 0, 0.5);
        background-clip: padding-box;
        outline: 0;
        text-align: left;
        padding: 20px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        max-height: calc(100vh - 70px);
        overflow-y: auto;
    }

    .model-open .custom-model-inner {
        -webkit-transform: translate(0, 0);
        -ms-transform: translate(0, 0);
        transform: translate(0, 0);
        position: relative;
        z-index: 999;
    }

    .model-open .bg-overlay {
        background: rgba(0, 0, 0, 0.6);
        z-index: 99;
    }

    .bg-overlay {
        background: rgba(0, 0, 0, 0);
        height: 100vh;
        width: 100%;
        position: fixed;
        left: 0;
        top: 0;
        right: 0;
        bottom: 0;
        z-index: 0;
        -webkit-transition: background 0.15s linear;
        -o-transition: background 0.15s linear;
        transition: background 0.15s linear;
    }

    .close-btn {
        position: absolute;
        right: 0;
        top: -30px;
        cursor: pointer;
        z-index: 99;
        font-size: 30px;
        color: #fff;
    }

    @media screen and (min-width:800px) {
        .custom-model-main:before {
            content: "";
            display: inline-block;
            height: auto;
            vertical-align: middle;
            margin-right: -0px;
            height: 100%;
        }
    }

    @media screen and (max-width:799px) {
        .custom-model-inner {
            margin-top: 45px;
        }
    }
</style>



{{-- popups --}}


<style>
    /* Styling for the main popup container */
    .popup-container {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 20px;

        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        z-index: 2;
        /* Higher z-index for the main popup */
        width: 450px;
        /* Adjust the width as needed */
        height: 550px;
        /* Adjust the height as needed */
    }


    /* Styling for the overlay background */
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1;
        /* Lower z-index for the overlay */
    }

    /* Styling for the close mark */
    .close-mark {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;
        font-size: 24px;
        color: #888;
    }

    /* Styling for the small popup container */
    .small-popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        padding: 10px;
        background-color: #fff;
        border: 1px solid #ccc;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        z-index: 3;
        /* Higher z-index for the small popup */
        width: 350px;
        /* Adjust the width as needed */
        height: 250px;
        /* Adjust the height as needed */
    }
</style>

<style>
    .otp-input {
        width: 1em;
        text-align: center;
        margin: 0 15px;
        padding: 5px;
        font-size: 16px;
    }

    /* Optional: Style for better visibility */
    .otp-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 7vh;
    }
</style>
<style>
    .button-1 {
        padding-right: 150px !important;
        padding-left: 140px !important;
    }
</style>
<style>
    /* Your existing styles here */

    /* Responsive styles */
    @media only screen and (max-width: 768px) {
        .utf_right_side {
            text-align: center;
            /* Center the content */
        }

        .header_widget {
            margin-bottom: 15px;
            /* Add some spacing between elements */
        }

        .utf_tabs_nav {
            flex-direction: column;
            /* Stack tabs vertically on small screens */
        }

        .tab_content {
            display: block;
            /* Ensure content is stacked on small screens */
        }

        .utf-login_with {
            margin-top: 15px;
            /* Add some spacing */
        }

        .popup-container-1 {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            z-index: 2;
            /* Higher z-index for the main popup */
            width: 350px;
            /* Adjust the width as needed */
            height: 650px;
            /* Adjust the height as needed */
        }

        /* Add more responsive styles as needed */
    }
</style>


<body>

    <!-- Preloader Start -->
    <div class="preloader">
        <div class="utf-preloader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!-- Preloader End -->

    <!-- Wrapper -->
    <div id="main_wrapper">
        <header id="header_part" class="fullwidth">
            <div id="header">
                <div class="container">
                    <div class="utf_left_side">
                        <div id="logo"> <a href="#"><img src="{{asset('website/images/logo-nile.png')}}" alt=""></a>
                        </div>
                        <div class="mmenu-trigger">
                            <button class="hamburger utfbutton_collapse" type="button">
                                <span class="utf_inner_button_box">
                                    <span class="utf_inner_section"></span>
                                </span>
                            </button>
                        </div>
                        <nav id="navigation" class="style_one">
                            <ul id="responsive">
                                <li><a class="current" href="{{ route('index') }}">Home</a>

                                </li>
                                <li><a href="#">About Us</a>
                                </li>
                                <li><a href="#">Blogs</a>

                                </li>
                                <li><a href="#">Contact Us</a>

                                </li>

                            </ul>
                        </nav>
                        <div class="clearfix"></div>
                    </div>
                    <div class="utf_right_side">
                        <div class="header_widget">

                            {{-- @auth
                            <span id="loggedInUsername" class="fa fa-user-circle-o">{{ Auth::user()->name }}</span>
                            <i class="fa fa-user-circle-o"></i>
                            @else
                            <a href="{{ asset('#dialog_signin_part') }}"
                                class="button border sign-in popup-with-zoom-anim"
                                style="background-color: red !important;">
                                <i class="fa fa-sign-in"></i> Sign In
                            </a>
                            @endauth --}}

                            @auth
                            <span id="loggedInUsername" class="fa fa-user-circle-o">{{ Auth::user()->name }}</span>
                            <i class="fa fa-user-circle-o"></i>
                            <form method="post" action="{{ route('logout') }}" style="display: inline;">
                                @csrf
                                {{-- <button type="submit" class="button border"
                                    style="background-color: red !important;">
                                    <i class="fa fa-sign-out fa-lg"></i> Logout
                                </button> --}}
                                <a href="{{ route('logout') }}" style="color: red !important;">
                                    <i class="fa fa-sign-out fa-sm"></i>
                                    <!-- fa-sm for smaller icon, adjust size as needed -->
                                </a>
                            </form>
                            @else
                            {{-- <a href="{{ asset('#dialog_signin_part') }}" --}} <a onclick="openMainPopup()"
                                class="button border sign-in popup-with-zoom-anim"
                                style="background-color: red !important;">
                                <i class="fa fa-sign-in"></i> Sign In
                            </a>
                            @endauth
                            <!-- <a href="#" class="button border with-icon" style="background-color: red !important;"><i class="sl sl-icon-user"></i> Add Listing</a> -->
                            {{-- <span id="loggedInUsername" style="display: none;"></span> --}}
                        </div>

                        <!-- Main Popup container -->

                        {{-- <div id="dialog_signin_part" class="zoom-anim-dialog mfp-hide"> --}}
                            <div class="popup-container popup-container-1" id="mainPopup" style="padding-top:0px;">

                                <div class="small_dialog_header">
                                    {{-- -------------------- --}}
                                    <span class="close-mark" onclick="closeMainPopup()"><img
                                            src="{{asset('website/images/cross.png')}}"
                                            style="margin-top:13px; height:25px;" alt=""></span>
                                    {{-- --------------------- --}}
                                    <h3>Sign In</h3>
                                </div>
                                <div class="utf_signin_form style_one">
                                    <ul class="utf_tabs_nav">
                                        <li class=""><a href="{{asset('#tab1')}}">Log In</a></li>
                                        <li><a href="{{asset('#tab2')}}">Register</a></li>

                                    </ul>
                                    <div class="tab_container alt">
                                        <div class="tab_content" id="tab1" style="display:none;">
                                            <div id="successscript">
                                                @if ($errors->any())
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
                                                @endif
                                            </div>
                                            <form method="post" id="loginForm" class="login"
                                                action="{{route('login')}}">
                                                @csrf
                                                <div id="error-message" style="color:red;"></div>
                                                <p class="utf_row_form utf_form_wide_block">
                                                    <label for="username">
                                                        <input type="text" class="input-text" name="email" id="username"
                                                            value="" placeholder="Email" />
                                                    </label>
                                                </p>
                                                <p class="utf_row_form utf_form_wide_block">
                                                    <label for="password">
                                                        <input class="input-text" type="password" name="password"
                                                            id="password" placeholder="Password" />

                                                    </label>
                                                </p>
                                                <div class="utf_row_form utf_form_wide_block form_forgot_part">
                                                    <div class="utf_row_form utf_form_wide_block form_forgot_part">
                                                        <span class="lost_password fl_left">
                                                            {{-- <a onclick="togglePopup()">Forgot Password?</a> </span>
                                                        --}}
                                                        <a href="javascript:void(0);" onclick="openSmallPopup()">Forgot
                                                            Password?</a> </span>

                                                        <div class="checkboxes fl_right">
                                                            <input id="remember-me" type="checkbox" name="check">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="utf_row_form">
                                                    <input type="submit" class="button border margin-top-5" name="login"
                                                        value="Login" />
                                                </div>
                                                {{-- <div class="utf-login_with my-3">
                                                    <span class="txt">Or Login With</span>
                                                </div> --}}
                                                <div class="row">
                                                    {{-- <div class="col-md-6 col-6">
                                                        <a href="{{asset('javascript:void(0);')}}"
                                                            class="social_bt facebook_btn mb-0"><i
                                                                class="fa fa-facebook"></i> Facebook</a>
                                                    </div> --}}
                                                    {{-- <div class="col-md-12 col-12">
                                                        <a href="{{asset('javascript:void(0);')}}"
                                                            class="social_bt google_btn mb-0"><i
                                                                class="fa fa-google"></i> Google</a>
                                                    </div> --}}
                                                </div>

                                            </form>
                                        </div>

                                        <div class="tab_content" id="tab2" style="display:none;">
                                            <div id="successscript">
                                                @if ($errors->any())
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
                                                @endif
                                            </div>
                                            <form method="post" class="register" id="registerForm"
                                                action="{{ route('storeRegistration') }}">
                                                @csrf

                                                <p class="utf_row_form utf_form_wide_block">
                                                    <label for="username2">
                                                        <input type="text" class="input-text" id="name" required
                                                            name="name" value="" placeholder="FullName" />
                                                        <span class="error" id="error-name"></span>
                                                    </label>
                                                </p>
                                                <p class="utf_row_form utf_form_wide_block">
                                                    <label for="email2">
                                                        <input type="email" class="input-text" id="email" required
                                                            name="email" value="" placeholder="Email" />
                                                        <span class="error" id="error-email"></span>
                                                    </label>
                                                </p>
                                                <p class="utf_row_form utf_form_wide_block">
                                                    <label for="contact">
                                                        <input class="input-text" type="text" maxlength="10" required
                                                            name="contact" id="number" placeholder="Contact No" />
                                                        <span class="error" id="error-contact"></span>
                                                    </label>
                                                </p>
                                                <p class="utf_row_form utf_form_wide_block">
                                                    <label for="password">
                                                        <input class="input-text" type="password" required
                                                            name="password" id="password2" placeholder="Password" />
                                                        <span class="error" id="error-password"></span>
                                                    </label>
                                                </p>
                                                <input type="submit" class="button border fw margin-top-10"
                                                    name="register" value="Register" />
                                            </form>
                                            <div id="error-message" style="color:red;"></div>

                                        </div>


                                    </div>
                                    <div class="overlay" id="overlay"></div>
                                    {{-- <div class="popup" id="popup">
                                        <button style="width: 20px;" onclick="togglePopup()"
                                            style="text-align:right;"><i class="fa fa-times" aria-hidden="true"
                                                style="color: #000; "></i></button>

                                        <form method="post" class="register">

                                            <p class="utf_row_form utf_form_wide_block">
                                                <label for="username2">
                                                    <input type="text" class="input-text" name="username" value=""
                                                        placeholder="New Password" />
                                                </label>
                                            </p>
                                            <p class="utf_row_form utf_form_wide_block">
                                                <label for="email2">
                                                    <input type="text" class="input-text" name="email" value=""
                                                        placeholder="Confirm Password" />
                                                </label>
                                            </p>

                                            <input type="submit" class="button border fw margin-top-10" name="register"
                                                value="Submit" />
                                        </form>
                                    </div> --}}

                                </div>

                            </div>

                            <!-- Overlay background for the main popup -->
                            <div class="overlay" id="mainOverlay"></div>

                            <!-- Small Popup container 1 -->
                            <div class="small-popup" id="smallPopup1">
                                <span class="close-mark" onclick="closeSmallPopup1()"><img
                                        src="{{asset('website/images/cross.png')}}" style="height:25px;" alt=""></span>
                                <form method="post" class="register" id="otpForm" action="{{route('send_otp')}}">
                                    @csrf
                                    <p class="utf_row_form utf_form_wide_block">
                                        <label for="contact">
                                            <input type="number" class="input-text" name="contact" id="contact" value=""
                                                placeholder="Enter Phone Number" style="margin-top:15%;" />
                                        </label>
                                    </p>


                                    <input type="button" class="button border fw margin-top-10" onclick="sendOtp()"
                                        name="register" value="Next" />


                                </form>

                            </div>

                            <!-- old  Small Popup container 2 -->
                            {{-- <div class="small-popup" id="smallPopup2">
                                <span class="close-mark" onclick="closeSmallPopup2()"><img
                                        src="{{asset('website/images/cross.png')}}" style="height:25px;" alt=""></span>
                                <div class="otp-container" style="margin-top:15%;">
                                    <input id="otpInput1" class="otp-input" type="text" maxlength="1" />
                                    <input id="otpInput2" class="otp-input" type="text" maxlength="1" />
                                    <input id="otpInput3" class="otp-input" type="text" maxlength="1" />
                                    <input id="otpInput4" class="otp-input" type="text" maxlength="1" />
                                </div>
                                <p style="text-align: center;">Resend OTP</p>
                                {{-- <input type="button" class="button border fw margin-top-10"
                                    onclick="openSmallPopup3()" name="register" value="Next" /> --}}
                                {{-- <input type="button" class="button border fw margin-top-10" onclick="verifyOtp()"
                                    name="register" value="Next" /> --}}

                                {{--
                            </div> --}}

                            <div class="small-popup" id="smallPopup2">
                                <span class="close-mark" onclick="closeSmallPopup2()">
                                    <img src="{{asset('website/images/cross.png')}}" style="height:25px;" alt="">
                                </span>
                                <div class="otp-container" style="margin-top:15%;">
                                    <input id="otpInput1" class="otp-input" type="text" maxlength="1"
                                        onkeyup="moveToNext(this, 'otpInput2')" />
                                    <input id="otpInput2" class="otp-input" type="text" maxlength="1"
                                        onkeyup="moveToNext(this, 'otpInput3')" />
                                    <input id="otpInput3" class="otp-input" type="text" maxlength="1"
                                        onkeyup="moveToNext(this, 'otpInput4')" />
                                    <input id="otpInput4" class="otp-input" type="text" maxlength="1"
                                        onkeyup="moveToNext(this, 'verifyOtp')" />
                                </div>
                                <p style="text-align: center;">Resend OTP</p>
                                {{-- <input type="button" class="button border fw margin-top-10"
                                    onclick="openSmallPopup3()" name="register" value="Next" /> --}}
                                <input type="button" class="button border fw margin-top-10" onclick="verifyOtp()"
                                    name="register" value="Next" />
                            </div>

                            <!-- Small Popup container 3 -->
                            <div class="small-popup" id="smallPopup3">
                                <span class="close-mark" onclick="closeSmallPopup3()"><img
                                        src="{{asset('website/images/cross.png')}}" style="height:25px;" alt=""></span>
                                <form method="post" action="{{ route('update_password') }}" class="register"
                                    onsubmit="submitNewPasswordForm(); return false;">
                                    @csrf

                                    <p class="utf_row_form utf_form_wide_block">
                                        <label for="newPassword" style="margin-top:10%;">
                                            <input type="text" class="input-text" name="newPassword" id="newPassword"
                                                value="" placeholder="New Password" required />
                                        </label>
                                    </p>
                                    <p class="utf_row_form utf_form_wide_block">
                                        <label for="confirmPassword">
                                            <input type="password" class="input-text" name="confirmPassword"
                                                id="confirmPassword" value="" placeholder="Confirm Password" required />
                                        </label>
                                    </p>

                                    <div style="text-align: center;">
                                        <input type="submit" class="button border fw margin-top-10 button-1"
                                            name="register" style="" value="Submit" />
                                    </div>
                                </form>
                                <!-- Add any content or buttons for the third small popup -->
                            </div>




                        </div>
                    </div>

                    {{--
                </div>
            </div>


    </div>
    </div> --}}
    </header>

    @yield('main_container')


    <!-- Footer -->

    <div id="footer" class="footer_sticky_part">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <h4>About Us</h4>
                    <div class="utf_sidebar_textbox">
                        <ul class="utf_contact_detail">
                            <li><span style="color: #5bbd72; font-size: 18px !important;"><i class="fa fa-envelope-o"
                                        aria-hidden="true"></i></span> &nbsp;&nbsp;&nbsp;&nbsp; <span><a
                                        href="{{asset('mailto:info@example.com')}}">info@example.com</a></span></li>
                        </ul>
                    </div>
                    <p>
                    <ul class="utf_social_icon rounded ">
                        <li><a class="facebook" href="#"><i class="icon-facebook"></i></a></li>
                        <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>
                        <li><a class="linkedin" href="#"><i class="icon-linkedin"></i></a></li>
                    </ul>
                    </p>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6">
                    <h4>Useful Links</h4>
                    <ul class="social_footer_link">
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms & Condition</a></li>
                        <li><a href="#">Refund & Cancellation</a></li>
                        <li><a href="#">Shipping Policy</a></li>
                    </ul>
                </div>

                <div class="col-md-2 col-sm-3 col-xs-6">
                    <h4>Pages</h4>
                    <ul class="social_footer_link">
                        <li><a href="{{ route('index') }}">Home</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Blogs</a></li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </div>
                <div class="col-md-2 col-sm-3 col-xs-6">
                    <h4>My Accounts</h4>
                    <ul class="social_footer_link">
                        <li><a onclick="openMainPopup()" href="#">Sign In</a></li>
                        <li><a href="#">Listing Details</a></li>

                    </ul>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="footer_copyright_part">Copyright © 2024 All Rights Reserved.</div>
                </div>

            </div>
        </div>
    </div>
    <div id="bottom_backto_top"><a href="#"></a></div>
    @php
    $whatsappNumber = \App\Models\WhatsappModel::first()->number ?? '';
    @endphp
    <div>
        <a style="margin-top: 20%;" href="https://api.whatsapp.com/send?phone={{ $whatsappNumber ?? '' }}" class="float"
            target="_blank">
            <i class="fa fa-whatsapp my-float"></i>
        </a>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Scripts for error popups-->



    <script src="{{asset('website/scripts/jquery-3.4.1.min.js')}}"></script>
    <script src="{{asset('website/scripts/chosen.min.js')}}"></script>
    <script src="{{asset('website/scripts/slick.min.js')}}"></script>
    <script src="{{asset('website/scripts/rangeslider.min.js')}}"></script>
    <script src="{{asset('website/scripts/magnific-popup.min.js')}}"></script>
    <script src="{{asset('website/scripts/jquery-ui.min.js')}}"></script>
    <script src="{{asset('website/scripts/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('website/scripts/mmenu.js')}}"></script>
    <script src="{{asset('website/scripts/tooltips.min.js')}}"></script>
    <script src="{{asset('website/scripts/color_switcher.js')}}"></script>
    <script src="{{asset('website/scripts/jquery_custom.js')}}"></script>
    <script src="{{asset('website/scripts/typed.js')}}"></script>
    <script src="{{asset('https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js')}}"></script>
    <script src="{{asset('website/scripts/moment.min.js')}}"></script>
    <script src="{{asset('website/scripts/daterangepicker.js')}}"></script>


    <script>
        $(document).ready(function() {
    $('#registerForm').on('submit', function(event) {
    event.preventDefault(); // Prevent the default form submission

    var formData = $(this).serialize(); // Serialize the form data

    // Clear previous error messages
    $('.error').text('');
    $('#error-message').text('');

    $.ajax({
    url: $(this).attr('action'), // Get the form action URL
    method: 'POST',
    data: formData,
    success: function(response) {
    if (response.success) {
    //alert(response.success);
    window.location.reload(); // Reload the page on success
    }
    },
    error: function(xhr) {
    // Handle the error response
    if (xhr.status === 422) {
    var errors = xhr.responseJSON.errors;
    for (var key in errors) {
    $('#error-' + key).text(errors[key][0]); // Display the validation error messages
    }
    } else {
    $('#error-message').text('An error occurred. Please try again.');
    }
    }
    });
    });

    $('#loginForm').on('submit', function(e) {
    e.preventDefault(); // Prevent the form from submitting the traditional way

    // Clear previous error messages
    $('.error').text('');
    $('#error-message').text('');

    var form = $(this);
    var url = form.attr('action');

    $.ajax({
    type: 'POST',
    url: url,
    data: form.serialize(), // Serialize form data
    success: function(response) {
    if (response.success) {
    // On success, reload the page
    location.reload();
    }
    },
    error: function(response) {
    if (response.status === 422) {
    // Validation error
    var errors = response.responseJSON.errors;
    if (errors.email) {
    $('#error-email').text(errors.email[0]);
    }
    if (errors.password) {
    $('#error-password').text(errors.password[0]);
    }
    } else if (response.status === 401) {
    // Incorrect email or password
    $('#error-message').text(response.responseJSON.error);
    } else {
    // General error
    $('#error-message').text('An error occurred. Please try again.');
    }
    }
    });
    });
    });
    </script>
    <script>
        @if(session('info'))
                Swal.fire({
                    icon: 'info',
                    title: 'Info',
                    text: '{{ session('info') }}',
                    confirmButtonColor: '#dc3545',
                });
            @endif

            @if(session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#28a745',
                });
            @endif

            @if(session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: '{{ session('error') }}',
                    confirmButtonColor: '#dc3545',
                });
            @endif
    </script>
    <script>
        function initAutocomplete() {
			var input = document.getElementById('autocomplete-input');
			var autocomplete = new google.maps.places.Autocomplete(input);

			autocomplete.addListener('place_changed', function () {
				var place = autocomplete.getPlace();
				if (!place.geometry) {
					window.alert("No details available for input: '" + place.name + "'");
					return;
				}
			});

			if ($('.main-search-input-item')[0]) {
				setTimeout(function () {
					$(".pac-container").prependTo("#autocomplete-container");
				}, 300);
			}
		}
    </script>
    <!-- Date Range Picker - docs: http://www.daterangepicker.com/ -->


    <script>
        $(function () {

			var start = moment().subtract(0, 'days');
			var end = moment().add(2, 'days');

			function cb(start, end) {
$('#booking-date-search').html')}}(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			}
			cb(start, end);
			$('#booking-date-search').daterangepicker({
				"opens": "right",
				"autoUpdateInput": true,
				"alwaysShowCalendars": true,
				startDate: start,
				endDate: end
			}, cb);

			cb(start, end);

		});

		// Calendar animation and visual settings
		$('#booking-date-search').on('show.daterangepicker', function (ev, picker) {
			$('.daterangepicker').addClass('calendar-visible calendar-animated bordered-style');
			$('.daterangepicker').removeClass('calendar-hidden');
		});
		$('#booking-date-search').on('hide.daterangepicker', function (ev, picker) {
			$('.daterangepicker').removeClass('calendar-visible');
			$('.daterangepicker').addClass('calendar-hidden');
		});

		$(window).on('load', function () {
			$('#booking-date-search').val('');
		});
    </script>
    <script>
        (function($) {
  "use strict";
  $.fn.sliderResponsive = function(settings) {

    var set = $.extend(
      {
        slidePause: 5000,
        fadeSpeed: 800,
        autoPlay: "on",
        showArrows: "off",
        hideDots: "off",
        hoverZoom: "on",
        titleBarTop: "off"
      },
      settings
    );

    var $slider = $(this);
    var size = $slider.find("> div").length; //number of slides
    var position = 0; // current position of carousal
    var sliderIntervalID; // used to clear autoplay

    // Add a Dot for each slide
    $slider.append("<ul></ul>");
    $slider.find("> div").each(function(){
      $slider.find("> ul").append('<li></li>');
    });

    // Put .show on the first Slide
    $slider.find("div:first-of-type").addClass("show");

    // Put .showLi on the first dot
    $slider.find("li:first-of-type").addClass("showli")

     //fadeout all items except .show
    $slider.find("> div").not(".show").fadeOut();

    // If Autoplay is set to 'on' than start it
    if (set.autoPlay === "on") {
        startSlider();
    }

    // If showarrows is set to 'on' then don't hide them
    if (set.showArrows === "on") {
        $slider.addClass('showArrows');
    }

    // If hideDots is set to 'on' then hide them
    if (set.hideDots === "on") {
        $slider.addClass('hideDots');
    }

    // If hoverZoom is set to 'off' then stop it
    if (set.hoverZoom === "off") {
        $slider.addClass('hoverZoomOff');
    }

    // If titleBarTop is set to 'on' then move it up
    if (set.titleBarTop === "on") {
        $slider.addClass('titleBarTop');
    }

    // function to start auto play
    function startSlider() {
      sliderIntervalID = setInterval(function() {
        nextSlide();
      }, set.slidePause);
    }

    // on mouseover stop the autoplay and clear interval
    $slider.mouseover(function() {
      clearInterval(sliderIntervalID);
    });

    // on mouseout starts the autoplay by calling startSlider
    $slider.mouseout(function() {
      startSlider();
    });

    //on right arrow click
    $slider.find("> .right").click(nextSlide)

    //on left arrow click
    $slider.find("> .left").click(prevSlide);

    // Go to next slide
    function nextSlide() {
      position = $slider.find(".show").index() + 1;
      if (position > size - 1) position = 0;
      changeCarousel(position);
    }

    // Go to previous slide
    function prevSlide() {
      position = $slider.find(".show").index() - 1;
      if (position < 0) position = size - 1;
      changeCarousel(position);
    }

    //when user clicks slider button
    $slider.find(" > ul > li").click(function() {
      position = $(this).index();
      changeCarousel($(this).index());
    });

    //this changes the image and button selection
    function changeCarousel() {
      $slider.find(".show").removeClass("show").fadeOut();
      $slider
        .find("> div")
        .eq(position)
        .fadeIn(set.fadeSpeed)
        .addClass("show");
      // The Dots
      $slider.find("> ul").find(".showli").removeClass("showli");
      $slider.find("> ul > li").eq(position).addClass("showli");
    }

    return $slider;
  };
})(jQuery);



//////////////////////////////////////////////
// Activate each slider - change options
//////////////////////////////////////////////
$(document).ready(function() {

  $("#slider1").sliderResponsive({
  // Using default everything
    // slidePause: 5000,
    // fadeSpeed: 800,
    // autoPlay: "on",
    // showArrows: "off",
    // hideDots: "off",
    // hoverZoom: "on",
    // titleBarTop: "off"
  });

  $("#slider2").sliderResponsive({
    fadeSpeed: 300,
    autoPlay: "off",
    showArrows: "on",
    hideDots: "on"
  });

 $("#slider3").sliderResponsive({
    hoverZoom: "on",
    hideDots: "on"
  });

});



    </script>
    <!-- Style Switcher -->
    <script>
        function togglePopup() {
		  var popup = document.getElementById('popup');
		  var overlay = document.getElementById('overlay');
		  if (popup.style.display === 'block') {
			popup.style.display = 'none';
			overlay.style.display = 'none';
		  } else {
			popup.style.display = 'block';
			overlay.style.display = 'block';
		  }
		}
    </script>


    {{-- popups --}}
    <script>
        // Function to open the main popup
  function openMainPopup() {
    document.getElementById('mainPopup').style.display = 'block';
    document.getElementById('mainOverlay').style.display = 'block';
    }

    // Function to close the main popup
    function closeMainPopup() {
    document.getElementById('mainPopup').style.display = 'none';
    document.getElementById('mainOverlay').style.display = 'none';
    clearFormValues();
    }



function clearFormValues() {
// Clear login form
document.getElementById('loginForm').reset();

// Clear registration form
document.getElementById('registerForm').reset();

// Clear any error messages
var errorMessages = document.querySelectorAll('.error');
errorMessages.forEach(function(error) {
error.textContent = '';
});

// Clear any additional error messages
document.getElementById('error-message').textContent = '';
}
    // Function to open the first small popup
    function openSmallPopup() {
        document.getElementById('smallPopup1').style.display = 'block';

    }

    // Function to close the first small popup
    function closeSmallPopup1() {
        document.getElementById('smallPopup1').style.display = 'none';

    }

    //to send otp

    function sendOtp() {
    var contact = document.getElementById("contact").value;

    // Retrieve CSRF token from meta tags
    var token = document.querySelector('meta[name="csrf-token"]').content;

    // Make an AJAX request to check if the mobile number exists
    axios.post("{{ route('check_mobile_existence') }}", { contact: contact, _token: token })
        .then(function (response) {
            if (response.data.exists) {
                // Mobile number exists, proceed with OTP sending
                sendOtpRequest(contact, token);
            } else {
                // Mobile number does not exist, show an error
                alert(response.data.error);
            }
        })
        .catch(function (error) {
            // Handle AJAX error
            console.error(error);
        });
}

// Function to send the actual OTP request
function sendOtpRequest(contact, token) {
    // Make an AJAX request to send the OTP
    axios.post("{{ route('send_otp') }}", { contact: contact, _token: token })
        .then(function (response) {
            // Handle the response if needed
            console.log(response);

            // Open smallPopup2 after OTP is sent
            openSmallPopup2();
        })
        .catch(function (error) {
            // Handle AJAX error
            console.error(error);
        });
}
    // Function to open the second small popup
    function openSmallPopup2() {
        document.getElementById('smallPopup1').style.display = 'none';
        document.getElementById('smallPopup2').style.display = 'block';
    }

    // Function to close the second small popup
    function closeSmallPopup2() {
        document.getElementById('smallPopup2').style.display = 'none';
    }


    function moveToNext(current, nextFieldID) {
    if (current.value.length >= current.maxLength) {
        const nextField = document.getElementById(nextFieldID);
        if (nextField) {
            nextField.focus();
        } else {
            verifyOtp();
        }
    }
}


const verifyOtpUrl = "{{ route('verify_otp') }}";
    // to varify otp
    function verifyOtp() {
        // Get the entered OTP
        var enteredOtp = document.getElementById("otpInput1").value +
                         document.getElementById("otpInput2").value +
                         document.getElementById("otpInput3").value +
                         document.getElementById("otpInput4").value;

        var token = document.querySelector('meta[name="csrf-token"]').content;


        // Make an AJAX request to verify the OTP
        var xhr = new XMLHttpRequest();
       xhr.open("POST", verifyOtpUrl, true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.setRequestHeader("X-CSRF-TOKEN", token); // Include CSRF token


        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = JSON.parse(xhr.responseText);

                // Check if the entered OTP is valid
                if (response.valid) {
                    openSmallPopup3();
                    alert("OTP verification successful!");
                    // Move to the next popup
                   // alert(yash);
                } else {
                    // Display an error message or handle it accordingly
                    alert("Invalid OTP. Please try again.");
                }
            }
        };
// ---------------------------------------------------------
        // the below line doesnt work in online so i used another approach for this
// ----------------------------------------------------------
        // Send the entered OTP to the server for verification
        xhr.send(JSON.stringify({ enteredOtp: enteredOtp }));
    }

    // Function to open the third small popup
    function openSmallPopup3() {
        document.getElementById('smallPopup2').style.display = 'none';
        document.getElementById('smallPopup3').style.display = 'block';
    }

    // Function to close the third small popup
    function closeSmallPopup3() {
        document.getElementById('smallPopup3').style.display = 'none';
    }


    function submitNewPasswordForm() {
    var newPassword = document.getElementById("newPassword").value;
    var confirmPassword = document.getElementById("confirmPassword").value;

    var token = document.querySelector('meta[name="csrf-token"]').content;
    var userId = document.querySelector('meta[name="user-id"]').content; // Retrieve the user ID from the meta tag

    // Check if the passwords match
    if (newPassword === confirmPassword) {
        // Make an AJAX request to update the password
        axios.post("{{ route('update_password') }}", {
            newPassword: newPassword,
            userId: userId,
            _token: token
        })
        .then(function (response) {
            if (response.data.success) {
                alert("Password updated successfully!");
                // Close the third small popup or perform any other actions
                closeSmallPopup3();
            } else {
                alert("Failed to update password. Please try again.");
            }
        })
        .catch(function (error) {
            // Handle AJAX error
            console.error(error);
        });
    } else {
         // Display the error message in the same popup
         document.getElementById("passwordMismatchError").innerText = "Passwords do not match. Please try again.";

        // alert("Passwords do not match. Please try again.");
    }
}


    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
                        // Get the success message div
                        var successMessage = document.getElementById('successscript');

                        // If the success message div exists
                        if (successMessage) {
                            // Set a timeout to hide the message after 5 seconds (5000 milliseconds)
                            setTimeout(function() {
                                successMessage.style.display = 'none';
                            }, 5000);
                        }
                    });
    </script>

    @yield('js')
</body>

</html>
