<?php
  include("confs/config1.php");

  $title = $_POST['title'];
  $feature = $_POST['feature'];
  $summary = $_POST['summary'];
  $price = $_POST['price'];
  $category_id = $_POST['category_id'];
  
  $cover = $_FILES['cover']['name'];
  $tmp = $_FILES['cover']['tmp_name'];

  if($cover) {
    move_uploaded_file($tmp, "covers/$cover");
  }
  
  $sql = "INSERT INTO robots (
    title, feature, summary, price, category_id, 
    cover, created_date, modified_date
  ) VALUES (
    '$title', '$feature', '$summary', '$price',
    '$category_id', '$cover', now(), now()
  )";

  if ($conn->query($sql)===TRUE)
{
	echo "New Record created sucessfully";
}
else
{
echo "Error:" . $sql. "<br>" . $conn->error;
}

  header("location: robot-list.php");
?>

