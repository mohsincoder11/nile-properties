@extends('panel.layout.header')

@section('main_container')
    <style>
        a {
            text-decoration: none;
        }

        .popover__title {
            font-size: 14px;
            line-height: 36px;
            text-decoration: none;
            color: rgb(0, 0, 0);
            text-align: center;
            padding: 15px 0;
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
    <div class="page-content-wrap">
        <div class="row">

            <div class="col-md-12" style="margin-top:5px;">
                <div class="panel panel-default">
                    <h5 class="panel-title"
                        style="color:#FFFFFF; background-color:#006699; width:100%; font-size:14px;margin-top: 1vh;"
                        align="center">
                        <i class="fa fa-list"></i> &nbsp;New Sale
                    </h5>



                </div>

            </div>

        </div>
    </div>

    <!-- START DEFAULT DATATABLE -->
    <div class="row">

        <div class="panel panel-default">
            @include('panel.plot-sale-header')

            <div class="col-md-12" style="margin-top:5px;">

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="panel-body" style="margin-bottom:15px;">
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th>Sr. No.</th>
                                <th>Customer Details</th>
                                <th>Property Details</th>
                                <th>Source</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($inquery as $key => $inquiry)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td>
                                        @foreach ($inquiry->clients as $item)
                                            <div class="popover__wrapper">
                                                <a href="#">
                                                    <h2 class="popover__title">{{ $item->name ?? '' }}</h2>
                                                </a>
                                                <div class="popover__content">
                                                    <div class="modal-area">
                                                        <p>Address: {{ $item->address ?? '' }}<br>
                                                            Mobile No. : {{ $item->phone ?? '' }}<br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </td>
                                    <td>
                                        <div class="popover__wrapper">
                                            <a href="#">
                                                <h2 class="popover__title">{{ $inquiry->square_ft ?? '' }} sq ft</h2>
                                            </a>
                                            <div class="popover__content">
                                                <div class="modal-area">
                                                    <p>Open space<br>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        @if (!empty($inquiry->employee->name))
                                            <div class="popover__wrapper">
                                                <a href="#">
                                                    <h2 class="popover__title">{{ $inquiry->employee->name }}</h2>
                                                </a>
                                                <div class="popover__content">
                                                    <div class="modal-area">
                                                        <p>Address: {{ $inquiry->employee->address ?? '' }}<br>
                                                            Mobile No. : {{ $inquiry->employee->contact_number ?? '' }}<br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif(!empty($inquiry->agent->name))
                                            <div class="popover__wrapper">
                                                <a href="#">
                                                    <h2 class="popover__title">{{ $inquiry->agent->name }}</h2>
                                                </a>
                                                <div class="popover__content">
                                                    <div class="modal-area">
                                                        <p>Address: {{ $inquiry->agent->address ?? '' }}<br>
                                                            Mobile No. : {{ $inquiry->agent->contact_number ?? '' }}<br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="popover__wrapper">
                                                <a href="#">
                                                    <h2 class="popover__title">Direct Source :</h2>
                                                </a>
                                                <div class="popover__content">
                                                    <div class="modal-area">
                                                        <p>YES<br>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </td>
                                    <td>
                                        <button
                                            style="background-color:#1abc3d; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                            type="button" class="btn btn-info view-details-btn" data-toggle="tooltip"
                                            data-placement="top" title="View" data-id="{{ $inquiry->id }}">
                                            <i class="fa fa-eye" style="margin-left:5px;"></i>
                                        </button>
                                        <a href="{{ route('newsale_edit', $inquiry->id) }}">
                                            <button
                                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="button" class="btn btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Edit">
                                                <i class="fa fa-edit" style="margin-left:5px;"></i>
                                            </button>
                                        </a>
                                        <form action="{{ route('newsale_delete', $inquiry->id) }}" method="POST"
                                            onsubmit="return confirm('Are you sure you want to delete this enquiry?');"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button
                                                style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                                type="submit" class="btn btn-info" data-toggle="tooltip"
                                                data-placement="top" title="Delete">
                                                <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                                            </button>
                                        </form>
                                        <div class="btn-group" role="group">
                                            <button id="btnGroupDrop1" type="button"
                                                class="btn btn-secondary dropdown-toggle" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-exchange" style="margin-left:5px;"></i>
                                                Plot Transfer
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                                <a class="dropdown-item"
                                                    href="{{ route('plot.transfer', [$inquiry->id, 1]) }}">Transfer User
                                                    From Plot X to Y</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('plot.transfer', [$inquiry->id, 2]) }}">Transfer Plot
                                                    From User X to Y</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>



            </div>

        </div>
    </div>
    <div class="modal" id="popup3" tabindex="-1" role="dialog" aria-labelledby="largeModalHead"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                    </button>
                    <h4 class="modal-title" id="H4">Initiated Sale</h4>
                </div>
                <div class="modal-body" id="appendbody">

                </div>
                <div class="modal-footer" style="border: none !important; background-color: #fff !important">
                    <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                </div>
            </div>
        </div>
    </div>

@stop

@section('js')
    <script>
        $(document).on('click', '.view-details-btn', function() {
            $("#popup3").modal({
                backdrop: "static",
                keyboard: false,
            });
            var inquiryId = $(this).data('id'); // Get the data-id value
            $("#appendbody").empty();
            $.ajax({
                url: '{{ route('inquiry.details') }}',
                type: 'get',
                data: {
                    id: inquiryId
                },
                dataType: 'json',
                success: function(data) {
                    if (data.html) {
                        $("#appendbody").html(data.html);
                    } else if (data.error) {
                        $("#appendbody").html('<p>' + data.error + '</p>');
                    }
                },
                error: function() {
                    $("#appendbody").html('<p>An error occurred while fetching the details.</p>');
                }
            });
        });
    </script>
@stop
