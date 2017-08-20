<?php
  include './src/CSVUtility.php';

  if( isset( $_POST["submit"]) ) :

    $post_file = $_FILES['csvUpload']['tmp_name'];

    $handler = new CSVUtility( $post_file );
    $otn = [
      'Date' => 'date',
      'Cost' => 'dingus',
    ];
    $handler->renameKeys($otn);
    echo '<pre>';
    print_r($handler->getData());
    echo '</pre>';
    die();

  endif;
?>
