<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder {

	public function run()
	{
		DB::table('categories')->delete();

		$categories = array(

		array(
				'name' => 'Blues'
			),

		array(
				'name' => 'Pop'
			),

		array(
				'name' => 'Rock'
			),

		array(
				'name' => 'Country'
			),

		array(
				'name' => 'Flamenco'
			),

		array(
				'name' => 'Alternative'
			),

		array(
				'name' => 'Punk'
			),

		);

		DB::table('categories')->insert($categories);
	}
}