<div style="position: fixed; bottom: 0; width: 100%;z-index:9999;background-color:#fff;">
    <div class="col-md-12" style="width: 100%;">
        @if(session('error'))
        <div class="col-md-6" style="float: left; width: 50%;">
            <div id="successscript" class="alert alert-success mt-2 alert_close_btn"
                style="background-color: rgba(209, 215, 209, 0.1); color: #1f1e1e; border: 1px solid #abafab; padding: 10px; border-radius: 5px;">
                {!! session('error') !!}
            </div>
        </div>
        @endif

        @if(session('success'))
        <div class="col-md-6" style="float: left; width: 50%;">
            <div id="successscript" class="alert alert-success alert_close_btn"
                style="background-color: rgba(209, 215, 209, 0.1); color: #1f1e1e; border: 1px solid #abafab; padding: 10px; border-radius: 5px;">
                {{ session('success') }}
            </div>
        </div>
        @endif

    </div>
</div>