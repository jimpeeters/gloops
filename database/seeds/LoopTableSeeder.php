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
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),
		array(
				'name' => 'Happy Beach Moment',
				'loop_path' => '/loops/main/loop-2.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'I Just Had Fun',
				'loop_path' => '/loops/main/loop-3.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Blues In the Sky',
				'loop_path' => '/loops/main/loop-4.mp3',
				'FK_category_id' => '1',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Clandestino Numero Uno',
				'loop_path' => '/loops/main/loop-5.mp3',
				'FK_category_id' => '5',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Guitar Rumbles',
				'loop_path' => '/loops/main/loop-6.mp3',
				'FK_category_id' => '1',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Climax of Rhythms',
				'loop_path' => '/loops/main/loop-7.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Every Sunday',
				'loop_path' => '/loops/main/loop-8.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Hear You Me',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Sleep Well',
				'loop_path' => '/loops/main/loop-10.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Always With Me',
				'loop_path' => '/loops/main/loop-11.mp3',
				'FK_category_id' => '3',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Summer Of 68',
				'loop_path' => '/loops/main/loop-12.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Always Gold',
				'loop_path' => '/loops/main/loop-13.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Stand by me',
				'loop_path' => '/loops/main/loop-14.mp3',
				'FK_category_id' => '3',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Beach Medley',
				'loop_path' => '/loops/main/loop-15.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Soft Ukulele',
				'loop_path' => '/loops/main/loop-16.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Hey Soulsister',
				'loop_path' => '/loops/main/loop-17.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'Wonderfull world',
				'loop_path' => '/loops/main/loop-18.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 1',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 2',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '3',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 3',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 4',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 5',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 6',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 7',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 8',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 9',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 10',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 11',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 12',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 13',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 14',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 15',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 16',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 17',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 18',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 19',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),

		array(
				'name' => 'TestLoop 20',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->toDateTimeString()
			),
		);

		DB::table('loops')->insert($loops);
    }
}
