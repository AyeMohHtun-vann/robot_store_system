<?php
session_start();
$_SESSION['name']=$_POST['name'];
$_SESSION['answer1']=$_POST['answer1'];
$_SESSION['answer2']=$_POST['answer2'];
$_SESSION['answer3']=$_POST['answer3'];
$_SESSION['answer4']=$_POST['answer4'];
$_SESSION['answer5']=$_POST['answer5'];
$_SESSION['answer6']=$_POST['answer6'];
$_SESSION['answer7']=$_POST['answer7'];
$_SESSION['answer8']=$_POST['answer8'];
$_SESSION['des1']=$_POST['des1'];
$name=$_SESSION['name'];
$answer1=$_SESSION['answer1'];
$answer2=$_SESSION['answer2'];
$answer3=$_SESSION['answer3'];
$answer4=$_SESSION['answer4'];
$answer5=$_SESSION['answer5'];
$answer6=$_SESSION['answer6'];
$answer7=$_SESSION['answer7'];
$answer8=$_SESSION['answer8'];
$des1=$_SESSION['des1'];

$fh=fopen('./myfile.csv','a');
flock($fh,LOCK_EX);
$line=$name.','.$answer1.','.$answer2.','.$answer3.','.$answer4.','.$answer5.','.$answer6.','.$answer7.','.$answer8.','.$des1."\n";
fwrite($fh,$line);
flock($fh,LOCK_UN);
fclose($fh);

?>

<html>
<head>
</head>
<body>
<h3>Thank you for your feedback</h3>
</body>
</html>
