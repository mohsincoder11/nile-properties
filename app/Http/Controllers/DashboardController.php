<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Stories;
use App\Models\Collaborators;
use Illuminate\Http\Request;
use App\Models\Quiz;
use App\Models\Meet;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->get();
		$totalUsersCount = User::count();
		$Stories = Stories::count();
		$Collaborators = Collaborators::count();
		$Quiz = Quiz::count();
			$Meet = Meet::count();

        return view('frontend.Dashboard', compact('users','totalUsersCount','Stories','Collaborators','Quiz','Meet'));
    }

}