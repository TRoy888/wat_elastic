<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('/search_tmp', function(){
	return View::make('search');
});

Route::post('/search', 'SearchController@search');


Route::get('test',function(){
	$client = new Elasticsearch\Client();
	$params = array();
	$params['body']  = array('detail' => 'This is the first post detail of the first thread');
	$params['index'] = 'wat';
	$params['type']  = 'post';
	$params['id']    = '1';
	$ret = $client->index($params);

	// $params = array();
	$params['body']  = array('detail' => 'This is the first post detail of the second thread');
	// $params['index'] = 'my_index';
	// $params['type']  = 'my_type';
	$params['id']    = '2';
	$ret = $client->index($params);
	//
	// $getParams = array();
	// $getParams['index'] = 'my_index';
	// $getParams['type']  = 'my_type';
	// $getParams['id']    = 'my_id';
	// $retDoc = $client->get($getParams);

	// $searchParams['index'] = 'my_index';
	// $searchParams['type']  = 'my_type';
	// $searchParams['body']['query']['match']['testField'] = 'ab';
	// $retDoc = $client->search($searchParams);

	return 'test';
});
