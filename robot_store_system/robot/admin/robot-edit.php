<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Edit Robot Information</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php
  include("confs/config1.php");

  $id = $_GET['id'];
  $result = mysqli_query($conn,"SELECT * FROM robots WHERE id = $id");
  $row = mysqli_fetch_assoc($result);
?>

<h1>Edit Robots</h1>
<ul class="menu">
<li><a href="robot-list.php">Manage Robots</a></li>
<li><a href="cat-list.php">Manage Categories</a></li>
<li><a href="orders.php">Manage Orders</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<form action="robot-update.php" method="post" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo $row['id'] ?>">

  <label for="title">Robot Title</label>
  <input type="text" name="title" id="title" value="<?php echo $row['title'] ?>">

  <label for="author">Feature</label>
  <input type="text" name="feature" id="feature" value="<?php echo $row['feature'] ?>">

  <label for="summary">Summary</label>
  <textarea name="summary" id="summary"><?php echo $row['summary'] ?></textarea>

  <label for="price">Price</label>
  <input type="text" name="price" id="price" value="<?php echo $row['price'] ?>">

  <label for="categories">Category</label>
  <select name="category_id" id="categories">
    <option value="">-- Choose --</option>
    <?php
      $categories = mysqli_query($conn,"SELECT id, name FROM categories");
      while($cat = mysqli_fetch_assoc($categories)):
    ?>
    <option value="<?php echo $cat['id'] ?>"
          <?php if($cat['id'] == $row['category_id']) echo "selected" ?> >
      <?php echo $cat['name'] ?>
    </option>
    <? endwhile; ?>
  </select>

  <br><br>
  
  <? if(!is_dir("covers/{$row['cover']}") and file_exists("covers/{$row['cover']}")): ?>
  <img src="covers/<?php echo $row['cover'] ?>" alt="" height="150">
  <? else: ?>
  <img src="covers/no-cover.gif" alt="" height="150">
  <? endif; ?>
  
  <label for="cover">Change Cover</label>
  <input type="file" name="cover" id="cover">

  <br><br>
  <input type="submit" value="Update Robot">
  <a href="robot-list.php">Back</a>
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
			"feature": "Please provide special feature",
			"category_id": "Please choose a category",
			"price": "Please provide book price"
		}
	});
});
</script>

</body>
</html>

