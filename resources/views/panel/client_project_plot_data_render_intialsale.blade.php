<tr>
    <td align="left">Client Name : {{ $data['client_name'] }}</td>
    <td align="left">Mobile No : {{ $data['client_phone'] }}</td>
    <td align="left">Address : {{ $data['client_address'] }}</td>
    <td align="left">Layout Name : {{ $data['layout_name'] }}</td>
    <td align="left">Plot No : {{ $data['plot_no'] }} / {{ $data['square_ft'] }} Sq. Ft. / {{ $data['measurement'] }}
    </td>
</tr>
<tr>
    <td align="left">Total Amount : {{ $data['total_amount'] }}</td>
    <td align="left">Down Payment : {{ $data['down_payment'] }}</td>
    <td align="left">Remaining Payment : {{ $data['remaining_payment'] }}</td>
    <td align="left">Total Installments (in months) : {{ $data['total_installments'] / 30 }}</td>
    <td align="left">Installment Type : {{ $data['installment_type'] }}</td>
</tr>