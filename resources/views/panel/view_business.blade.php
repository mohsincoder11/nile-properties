<table width="100%" border="1" style="margin-top: 5px;">
    <tr style="background-color:#f0f0f0; height:30px;">
        <th width="3%" style="text-align:center">Sr.No</th>
        <th width="10%" style="text-align:center">Project Name</th>
        <th width="5%" style="text-align:center">Plot No</th>
       
        <th width="15%" style="text-align:center">Sale Price</th>
        <th width="5%" style="text-align:center">Commision</th>
    </tr>
    
@foreach ($get_business as $get_businesss)
<tr>
    <td style="padding:5px;" align="center">
        {{$loop->iteration}}
    </td>
    <td style="padding:5px;" align="center">{{$get_businesss->project_name}}</td>
    <td style="padding:5px;" align="center">{{$get_businesss->plot_no}}</td>
    <td style="padding:5px;" align="center">{{$get_businesss->sale_price}}</td>

    <td style="padding:5px;" align="center">{{$get_businesss->commission_amount}}</td>

</tr>
@endforeach
   


</table>