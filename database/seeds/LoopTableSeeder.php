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
				'loop_path' => '/loops/main/loop.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 9789
			),
		array(
				'name' => 'Happy Beach Moment',
				'loop_path' => '/loops/main/loop-2.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 8330
			),

		array(
				'name' => 'I Just Had Fun',
				'loop_path' => '/loops/main/loop-3.wav',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 4833
			),

		array(
				'name' => 'Blues In the Sky',
				'loop_path' => '/loops/main/loop-4.wav',
				'FK_category_id' => '1',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 20582
			),

		array(
				'name' => 'Clandestino Numero Uno',
				'loop_path' => '/loops/main/loop-5.wav',
				'FK_category_id' => '5',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 21011
			),

		array(
				'name' => 'Guitar Rumbles',
				'loop_path' => '/loops/main/loop-6.wav',
				'FK_category_id' => '1',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 3295
			),

		array(
				'name' => 'Climax of Rhythms',
				'loop_path' => '/loops/main/loop-7.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 6578
			),

		array(
				'name' => 'Every Sunday',
				'loop_path' => '/loops/main/loop-8.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 4994
			),

		array(
				'name' => 'Hear You Me',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'Sleep Well',
				'loop_path' => '/loops/main/loop-10.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 3530
			),

		array(
				'name' => 'Always With Me',
				'loop_path' => '/loops/main/loop-11.wav',
				'FK_category_id' => '3',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 19561
			),

		array(
				'name' => 'Summer Of 68',
				'loop_path' => '/loops/main/loop-12.wav',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 28136
			),

		array(
				'name' => 'Always Gold',
				'loop_path' => '/loops/main/loop-13.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 5851
			),

		array(
				'name' => 'TEST 2',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 3',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 4',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 5',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 6',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 7',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 8',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 9',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 10',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 11',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 12',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 13',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 14',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 15',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 16',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 17',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 18',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 19',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),

		array(
				'name' => 'TEST 20',
				'loop_path' => '/loops/main/loop-9.wav',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
				'duration' => 17042
			),
		);

		DB::table('loops')->insert($loops);
    }
}
