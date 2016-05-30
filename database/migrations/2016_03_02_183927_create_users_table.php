<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name')->unique();
			$table->string('password', 60);
			$table->string('email', 255)->unique();
			$table->string('facebook_id')->nullable();
			$table->string('facebook_profile_picture')->nullable();
			$table->string('avatar');
			$table->integer('rating');
			$table->integer('rank');
			$table->rememberToken();
			$table->boolean('facebookAccount');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('users');
	}
}