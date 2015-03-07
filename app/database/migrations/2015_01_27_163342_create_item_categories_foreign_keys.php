<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCategoriesForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('item_categories', function($table)
		{
			$table->foreign('item_category_id')->references('id')->on('item_categories');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('item_categories', function($table)
		{
			$table->dropForeign('item_categories_item_category_id_foreign');
		});
	}

}
