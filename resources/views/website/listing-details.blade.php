@extends('website.layout.layout')
@section('main_container')




{{-- @if(session('info'))
<div class="alert alert-info" style="background-color:red; color:white;">
    {{ session('info') }}
</div>
@endif

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif --}}



<div class="clearfix"></div>
<div id="utf_listing_gallery_part" class="utf_listing_section">
    <div class="utf_listing_slider utf_gallery_container margin-bottom-0">
        @foreach ($layout as $image)
        <a href="{{ asset($image->layout_image) }}" data-background-image="{{ asset($image->layout_image) }}"
            class="item utf_gallery"></a>
        @endforeach
        {{-- <a href="images/single-listing-01.jpg" data-background-image="{{('website/images/land.jpg')}}"
            class="item utf_gallery"></a>
        <a href="images/single-listing-02.jpg" data-background-image="{{('website/images/Plots1.jpg')}}"
            class="item utf_gallery"></a>
        <a href="images/single-listing-03.jpg" data-background-image="{{('website/images/plotimg1.jpg')}}"
            class="item utf_gallery"></a> --}}
        <!-- <a href="images/single-listing-04.jpg" data-background-image="images/single-listing-04.jpg"
          class="item utf_gallery"></a> -->
    </div>
</div>

<div class="container">
    <div class="row utf_sticky_main_wrapper">
        <div class="col-lg-8 col-md-8">
            <div id="titlebar" class="utf_listing_titlebar">
                @foreach ($brochures as $project)
                <div class="utf_listing_titlebar_title">
                    <h2>{{$project->project_name}}</h2>
                    <span> <a href="#utf_listing_location" class="listing-address"> <i class="sl sl-icon-location"></i>
                            {{$project->taluka}}</a> </span>
                    <a href="tel:{{$project->mobile_number}}" style="text-decoration: none; color: inherit;">
                        +(91){{$project->mobile_number}}
                    </a>

                    {{-- Calculate average rating --}}
                    @php
                    $averageRating = $reviews->avg('rating');
                    $numberOfReviews = $reviews->count();
                    @endphp

                    <div class="utf_star_rating_section" data-rating="{{ $numberOfReviews > 0 ? $averageRating : 0 }}">
                        <div class="utf_counter_star_rating">
                            @if($numberOfReviews > 0)
                            ({{ number_format($averageRating, 1) }}) / ({{ $numberOfReviews }} Reviews)
                            @else
                            (0.0) / (No Reviews)
                            @endif
                        </div>
                    </div>


                </div>

            </div>
            <div id="utf_listing_overview" class="utf_listing_section">
                <h3 class="utf_listing_headline_part margin-top-30 margin-bottom-20">Layout Description</h3>
                {!!$project->layout_description!!}



                <div class="social-contact">
                    <a href="{{ route('download.map', ['id' => $project->id, 'v' => time()]) }}" class="facebook-link"
                        target="_blank">
                        <i class="fa fa-download"></i> Map
                    </a>
                    <a href="{{ route('download.brochure', ['id' => $project->id, 'v' => time()]) }}"
                        class="twitter-link" target="_blank">
                        <i class="fa fa-download"></i> Brochure
                    </a>
                    <a href="{{ route('open.youtube', ['id' => $project->id, 'v' => time()]) }}" class="youtube-link"
                        target="_blank">
                        <i class="fa fa-youtube-play"></i> Youtube
                    </a>
                </div>

            </div>
            @endforeach

            <div id="utf_listing_tags" class="utf_listing_section listing_tags_section">

            </div>

            <div class="utf_listing_section">
                <h3 class="utf_listing_headline_part margin-top-10 margin-bottom-40">Plots</h3>
                <div class="show-more">
                    <div class="utf_pricing_list_section">
                        <h4>Nile Properties Land Layout</h4>

                        <div style="margin-top: 20px"></div>



                        @foreach ($plots as $plot)
                        <div class="col-md-2 plot-button-container mb-3"
                            style="margin-bottom: 20px; margin-left: 10px; margin-right: 10px;">
                            <button type="button" class="btn mjks plot-button"
                                style="color:#ffffff; height:50px; width:100px; font-weight: bold; background-color: green;"
                                data-id="{{ $plot->id }}">
                                {{ $plot->area_sqrft }} <br> Sq. Ft. <br>
                            </button>
                        </div>
                        @endforeach

                    </div>
                </div>
                {{-- by using above approach online it shows only one button in one line in mobile view
                so i used below code in online so it works properly --}}

                {{-- the below code does not work for local properly, by using this it shows one button in one line in
                local --}}
                {{-- <div class="utf_pricing_list_section">
                    <h4>Nile Properties Land Layout</h4>

                    <div style="margin-top: 20px"></div>
                </div>
                <div class="utf_pricing_list_section grid-container">

                    @foreach ($plots as $plot)
                    <div class="grid-item plot-button-container mb-3" style="margin-bottom: 20px;">
                        <button id="on" type="button" class="btn mjks plot-button" data-toggle="modal"
                            data-target="#popup2"
                            style="color:#ffffff; height:50px; width:100px; font-weight: bold; background-color: green;">
                            {{ $plot->area_sqrft }} <br> Sq. Ft. <br>
                        </button>
                    </div>
                    @endforeach
                </div>
            </div> --}}

            {{-- <a href="#" class="show-more-button" data-more-title="Show More" data-less-title="Show Less"><i
                    class="fa fa-angle-double-down"></i></a> --}}
        </div>

        {{-- <div id="utf_listing_amenities" class="utf_listing_section">
            <h3 class="utf_listing_headline_part margin-top-50 margin-bottom-40">Features</h3>
            <ul class="utf_listing_features checkboxes margin-top-0">
                @php
                $currentFeature = '';
                @endphp

                @foreach (str_split($brochure->layout_feature) as $char)
                @if ($char !== ',')
                @php
                $currentFeature .= $char;

                @endphp
                @else
                <li>{{ $currentFeature }}</li>
                @php
                $currentFeature = '';
                @endphp
                @endif
                @endforeach

                @if ($currentFeature !== '')
                <li>{{ $currentFeature }}</li>
                @endif
            </ul>
        </div> --}}

        <div id="utf_listing_amenities" class="utf_listing_section">
            <h3 class="utf_listing_headline_part margin-top-50 margin-bottom-40">Features</h3>
            <ul class="utf_listing_features checkboxes margin-top-0">
                @foreach (explode(',', $brochure->layout_feature) as $feature)
                <li><input type="checkbox" disabled>{{ $feature }}</li>
                @endforeach
            </ul>
        </div>
        {{-- @foreach ($brochures as $feature)
        <li>{{ $feature->layout_feature }}</li>
        @endforeach --}}


        <div id="utf_listing_faq" class="utf_listing_section">
            <h3 class="utf_listing_headline_part margin-top-50 margin-bottom-40">Layout FAQ's</h3>
            <div class="style-2">
                <div class="accordion">


                    <?php $faqNumber = 1; ?>
                    @foreach ($faqs as $faq)

                    <h3><span class="ui-accordion-header-icon ui-icon ui-accordion-icon"></span><i
                            class="sl sl-icon-plus"></i>({{$faqNumber}}) {{$faq->question}}</h3>
                    <div>
                        <p>{{$faq->answer}}</p>
                    </div>
                    <?php $faqNumber++; ?>


                    @endforeach


                </div>
            </div>
        </div>


        {{-- @foreach ($brochures as $project)
        <div id="utf_listing_location" class="utf_listing_section">
            <h3 class="utf_listing_headline_part margin-top-60 ">Location</h3>
            <div id="utf_single_listing_map_block"> --}}
                {{-- <div id="utf_single_listingmap" data-latitude="36.778259" data-longitude="-119.417931"
                    data-map-icon="im im-icon-Hamburger"></div> --}}
                {{-- <a href="#" id="utf_street_view_btn">Street View</a> --}}

                {{-- </div>
        </div> --}}
        {{-- @endforeach --}}
        @if(!empty($brochure->embedded_map))
        <div id="utf_listing_location" class="utf_listing_section">
            <h3 class="utf_listing_headline_part margin-top-60">Location</h3>
            <div id="utf_single_listing_map_block">
                <div id="streetViewContainer">
                    <iframe id="streetViewMap" src="{{ $brochure->embedded_map }}" {{-- <!-- Assuming $project is the
                        instance of ProjectEntry --> --}}
                        width="100%"
                        height="400"
                        frameborder="0"
                        style="border:0"
                        allowfullscreen
                        ></iframe>
                </div>
            </div>
        </div>
        @endif
        <div class="comments utf_listing_reviews">
            {{-- <ul>
                <li>
                    <div class="avatar"><img src="images/client-avatar1.jpg" alt="" /></div>
                    <div class="utf_comment_content">
                        <div class="utf_arrow_comment"></div>
                        <div class="utf_star_rating_section" data-rating="5"></div>
                        <div class="utf_by_comment">Francis Burton<span class="date"><i class="fa fa-clock-o"></i> Jan
                                05,
                                2022 - 8:52 am</span> </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla
                            finibus
                            lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et
                            pulvinar nisi tincidunt. Aliquam erat volutpat.</p>
                    </div>
                </li>
                <li>
                    <div class="avatar"><img src="images/client-avatar2.jpg" alt="" /> </div>
                    <div class="utf_comment_content">
                        <div class="utf_arrow_comment"></div>
                        <div class="utf_star_rating_section" data-rating="4"></div>
                        <div class="utf_by_comment">Francis Burton<span class="date"><i class="fa fa-clock-o"></i> Jan
                                05,
                                2022 - 8:52 am</span> </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas in pulvinar neque. Nulla
                            finibus
                            lobortis pulvinar. Donec a consectetur nulla. Nulla posuere sapien vitae lectus suscipit, et
                            pulvinar nisi tincidunt. Aliquam erat volutpat.</p>
                    </div>
                </li>



            </ul> --}}

            @foreach ($reviews as $review)


            {{-- <div class="avatar"><img src="images/client-avatar1.jpg" alt="" /></div> --}}
            {{-- <div class="utf_comment_content"> --}}
                <div class="utf_arrow_comment"></div>
                <div class="utf_star_rating_section margin-top-60" data-rating="{{$review->rating}}"></div>
                <div class="utf_by_comment">{{$review->name}}<span class="date"><i class="fa fa-clock-o"></i>
                        {{$review->created_at}}</span> </div>
                <p>{{$review->review}}</p>
                <div style="margin-bottom: 50px"></div>
                {{--
            </div> --}}
            @endforeach

        </div>
        {{-- <div class="clearfix"></div>
        <div class="row" style="margin-bottom: 20px">
            <div class="col-md-12">
                <div class="utf_pagination_container_part margin-top-30">
                    <nav class="pagination">
                        <ul>
                            <li><a href="#"><i class="sl sl-icon-arrow-left"></i></a></li>
                            <li><a href="#" class="current-page">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>

        <div class="clearfix"></div> --}}

        @auth
        <form action="{{ route('storeReview')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div id="utf_add_review" class="utf_add_review-box">
                <h3 class="utf_listing_headline_part margin-bottom-20">Add Your Review</h3>
                <span class="utf_leave_rating_title">Your email address will not be published.</span>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="clearfix"></div>
                        <div class="utf_leave_rating margin-bottom-30">
                            <input type="radio" name="rating" id="rating-5" value="5" />
                            <label for="rating-5" class="fa fa-star"></label>
                            <input type="hidden" name="project_entry_id" value="{{ $project->id ?? '' }}">
                            <input type="radio" name="rating" id="rating-4" value="4" />
                            <label for="rating-4" class="fa fa-star"></label>

                            <input type="radio" name="rating" id="rating-3" value="3" />
                            <label for="rating-3" class="fa fa-star"></label>

                            <input type="radio" name="rating" id="rating-2" value="2" />
                            <label for="rating-2" class="fa fa-star"></label>

                            <input type="radio" name="rating" id="rating-1" value="1" />
                            <label for="rating-1" class="fa fa-star"></label>

                        </div>
                        <div class="clearfix"></div>
                    </div>
                    {{-- <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="add-review-photos margin-bottom-30">
                            <div class="photoUpload"> <span>Upload Photo <i
                                        class="sl sl-icon-arrow-up-circle"></i></span>
                                <input type="file" class="upload" name="photo" />
                            </div>
                        </div>
                    </div> --}}
                </div>

                <fieldset>
                    {{-- <div class="row">
                        <div class="col-md-4">
                            <label>Name:</label>
                            <input type="text" placeholder="Name" value="" name="name" />
                        </div>
                        <div class="col-md-4">
                            <label>Email:</label>
                            <input type="text" placeholder="Email" value="" name="email" />
                        </div>
                        <div class="col-md-4">
                            <label>Subject:</label>
                            <input type="text" placeholder="Subject" value="" name="subject" />
                        </div>
                    </div> --}}
                    <div>
                        <label>Review:</label>
                        <textarea cols="40" placeholder="Your Message..." rows="3" name="review"></textarea>
                    </div>
                </fieldset>

                <button class="button" type="submit">Submit Review</button>
                <div class="clearfix"></div>
            </div>
        </form>
        @endauth
    </div>


    <!-- Sidebar -->
    <div class="col-lg-4 col-md-4 margin-top-75 sidebar-search">

        <div class="utf_box_widget booking_widget_box">
            {{-- <ul class="listing_item_social">
                <li><a href="#"><i class="fa fa-star"></i>Review</a></li>
                <li><a href="#"><i class="fa fa-share"></i> Share</a></li>
            </ul> --}}

            <div class="utf_box_widget margin-top-35">
                <h3><i class="sl sl-icon-phone"></i> Contact Info</h3>

                @foreach ($brochures as $agent)
                <div class="utf_hosted_by_user_title"> <a href="#" class="utf_hosted_by_avatar_listing">
                        <img src="{{ asset($agent->profile_picture) }}" alt="Profile Picture" width="20" height="20">

                        {{-- src="{{$agent->profile_picture}}" alt=""> --}}

                        {{-- {{$agent->profile_picture}} --}}
                    </a>
                    <h4><a href="#">{{$agent->agent_name}}</a>
                        {{-- <span>Posted 3 Days Ago</span> --}}
                        <span><i class="fa fa-briefcase" aria-hidden="true"></i> {{$agent->agent_designation}}</span>
                    </h4>
                </div>
                <ul class="utf_social_icon rounded margin-top-10">
                    {{-- <li><a class="facebook" href="{{asset($agent->facebook)}}"><i class="icon-facebook"></i></a>
                    </li>
                    <li><a class="twitter" href="{{asset($agent->twitter)}}"><i class="icon-twitter"></i></a></li>
                    <li><a class="linkedin" href="{{asset($agent->linkedin)}}"><i class="icon-linkedin"></i></a></li>
                    <li><a class="instagram" href="{{asset($agent->instagram)}}"><i class="icon-instagram"></i></a></li>
                    --}}

                    @if($agent->facebook)
                    <li><a class="facebook" href="{{ asset($agent->facebook) }}"><i class="icon-facebook"></i></a></li>
                    @endif

                    @if($agent->twitter)
                    <li><a class="twitter" href="{{ asset($agent->twitter) }}"><i class="icon-twitter"></i></a></li>
                    @endif

                    @if($agent->linkedin)
                    <li><a class="linkedin" href="{{ asset($agent->linkedin) }}"><i class="icon-linkedin"></i></a></li>
                    @endif

                    @if($agent->instagram)
                    <li><a class="instagram" href="{{ asset($agent->instagram) }}"><i class="icon-instagram"></i></a>
                    </li>
                    @endif
                </ul>
                <ul class="utf_listing_detail_sidebar">
                    {{-- <li><i class="sl sl-icon-map"></i> 12345 Little Lonsdale St, Melbourne</li> --}}
                    <li><i class="sl sl-icon-phone"></i> +(91){{$agent->mobile_number}}</li>
                    {{-- <li><i class="sl sl-icon-globe"></i> <a href="#">www.example.com</a></li> --}}
                    <li><i class="fa fa-envelope-o"></i> <a href="mailto:info@example.com">{{$agent->email}}</a></li>
                </ul>
            </div>

            @endforeach

            <div class="utf_box_widget opening-hours margin-top-35">
                <h3><i class="sl sl-icon-clock"></i> Business Hours</h3>
                <ul>
                    @php
                    use Carbon\Carbon;
                    @endphp
                    @foreach ($businessHours as $businessHours)

                    <li style="margin-top: 10px">{{$businessHours->days_name->days}}

                        @if ($businessHours->is_close)
                        <span style="margin-right: 40px; color:red">Closed</span>
                        @else
                        <span>{{ Carbon::createFromFormat('H:i', $businessHours->open_at)->format('h:i A') }} - {{
                            Carbon::createFromFormat('H:i', $businessHours->close_at)->format('h:i A') }}</span> @endif
                    </li>

                    @endforeach
                    {{-- <li>Monday <span>09:00 AM - 09:00 PM</span></li>
                    <li>Tuesday <span>09:00 AM - 09:00 PM</span></li>
                    <li>Wednesday <span>09:00 AM - 09:00 PM</span></li>
                    <li>Thursday <span>09:00 AM - 09:00 PM</span></li>
                    <li>Friday <span>09:00 AM - 09:00 PM</span></li>
                    <li>Saturday <span>09:00 AM - 10:00 PM</span></li>
                    <li>Sunday <span>09:00 AM - 10:00 PM</span></li> --}}
                </ul>
            </div>
            <div class="row with-forms margin-top-0">

                <div class="utf_box_widget opening-hours margin-top-35">
                    <h3><i class="sl sl-icon-envelope-open"></i> Show Your Interest</h3>
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

                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>




                    <form id="contactform" method="post"
                        action="{{ route('enquiry-form', ['id' => $brochures[0]->id]) }}">
                        @csrf
                        <div class="row">
                            @auth
                            {{-- User is logged in, show only select and message fields --}}
                            <div class="col-md-12">
                                <select class="form-control" name="plot_id" id="selectPlot" required>
                                    <option value="">--Select Plot--</option>
                                    @foreach ($plots as $plot_name)
                                    <option value="{{ $plot_name->plot_no }}">{{ $plot_name->plot_no }}
                                        ({{$plot_name->area_sqrft}} Sq Ft)</option>
                                    @endforeach
                                </select>
                            </div>
                            @else
                            {{-- User is not logged in, show all fields including select --}}
                            <div class="col-md-12">
                                <input name="name" type="text" placeholder="Name" required>
                            </div>
                            <div class="col-md-12">
                                <input name="email" type="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12">
                                <input name="contact" type="text" placeholder="Contact" required>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="plot_id" id="selectPlot" required>
                                    <option value="">--Select Plot--</option>
                                    @foreach ($plots as $plot_name)
                                    <option value="{{ $plot_name->plot_no }}">{{ $plot_name->plot_no }}
                                        ({{$plot_name->area_sqrmt}} Sq Ft)</option>
                                    @endforeach
                                </select>
                            </div>
                            @endauth
                            {{-- Common fields for both cases --}}
                            <div class="col-md-12">
                                <textarea name="message" cols="40" rows="2" id="comments" placeholder="Your Message"
                                    required></textarea>
                            </div>
                        </div>
                        <input type="submit" class="submit button" id="submit" value="Submit">
                    </form>


                    {{-- <form id="contactform" method="post"
                        action="{{ route('enquiry-form', ['id' => $brochures[0]->id]) }}">
                        @csrf
                        <div class="row">
                            @auth --}}
                            {{-- User is logged in, pre-fill form fields --}}
                            {{-- <div class="col-md-12">
                                <input name="name" type="hidden" placeholder="Name" value="{{ auth()->user()->name }}"
                                    readonly>
                            </div>
                            <div class="col-md-12">
                                <input name="email" type="hidden" placeholder="Email"
                                    value="{{ auth()->user()->email }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <input name="contact" type="hidden" placeholder="Contact"
                                    value="{{ auth()->user()->contact }}" readonly>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="plot" id="selectPlot" required>
                                    <option value="">--Select--</option>
                                    @foreach ($plots as $plot_name)
                                    <option value="{{ $plot_name->id }}">{{ $plot_name->plot_no }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @els
                            e --}}
                            {{-- User is not logged in, show all fields including select --}}
                            {{-- <div class="col-md-12">
                                <input name="name" type="text" placeholder="Name" required>
                            </div>
                            <div class="col-md-12">
                                <input name="email" type="email" placeholder="Email" required>
                            </div>
                            <div class="col-md-12">
                                <input name="contact" type="text" placeholder="Contact" required>
                            </div>
                            <div class="col-md-12">
                                <select class="form-control" name="plot" id="selectPlot" required>
                                    <option value="">--Select--</option>
                                    @foreach ($plots as $plot_name)
                                    <option value="{{ $plot_name->id }}">{{ $plot_name->plot_no }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endauth --}}
                            {{-- Common fields for both cases --}}
                            {{-- <div class="col-md-12">
                                <textarea name="message" cols="40" rows="2" id="comments" placeholder="Your Message"
                                    required></textarea>
                            </div>
                        </div>
                        <input type="submit" class="submit button" id="submit" value="Submit">
                    </form> --}}

                    {{---------------------------------------------------------------------------------------------------
                    --}}

                </div>


            </div>
            <!-- <button class="like-button add_to_wishlist"><span class="like-icon"></span> Add to Wishlist</button> -->
            <div class="clearfix"></div>
        </div>





        {{-- <div class="utf_box_widget opening-hours margin-top-35">
            <span><img src="images/google_adsense.jpg" alt="" /></span>
        </div> --}}

    </div>


    {{-- <div class="modal fade" id="popup1112" tabindex="-1" role="dialog" aria-labelledby="popup3Label"
        aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="popup3Label">Plot Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6"><strong>North:</strong></div>
                        <div class="col-6" id="plotNorth"></div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>South:</strong></div>
                        <div class="col-6" id="plotSouth"></div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>East:</strong></div>
                        <div class="col-6" id="plotEast"></div>
                    </div>
                    <div class="row">
                        <div class="col-6"><strong>West:</strong></div>
                        <div class="col-6" id="plotWest"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> --}}
</div>


</div>

<div class="custom-model-main">
    <div class="custom-model-inner">
        <div class="close-btn">×</div>
        <div class="custom-model-wrap">
            <div class="pop-up-content-wrap">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th><strong>North:</strong></th>
                            <td id="plotNorth"></td>
                        </tr>
                        <tr>
                            <th><strong>South:</strong></th>
                            <td id="plotSouth"></td>
                        </tr>
                        <tr>
                            <th><strong>East:</strong></th>
                            <td id="plotEast"></td>
                        </tr>
                        <tr>
                            <th><strong>West:</strong></th>
                            <td id="plotWest"></td>
                        </tr>
                        <tr>
                            <th><strong>Rate:</strong></th>
                            <td id="rate"></td>
                        </tr>
                        <tr>
                            <th><strong>Amount:</strong></th>
                            <td id="amount"></td>
                        </tr>
                        <tr>
                            <th><strong>Plot No:</strong></th>
                            <td id="plot_no"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="bg-overlay"></div>
</div>

@endsection

@section('js')

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
$('.plot-button').click(function() {
let plotId = $(this).data('id');
fetchPlotDetails(plotId);
});


$(".close-btn, .bg-overlay").click(function(){
$(".custom-model-main").removeClass('model-open');
});


function fetchPlotDetails(plotId) {
$.ajax({
url: '{{ route('fetchPlotDetailing') }}',
type: 'POST',
contentType: 'application/json',
headers: {
'X-CSRF-TOKEN': '{{ csrf_token() }}'
},
data: JSON.stringify({ plot_id: plotId }),
success: function(data) {
// Update the modal content with fetched data
$('#plotNorth').text(data[0].north);
$('#plotSouth').text(data[0].south);
$('#plotEast').text(data[0].east);
$('#rate').text(data[0].west);
$('#plotWest').text(data[0].rate);
$('#amount').text(data[0].amount);
$('#plot_no').text(data[0].plot_no);

// Show the modal after populating the data
//$('#popup1112').modal('show');
$(".custom-model-main").addClass('model-open');
},
error: function(error) {
console.error('Error:', error);
}
});
}
});
</script>
@stop