@extends('webscite.layout')
@section('content')
<section class="contact-section" style="padding: 66px;">
    <div class="auto-container">
        <div class="row">


            <div class="form-column col-lg-6 col-md-12 col-sm-12">

                <h1 align="center" style="margin-bottom: 5px;"><b style="color:black;" class="spectral"> User
                        Login</b></h1>
                <div class="contact-form">
                    <div>
                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                    </div>

                    <form action="{{ route('user.UserLoginCheck') }}" method="post" id="">
                        @csrf

                        <div class="form-group col-md-6 col-md-12 col-sm-12">
                            <input type="email" name="email" placeholder="email" required>
                        </div>

                        <div class="form-group col-md-6 col-md-12 col-sm-12">
                            <input type="text" name="password" placeholder="Password" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-3 col-md-12 col-sm-12" style="padding-left:5%;">
                                <p class="spectral"><a href="{{route ('user.registrationGet') }}">Sign Up</a>
                                </p>
                            </div>
                            <div class="form-group col-lg-4 col-md-12 col-sm-12"></div>
                            <div class="form-group col-lg-4 col-md-12 col-sm-12" style="padding-left:8%;">
                                <p class="spectral"><a href="{{ route('user.forgetPasswordGet') }}">Forget
                                        Password ?</a></p>
                            </div>


                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12" align="center">
                            <button class="theme-btn btn-style-one spectral padding2 button-11" type="submit"
                                style="border-radius:35px; background-color: 5E69FF !important; color: white;">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <img src="public/images1/logoimg1.png">
            </div>
        </div>
    </div>
</section>
@stop
