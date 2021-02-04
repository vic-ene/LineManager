<!DOCTYPE html>
<html>
<head>
	<title>Ongoing Orders</title>
	 <link rel="stylesheet" href="globalUsage/style.css" class="">
</head>
<body class = "image ongoing">

	<?php include "globalUsage/dropdownmenu.html"?>
	
	<h1> <u>Ongoing Orders</u></h1>
	<br>
	<?php include "globalUsage/searchbar.html"?>
	<br><br><br><br><br>

	<table class = "ongoing">
		<tr class = "ongoing">
			<th>id</th>
			<th>order_time</th>
			<th>product</th>
			<th>status</th>
			<th>nbr_products</th>
		</tr>

		
		
		<?php
		

require 'globalUsage/db.php';


$query = "SELECT * FROM orders WHERE status = 'ongoing'";

if ($result = mysqli_query($link, $query)){
	if (mysqli_num_rows($result) > 0){		$i = 0;
		while(($row = mysqli_fetch_assoc($result)) && $i<100){
			echo "<tr><td>" 
			. $row["id"] . "</td><td>" 
			. $row["order_time"] . "</td><td>"
			. $row["product"] . "</td><td>" 
			. $row["status"] . "</td><td>" 
			. $row["nbr_products"] . 
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
	</table>
	

</body>
</html>