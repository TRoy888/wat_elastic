<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadCategorysTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('thread_categories', function($table){
			$table->increments('id');
			$table->string('code');//categoryCode
			$table->string('name');//categoryName
			// $table->integer('thread_category_id')->unsigned()->nullable();
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
		Schema::dropIfExists('thread_categories');
	}

}
