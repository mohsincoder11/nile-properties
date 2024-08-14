@extends('frontend.layouts.header')

@section('main-container')
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-5">

            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Total Users</p>
                                <h4 class="my-1">{{$totalUsersCount}}</h4>
                                <!-- <p class="mb-0 font-13 text-success"><i
												class='bx bxs-up-arrow align-middle'></i>14% Since last week</p> -->
                            </div>
                            <div class="widgets-icons bg-light-warning text-warning ms-auto"><i
                                    class='bx bx-user-circle'></i>
                            </div>
                        </div>
                        <!-- <div id="chart2"></div> -->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Stories Uploaded</p>
                                <h4 class="my-1">{{$Stories}}</h4>
                                <!-- <p class="mb-0 font-13 text-danger"><i
												class='bx bxs-down-arrow align-middle'></i>12.4% Since last week</p> -->
                            </div>
                            <div class="widgets-icons bg-light-danger text-danger ms-auto"><i
                                    class='bx bx-archive-out'></i>
                            </div>
                        </div>
                        <!-- <div id="chart3"></div> -->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Collaborators</p>
                                <h4 class="my-1">{{$Collaborators}}</h4>
                                <!-- <p class="mb-0 font-13 text-danger"><i
												class='bx bxs-down-arrow align-middle'></i>12.4% Since last week</p> -->
                            </div>
                            <div class="widgets-icons bg-light-danger text-danger ms-auto"><i class='bx bx-user'></i>
                            </div>
                        </div>
                        <!-- <div id="chart3"></div> -->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Quiz</p>
                                <h4 class="my-1">{{$Quiz}}</h4>
                                <!-- <p class="mb-0 font-13 text-danger"><i
												class='bx bxs-down-arrow align-middle'></i>12.4% Since last week</p> -->
                            </div>
                            <div class="widgets-icons bg-light-danger text-danger ms-auto"><i
                                    class='bx bx-shape-circle'></i>
                            </div>
                        </div>
                        <!-- <div id="chart3"></div> -->
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card radius-10">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="mb-0 text-secondary">Meets</p>
                                <h4 class="my-1">{{$Meet}}</h4>
                                <!-- <p class="mb-0 font-13 text-success"><i
												class='bx bxs-up-arrow align-middle'></i>$34 Since last week</p> -->
                            </div>
                            <div class="widgets-icons bg-light-success text-success ms-auto"><i class='bx bx-group'></i>
                            </div>
                        </div>
                        <!-- <div id="chart1"></div> -->
                    </div>
                </div>
            </div>

        </div>
        <!--end row-->
        <h6 class="mb-0 text-uppercase" style="margin-top:1%;">All Users</h6>
        <hr />
        <div class="col-md-12" style=" width: 100%;margin-top:px;">

            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="d-flex justify-content-end mb-3">

                                    </div>
                                    <table id="example3" class="table table-striped table-bordered">
                                        <thead>

                                            <tr>
                                                <th>Sr. No</th>
                                                <th>Name</th>

                                                <th>Email</th>

                                                <th>Mobile No.</th>


                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($users as $item)
                                            @if (in_array($item->role, ['user']))
                                            <tr>




                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->name }}</td>


                                                <td>{{ $item->email }}</td>

                                                <td>{{ $item->number }}</td>






                                            </tr>
                                            @endif
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@stop
@section('js')
{{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
{{-- <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script> --}}
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
{{-- <script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script> --}}
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example3').DataTable({
            dom: 'Blfrtip',
            buttons: [
                { extend: 'excel', className: 'very-small-button' },
                { extend: 'pdf', className: 'very-small-button' }
            ],
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]]
        });
    });
</script>
<style>
    .very-small-button {
        font-size: 16px;
        margin-top: -25px;
        padding: 2px 6px !important;


    }

    #example3 {
        border-collapse: collapse;
        width: 100%;
    }

    #example3 th,
    #example3 td {
        border: 1px solid #e0e0e0;
        /* Adjust the border color as needed */
        padding: 8px;
        /* Adjust the cell padding as needed */
        text-align: left;
    }

    #example3 th {
        background-color: #ffffff;
        /* Adjust the background color of header cells as needed */
    }
</style>
@stop