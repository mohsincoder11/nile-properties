@extends('webscite.layout')
@section('content')
<section class="contact-section" style="padding-top: 66px;">
    <div class=" auto-container">
        <div class="row">


            <div class="form-column col-lg-6 col-md-12 col-sm-12">
                <h1 align="center" style="margin-bottom: 5px;"><b style="color:black;" class="spectral">Change Your
                        Password</b></h1>
                <div class="contact-form">

                    <form action="" id="">

                        <div class="form-group col-md-6 col-md-12 col-sm-12">
                            <input type="text" name="username" placeholder="New Password">
                        </div>

                        <div class="form-group col-md-6 col-md-12 col-sm-12">
                            <input type="email" name="email" placeholder="Confirm Password">
                        </div>


                    </form>
                    <div class="col-lg-12 col-md-12 col-sm-12" align="center">
                        <a href="index.html"> <button class="theme-btn btn-style-one spectral padding2 button-11"
                                style="border-radius:35px; background-color: 5E69FF !important; color: white;">Submit</button></a>
                    </div>
                </div>
            </div>

            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <img src="public/images1/logoimg1.png">
            </div>
        </div>
    </div>
</section>
@stop
