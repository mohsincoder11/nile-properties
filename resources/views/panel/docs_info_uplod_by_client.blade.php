<!-- Display inquiry details -->
<h4>Inquiry Information</h4>
<p><strong>Firm:</strong> {{ $inquiry->firm->name ?? 'N/A' }}</p>
<p><strong>Project:</strong> {{ $inquiry->project->project_name ?? 'N/A' }}</p>
<p><strong>Plot Number:</strong> {{ $inquiry->plot_no ?? 'N/A' }}</p>

<!-- Display other charges information -->
<h4>Other Charges</h4>
<table class="table">
    <thead>
        <tr>
            {{-- <th>Charge ID</th> --}}
            <th>Amount</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($otherCharges as $charge)
        <tr>
            {{-- <td>{{ $charge->charges_id ?? 'N/A' }}</td> --}}
            <td>{{ $charge->amount ?? 'N/A' }}</td>
            <td>{{ $charge->status ?? 'N/A' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Display plot registration documents -->
<h4>Plot Registration Documents</h4>
<table class="table">
    <thead>
        <tr>
            <th>Document Name</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($plotDocuments as $document)
        <tr>
            <td>
                <!-- Document Link with Icon and Styled Button -->
                <a href="{{ asset('documents/' . $document->document_name) }}" target="_blank" class="btn btn-link">
                    <!-- File Icon -->
                    <i class="ri-file-line" style="margin-right: 5px;"></i>
                    <!-- Document Name with Custom Color -->
                    <span style="color: #007bff;">{{ $document->document_name ?? 'N/A' }}</span>
                </a>
            </td>
            <td>{{ $document->status ?? 'N/A' }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
