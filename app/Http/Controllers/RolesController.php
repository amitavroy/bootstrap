<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->paginate(10);

        return view('roles.index', compact('roles'));
    }
}
