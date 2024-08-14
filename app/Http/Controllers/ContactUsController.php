<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $contactus = ContactUs::orderBy('created_at', 'desc')->get();
        return view('frontend.contact-us', compact('contactus'));
    }
}