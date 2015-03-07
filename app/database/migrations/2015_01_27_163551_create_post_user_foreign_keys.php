<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostUserForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('post_user', function($table)
		{
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('post_id')->references('id')->on('posts');
			$table->unique(array('post_id', 'user_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('post_user', function($table)
		{
			$table->dropForeign('post_user_user_id_foreign');
			$table->dropForeign('post_user_post_id_foreign');
			$table->dropUnique('post_user_post_id_user_id_unique');
		});
	}

}
