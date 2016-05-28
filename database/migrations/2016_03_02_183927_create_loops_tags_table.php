<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLoopsTagsTable extends Migration {

	public function up()
	{
		Schema::create('loops_tags', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('FK_loop_id')->unsigned();
			$table->integer('FK_tag_id')->unsigned();
			$table->onDelete('cascade');
		});
	}

	public function down()
	{
		Schema::drop('loops_tags');
	}
}