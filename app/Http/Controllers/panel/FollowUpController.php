<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FollowUpController extends Controller
{
    public function index()
    {
        return view('panel.follow_up');
    }
}