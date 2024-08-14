@extends('frontend.layouts.header')

@section('main-container')

<!--end header -->
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content" style="margin-right: 100px;">
        <div class="row">
            <div class="col-md-12 mx-auto">


                <h5 class="card-title">Write For Us</h5>
                <hr />
                @if(session('success1'))
                <div class="alert alert-success">
                    {{ session('success1') }}
                </div>
                @endif
                <div class="col-md-12" style=" width: 100%;margin-top: -10px;">

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
                                                        <!-- <th>Document</th> -->

                                                        <th>Message</th>

                                                        <th>Action</th>


                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        @foreach($WriteForUs as $WriteForUs)



                                                        <td>{{ $loop->index+1 }}</td>
                                                        <td>{{ $WriteForUs->username}}</td>
                                                        <td>{{ $WriteForUs->email}}</td>
                                                        <td>{{ $WriteForUs->number}}</td>
                                                        <!-- <td><img src="assets/images/documents.png"
																		style="height:25px;" alt=""></td> -->
                                                        <td>{{ $WriteForUs->message}} </td>

                                                        <td>
                                                            <div style="display:flex;">
                                                                <div>

                                                                    <a href="{{asset('public/images/' . $WriteForUs->image) }}"
                                                                        download>
                                                                        <button type="button"
                                                                            class="btn1 btn-outline-success"
                                                                            title="Download Document">
                                                                            <i class='bx bx-download me-0'></i>
                                                                        </button>
                                                                    </a>

                                                                </div>
                                                                <div>
                                                                    <form
                                                                        action="{{ route('user.deletewriteForUs', ['id' => $WriteForUs->id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('DELETE')

                                                                        <button type="button"
                                                                            class="btn1 btn-outline-danger"
                                                                            title="Delete Contact"
                                                                            onclick="openCustomModal('{{ route('user.deletewriteForUs', ['id' => $WriteForUs->id]) }}')">
                                                                            <i class='bx bx-trash me-0'></i>
                                                                        </button>
                                                                    </form>
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


                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>

</div>
</div>


<!-- <div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">No.of Documents</p>
										<h4 class="my-1">59K</h4>
										<p class="mb-0 font-13 text-danger">
									</div>
									<div class="widgets-icons bg-light-danger text-danger ms-auto"><i
											class='bx bxs-layer'></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0 text-secondary">No.of Banners</p>
										<h4 class="my-1">34k</h4>
										<p class="mb-0 font-13 text-danger">
									</div>
									<div class="widgets-icons bg-light-warning text-warning ms-auto"><i
											class='bx bx-check-square'></i>
									</div>
								</div>
							</div>
						</div> -->

</div>



<!--end page wrapper -->
<!--start overlay-->
