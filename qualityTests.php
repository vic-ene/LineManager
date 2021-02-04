<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="globalUsage/style.css" class="">
    <title>Quality Tests</title>
</head>
<body>
    <h1><u>Quality Tests</u></h1>
    <?php include "globalUsage/dropdownmenu.html"?>

	<br><br><br>

	
	<form action="qualityTests.php" method="post" class= "sameLine" id = "flaw_form">
	
		<input type="number" name="order_id" placeholder = "order_id" class = "qualityTest">

		<input type="number" name="product_id" placeholder = "product_id" class = "qualityTest">

		<select name="product_type"  class = "qualityTest">
			<option  value="">Product</option>
			<option  value="cart">Cart</option>
			<option  value="computerbox">Computerbox</option>
		</select>
	
		<select name="state" id="state" class = "qualityTest">
			<option value="">State</option>
			<option value="failed">Failed</option>	
			<option value="minor_flaw">Minor Flaw</option>
			<option value="passed">Passed</option>	
		</select>


		<script>
			function check(){
				var ff = document.getElementById("flaw_form");
				var state = document.getElementById("state").value;
				if(state == "failed"){
					ff.setAttribute('action',"flaw_page.php");
				}
				else{   
					ff.setAttribute('action',"qualityTests.php");
				}
				return true;
			}
		</script>

		<input onclick = "check()" type="submit" value = "Submit Test" class = "qualityTest-submit">

	</form>

	<br><br><br><br><br>
	

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

if (!empty($_POST)) {
	if(isset($_POST['order_id']) && isset($_POST['product_id']) && isset($_POST['product_type']) && isset($_POST['state'])){
		$order_id = $_POST["order_id"];
		$product_id = $_POST["product_id"];
		$product_type = $_POST["product_type"];
		$state = $_POST["state"];
		// if we can insert the quality test right away (state != failed)
		if($state !== "failed" && !isset($_POST['severity']) && !isset($_POST['flaw_type'])){
			if($order_id !== "" && $product_id !== "" && $product_type !== "" && $state !== ""){
				$quality_test_delete = "DELETE FROM quality_test WHERE quality_test.order_id = '$order_id'";
				mysqli_query($link, $quality_test_delete);
		
				$insert_quality_test = "INSERT INTO quality_test(order_id, product_type, product_id, state) VALUES
				('$order_id', '$product_type', '$product_id', '$state');";
				mysqli_query($link, $insert_quality_test);
			}
		} // when we also insert a flaw. 
		else{
			$flaw_type = $_POST['flaw_type'];
			$severity = $_POST['severity'];
			
			$flaw_insert = "INSERT INTO flaw(flaw_type, severity) VALUES
			('$flaw_type', '$severity')";
			mysqli_query($link, $flaw_insert);
			$flaw_id = mysqli_insert_id($link);

			$quality_test_delete = "DELETE FROM quality_test WHERE quality_test.order_id = '$order_id'";
			mysqli_query($link, $quality_test_delete);
			$insert_quality_test = "INSERT INTO quality_test(order_id, product_type, product_id, state, flaw_id) VALUES
			('$order_id', '$product_type', '$product_id', '$state', '$flaw_id');";
			mysqli_query($link, $insert_quality_test);
		}
	}
}



$query = "SELECT * FROM quality_test WHERE quality_test.state IS NULL";


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


    
</body>
</html>