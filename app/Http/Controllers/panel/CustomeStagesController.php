<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomeStagesController extends Controller
{
    public function registrationChecklist()
    {
        return view('panel.registration_checklist');
    }

    public function initiatesale()
    {
        return view('panel.initiate_sale');
    }

    public function newsale()
    {
        return view('panel.new_sale');
    }


    public function registration()
    {
        return view('panel.registration');
    }
    public function account()
    {
        return view('panel.account');
    }


    public function legalclearance()
    {
        return view('panel.legal_clearance');
    }
    public function registrationcompleted()
    {
        return view('panel.registration_completed');
    }

    public function saledeedscan()
    {
        return view('panel.saledeed_scan');
    }
    public function handover()
    {
        return view('panel.handover');
    }
}
