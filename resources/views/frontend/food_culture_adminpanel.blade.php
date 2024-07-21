@extends('frontend.layouts.header')

@section('main-container')

<!--start page wrapper -->
<div class="page-wrapper">
    <div class="page-content">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card">
                    <div class="card-body p-4">
                        <h5 class="card-title">Add Dharma & Culture</h5>
                        <hr />
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                        @endif
                        <div class="form-body mt-4">
                            <div class="page-content" style="padding-top:0px;">

                                <form action="{{route('user.FoodAndCulturestore')}}" method="post"
                                    enctype="multipart/form-data">

                                    @csrf

                                    <div class="col-md-12 mx-auto">




                                        <div class="row">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-3">
                                                <div class="mb-3">


                                                    <div style="margin-top: -12px;">
                                                        <label for="inputFirstName" class="form-label"
                                                            style="margin-bottom:-5px">Image
                                                            of Hero <span
                                                                style="color: red;">(370px*303px)</span></label>
                                                        <input type="file" class="form-control" id="file"
                                                            onchange="showImagePreview()" name="image">
                                                        @if ($errors->has('image'))
                                                        <span class="text-danger">{{ $errors->first('image') }}</span>
                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-1" style="margin-top: 15px; margin-left: -15px;">
                                                <div class="mb-3">


                                                    {{-- Display a default image if no image is submitted --}}
                                                    <img id="imagePreview"
                                                        src="{{asset('public/frontend/assets/images/about-us.png') }}"
                                                        alt="" style="height: 50px; ">



                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="mb-3">
                                                    <label for="inputProductTitle" class="form-label">
                                                        Title</label>
                                                    <input type="text" class="form-control" placeholder="Enter Title"
                                                        name="title" value="{{ old('title') }}">
                                                    @if ($errors->has('title'))
                                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                                    @endif
                                                </div>
                                            </div>


                                        </div>



                                        <div class="mb-3" style="margin-top:2%;">

                                            <textarea id="main_description" name="text">  {{ old('text') }}</textarea>
                                            @if ($errors->has('text'))
                                            <span class="text-danger">{{ $errors->first('text') }}</span>
                                            @endif
                                        </div>


                                        </select>
                                        <div class="col-md-12" align="center">
                                            <div style="margin-top:2px; padding-left:0px; padding-top:10px;">
                                                <button type="submit" class="btn btn-primary">Add</button>

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
            <script>
                $('#main_description').summernote({
							placeholder: 'Write Description Here',
							tabsize: 2,
							height: 500,
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
    <div class="col">

        <!-- Modal -->
        <div class="modal fade" id="exampleScrollableModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-body" id="appendbody">
                        <!-- Content will be dynamically inserted here -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="col-md-12" style="margin-left: 15%; width: 77%; margin-top: -40px;">

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
                                        <th>Img of Dharma & Culture </th>
                                        <th>Title</th>


                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($FoodAndCulture as $Heroes )


                                    <tr>

                                        <td>{{$loop->index+1}}</td>
                                        {{-- <td><img src="" alt="img"></td> --}}
                                        <td><a href="{{asset('public/images/' . $Heroes->image) }}" target="_blank">
                                                @if ($Heroes->image)
                                                <img height="50px" width="50px"
                                                    src="{{asset('public/images/' . $Heroes->image) }}" alt="" />
                                                @else
                                                <!-- Provide the path to your default image -->
                                                <img height="50px" width="50px"
                                                    src="{{asset('public/frontend/assets/images/about-us.png') }}"
                                                    alt="Default Image" />
                                                @endif
                                            </a>
                                        </td>

                                        <td>
                                            {!! Str::limit(strip_tags($Heroes->title), 20) !!}</td>
                                       

                                        <td>


                                            <button type="button" class="btn1 btn-outline-success viewinfo" title="Show"
                                                data-bs-toggle="modal" data-bs-target="#exampleScrollableModal"
                                                id="{{ $Heroes->id }}"><i class='bx bx-show-alt me-0'></i></button>


                                            <a href="{{ route('foodandculture.edit', ['id' => $Heroes->id]) }}">
                                                <button type="button" class="btn1 btn-outline-success" title="Edit">
                                                    <i class='bx bx-edit-alt me-0'></i>
                                                </button>
                                            </a>

                                            <a href="#"
                                                onclick="openCustomModal('{{ route('user.destroyFoodAndCulture', $Heroes->id) }}')">
                                                <button type="button" class="btn1 btn-outline-danger" title="button">
                                                    <i class='bx bx-trash me-0'></i>
                                                </button>
                                            </a>
                                        </td>

                                    </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


            @endsection



            @section('js')
            <script>
                $(document).ready(function() {
                        $(document).on('click', '.viewinfo', function() {
                        var entry_id = $(this).attr('id');
                       // $("#appendbody").empty();


                        $.ajax({
                        url: 'FoodAndCultureDetails',
                        type: 'get',
                        data: {
                        entry_id: entry_id
                        },
                        dataType: 'json',
                        success: function(data) {
                       // data=JSON.parse(data);
                        $("#appendbody").html(data);
                        }
                        });
                        });
                        });
            </script>
            @stop
