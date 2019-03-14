<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserSeeder extends Seeder
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

        $user = new User("admin", "", "admin@example.com", bcrypt("test123456"));
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User("user", "", "user@example.com", bcrypt("test123456"));
        $user->save();
        $user->roles()->attach($role_user);

        
        
    }
}
