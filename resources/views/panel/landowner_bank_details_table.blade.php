<input type="hidden" id="agentIdDisplay" class="form-control" readonly>
<table class="table datatable" id="bankDetailsTable">
    <thead>
        <tr>
            <th>Sr. No.</th>
            <th>Account Holder Name</th>
            <th>Bank Name</th>
            <th>Account Number</th>
            <th>IFSC</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($servicearea as $bankDetail)
        <tr>
            <td>{{ $loop->index+1 }}</td>
            <td>{{ $bankDetail->account_holder_name }}</td>
            <td>{{ $bankDetail->bank_name }}</td>
            <td>{{ $bankDetail->account_number }}</td>
            <td>{{ $bankDetail->ifsc }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
