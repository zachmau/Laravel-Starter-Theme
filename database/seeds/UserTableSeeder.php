<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->first_name = 'User';
        $user->last_name = '1';
        $user->phone = '+123455555';
        $user->email = 'user@example.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->last_name = 'Manager Name';
        $admin->first_name = 'Manager Name';
        $admin->phone = '+1234555551';
        $admin->email = 'admin@example.com';
        $admin->password = bcrypt('password');
        $admin->save();
        $admin->roles()->attach($role_admin);
    }
}
