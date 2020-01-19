<?php include("confs/auth.php") ?>
<!doctype html>
<html>
<head>
<title>Order List</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Order List</h1>
<ul class="menu">
<li><a href="robot-list.php">Manage Robots</a></li>
<li><a href="cat-list.php">Manage Categories</a></li>
<li><a href="orders.php">Manage Orders</a></li>
<li><a href="customersurvey/showAll.php">Manage Survey</a></li>
<li><a href="logout.php">Logout</a></li>
</ul>
<?php
include("confs/config1.php");
$orders = mysqli_query($conn,"SELECT * FROM orders");
?>
<ul class="orders">
<?php while($order = mysqli_fetch_assoc($orders)): ?>
<?php if($order['status']): ?>
<li class="delivered">
<?php else: ?>
<li>
<?php endif; ?>
<div class="order">
<b><?php echo $order['name'] ?></b>
<i><?php echo $order['email'] ?></i>
<span><?php echo $order['phone'] ?></span>
<p>
<?php echo $order['address'] ?>
</p>
<?php if($order['status']): ?>
* <a href="order-status.php?id=<?php echo $order['id'] ?>&status=0">
Undo</a>
<?php else: ?>
* <a href="order-status.php?id=<?php echo $order['id'] ?>&status=1">
Mark as Delivered</a>
<?php endif; ?>
</div>
<div class="items">
<?php
$order_id = $order['id'];
$items = mysqli_query($conn,"SELECT order_items.*, robots.title
FROM order_items LEFT JOIN robots ON order_items.robot_id = robots.id
WHERE order_items.order_id = $order_id
");
while($item = mysqli_fetch_assoc($items)):
?>
<b>
<a href="../robot-detail.php?id=<?php echo $item['robot_id'] ?>">
<?php echo $item['title'] ?>
</a>
(<?php echo $item['qty'] ?>)
</b>
<?php endwhile; ?>
</div>
</li>
<?php endwhile; ?>
</ul>
</body>
</html>
