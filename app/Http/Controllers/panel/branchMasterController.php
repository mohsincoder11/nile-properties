<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BranchMaster;
use App\Models\City;
use Illuminate\Validation\Rule;


class branchMasterController extends Controller
{

    public function index()
    {

        $branch = BranchMaster::all();
        $city = City::all();
        return view('panel.branch_master', ['branch' => $branch, 'city' => $city]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'city_id' => 'required',
            'branch' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'contact_number' => 'required|digits:10',
            // 'latitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            // 'longitude' => ['required', 'regex:/^[-]?((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+)$/'],

        ]);
        $branch = new BranchMaster;
        $branch->city_id = $request->city_id;
        $branch->branch = $request->branch;
        $branch->address = $request->address;
        $branch->contact_person = $request->contact_person;
        $branch->contact_number = $request->contact_number;
        $branch->latitude = $request->latitude;
        $branch->longitude = $request->longitude;

        $branch->save();

        return redirect()->route('branch')->with('success', 'Branch added successfully');

    }

    public function destroy($id)
    {
        $branch = BranchMaster::find($id);

        if ($branch) {
            $branch->delete();
            return redirect(route('branch'))->with('success', 'Branch deleted successfully');

        } else {
            return redirect(route('branch'))->with('error', 'Branch not found');
        }

    }

    public function edit($id)
    {
        $branchEdit = BranchMaster::find($id);
        $branchAll = BranchMaster::all();
        $city = City::all();
        return view('panel.branch_master_edit', ['branchEdit' => $branchEdit, 'branchAll' => $branchAll, 'city' => $city]);
    }

    public function update(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'city_id' => 'required',
            'branch' => 'required',
            'address' => 'required',
            'contact_person' => 'required',
            'contact_number' => 'required|digits:10',
            // 'latitude' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            // 'longitude' => ['required', 'regex:/^[-]?((1[0-7][0-9])|([0-9]?[0-9]))\.(\d+)$/'],
        ]);
        BranchMaster::where('id', $request->id)->update([
            'city_id' => $request->city_id,
            'branch' => $request->branch,
            'address' => $request->address,
            'contact_person' => $request->contact_person,
            'contact_number' => $request->contact_number,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ]);

        // return redirect(route('branch'))->with(['success'=>'Branch Successfully Updated !']);
        // return redirect()->route('branch')->with('success', 'Branch Updated Successfully');
        return redirect(route('branch'))->with('success', 'Branch updated successfully.');

    }
}