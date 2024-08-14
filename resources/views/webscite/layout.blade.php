<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Bharatiya Stories - Index</title>
    <!-- Stylesheets -->
    <link href="{{asset('public/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{asset('public/css/style.css') }}" rel="stylesheet">
    <link href="{{asset('public/css/responsive.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="images1/favicon.png" type="image/x-icon">
    <link rel="icon" href="images1/" type="image/x-icon">

    <!-- Responsive -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="preconnect" href="{{asset('public/https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{asset('public/https://fonts.gstatic.com') }}" crossorigin>
    <link
        href="{{asset('public/https://fonts.googleapis.com/css2?family=Andika:ital@0;1&family=Roboto:ital,wght@0,300;0,700;1,100;1,500&family=Spectral:wght@400;700&display=swap') }}"
        rel="stylesheet">
    <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->
    <link rel="preconnect" href="{{asset('public/https://fonts.googleapis.com') }}">
    <link rel="preconnect" href="{{asset('public/https://fonts.gstatic.com') }}" crossorigin>

    <link
        href="{{asset('public/https://fonts.googleapis.com/css2?family=ADLaM+Display&family=Andika:ital@0;1&family=Roboto:ital,wght@0,300;0,700;1,100;1,500&family=Spectral:wght@400;700&display=swap') }}"
        rel="stylesheet">
</head>
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

    .small-text {
        font-size: 14px !important;
    }
</style>
<style>
    @media only screen and (max-width: 600px) {
        .padding2 {
            padding-right: 140px;
            padding-left: 140px;
        }

    }

    @media only screen and (min-width: 600px) {
        .left1 {
            margin-left: 355px !important;
        }

        .left1 {
            margin-left: 355px !important;
        }
    }
</style>
<style>
    @media only screen and (min-width: 600px) {
        .padding-15 {
            padding-left: 50px !important;
        }

        .white-image {
            filter: brightness(0) invert(1) grayscale(1) brightness(2);
        }
    }

    .spectral img {
        margin: 0 10px;
    }
</style>





