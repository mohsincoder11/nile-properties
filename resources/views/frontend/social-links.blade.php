@extends('frontend.layouts.header')

@section('main-container')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Social Links</h5>
                        <hr />
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif


                        <div class="form-body mt-4">
                            <div class="page-content" style="padding-top:0px; padding-bottom:0px;">
                                <form class="row g-2" method="post" action="{{route('socialLinks.update')}}">
                                    @csrf

                                    {{-- @json($social_data) --}}

                                    <input type="hidden" name="id" value="{{ $social_data ? $social_data->id : '' }}">

                                    <div class="col-md-12 mx-auto">

                                        <div class="row">
                                            <div class="col-md-1"></div>

                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">
                                                        Facebook </label>
                                                    <input type="text" class="form-control" id="inputProductTitle"
                                                        placeholder="" name="facebook"
                                                        value="{{ $social_data ? $social_data->facebook : '' }}"
                                                        required>
                                                    {{-- value is used to show the data stored in db --}}

                                                    @if ($errors->has('facebook'))
                                                    <span class="text-danger">{{ $errors->first('facebook') }}</span>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">
                                                        Instagram </label>
                                                    <input type="text" class="form-control" id="inputProductTitle"
                                                        placeholder="" name="instagram"
                                                        value="{{ $social_data ? $social_data->instagram : '' }}"
                                                        required>
                                                    @if ($errors->has('instagram'))
                                                    <span class="text-danger">{{ $errors->first('instagram') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">
                                                        Linked In</label>
                                                    <input type="text" class="form-control" id="inputProductTitle"
                                                        placeholder="" name="linkedin"
                                                        value="{{ $social_data ? $social_data->linkedin : '' }}"
                                                        required>
                                                    @if ($errors->has('linkedin'))
                                                    <span class="text-danger">{{ $errors->first('linkedin') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>



                                        <div class="col-md-12" align="center">
                                            <div style="margin-top:2px; margin-left:-30px; padding-top:10px;">
                                                <button type="submit" class="btn btn-primary">Update</button>

                                            </div>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                        <!--end row-->

                    </div>
                </div>

            </div>
        </div>

        <div class="col">
            <!-- Button trigger modal -->
            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal"
						data-bs-target="#exampleExtraLargeModal">Extra large</button> -->
            <!-- Modal -->
            <div class="modal fade" id="exampleExtraLargeModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                        <div class="page-content">
                            <div class="row">
                                <div class="col-md-12 mx-auto">
                                    <div class="card">
                                        <div class="card-body p-4">


                                            <h5 class="card-title">Add Question</h5>
                                            <hr />
                                            <div class="form-body mt-4">
                                                <div class="page-content">
                                                    <div class="border border-3 p-4 rounded">
                                                        <div class="col-md-12 mx-auto">

                                                            <div class="row">

                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label for="inputProductDescription"
                                                                            class="form-label">Image <span
                                                                                style="color:red;">(370px*303px)</span></label>
                                                                        <input id="" type="file"
                                                                            accept=".xlsx,.xls,image/*,.doc,audio/*,.docx,video/*,.ppt,.pptx,.txt,.pdf"
                                                                            multiple>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label for="inputProductTitle"
                                                                            class="form-label">
                                                                            Title</label>
                                                                        <input type="email" class="form-control"
                                                                            id="inputProductTitle"
                                                                            placeholder="Enter Story title">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label for="inputProductTitle"
                                                                            class="form-label">
                                                                            Question Text</label>
                                                                        <input type="email" class="form-control"
                                                                            id="inputProductTitle"
                                                                            placeholder="Enter Story title">
                                                                    </div>
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

                                                        </div>

                                                        <div class="col-md-12 mx-auto">


                                                            <div class="col-md-12 mx-auto">
                                                                <div class="row">
                                                                    <div class="col-md-2">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductTitle"
                                                                                class="form-label">
                                                                                Option 1</label>
                                                                            <input type="email" class="form-control"
                                                                                id="inputProductTitle" placeholder="">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-2">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductTitle"
                                                                                class="form-label">
                                                                                Option 2</label>
                                                                            <input type="email" class="form-control"
                                                                                id="inputProductTitle" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductTitle"
                                                                                class="form-label">
                                                                                Option 3</label>
                                                                            <input type="email" class="form-control"
                                                                                id="inputProductTitle" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductTitle"
                                                                                class="form-label">
                                                                                Option 4</label>
                                                                            <input type="email" class="form-control"
                                                                                id="inputProductTitle" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductTitle"
                                                                                class="form-label">
                                                                                Right Option</label>
                                                                            <input type="email" class="form-control"
                                                                                id="inputProductTitle" placeholder="">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="mb-3">
                                                                            <label for="inputProductDescription"
                                                                                class="form-label">Short
                                                                                Description</label>
                                                                            <textarea class="form-control"
                                                                                id="inputProductDescription"
                                                                                rows="1"></textarea>
                                                                        </div>
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




                                                                <!-- <label class="form-label">Status</label>
																		<select class="form-select form-select-sm" style="width:150px;">
																			<option>Active</option>
																			<option>Inactive</option>

																		</select> -->
                                                                <div class="col-md-12" align="center">
                                                                    <div
                                                                        style="margin-top:2px; padding-left:0px; padding-top:10px;">
                                                                        <button type="submit"
                                                                            class="btn btn-primary">Add</button>

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


                            @endsection