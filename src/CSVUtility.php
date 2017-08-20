<?php

  class CSVUtility {

    private $data = [];

    private $headers = [];

    private $expectedHeaders = null;

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

    public function total()
    {
      return count($this->data);
    }


    public function getData()
    {
      return $this->data;
    }

    public function getHeader()
    {
      return $this->headers;
    }

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
     * @param  string $key   the name of the header
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
