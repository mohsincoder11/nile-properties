<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('public/frontend/assets/images/favicon.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('public/frontend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
    <link href="{{asset('public/frontend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}"
        rel="stylesheet" />
    <link href="{{asset('public/frontend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/frontend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css')}}"
        rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('public/frontend/assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('public/frontend/assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('public/frontend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/assets/css/icons.css')}}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/semi-dark.')}}" />
    <link rel="stylesheet" href="{{asset('public/frontend/assets/css/header-colors.css')}}" />
    <link href="{{asset('public/frontend/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('public/frontend/assets/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    {{-- quiz script --}}
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>



    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

    <title>Bharatiya Stories</title>
</head>

<style>
    .program-section {
        position: relative;
        padding: 120px 0 90px;
        background-color: #ffffff;
    }

    .program-section .icon-star-5 {
        top: auto !important;
        left: -190px !important;
        bottom: 145px !important;
    }

    .program-section .icon-star-4 {
        right: -140px !important;
        bottom: 240px !important;
        top: auto !important;
        left: auto !important;
    }

    .program-section .icon-star-3 {
        top: 190px !important;
        left: -100px !important;
    }

    .icon-star-5 {
        height: 92px;
        width: 54px;
        background-image: url(../images/icons/icon-star-5.png);
    }

    .program-block {
        position: relative;
        margin-bottom: 30px;
    }

    .spectral img {
        margin: 0 20px;
    }

    .program-block .inner-box {
        position: relative;
        border-radius: px;
        overflow: hidden;
        -webkit-transition: all 300ms ease;
        -moz-transition: all 300ms ease;
        -ms-transition: all 300ms ease;
        -o-transition: all 300ms ease;
        transition: all 300ms ease;
    }

    .program-block .inner-box:hover {
        box-shadow: 0 20px 30px rgba(0, 0, 0, 0.05);
    }

    .program-block .image-box {
        position: relative;
    }

    .program-block .image {
        position: relative;
        margin-bottom: 0;
        background-color: white;
    }

    .program-block .image img {
        display: block;
        width: 100%;
        height: auto;
        -webkit-transition: all 500ms ease;
        -moz-transition: all 500ms ease;
        -ms-transition: all 500ms ease;
        -o-transition: all 500ms ease;
        transition: all 500ms ease;
    }

    .program-block .inner-box:hover .image img {
        opacity: .80;
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1);
    }

    .program-block .lower-content {
        position: relative;
        padding: 55px 60px 0;
        background-color: #ffffff;
    }

    .program-block h4 {
        position: relative;
        display: block;
        font-size: 24px;
        line-height: 1.2em;
        color: #1e2c67;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .program-block h4 a {
        color: #1e2c67;
        display: inline-block;
        -webkit-transition: all 300ms ease;
        -moz-transition: all 300ms ease;
        -ms-transition: all 300ms ease;
        -o-transition: all 300ms ease;
        transition: all 300ms ease;
    }

    .program-block .inner-box:hover h4 a {
        color: #25bdd8;
    }

    .program-block .text {
        position: relative;
        margin-bottom: 20px;
    }

    .program-block .program-info {
        position: relative;
        border-top: 1px solid #e8e6ec;
        padding: 25px 0 45px;
    }

    .program-block .program-info li {
        position: relative;
        display: block;
        font-size: 16px;
        line-height: 30px;
        color: #1e2c67;
        font-weight: 500;
        margin-bottom: 10px;
        padding-left: 40px;
    }

    .program-block .program-info li span {
        color: #696478;
        font-weight: 500;
        margin-right: 5px;
    }

    .program-block .program-info li .icon {
        position: absolute;
        left: 0;
        top: 0;
        font-size: 22px;
        color: #ff4986;
        font-weight: 400;
    }

    .program-block .btn-box {
        position: relative;
        text-align: center;
    }

    .program-block .btn-box a {
        position: relative;
        display: block;
        font-size: 18px;
        line-height: 30px;
        padding: 10px 30px;
        color: #ffffff;
        background-color: #25bdd8;
        -webkit-transition: all 300ms ease;
        -moz-transition: all 300ms ease;
        -ms-transition: all 300ms ease;
        -o-transition: all 300ms ease;
        transition: all 300ms ease;
    }

    .program-block .inner-box:hover .btn-box a {
        background-color: #1e2c67;
    }

    .program-section.style-two {
        background-color: #ffffff;
        padding: 120px 0 115px;
    }

    .program-section.style-two .program-block .lower-content {
        border: 1px solid #ece6dd;
        border-top: 0;
    }
