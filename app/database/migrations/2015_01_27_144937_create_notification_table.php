<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('notifications', function($table){
			$table->increments('id');
			$table->string('message');
			$table->timestamp('time');
			$table->integer('event_id')->unsigned()->nullable();
			$table->integer('thread_id')->unsigned()->nullable();
			$table->integer('post_id')->unsigned()->nullable();
			$table->boolean('read');
			//sendBy

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
		Schema::dropIfExists('notifications');
	}

}
