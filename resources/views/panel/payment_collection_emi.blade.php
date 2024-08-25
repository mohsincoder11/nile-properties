<div class="panel-body" style="margin-bottom:15px;">
    <table class="table datatable" id="dynamic-data-three">
        <thead>
            <tr>
                {{-- <th>Sr. No.</th> --}}
                <th>Inst No</th>
                <th>Inst Amt</th>
                <th>Status</th>
                <th>Paid Amt/Rem Amt</th>
                <th>EDOP</th>
                <th>Pay Date</th>
                <th>Payment Type / Bank Name / Account No / Cheque No / IFSC</th>
                <th>Remark</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @php
            $installments = $emiPayments;
            $isPreviousPaid = true;
            @endphp

            @foreach ($installments as $index => $emi)
            <tr>
                <td>{{ $emi->inst_no }}</td>
                <td>{{ number_format($emi->inst_amt, 2) }}</td>
                <td>{{ $emi->status }}</td>
                <td>{{ number_format($emi->paid_amt, 2) }}/<span style="color: red;">{{ number_format($emi->rem_amt, 2)
                        }}</span></td>
                <td>{{ $emi->edop->format('d-m-Y') }}</td>
                <td>{{ $emi->pay_date ? $emi->pay_date->format('d-m-Y') : '' }}</td>
                <td>{{ $emi->payment_type }} / {{ $emi->bank_name }} / {{ $emi->account_no }} / {{ $emi->cheque_no }} /
                    {{
                    $emi->ifsc ?? '' }}</td>
                <td>{{ $emi->remark ?? '' }}</td>
                <td>
                    @if($isPreviousPaid && $emi->status == 'pending')

                    <button data-toggle="modal" data-target="#storeInstallmentModal"
                        style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                        type="button" class="btn btn-info" data-inst="{{ $emi->inst_no }}"
                        data-id="{{ $emi->initial_enquiry_id }}" data-placement="top" title="Pay"
                        onclick="setModalData('{{ $emi->inst_no }}', '{{ $emi->initial_enquiry_id }}')">
                        <i class="fa fa-rupee" style="margin-left:5px;"></i> Pay Installment
                    </button>
                    @php
                    $isPreviousPaid = false;
                    @endphp
                    @elseif($emi->status == 'paid')
                    <button
                        style="background-color:green; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                        type="button" class="btn btn-info" data-placement="top" title="Pay" disabled>
                        <i class="fa fa-rupee" style="margin-left:5px;"></i> Paid
                    </button>
                    <button data-toggle="modal" data-target="#editInstallmentModal"
                        style="background-color:blue; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                        type="button" class="btn btn-info-one" data-instone="{{ $emi->inst_no }}"
                        data-idone="{{ $emi->initial_enquiry_id }}" data-paid_amount="{{ $emi->paid_amt }}"
                        data-pay_date="{{ $emi->pay_date }}" data-payment_type="{{ $emi->payment_type }}"
                        data-bank_name="{{ $emi->bank_name }}" data-account_no="{{ $emi->account_no }}"
                        data-cheque_no="{{ $emi->cheque_no }}" data-ifsc="{{ $emi->ifsc }}"
                        data-remark="{{ $emi->remark }}" data-placement="top" title="Edit"
                        onclick="setModalDataone(this)">
                        <i class="fa fa-edit" style="margin-left:5px;"></i> Edit
                    </button>
                    @php
                    $isPreviousPaid = true;
                    @endphp
                    @else

                    <button
                        style="background-color:#ccc; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                        type="button" class="btn btn-info" data-placement="top" title="Pay" disabled>
                        <i class="fa fa-rupee" style="margin-left:5px;"></i> Pay Installment
                    </button>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>