<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\PlotTransfer;
use Illuminate\Http\Request;
use App\Models\PersonalDetail;
use Illuminate\Support\Facades\Validator;

class PlotTransfercontroller extends Controller
{
    public function plottransfer()
    {
        $PlotTransfer = PlotTransfer::orderby('id', 'desc')->get();
        $PersonalDetail = PersonalDetail::orderby('id', 'desc')->get();
        return view('panel.plot_transfer', [
            'PlotTransfer' => $PlotTransfer,
            'PersonalDetail'=>$PersonalDetail
        ]);
    }

    public function plot_transfer_store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make(
            $request->all(),
            [
            'application_number' => 'required|integer',
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'mobile_number' => 'required|string|max:10|min:10',
            'alternate_number' => 'nullable|string|max:10|min:10',
            'upload_photo' => 'nullable|file|mimes:jpg,jpeg,png,bmp,gif,svg,webp',
            'dob' => 'required|date',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'nationality' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'company_name' => 'nullable|string|max:255',
            'pincode' => 'nullable|string|max:6||min:6',
            'ownership_change' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:100',
        ]);
 if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error' => $errors]);
        }
        // Handle file upload
        $upload_photo_path = null;
        if ($request->hasFile('upload_photo')) {
            $file = $request->file('upload_photo');
            $upload_photo_path = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/plottransfer/'), $upload_photo_path);
            $upload_photo_path = 'plottransfer/' . $upload_photo_path;
        }

        // Create a new plot transfer
        PlotTransfer::create([
            'application_number' => $request->application_number,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'alternate_number' => $request->alternate_number,
            'upload_photo' => $upload_photo_path,
            'dob' => $request->dob,
            'city' => $request->city,
            'address' => $request->address,
            'nationality' => $request->nationality,
            'state' => $request->state,
            'company_name' => $request->company_name,
            'pincode' => $request->pincode,
            'ownership_change' => $request->ownership_change,
            'designation' => $request->designation,
        ]);

        return redirect()->back()->with('success', 'Plot transfer created successfully.');
    }

    public function plot_transfer_delete($id)
    {
        PlotTransfer::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Plot transfer deleted successfully.');
    }
    public function plot_transfer_edit($id)
    {
        $PlotTransfer = PlotTransfer::orderby('id', 'desc')->get();
        $PersonalDetail = PersonalDetail::orderby('id', 'desc')->get();
        $PlotTransfer_edit = PlotTransfer::where('id', $id)->first();
        return view('panel.plot_transfer', [
            'PlotTransfer_edit' => $PlotTransfer_edit,
            'PlotTransfer' => $PlotTransfer,
            'PersonalDetail' => $PersonalDetail
        ]);
    }
    public function plot_transfer_update(Request $request, $id)
    {

        $validator = Validator::make(
            $request->all(),
            [
            'application_number' => 'required|integer',
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'mobile_number' => 'required|string|max:10|min:10',
            'alternate_number' => 'nullable|string|max:10|min:10',
            'upload_photo' => 'nullable|file|mimes:jpg,jpeg,png,bmp,gif,svg,webp',
            'dob' => 'required|date',
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'nationality' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'company_name' => 'nullable|string|max:255',
            'pincode' => 'nullable|string|max:6||min:6',
            'ownership_change' => 'nullable|string|max:255',
            'designation' => 'nullable|string|max:100',
        ]);
        if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error' => $errors]);
        }
        $plotTransfer = PlotTransfer::where('id', $id)->first();
        $plotTransfer->application_number = $request->application_number;
        $plotTransfer->full_name = $request->full_name;
        $plotTransfer->email = $request->email;
        $plotTransfer->mobile_number = $request->mobile_number;
        $plotTransfer->alternate_number = $request->alternate_number;
        $plotTransfer->dob = $request->dob;
        $plotTransfer->city = $request->city;
        $plotTransfer->address = $request->address;
        $plotTransfer->nationality = $request->nationality;
        $plotTransfer->state = $request->state;
        $plotTransfer->company_name = $request->company_name;
        $plotTransfer->pincode = $request->pincode;
        $plotTransfer->ownership_change = $request->ownership_change;
        $plotTransfer->designation = $request->designation;

        if ($request->hasFile('upload_photo')) {
            $file = $request->file('upload_photo');
            $upload_photo_path = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('/plottransfer/'), $upload_photo_path);
            $upload_photo_path = 'plottransfer/' . $upload_photo_path;
            $plotTransfer->upload_photo = $upload_photo_path;
        }

        $plotTransfer->save();
        return redirect()->route('plot.transfer')->with('success', 'Plot transfer updated successfully.');
    }

    public function personal_details_store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make(
            $request->all(),
            [
            'spouse_name' => 'required|string|max:100',
            'spouse_mobile' => 'required|string|min:10|max:10',
            'anniversary' => 'required|string|max:50',
            'father_name' => 'required|string|max:100',
            'mother_name' => 'required|string|max:100',
            'nominee' => 'required|string|max:100',
            'nominee_mobile' => 'required|string|min:10|max:10',
        ]);

 if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error' => $errors]);
        }

        // Create a new plot transfer
        PersonalDetail::create([
            'spouse_name' => $request->spouse_name,
            'spouse_mobile' => $request->spouse_mobile,
            'anniversary' => $request->anniversary,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'nominee' => $request->nominee,
            'nominee_mobile' => $request->nominee_mobile,

        ]);

        return redirect()->back()->with('success', 'Personal details created successfully.');
    }

    public function personal_details_delete($id)
    {
        PersonalDetail::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Personal details transfer deleted successfully.');
    }
    public function personal_details_edit($id)
    {
        $PersonalDetail = PersonalDetail::orderby('id', 'desc')->get();
        $PersonalDetail_edit = PersonalDetail::where('id', $id)->first();
        $PlotTransfer = PlotTransfer::orderby('id', 'desc')->get();
        return view('panel.plot_transfer', [
            'PersonalDetail_edit' => $PersonalDetail_edit,
            'PlotTransfer' => $PlotTransfer, 
            'PersonalDetail' => $PersonalDetail
        ]);
    }
    public function personal_details_update(Request $request, $id)
    {

        $validator = Validator::make(
            $request->all(),
            [
            'spouse_name' => 'required|string|max:100',
            'spouse_mobile' => 'required|string|min:10|max:10',
            'anniversary' => 'required|string|max:50',
            'father_name' => 'required|string|max:100',
            'mother_name' => 'required|string|max:100',
            'nominee' => 'required|string|max:100',
            'nominee_mobile' => 'required|string|min:10|max:10',
        ]);
         if ($validator->fails()) {
            $errors = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message) {
                $errors .= $message . "<br>";
            }
            return back()->with(['error' => $errors]);
        }
        $PersonalDetail = PersonalDetail::where('id', $id)->first();
        $PersonalDetail->spouse_name = $request->spouse_name;
        $PersonalDetail->spouse_mobile = $request->spouse_mobile;
        $PersonalDetail->anniversary = $request->anniversary;
        $PersonalDetail->father_name = $request->father_name;
        $PersonalDetail->mother_name = $request->mother_name;
        $PersonalDetail->nominee = $request->nominee;
        $PersonalDetail->nominee_mobile = $request->nominee_mobile;
        $PersonalDetail->save();
        return redirect()->route('plot.transfer')->with('success', 'Personsal details updated successfully.');
    }

    public function plotShifting()
    {
        return view('panel.plot_Shifting');
    }
    public function plotedit_Sale()
    {
        return view('panel.edit_Sale');
    }
    public function plotedit_bank_loan_details()
    {
        return view('panel.edit_bank_details');
    }
}
