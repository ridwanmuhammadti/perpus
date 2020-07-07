<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::insert([
            [
             
              'name'  			=> 'Herwanda',
              
              'email' 			=> 'herwanda@gmail.com',
              'password'		=> bcrypt('herwanda123'),
             
              'role'			=> 'admin',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              
              'name'  			=> 'ridwan muhammad',
             
              'email' 			=> 'ridwan@gmail.com',
              'password'		=> bcrypt('ridwan123'),
           
              'role'			=> 'anggota',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              
                'name'  			=> 'Muja',
               
                'email' 			=> 'muja@gmail.com',
                'password'		=> bcrypt('muja123'),
             
                'role'			=> 'anggota',
                'remember_token'	=> NULL,
                'created_at'      => \Carbon\Carbon::now(),
                'updated_at'      => \Carbon\Carbon::now()
              ]
        ]);
    }
}
