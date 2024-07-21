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

                            {{-- table start first load --}}
                            {{-- <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="primary-pills-home" role="tabpanel">
                                    <div class="col-md-8" style="margin-left:%; width: 100%; margin-top: 10px;">

                                        <div class="card-body" style="padding-left: 0px;">
                                            <div class="tab-content py-3">
                                                <div class="tab-pane fade show active" id="primaryhome" role="tabpanel">
                                                    @if(session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                    @endif
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
                                                                        @foreach ($Quiz as $item)
                                                                        <tr>
                                                                            <td>{{$loop->index+1}}</td>
                                                                            <td><a href="{{asset('public/images/' . $item->image)}}"
                                                                                    target="_blank">
                                                                                    <img height="50px" width="50px"
                                                                                        src="{{asset('public/images/' . $item->image)}}"
                                                                                        alt="" />
                                                                                </a>
                                                                            </td>
                                                                            <td>
                                                                                {!! Str::limit(strip_tags($item->title),
                                                                                20) !!}</td>
                                                                            </td>
                                                                            <td>{{ $item->facilitatedby }}</td>
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
                                                                                <form
                                                                                    action="{{ route('quiz.destroy', ['quiz' => $item->id]) }}"
                                                                                    method="POST">
                                                                                    @csrf
                                                                                    @method('DELETE')

                                                                                    <button type="submit"
                                                                                        class="btn1 btn-outline-danger"
                                                                                        title="Delete Quiz">
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
                                                </div> --}}
                                                {{-- ========================================================= table
                                                quiz first end while load page ======================= --}}
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
                                                                            <td></td>
                                                                            <td></td>
                                                                            <td><button type="button "
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
                                <form action="{{ route('quiz.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="tab-pane fade" id="primary-pills-profile" role="tabpanel">
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


                                                                    <div class="col-md-4">
                                                                        <div class="mb-3">
                                                                            <div style="margin-top: 8px;">
                                                                                <label for="inputFirstName"
                                                                                    class="form-label"
                                                                                    style="margin-bottom:-5px">Thumbnail
                                                                                    <span
                                                                                        style="color: red;">(370px*303px)</span></label>
                                                                                <input type="file" class="form-control"
                                                                                    name="image" id="Caste"
                                                                                    value="{{ old('image', $Quiz->image) }}">

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4" style="margin-top:10px;">
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
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12 mx-auto"
                                                        style="padding-top: 0px; padding-bottom: 0px;">

                                                        <div class="card-body"
                                                            style="padding-left: 0px; padding-top: 0px; padding-bottom: 0px;">
                                                            <div class="tab-content"
                                                                style="padding-top: 0px; padding-bottom: 0px;">
                                                                <div class="tab-pane fade show active" id="primaryhome"
                                                                    role="tabpanel">

                                                                    <div class="row justify-content-end">
                                                                        <!-- Align content to the right -->
                                                                        <div class="col-md-2"
                                                                            style="width: 172px; margin-right: 20px;">
                                                                            <!-- Adjusted margin -->
                                                                            <a href="assets/file.xlsx">
                                                                                <button type="button"
                                                                                    class="btn btn-dark"
                                                                                    style="background-color: #0d6efd;">
                                                                                    <i
                                                                                        class='bx bx-cloud-upload mr-1'></i>Bulk
                                                                                    Upload
                                                                                </button>
                                                                            </a>
                                                                        </div>
                                                                        <div class="col-md-2" style="width: 172px;">
                                                                            <a href="assets/file.xlsx">
                                                                                <button type="button"
                                                                                    class="btn btn-dark"
                                                                                    style="background-color: #0d6efd;">
                                                                                    <i
                                                                                        class='bx bx-cloud-download mr-1'></i>Sample
                                                                                    File
                                                                                </button>
                                                                            </a>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

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
                                                                        $isRightKeys = array_keys(
                                                                        array_filter(
                                                                        $question->options->toArray(),
                                                                        function ($item) {
                                                                        return $item['is_right'] == 1;
                                                                        }
                                                                        )
                                                                        );
                                                                        @endphp
                                                                        Option {{$isRightKeys[0]}}
                                                                    </td>


                                                                    <td>{{ $question->briefanswer }}</td>
                                                                    <td>
                                                                        <button class="btn btn-danger remove-row"
                                                                            data-question-id="{{ $question->id }}">
                                                                            Remove
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
                                                                                    id="file"
                                                                                    onchange="showImagePreview()">
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

            var i=0;
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
                        '"></td><td><input type="val" name="rightanswer[]" required="" style="border:none; width: 100%;" value="' +
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
