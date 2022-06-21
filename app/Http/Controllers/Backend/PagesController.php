<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PagesController extends Controller
{
    public function index()
    {
        $dashcards = [
            ['name' => 'Users', 'count' => User::count(), 'icon' => 'tabler-users', 'color' => 'bg-red',],
            ['name' => 'Roles', 'count' => Role::count(), 'icon' => 'tabler-list', 'color' => 'bg-green',],
            ['name' => 'Permissions', 'count' => Permission::count(), 'icon' => 'tabler-key', 'color' => 'bg-blue',],
        ];

        $dashcards = collect($dashcards);

        return view('admin.index', compact('dashcards'));
    }
    public function console()
    {
        return view('admin.console.index');
    }
    public function consoleExecute(Request $request)
    {
        if (empty($request->command)) {
            return "Please enter a command";
        }
        // remove spaces from start and end
        $command = trim($request->command);
        try {
            Artisan::call($command);
        } catch (Exception $e) {
            return "Error: {$e->getMessage()}";
        }
        return Artisan::output();
    }
}
