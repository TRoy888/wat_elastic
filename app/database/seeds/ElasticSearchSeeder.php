<?php

class ElasticSearchSeeder extends BasedSeeder {

  /**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
    try{
      $client = new Elasticsearch\Client();

  		$threads = Thread::all();
      foreach($threads as $thread){
        $params = array();
      	$params['body']  = array(
          'topic' => $thread->topic
          , 'detail' => $thread->detail
          , 'deleted' => $thread->deleted
          , 'like_amt' => $thread->like_amt
          , 'dislike_amt' => $thread->dislike_amt
          , 'created_at' => $thread->created_at
          , 'updated_at' => $thread->updated_at
          , 'test_data' => true);
      	$params['index'] = 'wat';
      	$params['type']  = 'threads';
      	$params['id']    = $thread->id;
      	$ret = $client->index($params);
      }
      $posts = Post::all();
      foreach($posts as $post){
        $params = array();
      	$params['body']  = array(
          'detail' => $post->detail
          , 'deleted' => $post->deleted
          , 'like_amt' => $post->like_amt
          , 'dislike_amt' => $post->dislike_amt
          , 'created_at' => $post->created_at
          , 'updated_at' => $post->updated_at
          , 'thread_id' => $post->thread_id
          , 'test_data' => true);
      	$params['index'] = 'wat';
      	$params['type']  = 'posts';
      	$params['id']    = $post->id;
      	$ret = $client->index($params);
      }
      $users = User::all();
      foreach($users as $user){
        $params = array();
      	$params['body']  = array(
          'email' => $user->email
          , 'first_name' => $user->first_name
          , 'last_name' => $user->last_name
          , 'degree' => $user->degree
          , 'school' => $user->school
          , 'summary_profile' => $user->summary_profile
          , 'hobbies' => $user->hobbies
          , 'other' => $user->other
          , 'class' => $user->class
          , 'created_at' => $user->created_at
          , 'updated_at' => $user->updated_at
          , 'test_data' => true);
      	$params['index'] = 'wat';
      	$params['type']  = 'users';
      	$params['id']    = $user->id;
      	$ret = $client->index($params);
      }
    }
    catch(Exception $e){
      echo "ElasticSearchSeeder: Cannot connect to the Elasticsearch server";
      throw $e;
    }
	}

}
