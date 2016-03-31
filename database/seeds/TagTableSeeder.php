<?php

use Illuminate\Database\Seeder;

class TagTableSeeder extends Seeder {

	public function run()
	{
		DB::table('tags')->delete();

		$tags = array(

		array(
				'name' => 'Happy'
			),

		array(
				'name' => 'Sad'
			),

		array(
				'name' => 'Angry'
			),

		array(
				'name' => 'Summer'
			),

		array(
				'name' => 'Winter'
			),

		array(
				'name' => 'Autumn'
			),

		array(
				'name' => 'Spring'
			),

		array(
				'name' => 'Electric'
			),

		array(
				'name' => 'Acoustic'
			),

		array(
				'name' => 'Banjo'
			),

		array(
				'name' => 'Ukulele'
			),

		array(
				'name' => 'Chill'
			),

		array(
				'name' => 'Bass'
			),

		array(
				'name' => 'Cheerful'
			),

		array(
				'name' => 'Mellow'
			),

		array(
				'name' => 'Funny'
			),

		array(
				'name' => 'Sleepy'
			),

		array(
				'name' => 'Gibson'
			),

		array(
				'name' => 'Fender'
			),

		array(
				'name' => 'Ibanez'
			),

		array(
				'name' => 'Paul Reed Smith'
			),

		array(
				'name' => 'Epiphone'
			),

		array(
				'name' => 'Jackson'
			),

		array(
				'name' => 'ESP'
			),

		array(
				'name' => 'Yamaha'
			),

		array(
				'name' => 'Taylor'
			),

		array(
				'name' => 'Redwood'
			),

		array(
				'name' => 'Martin'
			),

		array(
				'name' => 'Schecter'
			),

		array(
				'name' => 'Gretsch'
			),

		array(
				'name' => 'Les Paul'
			),

		array(
				'name' => 'Groovy'
			),

		array(
				'name' => 'Funk'
			),

		array(
				'name' => 'Spanish'
			),

		array(
				'name' => 'Dirty'
			),



		);

		DB::table('tags')->insert($tags);
	}
}