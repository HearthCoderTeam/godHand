<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function create(Request $request)
    {
        Role::create(['role_name' => $request->role_name]);

        return json_encode('Role has been added');
    }
}