</style>


<style>
    .program-section {
        position: relative;
        padding: 120px 0 90px;
        background-color: #ffffff;
    }

    .program-section .icon-star-5 {
        top: auto !important;
        left: -190px !important;
        bottom: 145px !important;
    }

    .program-section .icon-star-4 {
        right: -140px !important;
        bottom: 240px !important;
        top: auto !important;
        left: auto !important;
    }

    .program-section .icon-star-3 {
        top: 190px !important;
        left: -100px !important;
    }

    .icon-star-5 {
        height: 92px;
        width: 54px;
        background-image: url(../images/icons/icon-star-5.png);
    }

    .program-block {
        position: relative;
        margin-bottom: 30px;
    }

    .program-block .inner-box {
        position: relative;
        border-radius: px;
        overflow: hidden;
        -webkit-transition: all 300ms ease;
        -moz-transition: all 300ms ease;
        -ms-transition: all 300ms ease;
        -o-transition: all 300ms ease;
        transition: all 300ms ease;
    }

    .program-block .inner-box:hover {
        box-shadow: 0 20px 30px rgba(0, 0, 0, 0.05);
    }

    .program-block .image-box {
        position: relative;
    }

    .program-block .image {
        position: relative;
        margin-bottom: 0;
        background-color: white;
    }

    .program-block .image img {
        display: block;
        width: 100%;
        height: auto;
        -webkit-transition: all 500ms ease;
        -moz-transition: all 500ms ease;
        -ms-transition: all 500ms ease;
        -o-transition: all 500ms ease;
        transition: all 500ms ease;
    }

    .program-block .inner-box:hover .image img {
        opacity: .80;
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1);
    }

    .program-block .lower-content {
        position: relative;
        padding: 55px 60px 0;
        background-color: #ffffff;
    }

    .program-block h4 {
        position: relative;
        display: block;
        font-size: 24px;
        line-height: 1.2em;
        color: #1e2c67;
        font-weight: 700;
        margin-bottom: 18px;
    }

    .program-block h4 a {
        color: #1e2c67;
        display: inline-block;
        -webkit-transition: all 300ms ease;
        -moz-transition: all 300ms ease;
        -ms-transition: all 300ms ease;
        -o-transition: all 300ms ease;
        transition: all 300ms ease;
    }

    .program-block .inner-box:hover h4 a {
        color: #25bdd8;
    }

    .program-block .text {
        position: relative;
        margin-bottom: 20px;
    }

    .program-block .program-info {
        position: relative;
        border-top: 1px solid #e8e6ec;
        padding: 25px 0 45px;
    }

    .program-block .program-info li {
        position: relative;
        display: block;
        font-size: 16px;
        line-height: 30px;
        color: #1e2c67;
        font-weight: 500;
        margin-bottom: 10px;
        padding-left: 40px;
    }

    .program-block .program-info li span {
        color: #696478;
        font-weight: 500;
        margin-right: 5px;
    }

    .program-block .program-info li .icon {
        position: absolute;
        left: 0;
        top: 0;
        font-size: 22px;
        color: #ff4986;
        font-weight: 400;
    }

    .program-block .btn-box {
        position: relative;
        text-align: center;
    }

    .program-block .btn-box a {
        position: relative;
        display: block;
        font-size: 18px;
        line-height: 30px;
        padding: 10px 30px;
        color: #ffffff;
        background-color: #25bdd8;
        -webkit-transition: all 300ms ease;
        -moz-transition: all 300ms ease;
        -ms-transition: all 300ms ease;
        -o-transition: all 300ms ease;
        transition: all 300ms ease;
    }

    .program-block .inner-box:hover .btn-box a {
        background-color: #1e2c67;
    }

    .program-section.style-two {
        background-color: #ffffff;
        padding: 120px 0 115px;
    }

    .program-section.style-two .program-block .lower-content {
        border: 1px solid #ece6dd;
        border-top: 0;
    }
