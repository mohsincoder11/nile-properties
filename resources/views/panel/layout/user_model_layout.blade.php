<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Nile-Properties</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="icon" href="{{asset('panel/logo/favicon.png')}}" type="image/x-icon" />
    <!-- END META SECTION -->
    <!-- CSS INCLUDE -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" id="theme" href="{{asset('panel/css/theme-default.css')}}" />
    <link rel="stylesheet" type="text/css" id="theme" href="{{asset('panel/css/notification.css')}}" />
    <!-- EOF CSS INCLUDE -->

    {{-- Quill --}}

    {{--
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('https://cdn.quilljs.com/1.3.6/quill.snow.css') }}">


    <style>
        #editor {
            height: 100px;
        }
    </style>
    <style>
        .popup-container {
            position: relative;
        }

        .popup-content {
            display: none;
            position: absolute;
            z-index: 1;
            top: 100%;
            left: 0;
            background-color: #F9F9F9;
            padding: 10px;
            border: 1px solid #ccc;
        }

        .popup-container:hover .popup-content {
            display: block;
        }

        .popup-btn {
            /* background-color: #f2f2f2; */
            color: black;
            border: none;
            padding: 10px;
            cursor: pointer;
        }

        .popup-btn:hover {
            background-color: #f2f2f2;
        }


        /* Add your custom styles here */
        .icon-box-container {
            display: flex;
        }

        .icon-box-container {
            display: flex;
            flex-wrap: wrap;
            /* Allow flex items to wrap to the next line */
        }

        .icon-box {
            text-align: center;
            padding: 10px;
            margin: 5px;
            flex: 0 0 100px;
            /* Fixed width for each box */
            height: 120px;
            /* Fixed height for each box */
            box-sizing: border-box;
            /* Include padding and border in the box size */
            border-radius: 7px;
            /* Add border-radius for rounded corners */
            color: #fff;
            /* Set text color to white */
        }

        .box-1 {
            background-color: #39882C;
            /* Coral color for box 1 */
        }

        .box-2 {
            background-color: #0c82c6;
            /* Dodger Blue color for box 2 */
        }

        .box-3 {
            background-color: #c27809;
            /* Sunflower Yellow color for box 3 */
        }

        .classic {
            margin-top: 10% !important;
            font-size: 14px;
            font-weight: bold;
            color: white !important;
        }

        .classic-1 {
            height: 55px !important;
        }

        .classic-2 {
            height: 90px !important;
        }
    </style>



</head>

