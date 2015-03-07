<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadCategoryForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('thread_categories', function($table)
		{
			// $table->foreign('thread_category_id')->references('id')->on('thread_categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('thread_categories', function($table)
		{
			// $table->dropForeign('thread_categories_thread_category_id_foreign');
		});
	}

}
