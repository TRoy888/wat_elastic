<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterNotificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            // Alter notifications table
            Schema::table('notifications', function(Blueprint $table)
            {
                // A notification must be of a specific type (e.g. like, new comment)
                $table->integer('notification_type')->unsigned();
                // All notifications belong to a specific user
                $table->integer('user_id')->unsigned();

                // All notifications connect to an object (thread, post, etc)
                $table->integer('object_id')->unsigned();
                $table->string('object_type', 128);
                
                // event_id, thread_id and post_id are replaced by object_id:
                $table->dropForeign('notifications_event_id_foreign');
                $table->dropForeign('notifications_thread_id_foreign');
                $table->dropForeign('notifications_post_id_foreign');
                
                $table->dropColumn('event_id');
                $table->dropColumn('thread_id');
                $table->dropColumn('post_id');
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
                    $table->dropColumn('notification_type');
                    $table->dropColumn('user_id');
                    $table->dropColumn('object_id');
                    $table->dropColumn('object_type');
                    
                    $table->integer('event_id')->unsigned();
                    $table->integer('thread_id')->unsigned();
                    $table->integer('post_id')->unsigned();
                    
                    $table->foreign('event_id')->references('id')->on('events');
                    $table->foreign('thread_id')->references('id')->on('threads');
                    $table->foreign('post_id')->references('id')->on('posts');
            });
	}

}
