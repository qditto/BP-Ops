<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function getUser()
    {
        $user = \Auth::user();
        $role = $user->roles()->get()->whereNotIn('name',['admin','user','restricted'])->pluck('name');
        $permissions = $user->getPermissionsViaRoles()->pluck('name');
        $user->role = $role->first();
        $user->can = $permissions;
        return response()->json($user, 200);

    }
}
