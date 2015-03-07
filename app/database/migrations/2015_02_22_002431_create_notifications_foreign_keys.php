<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsForeignKeys extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('notifications', function(Blueprint $table)
		{
                    $table->foreign('user_id')->references('id')->on('users');
                    $table->foreign('notification_type')->references('id')->on('notification_types');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('notifications', function(Blueprint $table)
		{
                    $table->dropForeign('notifications_user_id_foreign');
                    $table->dropForeign('notifications_notification_id_foreign');
		});
	}

}
