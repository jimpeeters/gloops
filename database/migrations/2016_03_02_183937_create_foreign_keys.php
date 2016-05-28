<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('loops', function(Blueprint $table) {
			$table->foreign('FK_category_id')->references('id')->on('categories')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('loops_tags', function(Blueprint $table) {
			$table->foreign('FK_loop_id')->references('id')->on('loops')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('loops_tags', function(Blueprint $table) {
			$table->foreign('FK_tag_id')->references('id')->on('tags')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('favourites', function(Blueprint $table) {
			$table->foreign('FK_user_id')->references('id')->on('users')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
		Schema::table('favourites', function(Blueprint $table) {
			$table->foreign('FK_loop_id')->references('id')->on('loops')
						->onDelete('cascade')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('loops', function(Blueprint $table) {
			$table->dropForeign('loops_FK_category_id_foreign');
		});
		Schema::table('loops_tags', function(Blueprint $table) {
			$table->dropForeign('loops_tags_FK_loop_id_foreign');
		});
		Schema::table('loops_tags', function(Blueprint $table) {
			$table->dropForeign('loops_tags_FK_tag_id_foreign');
		});
		Schema::table('favourites', function(Blueprint $table) {
			$table->dropForeign('favourites_FK_user_id_foreign');
		});
		Schema::table('favourites', function(Blueprint $table) {
			$table->dropForeign('favourites_FK_loop_id_foreign');
		});
	}
}