<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	DB::table('users')->delete();

		$users = array(

		array(
				'name' => 'Gloops',
				'password' => Hash::make('rootroot'),
				'email' => 'jim.peeters.93@gmail.com',
				'avatar' => '/images/profilePictures/admin.jpg',
				'facebookAccount' => false,
				'rating' => 500,
				'rank' => 5

			),

		array(
				'name' => 'JuliaStar',
				'password' => Hash::make('rootroot123'),
				'email' => 'dummy@hotmail.com',
				'avatar' => '/images/profilePictures/JuliaStar.jpg',
				'facebookAccount' => false,
				'rating' => 0,
				'rank' => 1
			),


		array(
				'name' => 'LucPeeters',
				'password' => Hash::make('rootroot'),
				'email' => 'luc@hotmail.com',
				'avatar' => '/images/profilePictures/LucPeeters.jpg',
				'facebookAccount' => false,
				'rating' => 0,
				'rank' => 1
			),

		array(
				'name' => 'Gustavo',
				'password' => Hash::make('rootroot123'),
				'email' => 'dummy2@hotmail.com',
				'avatar' => '/images/profilePictures/Gustavo.jpg',
				'facebookAccount' => false,
				'rating' => 0,
				'rank' => 1
			),

		array(
				'name' => 'Robert',
				'password' => Hash::make('rootroot'),
				'email' => 'dummy3@hotmail.com',
				'avatar' => '/images/profilePictures/Robert.jpg',
				'facebookAccount' => false,
				'rating' => 0,
				'rank' => 1
			),

		array(
				'name' => 'Tom Rocker',
				'password' => Hash::make('rootroot'),
				'email' => 'dummy4@hotmail.com',
				'avatar' => '/images/profilePictures/JuliaStar.jpg',
				'facebookAccount' => false,
				'rating' => 0,
				'rank' => 1
			),

		array(
				'name' => 'Gino Pietermaai',
				'password' => Hash::make('rootroot'),
				'email' => 'dummy5@hotmail.com',
				'avatar' => '/images/profilePictures/JuliaStar.jpg',
				'facebookAccount' => false,
				'rating' => 0,
				'rank' => 1
			),

		);

		DB::table('users')->insert($users);
    }
}
