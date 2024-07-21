@foreach ($Heroes as $heroes)
{{-- <div class="modal-header">
    <h5 class="modal-title">{{ $heroes->title }} &nbsp;(Auther:
        {{ $story->author }} &nbsp;Artist: {{$story->artist}})</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div> --}}


{{-- <h5></h5>
<p>Author: }</p> --}}
{{-- <p>Artist: {{ $story->artist }}</p> --}}
<div class="text-center">
    <div class="lower-content"
        style="padding-top: 14px; padding-left: 18px; padding-right: 18px; overflow-y: auto; max-height: 500px;">

        <button type="button" class="close" data-dismiss="modal" aria-label="Close"
            style="position: absolute; top: 10px; right: 10px; background: none; border: none; font-size: 30px; color: #060606;">
            &times;
        </button>

        <a href="{{asset('public/images/' . $heroes->image) }}" target="_blank">
            @if ($heroes->image)
            <img height="250px" width="250px" src="{{asset('public/images/' . $heroes->image) }}" alt="" />
            @else
            <!-- Provide the path to your default image -->
            <img height="250px" width="250px" src="{{asset('public/frontend/assets/images/about-us.png') }}"
                alt="Default Image" />
            @endif
        </a>

        <h5 class="modal-title spectral">{{ $heroes->title }}</h5>
        <div>{!! $heroes->text !!}</div>
    </div>
</div>

@endforeach
