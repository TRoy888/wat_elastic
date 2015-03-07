<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadUserForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('thread_user', function($table)
		{
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('thread_id')->references('id')->on('threads');
			$table->unique(array('thread_id', 'user_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('thread_user', function($table)
		{
			$table->dropForeign('thread_user_user_id_foreign');
			$table->dropForeign('thread_user_thread_id_foreign');
			$table->dropUnique('thread_user_thread_id_user_id_unique');
		});
	}

}
