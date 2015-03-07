<?php

class ThreadCategoryThreadSeeder extends BasedSeeder {

  public function __construct(){
    $this->table = 'thread_category_thread'; // Your database table name
    $this->filename = app_path().'/database/csv/thread_category_thread.csv'; // Filename and location of data in csv file
  }
  //See more at: http://laravelsnippets.com/snippets/seeding-database-with-csv-files-cleanly#sthash.6Zfbzl7A.dpuf

}
