<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permissions.index', compact('permissions'));
    }
    public function create()
    {
        return view('admin.permissions.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'unique:permissions,name'],
        ]);

        Permission::create($data);

        if ($request->save == 'rd')
            return redirect()->route('admin.permissions.index')
                ->with('success', 'Permission created sucessfully');
        return redirect()->route('admin.permissions.create')
            ->with('success', 'Permission created sucessfully');
    }

    public function show(Permission $permission)
    {
        //
    }

    public function edit(Permission $permission)
    {
        return view('admin.permissions.edit', compact('permission'));
    }

    public function update(Request $request, Permission $permission)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'unique:permissions,name,' . $permission->name],
        ]);

        $permission->update($data);

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission edited sucessfully');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();

        return redirect()->route('admin.permissions.index')
            ->with('success', 'Permission deleted sucessfully');
    }
}
