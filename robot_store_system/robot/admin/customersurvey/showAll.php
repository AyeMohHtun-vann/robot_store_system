<?php

$parttimers=array();
$fh=fopen('./myfile.csv','r');
flock($fh,LOCK_SH);
$line=fgets($fh);
while(!empty($line))
  {
    $parttimer=explode(',',$line);
    array_push($parttimers,$parttimer);
    $line=fgets($fh);
  }
flock($fh,LOCK_UN);
fclose($fh);
?>
<html>
<head>
<title>Show</title>
<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>


<table border="1px">
         <tr>
            <th>Customer Name</th>
	
            <th>Purchased Robot</th>
	  <th>Used Duration</th>
	<th>Customer Satisfication</th>
	<th>Customer Impression</th>
	<th>Customer Disappointment</th>
	    
            <th>Customer Rating</th>
            <th>Customer Suggestion</th>
         </tr>
         <?php 
 	$i=0; 
            foreach ($parttimers as $parttimer) {
             echo "<tr>"; 
            echo "<td>$parttimer[0] </td>" ;
             echo "<td>$parttimer[1]</td>"; 
 echo "<td>$parttimer[2]</td>"; 
 echo "<td>$parttimer[3]</td>"; 
 echo "<td>$parttimer[4]</td>"; 
echo "<td>$parttimer[5]</td>"; 
echo "<td>$parttimer[7]</td>"; 
 echo "<td>$parttimer[9]</td>"; 
 
 
            echo "</tr>";
             $i++;
             } ?>
      </table>


<li><a href="showGraph.php">Survey in Graph </a></li>

  </form>
</body>
</html>
