<?php
namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CommissionPlan;

class CommissionPlanController extends Controller
{
    public function index()
    {
        $commissionPlans = CommissionPlan::all();
        return view('panel.commission_plans.index', compact('commissionPlans'));
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'profile_name' => 'required|string|max:255',
            'monthly_target_from' => 'required',
            'monthly_target_to' => 'required',
            'regular_benefit' => 'required',
            // 'referral' => 'required|numeric',
        ]);

        CommissionPlan::create([
        'profile_name'=>$request->profile_name,
        'monthly_target_from'=>$request->monthly_target_from,
        'monthly_target_to'=>$request->monthly_target_to,
        'regular_benefit'=>$request->regular_benefit,
        // 'referral'=>$request->referral,
        ]);

        return redirect()->route('commission-plans.index')->with('success', 'Commission Plan created successfully.');
    }

    // Display the specified resource.
    public function show(CommissionPlan $commissionPlan)
    {
        return view('panel.commission_plans.show', compact('commissionPlan'));
    }

    // Show the form for editing the specified resource.
    public function edit(CommissionPlan $commissionPlan)
    {
        $commissionPlans = CommissionPlan::all();
        return view('panel.commission_plans.edit', compact('commissionPlan','commissionPlans'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, CommissionPlan $commissionPlan)
    {
        $request->validate([
            'profile_name' => 'required|string|max:255',
            'monthly_target_from' => 'required',
            'monthly_target_to' => 'required',
            'regular_benefit' => 'required',
            // 'referral' => 'required|numeric',
        ]);

        $commissionPlan->update($request->all());

        return redirect()->route('commission-plans.index')->with('success', 'Commission Plan updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(CommissionPlan $commissionPlan)
    {
        $commissionPlan->delete();

        return redirect()->route('commission-plans.index')->with('success', 'Commission Plan deleted successfully.');
    }
}