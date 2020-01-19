<?php
include("confs/config1.php");
$id = $_POST['id'];
$title = $_POST['title'];
$feature = $_POST['feature'];
$summary = $_POST['summary'];
$price = $_POST['price'];
$category_id = $_POST['category_id'];
$cover = $_FILES['cover']['name'];
$tmp = $_FILES['cover']['tmp_name'];
if($cover) {
move_uploaded_file($tmp, "covers/$cover");
$sql = "UPDATE robots SET title='$title', feature='$feature',
summary='$summary', price='$price', category_id='$category_id',
cover='$cover', modified_date=now() WHERE id = $id";
} else {
$sql = "UPDATE robots SET title='$title', feature='$feature',
summary='$summary', price='$price', category_id='$category_id',
modified_date=now() WHERE id = $id";
}
mysqli_query($conn,$sql);
header("location: robot-list.php");
?>