</style>



<!-- style for loader -->
<style>
    #loader-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.7);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .loader {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #3498db;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>




<body>


    <!-- html for Loader -->
    <div id="loader-overlay">
        <div class="loader"></div>
    </div>


    <!--wrapper-->
    <div class="wrapper">
        <!--sidebar wrapper -->
        <div class="sidebar-wrapper" data-simplebar="true">
            <div class="sidebar-header">
                <div>
                    <img src="{{asset('public/frontend/assets/images/logo-1 (1).png')}}" class="logo-icon"
                        alt="logo icon">
                </div>
                <div>
                    <h4 class="logo-text" style="font-size: 18px;">Bharatiya Stories</h4>
                </div>
                <div class="toggle-icon ms-auto">
                </div>
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li>
                    <a href="{{route('user.dashboard')}}">
                        <div class="parent-icon"><i class='bx bx-laptop' style="font-size: 17px;"></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>
                <!-- <li>
					<a href="login.html">
						<div class="parent-icon"><i class='bx bx-user-circle' style="font-size: 17px;"></i>
						</div>
						<div class="menu-title">Login</div>
					</a>
				</li> -->
                <li>
                    <a href="#" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-home-circle" style="font-size: 17px;"></i>
                        </div>
                        <div class="menu-title">Home</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('user.slider')}}">
                                <div class="parent-icon"><i class='bx bx-slider-alt' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title">Website Slider</div>
                            </a>

                        </li>
                        <li>
                            <a href="{{route('user.about')}}">
                                <div class="parent-icon"><i class='bx bx-message-alt' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title">About</div>
                            </a>

                        </li>
                        <li>
                            <a href="{{route('user.printcolorplay')}}">
                                <div class="parent-icon"><i class='bx bx-play-circle' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title">Print, Color & Play</div>
                            </a>

                        </li>

                    </ul>
                </li>
                <li>
                    <a href="#" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-bulb" style="font-size: 17px;"></i>
                        </div>
                        <div class="menu-title">Knowledge</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('user.stories')}}">
                                <div class="parent-icon"><i class='bx bx-landscape' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title">Managed Stories</div>
                            </a>

                        </li>
                        <li>
                            <a href="{{route('user.heroesLeaders')}}">
                                <div class="parent-icon"><i class='bx bx-trophy' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title"> Managed Heroes & Leaders</div>
                            </a>

                        </li>
                        <li>
                            <a href="{{route('user.FoodAndCulture')}}">
                                <div class="parent-icon"><i class='bx bx-food-tag' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title"> Managed Dharma & Culture</div>
                            </a>

                        </li>




                        <li>
                            <a href="{{route('user.Sport')}}">
                                <div class="parent-icon"><i class='bx bx-run' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title"> Managed Sports</div>
                            </a>

                        </li>

                        <li>
                            <a href="{{route('user.Art')}}">
                                <div class="parent-icon"><i class='bx bx-cube' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title"> Managed Arts</div>
                            </a>

                        </li>
						<li>
                            <a href="{{route('user.flipbook')}}">
                                <div class="parent-icon"><i class='bx bx-cube' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title"> Managed Flipbook</div>
                            </a>

                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#" class="has-arrow">
                        <div class="parent-icon"><i class="bx bx-command" style="font-size: 17px;"></i>
                        </div>
                        <div class="menu-title">Activity</div>
                    </a>
                    <ul>
                        <li>
                            <a href="{{route('user.quizes')}}">
                                <div class="parent-icon"><i class='bx bx-shape-circle' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title">Quiz</div>
                            </a>


                        </li>
                        <li>
                            <a href="{{route('user.QuizIndiyatra')}}">
                                <div class="parent-icon"><i class='bx bx-shape-circle' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title">Indiayatra Quiz </div>
                            </a>
                        </li>
						<li>
                            <a href="{{route('user.meets')}}">
                                <div class="parent-icon"><i class='bx bx-user' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title">puzzles</div>
                            </a>

                        </li>
						<li>
                            <a href="{{route('user.Competition')}}">
                                <div class="parent-icon"><i class='bx bx-user' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title">Competition</div>
                            </a>

                        </li>
                        <li>
                            <a href="{{route('user.meets')}}">
                                <div class="parent-icon"><i class='bx bx-user' style="font-size: 17px;"></i>
                                </div>
                                <div class="menu-title">Meets</div>
                            </a>

                        </li>


                    </ul>
                </li>


                <li>
                    <a href="{{route('user.collaborators')}}">
                        <div class="parent-icon"><i class='bx bx-user' style="font-size: 17px;"></i>
                        </div>
                        <div class="menu-title">Collaborators</div>
                    </a>

                </li>

                <li>
                    <a href="{{route('user.writeForUs')}}">
                        <div class="parent-icon"><i class='bx bx-highlight' style="font-size: 17px;"></i>
                        </div>
                        <div class="menu-title">Write For Us</div>
                    </a>

                </li>
                <li>
                    <a href="{{route('user.contactus')}}">
                        <div class="parent-icon"><i class='bx bx-mobile' style="font-size: 17px;"></i>
                        </div>
                        <div class="menu-title">Contact us</div>
                    </a>

                </li>
                <li>
                    <a href="{{route('user.socialLinks')}}">
                        <div class="parent-icon"><i class='bx bx-globe' style="font-size: 17px;"></i>
                        </div>
                        <div class="menu-title">Social Links</div>
                    </a>

                </li>
                <li>
                    <a href="{{route('feedbackValue.user')}}">
                        <div class="parent-icon"><i class='bx bx-comment-dots' style="font-size: 17px;"></i>
                        </div>
                        <div class="menu-title">User Feedback</div>
                    </a>

                </li>

                <!-- <li>
					<a href="#" class="has-arrow">
						<div class="parent-icon"><i class="lni lni-list" style="font-size: 17px;"></i>
						</div>
						<div class="menu-title">Activity</div>
					</a>
					<ul>
						<li> <a href="quizmasters.html"><i class="bx bx-right-arrow-alt"></i>Quiz Masters</a>
						</li>
						<li> <a href="quiz.html"><i class="bx bx-right-arrow-alt"></i>Quiz</a>
						</li>
					</ul>
				</li>

				<li>
					<a href="Feedback.html">
						<div class="parent-icon"><i class="lni lni-checkmark-circle" style="font-size: 17px;"></i>
						</div>
						<div class="menu-title">Feedback by Parents</div>
					</a>
				</li>

				<li>
					<a href="List-of-users.html">
						<div class="parent-icon"><i class="fadeIn animated bx bx-book-alt" style="font-size: 17px;"></i>
						</div>
						<div class="menu-title">List Of Users</div>
					</a>
				</li>
				<li>
					<a href="Subscribers.html">
						<div class="parent-icon"><i class="fadeIn animated bx bx-bell" style="font-size: 17px;"></i>
						</div>
						<div class="menu-title">List of Subscribers</div>
					</a>
				</li> -->
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand">
                    <div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
                    </div>

                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item mobile-search-icon">
                                <a class="nav-link" href="#">
                                </a>
                            </li>

                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#">

                                    </a>
                                    <div class="header-notifications-list">
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i
                                                        class="bx bx-group"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Customers<span
                                                            class="msg-time float-end">14 Sec
                                                            ago</span></h6>
                                                    <p class="msg-info">5 new user registered</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i
                                                        class="bx bx-cart-alt"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Orders <span class="msg-time float-end">2
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">You have recived new orders</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i
                                                        class="bx bx-file"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">24 PDF File<span class="msg-time float-end">19
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">The pdf files generated</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i
                                                        class="bx bx-send"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Time Response <span
                                                            class="msg-time float-end">28 min
                                                            ago</span></h6>
                                                    <p class="msg-info">5.1 min avarage time response</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-info text-info"><i
                                                        class="bx bx-home-circle"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Product Approved <span
                                                            class="msg-time float-end">2 hrs ago</span></h6>
                                                    <p class="msg-info">Your new product has approved</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-danger text-danger"><i
                                                        class="bx bx-message-detail"></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New Comments <span class="msg-time float-end">4
                                                            hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">New customer comments recived</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-success text-success"><i
                                                        class='bx bx-check-square'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Your item is shipped <span
                                                            class="msg-time float-end">5 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">Successfully shipped your item</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-primary text-primary"><i
                                                        class='bx bx-user-pin'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">New 24 authors<span
                                                            class="msg-time float-end">1 day
                                                            ago</span></h6>
                                                    <p class="msg-info">24 new authors joined last week</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="{{('#')}}">
                                            <div class="d-flex align-items-center">
                                                <div class="notify bg-light-warning text-warning"><i
                                                        class='bx bx-door-open'></i>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Defense Alerts <span
                                                            class="msg-time float-end">2 weeks
                                                            ago</span></h6>
                                                    <p class="msg-info">45% less alerts last 4 weeks</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="#">
                                        <div class="text-center msg-footer">View All Notifications</div>
                                    </a>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#"
                                    role="button" data-bs-toggle="dropdown" aria-expanded="false">

                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="#">
                                        <div class="msg-header">
                                            <p class="msg-header-title">Messages</p>
                                            <p class="msg-header-clear ms-auto">Marks all as read</p>
                                        </div>
                                    </a>
                                    <div class="header-message-list">
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{asset('public/frontend/assets/images/avatars/avatar-1.png')}}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Daisy Anderson <span
                                                            class="msg-time float-end">5 sec
                                                            ago</span></h6>
                                                    <p class="msg-info">The standard chunk of lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{asset('public/frontend/assets/images/avatars/avatar-2.png')}}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Althea Cabardo <span
                                                            class="msg-time float-end">14
                                                            sec ago</span></h6>
                                                    <p class="msg-info">Many desktop publishing packages</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{asset('public/frontend/assets/images/avatars/avatar-3.png')}}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Oscar Garner <span class="msg-time float-end">8
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{asset('public/frontend/assets/images/avatars/avatar-4.png')}}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Katherine Pechon <span
                                                            class="msg-time float-end">15
                                                            min ago</span></h6>
                                                    <p class="msg-info">Making this the first true generator</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{asset('public/frontend/assets/images/avatars/avatar-5.png')}}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Amelia Doe <span class="msg-time float-end">22
                                                            min
                                                            ago</span></h6>
                                                    <p class="msg-info">Duis aute irure dolor in reprehenderit</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{asset('public/frontend/assets/images/avatars/avatar-6.png')}}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Cristina Jhons <span
                                                            class="msg-time float-end">2 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">The passage is attributed to an unknown</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{asset('public/frontend/assets/images/avatars/avatar-7.png')}}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">James Caviness <span
                                                            class="msg-time float-end">4 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">The point of using Lorem</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{asset('public/frontend/assets/images/avatars/avatar-8.png"
                                                        class="msg-avatar')}}" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Peter Costanzo <span
                                                            class="msg-time float-end">6 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">It was popularised in the 1960s</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{asset('public/frontend/assets/images/avatars/avatar-9.png')}}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">David Buckley <span
                                                            class="msg-time float-end">2 hrs
                                                            ago</span></h6>
                                                    <p class="msg-info">Various versions have evolved over</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{asset('public/frontend/assets/images/avatars/avatar-10.png')}}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Thomas Wheeler <span
                                                            class="msg-time float-end">2 days
                                                            ago</span></h6>
                                                    <p class="msg-info">If you are going to use a passage</p>
                                                </div>
                                            </div>
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex align-items-center">
                                                <div class="user-online">
                                                    <img src="{{asset('public/frontend/assets/images/avatars/avatar-11.png')}}"
                                                        class="msg-avatar" alt="user avatar">
                                                </div>
                                                <div class="flex-grow-1">
                                                    <h6 class="msg-name">Johnny Seitz <span class="msg-time float-end">5
                                                            days
                                                            ago</span></h6>
                                                    <p class="msg-info">All the Lorem Ipsum generators</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    <a href="#">
                                        <div class="text-center msg-footer">View All Messages</div>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{asset('public/frontend/assets/images/avatars/avatar-16.png')}}" class="user-img"
                                alt="user avatar">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0">Admin</p>

                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">

                            <li>
    <a id="logoutLink" class="dropdown-item" href="{{ route('user.AdminLogout') }}">
        <i class='bx bx-log-out-circle'></i>
        <span>Logout</span>
    </a>
