<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlotTransfercontroller extends Controller
{
    public function plottransfer()
    {
        return view('panel.plot_transfer');
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