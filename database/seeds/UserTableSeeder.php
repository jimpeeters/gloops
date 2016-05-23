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
				'name' => 'Admin',
				'password' => Hash::make('rootroot'),
				'email' => 'jim.peeters.93@gmail.com',
				'avatar' => '/images/profilePictures/admin.jpg',
				'facebookAccount' => false,
				'rating' => 0,
				'rank' => 1

			),

		array(
				'name' => 'Bobby',
				'password' => Hash::make('rootroot'),
				'email' => 'dummy@hotmail.com',
				'avatar' => '/images/profilePictures/dummy.jpg',
				'facebookAccount' => false,
				'rating' => 0,
				'rank' => 1
			),

		array(
				'name' => 'RockingJohny',
				'password' => Hash::make('rootroot'),
				'email' => 'dummy2@hotmail.com',
				'avatar' => '/images/profilePictures/dummy.jpg',
				'facebookAccount' => false,
				'rating' => 0,
				'rank' => 1
			),

		array(
				'name' => 'Ricky',
				'password' => Hash::make('rootroot'),
				'email' => 'dummy3@hotmail.com',
				'avatar' => '/images/profilePictures/dummy.jpg',
				'facebookAccount' => false,
				'rating' => 0,
				'rank' => 1
			),

		array(
				'name' => 'Tom Rocker',
				'password' => Hash::make('rootroot'),
				'email' => 'dummy4@hotmail.com',
				'avatar' => '/images/profilePictures/dummy.jpg',
				'facebookAccount' => false,
				'rating' => 0,
				'rank' => 1
			),

		array(
				'name' => 'Gino Pietermaai',
				'password' => Hash::make('rootroot'),
				'email' => 'dummy5@hotmail.com',
				'avatar' => '/images/profilePictures/dummy.jpg',
				'facebookAccount' => false,
				'rating' => 0,
				'rank' => 1
			),

		);

		DB::table('users')->insert($users);
    }
}
