<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadCategoriesUsersForeignKey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('thread_category_user', function($table)
		{
			$table->foreign('user_id')->references('id')->on('users');
			$table->foreign('thread_category_id')->references('id')->on('thread_categories');
			$table->unique(array('thread_category_id', 'user_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('thread_category_user', function($table)
		{
			$table->dropForeign('thread_category_user_user_id_foreign');
			$table->dropForeign('thread_category_user_thread_category_id_foreign');
			$table->dropUnique('thread_category_user_thread_category_id_user_id_unique');
		});
	}

}
