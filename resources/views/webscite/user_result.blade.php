@extends('webscite.layout')
@section('content')


<section class="program-single" style="margin-left: -2%; margin-top: -2%;">


    <div class="auto-container" style="margin-left: 25%;">
        <div class="row" style="display: inline;">
            <div style="display: flex; margin-bottom: 2%; margin-left: 22%;">
                <h2>Quiz Result</h2>
            </div>

            <div class="col-md-8" style="border: 1px solid rgb(7, 8, 8);">

                <div class="row">
                    @if ($correctAnswers >= ceil(count($quiz->questions) / 2))
                    <div class="col-lg-2" style="padding: 5px; text-align: right;  margin-left:40px;
">
                        <img src="{{asset('public/images/happy-face.jpg') }}" alt="Happy Face" class="result-icon"
                            style="width:80px; height:80px; margin-left:20px;">
                    </div>
                    <div class="col-lg-8">
                        <h4 style="margin-right: 5px;  margin-top: 15px;">Congratulations! You passed the quiz.</h4>
                    </div>
                    @else
                    <div style="display: flex;">
                        <div class=" col-lg-2" style="margin-right: 2px;">
                            <img src="{{asset('public/images/sad-face.png') }}" alt="Sad Face" class="result-icon"
                                style="width: 80px; height: 80px; margin-left:52px;">
                        </div>
                        <div class="col-lg-9" style="margin-right: 5px;">
                            <h4 style="margin-left: 30px;  margin-top: 10px;">Sorry, better luck next time. You didn't
                                pass the quiz.</h4>
                        </div>
                    </div>
                    @endif

                    <div class=" table-responsive col-md-10" style="margin-top: 5%; margin-left: 8%;">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No of questions:</th>
                                    <th>Correct Answers:</th>
                                    <th>Incorrect Answers:</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">{{ count($quiz->questions) }}</td>
                                    <td class="text-center">{{ $correctAnswers }}</td>
                                    <td class="text-center">{{ $incorrectAnswers }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

</section>

@stop
