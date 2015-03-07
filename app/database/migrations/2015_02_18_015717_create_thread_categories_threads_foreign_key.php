<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadCategoriesThreadsForeignKey extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('thread_category_thread', function($table)
		{
			$table->foreign('thread_id')->references('id')->on('threads');
			$table->foreign('thread_category_id')->references('id')->on('thread_categories');
			$table->unique(array('thread_category_id', 'thread_id'));
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('thread_category_thread', function($table)
		{
			$table->dropForeign('thread_category_thread_thread_id_foreign');
			$table->dropForeign('thread_category_thread_thread_category_id_foreign');
			$table->dropUnique('thread_category_thread_thread_category_id_thread_id_unique');
		});
	}

}
