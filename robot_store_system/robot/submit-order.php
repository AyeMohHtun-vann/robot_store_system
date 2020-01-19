<?php
session_start();
include("admin/confs/config.php");
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$sql="INSERT INTO orders
(name, email, phone, address, status, created_date, modified_date)
VALUES (:name,:email,:phone,:address, 0, now(), now()) ";
$pre = $conn->prepare( $sql );
$pre->execute( array(':name' => $name,':email' => $email,':phone' => $phone,':address' => $address) );
$order_id = $conn->lastInsertId();
foreach($_SESSION['cart'] as $id => $qty) {
$sql1="INSERT INTO order_items
(order_id,robot_id,qty)
VALUES (:order_id,:id,:qty)";
$pre1 = $conn->prepare( $sql1 );
$pre1->execute( array(':order_id' => $order_id,':id' => $id,':qty' => $qty) );
}
unset($_SESSION['cart']);
?>
<!doctype html>
<html>
<head>
<title>Order Submitted</title>
<link rel="stylesheet" href="css/style.css">

</head>
<body>
<h1>Order Submitted</h1>
<div class="msg">
Your order has been submitted. We'll deliver the items soon. 
<a href="index.php" class="done">Robot Store Home</a>
</div>
<div class="footer">
&copy; <?php echo date("Y") ?>. All right reserved.
</div>

</body>
</html>
