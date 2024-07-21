<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquires</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/stylesheet.css">
    <link rel="stylesheet" href="css/mmenu.css">
    <link rel="stylesheet" href="css/perfect-scrollbar.css">
    <link rel="stylesheet" href="css/style.css" id="colors">
    <!-- Google Font -->
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet"
        type="text/css">
</head>

<style>
    table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: #dddddd;
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
        <header id="header_part" class="fixed fullwidth_block dashboard">
            <div id="header" class="not-sticky">
                <div class="container">
                    <div class="utf_left_side">
                        <div style="background-color: #fff;" id="logo"> <a href="#"><img src="images/logo (3).png"
                                    alt=""></a> <a href="#" class="dashboard-logo"><img src="images/logo (3).png"
                                    alt=""></a> </div>
                        <div class="mmenu-trigger">
                            <button class="hamburger utfbutton_collapse" type="button">
                                <span class="utf_inner_button_box">
                                    <span class="utf_inner_section"></span>
                                </span>
                            </button>
                        </div>
                        <nav id="navigation" class="style_one">
                            <ul id="responsive">
                                <li><a class="current" href="#">Home</a>

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

                            <div class="utf_user_menu">
                                <div class="utf_user_name"><span><img src="images/dashboard-avatar.jpg" alt=""></span>Hi
                                </div>
                                <ul>

                                    <li><a href="#"><i class="sl sl-icon-power"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="clearfix"></div>

        <!-- Dashboard -->
        <div id="dashboard">
            <a href="#" class="utf_dashboard_nav_responsive"><i class="fa fa-reorder"></i> Dashboard Sidebar Menu</a>
            <div class="utf_dashboard_navigation js-scrollbar">
                <div class="utf_dashboard_navigation_inner_block">
                    <ul>
                        <li><a href="#"><i class="sl sl-icon-layers"></i> Dashboard</a></li>
                        <li><a href="#"><i class="sl sl-icon-plus"></i>Listing Information</a></li>
                        <li><a href="#"><i class="sl sl-icon-plus"></i>Add Images</a></li>
                        <li><a href="#"><i class="sl sl-icon-plus"></i>Add Features</a></li>
                        <li><a href="#"><i class="sl sl-icon-plus"></i>Contact Information</a></li>
                        <li><a href="#"><i class="sl sl-icon-plus"></i> Change Password</a></li>
                    </ul>
                </div>
            </div>
            <div id="dialog_signin_part" class="zoom-anim-dialog mfp-hide">
                <div class="small_dialog_header">
                    <h3>Sign In</h3>
                </div>
                <div class="utf_signin_form style_one">
                    <ul class="utf_tabs_nav">
                        <li class=""><a href="#tab1">Log In</a></li>
                        <li><a href="#tab2">Register</a></li>
                    </ul>
                    <div class="tab_container alt">
                        <div class="tab_content" id="tab1" style="display:none;">
                            <form method="post" class="login">
                                <p class="utf_row_form utf_form_wide_block">
                                    <label for="username">
                                        <input type="text" class="input-text" name="username" id="username" value=""
                                            placeholder="Username" />
                                    </label>
                                </p>
                                <p class="utf_row_form utf_form_wide_block">
                                    <label for="password">
                                        <input class="input-text" type="password" name="password" id="password"
                                            placeholder="Password" />
                                    </label>
                                </p>
                                <div class="utf_row_form utf_form_wide_block form_forgot_part"> <span
                                        class="lost_password fl_left"> <a href="javascript:void(0);">Forgot
                                            Password?</a> </span>
                                    <div class="checkboxes fl_right">
                                        <input id="remember-me" type="checkbox" name="check">
                                        <label for="remember-me">Remember Me</label>
                                    </div>
                                </div>
                                <div class="utf_row_form">
                                    <input type="submit" class="button border margin-top-5" name="login"
                                        value="Login" />
                                </div>
                                <div class="utf-login_with my-3">
                                    <span class="txt">Or Login in With</span>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 col-6">
                                        <a href="javascript:void(0);" class="social_bt facebook_btn mb-0"><i
                                                class="fa fa-facebook"></i> Facebook</a>
                                    </div>
                                    <div class="col-md-6 col-6">
                                        <a href="javascript:void(0);" class="social_bt google_btn mb-0"><i
                                                class="fa fa-google"></i> Google</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="tab_content" id="tab2" style="display:none;">
                            <form method="post" class="register">
                                <p class="utf_row_form utf_form_wide_block">
                                    <label for="username2">
                                        <input type="text" class="input-text" name="username" id="username2" value=""
                                            placeholder="Username" />
                                    </label>
                                </p>
                                <p class="utf_row_form utf_form_wide_block">
                                    <label for="email2">
                                        <input type="text" class="input-text" name="email" id="email2" value=""
                                            placeholder="Email" />
                                    </label>
                                </p>
                                <p class="utf_row_form utf_form_wide_block">
                                    <label for="password1">
                                        <input class="input-text" type="password" name="password1" id="password1"
                                            placeholder="Password" />
                                    </label>
                                </p>
                                <p class="utf_row_form utf_form_wide_block">
                                    <label for="password2">
                                        <input class="input-text" type="password" name="password2" id="password2"
                                            placeholder="Confirm Password" />
                                    </label>
                                </p>
                                <input type="submit" class="button border fw margin-top-10" name="register"
                                    value="Register" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content -->
            <div class="utf_dashboard_content">

                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="utf_dashboard_list_box margin-top-0">
                            <h4 class="gray"><i class="fa fa-bars" aria-hidden="true"></i>Enquires</h4>
                            <div class="utf_dashboard_list_box-static">

                                <div class="my-profile">
                                    <div class="row with-forms">


                                        <table>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Message</th>
                                                <th>Action</th>
                                            </tr>
                                            <tr>
                                                <td>1</td>
                                                <td>Maria Anders</td>
                                                <td>MariaAnders@gmail.com</td>
                                                <td></td>
                                                <td><button class="btn"
                                                        style="width:30px; background-color: red; border-color:red; color:white;"><i
                                                            class="fa fa-trash"></i></button></td>

                                            </tr>



                                        </table>


                                    </div>
                                </div>
                                <button class="button preview btn_center_item margin-top-15">Save </button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="footer_copyright_part">Copyright © 2022 All Rights Reserved.</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>

    <!-- Scripts -->
    <script src="scripts/jquery-3.4.1.min.js"></script>
    <script src="scripts/chosen.min.js"></script>
    <script src="scripts/perfect-scrollbar.min.js"></script>
    <script src="scripts/slick.min.js"></script>
    <script src="scripts/rangeslider.min.js"></script>
    <script src="scripts/bootstrap-select.min.js"></script>
    <script src="scripts/magnific-popup.min.js"></script>
    <script src="scripts/jquery-ui.min.js"></script>
    <script src="scripts/mmenu.js"></script>
    <script src="scripts/tooltips.min.js"></script>
    <script src="scripts/color_switcher.js"></script>
    <script src="scripts/jquery_custom.js"></script>
    <script>
        (function ($) {
			try {
				var jscr1 = $('.js-scrollbar');
				if (jscr1[0]) {
					const ps1 = new PerfectScrollbar('.js-scrollbar');

				}
			} catch (error) {
				console.log(error);
			}
		})(jQuery);
    </script>
    <!-- Style Switcher -->


    <!-- Maps -->
    <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=en"></script>
    <script src="scripts/infobox.min.js"></script>
    <script src="scripts/markerclusterer.js"></script>
    <script src="scripts/maps.js"></script>
    <script>
        $(".utf_opening_day.utf_js_demo_hours .utf_chosen_select").each(function () {
			$(this).append('' +
				'<option></option>' +
				'<option>Closed</option>' +
				'<option>1 AM</option>' +
				'<option>2 AM</option>' +
				'<option>3 AM</option>' +
				'<option>4 AM</option>' +
				'<option>5 AM</option>' +
				'<option>6 AM</option>' +
				'<option>7 AM</option>' +
				'<option>8 AM</option>' +
				'<option>9 AM</option>' +
				'<option>10 AM</option>' +
				'<option>11 AM</option>' +
				'<option>12 AM</option>' +
				'<option>1 PM</option>' +
				'<option>2 PM</option>' +
				'<option>3 PM</option>' +
				'<option>4 PM</option>' +
				'<option>5 PM</option>' +
				'<option>6 PM</option>' +
				'<option>7 PM</option>' +
				'<option>8 PM</option>' +
				'<option>9 PM</option>' +
				'<option>10 PM</option>' +
				'<option>11 PM</option>' +
				'<option>12 PM</option>');
		});
    </script>
    <script src="scripts/dropzone.js"></script>
</body>

</html>
