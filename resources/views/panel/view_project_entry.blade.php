<form action="" style="background: white">
    <table width="100%" class="col-md-12">

        <tr style="height:30px;">
            <td style="padding: 2px;" width="1%">
                <label class="control-label"> Branch: <font color="#000099">{{ $servicearea->cityname->city ??
                        null }}
                    </font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Project Code: <font color="#000099">{{ $servicearea->project_code ?? null
                        }}</font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Project Name: <font color="#000099">{{ $servicearea->project_name ?? null
                        }}</font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Mobile No: <font color="#000099">{{ $servicearea->mobile_number ?? null }}
                    </font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">WhatsApp No: <font color="#000099">{{ $servicearea->whatsapp_number ?? null
                        }}
                    </font>
                </label>
            </td>
        </tr>
        <tr style="height:30px;">

            <td style="padding: 2px;" width="1%">
                <label class="control-label">Email: <font color="#000099">{{ $servicearea->email ?? null }}</font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Mauja: <font color="#000099">{{ $servicearea->mauja ?? null }}</font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Kh No: <font color="#000099">{{ $servicearea->kh_no ?? null }}</font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">P.H.N: <font color="#000099">{{ $servicearea->phn ?? null }}</font></label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Taluka: <font color="#000099">{{ $servicearea->taluka ?? null }}</font>
                </label>
            </td>
        </tr>
        <tr style="height:30px;">

            <td style="padding: 2px;" width="1%">
                <label class="control-label">District: <font color="#000099">{{ $servicearea->district ?? null }}</font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">No. of Plots: <font color="#000099">{{ $servicearea->no_of_plots ?? null }}
                    </font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Area (Sq. Ft): <font color="#000099">{{ $servicearea->areasqrft_manual ??
                        null }}
                    </font></label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Area (Sq. Mt): <font color="#000099">{{ $servicearea->areasqrmt_manual ??
                        null }}
                    </font></label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label"> Embedded Map:
                    @if($servicearea->embedded_map)
                    <a href="{{ $servicearea->embedded_map }}" target="_blank">
                        <font color="#000099">{{ Str::limit($servicearea->embedded_map, 20) }}</font>
                        @else
                        <font color="#000099">{{ $servicearea->embedded_map ?? null }}</font>
                        @endif
                </label>
            </td>
        </tr>
        <tr style="height:30px;">

            <td style="padding: 2px;" width="1%">
                <label class="control-label">Area Plottable: <font color="#000099">{{ $servicearea->area_plottable }}
                    </font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Amenities: <font color="#000099">{{ $servicearea->amenities }}</font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Open Space: <font color="#000099">{{ $servicearea->open_space }}</font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Dev.Charge (₹): <font color="#000099">{{ $servicearea->dev_charge }}</font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Other Charges(%): <font color="#000099">{{
                        $servicearea->other_charges_percentage }}</font>
                </label>
            </td>
        </tr>
        <tr style="height:30px;">

            <td style="padding: 2px;" width="1%">
                <label class="control-label">Site Map:</label>
                <a href="{{ asset('/' . $servicearea->site_map) }}" download target="_blank"><span
                        style="color: blue">Download Site Map</span></a>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Brochure:</label>
                <a href="{{ asset('/' . $servicearea->brochure) }}" download target="_blank"><span style="color: blue">
                        Download Brochure</span></a>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Youtube URL:
                    <a href="{{ $servicearea->youtube_url }}" target="_blank">
                        <font color="#000099">{{ Str::limit($servicearea->youtube_url, 20) }}</font>
                    </a>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Status: <font color="#000099">Active
                        {{-- {{ $servicearea->status == 1 ? 'Active' :
                        $servicearea->status }} --}}
                    </font>
                </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Latitude: <font color="#000099">{{ $servicearea->latitude }}</font>
                </label>
            </td>
        </tr>
        <tr style="height:30px;">

            <td style="padding: 2px;" width="1%">
                <label class="control-label">Longitude: <font color="#000099">{{ $servicearea->longitude }}</font>
                </label>
            </td>

            <td style="padding: 2px;" width="1%;">
                <label class="control-label">Layout Images: <font color="#000099"></label>
                <div style="display: flex; flex-wrap: wrap; align-items: center;">
                    @foreach ($layoutImages as $index => $layoutImage)
                    <img src="{{ asset('/' . $layoutImage->layout_image) }}"
                        style="margin-right: 5px; margin-bottom: 5px;" width="50" height="50" />
                    @endforeach
                </div>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Feature: <font color="#000099">{{ Str::limit($servicearea->layout_feature,
                        20) }}
                    </font> </label>
            </td>
            <td style="padding: 2px;" width="1%">
                <label class="control-label">Layout Description: <font color="#000099">
                        {!! Str::limit(strip_tags($servicearea->layout_description), 20) !!}</font> </label>
            </td>

        </tr>


        <tr style="height:30px;">

            {{-- <td> <label style="font-weight: bold;font-size:medium;color: #009919;">Added Plot Entry</label></td>
            --}}

        </tr>
        <tr>
            <table width="100%" border="1" style="margin-top: 5px;">
                <tr style="background-color:#f0f0f0; height:30px;">
                    <th width="3%" style="text-align:center">Sr.No</th>
                    <th width="5%" style="text-align:center">Plot No</th>
                    <th width="5%" style="text-align:center">Plot Width</th>
                    <th width="5%" style="text-align:center">Plot Length</th>
                    <th width="5%" style="text-align:center">Area (Sq. Ft)</th>
                    <th width="5%" style="text-align:center">Area (Sq. Mt)</th>
                    <th width="5%" style="text-align:center">East</th>
                    <th width="5%" style="text-align:center">West</th>
                    <th width="5%" style="text-align:center">North</th>
                    <th width="5%" style="text-align:center">South</th>
                    <th width="5%" style="text-align:center">Rate(Sq.Ft) </th>
                    <th width="5%" style="text-align:center">Amount</th>
                </tr>

                @foreach ($appendData as $index => $data)
                <tr>
                    <td style="padding:5px;" align="center">
                        <label>{{ $index + 1 }}</label>
                    </td>
                    <td style="padding:5px;" align="center">{{ $data->plot_no }}</td>
                    <td style="padding:5px;" align="center">{{ $data->plot_width }}</td>
                    <td style="padding:5px;" align="center">{{ $data->plot_length }}</td>
                    <td style="padding:5px;" align="center">{{ $data->area_sqrft }}</td>
                    <td style="padding:5px;" align="center">{{ $data->area_sqrmt }}</td>
                    <td style="padding:5px;" align="center">{{ $data->east }}</td>
                    <td style="padding:5px;" align="center">{{ $data->west }}</td>
                    <td style="padding:5px;" align="center">{{ $data->north }}</td>
                    <td style="padding:5px;" align="center">{{ $data->south }}</td>
                    <td style="padding:5px;" align="center">{{ $data->rate }}</td>
                    <td style="padding:5px;" align="center">{{ $data->amount ?? '' }}</td>
                </tr>
                @endforeach
            </table>
        </tr>
    </table>
    </tr>
    </table>

</form>
