@extends('webscite.layout')
@section('content')
<!-- End Main Header -->

<!--Page Title-->
<section class="page-banner curve-offwhite" style="background-image:url(public/images1/background/stories-1.png);">
    <div class="auto-container">
        <h1 class="spectral" style="font-size: 60px;"><img src="public/images1/starting-title.gif" style="height:250px;"
                alt="">Indic Stories</h1>
        <a href="{{ route('user.indexGet') }}" class="home-btn"><span class="flaticon-house-outline"></span></a>
    </div>
</section>
<!--End Page Title-->



<!-- Program Section -->
<section class="program-section" style="padding-top:20px;">

    <div class="auto-container">
        <div class="sec-title text-center">
            <h2 style="color:black; font-family: 'ADLaM Display', sans-serif;">Stories For Kids</h2>
        </div>

        <div class="row">
            <!-- Program Block -->
            <div class="program-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image" style="border-bottom-left-radius: 0px !important;">
                            <a href="{{ route('user.story1Get') }}"><img src="public/images1/story-1-2.png" alt=""></a>
                        </figure>
                    </div>


                </div>
                <div class="lower-content" style="padding-top:14px; padding-left: 18px; padding-right: 18px;">

                    <h3><a href="{{ route('user.story1Get') }}" class="spectral">Kutty Pullaiyaar and Chandran</a></h3>
                    <div class="text" style=" padding-top:12px; text-align: justify;">One day, Kutty Pullaiyaar
                        after a sumptuous meal of kozhkkatais, appams, sundal, payasam and his favourite fruits
                        (sugarcane, jackfruit, coconut, guava, banana and java plum )</div>
                    <div class=" btn-box"><a href="{{ route('user.story1Get') }}">Read more &nbsp;<span
                                class="icon flaticon-right-arrow"></span></a> <br></div>
                </div>
            </div>

            <!-- Program Block -->
            <div class="program-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="400ms">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image">
                            <a href="{{ route('user.story2Get') }}"><img src="public/images1/story-1-1.png" alt=""></a>
                        </figure>
                    </div>

                </div>
                <div class="lower-content" style="padding-top:14px; padding-left: 18px; padding-right: 18px;">

                    <h3><a href="{{ route('user.story2Get') }}" class="spectral">Story of Rock Fort</a></h3>
                    <div class="text" style=" padding-top:12px; text-align: justify;">The story of the temple at
                        Rockfort in Tirchy district in Tamil Nadu is interesting Ravana was the king of Lanka
                        (present day Srilanka). He was a learned scholar. But at one time he kidnapped Sita, the
                        wife of Rama.

                    </div>
                    <div class=" btn-box"><a href="{{ route('user.story2Get') }}">Read more &nbsp;<span
                                class="icon flaticon-right-arrow"></span></a> <br></div>
                </div>
            </div>

            <!-- Program Block -->
            <div class="program-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image">
                            <a href="{{ route('user.story3Get') }}"><img src="public/images1/story-3.png" alt=""></a>
                        </figure>
                    </div>

                </div>
                <div class="lower-content" style="padding-top:14px; padding-left: 18px; padding-right: 18px;">

                    <h3><a href="{{ route('user.story3Get') }}" class="spectral">The Cow That Rang The (Calling)
                            Bell</a></h3>
                    <div class="text" style=" padding-top:12px; text-align: justify;">We have calling bells at
                        home. People who come to
                        our homes ring the bell. But have you heard
                        of a cow ringing the bell - not the electric
                        bell
                    </div>
                    <div class=" btn-box"><a href="{{ route('user.story3Get') }}">Read more &nbsp;<span
                                class="icon flaticon-right-arrow"></span></a> <br></div>
                </div>
            </div>

            <div class="program-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image">
                            <a href="{{ route('user.story4Get') }}"><img src="public/images1/story-4.png" alt=""></a>
                        </figure>
                    </div>

                </div>
                <div class="lower-content" style="padding-top:14px; padding-left: 18px; padding-right: 18px;">

                    <h3><a href="{{ route('user.story4Get') }}" class="spectral">Story of Annapurneswari - Version 1</a>
                    </h3>
                    <div class="text" style=" padding-top:12px; text-align: justify;">Annapurneswari in Varanasi
                        (Kashi) is considered to
                        be the most benevolent form of Shakthi where she is a
                        nurturer.
                        The story of Annapurneswari is an interesting one.
                    </div>
                    <div class=" btn-box"><a href="{{ route('user.story4Get') }}">Read more &nbsp;<span
                                class="icon flaticon-right-arrow"></span></a> <br></div>
                </div>
            </div>
            <div class="program-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                <div class="inner-box">
                    <div class="image-box">
                        <figure class="image">
                            <a href="{{ route('user.story5Get') }}"><img src="public/images1/story-5.png" alt=""></a>
                        </figure>
                    </div>

                </div>
                <div class="lower-content" style="padding-top:14px; padding-left: 18px; padding-right: 18px;">

                    <h3><a href="{{ route('user.story5Get') }}" class="spectral">Story of Annapurneswari - Version 2</a>
                    </h3>
                    <div class="text" style=" padding-top:12px; text-align: justify;">In Kashi, there used to
                        reside a staunch Sivabakth.
                        His wife was an equally pious and dutiful lady.
                        They were leading a peaceful and pleasant life in the
                        eternal city.
                    </div>
                    <div class=" btn-box"><a href="{{ route('user.story5Get') }}">Read more &nbsp;<span
                                class="icon flaticon-right-arrow"></span></a> <br></div>
                </div>
            </div>

            <!-- <div class="program-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href=""><img src="public/images1/img/a-7.png" alt=""></a>
                            </figure>
                        </div>

                    </div>
                </div>
                <div class="program-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp" data-wow-delay="800ms">
                    <div class="inner-box">
                        <div class="image-box">
                            <figure class="image">
                                <a href=""><img src="public/images1/img/a-8.png" alt=""></a>
                            </figure>
                        </div>

                    </div>
                </div> -->
        </div>
    </div>
</section>
<!--End Program Section -->
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
