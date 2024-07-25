<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AgreementMasterController extends Controller
{
    public function index()
    {
        return view('panel.agreement_master');
    }
}