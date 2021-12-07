<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function change_roles(Request $request)
    {
        foreach ($request->all() as $id => $role) {
            if ($id == '_token') {
                continue;
            }
            $user = User::find($id);
            if (config('roles')[$user->role] != $role) {
                $user->role = $role;
                $user->save();
            }
        }
        return back();
    }
}
