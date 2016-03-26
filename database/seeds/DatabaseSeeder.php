<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UserTableSeeder');
		$this->command->info('users table seeded!');

		$this->call('CategoryTableSeeder');
		$this->command->info('categories table seeded!');

		$this->call('LoopTableSeeder');
		$this->command->info('loops table seeded!');
    }
}
