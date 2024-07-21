<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EnquiryForm;


class DashboardController extends Controller
{
    public function dashboard(){
        $enquiry = EnquiryForm::all();
        return view('panel.dashboard',['enquiry'=>$enquiry]);
    }
	
	  public function home(){
        $enquiry = EnquiryForm::all();
        return view('panel.dashboard',['enquiry'=>$enquiry]);
    }


    public function destroyDash($id){
        $enquiry = EnquiryForm::find($id);
        if($enquiry){
            $enquiry->delete();
            return redirect(route('dashboard'))->with('success', 'Enquiry Deleted Successfully' );
        }

    }
}
