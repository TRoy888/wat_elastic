<?php

class ThreadSeeder extends BasedSeeder {

  public function __construct(){
    $this->table = 'threads'; // Your database table name
    $this->filename = app_path().'/database/csv/threads.csv'; // Filename and location of data in csv file
  }
  //See more at: http://laravelsnippets.com/snippets/seeding-database-with-csv-files-cleanly#sthash.6Zfbzl7A.dpuf

}
