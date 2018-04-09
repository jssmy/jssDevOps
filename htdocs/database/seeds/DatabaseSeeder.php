<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         //$this->call(UsersTableSeeder::class);

         \App\User::create([
         	'slug'			=> str_random(10),
         	'name'			=> 'Joset Manihuari Yaricahua',
         	'profile_img'	=> 'img/user-profile/default.png',
         	'email'			=>	'jsssmy@jssdevops.com',
            'type'          => 'admin',
         	'password'		=> Hash::make('123456789')
         ]);

    }
}
