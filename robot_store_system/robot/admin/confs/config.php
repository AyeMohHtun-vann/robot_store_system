<?php

$conn = new PDO("mysql:host=localhost;dbname=robot", "root", "root");
//PDO
try {
  $conn->query('hello'); //Invalid query
  }
catch (PDOException $ex) {
//$ex->getMessage();
  echo "An Error has occurred";
 }
?>
