@foreach ($Quiz as $quiz)
<div class="modal-header">
    <h5 class="modal-title">{{ $quiz->title }} &nbsp;(Facilitated by
        {{ $quiz->facilitated }}) </h5>
    {{-- &nbsp;Artist: {{$story->artist}})</h5> --}}
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>


{{-- <h5></h5>
<p>Author: }</p> --}}
{{-- <p>Artist: {{ $story->artist }}</p> --}}





<div class="row" style="margin-top: 25px">

    <div class="col-md-4">
        <td><a href="{{asset('public/images/' . $quiz->image)}}">
                <img height="400px" width="300px" src="{{asset('public/images/' . $quiz->image)}}" alt="" />
            </a>
        </td>
    </div>


    <div class="col-md-8">
        <div class="program-description spectral" data-text="Stories">

            <div class="program-text ">

                {!!$quiz->text!!}


            </div>
        </div>
    </div>
</div>





{{-- <div>{!! $quiz->text !!}</div> --}}

@endforeach
