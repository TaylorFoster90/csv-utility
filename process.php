<?php
  include './src/CSVUtility.php';

  if( isset( $_POST["submit"]) ) :

    $post_file = $_FILES['csvUpload']['tmp_name'];

    $handler = new CSVUtility( $post_file );

    die();

  endif;
?>
