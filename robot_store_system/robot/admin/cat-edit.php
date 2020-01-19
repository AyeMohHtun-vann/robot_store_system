<html>
<head>
	<title>Edit Catagories</title>
	<style>
	form label {
display: block;
margin-top: 8px;
}
body
{
background-color: rgba(50, 115, 220, 0.3);
}
	</style>
<link rel="stylesheet" href="css/style.css">

</head>
<body>

<h1>Edit Category</h1>
<ul class="menu">
<li><a href="robot-list.php">Manage Robots</a></li>
<li><a href="cat-list.php">Manage Categories</a></li>
<li><a href="orders.php">Manage Orders</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<?php
include("confs/config1.php");
$id = $_GET['id'];
$result = mysqli_query($conn,"SELECT * FROM categories WHERE id = $id");
$row = mysqli_fetch_assoc($result);
?>
<form action="cat-update.php" method="post">
<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
<label for="name">Category Name</label>
<input type="text" name="name" id="name"
value="<?php echo $row['name'] ?>">
<label for="remark">Remark</label>
<textarea name="remark"
id="remark"><?php echo $row['remark'] ?></textarea>
<br><br>
<input type="submit" value="Update Category">
</form>
</body>
</html>
