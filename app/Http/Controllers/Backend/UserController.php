<?php

namespace App\Http\Controllers\Backend;

use PDF;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use App\Mail\RegisteredMail;
use App\Mail\RegisteredUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Permission;

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
        $new_password = $data['password'];
        $data['password'] = bcrypt($request->password);

        $user = User::create($data);
        $user->syncRoles($request->roles);
        try {
            Mail::to($user)->queue(new RegisteredUser($user, $new_password));
        } catch (Exception $e) {
            return redirect()->route('admin.users.index')
                ->with('warning', 'User Created but cannot be mailed, Reason: mail server is unreachable');
        }
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
    public function generatePdf()
    {
        $users = User::all();
        $pdf = PDF::loadView('pdf.users', compact('users'));
        return $pdf->stream('document.pdf');
    }
    // send reset password link to user
    public function resetLink(User $user)
    {
        $token = rand(
            100000,
            999999
        );
        if (DB::table('password_resets')->where('token', $token)->exists()) {
            $token = rand(
                100000,
                999999
            );
        }

        if (DB::table('password_resets')->where('email', $user->email)->exists()) {
            DB::table('password_resets')->where('email', $user->email)->update(['token' => $token]);
        } else {
            DB::table('password_resets')->insert(
                [
                    'email' => $user->email, 'token' => $token,
                    'created_at' => now()
                ]
            );
        }


        Mail::send('emails.resetpassword', ['user' => $user, 'token' => $token], function ($message) use ($user) {
            $message->to($user->email);
            $message->subject('Reset Password');
        });
        return redirect()->route('admin.users.index')
            ->with('success', "Reset Password Link Sent to  $user->name !");
    }
    public function resetPasswordView($token)
    {

        $data = DB::table('password_resets')->where('token', $token)->first();
        // check if expired
        if (!DB::table('password_resets')->where('token', $token)->exists()) {
            Session::put('token_expired', 'The reset link is invalid or has expired.');
            return view('resetpassword', compact('token'));
        }
        if (Carbon::parse($data->created_at)->addMinutes(config('app.password_reset_expiration'))->isPast()) {
            DB::table('password_resets')->where('token', $token)->delete();
            Session::put('token_expired', 'The reset link is expired');
        } else {
            Session::remove('token_expired');
        }
        return view('resetpassword', compact('token'));
    }
    public function changePassword(Request $request)
    {
        if (DB::table('password_resets')->where('token', $request->user_token)->where('email', $request->email)->exists()) {
            $reset = DB::table('password_resets')->where('token', $request->user_token)->where('email', $request->email)->first();
            if (Carbon::parse($reset->created_at)->addMinutes(config('app.password_reset_expiration'))->isPast()) {

                return redirect()->back()
                    ->with('error', 'Reset Password Link Expired !');
            }
            $user = User::where('email', $request->email)->first();
            $user->password = bcrypt($request->password);
            $user->update();
            DB::table('password_resets')->where('token', $request->user_token)->where('email', $request->email)->delete();
            return view('password-resetted');
        } else {

            return redirect()->back()->with('error', 'Cannot update password, an error has occured. Check your email or try again later.');
        }
    }
}
