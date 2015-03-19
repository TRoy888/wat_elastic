<?php

class SearchController extends BaseController {

  /**
  * This method is used to handle search logic in the WAT forum.
  * It will perform searching for posts, threads, and users storaged in the system.
  * In the WAT, we are currently using an elasticsearch engine to handle search functionality.
  * All data in the tables (threads, posts, and users will be duplicated and maintained in an elasticsearch system)
  */
  public function search(){

    $queryString = Input::get('query_text');
    //handle the query string verification here
    $queryString = empty($queryString)?'*':$queryString;
    ///////////////////////////////////////////

    $params = array();
    $params['hosts'] = array (
      '127.0.0.1:9200'
    );
    $client = new Elasticsearch\Client($params);
    $searchParams = [
      'index'=>'wat'
      , 'type'=>['threads','posts', 'users']
      , 'size'=>10
      , 'body'=>[
          'query'=>[
            'filtered'=>[
              'query'=>[
                  'query_string'=>['query'=>$queryString]
              ]
            ]
          ]
        ]
    ];
    $returnedDoc = $client->search($searchParams);
    return $returnedDoc["hits"]["hits"];
  }
}
