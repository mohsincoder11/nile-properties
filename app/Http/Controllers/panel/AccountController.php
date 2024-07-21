<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function exepence_entry()
    {
        return view('panel.expense_entry');
    }
    public function exepence_master()
    {
        return view('panel.expense_master');
    }
    public function income()
    {
        return view('panel.expense_income');
    }
}