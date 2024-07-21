@extends('frontend.layouts.header')

@section('main-container')
<!--end header -->
<!--start page wrapper -->
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



                            <div class="tab-content" id="pills-tabContent">

                                <form action="{{ route('QuizUpdate', ['id' => $Quiz]) }}" method="post"
                                    enctype="multipart/form-data"> @csrf
                                    <div class="tab-pane fade active show" id="primary-pills-profile" role="tabpanel">
                                        <div class="col-md-12 mx-auto">
                                            {{-- ================================================== upload quiz section
                                            start ======================================= --}}
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


                                                                    <div class="col-md-3">
                                                                        <div class="mb-3">
                                                                            <div style="margin-top: 16px;">
                                                                                <label for="inputFirstName"
                                                                                    class="form-label"
                                                                                    style="margin-bottom:-5px">Thumbnail
                                                                                    <span
                                                                                        style="color: red;">(370px*303px)</span></label>
                                                                                <input type="file" class="form-control"
                                                                                    name="image" id="file"
                                                                                    onchange="showImagePreview()"
                                                                                    value="{{ old('image', $Quiz->image) }}">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-1"
                                                                        style="margin-top: 25px; margin-left: -15px;">
                                                                        <div class="mb-3">


                                                                            {{-- Display a default image if no image is
                                                                            submitted --}}
                                                                            <img id="imagePreview"
                                                                                src="{{asset('public/frontend/assets/images/about-us.png') }}"
                                                                                alt="" style="height: 50px; ">



                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3" style="margin-top:10px;">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductTitle"
                                                                                class="form-label padding-bottom-11">
                                                                                Title</label>
                                                                            <input type="text"
                                                                                value="{{ old('title', $Quiz->title) }}"
                                                                                name="title" class="form-control"
                                                                                id="inputProductTitle" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4" style="margin-top:10px;">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductTitle"
                                                                                class="form-label margin  padding-bottom-11">
                                                                                Facilitated By</label>
                                                                            <input type="text" class="form-control"
                                                                                name="facilitatedby"
                                                                                value="{{ old('facilitatedby', $Quiz->facilitatedby) }}"
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
                                                                            name="text">{{ old('text', $Quiz->text) }}</textarea>
                                                                    </div>

                                                                    <script>
                                                                        $('#main_description').summernote({
                                                                                                    placeholder: ''
                                                                                                    , tabsize: 2
                                                                                                    , height: 120
                                                                                                    , toolbar: [
                                                                                                        ['style', ['style']]
                                                                                                        , ['font', ['bold', 'underline', 'clear']]
                                                                                                        , ['color', ['color']]
                                                                                                        , ['para', ['ul', 'ol', 'paragraph']]
                                                                                                        , ['table', ['table']]
                                                                                                        , ['insert', ['link', 'picture', 'video']]
                                                                                                        , ['view', ['fullscreen', 'codeview', 'help']]
                                                                                                    ]
                                                                                                });

                                                                    </script>



                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </card>
                                            {{-- ================================================== upload quiz section
                                            end
                                            & bulk iport export start======================================= --}}
                                            
                                            <!--======================Start quetion answer 336 line end row===========================-->
                                            <div class="card-body" style="padding-right:44px;">

                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Add Question</h5>
                                                        <hr />
                                                        <div class="form-body mt-2">
                                                            <div class="page-content"
                                                                style="padding-top:0px; padding-bottom:0px;">

                                                                <div class="col-md-12 mx-auto">

                                                                    <div class="row">


                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">
                                                                                <label for="inputProductDescription"
                                                                                    class="form-label padding-bottom-11">Question
                                                                                    Text</label>
                                                                                <textarea class="form-control"
                                                                                    id="question"
                                                                                    id="inputProductDescription"
                                                                                    style="height:300px;"
                                                                                    rows="1"></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="card-body"
                                                                                style="padding-left:0px; padding-top:0px; padding-bottom:0px;">
                                                                                <div class="tab-content">
                                                                                    <div class="tab-pane fade show active"
                                                                                        id="primaryhome"
                                                                                        role="tabpanel">

                                                                                        <div class="col-md-12">
                                                                                            <div class="mb-2">
                                                                                                <label
                                                                                                    for="inputProductTitle"
                                                                                                    class="form-label padding-bottom-11">
                                                                                                    Option 1</label>
                                                                                                <input type="text"
                                                                                                    id="option1"
                                                                                                    class="form-control"
                                                                                                    id="inputProductTitle"
                                                                                                    placeholder="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="mb-2">
                                                                                                <label
                                                                                                    for="inputProductTitle"
                                                                                                    class="form-label padding-bottom-11">
                                                                                                    Option 2</label>
                                                                                                <input type="text"
                                                                                                    id="option2"
                                                                                                    class="form-control"
                                                                                                    id="inputProductTitle"
                                                                                                    placeholder="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="mb-2">
                                                                                                <label
                                                                                                    for="inputProductTitle"
                                                                                                    class="form-label padding-bottom-11">
                                                                                                    Option 3</label>
                                                                                                <input type="text"
                                                                                                    id="option3"
                                                                                                    class="form-control"
                                                                                                    id="inputProductTitle"
                                                                                                    placeholder="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="mb-2">
                                                                                                <label
                                                                                                    for="inputProductTitle"
                                                                                                    class="form-label padding-bottom-11">
                                                                                                    Option 4</label>
                                                                                                <input type="text"
                                                                                                    id="option4"
                                                                                                    class="form-control"
                                                                                                    id="inputProductTitle"
                                                                                                    placeholder="">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-12">
                                                                                            <div class="mb-2">
                                                                                                <label
                                                                                                    class="form-label padding-bottom-11">Right
                                                                                                    Answer</label>
                                                                                                <select type="text"
                                                                                                    id="rightanswer"
                                                                                                    class="single-select"
                                                                                                    value="">
                                                                                                    <option value="1">
                                                                                                        Option 1
                                                                                                    </option>
                                                                                                    <option value="2">
                                                                                                        Option 2
                                                                                                    </option>
                                                                                                    <option value="3">
                                                                                                        Option 3
                                                                                                    </option>
                                                                                                    <option value="4">
                                                                                                        Option 4
                                                                                                    </option>



                                                                                                </select>
                                                                                            </div>
                                                                                        </div>



                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="mb-3">
                                                                                <label for="inputProductDescription"
                                                                                    class="form-label padding-bottom-11">Answer
                                                                                    in
                                                                                    brief</label>
                                                                                <textarea class="form-control"
                                                                                    type="text" id="briefanswer"
                                                                                    style="height:300px;"
                                                                                    id="inputProductDescription"
                                                                                    style="height:50px;"
                                                                                    rows="1"></textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>


                                                                </div>

                                                            </div>



                                                        </div>


                                                        <div class="row" style="padding-left: 2%;">


                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-2"></div>
                                                            <div class="col-md-1"></div>
                                                            <div class="col-md-2" style="width:172px;">

                                                                <button type="button" class="btn btn-dark add-row"
                                                                    style="background-color: #0d6efd;">Add</button></a>
                                                            </div>


                                                        </div>







                                                    </div>

                                                </div>

                                                <!--  =======================this is option end======================= !-->
                                                <!-- <h6 class="mb-0 text-uppercase">Small tables</h6>
                            						                                <hr/> -->
                                                <div class="card">
                                                    <div class="card-body">
                                                        <table class="table table-sm mb-0" id="expense-entries">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">Sr.No.</th>
                                                                    <th scope="col">Question Text</th>
                                                                    <th scope="col">Option - 1</th>
                                                                    <th scope="col">Option - 2</th>
                                                                    <th scope="col">Option - 3</th>
                                                                    <th scope="col">Option - 4</th>

                                                                    <th scope="col">Right Option</th>
                                                                    <th scope="col">Answer in Brief</th>
                                                                    <th scope="col">Delete</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($questions as $question)
                                                                <tr>
                                                                    <td>{{ $loop->iteration }}</td>
                                                                    <td>{{ $question->question }}</td>
                                                                    @foreach ($question->options as $options)
                                                                    <td>

                                                                        {{ $options->option }}

                                                                    </td>
                                                                    @endforeach

                                                                    <td>
                                                                        @php
                                                                        $key = array_search(1,
                                                                        array_column($question->options->toArray(),
                                                                        'is_right'));
                                                                        @endphp
                                                                        Option {{ $key+1 }}
                                                                    </td>


                                                                    <td>{{ $question->briefanswer }}</td>
                                                                    {{-- ===============================
                                                                    delete=========================== --}}
                                                                    <td>
                                                                        <button class="btn-danger remove-row1"
                                                                            data-question-id="{{ $question->id }}">
                                                                            <i class='bx bx-trash me-0'></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                                @endforeach



                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                                <!-- ==============================append end here===========================   !-->

                                                <div class="col-md-12 mx-auto"
                                                    style="padding-top:0px; padding-bottom:0px;">

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

                                                                        <button type="submit" class="btn btn-dark"
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
                                </form>


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

                                                                                <button type=" button"
                                                                                    class="btn btn-dark"
                                                                                    style="background-color: #0d6efd;">Add</button></a>
                                                                            </div>


                                                                        </div>





                                                                    </div>

                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>




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
                                                                            <img src="assets/images/about-us.png"
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



        <!--end page wrapper -->
        <!--start overlay-->
        <div class="overlay toggle-icon"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->

    </div>
    @stop
    @section('js')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.viewinfo', function() {
                var entry_id = $(this).attr('id');
                $("#appendbody").empty();
                $.ajax({
                    url: 'getQuizDetails'
                    , type: 'get'
                    , data: {
                        entry_id: entry_id
                    }
                    , dataType: 'json'
                    , success: function(data) {
                        $("#appendbody").html(data);
                    }
                });


            });
            //append codescript
            $('.remove-row1').on('click', function () {
            var questionId = $(this).data('question-id');

        $.ajax({
        url: '{{ url("/delete/question/") }}/' + questionId,
        type: 'get',
        dataType: 'json',
        success: function (data) {
        $(this).closest('tr').remove();



            // alert(data.success);
            },
            error: function (xhr, status, error) {
            alert('Error: ' + xhr.responseText);
            }
            });
            });

                var i = {{ count($questions) }}; // Assuming $questions is the array of existing questions

            $(".add-row").click(function() {


                var question = $("#question").val();
                var option1 = $("#option1").val();
                var option2 = $("#option2").val();
                var option3 = $("#option3").val();
                var option4 = $("#option4").val();
                var rightanswer = $("#rightanswer").val();
                var briefanswer = $("#briefanswer").val();


                if (question && option1 && option2 && option3 && option4 && rightanswer && briefanswer) {
                    i++;
                    var newRow =


                        '<tr><td>'+i+'</td><td><input type="text" name="question[]" required="" style="border:none; width: 100%;" value="' +
                        question +
                        '"</td><td><input type="text" name="option1[]" required="" style="border:none; width: 100%;" value="' +
                        option1 +
                        '"></td><td><input type="text" name="option2[]" required="" style="border:none; width: 100%;" value="' +
                        option2 +
                        '"></td><td><input type="text" name="option3[]" required="" style="border:none; width: 100%;" value="' +
                        option3 +
                        '"></td><td><input type="text" name="option4[]" required="" style="border:none; width: 100%;" value="' +
                        option4 +
                        '"></td><td>option<input type="val" name="rightanswer[]" required="" style="border:none; width: 100%;" value="' +
                        rightanswer +
                        '"></td><td><input type="text" name="briefanswer[]" required="" style="border:none; width: 100%;" value="' +
                        briefanswer +
                        '"></td><td><button type="button"  class="btn1 btn-outline-danger remove-row"><i class="bx bx-trash me-0"></i></button></td></tr>';
                    $("#expense-entries tbody").append(newRow);

                    // Clear the input fields (except date)
                    $("#question").val("");
                    $("#option1").val("");
                    $("#option2").val("");
                    $("#option3").val("");
                    $("#option4").val("");
                    $("#rightanswer").val("");
                    $("#briefanswer").val("");
                } else {
                    alert("Please fill in all fields before adding a new row.");
                }
            });

            // Remove row
          $("#expense-entries tbody").on("click", ".remove-row", function() {
            $(this).closest("tr").remove();
            });

            $("#myForm").on("submit", function(event) {
                if ($("#expense-entries tbody tr").length === 0) {
                    alert("Please add at least one row before submitting.");
                    event.preventDefault(); // Prevent form submission
                }
            });

        });

    </script>





    @stop
