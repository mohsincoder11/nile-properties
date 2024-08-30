<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{UserRoles};

class UserRolesController extends Controller
{
    public function userRoles()
    {
        $role = UserRoles::all();
        return view('panel.user-roles', compact('role'));
    }

    public function userRolesStore(Request $request)
    {
        $role = new UserRoles();
        $role->role = $request->role;
        $role->permission = $request->permission;

        $role->save();


        return redirect()->back()->with('success', 'Role Added Successfully');
    }

    public function UserRolesEdit($id)
    {
        $roleEdit = UserRoles::find($id);
        return view('panel.user-roles-edit', compact('roleEdit'));
    }

    public function UserRolesUpdate(Request $request)
    {

        $user = UserRoles::find($request->id);
        $user->role = $request->role;
        $user->permission = $request->permission;

        $user->save();


        return redirect(route('user-roles'))->with('success', 'Successfully Updated !');
    }
}

