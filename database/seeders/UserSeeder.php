<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_role=Role::create(['name'=>'super_admin']);
        $admin_role=Role::create(['name'=>'admin']);
        $normal_user=Role::create(['name'=>'user']);

        $user=User::create([
            'name'=>'Bahadur',
            'email'=>'bahadur@gmail.com',
            'password'=>Hash::make('password')
        ]);
        $user->assignRole($super_role);
        
        Permission::create(['name'=>'edit_users']);
        Permission::create(['name'=>'view_users']);
        Permission::create(['name'=>'create_users']);
        Permission::create(['name'=>'read_users']);
        Permission::create(['name'=>'delete_users']);
        Permission::create(['name'=>'assign_roles']);

        Permission::create(['name'=>'edit_roles']);
        Permission::create(['name'=>'view_roles']);
        Permission::create(['name'=>'create_roles']);
        Permission::create(['name'=>'read_roles']);
        Permission::create(['name'=>'delete_roles']);
        Permission::create(['name'=>'browse_roles']);
        $super_role->givePermissionTo(Permission::all());
    }
}
