@extends('webscite.layout')
@section('content')

<!-- End Main Header -->

<!-- Banner Section -->
<section class="banner-section">
    <div class="banner-carousel-outer">
        <div class="banner-carousel banner-carousel1 owl-theme owl-carousel">
            <!-- Slide Item -->

            @foreach ($sliders as $slider)
            <div class="slide-item slide-item1">
                <div class="image-layer image-layer1"
                    style="background-image: url({{asset('public/images/' . $slider->image) }});"></div>
                <div class="auto-container">
                    <div class="content-box">
                        <span class="title"><br></span>
                        <h2><br></h2>

                    </div>
                </div>
            </div>
            @endforeach
            {{--


            <div class="slide-item slide-item1">
                <div class="image-layer image-layer1" style="background-image: url(images1/bg-24.png);"></div>
                <div class="auto-container">
                    <div class="content-box">

                        <span class="title"><br></span>
                        <h2><br></h2>
                        <!-- <div class="btn-box"><a href="#" class="theme-btn btn-style-one">Learn More</a></div>  -->
                    </div>
                </div>
            </div>

            <!-- Slide Item -->
            <div class="slide-item slide-item1">
                <div class="image-layer image-layer1" style="background-image: url(images1/bg-22.gif);"></div>
                <div class="auto-container">
                    <div class="content-box">

                        <span class="title"><br></span>
                        <h2><br></h2>
                        <!-- <div class="btn-box"><a href="#" class="theme-btn btn-style-one">Learn More</a></div> -->
                    </div>
                </div>
            </div> --}}


        </div>

    </div>
</section>
<!--End Banner Section --

        <!-- Welcome Section -->
<section class="welcome-section" style="padding-bottom:0px; padding-top:0px;">

    <div class="auto-container">
        <div class="row">
            <!-- Image Column -->
            <div class="image-column col-lg-4 col-md-12 col-sm-12"
                style="padding-left:0px; padding-bottom:0px; margin-bottom:0px;">
                <div class="inner-column" style="padding-left:0px; padding-bottom:0px; padding-top:0px;">
                    <!-- inserted img by admin -->

                    <figure class="image wow fadeInLeft left13">
                        <img src="{{asset('public/images/' . $about_data->image) }}" alt=""
                            style="width: 400px; height: 400px;">
                    </figure>



                </div>
            </div>

            <!-- Content Column -->
            <div class="content-column col-lg-8 col-md-12 col-sm-12" style="margin-bottom:0px;">
                <div class="inner-column">
                    <!-- <div class="sec-title">
                                <h2 style="color:black; font-family: 'ADLaM Display', sans-serif; font-size:48px;">We
                                    are Refining Early Childcare Education</h2>
                            </div> -->
                    <div class="offer-block col-lg-12 col-md-6 col-sm-12 wow fadeInUp" style="margin-bottom:0px;">
                        <div class="row">
                            <!-- <div class="offer-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp"
                                        style="margin-bottom:17px;">
                                        <div class="inner-box" style="width:125px; margin-bottom:0px;">
                                            <div class="icon-box" style="margin-bottom:0px;">
                                                <img src="public/images1/one.png" alt=""
                                                    style="height:70px; margin-bottom: 11px;">
                                            </div>
                                        </div>

                                    </div> -->
                            <div class="offer-block col-lg-12 col-md-12 col-sm-12 wow fadeInUp ">

                                <!-- inserted data  by admin -->


                                <p class="font1 spectral" style="text-align: justify; margin-top:7%;">{!!
                                    html_entity_decode($about_data->text) !!}</p>
                                <!-- <p style="text-align: justify;">If you want to get regular
                                            updates of content updates and activities, kindly sign up. Happy surfing.
                                            This should lead to sign up or log in.</p> -->

                            </div>

                        </div>
                    </div>
                    <!-- <div class="offer-block col-lg-12 col-md-6 col-sm-12 wow fadeInUp"
                                style="margin-bottom:0px;">
                                <div class="row">
                                    <div class="offer-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp"
                                        style="margin-bottom:17px;">
                                        <div class="inner-box" style="width:125px; margin-bottom:0px;">
                                            <div class="icon-box" style="margin-bottom:0px;">
                                                <img src="public/images1/two.png" alt=""
                                                    style="height:70px; margin-bottom: 11px;"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="offer-block col-lg-9 col-md-6 col-sm-12 wow fadeInUp">
                                        <h2 style="color:black" class="spectral"><b>Safe Environment </b></h2>
                                        <p class="spectral">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Corporis, molestias.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="offer-block col-lg-12 col-md-6 col-sm-12 wow fadeInUp">
                                <div class="row">
                                    <div class="offer-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                                        <div class="inner-box" style="width:125px; margin-bottom:0px;">
                                            <div class="icon-box" style="margin-bottom:0px;">
                                                <img src="public/images1/three.png" alt=""
                                                    style="height:70px; margin-bottom: 11px;"></span>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="offer-block col-lg-9 col-md-6 col-sm-12 wow fadeInUp">
                                        <h2 style="color:black" class="spectral"><b>Fully Equipment</b></h2>
                                        <p class="spectral">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                            Corporis, molestias.</p>
                                    </div>
                                </div>
                            </div> -->

                </div>
            </div>
        </div>
    </div>
