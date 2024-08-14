<!DOCTYPE html>
<html lang="en">

<head>
    <!-- META SECTION -->
    <title>Nile-Properties</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="../../logo/favicon.png" type="image/x-icon" />
    <!-- END META SECTION -->
    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="../../css/theme-default.css" />
    <link rel="stylesheet" type="text/css" id="theme" href="../../css/notification.css" />
    <!-- EOF CSS INCLUDE -->
</head>

<body>
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
                    <a href="#" class="profile-mini">
                        <img src="assets/images/users/avatar.jpg" alt="Nile-Properties" />
                    </a>
                </li>
                <li>
                    <a href="#" title="Dashboard"><span class="fa fa-desktop"> </span>Dashboard</a>
                </li>
                <li>
                    <a href="#" title="Masters"><span class="fa fa-list"> </span>Masters</a>
                </li>
                <li>
                    <a href="project_entry.html" title="Project Entry"><span class="fa fa-edit"></span>Project Entry</a>

                </li>
                <li class="xn-openable">
                    <a href="#" title="CRM"><span class="fa fa-navicon"></span>CRM</a>
                    <ul>
                        <li><a href="#"><span class="fa fa-plus"></span>New CRM Client</a></li>
                        <li><a href="follow_up.html"><span class="fa fa-plus"></span>Follow Up (Leads)</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" title="User Roles"><span class="fa fa-users"> </span>User Roles</a>
                </li>
                <!-- <li>
                    <a href="setting.html" title="Setting"><span class="fa fa-gear"> </span>Settings</a>
                </li> -->

                <li class="xn-icon-button pull-right">
                    <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                </li>
                <!-- MESSAGES -->
                <li class="xn-icon-button pull-right"
                    style="margin-right:25px; min-width:100px; color:#FFFFFF; padding-top:20px;">
                    Welcome, Admin
                </li>

            </ul>
            <!-- END X-NAVIGATION -->

            <div class="page-content-wrap">
                <!-- <div class="page-content-wrap">
                 -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel-body" style="padding:1px 5px 2px 5px;">
                            <div class="col-md-12" style="margin-top:5px;">
                                <label
                                    style="color:#000; background-color:#FFCC00; width:7%; height:25px; padding-top:5px;margin-top: 1vh;"
                                    align="center"><span class="fa fa-desktop"></span> <strong>Masters</strong></label>

                                <!-- <label style="color:#db1212f3;font-size: large;" title="Dashboard"><i class="fa fa-desktop"></i></label> -->
                                <a href="#"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #993800;"><i
                                            class="fa fa-plus"></i>City</button>
                                </a>
                                <a href="#"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                            class="fa fa-plus"></i>Branch</button>
                                </a>

                                <a href="#"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #f0782e; "><i
                                            class="fa fa-plus"></i>Occupation</button>
                                </a>
                                <a href="#"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006b99;"><i
                                            class="fa fa-plus"></i>Layout Feature</button>
                                </a>

                                <a href="#"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #540338; "><i
                                            class="fa fa-plus"></i>Plot Sale Status</button>
                                </a>


                                <a href="#"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #035438; "><i
                                            class="fa fa-plus"></i>Transaction Type</button>
                                </a>
                                <a href="#"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #218dbb;"><i
                                            class="fa fa-plus"></i>Agent/Broker Registration</button>
                                </a>

                                <a href="#"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #540338; "><i
                                            class="fa fa-plus"></i>Employee Registration</button>
                                </a>
                                <a href="#"> <button id="on" type="button" class="btn mjks"
                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #8dd510; "><i
                                            class="fa fa-plus"></i>Customer Registration</button>
                                </a>
                                <!-- <a href="#"> <button id="on" type="button" class="btn mjks"
                    style="color:#FFFFFF; height:30px; width:auto;background-color: #bd2187; "><i
                    class="fa fa-plus"></i>Role Management</button>
                    </a>                   -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- </div> -->
                <div class="row">
                    <div class="col-md-12" style="margin-top: 2vh;">
                        <!-- <div class="panel panel-default" >
                           <div class="panel-body" > -->
                        <div class="col-md-4"></div>
                        <div class="col-md-2">
                            <label class="control-label">Add Transaction Type<font color="#FF0000">*</font></label>
                            <input type="text" class="form-control" name="name" placeholder="" />
                        </div>

                        <div class="col-md-1" style="margin-top:15px;">
                            <button id="on" type="button" class="btn mjks"
                                style="color:#FFFFFF; height:30px; width:auto;"> <i class="fa fa-plus"></i>ADD</button>

                        </div>
                    </div>
                    <!-- </div>
                     </div> -->

                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-5" style="margin-top:15px;">

                        <!-- START DEFAULT DATATABLE -->

                        <!-- <h5 class="panel-title" style="color:#FFFFFF; background-color:#754d35; width:100%; font-size:14px;" align="center"> <i class="fa fa-plus"></i> Added Party</h5> -->
                        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>

                                        <th>Added Transaction Type</th>

                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>

                                        <td>Cash</td>

                                        <td>

                                            <button
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Edit"><i class="fa fa-edit"
                                                    style="margin-left:5px;"></i></button>
                                            <button
                                                style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Delete"><i class="fa fa-trash-o"
                                                    style="margin-left:5px;"></i></button>
                                        </td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>

                        <!-- END DEFAULT DATATABLE -->


                    </div>
                    <div class="col-md-4"></div>
                </div>
            </div>

        </div>


        <!-- START DEFAULT DATATABLE -->


    </div>



    </div>

    <!-- PAGE CONTENT WRAPPER -->


    </div>
    <!-- END PAGE CONTENT -->
    </div>
    <!-- END PAGE CONTAINER -->

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
    <audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
    <audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
    <!-- END PRELOADS -->
    <!-- START SCRIPTS -->
    <script type="text/javascript" src="../../js/plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/jquery/jquery-ui.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap.min.js"></script>
    <!-- END PLUGINS -->
    <!-- THIS PAGE PLUGINS -->
    <script type='text/javascript' src='../../js/plugins/icheck/icheck.min.js'></script>
    <script type="text/javascript" src="../../js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-datepicker.js"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-timepicker.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-colorpicker.js"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-file-input.js"></script>
    <script type="text/javascript" src="../../js/plugins/bootstrap/bootstrap-select.js"></script>
    <script type="text/javascript" src="../../js/plugins/tagsinput/jquery.tagsinput.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/dropzone/dropzone.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/fileinput/fileinput.min.js"></script>
    <script type="text/javascript" src="../../js/plugins/filetree/jqueryFileTree.js"></script>
    <!-- END PAGE PLUGINS -->
    <!-- START TEMPLATE -->
    <script type="text/javascript" src="../../js/plugins.js"></script>
    <script type="text/javascript" src="../../js/actions.js"></script>
    <!-- END TEMPLATE -->


    <script>
        $(function () {
            $("#file-simple").fileinput({
                showUpload: false,
                showCaption: false,
                browseClass: "btn btn-danger",
                fileType: "any"
            });
            $("#filetree").fileTree({
                root: '/',

                expandSpeed: 100,
                collapseSpeed: 100,
                multiFolder: false
            }, function (file) {
                alert(file);
            }, function (dir) {
                setTimeout(function () {
                    page_content_onresize();
                }, 200);
            });
        });
    </script>
</body>

</html>
