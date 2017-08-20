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
     * Renames the headers and the keys
     * @param  array  $oldToNew
     * @return $this
     */
    public function renameKeys( array $oldToNew )
    {
      foreach( $this->data as &$data ) {
        foreach( $oldToNew as $old=>$new ) {
          $data[$new] = $data[$old];
          unset($data[$old]);
        }
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

  }
