<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function($table){
			$table->increments('id');
			$table->string('email')->unique();
			$table->string('password');
			$table->string('first_name');//firstName
			$table->string('last_name');//lastName
			$table->string('degree')->nullable();
			$table->string('school')->nullable();
			$table->integer('life_time')->nullable();//lifeTime
			$table->integer('semester')->nullable();
			$table->integer('usable')->nullable();
			$table->integer('pending_point')->nullable();
			$table->string('picture_url')->nullable();//pictureURL
			$table->float('picture_ratio')->nullable();//ratio of the picture to show
			$table->integer('picture_top')->unsigned()->nullable();//first top pixel to show
			$table->integer('picture_left')->unsigned()->nullable();//first left pixel to show
			$table->string('cover_url')->nullable();//coverURL
			$table->float('cover_ratio')->nullable();//ratio of the cover to show
			$table->integer('cover_top')->unsigned()->nullable();//first top pixel to show
			$table->integer('cover_left')->unsigned()->nullable();//first left pixel to show
			$table->string('summary_profile')->nullable();//SummaryProfile
			$table->string('hobbies')->nullable();
			$table->string('other')->nullable();
			$table->string('class')->nullable();
			$table->boolean('not_first_time')->nullable();
			$table->timestamp('join_date');
			$table->string('remember_token',100);
			$table->boolean('confirmed')->default(false);
			$table->string('confirmation_code');

			//relationThread
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
		Schema::dropIfExists('users');
	}

}
