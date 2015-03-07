<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('post_user', function($table){
			$table->increments('id');
			$table->integer('post_id')->unsigned();
			$table->integer('user_id')->unsigned();
			$table->integer('type')->unsigned();

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
		Schema::dropIfExists('post_user');
	}

}
