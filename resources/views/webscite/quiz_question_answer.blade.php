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
            <div class="sidebar-side col-lg-8 col-md-8 col-sm-8" style="margin-left:180px;">

                <form id="quizForm" action="{{ route('quizquestion.submit') }}" method="post">
                    @csrf
                    <!--Content Side-->



                    {{-- @json($question); --}}

                    <div class="content-side col-lg-12 col-md-12 col-sm-12" style="margin-bottom:0px;">

                        <div class="upper-box">
                            <div class="image-box">
                                @if ($quiz->image)
                                <img src="{{asset('public/images/' . $quiz->image) }}" alt="Quiz Image">
                                @else

                                <img src="{{asset('public/frontend/assets/images/about-us.png') }}" alt="Default Image">
                                @endif
                            </div>
                        </div>

                        <div style='transform: scale(0.65); position: relative; top: -100px; margin-top:5%; '>
                            <h3 style=" font-size: 2.5rem;" class="spectral">{{ $question->question }}</h3>
                            <p>Choose 1 answer</p>
                            <input type="hidden" name="quiz_id" value="{{ $quiz->id }}">
                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                            @foreach($question->options as $option)
                            <div id='block-{{ $option->id }}' style='padding: 15px; border:1px solid black;'>
                                <label for='option-{{ $option->id }}' style='padding: 5px; font-size: 2.0rem;'>
                                    <input type='radio' name='option' value={{ $option->id }}
                                    id='option-{{ $option->id }}' for='option-{{ $option->id }}'
                                    style='transform: scale(1.6);
                                    margin-right: 10px;
                                    vertical-align: middle;
                                    margin-top: -2px;
                                    color: black;'
                                    class="spectral"
                                    {{ $option->is_selected ? 'checked' : '' }}
                                    onclick="displayBriefAnswer('{{ $question->briefanswer }}');
                                    displayAnswer1({{ $option->id }}, {{ $correctOptionId }});
                                    disableOptions();"
                                    required/>
                                    {{ $option->option }}
                                </label>
                                <span id='result-{{ $option->id }}'></span>
                            </div>
                            <br>
                            @endforeach
                            <div style="width:50%; margin-left:50%;" class="button-container">
                                @php
                                $isLastQuestion = $questionIndex === count($quiz->questions) - 1;
                                $buttonLabel = $isLastQuestion ? 'Submit' : 'Next';
                                @endphp




                            </div>

                            <div style="margin-right: 2px;">
                                <div id="briefAnswerContainer"
                                    style="margin-top: 20px;  font-size: 1.5rem; display: none;  ">
                                    <strong style="display:flex; justify-content: start;">Brief Answer: {{
                                        $question->briefanswer }}</strong> <span id="briefAnswer"></span>
                                </div>




                            </div>

                            <div style="margin-top: 20px; margin-left: 80%;">
                                <!-- Place the button in a separate container -->
                                <button type="submit" onclick="displayAnswer1()"
                                    class="p-4 pl-5 pr-5 btn-style-one theme-btn padding2">
                                    <span>{{ $buttonLabel }}</span>
                                </button>
                            </div>

                            {{-- <div class="col-lg-12 col-md-12 col-sm-12" align="center">
                                <button class="theme-btn btn-style-one spectral padding2 button-11" type="submit"
                                    style="border-radius:35px; background-color: 5E69FF !important; color: white;">Submit</button>
                            </div> --}}
                        </div>



                    </div>

                </form>
                <a id='showanswer1'></a>



            </div>
        </div>

        <!--Sidebar Side-->
        <div class="sidebar-side col-lg-2 col-md-12 col-sm-12">

        </div>
    </div>

</div>



@stop

@section('js')

<script>
    function displayAnswer1(selectedOptionId, correctOptionId) {
        // Reset styles for all options
        resetStyles();

        // Show the result for the selected option
        if (selectedOptionId !== null) {
            showResult(`block-${selectedOptionId}`, `result-${selectedOptionId}`, 'red', '{{ asset("public/images1/thumb-2.png") }}');
        }
        // Show the correct result
        showResult(`block-${correctOptionId}`, `result-${correctOptionId}`, 'limegreen', '{{ asset("public/images1/thumb-1.png") }}');

        // Disable all options after displaying the result
        disableOptions();
    }

    function resetStyles() {
        // Reset styles for all options
        var options = document.getElementsByName('option');
        for (var i = 0; i < options.length; i++) {
            var optionId = options[i].value;
            document.getElementById(`block-${optionId}`).style.border = '1px solid black';
            document.getElementById(`result-${optionId}`).style.color = 'black';
            document.getElementById(`result-${optionId}`).innerHTML = '';
        }
    }

    function showResult(blockId, resultId, borderColor, thumbSrc) {
        // Show the result for the selected option
        document.getElementById(blockId).style.border = `3px solid ${borderColor}`;
        document.getElementById(resultId).style.color = borderColor;
        document.getElementById(resultId).innerHTML = `<img src="${thumbSrc}" alt="Result" style="height:50px;">`;
    }

   function disableOptions() {
var options = document.getElementsByName('option');
for (var i = 0; i < options.length; i++) { if (!options[i].checked) { options[i].disabled=true;
    options[i].parentElement.style.pointerEvents='none' ; } }
}
    function submitForm() {
        var selectedOptionId = document.querySelector('input[name="option"]:checked');
        if (selectedOptionId) {
            selectedOptionId = selectedOptionId.value;
            document.getElementById('selectedOptionId').value = selectedOptionId;
            disableOptions();
            document.getElementById('quizForm').submit();
        } else {
            alert('Please choose an option before proceeding.');
        }
    }
</script>
<script>
    function displayBriefAnswer(briefAnswer) {
        // Display the brief answer container
        document.getElementById('briefAnswerContainer').style.display = 'block';

        // Set the brief answer text
        document.getElementById('briefAnswer').innerText = briefAnswer;
    }
</script>


@stop