</li>

                        </ul>

                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->

        <div class="modal" id="customModal" style="width:50% !important; margin-left:25%;">
            <div class="modal-dialog" style="width:50% !important; margin-left:25%;">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Confirmation</h4>
                        <button type="button" class="close" data-dismiss="modal"
                            onclick="closeCustomModal()">&times;</button>
                    </div>

                    <!-- Modal Body -->
                    <div class="modal-body">
                        Are you sure you want to delete?
                    </div>

                    <!-- Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" onclick="deleteItem()">Yes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            onclick="closeCustomModal()">No</button>
                    </div>

                </div>
            </div>
        </div>
        {{-- yeild for main container --}}

        @yield('main-container')


        {{-- yeild end --}}


        {{-- start footer --}}

        <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>Completed</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>43</td>
                                    <td><button type="button" class="btn1 btn-outline-success"><i
                                                class='bx bx-edit-alt me-0'></i></button> <button type="button"
                                            class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="primarycontact" role="tabpanel">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example3" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Cancelled</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>23</td>
                                    <td><button type="button" class="btn1 btn-outline-success"><i
                                                class='bx bx-edit-alt me-0'></i></button> <button type="button"
                                            class="btn1 btn-outline-danger"><i class='bx bx-trash me-0'></i></button>
                                    </td>

                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> 
    <a href="#" class="back-to-top"><i
            class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->

    </div>
    <!--end wrapper-->

    <!-- Bootstrap JS -->
    <script src="{{asset('public/frontend/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('public/frontend/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('public/frontend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/table-datatable.js')}}"></script>
    <script src="{{asset('public/frontend/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('public/frontend/assets/js/form-select2.js')}}"></script>
    <!--app JS-->
    <script src="{{asset('public/frontend/assets/js/app.js')}}"></script>
    <script src="{{asset('public/assets/plugins/select2/js/select2.min.js')}}"></script>
    <script src="{{asset('public/assets/js/form-select2.js')}}"></script>
