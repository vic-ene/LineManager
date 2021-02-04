<!DOCTYPE html>
<html>
<head>
	<title>Completed Orders Computer</title>
	<link rel="stylesheet" href="globalUsage/style.css" class="">
</head>
<body>
	<?php include "globalUsage/dropdownmenu.html"?>
	<h1> <u>Completed Computers</u></h1>
	<br><br><br>

	
	<form action="completedOrdersCarts.php" method="post" class="sameLine">
	<input type="submit" value="Carts" class="otherProduct">
	</form>

	<br><br><br>

	<table class = "completed">
		<tr class = "completed">
		<th>id</th>
			<th>order_time</th>
			<th>completion_time</th>
			<th>status</th>
			<th>nbr_products</th>
			<th>nbr_boxes</th>
			<th>nbr_raspberries</th>
			<th>nbr_co2_sensor</th>
			<th>nbr_light_sensor</th>
			<th>nbr_humidity_sensor</th>
			<th>nbr_temperature_sensor</th>
			<th>nbr_smoke_sensor</th>
			<th>nbr_pressure_sensor</th>
			<th>nbr_actuators</th>
			<th>nbr_cables</th>	
		</tr>
		<?php

require 'globalUsage/db.php';



$query = "SELECT * FROM orders INNER JOIN computerbox ON orders.reference_id = computerbox.id WHERE orders.product = 'computerbox' AND orders.status = 'completed' ";

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
			. $row["nbr_boxes"] . "</td><td>"
			. $row["nbr_raspberries"] . "</td><td>"
			. $row["nbr_co2_sensor"] . "</td><td>"
			. $row["nbr_light_sensor"] . "</td><td>"
			. $row["nbr_humidity_sensor"] . "</td><td>"
			. $row["nbr_temperature_sensor"] . "</td><td>"
			. $row["nbr_smoke_sensor"] . "</td><td>"
			. $row["nbr_pressure_sensor"] . "</td><td>"
			. $row["nbr_actuators"] . "</td><td>"
			. $row["nbr_cables"] . 
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