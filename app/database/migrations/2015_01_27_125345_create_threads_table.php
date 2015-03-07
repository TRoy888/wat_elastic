<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreadsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('threads', function($table){
			$table->increments('id');
			$table->string('topic');
			$table->integer('user_id')->unsigned();//author
			$table->text('detail');
			// $table->integer('category_id')->unsigned();//category
			$table->boolean('is_pending');//isPendding
			$table->integer('number_of_report')->unsigned()->nullable();//numberOfReport
			$table->boolean('verification_mark');//verificationMark
			$table->boolean('deleted');
			$table->integer('like_amt')->unsigned();
			$table->integer('dislike_amt')->unsigned();
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
		Schema::dropIfExists('threads');
	}

}
