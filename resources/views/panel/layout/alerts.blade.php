<div style="position: fixed; bottom: 0; width: 100%;">
    <div class="col-md-12" style="width: 100%;">
        <div class="col-md-6" style="float: left; width: 50%;">
            @if ($errors->any())
            <div id="successscript" class="alert alert-danger mt-2"
                style="background-color: rgba(209, 215, 209, 0.1); color: #1f1e1e; border: 1px solid #d6dad6; padding: 10px; border-radius: 5px;">
                <ul style="margin: 0; padding: 0; list-style-type: none;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="col-md-6" style="float: left; width: 50%;">
            @if(session('success'))
            <div id="successscript" class="alert alert-success"
                style="background-color: rgba(209, 215, 209, 0.1); color: #1f1e1e; border: 1px solid #abafab; padding: 10px; border-radius: 5px;">
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
</div>