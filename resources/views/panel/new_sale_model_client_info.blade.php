<div class="modal-body" style="height: 30%; padding: 10px">
    <div class="col-md-12">
        <table width="100%">
            <tr style="height: 30px">
                @foreach ($inquiry->clients as $client)
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Client Name:
                        <font color="#000099">{{ $client->name ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Mobile No:
                        <font color="#000099">{{ $client->phone ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Address: <font color="#000099">{{ $client->address ?? ''
                            ?? '' }}</font></label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Sponser ID:
                        <font color="#000099">{{ $client->sponsor ?? '' }}</font>
                    </label>
                </td>
            </tr>
            @endforeach
            <tr style="
                    height: 30px;
                    font-weight: bold;
                    font-size: 14px;
                    color: #3399ff;
                  ">
                <th>Nominee Details</th>
            </tr>

            @foreach ($inquiry->nominees as $nominee)
            <tr style="height: 30px">
                <td style="padding: 2px" width="4%">
                    <label class="control-label">Nominee's Name:
                        <font color="#000099">{{ $nominee->name ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="3%">
                    <label class="control-label">DOB/Age :
                        <font color="#000099">{{ $nominee->dob ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="2%">
                    <label class="control-label">Relation : <font color="#000099">{{ $nominee->relation ?? '' }}</font>
                    </label>
                </td>

                <td style="padding: 2px" width="3%">
                    <label class="control-label">AADHAR No :
                        <font color="#000099">{{ $nominee->aadhar ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="3%">
                    <label class="control-label">PAN No : <font color="#000099">{{ $nominee->pan ?? '' }}</font></label>
                </td>
            </tr>

            @endforeach
            <tr style="
                    height: 30px;
                    font-weight: bold;
                    font-size: 14px;
                    color: #3399ff;
                  ">
                <th>Project Details</th>
            </tr>
            <tr style="height: 30px">
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Project : <font color="#000099">{{ $inquiry->project->project_name ??
                            '' }}
                        </font></label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Plot No. : <font color="#000099">{{ $inquiry->plotnumber->plot_no ?? ''
                            }}
                        </font></label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Square Meter : <font color="#000099">{{ $inquiry->square_meter ?? '' }}
                        </font></label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Square Ft : <font color="#000099">{{ $inquiry->square_ft ?? '' }}
                        </font>
                    </label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Rate : <font color="#000099">{{ $inquiry->rate ?? '' }}</font></label>
                </td>
            </tr>
            <tr style="height: 30px">
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Total Cost : <font color="#000099">{{ $inquiry->total_cost ?? '' }}
                        </font>
                    </label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Discount Type : <font color="#000099">{{ $inquiry->discount_type ?? ''
                            }}
                        </font></label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Discount Amt : <font color="#000099">{{ $inquiry->discount_amount ?? ''
                            }}
                        </font></label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Final Amt : <font color="#000099">{{ $inquiry->final_amount ?? '' }}
                        </font>
                    </label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Down Payment: <font color="#000099">{{ $inquiry->down_payment ?? '' }}
                        </font>
                    </label>
                </td>
            </tr>
            <tr style="height: 30px">
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Balance Amt :
                        <font color="#000099">{{ $inquiry->balence_amount ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Tenure : <font color="#000099">{{ $inquiry->tenure ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">EMI Amt : <font color="#000099">{{ $inquiry->emi_amount ?? '' }}
                        </font>
                    </label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Booking Dt : <font color="#000099">{{ $inquiry->booking_date ?? '' }}
                        </font>
                    </label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Agreement Dt : <font color="#000099">{{ $inquiry->agreement_date ?? ''
                            }}
                        </font>
                    </label>
                </td>
            </tr>
            <tr style="height: 30px">
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Token Status: <font color="#000099">{{ $inquiry->statustoken->token ??
                            '' }}
                        </font>
                    </label>
                </td>

                <!-- <td style="padding: 2px;" width="2%" colspan="2">
                                        <table width="100%" border="1" style="margin-top: 5px;">
                                            <tr style="background-color:#f0f0f0; height:30px;">
                                                <th width="3%" style="text-align:center">Sr.No</th>
                                                <th width="10%" style="text-align:center">Added Layout Image</th>

                                            </tr>


                                            <tr>
                                                <td style="padding:5px;" align="center">
                                                    <label>1</label>
                                                </td>
                                                <td style="padding:5px;" align="center">
                                                    <img src="{{asset('panel/img/png.png')}}" width="20" height="20"/>
                                                </td>

                                            </tr>

                                        </table>
                                    </td> -->
                <td style="padding: 2px" width="1%">
                    <label class="control-label">EMI Start Date : <font color="#000099">{{ $inquiry->emi_start_date ??
                            '' }}
                        </font>
                    </label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">Plot Status : <font color="#000099">{{ $inquiry->plot_sale_status ?? ''
                            }}
                        </font>
                    </label>
                </td>
                <td style="padding: 2px" width="1%">
                    <label class="control-label">A. Rate : <font color="#000099">{{ $inquiry->a_rate ?? '' }} </font>
                    </label>
                </td>
            </tr>
            <tr style="height: 30px">
                <td style="padding: 2px" width="2%">
                    <label class="control-label">Source Type: <font color="#000099">{{ $inquiry->source_type ?? '' }}
                        </font>
                    </label>
                </td>
                <td style="padding: 2px" width="4%">
                    @if(!empty($inquiry->employee->name))
                    <label class="control-label">Executive Name :
                        <font color="#000099">{{ $inquiry->employee->name }}</font>
                    </label>
                    @elseif(!empty($inquiry->agent->name))
                    <label class="control-label">Agent Name :
                        <font color="#000099">{{ $inquiry->agent->name }}</font>
                    </label>
                    @else
                    <label class="control-label">Direct Source :
                        <font color="#000099">YES</font>
                    </label>
                    @endif
                </td>
                <td style="padding: 2px" width="3%" colspan="2">
                    <label class="control-label">Remarks : <font color="#000099"> {{ $inquiry->remark ?? '' }}</font>
                    </label>
                </td>
            </tr>

            <tr style="
                    height: 30px;
                    font-weight: bold;
                    font-size: 14px;
                    color: #3399ff;
                  ">
                <th>Plot/Unit Transaction</th>
            </tr>
            <tr style="height: 30px">
                <td style="padding: 2px" width="2%">
                    <label class="control-label">
                        Mauja : <font color="#000099">{{ $inquiry->mauja ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="2%">
                    <label class="control-label">Kh No. : <font color="#000099">{{ $inquiry->kh_no ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="2%">
                    <label class="control-label">P.H.N : <font color="#000099">{{ $inquiry->phn ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="2%">
                    <label class="control-label">Taluka : <font color="#000099">{{ $inquiry->taluka ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="2%">
                    <label class="control-label">District : <font color="#000099">{{ $inquiry->district ?? '' }}</font>
                    </label>
                </td>
            </tr>
            <tr style="
                    height: 30px;
                    font-weight: bold;
                    font-size: 14px;
                    color: #3399ff;
                  ">
                <th>Direction</th>
            </tr>
            <tr style="height: 30px">
                <td style="padding: 2px" width="2%">
                    <label class="control-label">
                        East : <font color="#000099">{{ $inquiry->east ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="2%">
                    <label class="control-label">West : <font color="#000099">{{ $inquiry->west ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="2%">
                    <label class="control-label">North : <font color="#000099">{{ $inquiry->north ?? '' }}</font>
                    </label>
                </td>
                <td style="padding: 2px" width="2%">
                    <label class="control-label">South : <font color="#000099">{{ $inquiry->south ?? '' }}</font>
                    </label>
                </td>
            </tr>
        </table>
    </div>
</div>
