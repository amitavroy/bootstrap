<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name', 'asc')->paginate(10);
        return view('roles.index', compact('roles'));
    }

    public function create()
    {
        return view('roles.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|min:3|unique:roles,name',
        ]);

        Role::create(['name' => $data['name']]);

        return redirect()->route('roles.add');
    }

    public function destroy(Request $request)
    {
        return $request->all();
    }
}
