@extends('webscite.layout')
@section('content')


<style>
    .open-button {
        background-color: #555;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        opacity: 0.8;
        position: fixed;
        bottom: 23px;
        right: 28px;
        width: 280px;
    }

    /* The popup form - hidden by default */
    .form-popup {
        display: none;
        position: absolute;
        bottom: 27%;

        right: 32%;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    .form-popup-2 {
        display: none;
        position: absolute;
        bottom: 27%;

        right: 28%;
        border: 3px solid #f1f1f1;
        z-index: 9;
    }

    /* Add styles to the form container */
    .form-container {
        max-width: 300px;
        padding: 10px;
        background-color: white;
    }

    /* Full-width input fields */
    .form-container input[type=text],
    .form-container input[type=password] {
        width: 100%;
        padding: 15px;
        margin: 5px 0 22px 0;
        border: none;
        background: #f1f1f1;
    }

    /* When the inputs get focus, do something */
    .form-container input[type=text]:focus,
    .form-container input[type=password]:focus {
        background-color: #ddd;
        outline: none;
    }

    /* Set a style for the submit/login button */
    .form-container .btn {
        background-color: #04AA6D;
        color: white;
        padding: 16px 20px;
        border: none;
        cursor: pointer;
        width: 100%;
        margin-bottom: 10px;
        opacity: 0.8;
    }

    /* Add a red background color to the cancel button */
    .form-container .cancel {
        background-color: red;
    }

    /* Add some hover effects to buttons */
    .form-container .btn:hover,
    .open-button:hover {
        opacity: 1;
    }
</style>

<!--Page Title-->
<section class="page-banner curve-offwhite" style="background-image:url(public/images1/background/stories-1.png);">
    <div class="auto-container">
        <h1 class="spectral" style="font-size: 60px;"><img src="public/images1/starting-title.gif" style="height:250px;"
                alt="">Contact us </h1>
        <a href="{{route('user.indexGet') }}" class="home-btn"><span class="flaticon-house-outline"></span></a>
    </div>
</section>
<!--End Page Title-->



<!-- Contact Section -->
<section class="contact-section">
    <div class="auto-container">
        <div class="row">
            <div class="form-column col-lg-6 col-md-12 col-sm-12">
                <div class="sec-title">

                    <h2 class="spectral font11" style="padding-top:5px;font-size: 50px;">Write us a Message</h2>

                </div>
                @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="contact-form">
                    <form method="post" action="{{ route('user.contactUsPost') }}" id="contact-form1">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                <input type="text" name="username" placeholder="Full name" required>
                            </div>

                            <div class="form-group col-lg-6 col-md-12 col-sm-12">
                                <input type="email" name="email" placeholder="Email address" required>
                            </div>
                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <input type="text" name="number" minlength="10" maxlength="10"
                                    pattern="[1-9]{1}[0-9]{9}" placeholder="Phone Number"
                                    oninput="setCustomValidity('')"
                                    onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Phone number must be 10 digits' : '');">
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                <textarea name="message" placeholder="Write message" required></textarea>
                            </div>

                            <div class="form-group col-lg-12 col-md-12 col-sm-12">


                                <button class="theme-btn btn-style-one spectral padding2 padding11"
                                    style="border-radius:15px; background-color: 5E69FF !important; color: white; padding-left:250px;padding-right:250px;">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-column col-lg-6 col-md-12 col-sm-12">
                <div class="sec-title">
                    <h2 class="spectral font11" style="padding-top:5px; font-size: 50px;">Connect with us</h2>
                    <!-- <div class="text">There are many variations of pass of lorem ipsum available but majority
                                have suffered in some form.</div> -->
                </div>
                <ul class="contact-info">
                    <li><span class="icon flaticon-phone-call-2"></span> <a href="tel:666-888-0000">+91 12345
                            67891</a></li>
                    <li><span class="icon flaticon-message"></span> <a
                            href="mailto:info@bharatiyastories.com">info@bharatiyastories.com</a></li>
                    <!-- <li><span class="icon flaticon-placeholder-1"></span> 987 top broklyn street road<br> new
                                york, USA</li> -->
                </ul>

                @auth
                <div class="sec-title">
                    <h2 class="spectral font11" style="padding-top:5px; font-size: 50px;">Feedback</h2>
                    <!-- <div class="text">There are many variations of pass of lorem ipsum available but majority
                                have suffered in some form.</div> -->
                    @if(session('success1'))
                    <div class="alert alert-success">
                        {{ session('success1') }}
                    </div>
                    @endif
                </div>
                <div>

                    <img src="public/images1/face1.png" alt="" style="height:45px; width:45px;" onclick="openForm4(0)">
                    <!-- <img src="public/images/face2.png" alt="" style="height:45px; width:45px;" onclick="openForm1()">
                            <img src="public/images/face3.png" alt="" style="height:45px; width:45px;" onclick="openForm2()">
                            <img src="public/images/face4.png" alt="" style="height:45px; width:45px;" onclick="openForm3()"> -->
                    <img src="public/images1/face5.png" alt="" style="height:45px; width:45px;" onclick="openForm4(1)">




                </div>
                @endauth


            </div>


        </div>
    </div>
</section>



<div class="form-popup" id="myForm4">
    <button onclick="closeForm4()">close</button>
    <form action="{{ route('feedbackValuestore.user') }}" method="post" class="form-container">
        @csrf
        <h4 class="spectral">Write your feedback</h4>
        <input type="hidden" name="happysad_hidden_value" id="feedback_value">


        <div class=" form-group col-lg-12 col-md-12 col-sm-12">
            <textarea name="message" placeholder="" style="height:200px; width:200px;"></textarea>
        </div>
        <button type="submit" class="btn cancel">Submit</button>
    </form>
</div>


@stop
@section('js')
<script>
    //         function openForm(value) {
//             console.log(value);
// document.getElementById("myForm").style.display = "block";
// }

// function closeForm(value) {
//     console.log(value);
// document.getElementById("myForm").style.display = "none";
// }

// function openForm1() {
// document.getElementById("myForm1").style.display = "block";
// }

// function closeForm1() {
// document.getElementById("myForm1").style.display = "none";
// }
// function openForm2() {
// document.getElementById("myForm2").style.display = "block";
// }

// function closeForm2() {
// document.getElementById("myForm2").style.display = "none";
// }
// function openForm3() {
// document.getElementById("myForm3").style.display = "block";
// }

// function closeForm3() {
// document.getElementById("myForm3").style.display = "none";
// }


function openForm4(value) {
document.getElementById("myForm4").style.display = "block";
document.getElementById("feedback_value").value=value;
}

function closeForm4() {
document.getElementById("myForm4").style.display = "none";

}

// function openForm5(value) {
//     alert(value);
// document.getElementById("myForm4").style.display = "block";
// document.getElementById("feedback_value").value=value;
// }

// function closeForm5() {
// document.getElementById().style.display = "none";
// }
</script>

@stop
