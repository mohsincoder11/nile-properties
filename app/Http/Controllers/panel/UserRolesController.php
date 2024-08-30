<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{UserRoles};

class UserRolesController extends Controller
{
    public function userRoles()
    {
        return view('panel.user-roles');
    }

    public function userRolesStore(Request $request)
    {
        $role = new UserRoles();
        $role->role = $request->role;
        $role->permission = $request->permission;

        $role->save();


        return redirect()->back()->with('success', 'Role Added Successfully');
    }
}
