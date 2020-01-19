<html>

<head>
<h1>Robot Detail</h1>
<link >
</head>
<body>
<?php
include("admin/confs/config.php");
$id = $_GET['id'];

$robots = $conn->prepare( "SELECT * FROM robots WHERE id=$id");
		$robots->execute(array( 'id' => $id ));
          $row = $robots->fetch();

?>
<div class="detail">
<a href="index.php" class="back">&laquo; Go Back</a>
<img src="admin/covers/<?php echo $row['cover'] ?>">
<h2><?php echo $row['title'] ?></h2>

<i>in <?php echo $row['feature'] ?></i>,
<b>$<?php echo $row['price'] ?></b>
<p><?php echo $row['summary'] ?></p>
<a href="ownutubeAPI.php?id=<?php echo $row['id'] ?>"> Explore on Youtube
<br>
<a href="add-to-cart.php?id=<?php echo $id ?>" class="add-to-cart">
Add to Cart
</a>
</div>
<div class="footer">
&copy; <?php echo date("Y") ?>. All right reserved.
</div>
</body>
</html>
