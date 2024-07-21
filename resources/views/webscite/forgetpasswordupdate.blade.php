@extends('webscite.layout')

@section('content')

<!-- Contact Section -->
<section class="contact-section">
    <div class="auto-container">
        <div class="row">


            <div class="form-column col-lg-6 col-md-12 col-sm-12">
                <h1 align="center" style="margin-bottom: 5px;"><b style="color:black;" class="spectral">Reset
                        Password</b></h1>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
				<div id="passwordMatchMessage" class="alert" style="display:none;"></div>

                <div class="contact-form">

                    <form action="{{ route('user.updatepassword')}}" method="post">
                        @csrf

                        <input type="hidden" name="remember_token" value="{{ $rememberToken }}">
                        <div class="form-group col-md-6 col-md-12 col-sm-12">
                            <input type="password" name="password" placeholder="Enter New Password"
                                class="form-control" required >
                        </div>

                        <div class="form-group col-md-6 col-md-12 col-sm-12">
                            <input type="password" name="newpassword" placeholder="Confirm New Password"
                                class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-3 col-md-12 col-sm-12" style="padding-left:5%;">
                            </div>



                        </div>


                        <div class="col-lg-12 col-md-12 col-sm-12" align="center">
                            <button type="submit" class="theme-btn btn-style-one spectral padding2 button-11"
                                style="border-radius:35px; background-color: 5E69FF !important; color: white; padding:15px 196px;">Reset
                                Password</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <img src="{{asset('public/images/reset-password.jpg') }}" style="max-width: 90%;  margin-top: -18%;">

            </div>
        </div>
    </div>
</section>
<!--End Contact Section -->
@stop
@section('js')
<script>
    $(document).ready(function(){
        // Select the password and new password input fields
        var passwordField = $('input[name="password"]');
        var newPasswordField = $('input[name="newpassword"]');
        var passwordMatchMessage = $('#passwordMatchMessage');

        // Select the form and attach a submit event listener
        $('form').submit(function(event){
            // Prevent the form from submitting
            event.preventDefault();

            // Get the values of the password and new password fields
            var passwordValue = passwordField.val();
            var newPasswordValue = newPasswordField.val();

            // Check if the passwords match
            if(passwordValue === newPasswordValue){
                // If passwords match, submit the form
                this.submit();
            } else {
                // Show danger message
                passwordMatchMessage.removeClass('alert-success').addClass('alert-danger').html('Passwords do not match. Please enter matching passwords.').show();
            }
        });
    });
</script>


@stop
