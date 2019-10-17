<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        DB::table('role_user')->truncate();

        $adminRole = Role::where('name', 'admin')->first();
        $authorRole = Role::where('name', 'author')->first();
        $userRole = Role::where('name', 'user')->first();

        $admin = User::create([
        	'name' => 'admin',
        	'email' => 'admin@admin.com',
        	'phone' => '1234567890',
        	'password' => bcrypt('admin')
        ]);

        $author = User::create([
        	'name' => 'author',
        	'email' => 'author@author.com',
        	'phone' => '1112131415',
        	'password' => bcrypt('author')
        ]);

        $user = User::create([
        	'name' => 'user',
        	'email' => 'user@user.com',
        	'phone' => '1617181920',
        	'password' => bcrypt('user')
        ]);

        $admin->roles()->attach($adminRole);
        $author->roles()->attach($authorRole);
        $user->roles()->attach($userRole);
    }
}
