@extends('webscite.layout')

@section('content')


<style>
    .img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }

    img {
        display: inline;
        max-width: 100%;
        height: auto;
    }

    img {
        vertical-align: middle;
    }

    img {
        border: 0;
    }

    img {
        overflow-clip-margin: content-box;
        overflow: clip;
    }
</style>
<div class="nc-main-wrapper">

    <!-- INTRO-SECTION -->
    <div class="intro-section intro-section-1 flex-cc" style="padding-top:0px; padding-bottom:0px;">
        <div class="inner-wrapper w100">

            <div class="nc-maintext align-c" style="margin-bottom:20px;">
                <div class="flex-row middle-lg middle-md middle-sm">
                    <div class="flex-col-lg-3 flex-col-md-3">
                        <img src="public/images/logo-final-11.png" alt="" style="height:130px; margin-left:15px;">
                    </div>
                    <div class="flex-col-lg-6 flex-col-md-6 align1">
                        <div class="text-animation w90 mr-auto animated s008" data-animIn="fadeInUp|0.3">
                            <div class="carousel-widget" data-anim="fadeInUp" id="carousel-widget" data-items="1"
                                data-itemrange="false" data-tdrag="false" data-mdrag="false" data-pdrag="false"
                                data-autoplay="true" data-in="fadeIn" data-loop="true" data-hstop="true"
                                data-hauto="true">
                                <div class="owl-carousel">
                                    <div class="item">


                                        <!-- <h4 data-nc-md="xlarge mr-b-0" data-nc-sm="large"
												class="nc-maintext--text f-3 title  fs60"
												style=" color: rgb(0, 0, 0); font-family: 'Andika', sans-serif; margin-left:37px !important;">
												Bhartiya Stories</h4> -->
                                    </div>
                                    <!-- <div class="item">
											<h1 data-nc-md="xlarge mr-b-0" data-nc-sm="large"
												class="nc-maintext--text f-3 title bold-5 fs80">Quick Usable</h1>
										</div>
										<div class="item">
											<h1 data-nc-md="xlarge mr-b-0" data-nc-sm="large"
												class="nc-maintext--text f-3 title bold-5 fs80">Easy to Customize</h1>
										</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-col-lg-3 flex-col-md-3">

                    </div>
                </div>

                <!-- <p class="title-sub w40 mr-auto italic animated s008" data-animIn="fadeInUp|0.4" data-nc-md="w80"
						data-nc-sm="w100 pd-lr-20 small">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquam et nulla ut pharetra.
						Praesent at dolor.
					</p> -->
            </div>

            <!-- / HEADER -->
            <img src="{{asset('public/images/logo.gif') }}" style="margin-bottom: 10%;" alt="" class="img margin-7">
            <!-- TAG -->
            </h1>

            <h1 data-nc-md="xlarge mr-b-0" data-nc-sm="large"
                class="nc-maintext--text f-3 title fs40 font2 margin-left1 spectral1 text-center"
                style="color: rgb(3, 1, 115); margin-top:-8%; margin-left: auto !important; margin-right: auto !important;">
                Coming Soon
            </h1>

            <!-- MAIN-TEXT -->
            <div class="nc-maintext align-c">
                <div class="flex-row middle-lg middle-md middle-sm">
                    <div class="flex-col-lg-3 flex-col-md-3">

                    </div>
                    <div class="flex-col-lg-6 flex-col-md-6">
                        <div class="text-animation  w90 mr-auto animated s008" data-animIn="fadeInUp|0.3">
                            <div class="carousel-widget" data-anim="fadeInUp" id="carousel-widget" data-items="1"
                                data-itemrange="false" data-tdrag="false" data-mdrag="false" data-pdrag="false"
                                data-autoplay="true" data-in="fadeIn" data-loop="true" data-hstop="true"
                                data-hauto="true">
                                <div class="owl-carousel">
                                    <div class="item">
                                        <h1 data-nc-md="xlarge mr-b-0" data-nc-sm="large"
                                            style="font-family:monospace sans-serif">
                                        </h1>

                                        <h1 data-nc-md="xlarge mr-b-0" data-nc-sm="large"
                                            class="nc-maintext--text f-3 title  fs40 font2 margin-left1 spectral1"
                                            style=" color: rgb(3, 1, 115); margin-left:37px !important; margin-bottom:15%;">
                                            Coming Soon</h1>
                                    </div>
                                    <!-- <div class="item">
											<h1 data-nc-md="xlarge mr-b-0" data-nc-sm="large"
												class="nc-maintext--text f-3 title bold-5 fs80">Quick Usable</h1>
										</div>
										<div class="item">
											<h1 data-nc-md="xlarge mr-b-0" data-nc-sm="large"
												class="nc-maintext--text f-3 title bold-5 fs80">Easy to Customize</h1>
										</div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex-col-lg-3 flex-col-md-3">

                    </div>
                </div>

                <!-- <p class="title-sub w40 mr-auto italic animated s008" data-animIn="fadeInUp|0.4" data-nc-md="w80"
						data-nc-sm="w100 pd-lr-20 small">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus aliquam et nulla ut pharetra.
						Praesent at dolor.
					</p> -->
            </div>
            <!-- / MAIN-TEXT -->

            <!-- BUTTONS -->
            <!-- <div class="align-c txt-upper">
					<a title="subscribe" data-popup="subscribe"
						class="f-3 nc-trigger btn btn-color1 solid small px-w140 animated s008"
						data-animIn="fadeInLeft|0.5" data-nc-sm="mr-5">Subscribe</a>
					<a href="https://goo.gl/nhj7nH" target="_blank" title="purchase"
						class="f-3 btn btn-color1 solid small px-w140 mr-lr-10 animated s008" data-animIn="fadeInUp|0.5"
						data-nc-sm="mr-5">Purchase</a>
					<a title="contact-us" data-popup="contact"
						class="f-3 nc-trigger btn btn-color1 solid small px-w140 animated s008"
						data-animIn="fadeInRight|0.5" data-nc-sm="mr-5">Contact</a>
				</div> -->
            <!-- / BUTTONS -->

            <!-- <div class="pos-abs bottom w100 pd-60" data-nc-md="pd-30" data-nc-sm="pos-rel align-c pd-30"> -->



        </div>
    </div>
</div>

@stop
