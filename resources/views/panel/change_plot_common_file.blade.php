<form id="updateEnquiryForm" action="{{ route('changeplot.update') }}" method="POST">
    @csrf <div class="row">
        <div class="form-group col-md-12 text-center">
            <div class="col-md-2"></div>
            <div class="col-md-3">
                <input type="hidden" name="enquiry_id" value="{{ $enquiry->id ?? '' }}">
                <label for="Project name">Project Name</label>
                <select class="form-control" name="project_id" id="selectProject">
                    <option value="">--Select--</option>
                    @foreach ($projects as $project)
                    <option value="{{ $project->id }}" {{ $enquiry->project_id == $project->id ? 'selected' : '' }}>
                        {{ $project->project_name }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2">
                <label for="Plot name">Plot Name</label>
                <select class="form-control" name="plot_no" id="selectPlot">
                    <option value="">--Select--</option>
                    @foreach ($plots as $plot)
                    <option value="{{ $plot->plot_no }}" {{ $enquiry->plot_no == $plot->plot_no ? 'selected' : '' }}>
                        {{ $plot->plot_no }}
                    </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2" style="margin-top: 2%;">
                <button type="submit" class="btn btn-primary" style="width: 100%;">Update</button>
            </div>
        </div>
    </div>
</form>