<body>

    <!-- loader code here -->


    <div class="page-wrapper">
        <!-- Preloader -->
        <div class="preloader"></div>

        <!-- Main Header -->
        <header class="main-header">
            <!-- Header Top -->
            <!-- <div class="header-top">
         <div class="auto-container clearfix">

            <div class="top-left clearfix">
                <ul class="info-list">
                    <li>Welcome to gaowa kindergarten school</li>
                    <li><span class="icon flaticon-phone-call-1"></span><a href="tel:666-888-0000">666 888 0000</a></li>
                    <li><span class="icon flaticon-message"></span><a href="mailto:info@gaowa.com">info@gaowa.com</a></li>
                </ul>
            </div>

            <div class="top-right">
                <ul class="login-info clearfix">
                    <li><a href="#">Login</a></li>
                    <li><a href="#">Register</a></li>
                </ul>
            </div>
        </div>
     </div> -->

            <!-- Header Upper -->
            <div class="header-upper">
                <div class="inner-container">
                    <div class="auto-container1 clearfix padding-15"
                        style="margin-left:0px !important; padding-right:0px;">
                        <!--Logo-->
                        <!-- <div class="logo-outer">
                    <div class="logo"><a href="index.html"><img src="public/images1/logo.png" alt="" title="Gaowa - Child Care and KinderGarten HTML Template"></a></div>
                 </div> -->
                        <!-- <div class="logo pull-left">
                    <a href="index.html" title=""><img src="public/images1/logo.png" alt="" title=""></a>
                 </div> -->
                        <a href="{{ route('user.indexGet') }}"> <img
                                src="{{asset('public/images1/logo-final-11.png') }}" alt=""
                                style="height: 80px; margin-top:0px; padding-top:0px; padding-bottom:0px; margin-bottom:0px; margin-left:80px;"></a>


                        <!--Nav Box-->
                        <div class="nav-outer clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler"><span class="icon flaticon-menu-1"></span></div>

                            <!-- Main Menu -->
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent"
                                    style="margin-right:0px; margin-top:0px; margin-right:50px;">
                                    <ul class="navigation clearfix" align="left" style="margin-right:60px;">
                                        <li class="current dropdown spectral padding-17"><a
                                                href="{{ route('user.indexGet') }}" class="font1 "><b>Home</b></a>

                                        </li>

                                        <!-- <li class="spectral"><a href="" class="font1"><b>About</b></a></li> -->

                                        <li class="dropdown spectral padding-17"><a
                                                href="{{ route('user.indexGet') }}"><b>Knowledge</b></a>
                                            <ul>
                                                <li class="spectral"><a href="{{ route('user.storiesGet') }}"
                                                        class="font1"><b>Stories</b></a></li>
                                                <li class="spectral"><a href="{{ route('user.heroesLeaderGet') }}"
                                                        class="font1"><b>Heroes
                                                            and
                                                            Leaders</b></a></li>
                                                <li class="spectral"><a href="{{ route('user.foodCultureWebsite') }}"
                                                        class="font1"><b>Dharma 
                                                            and culture</b></a></li>
                                                <li class="spectral"><a href="{{ route('user.sportsWebsite') }}"
                                                        class="font1"><b>
                                                            Sports</b></a></li>

                                                <li class="spectral"><a href="{{ route('user.artsWebsite') }}"
                                                        class="font1"><b>
                                                            Arts</b></a></li>
                                                <li class="spectral"><a href="{{ route('user.flipbookGet') }}"
                                                        class="font1"><b>
                                                            Flipbook</b></a></li>



                                            </ul>

                                        </li>
                                        <li class="dropdown spectral padding-17"><a href="{{ route('user.indexGet') }}"
                                                class="font1"><b class="">
                                                    Activity</b></a>
                                            <ul>
                                                <li class="spectral"><a href="{{ route('user.quizGet') }}"><b
                                                            class="font1">Quiz</b></a>
                                                </li>
                                                <li class="spectral"><a href="{{ route('user.quizIndiyatraGet') }}"
                                                        class="font1"><b>Quiz Indiyatra</b></a></li>
                                                <li class="spectral"><a href="{{ route('user.comingsoon') }}"><b
                                                            class="font1">Puzzles</b></a>
                                                </li>
                                                <li class="spectral"><a href="{{ route('user.CompetitionGet') }}"
                                                        class="font1"><b>Competition</b></a>
                                                </li>
                                                <!-- <li class="spectral"><a href="" class="font1"><b>Story Telling</b></a>
                                                </li> -->
                                                <li class="spectral"><a href="{{ route('user.meetsGet') }}"
                                                        class="font1"><b>Meets</b></a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="dropdown padding-17"><a href="{{ route('user.writeForUsGet') }}"
                                                class="spectral" class="font1"><b>Write for
                                                    us</b></a>

                                        </li>



                                    </ul>
                                    <!-- <div class="btn-box" ><a href="#" style="padding:10px 10px 10px 10px;"class="theme-btn btn-style-one">Learn More</a></div>
                                 <div class="btn-box" ><a href="#" style="padding:10px 10px 10px 10px;"class="theme-btn btn-style-one">Learn More</a></div> -->
                                    <!-- <button class="theme-btn btn-style-one spectral" href="index.html"
                                        title="Contribute" name="submit-form"
                                        style="border-radius:0px; background-color: 5E69FF !important; padding:5px 15px 5px 15px; margin-right:7px;"><img
                                            src="public/images1/collabrator.png" alt="" style="height:25px;">
                                    </button> -->
                                    @if (!auth()->check())
                                    <a href="{{ route('user.loginGet') }}">
                                        <button class="theme-btn btn-style-one spectral small-text" title="Login"
                                            name="submit-form"
                                            style="border-radius:0px; background-color: 5E69FF !important; padding:5px 15px 5px 15px; color: white; margin-top:12px; ">
                                            <img src="{{asset('public/images1/user.png') }}" alt=""
                                                style="height:30px;">
                                            SignIn/SignUp
                                        </button>
                                    </a>
                                    @else
                                    <a href="{{ route('user.LogoutGet') }}">

                                        <button class="theme-btn btn-style-one spectral small-text" title="Logout"
                                            name="submit-form"
                                            style="border-radius:0px; background-color: 5E69FF !important; padding:5px 15px 5px 15px; color: white; margin-top:12px;">
                                            <img src="{{asset('public/images1/user.png') }}" alt=""
                                                style="height:30px;">
                                            Welcome, {{ auth()->user()->name}}

                                            <img src="{{asset('public/images1/turn-off.png') }}" alt=""
                                                class="white-image" style="height:27px;">
                                        </button>

                                    </a>

                                    @endif

                                </div>
                                <span> </span>

                            </nav>

                            <!-- Main Menu End-->
                        </div>
                    </div>
                </div>
            </div>
            <!--End Header Upper-->

            <!-- Sticky Header  -->
            <div class="sticky-header">
                <div class="auto-container1 clearfix"
                    style="margin-left:0px !important; padding-bottom:4px; padding-right:0px; margin-bottom:0px;">
                    <!--Logo-->
                    <div class="logo pull-left"
                        style="padding-top:0px; padding-bottom:0px; margin-top:0px; padding-left:114px;">
                        <a href="{{ route('user.indexGet') }}" title=""> <img
                                src="{{asset('public/images1/logo-final-11.png') }}" alt=""
                                style="height: 80px; margin-left:0px; margin-top:0px;"></a>
                    </div>
                    <!--Right Col-->
                    <div class="pull-right" style="margin-right:0px;">
                        <!-- Main Menu -->
                        <!-- Main Menu -->
                        <nav class="main-menu navbar-expand-md navbar-light">
                            <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent"
                                style="margin-right:74px; margin-top:4px; ">
                                <ul class="navigation clearfix" align="left"
                                    style="margin-right:0px; margin-top:2px; padding-right:20px;">
                                    <li class="current dropdown spectral padding-18" class=""
                                        style="padding-right:15px;"><a href="{{ route('user.indexGet') }}" class="font1"
                                            style="padding-top:0px; padding-bottom:0px;"><b>Home</b></a>

                                    </li>

                                    <!-- <li><a href="" class="spectral font1"><b>About</b></a></li> -->

                                    <li class="dropdown spectral padding-18" style="padding-right:15px;"><a href=""
                                            style="padding-top:0px; padding-bottom:0px;"><b>Knowledge</b></a>
                                        <ul>
                                            <li class="spectral "><a href="{{ route('user.storiesGet') }}"
                                                    class="font1"><b>Stories</b></a>
                                            </li>
                                            <li class="spectral"><a href="{{ route('user.heroesLeaderGet') }}"
                                                    class="font1"><b>Heroes
                                                        and
                                                        Leaders</b></a></li>
                                            <li class="spectral"><a href="{{ route('user.foodCultureWebsite') }}"
                                                    class="font1"><b>Dharma
                                                        and culture</b></a></li>
                                            <li class="spectral"><a href="{{ route('user.sportsWebsite') }}"
                                                        class="font1"><b>
                                                            Sports</b></a></li>

                                                <li class="spectral"><a href="{{ route('user.artsWebsite') }}"
                                                        class="font1"><b>
                                                            Arts</b></a></li>
                                            <li class="spectral"><a href="{{ route('user.flipbookGet') }}"
                                                    class="font1"><b> Flipbook </b></a></li>

                                        </ul>
                                    </li>

                                    <li class="dropdown spectral padding-18" style="padding-right:15px;"><a href=""
                                            class="font1" style="padding-top:0px; padding-bottom:0px;"><b>
                                                Activity</b></a>
                                        <ul>
                                            <li class="spectral"><a href="{{ route('user.quizGet') }}"
                                                    class="font1"><b>Quiz</b></a></li>
                                            <li class="spectral"><a href="{{ route('user.quizIndiyatraGet') }}"
                                                    class="font1"><b>Quiz Indiyatra</b></a></li>
                                            <li class="spectral"><a href="{{ route('user.comingsoon') }}"
                                                    class="font1"><b>Puzzles</b></a></li>
                                            <li class="spectral"><a href="{{ route('user.comingsoon') }}"
                                                    class="font1"><b>Competition</b></a></li>
                                            <li class="spectral"><a href="{{ route('user.meetsGet') }}"
                                                    class="font1"><b>Meets
                                                    </b></a></li>

                                        </ul>
                                    </li>

                                    <li class="dropdown spectral padding-18" style="padding-right:15px;"><a
                                            href="{{ route('user.writeForUsGet') }}" class="font1"
                                            style="padding-top:0px; padding-bottom:0px;"><b>Write for
                                                us</b></a>

                                    </li>





                                </ul>

                                @if (!auth()->check())

                                <a href="{{ route('user.loginGet') }}">
                                    <button class="theme-btn btn-style-one spectral small-text" title="Login"
                                        name="submit-form"
                                        style="border-radius:0px; background-color: 5E69FF !important; padding:5px 15px 5px 15px; color: white; margin-top:12px; ">
                                        <img src="{{asset('public/images1/user.png') }}" alt="" style="height:30px;">
                                        SignIn/SignUp
                                    </button>
                                </a>



                                @else
                                <a href="{{ route('user.LogoutGet') }}">
                                    <button class="theme-btn btn-style-one spectral small-text" title="Logout"
                                        name="submit-form"
                                        style="border-radius:0px; background-color: 5E69FF !important; padding:5px 15px 5px 15px; color: white; margin-top:12px; ">
                                        <img src="{{asset('public/images1/user.png') }}" alt="" style="height:30px;">
                                        Welcome, {{ auth()->user()->name}}
                                        <img src="{{asset('public/images1/turn-off.png') }}" alt="" class="white-image"
                                            style="height:27px;"> </button>

                                </a>
                                @endif

                            </div>


                        </nav>



                    </div>
                </div>
            </div>
            <!-- End Sticky Menu -->




        </header>

        @yield('content')

        <footer class="main-footer">
            <div class="parallax-scene parallax-scene-7 anim-icons">
                <span data-depth="0.60" class="parallax-layer icon icon-sun-gray"></span>
                <span data-depth="0.60" class="parallax-layer icon icon-star-gray"></span>
                <span data-depth="0.60" class="parallax-layer icon icon-star-gray-2"></span>
                <span data-depth="0.60" class="parallax-layer icon icon-star-gray-3"></span>
                <span data-depth="0.40" class="parallax-layer icon icon-balloon-gray"></span>
            </div>

            <!--Footer Bottom-->
            <div class="footer-bottom" style="background-color: black; padding-top: 10px; padding-bottom: 10px;">

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-4">
                            <div class="auto-container clearfix">

                                <div class="copyright spectral" style="color: white;">&copy; <b class="spectral"> 2023
                                        Bharatiya Stories. All Rights Reserved</b></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="copyright" style="color: white;"> <b class="spectral"><a
                                        href="{{ route('user.collaboratorsGet') }}"
                                        style="color: white;">Collaborators</a> |
                                    <a href="{{ route('user.contactUsGet') }}" style="color:white;">Contact us</a></b>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="auto-container clearfix">

                                <div class="copyright" style="color: white;"> <b class="spectral"><a
                                            href="{{ route('user.disclaimerGet') }}"
                                            style="color: white;">Disclaimer</a> |
                                        Privacy Policy</b></div>
                                <div class="copyright" style="color: white; margin-left:10px;">
                                    <a href="{{ $social_data ? $social_data->facebook : '' }}">
                                        <img src="{{asset('public/images1/icons/facebook2.png')  }}"
                                            style="height:20px;" alt="">
                                    </a>
                                    <a href="{{ $social_data ? $social_data->instagram : '' }}">
                                        <img src="{{asset('public/images1/icons/instagram2.png')  }}"
                                            style="height:20px; margin-left:5px;" alt=""></a>
                                    <a href="{{ $social_data ? $social_data->linkedin : '' }}">
                                        <img src="{{asset('public/images1/icons/linkedin2.png')  }}"
                                            style="height:20px; margin-left:5px;" alt=""></a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </footer>
        <!--End Main Footer-->

    </div>
    <!--End pagewrapper-->


    <!--Scroll to top-->
    <div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-angle-up"></span></div>
    <!--Scroll to top-->
    <!-- Add these script tags to include required libraries -->

    <script src="{{asset('public/js/jquery.js') }}"></script>
    <script src="{{asset('public/js/popper.min.js') }}"></script>
    <script src="{{asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{asset('public/js/jquery-ui.js') }}"></script>
    <script src="{{asset('public/js/jquery.fancybox.js') }}"></script>
    <script src="{{asset('public/js/owl.js') }}"></script>
    <script src="{{asset('public/js/wow.js') }}"></script>
    <script src="{{asset('public/js/appear.js') }}"></script>
    <script src="{{asset('public/js/swiper.min.js') }}"></script>
    <script src="{{asset('public/js/parallax.min.js') }}"></script>
    <script src="{{asset('public/js/script.js') }}"></script>

    @yield('js')
	   <script>
        $(document).ready(function(){
        setTimeout(() => {
            $('.spectral').find('a').attr('style','');
            $('.spectral').find('span').attr('style','');
            $('.spectral').css('font-family', 'Spectral, serif');

        }, 1000);
        })
    </script>
</body>

</html>
