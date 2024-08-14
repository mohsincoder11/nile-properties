<div class="text-center">
    <div class="lower-content" style="padding-top: 14px; padding-left: 18px; padding-right: 18px;">

        <a href="{{asset('public/images/' . $FoodAndCultureDetail->image) }}" target="_blank">
            @if ($FoodAndCultureDetail->image)
            <img height="250px" width="250px" src="{{asset('public/images/' . $FoodAndCultureDetail->image) }}"
                alt="" />
            @else
            <!-- Provide the path to your default image -->
            <img height="250px" width="250px" src="{{asset('public/frontend/assets/images/about-us.png') }}"
                alt="Default Image" />
            @endif
        </a>
        <h5 class="modal-title spectral">{{$FoodAndCultureDetail->title}}</h5>
        <div>
            {!! $FoodAndCultureDetail->text !!}
        </div>
    </div>
</div>
