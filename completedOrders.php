<!DOCTYPE html>
<html>
<head>
	<title>Completed Orders</title>
	<link rel="stylesheet" href="globalUsage/style.css" class="">
	
</head>
<body class = "image completed">
	<?php include "globalUsage/dropdownmenu.html"?>
	<h1> <u>Completed Orders</u></h1>

	<br><br><br>

	<form action="completedOrdersComputer.php" method="post" class = sameLine >
	<input type="submit" value="Computerbox" name = "computerbox" class = "computer bigbutton">
	</form>

	<form action="completedOrdersCarts.php" method="post" class = sameLine >
	<input type="submit" value="Cart" name = "cart" class = "cart bigbutton" >
	</form>
	

</body>
</html>