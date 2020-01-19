<?php
  	include("confs/auth.php");
	include("confs/config1.php");

  $total = mysqli_query($conn, "SELECT id FROM robots");
  $total = mysqli_num_rows($total);

  # Paging
  $limit = 3;
  $start = 0;
  if(isset($_GET['start'])) {
    $start = $_GET['start'];
  }

  $next = $start + $limit; 
  $prev = $start - $limit;

  $result = mysqli_query($conn, "SELECT robots.*, categories.name FROM robots LEFT JOIN categories ON robots.category_id = categories.id ORDER BY robots.created_date DESC LIMIT $start, $limit");

  
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
  <meta charset="UTF-8">
  <title>Robots List</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Robot List</h1>
<ul class="menu">
  <li><a href="robot-list.php">Manage Robots</a></li>
  <li><a href="cat-list.php">Manage Categories</a></li>
  <li><a href="orders.php">Manage Orders</a></li>
<li><a href="customersurvey/showAll.php">Manage Survey</a></li>


  <li><a href="logout.php">Logout</a></li>
</ul>
<ul class="list">
  <?php while($row = mysqli_fetch_assoc($result)): ?>
    <li>
      <? if(!is_dir("covers/{$row['cover']}") and file_exists("covers/{$row['cover']}")): ?>
      <img src="covers/<?php echo $row['cover'] ?>" alt="" align="right" height="140" width="200">
      <? else: ?>
      <img src="covers/no-cover.gif" alt="" align="right" height="140" width="200">
      <? endif; ?>
      <b><?php echo $row['title'] ?></b>
      <i>with <?php echo $row['feature'] ?></i>
      <small>(in <?php echo $row['name'] ?>)</small>
      <span>$<?php echo $row['price'] ?></span>
      <div><?php echo $row['summary'] ?> </div>

      [ <a href="robot-del.php?id=<?php echo $row['id'] ?>"
      			class="del" onClick="return confirm('Are you sure?')">del</a> ]
      [ <a href="robot-edit.php?id=<?php echo $row['id'] ?>">edit</a> ]
    </li>
  <?php endwhile; ?>
</ul>
<a href="robot-new.php" class="new">New Robot</a>
<div class="paging">
	<? if($prev < 0): ?>
	<span>&laquo; Previous</span>
	<? else: ?>
	<a href="?start=<?= $prev ?>">&laquo; Previous</a>
	<? endif; ?>

	<? if($next >= $total): ?>
	<span>Next &raquo;</span>
	<? else: ?>
	<a href="?start=<?= $next ?>">Next &raquo;</a>
	<? endif; ?>
</div>
<br style="clear:both">

</body>
</html>
