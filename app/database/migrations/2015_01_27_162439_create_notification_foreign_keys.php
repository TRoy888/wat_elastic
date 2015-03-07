<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('notifications', function($table)
		{
			$table->foreign('event_id')->references('id')->on('events');
			$table->foreign('thread_id')->references('id')->on('threads');
			$table->foreign('post_id')->references('id')->on('posts');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('notifications', function($table)
		{
			$table->dropForeign('notifications_event_id_foreign');
			$table->dropForeign('notifications_thread_id_foreign');
			$table->dropForeign('notifications_post_id_foreign');
		});
	}

}
