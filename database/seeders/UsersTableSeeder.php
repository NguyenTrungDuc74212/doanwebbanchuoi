<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Roles;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();

        $adminRoles = Roles::where('name','admin')->first();
        $authorRoles = Roles::where('name','author')->first();
        $userRoles = Roles::where('name','user')->first();

        $admin = User::create([
         'name'=>'nguyễn đức',
         'email'=>'ductrung99@gmail.com',
         'type'=>'0',
         'password'=>bcrypt('12345678'),
         'gender'=>'1',
         'phone'=>'0328896748',
        ]);

        $author = User::create([
         'name'=>'nguyễn đức trung',
         'email'=>'trungduc@gmail.com',
         'type'=>'1',
         'password'=>bcrypt('12345678'),
         'gender'=>'1',
         'phone'=>'0328896748',
        ]);
         $user = User::create([
         'name'=>'Bùi thị nhàn',
         'email'=>'nhan@gmail.com',
         'type'=>'2',
         'password'=>bcrypt('12345678'),
         'gender'=>'0',
         'phone'=>'0328896748',
        ]);

         $admin->roles()->attach($adminRoles);
         $author->roles()->attach($authorRoles);
         $user->roles()->attach($userRoles);



    }
}
