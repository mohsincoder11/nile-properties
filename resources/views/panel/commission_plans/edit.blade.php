@extends('panel.layout.header')

@section('main_container')



<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12" style="margin-top: 1px">
            <div class="panel panel-default">
                <h5 class="panel-title" style="
                    color: #ffffff;
                    background-color: #006699;
                    width: 100%;
                    font-size: 14px;
                    margin-top: 1vh;
                  " align="center">
                    <i class="fa fa-navicon"></i> &nbsp;Commision Plan
                </h5>
            </div>
        </div>
    </div>
</div>

<!-- START DEFAULT DATATABLE -->
<div class="row">
    <div class="col-md-12" align="center" style="margin-top: 1px">
        <!-- START DEFAULT DATATABLE -->

        <div class="col-md-12">
            <form method="POST" action="{{ route('commission-plans.update', $commissionPlan->id) }}">
                @csrf
                @method('PUT')                <table width="100%">
                <tr style="height: 30px">
                    <th width="3%">Profile Name</th>
                    <th width="3%">Monthly Target From (INR)</th>
                    <th width="3%">Monthly Target To (INR)</th>
                    <th width="3%">Regular Benefit (%)</th>
                    <th width="3%">Referral (%)</th>
                    <th></th>
                </tr>
            
                <tr>
                    <td style="padding: 2px" width="1%">
                        <input type="text" class="form-control" name="profile_name" value="{{ old('profile_name', $commissionPlan->profile_name) }}" placeholder="Profile Name" />
                    </td>
                    <td style="padding: 2px" width="1%">
                        <input type="text" class="form-control" name="monthly_target_from" value="{{ old('monthly_target_from', $commissionPlan->monthly_target_from) }}" placeholder="From" />
                    </td>
                    <td style="padding: 2px" width="1%">
                        <input type="text" class="form-control" name="monthly_target_to" value="{{ old('monthly_target_to', $commissionPlan->monthly_target_to) }}" placeholder="To" />
                    </td>
                    <td style="padding: 2px" width="1%">
                        <input type="text" class="form-control" name="regular_benefit" value="{{ old('regular_benefit', $commissionPlan->regular_benefit) }}" placeholder="Benefit" />
                    </td>
                    <td style="padding: 2px" width="1%">
                        <input type="text" class="form-control" name="referral" value="{{ old('referral', $commissionPlan->referral) }}" placeholder="Referral" />
                    </td>
                    <td style="padding: 2px" width="5%">
                        <button type="submit" class="btn mjks" style="color: #ffffff; height: 30px; width: auto; background-color: #006699;">
                            <i class="fa fa-save" aria-hidden="true"></i> Update Changes
                        </button>
                    </td>
                </tr>
            </table>
            </form>
            
        </div>
    </div>

    <div class="row">
        <div class="col-md-12" style="margin-top: 5px">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel-body" style="margin-top:5px; margin-bottom:15px;">
                <table class="table datatable">                <tr style="background-color: #f0f0f0; height: 30px">
                    <th width="3%" style="text-align: center">Sr.No</th>
                    <th width="10%" style="text-align: center">Profile</th>
                    <th width="5%" style="text-align: center">
                        Target (Monthly)
                    </th>
                    <th width="10%" style="text-align: center">
                        Regular Percentages(%)
                    </th>

                    <th width="5%" style="text-align: center">
                        Referral Percentages(%)
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
                @foreach ($commissionPlans as $plan)
                <tr>
                    <td >{{ $loop->iteration }}</td>
                    <td >{{ $plan->profile_name }}</td>
                    <td >{{ $plan->monthly_target_from }} to {{ $plan->monthly_target_to }}</td>
                    <td >{{ $plan->regular_benefit }}</td>
                    <td >{{ $plan->referral }}</td>
                    <td style="padding: 5px" align="center">
                        <a href="{{ route('commission-plans.edit', $plan->id) }}">
                            <button
                                style="background-color:#3399ff; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                title="Edit">
                                <i class="fa fa-edit" style="margin-left:5px;"></i>
                            </button>
                        </a>
                        <form action="{{ route('commission-plans.destroy', $plan->id) }}" method="POST"
                            onsubmit="return confirm('Are you sure you want to delete this commission plan?');"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button
                                style="background-color:#ff0000; border:none; max-height:25px; margin-top:-5px; margin-bottom:-5px;"
                                type="submit" class="btn btn-info" data-toggle="tooltip" data-placement="top"
                                title="Delete">
                                <i class="fa fa-trash-o" style="margin-left:5px;"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
               
            </table>
            </div>

            <!-- END DEFAULT DATATABLE -->
        </div>
    </div>
</div>
@stop
@section('js')
@stop