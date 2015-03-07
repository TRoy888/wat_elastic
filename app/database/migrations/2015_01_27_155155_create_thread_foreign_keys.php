<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('threads', function($table)
		{
			$table->foreign('user_id')->references('id')->on('users');
			// $table->foreign('category_id')->references('id')->on('thread_categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('threads', function($table){
			$table->dropForeign('threads_user_id_foreign');
			// $table->dropForeign('threads_category_id_foreign');
		});
	}

}
