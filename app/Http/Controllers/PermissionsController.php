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

    }

    public function store(Request $request)
    {

    }

    public function edit()
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy(Request $request)
    {

    }
}
