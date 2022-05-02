<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('admin.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'unique:roles,name']
        ]);

        $role = Role::create($data);
        $role->givePermissionTo($request->permissions);

        if ($request->save == 'rd')
            return redirect()->route('admin.roles.index')
                ->with('success', 'Role created sucessfully !');
        return redirect()->route('admin.roles.create')
            ->with('success', 'Role created sucessfully !');
    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update(Request $request, Role $role)
    {

        $data = $request->validate(['name' => ['required', 'string', 'unique:roles,name,' . $role->id]]);

        $role->update($data);

        $role->syncPermissions($request->permissions);
        return redirect()->route('admin.roles.index')->with('success', 'Role edited sucessfully !');
    }

    public function destroy(Role $role)
    {

        $role->delete();

        return redirect()->route('admin.roles.index')->with('success', 'Role Deleted Sucessfully');
    }
}
