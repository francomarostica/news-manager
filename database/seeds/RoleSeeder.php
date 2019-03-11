<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = (new Role("admin", "System administrator"))->save();
        $role = (new Role("editor", "Users that can edit articles and/or categories"))->save();
        $role = (new Role("user", "Final user"))->save();
    }
}
