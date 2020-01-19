<?php
  include("confs/config1.php");

  $id = $_GET['id'];
  $sql = "DELETE FROM robots WHERE id = $id";
  mysqli_query($conn,$sql);

  header("location: robot-list.php");
?>

