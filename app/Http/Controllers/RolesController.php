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
        $data = $this->validate($request, [
            'id' => 'required',
        ]);

        $role = Role::findById($data['id']);
        $role->delete();

        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('roles.edit', compact('role'));
    }

    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|min:3|unique:roles,name',
            'id' => 'required',
        ]);

        $role = Role::findById($data['id']);
        $role->name = $data['name'];
        $role->save();

        return redirect()->route('roles.edit', $role->id);
    }
}
