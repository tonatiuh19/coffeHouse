<?php
  header('Content-Type: text/plain');
  $test = utf8_encode($_POST['price']); // Don't forget the encoding
  $data = json_decode($test);
  //echo $data;
  print_r($data);
  

 ?>