<div class="col-md-12">
    <table width="100%" border="1" style="margin-top: 5px;">
        <tr style="background-color:#f0f0f0; height:30px;">
            <th width="3%" style="text-align:center">Sr.No</th>
            <th width="5%" style="text-align:center">Name</th>

            <th width="5%" style="text-align:center">Email</th>
            <th width="5%" style="text-align:center">Address</th>
            <th width="5%" style="text-align:center">Mobile Number</th>


        </tr>

@foreach ($downline_list as $downline_lists)
<tr>
    <td style="padding:5px;" align="center">
        <label>
            {{$loop->iteration}}
        </label>
    </td>
    <td style="padding:5px;" align="center">{{$downline_lists->name}}</td>
    <td style="padding:5px;" align="center">{{$downline_lists->email}}</td>
    <td style="padding:5px;" align="center">{{$downline_lists->address}}</td>
    <td style="padding:5px;" align="center">{{$downline_lists->contact_number}}</td>

</tr>
@endforeach 

    </table>
</div> 