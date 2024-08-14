{{-- <style>
    .options-label {
        margin-bottom: 15px;
    }

    .brief-answer {
        font-size: smaller;
        margin-top: 5px;
        /* Adjust as needed */
    }
</style>

<div>
    @if($questions)
    @foreach($questions as $question)
    <h3>{{ $question->question }}</h3>
    <div class="options-label">
        @foreach($question->options as $option)
        <label class="options-label">
            <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}">
            {{ $option->option }}
        </label>
        @endforeach
    </div>

    <div class="brief-answer">
        {{ $question->briefanswer }}
    </div>

    <hr> <!-- Optional horizontal line to separate questions -->

    @endforeach
    <button type="submit">Submit Answers</button>
    @else
    <p>No questions found for this quiz.</p>
    @endif
</div> --}}




@extends('webscite.layout')
@section('content')

<style>
    .image-box {
        max-width: 450px;
        height: auto;
        margin: 0 auto;
        /* Center the image box */
    }

    .image {
        width: 100%;
        height: auto;
    }
</style>
<style>
    @media only screen and (min-width: 600px) {
        .button-1 {
            margin-left: 15% !important;
        }
    }
</style>
<style>
    .button-container {
        display: flex;
        justify-content: space-between;
        margin-top: 5%;
    }

    .responsive-button {
        flex: 1;
        max-width: 48%;
        height: 70px;
        border-radius: 6px;
        background-color: #5E69FF;
        font-weight: 700;
        margin-top: 5%;
    }

    span {
        color: white;
        font-size: 22px;
    }
</style>
<style>
    .sidebar-page-container {
        padding-top: 60px;
    }

    .auto-container {
        max-width: 1200px;
        /* Adjust the max-width as needed */
        margin: 0 auto;
    }

    .content-side {
        margin-bottom: 0;
    }

    .upper-box {
        text-align: center;
    }

    .image-box img {
        max-width: 100%;
        height: auto;
    }

    .quiz-container {
        transform: scale(0.65);
        position: relative;
        top: -100px;
        margin-top: 5%;
    }

    .question {
        font-size: 2.5rem;
    }

    .answer-option {
        padding: 15px;
        border: 1px solid black;
        margin-bottom: 10px;
    }

    .answer-option label {
        padding: 5px;
        font-size: 2.0rem;
        display: flex;
        align-items: center;
    }

    .answer-option input {
        transform: scale(1.6);
        margin-right: 10px;
        margin-top: -2px;
        color: black;
    }

    .result {
        display: block;
        margin-top: 5px;
    }

    @media screen and (max-width: 768px) {
        .quiz-container {
            transform: scale(1);
            top: 0;
        }
    }
</style>
<div class="sidebar-page-container" style="padding-top:60px;">
    <div class="auto-container">
        <div class="row">
            <div class="sidebar-side col-lg-2 col-md-12 col-sm-12">

            </div>
            <!--Content Side-->
            <div class="content-side col-lg-8 col-md-12 col-sm-12" style="margin-bottom:0px;">

                <div class="upper-box">
                    <div class="image-box">
                        <figure class="image wow fadeIn"><img src="{{asset('public/images1/quiz-new.png') }}" alt="">
                        </figure>
                    </div>
                </div>
                <div style='transform: scale(0.65); position: relative; top: -100px; margin-top:5%; '>
                    <h3 style=" font-size: 2.5rem;" class="spectral"> {{ $question->question }}</h3>
                    <p>Choose 1 answer</p>

                    @foreach($question->options as $option)
                    <div id='block-11' style='padding: 15px; border:1px solid black;'>
                        <label for='option-11' style=' padding: 5px; font-size: 2.0rem;'>
                            <input type='radio' name='option' value='6/24' id='option-11'
                                style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px; color: black;'
                                class="spectral" />
                            {{ $option->option }}</label>
                        <span id='result-11'></span>
                    </div>
                    <br>
                    @endforeach

                    <div id='block-12' style='padding: 15px; border:1px solid black;'>
                        <label for='option-12' style=' padding: 5px; font-size: 2.0rem;'>
                            <input type='radio' name='option' value='6' id='option-12'
                                style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;'
                                class="spectral" />
                            Pune, Maharashtra</label>
                        <span id='result-12'></span>
                    </div>
                    <br>

                    <div id='block-13' style='padding: 15px; border:1px solid black;'>
                        <label for='option-13' style=' padding: 5px; font-size: 2.0rem;'>
                            <input type='radio' name='option' value='1/3' id='option-13'
                                style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;'
                                class="spectral" />
                            Kohlapur, Maharashtra</label>
                        <span id='result-13'></span>
                    </div>

                    <br>
                    <div id='block-14' style='padding: 15px; border:1px solid black;'>
                        <label for='option-14' style=' padding: 5px; font-size: 2.0rem;'>
                            <input type='radio' name='option' value='1/6' id='option-14'
                                style='transform: scale(1.6); margin-right: 10px; vertical-align: middle; margin-top: -2px;'
                                class="spectral" />
                            Ujjain, Madhya Pradesh</label>
                        <span id='result-14'></span>
                    </div>

                    <div class="button-container">
                        <button type='button' onclick='displayAnswer1()'
                            class="responsive-button"><span>Submit</span></button>
                        <button type='button' onclick='displayAnswer1()'
                            class="responsive-button"><span>Next</span></button>
                    </div>

                </div>
                <a id='showanswer1'></a>



            </div>

            <!--Sidebar Side-->
            <div class="sidebar-side col-lg-2 col-md-12 col-sm-12">

            </div>
        </div>

    </div>
