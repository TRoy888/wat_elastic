<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function($table){
			$table->increments('id');
			$table->string('item_name');//itemName
			$table->string('item_detail')->nullable();//itemDetail
			$table->string('picture_url')->nullable();//pictureURL
			$table->integer('status');
			$table->integer('purchase_point')->nullable();//purchasePoint
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
		Schema::dropIfExists('items');
	}

}