<body>

    <div class="preloader">
        <div class="utf-preloader">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <style>
        .mjbo {
            outline: 2px solid #08c8ea;
            outline-offset: 2px;
        }

        .mjprofile {
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 20px;
            border-color: rgba(0, 0, 0, .2);
            color: #000;
            -webkit-box-shadow: 0 2px 10px rgba(0, 0, 0, .2);
            box-shadow: 0 2px 10px rgba(0, 0, 0, .2);
        }

        .mjks {
            background-color: #006699;
            color: #FFF !important;
        }

        .mjks:hover {
            background-color: #a8dbee;
            color: #fff !important;
        }

        .tree {
            color: #000000;
        }

        .tree:hover {
            color: #003300;
        }

        .subtree {
            color: #006699;
        }

        .subtree:hover {
            color: #0099cc;
        }

        .subtreeactive {
            color: #006699;
        }

        .mjksactive {
            background-color: #006699;
            color: #000 !important;
        }

        .mjkslink {
            background-color: #ffffff;
            color: white;

        }

        .mjkslink:hover {
            background-color: #006699;

        }


        /* Add this to your CSS file or in a style tag within your HTML */
        #customModal {
            z-index: 1050;
            /* Adjust the value as needed to make it higher than other modals */
        }

        .modal {
            z-index: 1040;
            /* Default z-index for Bootstrap modals */
        }
    </style>
    <!-- START PAGE CONTAINER -->
    <div class="page-container page-navigation-top">
        <!-- PAGE CONTENT -->
        <div class="page-content">

            <!-- START X-NAVIGATION VERTICAL -->
            <ul class="x-navigation x-navigation-horizontal">
                <li class="xn-logo" style="margin-right:30px;">
                    <a> <img src="{{asset('panel/logo/logo.png')}}" alt="" style="width: 80%;margin-top: -2vh;" /></a>
                    <a href="#" class="x-navigation-control"></a>
                </li>
                <li class="xn-profile">
                    <a href="('#" class="profile-mini">
                        <img src="{{asset('assets/images/users/avatar.jpg')}}" alt="Nile-Properties" />
                    </a>
                </li>
                <li>
                    <a href="{{ route('user_model.dashboard') }}" id="Dashboard"><span class="fa fa-desktop">
                        </span>Dashboard</a>
                </li>

                <li class="xn-openable">
                    <a href="#" id="Registration Process"><span class="fa fa-file-text"></span>User Stages</a>
                    <ul>
                        {{-- <li><a href="{{ route('registrationChecklist')}}"><span
                                    class="fa fa-plus"></span>Registration --}}
                                Checklist</a></li>
                        <li><a href="{{ route('user_model.initiatesale')}}"><span class="fa fa-plus"></span>Add New
                                Sale</a></li>
                        <li><a href="{{ route('user_model.newsale')}}"><span class="fa fa-plus"></span>New Sale
                                Confirmed</a></li>
                        <li><a href="{{ route('user_model.paymentcollection')}}"><span class="fa fa-plus"></span>Payment
                                Collection</a>
                        </li>
                        <li><a href="{{ route('user_model.registration')}}"><span class="fa fa-plus"></span>Request For
                                Registration</a>
                        </li>
                        {{-- <li><a href="{{ route('user_model.account')}}"><span class="fa fa-plus"></span>Accounts
                                Clearance</a></li> --}}
                        <li><a href="{{ route('user_model.legalclearance')}}"><span class="fa fa-plus"></span>Legal
                                Clearance</a>
                        </li>
                        <li><a href="{{ route('user_model.registrationcompleted')}}"><span
                                    class="fa fa-plus"></span>Registration
                                Completed</a></li>
                        <li><a href="{{ route('user_model.saledeedscan')}}"><span class="fa fa-plus"></span>Saledeed
                                Scan</a></li>
                        <li><a href="{{ route('user_model.handover')}}"><span class="fa fa-plus"></span>Handover
                                Complete</a></li>
                    </ul>
                </li>

                {{-- <li class="xn-icon-button pull-right">
                    <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                </li> --}}
                <!-- MESSAGES -->
                <li class="xn-icon-button pull-right"
                    style="margin-right:25px; min-width:100px; color:#FFFFFF; padding-top:20px;">
                    Welcome, {{ Auth::user()->name ?? '' }}
                </li>

            </ul>
            <!-- END X-NAVIGATION -->

            {{-- <div class="page-content-wrap">
                <div class="row">
                    <div class="col-md-12" style="margin-top:5px;">
                        <label
                            style="color:#000; background-color:#FFCC00; width:7%; height:25px; padding-top:5px;margin-top: 1vh;"
                            align="center"><span class="fa fa-desktop"></span> <strong>Masters</strong></label>


                        <a href="{{route('city_master')}}"> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #993800;"><i
                                    class="fa fa-database"></i>City/Occupation/Layout Feature/Plot Sale
                                Status/Transaction Type Masters</button>
                        </a>
                        <a href="{{route('branch')}}"> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                    class="fa fa-sitemap"></i>Branch</button>
                        </a>


                        <a href="{{route('agent_reg')}}"> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #218dbb;"><i
                                    class="fa fa-users"></i>Agent/Broker Registration</button>
                        </a>

                        <a href="{{route('emp_reg')}}"> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #540338; "><i
                                    class="fa fa-user"></i>Employee Registration</button>
                        </a>
                        <a href="{{route('customerReg')}}"> <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;background-color: #8dd510; "><i
                                    class="fa fa-user"></i>Customer Registration</button>
                        </a>

                    </div>
                </div> --}}




                {{--

                <div class="modal" id="customModal" style="width:50% !important; margin-left:25%;">
                    <div class="modal-dialog" style="width:50% !important; margin-left:25%;">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Confirmation</h4>
                                <button type="button" class="close" data-dismiss="modal"
                                    onclick="closeCustomModal()">&times;</button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                Are you sure you want to delete?
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="deleteItem()">Yes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick="closeCustomModal()">No</button>
                            </div>

                        </div>
                    </div>
                </div> --}}
                <div class="modal" id="customModal" style="width:50% !important; margin-left:25%;">
                    <div class="modal-dialog" style="max-width: 80%;">
                        <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Confirmation</h4>
                                <button type="button" class="close" data-dismiss="modal" style="margin-top: -30px"
                                    aria-label="Close" onclick="closeCustomModal()">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <!-- Modal Body -->
                            <div class="modal-body">
                                Are you sure you want to delete?
                            </div>

                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" onclick="deleteItem()">Yes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal"
                                    onclick="closeCustomModal()">No</button>
                            </div>

                        </div>
                    </div>
                </div>




                {{-- Yeild Main Container --}}

                @yield('main_container')





                <!-- MESSAGE BOX-->
                <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
                    <div class="mb-container">
                        <div class="mb-middle">
                            <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                            <div class="mb-content">
                                <p>Are you sure you want to log out?</p>
                                <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                            </div>
                            <div class="mb-footer">
                                <div class="pull-right">
                                    <a href="#" class="btn btn-success btn-lg">Yes</a>
                                    <button class="btn btn-default btn-lg mb-control-close">No</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END MESSAGE BOX-->

                <!-- START PRELOADS -->
                <audio id="audio-alert" src="{{asset('audio/alert.mp3')}}" preload="auto"></audio>
                <audio id="audio-fail" src="{{asset('audio/fail.mp3')}}" preload="auto"></audio>
                <!-- END PRELOADS -->
                <!-- START SCRIPTS -->

                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


                <script type="text/javascript" src="{{asset('panel/js/plugins/jquery/jquery.min.js')}}"></script>
                <script type="text/javascript" src="{{asset('panel/js/plugins/jquery/jquery-ui.min.js')}}"></script>
                <script type="text/javascript" src="{{asset('panel/js/plugins/bootstrap/bootstrap.min.js')}}"></script>
                <!-- END PLUGINS -->
                <!-- THIS PAGE PLUGINS -->
                <script type='text/javascript' src="{{asset('panel/js/plugins/icheck/icheck.min.js')}}"></script>
                <script type="text/javascript"
                    src="{{asset('panel/js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js')}}"></script>
                <script type="text/javascript" src="{{asset('panel/js/plugins/bootstrap/bootstrap-datepicker.js')}}">
                </script>
                <script type="text/javascript"
                    src="{{asset('panel/js/plugins/bootstrap/bootstrap-timepicker.min.js')}}"></script>
                <script type="text/javascript" src="{{asset('panel/js/plugins/bootstrap/bootstrap-colorpicker.js')}}">
                </script>
                <script type="text/javascript" src="{{asset('panel/js/plugins/bootstrap/bootstrap-file-input.js')}}">
                </script>
                <script type="text/javascript" src="{{asset('panel/js/plugins/bootstrap/bootstrap-select.js')}}">
                </script>
                <script type="text/javascript" src="{{asset('panel/js/plugins/tagsinput/jquery.tagsinput.min.js')}}">
                </script>
                <script type="text/javascript" src="{{asset('panel/js/plugins/datatables/jquery.dataTables.min.js')}}">
                </script>
                <script type="text/javascript" src="{{asset('panel/js/plugins/dropzone/dropzone.min.js')}}"></script>
                <script type="text/javascript" src="{{asset('panel/js/plugins/fileinput/fileinput.min.js')}}"></script>
                <script type="text/javascript" src="{{asset('panel/js/plugins/filetree/jqueryFileTree.js')}}"></script>
                <!-- END PAGE PLUGINS -->
                <!-- START TEMPLATE -->
                <script type="text/javascript" src="{{asset('panel/js/plugins.js')}}"></script>
                <script type="text/javascript" src="{{asset('panel/js/actions.js')}}"></script>


                <script type="text/javascript" src="{{asset('panel/js/faq.js')}}"></script>
                <!-- END TEMPLATE -->




                <script>
                    $(function() {
            $("#file-simple").fileinput({
                showUpload: false
                , showCaption: false
                , browseClass: "btn btn-danger"
                , fileType: "any"
            });
            $("#filetree").fileTree({
                root: '/',

                expandSpeed: 100
                , collapseSpeed: 100
                , multiFolder: false
            }, function(file) {
                alert(file);
            }, function(dir) {
                setTimeout(function() {
                    page_content_onresize();
                }, 200);
            });
        });

                </script>


                {{-- Delete Alert Script --}}
                {{-- <script>
                    function openCustomModal(deleteUrl) {
        // Set the delete URL in the modal
        document.getElementById('customModal').deleteUrl = deleteUrl;

        // Show the modal
        $('#customModal').modal('show');
    }


    // ------
    function openEditModal(editUrl) {
        // Set the edit URL in the modal
        document.getElementById('customModal').editUrl = editUrl;

        // Show the modal with edit confirmation message
        $('#customModal').find('.modal-title').text('Edit Confirmation');
        $('#customModal').find('.modal-body').text('Are you sure you want to edit?');
        $('#customModal').find('.btn-danger').text('Edit').removeClass('btn-danger').addClass('btn-primary').attr('onclick', 'editItem()');
        $('#customModal').modal('show');
    }

    function editItem() {
        // Get the edit URL from the modal
        var editUrl = document.getElementById('customModal').editUrl;

        // Redirect to the edit URL
        window.location.href = editUrl;

        // Hide the modal
        $('#customModal').modal('hide');
    }

    // -------

    function deleteItem() {
        // Get the delete URL from the modal
        var deleteUrl = document.getElementById('customModal').deleteUrl;

        // Redirect to the delete URL
        window.location.href = deleteUrl;

        // Hide the modal
        $('#customModal').modal('hide');
    }

    function closeCustomModal() {
    // Hide the modal
    $('#customModal').modal('hide');
    }
                </script> --}}

                <script>
                    function openEditModal(editUrl) {
            // Set the edit URL in the modal
            document.getElementById('customModal').editUrl = editUrl;

            // Show the modal with edit confirmation message
            $('#customModal').find('.modal-title').text('Edit Confirmation');
            $('#customModal').find('.modal-body').text('Are you sure you want to edit?');
            $('#customModal').find('.btn-danger').text('Yes').removeClass('btn-danger').addClass('btn-primary').attr('onclick', 'editItem()');
            $('#customModal').modal('show');
        }

        function editItem() {
            // Get the edit URL from the modal
            var editUrl = document.getElementById('customModal').editUrl;

            // Redirect to the edit URL
            window.location.href = editUrl;

            // Hide the modal
            $('#customModal').modal('hide');
        }

        function openDeleteModal(deleteUrl) {
            // Set the delete URL in the modal
            document.getElementById('customModal').deleteUrl = deleteUrl;

            // Show the modal with delete confirmation message
            $('#customModal').find('.modal-title').text('Delete Confirmation');
            $('#customModal').find('.modal-body').text('Are you sure you want to delete?');
            $('#customModal').find('.btn-primary').text('Delete').removeClass('btn-primary').addClass('btn-danger').attr('onclick', 'deleteItem()');
            $('#customModal').modal('show');
        }

        function deleteItem() {
            // Get the delete URL from the modal
            var deleteUrl = document.getElementById('customModal').deleteUrl;

            // Redirect to the delete URL
            window.location.href = deleteUrl;

            // Hide the modal
            $('#customModal').modal('hide');
        }

        function closeCustomModal() {
            // Hide the modal
            $('#customModal').modal('hide');
        }

                </script>

                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        // Get the success message div
                        var successMessage = document.getElementById('successscript');

                        // If the success message div exists
                        if (successMessage) {
                            // Set a timeout to hide the message after 5 seconds (5000 milliseconds)
                            setTimeout(function() {
                                successMessage.style.display = 'none';
                            }, 5000);
                        }
                    });
                </script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js">
                </script>

                @yield('js')
</body>

</html>
