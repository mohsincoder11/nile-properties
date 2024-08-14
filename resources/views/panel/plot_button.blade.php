<div class="col-md-10">
    <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 7px;">
        @foreach ($plot_list as $plot)
        @php
        $enquiry = $plot->enquiry;
        $backgroundColor = 'green'; // Default color

        if ($enquiry) {
        $statusId = $enquiry->status_name->plot_sale_status;

        if ($statusId == 'Booked') {
        $backgroundColor = 'purple';
        } elseif ($statusId == 'Enquiry') {
        $backgroundColor = 'orange';
        }
        }
        @endphp

        <button data-project_entry_id="{{ $plot->project_entry_id }}" data-plot_no="{{ $plot->plot_no }}"
            id="plotButton" type="button" class="btn mjks plot-button" onclick="getEnquiryData(this)"
            data-toggle="modal" data-target="#popup2"
            style="color:#ffffff; height:50px; width:100px; font-weight: bold; background-color: {{ $backgroundColor }}; margin: 5px;">
            Plot No {{ $plot->plot_no }} <br>
            <span>{{ $plot->area_sqrft }} Sq. Ft.</span>
        </button>
        @endforeach
    </div>
</div>
