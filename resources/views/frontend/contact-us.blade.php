@extends('frontend.layouts.header')

@section('main-container')


<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-10 mx-auto">


                <h5 class="card-title">Contact Us</h5>
                <hr />
                @if(session('success1'))
                <div class="alert alert-success">
                    {{ session('success1') }}
                </div>
                @endif
                <div class="col-md-12" style="margin-left: 2%; width: 96%;margin-top: -10px;">

                    <div class="card-body">
                        <div class="tab-content py-3">
                            <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table id="example" class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Sr. No</th>
                                                        <th>Full Name</th>
                                                        <th>Email</th>
                                                        <th>Phone No.</th>


                                                        <th>Message</th>
                                                        <th>Action</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ( $contactus as $contactus )
                                                    <tr>




                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td>{{ $contactus->username }}</td>
                                                        <td>{{ $contactus->email }}</td>
                                                        <td>{{ $contactus->number }}</td>

                                                        <td>{{ $contactus->message }} </td>
                                                        <td>

                                                            <form id="deleteContactForm"
                                                                action="{{ route('user.deleteContactUs', ['id' => $contactus->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')

                                                                <button type="button" class="btn1 btn-outline-danger"
                                                                    title="Delete Contact"
                                                                    onclick="openCustomModal('{{ route('user.deleteContactUs', ['id' => $contactus->id]) }}')">
                                                                    <i class='bx bx-trash me-0'></i>
                                                                </button>
                                                            </form>
                                                        </td>


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
                <!--end row-->
            </div>
        </div>
    </div>

</div>
</div>



</div>




@endsection