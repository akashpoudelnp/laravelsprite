<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Mail\RegisteredMail;
use App\Mail\RegisteredUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function create(): View
    {
        $roles = Role::all();

        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
        ]);

        $data['password'] = bcrypt($request->password);

        $user = User::create($data);
        $user->syncRoles($request->roles);
        Mail::to($user)->send(new RegisteredUser($user));
        if ($request->save == 'rd')
            return redirect()->route('admin.users.index')
                ->with('success', 'User Created Sucessfully');
        return redirect()->route('admin.users.create')
            ->with('success', 'User Created Sucessfully');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'min:6'],
        ]);

        if (!empty($request->password)) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);
        $user->syncRoles($request->roles);

        return redirect()->route('admin.users.index')
            ->with('success', 'User Edited Sucessfully');
    }

    public function destroy(User $user)
    {
        if (auth()->id() == $user->id) {
            return redirect()->route('admin.users.index')
                ->with('error', 'There was a problem deleting this user !');
        }

        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted Sucessfully !');
    }
}
