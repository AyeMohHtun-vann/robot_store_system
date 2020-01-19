<?php
  session_start();
  //include("confs/config.php");

  //$name = $_POST['name'];
  //$password = $_POST['password'];

  /*if($name == "admin" and $password == "123456") {
    $_SESSION['auth'] = true;
    header("location: robot-list.php");
  } else {
    header("location: index.php?login=failed");
  }*/
$dbhost="localhost";
$dbuser="root";
$dbpass="root";
$dbname="robot";
$conn = new mysqli($dbhost, $dbuser,$dbpass,$dbname);
//mysqli_select_db($dbname, $conn);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$pass = $_POST['password'];
//to prevent from SQL Injection
$name = mysqli_real_escape_string( $conn, $_POST['name'] );
$pass = mysqli_real_escape_string( $conn,$_POST['password'] );
$sql = "SELECT * FROM admin WHERE name='$name' AND password='$pass'";

$result = mysqli_query($conn,$sql);
if( mysqli_num_rows($result) )
 {
$_SESSION['auth'] = true;
header("location: robot-list.php");
  } else {
    header("location: index.php?login=failed");
}
?>

