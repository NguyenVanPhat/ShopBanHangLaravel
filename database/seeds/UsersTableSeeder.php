<?php

use Illuminate\Database\Seeder;
use App\Admin;
use App\Roles;
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

        $adminRoles=Roles::where('name','admin')->first();
        $authorRoles=Roles::where('name','author')->first();
        $userRoles=Roles::where('name','user')->first();

        $admin=Admin::create([
            'admin_name'=>'nguyenadmin',
            'admin_email'=>'admin@gmail.com',
            'admin_phone'=>'0922207717',
            'admin_password'=>md5('123456')     
        ]);

        $author=Admin::create([
            'admin_name'=>'nguyenauthor',
            'admin_email'=>'author@gmail.com',
            'admin_phone'=>'0922207717',
            'admin_password'=>md5('123456')    
        ]);

        $user=Admin::create([
            'admin_name'=>'nguyenuser',
            'admin_email'=>'user@gmail.com',
            'admin_phone'=>'0922207717',
            'admin_password'=>md5('123456')     
        ]);   

        $admin->roles()->attach($adminRoles);
        $author->roles()->attach($authorRoles);
        $user->roles()->attach($userRoles);

    }
}
