<?php
session_start();
include("admin/confs/config.php");
$cart = 0;
if(isset($_SESSION['cart'])) {
foreach($_SESSION['cart'] as $qty) {
$cart += $qty;
}
}
if(isset($_GET['cat'])) {
$cat_id = $_GET['cat'];
$robots = $conn->prepare("SELECT * FROM robots WHERE category_id = $cat_id");
$robots->execute(array( 'id' => $cat_id ));
} else {
$robots = $conn->prepare("SELECT * FROM robots");
$robots->execute();
}
$cats = $conn->prepare("SELECT * FROM categories");
$cats->execute();
?>
<!doctype html>
<html>
<head>
<title>Robot Store</title>
<link rel="stylesheet" href="css/style.css">
<style>
.member1 {
      padding-left:1%;
      padding-right:1%;
      height: 200px;
	


     
      
}
.member2 {
      padding-left:6%;
      padding-right:6%;
      height: 200px;


      
      
}
.member3 {
      padding-left:6%;
      padding-right:6%;
      height: 200px;


      
      
}.member4 {
      padding-left:3%;
      padding-right:3%;
      height: 200px;


     
      
}


</style>
</head>
<body>
<h1>Robot Store</h1>
<span class="member1"><a href="index.php"><font color="#2E5894">Home</font></a></span>
<span class="member2"><a href="info.php"><font color="#2E5894">About us</font></a></span>
<span class="member3"><a href="./member/login.php"><font color=" #2E5894">Login Now</font></a></span>
<span class="member4"><a href="./member/register.php"><font color="#2E5894">Register Now</font></a></span>
<span class="member4"><a href="./requestfeedback.php"><font color="#2E5894">Any Feedback</font></a></span>
<div class="info">

<a href="view-cart.php">
(<?php echo $cart ?>) Robots in your cart
</a>
</div>
<div class="sidebar">
<ul class="cats">
<li>
<b><a href="index.php">All Categories</a></b>
</li>
<?php while($row = $cats->fetch()): ?>
<li>
<a href="index.php?cat=<?php echo $row['id'] ?>">
<?php echo $row['name'] ?>
</a>
</li>
<?php endwhile; ?>
</ul>
</div>
<div class="main">
<ul class="robots">
<?php while($row = $robots->fetch()): ?>
<li>
<img src="admin/covers/<?php echo $row['cover'] ?>" height="150">
<b>
<a href="robot-detail.php?id=<?php echo $row['id'] ?>">
<?php echo $row['title'] ?>
</a>
</b>
<i>$<?php echo $row['price'] ?></i>
<a href="add-to-cart.php?id=<?php echo $row['id'] ?>"
class="add-to-cart">Add to Cart</a>
</li>
<?php endwhile; ?>
</ul>
</div>
<div class="footer">
&copy; <?php echo date("Y") ?>. All right reserved.
</div>
</body>
</html>
