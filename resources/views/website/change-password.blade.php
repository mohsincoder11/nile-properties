<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Change Password</title>

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
            <div style="background-color: #fff;" id="logo"> <a href="#"><img src="images/logo (3).png" alt=""></a> <a
                href="#" class="dashboard-logo"><img src="images/logo (3).png" alt=""></a> </div>
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
                <div class="utf_user_name"><span><img src="images/dashboard-avatar.jpg" alt=""></span>Hi</div>
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
            <li><a href="#"><i class="sl sl-icon-plus"></i>Add Amenities</a></li>
            <li><a href="#"><i class="sl sl-icon-plus"></i>Contact Information</a></li>
            <li><a href="#"><i class="sl sl-icon-plus"></i> Change Password</a></li>


          </ul>
        </div>
      </div>
      <div class="utf_dashboard_content">

        <div class="row">
          <div class="col-lg-12 col-md-12">
            <div class="utf_dashboard_list_box margin-top-0">
              <h4 class="gray"><i class="sl sl-icon-key"></i> Change Password</h4>
              <div class="utf_dashboard_list_box-static">
                <div class="my-profile">
                  <div class="row with-forms">

                    <div class="col-md-4">
                      <label>New Password</label>
                      <input type="text" class="input-text" name="password" placeholder="*********" value="">
                    </div>
                    <div class="col-md-4">
                      <label>Confirm New Password</label>
                      <input type="text" class="input-text" name="password" placeholder="*********" value="">
                    </div>
                    <div class="col-md-3" style="margin-top:3.4%;">
                      <button class="button btn_center_item margin-top-15">Change Password</button>
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
    (function($) {
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