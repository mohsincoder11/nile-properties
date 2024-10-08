<!doctype html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('public/frontend/assets/images/favicon-32x32.png') }}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('public/frontend/assets/plugins/simplebar/css/simplebar.css') }}" rel="stylesheet" />
    <link href="{{asset('public/frontend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css') }}"
        rel="stylesheet" />
    <link href="{{asset('public/frontend/assets/plugins/metismenu/css/metisMenu.min.css') }}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('public/frontend/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{asset('public/frontend/assets/js/pace.min.js') }}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('public/frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{asset('public/frontend/assets/css/bootstrap-extended.css') }}" rel="stylesheet">
    <link href="{{asset('public/frontend/assets/css/app.css') }}" rel="stylesheet">
    <link href="{{asset('public/frontend/assets/css/icons.css') }}" rel="stylesheet">
    <title></title>
</head>
​

<body class="bg-login">
    <!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="mb-4 text-center">
                            <!-- <img src="frontend/assets/images/logo-img.png" width="180" alt="" /> -->
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="border p-4 rounded">
                                    <div class="text-center">

                                        <div>
                                            <img src="{{asset('public/images/admin-logo.png')}}" class="logo-icon"
                                                alt="logo icon" style="width: 200px;">
                                        </div>

                                    </div>

                                    <div class="login-separater text-center mb-4"> <span>login</span>
                                        <hr />
                                        @if(session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                        @endif
									@if(session('success'))
    <div id="successMessage" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
										<script>
    $(document).ready(function(){
        // Check if the success message exists
        var successMessage = $('#successMessage');
        
        if(successMessage.length > 0) {
            // Set a timeout to hide the success message after 5 seconds
            setTimeout(function() {
                successMessage.fadeOut('slow');
            }, 1000); // 5000 milliseconds = 5 seconds
        }
    });
</script>
										<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


                                    </div>
                                    <div class="form-body">
                                        <form class="row g-3" action="{{ route('user.AdminLoginCheck') }}"
                                            method="POST">
                                            @csrf
                                            <div class="col-12">
                                                <label for="email" class="form-label">Email ID</label>
                                                <input type="email" class="form-control" name="email"
                                                    id="inputEmailAddress" placeholder="Enter Your Email" required>
                                            </div>
                                            <div class="col-12">
                                                <label for="password" class="form-label">Password</label>
                                                <div class="input-group" id="show_hide_password">
                                                    <input type="password" class="form-control border-end-0"
                                                        id="inputChoosePassword" value="" name="password"
                                                        placeholder="Enter Password" required>
                                                    {{-- <a href="javascript:;"
                                                        class="input-group-text bg-transparent"><i
                                                            class='bx bx-hide'></i></a> --}}
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button type="submit"
                                                        style="background-color: rgb(253, 200, 54)), 254, 63)"
                                                        class="btn btn-primary"> Login</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
    <!--end wrapper-->
    <!-- Bootstrap JS -->
    <script src="{{asset('public/frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
    <!--plugins-->
    <script src="{{asset('public/frontend/assets/js/jquery.min.js') }}"></script>
    <script src="{{asset('public/frontend/assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
    <script src="{{asset('public/frontend/assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
    <script src="{{asset('public/frontend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}">
    </script>
    <!--Password show & hide js -->
    <script>
        $(document).ready(function () {
			$("#show_hide_password a").on('click', function (event) {
				event.preventDefault();
				if ($('#show_hide_password input').attr("type") == "text") {
					$('#show_hide_password input').attr('type', 'password');
					$('#show_hide_password i').addClass("bx-hide");
					$('#show_hide_password i').removeClass("bx-show");
				} else if ($('#show_hide_password input').attr("type") == "password") {
					$('#show_hide_password input').attr('type', 'text');
					$('#show_hide_password i').removeClass("bx-hide");
					$('#show_hide_password i').addClass("bx-show");
				}
			});
		});
    </script>


	

    <!--app JS-->
    <script src="{{asset('public/frontend/assets/js/app.js') }}"></script>
</body>


</html>