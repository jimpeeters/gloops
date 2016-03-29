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
				'loop_path' => '/loops/main/loop_1.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1'
			),
		array(
				'name' => 'The Beauty of Discipline II',
				'loop_path' => '/loops/main/loop_2.mp3',
				'FK_category_id' => '5',
				'FK_user_id' => '1'
			),
		);

		DB::table('loops')->insert($loops);
    }
}
