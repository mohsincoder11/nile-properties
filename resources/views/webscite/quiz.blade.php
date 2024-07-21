@extends('webscite.layout')
@section('content')
<!-- End Main Header -->



<!--Page Title-->
<section class="page-banner curve-offwhite" style="background-image:url(public/images1/background/stories-1.png);">
    <div class="auto-container">
        <h1 class="spectral" style="font-size: 60px;"><img src="public/images1/starting-title.gif" style="height:250px;"
                alt="">Quiz</h1>
        <a href="{{ route('user.indexGet') }}" class="home-btn"><span class="flaticon-house-outline"></span></a>
    </div>
</section>
<!--End Page Title-->



<!--End Page Title-->

<?php
// app/helpers.php

if (!function_exists('filterImageAndShowText')) {
    function filterImageAndShowText($htmlContent)
    {
        $textOnly = strip_tags($htmlContent);
        return $textOnly;
    }
}

if (!function_exists('limitTextToTwoLines')) {
    function limitTextToTwoLines($text, $characterLimit = 200)
    {
        $decodedText = html_entity_decode($text);
        $strippedText = strip_tags($decodedText);

        $secondNewlinePosition = strpos($strippedText, "\n", $characterLimit);

        if ($secondNewlinePosition !== false) {
            $limitedText = substr($strippedText, 0, $secondNewlinePosition + 1);
        } else {
            $limitedText = substr($strippedText, 0, $characterLimit);
            $lastSpace = strrpos($limitedText, ' ');
            $limitedText = substr($limitedText, 0, $lastSpace);
        }

        return $limitedText;
    }
}
?>

<section class="program-section" style="padding-top:20px;">

    <div class="auto-container">
        <div class="sec-title text-center">
            <h2 style="color:black; font-family: 'ADLaM Display', sans-serif;"></h2>
        </div>




        <div class="row">
            @foreach ($quiz as $item)
            <div class="program-block col-lg-4 col-md-6 col-sm-12 wow fadeInUp">

                <div class=" inner-box">

                    <div class="image-box">
                        <figure class="image" style="border-bottom-left-radius: 0px !important;">
                            @if ($item->image)
                            <img style="height: 303px; width:370px;" src="{{asset('public/images/' . $item->image) }}"
                                alt="Image">
                            @else
                            <!-- Provide the path to your default image -->
                            <img style="height: 303px; width:370px;"
                                src="{{asset('public/frontend/assets/images/about-us.png') }}" alt="Default Image">
                            @endif
                        </figure>
                    </div>


                </div>
                <div class="lower-content"
                    style="padding-top:14px; padding-left: 18px; padding-right: 18px; ">

                    <h3><a href="javascript:void(0);" class="spectral">
                            {{Str::limit($item->title,25)}}</a></h3>




                    <div class="text font1 spectral " style=" padding-top:12px; text-align: justify; ">
                        {{ Str::limit(strip_tags(html_entity_decode($item->text)), 20) }} </div>
					 <div class=" btn-box spectral " >
                    <a href="{{ route('user.quizmediater', ['quizId' => $item->id]) }}">Start
                        Now
                        &nbsp;<span class="icon flaticon-right-arrow"></span></a> <br>
                </div>


                </div>
               
            </div>


            @endforeach
        </div>

    </div>




</section>

@stop