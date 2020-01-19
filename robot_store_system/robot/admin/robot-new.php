<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>New Robot</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>New Robot</h1>
<ul class="menu">
<li><a href="robot-list.php">Manage Robots</a></li>
<li><a href="cat-list.php">Manage Categories</a></li>
<li><a href="orders.php">Manage Orders</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<form action="robot-add.php" method="post" enctype="multipart/form-data">
  <label for="title">Robot Title</label>
  <input type="text" name="title" id="title">

  <label for="feature">Feature</label>
  <input type="text" name="feature" id="feature">

  <label for="summary">Summary</label>
  <textarea name="summary" id="summary"></textarea>

  <label for="price">Price</label>
  <input type="number" name="price" id="price">

  <label for="categories">Category</label>
  <select name="category_id" id="categories">
    <option value="">-- Choose --</option>
    <?php
      include("confs/config1.php");
	include("confs/auth.php");
      $result = mysqli_query($conn, "SELECT id, name FROM categories");
      while($row = mysqli_fetch_assoc($result)):
    ?>
    <option value="<?php echo $row['id'] ?>">
      <?php echo $row['name'] ?>
    </option>
    <? endwhile; ?>
  </select>

  <label for="cover">Cover</label>
  <input type="file" name="cover" id="cover">

  <br><br>
  <input type="submit" value="Add Robot">
  <a href="robot-list.php" class="back">Back</a>
</form>
<script src="../js/jquery.js"></script>
<script src="../js/jquery.validate.min.js"></script>
<script>
$(function() {
	$("form").validate({
		rules: {
			"title": "required",
			"feature": "required",
			"category_id": "required",
			"price": "required"
		},
		messages: {
			"title": "Please provide robot title",
			"feature": "Please provide robot's feature",
			"category_id": "Please choose a category",
			"price": "Please provide robot price"
		}
	});
});
</script>
</body>
</html>

