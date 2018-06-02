<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    public function index()
    {
        $permissions = Permission::orderBy('name', 'asc')->paginate(10);
        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        return view('permissions.create');
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|min:3|unique:permissions,name',
        ]);

        Permission::create($data);

        return redirect()->route('permissions.index');
    }

    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request)
    {
        $data = $this->validate($request, [
            'name' => 'required|min:3|unique:permissions,name',
            'id' => 'required'
        ]);

        $permission = Permission::findOrFail($data['id']);
        $permission->name = $data['name'];
        $permission->save();

        return redirect()->route('permissions.edit', $permission->id);
    }

    public function destroy(Request $request)
    {
        $data = $this->validate($request, [
            'id' => 'required',
        ]);

        $permission = Permission::findById($data['id']);
        $permission->delete();

        return redirect()->route('permissions.index');
    }
}
