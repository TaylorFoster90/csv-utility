<?php
  include './src/CSVUtility.php';

  if( isset( $_POST["submit"]) ) :

    $post_file = $_FILES['csvUpload']['tmp_name'];

    $handler = new CSVUtility( $post_file );

    $handler->openConnection( '127.0.0.1', 'root', '', 'sandbox' );

    // $oldToNew = [
    //   'NDC' => 'n_d_c',
    //   'Date' => 'el_dato',
    // ];
    // $handler->renameKeys($oldToNew);
    //
    // echo '<pre>';
    // print_r($handler->getHeaders());
    // print_r($handler->getData());
    // echo '</pre>';
    die();

  endif;
?>
