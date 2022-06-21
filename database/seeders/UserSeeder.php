<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password'),
        ]);

        $role = Role::create(['name' => 'super_admin']);

        $user->assignRole($role);

        $permission = Permission::create(['name' => 'can_dashboard']);
        $permission = Permission::create(['name' => 'can_crud_users']);
        $permission = Permission::create(['name' => 'can_crud_roles']);
        $permission = Permission::create(['name' => 'can_crud_permissions']);
        $permission = Permission::create(['name' => 'can_crud_posts']);
        $permission = Permission::create(['name' => 'can_console']);

        $role->givePermissionTo(Permission::all());
    }
}
