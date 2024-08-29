@extends('panel.layout.user_model_layout')
@section('main_container')
<<<<<<< refs/remotes/origin/shiba
=======
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <style>
        a {
            text-decoration: none;
        }

        .popover__title {
            font-size: 14px;
            line-height: 2px;
            text-decoration: none;
            color: rgb(0, 0, 0);
            text-align: center;
            padding: 0px 0;
        }

        .popover__wrapper {
            position: relative;
            margin-top: 1vh;
            display: inline-block;
        }

        .popover__content {
            opacity: 0;
            visibility: hidden;
            position: absolute;
            left: -40px;
            transform: translate(0, 10px);
            background-color: #fcfcfc;
            padding: 1rem;
            box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
            width: 250%;
        }

        .popover__content:before {
            position: absolute;
            z-index: 100;
            content: "";
            right: calc(50% - 10px);
            top: -8px;
            border-style: solid;
            border-width: 0 10px 10px 10px;
            border-color: transparent transparent #bfbfbf transparent;
            transition-duration: 0.3s;
            transition-property: transform;
        }

        .popover__wrapper:hover .popover__content {
            z-index: 100;
            opacity: 1;
            visibility: visible;
            transform: translate(0, -20px);
            transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
        }


        .modal1 {
            background: rgba(255, 255, 255, 0.7);
            position: fixed;
            width: 100%;
            height: 50%;
            top: 0px;
            left: 0px;
            bottom: 0px;
            transition: all .5s ease-in-out;
            opacity: 0;
            z-index: -1;
        }
    </style>
    <!-- END X-NAVIGATION -->

    <!-- <div class="page-content-wrap">
                                                                     <div class="row">
                                                                                <div class="col-md-12">

                                                                                       <div class="panel-body" style="padding:1px 5px 2px 5px;">

                                                                                                <div class="col-md-12" style="margin-top:5px;">
                                                                                    <label style="color:#000; background-color:#FFCC00; width:7%; height:25px; padding-top:5px;margin-top: 1vh;" align="center"><span class="fa fa-desktop"></span> <strong>Dashboard</strong></label>


                                                                                                    <a href="project_entry.html"> <button id="on" type="button" class="btn mjks"
                                                                                                        style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                                                                                            class="fa fa-plus"></i>Project Entry</button>
                                                                                                </a>
                                                                                                <a href="#"> <button id="on" type="button" class="btn mjks"
                                                                                                    style="color:#FFFFFF; height:30px; width:auto;background-color: #990066;"><i
                                                                                                        class="fa fa-plus"></i>Enquiry</button>
                                                                                            </a>

                                                                                                  </div>

                                                                                        </div>
                                                                                    </div>
                                                                                    </div>


                                                                            </div> -->


    {{-- --------------------------------------------------- --}}

    <div class="row">
        <!-- <div class="col-md-3"></div> -->
        <div class="col-md-12" style="margin-top:15px;">

            <!-- START DEFAULT DATATABLE -->

            <!-- <h5 class="panel-title" style="color:#FFFFFF; background-color:#754d35; width:100%; font-size:14px;" align="center"> <i class="fa fa-plus"></i> Added Party</h5> -->

            <div class="col-md-12" style="text-align: center;margin-top: 5px;">
                <h6 class="panel-title"
                    style="color:#FFFFFF; background-color:#1681b6; width:100%;height: 50%; font-size:16px;" align="center">
                    <i class="fa fa-file-text"> &nbsp;<label style="margin: 7px;">Customer Details</label> </i>
                </h6>
>>>>>>> local



<!-- END X-NAVIGATION -->

<!-- <div class="page-content-wrap">
             <div class="row">
                        <div class="col-md-12">

                               <div class="panel-body" style="padding:1px 5px 2px 5px;">

                                        <div class="col-md-12" style="margin-top:5px;">
                            <label style="color:#000; background-color:#FFCC00; width:7%; height:25px; padding-top:5px;margin-top: 1vh;" align="center"><span class="fa fa-desktop"></span> <strong>Dashboard</strong></label>


                                            <a href="project_entry.html"> <button id="on" type="button" class="btn mjks"
                                                style="color:#FFFFFF; height:30px; width:auto;background-color: #006699;"><i
                                                    class="fa fa-plus"></i>Project Entry</button>
                                        </a>
                                        <a href="#"> <button id="on" type="button" class="btn mjks"
                                            style="color:#FFFFFF; height:30px; width:auto;background-color: #990066;"><i
                                                class="fa fa-plus"></i>Enquiry</button>
                                    </a>

                                          </div>

                                </div>
                            </div>
                            </div>


                    </div> -->


{{-- --------------------------------------------------- --}}

<div class="row">
    <!-- <div class="col-md-3"></div> -->
    <div class="col-md-12" style="margin-top:15px;">

        <!-- START DEFAULT DATATABLE -->

        <!-- <h5 class="panel-title" style="color:#FFFFFF; background-color:#754d35; width:100%; font-size:14px;" align="center"> <i class="fa fa-plus"></i> Added Party</h5> -->

        <div class="col-md-12" style="text-align: center;margin-top: 5px;">
            <h6 class="panel-title"
                style="color:#FFFFFF; background-color:#1681b6; width:100%;height: 50%; font-size:16px;" align="center">
                <i class="fa fa-file-text"> &nbsp;<label style="margin: 7px;">Customer Details</label> </i>
            </h6>

        </div>
<<<<<<< refs/remotes/origin/shiba

        <div style="margin-top: 50px"></div>

        <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
            @auth
            <table class="table datatable">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        @php
                        $index=0;
                        @endphp
                        <td>{{ $index + 1 }}</td> {{-- Ensure that these attributes exist on the authenticated user
                        object --}}
                        <td>{{ auth()->user()->name ?? '' }}</td>
                        <td>{{ auth()->user()->email ?? '' }}</td>
                        <td>{{ auth()->user()->contact ?? '' }}</td> <!-- Handle optional attributes -->
                        <td>{{ auth()->user()->role ?? '' }}</td> <!-- Handle optional attributes -->
                    </tr>
                </tbody>
            </table>
            @else
            <div class="alert alert-warning text-center">
                <strong>Please log in to view the data.</strong>
            </div>
            @endauth
        </div>

        <!-- END DEFAULT DATATABLE -->


    </div>
    <div class="col-md-4"></div>
</div>


{{-- ---------------------------------------------------- --}}
</div>


<!-- START DEFAULT DATATABLE -->
=======
        <div class="col-md-4"></div>
    </div>
    </div>
>>>>>>> local


</div>



</div>

<!-- PAGE CONTENT WRAPPER -->


</div>
<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->


@endsection