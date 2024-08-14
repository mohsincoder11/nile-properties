{{-- <style>
    .times-roman {
        font-family: 'Times New Roman', Times, serif;
    }
</style> --}}
{{--
<link href="https://fonts.googleapis.com/css2?family=Spectral:wght@400;700&display=swap" rel="stylesheet">
<style>
    .spectral-font {
        font-family: 'Spectral', serif;
    }
</style> --}}

<div class="text-center">
    <div class="lower-content" style="padding-top: 14px; padding-left: 18px; padding-right: 18px;">

        <a href="{{asset('public/images/' . $SportDetails->image)}}">
          
			   @if ($SportDetails->image)
            <img height="250px" width="250px" src="{{asset('public/images/' . $SportDetails->image) }}"
                alt="" />
            @else
            <!-- Provide the path to your default image -->
            <img height="250px" width="250px" src="{{asset('public/frontend/assets/images/about-us.png') }}"
                alt="Default Image" />
            @endif
        </a>
        <h5 class="modal-title spectral">{{$SportDetails->title}}</h5>
        <div>
            {!! $SportDetails->text !!}
            {{-- <div class="spectral-font">
                {!! nl2br(e(strip_tags($SportDetails->text))) !!} </div>

            <div style="font-family: 'Times New Roman', Times, serif; font-size: 16px;">

            </div> --}}
        </div>
    </div>
