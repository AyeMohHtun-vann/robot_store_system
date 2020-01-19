<?php
$dbhost="localhost";
$dbuser="root";
$dbpass="root";
$dbname="robot";
$conn = new mysqli($dbhost, $dbuser,$dbpass,$dbname);
//mysqli_select_db($dbname, $conn);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
