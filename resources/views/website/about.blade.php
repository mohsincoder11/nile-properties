<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta name="author" content="">
  <meta name="description" content="">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nile Properties</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="images/favicon.png">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

  <!-- Style CSS -->
  <link rel="stylesheet" href="css/stylesheet.css">
  <link rel="stylesheet" href="css/mmenu.css">
  <link rel="stylesheet" href="css/style.css" id="colors">
  <!-- Google Font -->
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800&amp;display=swap&amp;subset=latin-ext,vietnamese"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800" rel="stylesheet"
    type="text/css">
</head>

<body>
  <style media="screen">
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: Exo;
    }

    @font-face {
      font-family: Exo;
      src: url(./fonts/Exo2.0-Medium.otf);
    }

    .main {
      width: 100%;
      height: 50vh;
      display: flex;
      justify-content: center;
      align-items: center;

    }

    .profile-card {
      position: relative;
      font-family: sans-serif;
      width: 220px;
      height: 220px;
      background: #fff;
      padding: 30px;
      border-radius: 50%;
      box-shadow: 0 0 22px #3336;
      transition: .6s;
      margin: 0 25px;
    }

    .profile-card:hover {
      border-radius: 10px;
      height: 260px;
    }

    .profile-card .img {
      position: relative;
      width: 100%;
      height: 100%;
      transition: .6s;
      z-index: 99;
    }

    .profile-card:hover .img {
      transform: translateY(-60px);
    }

    .img img {
      width: 100%;
      border-radius: 50%;
      box-shadow: 0 0 22px #3336;
      transition: .6s;
    }

    .profile-card:hover img {
      border-radius: 10px;
    }

    .caption {
      text-align: center;
      transform: translateY(-80px);
      opacity: 0;
      transition: .6s;
    }

    .profile-card:hover .caption {
      opacity: 1;
    }

    .caption h3 {
      font-size: 21px;
      font-family: sans-serif;
    }

    .caption p {
      font-size: 15px;
      color: #0c52a1;
      font-family: sans-serif;
      margin: 2px 0 9px 0;
    }

    .caption .social-links a {
      color: #333;
      margin-right: 15px;
      font-size: 21px;
      transition: .6s;
    }

    .social-links a:hover {
      color: #0c52a1;
    }

    /*---slider---*/

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    @keyframes fade {
      from {
        opacity: 0.4;
      }

      to {
        opacity: 1;
      }
    }

    body {
      background: #eeeee;
    }

    #slider {
      margin: 0 auto;
      width: 80%;
      overflow: hidden;
    }

    .slides {
      overflow: hidden;
      animation-name: fade;
      animation-duration: 1s;
      display: none;
    }

    img {
      width: 100%;
    }

    #dot {
      margin: 0 auto;
      text-align: center;
    }

    .dot {
      display: inline-block;
      border-radius: 50%;
      background: #d3d3d3;
      padding: 8px;
      margin: 10px 5px;
    }

    .active {
      background: black;
    }

    @media (max-width:567px) {
      #slider {
        width: 100%;

      }
    }

    #heading {
      display: block;
      text-align: center;
      font-size: 2em;
      margin: 10px 0px;

    }
  </style>
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
            <div id="logo"> <a href="#"><img src="images/logo (3).png" alt=""></a> </div>
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
            <div class="header_widget"> <a href="#dialog_signin_part" class="button border sign-in popup-with-zoom-anim"
                style="background-color: red !important;"><i class="fa fa-sign-in"></i> Sign In</a>

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
                      <div class="utf_row_form utf_form_wide_block form_forgot_part">
                        <div class="checkboxes fl_right">
                          <input id="remember-me" type="checkbox" name="check">
                          <label for="remember-me">Forgot
                            Password?</label>
                        </div>
                      </div>
                      <div class="utf_row_form">
                        <input type="submit" class="button border margin-top-5" name="login" value="Login" />
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
                          <a href="javascript:void(0);" class="social_bt google_btn mb-0"><i class="fa fa-google"></i>
                            Google</a>
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
                          <input type="text" class="input-text" name="email" id="email2" value="" placeholder="Email" />
                        </label>
                      </p>
                      <p class="utf_row_form utf_form_wide_block">
                        <label for="password1">
                          <input class="input-text" type="password" name="password1" id="password1"
                            placeholder="Contact No" />
                        </label>
                      </p>
                      <p class="utf_row_form utf_form_wide_block">
                        <label for="password2">
                          <input class="input-text" type="password" name="password2" id="password2"
                            placeholder=" Password" />
                        </label>
                      </p>
                      <input type="submit" class="button border fw margin-top-10" name="register" value="Register" />
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </header>
    <div class="clearfix"></div>

    <div id="titlebar" class="gradient margin-bottom-0">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2>About Us</h2>
            <nav id="breadcrumbs">
              <ul>
                <li><a href="#">Home</a></li>
                <li>About Us</li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <section class=" fullwidth_block padding-top-75 ">
      <div class="container">
        <div class="row">
          <div class="col-md-12">


            <div class="col-md-6">
              <p align="justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, cumque assumenda
                id deleniti sed molestiae tempora quod nulla at alias minus tenetur commodi debitis! Voluptate similique
                inventore minima amet est! Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eveniet laboriosam
                enim quos aperiam ab cumque laudantium ea quidem inventore, necessitatibus qui facere obcaecati officia
                a saepe tenetur! Accusantium, nemo numquam?Lorem ipsum dolor sit amet consectetur adipisicing elit.<br>
                Quia quo eaque distinctio unde minima nemo delectus, harum eos nihil fugiat accusantium ipsam beatae
                veritatis consectetur consequatur saepe non. Reprehenderit, doloribus. Lorem ipsum dolor sit amet
                consectetur adipisicing elit. Tempora adipisci ut, nisi eos quia velit quaerat odio, repellendus
                laboriosam nesciunt voluptatum nam cumque non suscipit. Accusantium eum earum itaque perspiciatis!</p>
            </div>
            <div class="col-md-6" align="justify">

              <span id="heading">Simple automatic slider</span>
              <div id="slider">
                <div class="slides">
                  <img src="https://placehold.co/500x400" width="100%" />
                </div>

                <div class="slides">
                  <img src="https://placehold.co/500x400" width="100%" />
                </div>

                <div class="slides">
                  <img src="https://placehold.co/500x400" width="100%">
                </div>

                <div class="slides">
                  <img src="https://placehold.co/500x400" width="100%" />
                </div>

                <div class="slides">
                  <img src="https://placehold.co/500x400" width="100%" />
                </div>

                <div id="dot"><span class="dot"></span><span class="dot"></span><span class="dot"></span><span
                    class="dot"></span><span class="dot"></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </div>
  </section>






  <section class=" fullwidth_block ">
    <div class="container">
      <div class="row">


        <div class="col-md-12">
          <h3 class="headline_part centered margin-bottom-40 margin-top-30">Director Desk</h3>
          <div class="col-md-3">
            <img src="https://placehold.co/500x400">
          </div>
          <div class="col-md-9" align="justify">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cum, similique. Ullam doloribus culpa, quod illum
            autem error sunt veniam quibusdam nemo neque quisquam similique necessitatibus itaque et unde commodi at.
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos error eaque excepturi sequi, labore est
            iusto quo dolore ratione repudiandae aperiam dicta, vitae, soluta officia aspernatur itaque ipsum autem
            facilis. Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic perspiciatis neque est accusantium
            suscipit cupiditate vero, aliquam rem expedita deleniti dolore omnis cumque similique? Minus fuga eaque ad
            ducimus iusto. Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos corporis veniam eligendi dicta
            architecto aut error eum similique nulla, unde magni expedita autem sed maiores, laudantium dolor, quas hic
            totam?Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia accusamus vero dolores laboriosam
            excepturi perspiciatis voluptatibus doloribus dignissimos est optio nemo obcaecati atque voluptatum rerum,
            neque mollitia veritatis odio. Quis.
          </div>

        </div>
      </div>
    </div>
  </section>
  <section>
    <h3 class="headline_part centered margin-bottom-40 margin-top-30">Our Member</h3>
    <div class="main">

      <div class="profile-card">
        <div class="img">
          <img
            src="https://1.bp.blogspot.com/-8c7QTLoyajs/YLjr2V6KYRI/AAAAAAAACO8/ViVPQpLWVM0jGh3RZhh-Ha1-1r3Oj62wQCNcBGAsYHQ/s16000/team-1-3.jpg">
        </div>
        <div class="caption">
          <h3>Vin Diesel</h3>
          <p>Operation Manager</p>

        </div>
      </div>
      <div class="profile-card">
        <div class="img">
          <img
            src="https://1.bp.blogspot.com/-vhmWFWO2r8U/YLjr2A57toI/AAAAAAAACO4/0GBonlEZPmAiQW4uvkCTm5LvlJVd_-l_wCNcBGAsYHQ/s16000/team-1-2.jpg">
        </div>
        <div class="caption">
          <h3>David Corner</h3>
          <p>Manager</p>

        </div>
      </div>
      <div class="profile-card">
        <div class="img">
          <img
            src="https://1.bp.blogspot.com/-AO5j2Y9lzME/YLjr3mxiqAI/AAAAAAAACPE/KAaYYTtQTrgBE3diTbxGoc4U4fCGx-C2gCNcBGAsYHQ/s16000/team-1-4.jpg">
        </div>
        <div class="caption">
          <h3>Tom Cruise</h3>
          <p>Brokerage Manager</p>

        </div>
      </div>

      <div class="profile-card">
        <div class="img">
          <img src="images/happy-client-01.jpg">
        </div>
        <div class="caption">
          <h3>Tom Cruise</h3>
          <p>Broker Associate</p>

        </div>
      </div>

      <div class="profile-card">
        <div class="img">
          <img src="images/happy-client-02.jpg">
        </div>
        <div class="caption">
          <h3>Tom Cruise</h3>
          <p>Agent</p>

        </div>
      </div>
    </div>
  </section>


  <!-- Footer -->
  <div id="footer" class="footer_sticky_part">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
          <h4>About Us</h4>
          <div class="utf_sidebar_textbox">
            <ul class="utf_contact_detail">
              <li><strong><i class="fa fa-envelope-o" aria-hidden="true"></i></strong> &nbsp;&nbsp;&nbsp;&nbsp; <span><a
                    href="mailto:info@example.com">info@example.com</a></span></li>
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
            <li><a href="#">Home</a></li>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Blogs</a></li>
            <li><a href="#">Contact Us</a></li>
          </ul>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-6">
          <h4>My Accounts</h4>
          <ul class="social_footer_link">
            <li><a href="#">Sign In</a></li>
            <li><a href="#">Listing Detials</a></li>

          </ul>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="footer_copyright_part">Copyright © 2023 All Rights Reserved.</div>
        </div>

      </div>
    </div>
  </div>
  <div id="bottom_backto_top"><a href="#"></a></div>
  <div>
    <a style="margin-top: 20%;"
      href="https://api.whatsapp.com/send?phone=51955081075&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20Varela%202."
      class="float" target="_blank">
      <i class="fa fa-whatsapp my-float"></i>
    </a>
  </div>
  </div>

  <!-- Scripts -->
  <script src="scripts/jquery-3.4.1.min.js"></script>
  <script src="scripts/chosen.min.js"></script>
  <script src="scripts/slick.min.js"></script>
  <script src="scripts/rangeslider.min.js"></script>
  <script src="scripts/magnific-popup.min.js"></script>
  <script src="scripts/jquery-ui.min.js"></script>
  <script src="scripts/mmenu.js"></script>
  <script src="scripts/tooltips.min.js"></script>
  <script src="scripts/color_switcher.js"></script>
  <script src="scripts/jquery_custom.js"></script>

  <!-- Style Switcher -->
  <script>
    var index = 0;
var slides = document.querySelectorAll(".slides");
var dot = document.querySelectorAll(".dot");

function changeSlide(){

  if(index<0){
    index = slides.length-1;
  }

  if(index>slides.length-1){
    index = 0;
  }

  for(let i=0;i<slides.length;i++){
    slides[i].style.display = "none";
    dot[i].classList.remove("active");
  }

  slides[index].style.display= "block";
  dot[index].classList.add("active");

  index++;

  setTimeout(changeSlide,2000);

}

changeSlide();
  </script>

</body>

</html>