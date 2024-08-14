@extends('frontend.layouts.header')

@section('main-container')
<!--end header -->
<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-12 mx-auto" style="padding-left:0px;">
                <div class="card">
                    <div class="card-body p-4" style="margin-left:0px; padding-left:0px;">
                        <h5 class="card-title"> Quiz</h5>
                        <hr />


                        <div class="card-body">
                            <ul class="nav nav-pills mb-3" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" data-bs-toggle="pill" href="#primary-pills-home"
                                        role="tab" aria-selected="true">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon">
                                            </div>
                                            <div class="tab-title">Added Quiz</div>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" data-bs-toggle="pill" href="#primary-pills-profile" role="tab"
                                        aria-selected="false">
                                        <div class="d-flex align-items-center">
                                            <div class="tab-icon">
                                            </div>
                                            <div class="tab-title">Add New Quiz</div>
                                        </div>
                                    </a>
                                </li>
                                <!-- <li class="nav-item" role="presentation">
											<a class="nav-link" data-bs-toggle="pill" href="#primary-pills-contact"
												role="tab" aria-selected="false">
												<div class="d-flex align-items-center">
													<div class="tab-icon">
													</div>
													<div class="tab-title">Upload Quiz</div>
												</div>
											</a>
										</li> -->
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="primary-pills-home" role="tabpanel">
                                    <div class="col-md-8" style="margin-left:%; width: 100%; margin-top: 10px;">

                                        <div class="card-body" style="padding-left: 0px;">
                                            <div class="tab-content py-3">
                                                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table id="example"
                                                                    class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Sr. No</th>
                                                                            <th>Thumbnail </th>
                                                                            <th>Title</th>


                                                                            <th>Facilitated by</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>

                                                                            <td>1</td>
                                                                            <td><img src="" alt="img"></td>
                                                                            <td>Devi Navaratri Quiz</td>
                                                                            <td>IndiYatra</td>
                                                                            <td>

                                                                                <button type="button"
                                                                                    class="btn1 btn-outline-success"
                                                                                    data-bs-toggle="modal"
                                                                                    data-bs-target="#exampleExtraLargeModal"><i
                                                                                        class='bx bx-show-alt me-0'
                                                                                        title="Preview"></i></button>
                                                                                <button type="button"
                                                                                    class="btn1 btn-outline-success"><i
                                                                                        class='bx bx-edit-alt me-0'
                                                                                        title="Edit Quiz"></i></button>
                                                                                <button type="button"
                                                                                    class="btn1 btn-outline-danger"
                                                                                    title="Delete Quiz"><i
                                                                                        class='bx bx-trash me-0'></i>
                                                                            </td>

                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="primaryprofile" role="tabpanel">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table id="example1"
                                                                    class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Sr.No.</th>
                                                                            <th>Completed</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>43</td>
                                                                            <td><button type="button"
                                                                                    class="btn1 btn-outline-success"><i
                                                                                        class='bx bx-edit-alt me-0'></i></button>
                                                                                <button type="button"
                                                                                    class="btn1 btn-outline-danger"><i
                                                                                        class='bx bx-trash me-0'></i></button>
                                                                            </td>

                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="primarycontact" role="tabpanel">
                                                    <div class="card">
                                                        <div class="card-body">
                                                            <div class="table-responsive">
                                                                <table id="example3"
                                                                    class="table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Sr. No.</th>
                                                                            <th>Cancelled</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td>23</td>
                                                                            <td><button type="button"
                                                                                    class="btn1 btn-outline-success"><i
                                                                                        class='bx bx-edit-alt me-0'></i></button>
                                                                                <button type="button"
                                                                                    class="btn1 btn-outline-danger"><i
                                                                                        class='bx bx-trash me-0'></i></button>
                                                                            </td>

                                                                        </tr>

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
                                <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
                                    <div class="col-md-12 mx-auto">

                                        <card>
                                            <div class="card-body"
                                                style="padding-left:0px; padding-top:0px; padding-bottom:0px;">
                                                <div class="form-body mt-0">
                                                    <div class="page-content"
                                                        style="padding-top:7px; padding-bottom:0px; padding-left:12px;">
                                                        <h5 class="card-title" style="margin-top:1%;">Add New
                                                            Quiz</h5>
                                                        <hr />
                                                        <div class="tab-pane fade show active" id="primaryhome"
                                                            role="tabpanel"></div>
                                                        <div class="col-md-12 mx-auto">

                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <div style="margin-top: 8px;">
                                                                            <label for="inputFirstName"
                                                                                class="form-label"
                                                                                style="margin-bottom:-5px">Thumbnail
                                                                                <span
                                                                                    style="color: red;">(370px*303px)</span></label>
                                                                            <input type="file" class="form-control"
                                                                                id="Caste">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4" style="margin-top:10px;">
                                                                    <div class="mb-3">
                                                                        <label for="inputProductTitle"
                                                                            class="form-label padding-bottom-11">
                                                                            Title</label>
                                                                        <input type="email" class="form-control"
                                                                            id="inputProductTitle" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4" style="margin-top:10px;">
                                                                    <div class="mb-3">
                                                                        <label for="inputProductTitle"
                                                                            class="form-label margin  padding-bottom-11">
                                                                            Facilitated By</label>
                                                                        <input type="email" class="form-control"
                                                                            id="inputProductTitle" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-md-3">
																			<div style="margin-top:2px; padding-left:0px; padding-top:25px;">
																				<button type="submit" class="btn btn-primary">Submit</button>

																			</div>
																		</div> -->

                                                                <!-- <div class="col-md-3">
																				<div class="mb-3">
																					<label for="inputProductDescription"
																						class="form-label">Auther</label>
																					<textarea class="form-control" id="inputProductDescription"
																						rows="1"></textarea>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="mb-3">
																					<label for="inputProductDescription"
																						class="form-label">Artist</label>
																					<textarea class="form-control" id="inputProductDescription"
																						rows="1"></textarea>
																				</div>
																			</div> -->

                                                            </div>

                                                            <div class="col-md-12 mx-auto">


                                                                <div class="mb-3" style="margin-top:2%;">

                                                                    <textarea id="main_description"
                                                                        name="main_description"></textarea>
                                                                </div>
                                                                <!-- <label class="form-label">Status</label>
																			<select class="form-select form-select-sm" style="width:150px;">
																				<option>Active</option>
																				<option>Inactive</option>

																			</select> -->
                                                                <!-- <div class="col-md-12" align="center">
																<div
																	style="margin-top:2px; padding-left:0px; padding-top:10px;">
																	<button type="submit"
																		class="btn btn-primary">Add</button>



																</div>
															</div> -->

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </card>

                                        <div class="col-md-12 mx-auto" style="padding-top:0px; padding-bottom:0px;">

                                            <div class="card-body"
                                                style="padding-left:0px; padding-top:0px; padding-bottom:0px;">
                                                <div class="tab-content" style="padding-top:0px; padding-bottom:0px;">
                                                    <div class="tab-pane fade show active" id="primaryhome"
                                                        role="tabpanel">

                                                        <div class="row width-1">
                                                            <div class="col-md-2">

                                                            </div>

                                                            <div class="col-md-2">

                                                            </div>
                                                            <div class="col-md-1">

                                                            </div>
                                                            <div class="col-md-1">

                                                            </div>
                                                            <div class="col-md-2"
                                                                style="width:172px; margin-left:20px;">

                                                                <a href="{{asset('public/frontend/assets/file.xlsx')}}"><button
                                                                        type="button" class="btn btn-dark"
                                                                        style="background-color: #0d6efd;"><i
                                                                            class='bx bx-cloud-upload mr-1'></i>Bulk
                                                                        Upload</button>
                                                                </a>
                                                            </div>
                                                            <div class="col-md-2" style="width:172px;">

                                                                <a href="{{asset('public/frontend/assets/file.xlsx')}}"><button
                                                                        type=" button" class="btn btn-dark"
                                                                        style="background-color: #0d6efd;"><i
                                                                            class='bx bx-cloud-download mr-1'></i>Sample
                                                                        File</button></a>
                                                            </div>
                                                        </div>




                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <!--end row-->
                                        <div class="card-body">

                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">Add Question</h5>
                                                    <hr />
                                                    <div class="form-body mt-2">
                                                        <div class="page-content"
                                                            style="padding-top:0px; padding-bottom:0px;">

                                                            <div class="col-md-12 mx-auto">

                                                                <div class="row">



                                                                    <div class="col-md-12">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductDescription"
                                                                                class="form-label padding-bottom-11">Question
                                                                                Text</label>
                                                                            <textarea class="form-control"
                                                                                id="inputProductDescription"
                                                                                rows="4"></textarea>
                                                                        </div>
                                                                    </div>




                                                                </div>

                                                            </div>

                                                            <div class="col-md-12 mx-auto">

                                                                <div class="card-body"
                                                                    style="padding-left:0px; padding-top:0px; padding-bottom:0px;">
                                                                    <div class="tab-content">
                                                                        <div class="tab-pane fade show active"
                                                                            id="primaryhome" role="tabpanel">

                                                                            <div class="row">



                                                                                <div class="col-md-2">
                                                                                    <div class="mb-3">
                                                                                        <label for="inputProductTitle"
                                                                                            class="form-label padding-bottom-11">
                                                                                            Option 1</label>
                                                                                        <input type="email"
                                                                                            class="form-control"
                                                                                            id="inputProductTitle"
                                                                                            placeholder="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-3">
                                                                                        <label for="inputProductTitle"
                                                                                            class="form-label padding-bottom-11">
                                                                                            Option 2</label>
                                                                                        <input type="email"
                                                                                            class="form-control"
                                                                                            id="inputProductTitle"
                                                                                            placeholder="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-3">
                                                                                        <label for="inputProductTitle"
                                                                                            class="form-label padding-bottom-11">
                                                                                            Option 3</label>
                                                                                        <input type="email"
                                                                                            class="form-control"
                                                                                            id="inputProductTitle"
                                                                                            placeholder="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-3">
                                                                                        <label for="inputProductTitle"
                                                                                            class="form-label padding-bottom-11">
                                                                                            Option 4</label>
                                                                                        <input type="email"
                                                                                            class="form-control"
                                                                                            id="inputProductTitle"
                                                                                            placeholder="">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-2">
                                                                                    <div class="mb-2">
                                                                                        <label
                                                                                            class="form-label padding-bottom-11">Right
                                                                                            Answer</label>
                                                                                        <select class="single-select">
                                                                                            <option
                                                                                                value="United States">
                                                                                                01
                                                                                            </option>
                                                                                            <option
                                                                                                value="United Kingdom">
                                                                                                02
                                                                                            </option>
                                                                                            <option
                                                                                                value="United Kingdom">
                                                                                                03
                                                                                            </option>
                                                                                            <option
                                                                                                value="United Kingdom">
                                                                                                04
                                                                                            </option>



                                                                                        </select>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="row" style="padding-left: 2%;">


                                                        <div class="col-md-12" style="padding-right:2%;">
                                                            <div class="mb-3">
                                                                <label for="inputProductDescription"
                                                                    class="form-label padding-bottom-11">Answer
                                                                    in
                                                                    brief</label>
                                                                <textarea class="form-control"
                                                                    id="inputProductDescription" rows="4"></textarea>
                                                            </div>

                                                        </div>




                                                    </div>

                                                    <div class="row" style="padding-left: 2%;">


                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-2"></div>
                                                        <div class="col-md-1"></div>
                                                        <div class="col-md-2" style="width:172px;">

                                                            <a href="""><button type=" button" class="btn btn-dark"
                                                                style="background-color: #0d6efd;">Add</button></a>
                                                        </div>


                                                    </div>





                                                </div>

                                            </div>
                                            <!-- <h6 class="mb-0 text-uppercase">Small tables</h6>
						                                <hr/> -->
                                            <div class="card">
                                                <div class="card-body">
                                                    <table class="table table-sm mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Sr.No.</th>
                                                                <th scope="col">Question Text</th>
                                                                <th scope="col">Option - 1</th>
                                                                <th scope="col">Option - 2</th>
                                                                <th scope="col">Option - 3</th>
                                                                <th scope="col">Option - 4</th>

                                                                <th scope="col">Right Option</th>
                                                                <th scope="col">Delete</th>


                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row">1</th>
                                                                <td>Story</td>
                                                                <td>Mouse</td>
                                                                <td>Cat</td>
                                                                <td>Cat</td>
                                                                <td>Cat</td>
                                                                <td>Cat</td>
                                                                <td><button type="button"
                                                                        class="btn1 btn-outline-success"
                                                                        data-bs-target="#exampleExtraLargeModal"><i
                                                                            class='bx bx-x me-0'
                                                                            title="Delete"></i></button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">2</th>
                                                                <td>Story</td>
                                                                <td>Mouse</td>
                                                                <td>Cat</td>
                                                                <td>Cat</td>
                                                                <td>Cat</td>

                                                                <td>Parrot</td>
                                                                <td><button type="button"
                                                                        class="btn1 btn-outline-success"
                                                                        data-bs-target="#exampleExtraLargeModal"><i
                                                                            class='bx bx-x me-0'
                                                                            title="Delete"></i></button>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <th scope="row">3</th>
                                                                <td>Story</td>
                                                                <td>Mouse</td>
                                                                <td>Cat</td>
                                                                <td>Cat</td>
                                                                <td>Cat</td>
                                                                <td>Parrot</td>
                                                                <td><button type="button"
                                                                        class="btn1 btn-outline-success"
                                                                        data-bs-target="#exampleExtraLargeModal"><i
                                                                            class='bx bx-x me-0'
                                                                            title="Delete"></i></button>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-md-12 mx-auto" style="padding-top:0px; padding-bottom:0px;">

                                                <div class="card-body"
                                                    style="padding-left:0px; padding-top:0px; padding-bottom:0px;">
                                                    <div class="tab-content"
                                                        style="padding-top:0px; padding-bottom:0px;">
                                                        <div class="tab-pane fade show active" id="primaryhome"
                                                            role="tabpanel">

                                                            <div class="row width-1">

                                                                <div class="col-md-2">

                                                                </div>
                                                                <div class="col-md-2">

                                                                </div>


                                                                <div class="col-md-2" style="width:172px;">

                                                                    <a href=""><button type="button"
                                                                            class="btn btn-dark"
                                                                            style="background-color: #0d6efd;">Submit</button>
                                                                    </a>
                                                                </div>

                                                            </div>




                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="primary-pills-contact" role="tabpanel">
                                    <div class="page-content" style="padding-top:0px; padding-left: 12px;">
                                        <div class="row">
                                            <div class="col-md-12 mx-auto">
                                                <div class="card">
                                                    <div class="card-body" style="padding-left:0px;">


                                                        <h5 class="card-title" style="margin-left:2%;">Add
                                                            Question</h5>
                                                        <hr />
                                                        <div class="form-body mt-4">
                                                            <div class="page-content" style="padding-top:0px;">

                                                                <div class="col-md-12 mx-auto">

                                                                    <div class="row">

                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">

                                                                                <label for="inputFirstName"
                                                                                    class="form-label padding-bottom-11"
                                                                                    style="margin-bottom:px">Image
                                                                                    <span
                                                                                        style="color: red;">(370px*303px)</span></label>
                                                                                <input type="file" class="form-control"
                                                                                    id="Caste">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">
                                                                                <label for="inputProductTitle"
                                                                                    class="form-label padding-bottom-11">
                                                                                    Title</label>
                                                                                <input type="email" class="form-control"
                                                                                    id="inputProductTitle"
                                                                                    placeholder="">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">
                                                                                <label for="inputProductTitle"
                                                                                    class="form-label padding-bottom-11">
                                                                                    Question Text</label>
                                                                                <input type="email" class="form-control"
                                                                                    id="inputProductTitle"
                                                                                    placeholder="">
                                                                            </div>
                                                                        </div>





                                                                    </div>

                                                                </div>

                                                                <div class="col-md-12 mx-auto">


                                                                    <div class="col-md-12 mx-auto">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <div class="mb-3">
                                                                                    <label for="inputProductTitle"
                                                                                        class="form-label padding-bottom-11">
                                                                                        Option 1</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="inputProductTitle"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-2">
                                                                                <div class="mb-3">
                                                                                    <label for="inputProductTitle"
                                                                                        class="form-label padding-bottom-11">
                                                                                        Option 2</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="inputProductTitle"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <div class="mb-3">
                                                                                    <label for="inputProductTitle"
                                                                                        class="form-label padding-bottom-11">
                                                                                        Option 3</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="inputProductTitle"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <div class="mb-3">
                                                                                    <label for="inputProductTitle"
                                                                                        class="form-label padding-bottom-11">
                                                                                        Option 4</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="inputProductTitle"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2">

                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label padding-bottom-11">Right
                                                                                        Answer</label>
                                                                                    <select class="single-select">
                                                                                        <option value="United States">
                                                                                            01
                                                                                        </option>
                                                                                        <option value="United Kingdom">
                                                                                            02
                                                                                        </option>
                                                                                        <option value="United Kingdom">
                                                                                            03
                                                                                        </option>
                                                                                        <option value="United Kingdom">
                                                                                            04
                                                                                        </option>



                                                                                    </select>
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-2">
                                                                                <!-- <div class="mb-3">
																											<label for="inputProductDescription"
																												class="form-label">Answer Text</label>
																											<textarea class="form-control"
																												id="inputProductDescription"
																												rows="1"></textarea>
																										</div> -->
                                                                            </div>


                                                                            <!-- <div class="col-md-3">
																										<div class="mb-3">
																											<label for="inputProductDescription"
																												class="form-label">Auther</label>
																											<textarea class="form-control" id="inputProductDescription"
																												rows="1"></textarea>
																										</div>
																									</div>
																									<div class="col-md-3">
																										<div class="mb-3">
																											<label for="inputProductDescription"
																												class="form-label">Artist</label>
																											<textarea class="form-control" id="inputProductDescription"
																												rows="1"></textarea>
																										</div>
																									</div> -->


                                                                        </div>

                                                                        <div class="row" style="padding-left: %;">


                                                                            <div class="col-md-12">
                                                                                <div class="mb-3">
                                                                                    <label for="inputProductDescription"
                                                                                        class="form-label padding-bottom-11">Answer
                                                                                        Text</label>
                                                                                    <textarea class="form-control"
                                                                                        id="inputProductDescription"
                                                                                        rows="4"></textarea>
                                                                                </div>

                                                                            </div>



                                                                        </div>
                                                                        <div class="row" style="padding-left: 2%;">


                                                                            <div class="col-md-2"></div>
                                                                            <div class="col-md-2"></div>
                                                                            <div class="col-md-1"></div>
                                                                            <div class="col-md-2" style="width:172px;">

                                                                                <a href=""><button type=" button"
                                                                                        class="btn btn-dark"
                                                                                        style="background-color: #0d6efd;">Add</button></a>
                                                                            </div>


                                                                        </div>





                                                                        <!-- <label class="form-label">Status</label>
																								<select class="form-select form-select-sm" style="width:150px;">
																									<option>Active</option>
																									<option>Inactive</option>

																								</select> -->
                                                                        <!-- <div class="col-md-12" align="center">
																									<div
																										style="margin-top:2px; padding-left:0px; padding-top:10px;">
																										<button type="submit"
																											class="btn btn-primary">Add</button>

																									</div>
																								</div> -->
                                                                    </div>

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <script>
                                                    $('#main_description').summernote({
																placeholder: 'Write  Here',
																tabsize: 2,
																height: 120,
																toolbar: [
																	['style', ['style']],
																	['font', ['bold', 'underline', 'clear']],
																	['color', ['color']],
																	['para', ['ul', 'ol', 'paragraph']],
																	['table', ['table']],
																	['insert', ['link', 'picture', 'video']],
																	['view', ['fullscreen', 'codeview', 'help']]
																]
															});
                                                </script>
                                            </div>
                                        </div>



                                        <script>
                                            $('#main_description').summernote({
														placeholder: 'Write  Here',
														tabsize: 2,
														height: 120,
														toolbar: [
															['style', ['style']],
															['font', ['bold', 'underline', 'clear']],
															['color', ['color']],
															['para', ['ul', 'ol', 'paragraph']],
															['table', ['table']],
															['insert', ['link', 'picture', 'video']],
															['view', ['fullscreen', 'codeview', 'help']]
														]
													});
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">


                    <!-- Modal -->
                    <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="container">
                                    <div class="col-md-12 mx-auto">

                                        <card>
                                            <div class="card-body"
                                                style="padding-left:0px; padding-top:0px; padding-bottom:0px;">
                                                <div class="form-body mt-0">
                                                    <div class="page-content"
                                                        style="padding-top:7px; padding-bottom:0px; padding-left:12px;">
                                                        <h5 class="card-title" style="margin-top:1%;">Preview
                                                        </h5>
                                                        <hr />
                                                        <div class="tab-pane fade show active" id="primaryhome"
                                                            role="tabpanel"></div>
                                                        <div class="col-md-12 mx-auto">

                                                            <div class="row">

                                                                <div class="col-md-2" style="margin-top:1%;">
                                                                    <div class="mb-3">
                                                                        <div style="margin-top: 8px;">
                                                                            <img src="{{asset('public/frontend/assets/images/about-us.png')}}"
                                                                                style="height:50px;" alt="">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4" style="margin-top:10px;">
                                                                    <div class="mb-3">
                                                                        <label for="inputProductTitle"
                                                                            class="form-label padding-bottom-11">
                                                                            Title</label>
                                                                        <input type="email" class="form-control"
                                                                            id="inputProductTitle" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4" style="margin-top:10px;">
                                                                    <div class="mb-3">
                                                                        <label for="inputProductTitle"
                                                                            class="form-label margin  padding-bottom-11">
                                                                            Facilitated By</label>
                                                                        <input type="email" class="form-control"
                                                                            id="inputProductTitle" placeholder="">
                                                                    </div>
                                                                </div>
                                                                <!-- <div class="col-md-3">
																			<div style="margin-top:2px; padding-left:0px; padding-top:25px;">
																				<button type="submit" class="btn btn-primary">Submit</button>

																			</div>
																		</div> -->

                                                                <!-- <div class="col-md-3">
																				<div class="mb-3">
																					<label for="inputProductDescription"
																						class="form-label">Auther</label>
																					<textarea class="form-control" id="inputProductDescription"
																						rows="1"></textarea>
																				</div>
																			</div>
																			<div class="col-md-3">
																				<div class="mb-3">
																					<label for="inputProductDescription"
																						class="form-label">Artist</label>
																					<textarea class="form-control" id="inputProductDescription"
																						rows="1"></textarea>
																				</div>
																			</div> -->

                                                            </div>

                                                            <div class="col-md-12 mx-auto">



                                                                <!-- <label class="form-label">Status</label>
																			<select class="form-select form-select-sm" style="width:150px;">
																				<option>Active</option>
																				<option>Inactive</option>

																			</select> -->
                                                                <!-- <div class="col-md-12" align="center">
																<div
																	style="margin-top:2px; padding-left:0px; padding-top:10px;">
																	<button type="submit"
																		class="btn btn-primary">Add</button>



																</div>
															</div> -->

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </card>


                                        <div class="card-body">


                                            <div class="card-body">
                                                <h5 class="card-title" style="margin-left:2%;">Add Question</h5>
                                                <hr />
                                                <div class="form-body mt-2">
                                                    <div class="page-content"
                                                        style="padding-top:0px; padding-bottom:0px;">

                                                        <div class="col-md-12 mx-auto">

                                                            <div class="row">



                                                                <div class="col-md-12">
                                                                    <div class="mb-3">
                                                                        <label for="inputProductDescription"
                                                                            class="form-label padding-bottom-11">Question
                                                                            Text</label>
                                                                        <textarea class="form-control"
                                                                            id="inputProductDescription"
                                                                            rows="4"></textarea>
                                                                    </div>
                                                                </div>




                                                            </div>

                                                        </div>

                                                        <div class="col-md-12 mx-auto">

                                                            <div class="card-body"
                                                                style="padding-left:0px; padding-top:0px; padding-bottom:0px;">
                                                                <div class="tab-content">
                                                                    <div class="tab-pane fade show active"
                                                                        id="primaryhome" role="tabpanel">

                                                                        <div class="row">



                                                                            <div class="col-md-2">
                                                                                <div class="mb-3">
                                                                                    <label for="inputProductTitle"
                                                                                        class="form-label padding-bottom-11">
                                                                                        Option 1</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="inputProductTitle"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <div class="mb-3">
                                                                                    <label for="inputProductTitle"
                                                                                        class="form-label padding-bottom-11">
                                                                                        Option 2</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="inputProductTitle"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <div class="mb-3">
                                                                                    <label for="inputProductTitle"
                                                                                        class="form-label padding-bottom-11">
                                                                                        Option 3</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="inputProductTitle"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-2">
                                                                                <div class="mb-3">
                                                                                    <label for="inputProductTitle"
                                                                                        class="form-label padding-bottom-11">
                                                                                        Option 4</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="inputProductTitle"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>

                                                                            <div class="col-md-2">
                                                                                <div class="mb-3">
                                                                                    <label for="inputProductTitle"
                                                                                        class="form-label padding-bottom-11">
                                                                                        Right
                                                                                        Answer</label>
                                                                                    <input type="email"
                                                                                        class="form-control"
                                                                                        id="inputProductTitle"
                                                                                        placeholder="">
                                                                                </div>
                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>



                                                </div>
                                                <div class="row" style="padding-left: 2%;">


                                                    <div class="col-md-12" style="padding-right:2%;">
                                                        <div class="mb-3">
                                                            <label for="inputProductDescription"
                                                                class="form-label padding-bottom-11">Answer
                                                                in
                                                                brief</label>
                                                            <textarea class="form-control" id="inputProductDescription"
                                                                rows="4"></textarea>
                                                        </div>

                                                    </div>




                                                </div>






                                            </div>

                                        </div>

                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>

                                </div>
                            </div>




                        </div>
                    </div>
                </div>
            </div>


        </div>

        @stop
        @section('js')
        <script>
            $(document).ready(function() {
                $(document).on('click', '.viewinfo', function() {
                    var entry_id = $(this).attr('id');
                    $("#appendbody").empty();
                    $.ajax({
                        url: 'getQuizDetails',
                        type: 'get',
                        data: {
                            entry_id: entry_id
                            // summary_id:summary_id
                        },
                        dataType: 'json',
                        success: function(data) {
                            $("#appendbody").html(data);
                        }
                    });
                });


            })
        </script>
        @stop
