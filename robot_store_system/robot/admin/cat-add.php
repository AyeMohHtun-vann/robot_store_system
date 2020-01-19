<?php
include("confs/config1.php"); // to connect to Database server and use robot database
$name = $_POST['name'];
$remark = $_POST['remark'];
$sql = "INSERT INTO categories (name, remark, created_date,modified_date) VALUES ('$name', '$remark', now(), now())";
if ($conn->query($sql)===TRUE)
{
	echo "New Record created sucessfully";
}
else
{
echo "Error:" . $sql. "<br>" . $conn->error;
}
//mysqli_query($sql);
header("location: cat-list.php");// redirect to the category list
?>
