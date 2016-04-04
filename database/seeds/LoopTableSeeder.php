<?php

use Illuminate\Database\Seeder;

class LoopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       	DB::table('loops')->delete();

		$loops = array(

		array(
				'name' => 'The Beauty of Discipline',
				'loop_path' => '/loops/main/loop.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1'
			),
		array(
				'name' => 'Happy Beach Moment',
				'loop_path' => '/loops/main/loop-2.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1'
			),

		array(
				'name' => 'I Just Had Fun',
				'loop_path' => '/loops/main/loop-3.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '1'
			),

		array(
				'name' => 'Blues In the Sky',
				'loop_path' => '/loops/main/loop-4.mp3',
				'FK_category_id' => '1',
				'FK_user_id' => '1'
			),

		array(
				'name' => 'Clandestino Numero Uno',
				'loop_path' => '/loops/main/loop-5.mp3',
				'FK_category_id' => '5',
				'FK_user_id' => '1'
			),

		array(
				'name' => 'Guitar Rumbles',
				'loop_path' => '/loops/main/loop-6.mp3',
				'FK_category_id' => '1',
				'FK_user_id' => '1'
			),

		array(
				'name' => 'Climax of Rhythms',
				'loop_path' => '/loops/main/loop-7.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1'
			),

		array(
				'name' => 'Every Sunday',
				'loop_path' => '/loops/main/loop-8.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1'
			),

		array(
				'name' => 'Hear You Me',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1'
			),
		);

		DB::table('loops')->insert($loops);
    }
}