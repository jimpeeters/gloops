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
				'password' => Hash::make('root'),
				'email' => 'jim.peeters.93@gmail.com',
				'avatar' => '/images/profilePictures/admin.jpg',
				'facebookAccount' => false,
				'rating' => 0

			),

		array(
				'name' => 'Dummy',
				'password' => Hash::make('root'),
				'email' => 'dummy@hotmail.com',
				'avatar' => '/images/profilePictures/dummy.jpg',
				'facebookAccount' => false,
				'rating' => 0
			),

		);

		DB::table('users')->insert($users);
    }
}
