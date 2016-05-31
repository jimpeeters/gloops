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
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->addSeconds(1)->toDateTimeString()
			),

		array(
				'name' => 'I Just Had Fun',
				'loop_path' => '/loops/main/loop-3.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(2)->toDateTimeString()
			),

		array(
				'name' => 'Blues In the Sky',
				'loop_path' => '/loops/main/loop-4.mp3',
				'FK_category_id' => '1',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(3)->toDateTimeString()
			),

		array(
				'name' => 'Clandestino Numero Uno',
				'loop_path' => '/loops/main/loop-5.mp3',
				'FK_category_id' => '10',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(4)->toDateTimeString()
			),

		array(
				'name' => 'Guitar Rumbles',
				'loop_path' => '/loops/main/loop-6.mp3',
				'FK_category_id' => '1',
				'FK_user_id' => '4',
				'created_at' => \Carbon\Carbon::now()->addSeconds(5)->toDateTimeString()
			),

		array(
				'name' => 'Climax of Rhythms',
				'loop_path' => '/loops/main/loop-7.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '4',
				'created_at' => \Carbon\Carbon::now()->addSeconds(6)->toDateTimeString()
			),

		array(
				'name' => 'Every Sunday',
				'loop_path' => '/loops/main/loop-8.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '5',
				'created_at' => \Carbon\Carbon::now()->addSeconds(7)->toDateTimeString()
			),

		array(
				'name' => 'Hear You Me',
				'loop_path' => '/loops/main/loop-9.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '5',
				'created_at' => \Carbon\Carbon::now()->addSeconds(8)->toDateTimeString()
			),

		array(
				'name' => 'Sleep Well',
				'loop_path' => '/loops/main/loop-10.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '2',
				'created_at' => \Carbon\Carbon::now()->addSeconds(9)->toDateTimeString()
			),

		array(
				'name' => 'Always With Me',
				'loop_path' => '/loops/main/loop-11.mp3',
				'FK_category_id' => '3',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(10)->toDateTimeString()
			),

		array(
				'name' => 'Summer Of 69',
				'loop_path' => '/loops/main/loop-12.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '4',
				'created_at' => \Carbon\Carbon::now()->addSeconds(11)->toDateTimeString()
			),

		array(
				'name' => 'Always Gold',
				'loop_path' => '/loops/main/loop-13.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(12)->toDateTimeString()
			),

		array(
				'name' => 'Stand by me',
				'loop_path' => '/loops/main/loop-14.mp3',
				'FK_category_id' => '3',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(13)->toDateTimeString()
			),

		array(
				'name' => 'Beach Medley',
				'loop_path' => '/loops/main/loop-15.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(14)->toDateTimeString()
			),

		array(
				'name' => 'Soft Ukulele',
				'loop_path' => '/loops/main/loop-16.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(15)->toDateTimeString()
			),

		array(
				'name' => 'Hey Soulsister',
				'loop_path' => '/loops/main/loop-17.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(16)->toDateTimeString()
			),

		array(
				'name' => 'Wonderfull world',
				'loop_path' => '/loops/main/loop-18.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(17)->toDateTimeString()
			),

		array(
				'name' => 'Fun Ukulele tune',
				'loop_path' => '/loops/main/loop-19.mp3',
				'FK_category_id' => '9',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(18)->toDateTimeString()
			),

		array(
				'name' => 'Im Yours',
				'loop_path' => '/loops/main/loop-20.mp3',
				'FK_category_id' => '2',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(19)->toDateTimeString()
			),

		array(
				'name' => 'The A-team',
				'loop_path' => '/loops/main/loop-21.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(20)->toDateTimeString()
			),

		array(
				'name' => '9 Crimes',
				'loop_path' => '/loops/main/loop-22.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(21)->toDateTimeString()
			),

		array(
				'name' => 'Blues Backing',
				'loop_path' => '/loops/main/loop-23.mp3',
				'FK_category_id' => '1',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(22)->toDateTimeString()
			),

		array(
				'name' => 'Dirtbag',
				'loop_path' => '/loops/main/loop-24.mp3',
				'FK_category_id' => '6',
				'FK_user_id' => '1',
				'created_at' => \Carbon\Carbon::now()->addSeconds(23)->toDateTimeString()
			),


		);

		DB::table('loops')->insert($loops);
    }
}
