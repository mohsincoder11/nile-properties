@foreach($followUps as $followUp)
<tr>
    <td>
        @if ($followUp->created_at)
        {{ $followUp->created_at->format('d-m-Y') }}
        @else
        N/A
        @endif
    </td>
    <td>{{ $followUp->status_name->plot_sale_status ?? '' }}</td>
    <td>{{ $followUp->remark ?? '' }}</td>
    <td>{{ $followUp->client_stage ?? ''}}</td>
    <td>
        @if ($followUp->follow_up_next_date)
        {{ \Carbon\Carbon::parse($followUp->follow_up_next_date)->format('d-m-Y h:i A') }}
        @else
        N/A
        @endif
    </td>
</tr>
@endforeach
