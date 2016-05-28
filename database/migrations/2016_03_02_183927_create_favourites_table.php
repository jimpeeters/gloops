<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavouritesTable extends Migration {

	public function up()
	{
		Schema::create('favourites', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('FK_user_id')->unsigned();
			$table->integer('FK_loop_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('favourites');
	}
}