</section>
<!--End Welcome Section -->

<!-- Program Section  functions & display contain -->
<?php
function filterImageAndShowText($htmlContent) {
    $textOnly = strip_tags($htmlContent);
    return $textOnly;
}

function limitTextToTwoLines($text, $characterLimit = 200) {
    $decodedText = html_entity_decode($text);
    $strippedText = strip_tags($decodedText); // Strip remaining HTML tags

    // Find the position of the second newline character within the character limit
    $secondNewlinePosition = strpos($strippedText, "\n", $characterLimit);

    // If a second newline character is found within the limit, truncate the text to that position
    if ($secondNewlinePosition !== false) {
        $limitedText = substr($strippedText, 0, $secondNewlinePosition + 1); // Include the newline in the result
    } else {
        // If no second newline character is found within the limit, truncate to the character limit
        $limitedText = substr($strippedText, 0, $characterLimit);

        // Ensure the last word is complete
        $lastSpace = strrpos($limitedText, ' ');
        $limitedText = substr($limitedText, 0, $lastSpace);
    }

    return $limitedText;
}
?>

<section class="program-section" style="padding-top:20px;">

    <div class="auto-container">
        <div class="sec-title text-center">
            <h2 style="color:black; font-family: 'ADLaM Display', sans-serif;">Stories For Kids</h2>
        </div>




        <div class="row">
            @foreach ($Stories as $item)
            <div class="program-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">

                <div class=" inner-box">

                    <div class="image-box" >
                        <figure class="image" style="border-bottom-left-radius: 0px !important;">
                            @if ($item->image)
                            <img style="height: 303px; width: 370px;" src="{{asset('public/images/' . $item->image) }}"
                                alt="Image">
                            @else
                            <img style="height: 303px; width: 370px;"
                                src="{{asset('public/frontend/assets/images/about-us.png') }}" alt="Fallback Image">
                            @endif
                        </figure>
                    </div>

                </div>
                <div class="lower-content" style="padding-top:14px; padding-left: 18px; padding-right: 18px;  height:50%;">

                    <h3><a href="javascript:void(0);" class="spectral"  >
                            {{Str::limit($item->title,20)}}</a></h3> 




                    <div class="text font1 spectral " style=" padding-top:12px; text-align: justify; height:50%;">
                        {{ Str::limit(strip_tags(html_entity_decode($item->text)), 200) }} </div>

                        <div class=" btn-box spectral ">
                            <a href="{{ route('user.Displaystories', ['id' => $item->id]) }}">Read more &nbsp;<span
                                    class="icon flaticon-right-arrow"></span></a> <br>

                      
                    </div>
                </div>

            </div>
            @endforeach
        </div>

    </div>




</section>
<!--End Program Section -->



<!-- News Section -->
<section class="news-section-two" style="padding-top:20px; padding-bottom:20px;">

    <div class="auto-container">
        <div class="sec-title text-center">
            <h2 style="color:black; font-family: 'ADLaM Display', sans-serif;">Print, Color & play</h2>
        </div>

        <div class="row">

    <!-- print color display by admin -->
    @foreach($PrintColor as $PrintColor)
    <div class="news-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
        <div class="inner-box">
            <div class="image-box" style="border-radius:25px;">
                <figure class="image">
                    <!-- Check if the file is a PDF or an image -->
                    @if(pathinfo($PrintColor->image, PATHINFO_EXTENSION) === 'pdf')
                        <!-- If the file is a PDF, make it downloadable -->
                        <a href="{{ asset('public/images/' . $PrintColor->image) }}" download>
                            <img src="{{ asset('public/images/' . $PrintColor->image) }}" style="border:1px solid black; width:262px important; height:192px !important;"  alt="" >
                        </a>
                    @else
                        <!-- If the file is an image, make it downloadable -->
                        <a href="{{ asset('public/images/' . $PrintColor->image) }}" download>
                            <img src="{{ asset('public/images/' . $PrintColor->image) }}" style="border:1px solid black; width:262px important; height:192px !important;" alt="">
                        </a>
                    @endif
                </figure>
            </div>
        </div>
    </div>
    @endforeach

            {{-- <div class="news-block col-lg-3 col-md-6 col-sm-12 wow fadeInUp">
                <div class="inner-box">
                    <div class="image-box" style="border-radius:25px;">
                        <figure class="image">
                            <a href="images1/play-1.pdf" target="_blank"><img src="public/images1/img/l1.png"
                                    style="border:1px solid black;" alt=""></a>
                        </figure>
                    </div>

                </div>
            </div> --}}



        </div>
    </div>
</section>
<!--End News Section -->


<!--Main Footer-->


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
@stop
@section('js')

@endsection
