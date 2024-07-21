@extends('frontend.layouts.header')

@section('main-container')
<!--start page wrapper -->
<div class="page-wrapper" style="margin-left:6%;">
    <!--end row-->
    <h6 class="mb-0 text-uppercase" style="margin-top:6%;">All Users Feedback</h6>
    <hr />
    <div class="col-md-8" style=" width: 100%;margin-top:px;">

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
                                            <th>Username</th>
                                            <th>Message</th>

                                            <th>Feedback</th>




                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach ($feedback as $item)

                                        <tr>



                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->UsernameByuser_id->name }}</td>
                                            <td>{{ $item->message }}</td>
                                            @if($item->happysad_hidden_value == 0)
                                            <td>
                                                <img src="public/images1/face1.png" class="img-fluid rounded-circle"
                                                    alt="" width="50" height="50">
                                            </td>
                                            @else
                                            <td>
                                                <img src="public/images1/face5.png" style="margin-left: 5px;"
                                                    class="img-fluid rounded-circle" alt="" width="50" height="50">
                                            </td>
                                            </td>
                                            @endif






                                        </tr>

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
