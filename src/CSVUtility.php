<?php

  class CSVUtility {

    private $data = [];

    private $headers = [];

    private $totalRows = 0;

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
        $this->totalRows = ( $counter - 1 );
      }
    }

    public function total()
    {
      return $this->totalRows;
    }


    public function getData()
    {
      return $this->data;
    }

    public function getHeader()
    {
      return $this->headers;
    }

  }
