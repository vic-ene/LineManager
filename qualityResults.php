<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="globalUsage/style.css" class="">
    <title>Document</title>
</head>
<body>
    <h1><u>Quality Results</u></h1>
    <?php include "globalUsage/dropdownmenu.html"?>
    <br><br><br><br><br><br>
    <table class = "test_results">
		<tr class = "test_results">
			<th>order_id</th>
			<th>product_type</th>
			<th>product_id</th>
			<th>state</th>
			<th>flaw_id</th>
		</tr>
		<?php

require 'globalUsage/db.php';



$query = "SELECT * FROM quality_test";

if ($result = mysqli_query($link, $query)){
	if (mysqli_num_rows($result) > 0){
		$i = 0;
		while(($row = mysqli_fetch_assoc($result)) && $i<100){
			echo "<tr><td>"
			. $row["order_id"] . "</td><td>" 
			. $row["product_type"] . "</td><td>"
			. $row["product_id"] . "</td><td>"
			. $row["state"] . "</td><td>"
			. $row["flaw_id"] . 
			  "</td></tr>" ;
			$i ++;
		}
		echo "</table>";
	}else{
		echo "0 results";
	}

	mysqli_free_result($result);
}

else if (!$result){
	$message = 'Invalid query: ' .mysql_error() . "\n";
	$message .= 'Whole query: ' . $query;
	die($message);
}

mysqli_close($link);
?>



 <!-- ----------------------------------------------------------------------------------------- -->



<br><br><br>
    <table class = "flaw_summary">
		<tr class = "flaw_summary">
           <th>flaw_type</th>
           <th>severity</th>
           <th>count</th>
		</tr>
		<?php

require 'globalUsage/db.php';



$query = "SELECT * FROM flaw_count";

if ($result = mysqli_query($link, $query)){
	if (mysqli_num_rows($result) > 0){
		$i = 0;
		while(($row = mysqli_fetch_assoc($result)) && $i<100){
			echo "<tr><td>"
			. $row["flaw_type"] . "</td><td>" 
			. $row["severity"] . "</td><td>"
			. $row["count"] . 
			  "</td></tr>" ;
			$i ++;
		}
		echo "</table>";
	}else{
		echo "0 results";
	}

	mysqli_free_result($result);
}

else if (!$result){
	$message = 'Invalid query: ' .mysql_error() . "\n";
	$message .= 'Whole query: ' . $query;
	die($message);
}

mysqli_close($link);



?>
    
</body>
</html>