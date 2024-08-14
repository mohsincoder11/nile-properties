<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta name="author" content="">
    <meta name="description" content="">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

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
                        <div style="background-color: #fff;" id="logo"> <a href="#"><img src="images//logo (3).png"
                                    alt=""></a> <a href="#" class="dashboard-logo"><img src="images//logo (3).png"
                                    alt=""></a>
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
            <div class="utf_dashboard_content">




                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="utf_dashboard_list_box margin-top-0">
                            <h4 class="gray"><i class="fa fa-bars" aria-hidden="true"></i> Dashboard</h4>

                            <div class="col-md-12" style="margin-top: 4%;">
                                <div class="col-lg-2 col-md-6">
                                    <div class="utf_dashboard_stat color-1">
                                        <div class="utf_dashboard_stat_content">
                                            <h4>36</h4>
                                            <span>All Property Listing</span>
                                        </div>
                                        <div class="utf_dashboard_stat_icon"><i class="im im-icon-Map2"></i></div>
                                    </div>
                                </div>

                                <div class="col-lg-2 col-md-6">
                                    <div class="utf_dashboard_stat color-2">
                                        <div class="utf_dashboard_stat_content">
                                            <h4>615</h4>
                                            <span>All Enquires</span>
                                        </div>
                                        <div class="utf_dashboard_stat_icon"><i class="im im-icon-Add-UserStar"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-12" style="margin-top:2%;">
                                    <div class="style-1 element_tab">
                                        <ul class="utf_tabs_nav">
                                            <li class="active"><a href="#tab1b">All Listing</a></li>
                                            <li><a href="#tab2b">Enquires</a></li>

                                        </ul>
                                        <div class="tab_container">
                                            <div class="tab_content" id="tab1b">
                                                <div style="overflow-x: scroll;">
                                                    <table>
                                                        <tr>
                                                            <th>Sr No</th>
                                                            <th>Name of Hall</th>

                                                            <th>Address</th>

                                                            <th>Action</th>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>Grand Mehfil</td>
                                                            <td>Camp Road, Amravati</td>

                                                            <td><button class="btn"
                                                                    style="width:30px; background-color: red; border-color:red; color:white;"><i
                                                                        class="fa fa-trash"></i></button></td>
                                                        </tr>



                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab_content" id="tab2b">
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
                                    </div>
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

        <!-- Scripts -->
        <script src="scripts/jquery-3.4.1.min.js"></script>
        <script src="scripts/chosen.min.js"></script>
        <script src="scripts/perfect-scrollbar.min.js"></script>
        <script src="scripts/slick.min.js"></script>
        <script src="scripts/rangeslider.min.js"></script>
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
        <div id="color_switcher_preview">
            <div>
                <ul class="colors" id="color1">
                    <li><a href="#" class="stylesheet"></a></li>
                    <li><a href="#" class="stylesheet_1"></a></li>
                    <li><a href="#" class="stylesheet_2"></a></li>
                    <li><a href="#" class="stylesheet_3"></a></li>
                    <li><a href="#" class="stylesheet_4"></a></li>
                    <li><a href="#" class="stylesheet_5"></a></li>
                </ul>
            </div>
        </div>
</body>

</html>