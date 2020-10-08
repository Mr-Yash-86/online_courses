<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $admin = User::create([
        	'name'		=> 'Admin',  	
        	'email'		=>	'admin@gmail.com',
        	'password'	=>	Hash::make('123456'),
        	
        ]);
        $admin->assignRole('admin');

         $user = User::create([
            'name'      => 'User1',
            'email'     =>  'user1@gmail.com',
            'password'  =>  Hash::make('123456'),
            
        ]);
         $user->assignRole('user');
    }
}
