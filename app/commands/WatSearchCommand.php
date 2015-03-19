<?php

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

class WatSearchCommand extends Command {

	/**
	 * The console command name.
	 *
	 * @var string
	 */
	protected $name = 'wat:search';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description.';

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Execute the console command.
	 *
	 * @return mixed
	 */
	public function fire()
	{
 		if($this->option('start')){
			$this->info("Starting Elasticsearch Server");
		}
		if($this->option('setup')){
			$this->info("Start Running Setting up Elasticsearch for WAT");
			$this->setupElasticServer();
			$this->info("Setting is completed");
		}
	}

	public function setupElasticServer(){
		$params = array();
    $params['hosts'] = array (
      '127.0.0.1:9200'
    );
    $client = new Elasticsearch\Client($params);
		$indexSetting['index'] = 'wat';

    $threadProperties = [
      'topic'=> [
        'type'=>'string'
        , 'analyzer'=>'english'
        , 'fields'=> [
            'std'=> [
              'type'=>'string'
              , 'analyzer'=>'standard'
            ]
          ]
      ]
      , 'detail' => [
        'type'=>'string'
        , 'analyzer'=>'english'
        , 'fields'=> [
            'std'=> [
              'type'=>'string'
              , 'analyzer'=>'standard'
            ]
          ]
      ]
    ];

    $postProperties = [
      'detail' => [
        'type'=>'string'
        , 'analyzer'=>'english'
        , 'fields'=> [
            'std'=> [
              'type'=>'string'
              , 'analyzer'=>'standard'
            ]
          ]
      ]
    ];

    $userProperties = [
      'email' => [
        'type'=>'string'
        , 'analyzer'=>'english'
        , 'fields'=> [
            'std'=> [
              'type'=>'string'
              , 'analyzer'=>'standard'
            ]
          ]
      ],
      'first_name' => [
        'type'=>'string'
        , 'analyzer'=>'english'
        , 'fields'=> [
            'std'=> [
              'type'=>'string'
              , 'analyzer'=>'standard'
            ]
          ]
      ],
      'last_name' => [
        'type'=>'string'
        , 'analyzer'=>'english'
        , 'fields'=> [
            'std'=> [
              'type'=>'string'
              , 'analyzer'=>'standard'
            ]
          ]
      ],
      'degree' => [
        'type'=>'string'
        , 'analyzer'=>'english'
        , 'fields'=> [
            'std'=> [
              'type'=>'string'
              , 'analyzer'=>'standard'
            ]
          ]
      ],
      'school' => [
        'type'=>'string'
        , 'analyzer'=>'english'
        , 'fields'=> [
            'std'=> [
              'type'=>'string'
              , 'analyzer'=>'standard'
            ]
          ]
      ],
      'summary_profile' => [
        'type'=>'string'
        , 'analyzer'=>'english'
        , 'fields'=> [
            'std'=> [
              'type'=>'string'
              , 'analyzer'=>'standard'
            ]
          ]
      ],
      'hobbies' => [
        'type'=>'string'
        , 'analyzer'=>'english'
        , 'fields'=> [
            'std'=> [
              'type'=>'string'
              , 'analyzer'=>'standard'
            ]
          ]
      ],
      'other' => [
        'type'=>'string'
        , 'analyzer'=>'english'
        , 'fields'=> [
            'std'=> [
              'type'=>'string'
              , 'analyzer'=>'standard'
            ]
          ]
      ],
      'class' => [
        'type'=>'string'
        , 'analyzer'=>'english'
        , 'fields'=> [
            'std'=> [
              'type'=>'string'
              , 'analyzer'=>'standard'
            ]
          ]
      ]
    ];

    $indexSetting['body']['mappings']['threads']['properties'] = $threadProperties;
    $indexSetting['body']['mappings']['posts']['properties'] = $postProperties;
    $indexSetting['body']['mappings']['users']['properties'] = $userProperties;

    $client->indices()->create($indexSetting);
		$this->info("-----\"wat\" index is created-----");
	}

	/**
	 * Get the console command arguments.
	 *
	 * @return array
	 */
	protected function getArguments()
	{
		return array(
			// array('setup', InputArgument::REQUIRED, 'Setup Elasticsearch for WAT system'),
			// array('start', InputArgument::REQUIRED, 'Start an Elasticsearch server for WAT system'),
		);
	}

	/**
	 * Get the console command options.
	 *
	 * @return array
	 */
	protected function getOptions()
	{
		return array(
			array('setup', null, InputOption::VALUE_NONE, 'Setup Elasticsearch for WAT system.', null),
			array('start', null, InputOption::VALUE_NONE, 'Start an Elasticsearch server for WAT system', null),
		);
	}

}
