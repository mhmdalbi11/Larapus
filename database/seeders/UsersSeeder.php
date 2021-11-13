<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // membuat role admin
        $adminRole = new Role;
        $adminRole->name = "admin";
        $adminRole->display_name = "Admin Larapus";
        $adminRole->save();

        // membuat role member
        $memberRole = new Role;
        $memberRole->name = "member";
        $memberRole->display_name = "Member Larapus";
        $memberRole->save();

        // membuat sample admin
        $admin = new User;
        $admin->name = "Admin Larapus";
        $admin->email = "admin@gmail.com";
        $admin->password = bcrypt("qwerty12345");
        $admin->save();
        $admin->attachRole($adminRole);

        // note : bcrypt = hampir sama kaya MD5 cuma bcryptlebih kuat
        //        attach = mengelola banyak data

        // membuat sample member
        $member = new User;
        $member->name = "Member Larapus";
        $member->email = "member@gmail.com";
        $member->password = bcrypt("katasandi");
        $member->save();
        $member->attachRole($memberRole);

    }
}
