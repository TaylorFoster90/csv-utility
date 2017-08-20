<?php

  class CSVUtility {

    // Array of the csv rows
    private $data = [];

    // Array of the csv headers
    private $headers = [];

    // The expected CSV headers
    private $expectedHeaders = null;

    // Can perform actions
    private $canExecute = true;

    // The database table this CSV refers to (only used if class is connected to a database)
    public $table = null;

    // MySQL connection
    private $connection = null;

    public function __construct( $file )
    {
      $fh = fopen($file, 'r');
      $counter = 0;
      while( ($row = fgetcsv($fh, 1000)) !== FALSE ) {
        if( $counter === 0 ) {
          $this->headers = $row;
        }else{
          foreach( $row as $key=>$value ) {
            $this->data[( $counter - 1 )][$this->headers[$key]] = $value;
          }
        }
        $counter++;
      }
    }

    /**
     * Returns the total number of rows of current $data
     * @return int count of $data
     */
    public function total()
    {
      return count($this->data);
    }

    /**
     * Returns the data
     * @return array the current $data
     */
    public function getData()
    {
      return $this->data;
    }

    /**
     * Returns the headers (keys)
     * @return array headers
     */
    public function getHeaders()
    {
      return $this->headers;
    }

    /**
     * Rename the keys in the data set and maintain index structure
     * @param  array   $oldToNew      an associative array with the key being the current(old) data key name and the value being the new data key name
     * @param  boolean $changeHeaders change the original header array
     * @return  $this
     *
     * @example
        $instance->getData();
        // [ 0 => [ 'name' => 'Bob', 'how_old' => 22, 'job' => 'developer' ], 1 => [ 'name' => 'Susan', 'how_old' => 45, 'job' => 'teacher' ] ]
        $instance->renameKeys( ['how_old' => 'age'] );
        $instance->getData();
        // [ 0 => [ 'name' => 'Bob', 'age' => 22, 'job' => 'developer' ], 1 => [ 'name' => 'Bob', 'age' => 22, 'job' => 'developer' ] ]
     */
    public function renameKeys( array $oldToNew, bool $changeHeaders = true ) {
      foreach( $this->data as &$array ) {
        foreach( $oldToNew as $oldKey=>$newKey ) {
          $keys = array_keys($array);
          if (false === $index = array_search($oldKey, $keys)) {
          }
          $keys[$index] = $newKey;
          $array = array_combine($keys, array_values($array));
        }
      }
      if( $changeHeaders ) {
        $this->headers = array_map(function($val) use($oldToNew){
          return array_key_exists( $val, $oldToNew ) ? $oldToNew[$val] : $val;
        }, $this->headers);
      }
      return $this;
    }

    /**
     * Removes data based on $key $value pair
     * @param  string $key   the name of the header(key)
     * @param  string $value the value
     * @return $this
     */
    public function removeIfExists( $key, $value )
    {
      $filteredData = array_filter($this->data, function($arr) use($key,$value) {
        if( $arr[$key] == $value ){
        }else{
          return $arr;
        }
      });
      $this->data = array_values($filteredData);
      return $this;
    }


    public function openConnection( string $host, string $username, string $password, string $database )
    {
      $this->connection = mysqli_connect( $host, $username, $password, $database );
      if( !$this->connection ){
        echo 'No connection found.';
      }
      return $this;
    }

    public function setTable( string $tableName )
    {
      $this->table = $tableName;
      return $this;
    }

  }
