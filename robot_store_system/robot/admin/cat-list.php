<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<link rel="stylesheet" href="css/style.css">


</head>
<body>
<h1>Category List</h1>
<ul class="menu">
<li><a href="robot-list.php">Manage Robots</a></li>
<li><a href="cat-list.php">Manage Categories</a></li>
<li><a href="orders.php">Manage Orders</a></li>
<li><a href="customersurvey/showAll.php">Manage Survey</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<?php
include("confs/config1.php");
$result = mysqli_query($conn,"SELECT * FROM categories");
?>
<ul>
<?php while($row = mysqli_fetch_assoc($result)): ?>
<li title="<?php echo $row['remark'] ?>">

[ <a href="cat-del.php?id=<?php echo $row['id'] ?>"
      			class="del" onClick="return confirm('Are you sure?')">del</a> ]
[ <a href="cat-edit.php?id=<?php echo $row['id'] ?>">edit</a> ]
<?php echo $row['name'] ?>
</li>
<?php endwhile; ?>
</ul>
<a href="cat-new.php" class="new">New Category</a>
</body>
</html>


