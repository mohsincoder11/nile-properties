<section>

    <div class="auto-container">

        @foreach ($Stories as $story)
        <div class="modal-header">
            <h5 class="modal-title">{{ $story->title }} &nbsp;(Author:
                {{ $story->author }} &nbsp;Artist: {{$story->artist}})</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    </div>

</section>




{{-- <h5></h5>
<p>Author: }</p> --}}
{{-- <p>Artist: {{ $story->artist }}</p> --}}
{{-- <div class="text font1 spectral" style="padding: 12px; text-align: justify; margin-bottom:5%;">
    <p class="spectral"> {!! $story->text !!}</p>
</div> --}}

<section class="programs-section pt-xs-30 pt-md-60 pb-xs-55 pb-md-70 pb-lg-20" style="margin-top:60px;">
    <div class="container">

        <div class="row">
            <div class="program-preview">
                <div class="col-12">


                    <div class="text-card-wrapper"
                        style="box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); border-radius: 10px; overflow: hidden; margin-top: 12px;">
                        <div class="text font1 spectral" style="padding: 12px; text-align: justify; margin-bottom:5%;">
                            <p class="spectral"> {!! $story->text !!}</p>
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </div>
</section>
@endforeach