<!DOCTYPE html>
<html>
<head>
	<title>Waiting Orders</title>
	</style>
	<link rel="stylesheet" href="globalUsage/style.css" class="">
</head>
<body class = "waiting image" >

	<?php include "globalUsage/dropdownmenu.html"?>

	<h1><u>Waiting Orders</u></h1>
	
	<br>
	<?php include "globalUsage/searchbar.html"?>
	<br><br>

	<form action="waitingOrdersComputer.php" method="post" class = sameLine >
	<input type="submit" value="Computerbox" name = "computerbox" class = "computerWaiting bigbutton">
	</form>

	<form action="waitingOrdersCarts.php" method="post" class = sameLine >
	<input type="submit" value="Cart" name = "cart" class = "cartWaiting bigbutton" >
	</form>

	
	

</body>
</html>


