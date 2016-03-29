<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoopsTable extends Migration {

	public function up()
	{
		Schema::create('loops', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name', 35);
			$table->string('loop_path', 255);
			$table->integer('FK_category_id')->unsigned();
			$table->string('FK_user_id');
		});
	}

	public function down()
	{
		Schema::drop('loops');
	}
}