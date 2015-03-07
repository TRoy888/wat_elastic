<?php

class BasedSeeder extends Seeder {

  /**
  * DB table name
  *
  * @var string
  */
  protected $table;

  /**
  * CSV filename
  *
  * @var string
  */
  protected $filename;

  /**
  * Run DB seed
  */
  public function run(){
    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
    DB::table($this->table)->truncate();
    $seedData = $this->seedFromCSV($this->filename, ',');
    DB::table($this->table)->insert($seedData);
    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
  }

  /**
  * Collect data from a given CSV file and return as array
  *
  * @param $filename
  * @param string $deliminator
  * @return array|bool
  */
  private function seedFromCSV($filename, $deliminator = ","){
    if(!file_exists($filename) || !is_readable($filename)){
      return FALSE;
    }

    $header = NULL;
    $data = array();

    if(($handle = fopen($filename, 'r')) !== FALSE){
      while(($row = fgetcsv($handle, 1000, $deliminator)) !== FALSE){
        if(!$header) {
          $header = $row;
          $header[]='created_at';
          $header[]='updated_at';
        } else {
          $row['created_at'] = \Carbon\Carbon::now()->toDateTimeString();
          $row['updated_at'] = \Carbon\Carbon::now()->toDateTimeString();
          $data[] = array_combine($header, $row);

        }
      }
      fclose($handle);
    }

    return $data;
  }
  //See more at: http://laravelsnippets.com/snippets/seeding-database-with-csv-files-cleanly#sthash.6Zfbzl7A.dpuf
}
