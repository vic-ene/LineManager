<!DOCTYPE html>
<html>
<head>
	<title>Completed Orders Carts</title>
	<link rel="stylesheet" href="globalUsage/style.css" class="">
	
</head>
<body>
	<?php include "globalUsage/dropdownmenu.html"?>
	<h1> <u>Completed Carts</u></h1>
	<br><br><br>
	<form action="completedOrdersComputer.php" method="post" class="sameLine">
	<input type="submit" value="Computerboxes" class="otherProduct">
	</form>

	<br><br><br>

	<table class = "completed">
		<tr class = "completed">
			<th>id</th>
				<th>order_time</th>
				<th>completion_time</th>
				<th>status</th>
				<th>nbr_products</th>
				<th>wheel_color</th>
				<th>wheel_type</th>
			</tr>
		<?php

require 'globalUsage/db.php';


$query = "SELECT * FROM orders INNER JOIN carts ON orders.reference_id = carts.id WHERE orders.product = 'carts' AND orders.status = 'completed'";

if ($result = mysqli_query($link, $query)){
	if (mysqli_num_rows($result) > 0){
		$i = 0;
		while(($row = mysqli_fetch_assoc($result)) && $i<100){
			
			echo "<tr><td>"
			 . $row["id"] . "</td><td>" 
			 . $row["order_time"] . "</td><td>"
			 . $row["completion_time"] . "</td><td>" 
			 . $row["status"] . "</td><td>"
			 . $row["nbr_products"] . "</td><td>"
			 . $row["wheel_color"] . "</td><td>"
			 . $row["wheel_type"] .
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