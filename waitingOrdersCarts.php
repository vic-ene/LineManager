<!DOCTYPE html>
<html>
<head>
	<title>Waiting Orders Carts</title>
	<link rel="stylesheet" href="globalUsage/style.css" class="">
</head>
<body>

	<?php include "globalUsage/dropdownmenu.html"?>
	<h1> <u>Waiting Carts</u></h1>

	

	<form action="waitingOrdersComputer.php" method="post">
	<input type="submit" value="Computerboxes" class="otherProduct">
	</form>

	

	<br>
	<?php include "globalUsage/searchbar.html"?>
	<br><br>


	<form action="waitingOrdersCarts.php" method="post" class= "sameLine">
		<select name="wheelcolor" id="wheelcolor" class = "dropdown sameLine">
			<option  value="nothing">Choose wheel color</option>
			<option  value="red">Red</option>
			<option  value="green">Green</option>
			<option  value="grey">Grey</option>
		</select>

		<select name="wheeltype" id="wheeltype" class = "dropdown sameLine">
			<option value="nothing">Choose wheel type</option>
			<option value="fix">Fix</option>
			<option value="mobile">Mobile</option>	
		</select>
	<input type="submit" value = "Update criteria" class = "updateCriteria">
	</form>

	<br><br><br><br><br>
	
	

	<table class = "waiting">
		<tr class = "waiting">
			<th>id</th>
			<th>order_time</th>
			<th>status</th>
			<th>nbr_products</th>
			<th>wheel_color</th>
			<th>wheel_type</th>
		</tr>
		
<?php

$flaw_type = "scratch";
$severity = "low";
$flaw_query = "UPDATE flaw_count SET count = count + 1 WHERE flaw_type = '$flaw_type' AND severity = '$severity'";
mysqli_query($link, $flaw_query);

require 'globalUsage/db.php';

if(isset($_POST['wheelcolor'])){
	$color = $_POST['wheelcolor'];
}else $color = "";	
if(isset($_POST['wheeltype'])){
	$type = $_POST['wheeltype'];
}else $type = "";
// we create the right query according to the restrictions
$query = "";
if($color != "nothing" && $type != "nothing" && $color != "" && $type != ""){
	$query = "SELECT * FROM orders INNER JOIN carts ON orders.reference_id = carts.id WHERE orders.product = 'carts' AND orders.status = 'waiting' 
	AND (carts.wheel_type = '$type' AND carts.wheel_color = '$color')"; 	
}else if($color == "nothing" && $type != "nothing"){
	$query = "SELECT * FROM orders INNER JOIN carts ON orders.reference_id = carts.id WHERE orders.product = 'carts' AND orders.status = 'waiting' 
	AND carts.wheel_type = '$type'"; 
}
else if($type == "nothing" && $color != "nothing"){
	$query = "SELECT * FROM orders INNER JOIN carts ON orders.reference_id = carts.id WHERE orders.product = 'carts' AND orders.status = 'waiting' 
	AND carts.wheel_color = '$color'"; 
}else{
	$query = "SELECT * FROM orders INNER JOIN carts ON orders.reference_id = carts.id WHERE orders.product = 'carts' AND orders.status = 'waiting' ";
}



if ($result = mysqli_query($link, $query)){

	if (mysqli_num_rows($result) > 0){
		$i = 0;
		while(($row = mysqli_fetch_assoc($result)) && $i<100){
			echo "<tr><td>"
			 . $row["id"] . "</td><td>" 
			 . $row["order_time"] . "</td><td>" 
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


