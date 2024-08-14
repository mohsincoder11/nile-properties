<?php

namespace App\Http\Controllers;

use App\Models\WriteForUs;
use Illuminate\Http\Request;

class WriteForUsController extends Controller
{
    public function index()
    {
        $WriteForUs = WriteForUs::orderBy('created_at', 'desc')->get();
        return view('frontend.write-for-us', compact('WriteForUs'));
    }
}