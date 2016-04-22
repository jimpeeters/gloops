<?php

use Illuminate\Database\Seeder;

class LoopTagTableSeeder extends Seeder {

	public function run()
	{
		DB::table('loops_tags')->delete();

		$connections = array(

		array(
				'FK_loop_id' => '1',
				'FK_tag_id' => '9'
			),

		array(
				'FK_loop_id' => '2',
				'FK_tag_id' => '1'
			),

		array(
				'FK_loop_id' => '2',
				'FK_tag_id' => '4'
			),

		array(
				'FK_loop_id' => '2',
				'FK_tag_id' => '14'
			),

		array(
				'FK_loop_id' => '2',
				'FK_tag_id' => '9'
			),

		array(
				'FK_loop_id' => '3',
				'FK_tag_id' => '1'
			),

		array(
				'FK_loop_id' => '3',
				'FK_tag_id' => '14'
			),

		array(
				'FK_loop_id' => '3',
				'FK_tag_id' => '9'
			),

		array(
				'FK_loop_id' => '4',
				'FK_tag_id' => '9'
			),

		array(
				'FK_loop_id' => '4',
				'FK_tag_id' => '32'
			),

		array(
				'FK_loop_id' => '5',
				'FK_tag_id' => '34'
			),

		array(
				'FK_loop_id' => '5',
				'FK_tag_id' => '9'
			),

		array(
				'FK_loop_id' => '6',
				'FK_tag_id' => '32'
			),

		array(
				'FK_loop_id' => '6',
				'FK_tag_id' => '35'
			),

		array(
				'FK_loop_id' => '6',
				'FK_tag_id' => '9'
			),

		array(
				'FK_loop_id' => '7',
				'FK_tag_id' => '14'
			),

		array(
				'FK_loop_id' => '7',
				'FK_tag_id' => '9'
			),

		array(
				'FK_loop_id' => '8',
				'FK_tag_id' => '15'
			),

		array(
				'FK_loop_id' => '8',
				'FK_tag_id' => '9'
			),

		array(
				'FK_loop_id' => '9',
				'FK_tag_id' => '2'
			),

		array(
				'FK_loop_id' => '9',
				'FK_tag_id' => '9'
			),

		array(
				'FK_loop_id' => '10',
				'FK_tag_id' => '17'
			),

		array(
				'FK_loop_id' => '10',
				'FK_tag_id' => '9'
			),

		array(
				'FK_loop_id' => '11',
				'FK_tag_id' => '9'
			),

		array(
				'FK_loop_id' => '12',
				'FK_tag_id' => '4'
			),

		array(
				'FK_loop_id' => '12',
				'FK_tag_id' => '9'
			),

		array(
				'FK_loop_id' => '12',
				'FK_tag_id' => '14'
			),
			
		array(
				'FK_loop_id' => '13',
				'FK_tag_id' => '1'
			),
			
		array(
				'FK_loop_id' => '13',
				'FK_tag_id' => '9'
			),

		);

		DB::table('loops_tags')->insert($connections);

	}
}