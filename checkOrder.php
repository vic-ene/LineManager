<!DOCTYPE html>
<html>
<head>
	<title>Check Order</title>
	<link rel="stylesheet" href="globalUsage/style.css" class="">

</head>
<body>
	<?php include "globalUsage/dropdownmenu.html"?>
	<h1> <u>Here is your order</u></h1>

	<br><br><br><br><br><br>
	<table class = "check">
		<tr class = "check">
			<th>id</th>
			<th>order_time</th>
			<th>completion_time</th>
			<th>status</th>
			<th>nbr_products</th>
		</tr>
		
<?php

require 'globalUsage/db.php';


$id = $_POST["id"];
$query = "SELECT * FROM orders WHERE id = ".$id ;


if ($result = mysqli_query($link, $query)){
	if (mysqli_num_rows($result) > 0){
		while(($row = mysqli_fetch_assoc($result))){
			echo "<tr><td>" 
			. $row["id"] . "</td><td>" 
			. $row["order_time"] . "</td><td>" 
			. $row["completion_time"] . "</td><td>" 
			. $row["status"] . "</td><td>" . $row["nbr_products"] 
			. "</td></tr>" ;
		}
		echo "</table>";
	}else{
		echo "0 results";
	}

	mysqli_free_result($result);

}
else if (!$result){
	$message = 'Invalid query: ' . mysql_error() . "\n";
	$message .= 'Whole query: ' . $query;
	die($message);
}

mysqli_close($link);
?>
	</table>


	<form action="updateProduction.php" method="post" class = "sameLine">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="submit" name = "case" value="Start Production"  class=" bigbutton startProduction">
	</form>


	<form action="updateProduction.php" method="post" class = "sameLine">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="submit" name = "case" value="Set To Completed" class=" bigbutton setToCompleted">
	</form>


</body>
</html>


