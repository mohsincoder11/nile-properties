@extends('webscite.layout')
@section('content')

<section class="contact-section" style="padding-top:20px;">
    <div class="auto-container">
        <div class="row">

            <div class="col-md-2"></div>
            <div class="form-column col-lg-8 col-md-12 col-sm-12">
                <h1 align="center" style="margin-bottom: 5px; color: black;" class="spectral"><b>Registration
                        Form</b></h1>
                <p align="center" class="spectral">Fill out of The Form Carefully for Registration</p>
                <div class="contact-form">


                    @if($errors->has('email'))
                    <div class="alert alert-danger" role="alert">
                        {{ $errors->first('email') }}
                    </div>
                    @endif
                    <form action="{{ route('user.WebsiteUserRegistration') }}" method="post">
                        @csrf
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <div class="form-group col-md-6 col-md-12 col-sm-12">
                            <input type="text" name="name" placeholder="Name" required>
                        </div>

                        <div class="form-group col-md-6 col-md-12 col-sm-12">
                            <input type="email" name="email" placeholder="Email Id" required>
                        </div>

                        <div class="form-group col-md-6 col-md-12 col-sm-12">
                            <input type="text" name="password" placeholder="Password" required>
                        </div>

                        <div class="form-group col-md-6 col-md-12 col-sm-12"
                            style="margin-bottom: 0px; padding-bottom: 0px;">

                            <input type="text" name="number" minlength="10" maxlength="10" pattern="[1-9]{1}[0-9]{9}"
                                placeholder="Phone Number" oninput="setCustomValidity('')"
                                onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Phone number must be 10 digits' : ''); required">
                        </div>
                        <div class="form-group col-lg-12 col-md-12 col-sm-12" style="margin-bottom:10px;">
                            <p style="color: red; font-weight: bold;" class="spectral">(Giving a phone number
                                will enable us to
                                update you on the latest updates )</p>

                        </div>
                        <label class="container" style="margin-bottom:20px;">
                            <input type="checkbox" checked="checked">
                            <span class="checkmark spectral"></span>Read and agreed on the <b><a
                                    href="javascript:void(0)">terms
                                    and
                                    conditions </a></b>of the site.
                        </label>



                        <div class="form-group col-lg-12 col-md-6 col-sm-6" align="center">
                            <a href="#"> <button class="theme-btn btn-style-one padding2 " type="submit"
                                    style="border-radius:35px; background-color: 5E69FF !important;"
                                    class="spectral">Submit</button></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</section>


@stop