<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function($table){
			$table->increments('id');
			$table->string('topic');//name
			$table->string('location')->nullable();
			$table->timestamp('start_time')->nullable();//startTime
			$table->timestamp('end_time')->nullable();//endTime
			$table->string('detail');//details
			$table->string('picture')->nullable();
			$table->timestamp('notification_time')->nullable();//notificationTime
			$table->integer('point_for_joining')->nullable();//pointForJoining

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
		Schema::dropIfExists('events');
	}

}
