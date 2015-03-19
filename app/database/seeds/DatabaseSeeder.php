<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('UserSeeder');
		$this->call('ThreadCategorySeeder');
		$this->call('ThreadSeeder');
		$this->call('PostSeeder');
		$this->call('ThreadCategoryThreadSeeder');
		$this->call('ThreadCategoryUserSeeder');
		$this->call('ElasticSearchSeeder');
	}

}