</div>

<div>
    <div style="display:grid; margin-left:20%;">
        @if($questions)
        @foreach($questions as $question)
        <h3>{{ $question->question }}</h3>
        <div class="options-label">
            @foreach($question->options as $option)
            <label class="options-label">
                <input type="radio" name="answers[{{ $question->id }}]" value="{{ $option->id }}">
                {{ $option->option }}
            </label>
            @endforeach
        </div>

        <div class="brief-answer">
            {{ $question->briefanswer }}
        </div>

        <hr> <!-- Optional horizontal line to separate questions -->

        @endforeach
        <button type="submit">Submit Answers</button>
        @else
        <p>No questions found for this quiz.</p>
        @endif
    </div>
</div>
@stop

@section('js')
<script>
    function displayAnswer1() {
            if (document.getElementById('option-11').checked) {
                document.getElementById('block-11').style.border = '3px solid limegreen'
                document.getElementById('result-11').style.color = 'limegreen'
                document.getElementById('result-11').innerHTML = '<img src="{{asset('public/images1/thumb-1.png') }}" alt="Correct" style="height:50px;">'
            }
            if (document.getElementById('option-12').checked) {
                document.getElementById('block-12').style.border = '3px solid red'
                document.getElementById('result-12').style.color = 'red'
                document.getElementById('result-12').innerHTML = '<img src="{{asset('public/images1/thumb-2.png') }}" alt="Correct" style="height:50px;">'
                // showCorrectAnswer1()
            }
            if (document.getElementById('option-13').checked) {
                document.getElementById('block-13').style.border = '3px solid red'
                document.getElementById('result-13').style.color = 'red'
                document.getElementById('result-13').innerHTML = '<img src="{{asset('public/images1/thumb-2.png') }}" alt="Correct" style="height:50px;">'
                // showCorrectAnswer1()
            }
            if (document.getElementById('option-14').checked) {
                document.getElementById('block-14').style.border = '3px solid red'
                document.getElementById('result-14').style.color = 'red'
                document.getElementById('result-14').innerHTML = '<img src="{{asset('public/images1/thumb-2.png') }}" alt="Correct" style="height:50px;">'
                // showCorrectAnswer1()
            }
        }
</script>
<script>
    function showCorrectAnswer1() {
            let showAnswer1 = document.createElement('p')
            showAnswer1.innerHTML = ''
            showAnswer1.style.position = 'relative'
            showAnswer1.style.top = '-180px'
            showAnswer1.style.fontSize = '1.75rem'
            document.getElementById('showanswer1').appendChild(showAnswer1)
            showAnswer1.addEventListener('click', () => {
                document.getElementById('block-11').style.border = '3px solid limegreen'
                document.getElementById('result-11').style.color = 'limegreen'
                document.getElementById('result-11').innerHTML = 'Correct!'
                document.getElementById('showanswer1').removeChild(showAnswer1)
            })
        }
</script>
@stop
