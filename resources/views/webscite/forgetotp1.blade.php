@extends('webscite.layout')
@section('content')
<!-- End Main Header -->

<!--Page Title-->
<!--- <section class="page-banner curve-offwhite" style="background-image:url(public/images1/background/1.jpg);">
        <div class="auto-container">
            <h1>Contact Us</h1>
            <a href="index.html" class="home-btn"><span class="flaticon-house-outline"></span></a>
        </div>
    </section>--->
<!--End Page Title-->

<!-- Contact Section -->
<style>


    .customBtn {
        border-radius: 0px;
        padding: 10px;

    }

    form input {
        display: inline-block;
        width: 50px;
        height: 50px;
        text-align: center;
        background-color: #cbcbcb;
    }
</style>

<section class="contact-section">
    <div class="auto-container">
        <div class="row">


            <div class="form-column col-lg-6 col-md-12 col-sm-12">
                <h1 align="center" style="margin-bottom: 5px;" class="spectral"> <b style="color:black;">OTP
                        Verification</b></h1>



                <div class="contact-form">


                    <div class="container">
                        <div class="row justify-content-md-center">
                            <div class="col-md-12 text-center">
                                <div class="row">
                                    @if(session('error'))
                                    <div class="alert alert-danger" style="margin-top: 5px; margin-left: 28%;">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                    <div class="col-sm-12 mt-5 bgWhite">


                                        <div class="title spectral" style="margin-top: -40px;">
                                            <h6>OTP Sent on Your Email</h6>

                                        </div>





                                        <form action="{{ route('user.ForgetPasswordUpdatePage') }}" method="get" style="margin-top: 5px;">
                                            @csrf

                                            <input type="hidden" name="remember_token" value="{{ $rememberToken }}">
                                         {{-- <div class="form-group" style="margin-top: 7px;">
                                                <input class=" otp" type="text" name="otp" oninput='digitValidate(this)'
                                                    onkeyup='tabChange(1)' maxlength="6"
                                                    style="width: 90px; height: 30px; border: 1px solid black; margin-left: 190px; background-color:white; padding: 2px; font-size: 16px;"
                                                    placeholder=""> --}}
												
												 <input class="otp" type="text" name="otp1"  oninput='digitValidate(this)'
                                                        onkeyup='tabChange(1)' maxlength=1
                                                        style=" border: 1px black !important;" required >
                                                    <input class="otp" type="text" name="otp2" oninput='digitValidate(this)'
                                                        onkeyup='tabChange(2)' maxlength=1 required> 
                                                    <input class="otp" type="text" name="otp3" oninput='digitValidate(this)'
                                                        onkeyup='tabChange(3)' maxlength=1 required>
                                                    <input class="otp" type="text" name="otp4" oninput='digitValidate(this)'
                                                        onkeyup='tabChange(4)' maxlength=1 required>
												  <input class="otp" type="text" name="otp5" oninput='digitValidate(this)'
                                                        onkeyup='tabChange(4)' maxlength=1 required>
												  <input class="otp" type="text" name="otp6" oninput='digitValidate(this)'
                                                        onkeyup='tabChange(4)' maxlength=1 required>
                                           {{-- </div> --}}


                                            @if ($errors->has('otp'))
                                            <span class="text-danger" style="margin-top: 5px;">{{ $errors->first('otp')
                                                }}</span>
                                            @endif

                                            <hr class="mt-4">
                                            <div class="text-center mt-3">
                                                <button class="theme-btn btn-style-one spectral padding5" type="submit"
                                                    style="border-radius:35px; background-color: #5E69FF !important; color: white; padding-right: 20px; padding-left: 20px;">Verify
                                                    & Process</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                            &nbsp;
                            &nbsp; &nbsp;
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <img style="max-width:90%; margin-top:-15%;" src="public/images1/otp.png">
            </div>
        </div>
    </div>
</section>
<!--End Contact Section -->



@stop
