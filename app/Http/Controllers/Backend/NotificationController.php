<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends Controller
{

    public function index()
    {
        $notifications = Notification::all();
        return view('admin.notifications.index', compact('notifications'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.notifications.create', compact('users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'users' => ['required', 'exists:users,id'],
            'type' => 'required',
            'data' => 'required',
        ]);
        DB::transaction(function () use ($data) {
            $notification = Notification::create($data);
            $notification->users()->attach($data['users']);
        });
        return redirect()->route('admin.notifications.index')->with('success', 'Notification created successfully');
    }

    public function edit(Notification $notification)
    {
        $users = User::all();
        return view('admin.notifications.edit', compact('notification', 'users'));
    }

    public function update(Request $request, Notification $notification)
    {
        $data = $request->validate([
            'users' => ['required', 'exists:users,id'],
            'type' => 'required',
            'data' => 'required',
        ]);
        $notification->update($data);
        $notification->users->sync($data['users']);
        return redirect()->route('admin.notifications.index')->with('success', 'Notification updated successfully');
    }

    public function markAsRead(Notification $notification, User $user)
    {
        $user->notifications()->where('notification_id', $notification->id)->update(['read_at' => now()]);
        return response()->json(['status' => 'success']);
    }

    public function destroy(Notification $notification)
    {

        $notification->users()->detach();
        $notification->delete();
        return redirect()->route('admin.notifications.index')->with('success', 'Notification deleted successfully');
    }
}
