<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Roles;
use DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        DB::table('admin_roles')->truncate();
        $adminRoles = Roles::where('name','Admin')->first();
        $authorRoles = Roles::where('name','Author')->first();
        $userRoles = Roles::where('name','User')->first();
        $admin = Admin::create([
            'admin_name' => 'Admin',
            'admin_email' => 'admin@gmail.com',
            'admin_phone' => '123456789',
            'admin_password' => '123456'
        ]);
        $author = Admin::create([
            'admin_name' => 'Author',
            'admin_email' => 'author@gmail.com',
            'admin_phone' => '123456789',
            'admin_password' => '123456'
        ]);
        $user = Admin::create([
            'admin_name' => 'User',
            'admin_email' => 'user@gmail.com',
            'admin_phone' => '123456789',
            'admin_password' => '123456'
        ]);
        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);
    }
}
