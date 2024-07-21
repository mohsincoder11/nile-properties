@extends('webscite.layout')
@section('content')


<!-- End Main Header -->
<!--Page Title-->
<section class="page-banner curve-offwhite" style="background-image:url(public/images1/background/stories-1.png);">
    <div class="auto-container">
        <h1 class="spectral" style="font-size: 60px;"><img src="public/images1/starting-title.gif" style="height:250px;"
                alt="">
            Meets</h1>
        <a href="{{ route('user.indexGet') }}" class="home-btn"><span class="flaticon-house-outline"></span></a>
    </div>
</section>
<!--End Page Title-->
<?php

// Example function to get YouTube embed URL from different YouTube URL formats
function getYouTubeEmbedUrl($url)
{
// Extract video ID from YouTube watch URL
if (preg_match('/youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/', $url, $matches)) {
$videoId = $matches[1];
return "https://www.youtube.com/embed/{$videoId}";
}

// Extract video ID from YouTube short URL (youtu.be)
if (preg_match('/youtu\.be\/([a-zA-Z0-9_-]+)/', $url, $matches)) {
$videoId = $matches[1];
return "https://www.youtube.com/embed/{$videoId}";
}

// If no valid video ID is found, return an empty string or handle as needed
return '';
}

?>
<!-- Program Section -->
<section class="program-section" style="padding-top:20px;">

    <div class="auto-container">
        <div class="sec-title text-center">
            <h2 style="color:black; font-family: 'ADLaM Display', sans-serif;">Our Meets</h2>
        </div>

        <div class="row">
            @foreach ($Meet as $item)
            <div class="program-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
                <div class="inner-box">
                    <div class="image-box">
                        <div class="video-container">
                            <iframe width="100%" height="240" src="{{ getYouTubeEmbedUrl($item->url) }}" frameborder="0"
                                allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!--End Program Section -->

@stop
