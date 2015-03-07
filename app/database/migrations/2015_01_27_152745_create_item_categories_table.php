<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemCategoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_categories', function($table){
			$table->increments('id');
			$table->string('code');
			$table->string('name');
			$table->integer('item_category_id')->unsigned()->nullable();

			$table->timestamps(); //created_at and updated_at
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('item_categories');
	}

}