<script>
    $(document).ready(function(){
        // Select the logout link
        var logoutLink = $('#logoutLink');
        
        // Attach a click event listener
        logoutLink.click(function(event){
            // Prevent the link from navigating immediately
            event.preventDefault();

            // Show a confirmation message
            var confirmLogout = confirm('Are you sure you want to logout?');

            // If the user confirms, proceed with the logout
            if(confirmLogout) {
                // Redirect to the logout route
                window.location.href = logoutLink.attr('href');
            }
        });
    });
</script>




    <!-- Script for Loader -->
    <script>
        document.onreadystatechange = function () {
			
        if (document.readyState === "complete") {
            // Page is fully loaded, hide the loader
            document.getElementById('loader-overlay').style.display = 'none';
        } else {
            // Page is still loading, show the loader
            document.getElementById('loader-overlay').style.display = 'flex';
        }
    };
    </script>
    <script>
        function showImagePreview() {
                    var input = document.getElementById('file');
                    var imagePreview = document.getElementById('imagePreview');
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                        };
                        reader.readAsDataURL(input.files[0]);
                    } else {
                        imagePreview.src = ''; // Clear the image source if no file is selected.
                    }
                }
    </script>
    <script>
        function openCustomModal(deleteUrl) {
            // Set the delete URL in the modal
            document.getElementById('customModal').deleteUrl = deleteUrl;

            // Show the modal
            $('#customModal').modal('show');
        }

        function deleteItem() {
            // Get the delete URL from the modal
            var deleteUrl = document.getElementById('customModal').deleteUrl;

            // Redirect to the delete URL
            window.location.href = deleteUrl;

            // Hide the modal
            $('#customModal').modal('hide');
        }

        function closeCustomModal() {
        // Hide the modal
        $('#customModal').modal('hide');
        }
    </script>

    @yield('js')

</body>


</html>

{{-- end footer --}}
