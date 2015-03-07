<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function($table){
			$table->increments('id');
			$table->text('detail');//detials
			$table->integer('user_id')->unsigned();//author
			$table->boolean('is_pending');//isPendding
			$table->integer('number_of_report')->unsigned()->nullable();//numberOfReport
			$table->boolean('verification_mark');//verificationMark
			$table->integer('thread_id')->unsigned()->nullable();
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
		Schema::dropIfExists('posts');
	}

}
