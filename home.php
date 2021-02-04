<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="globalUsage/style.css" class="">
</head>
<body class = "image home">
    <?php include "globalUsage/dropdownmenu.html"?>
    <h1 class = "home"><strong>SUPER LINE MANAGER</strong></h1>

    <form action="waitingOrders.php" method="post" >
	<input type="submit" value = "Waiting Orders" class = "waiting mediumbutton">
    </form>

    <form action="ongoingOrders.php" method="post" >
	<input type="submit" value = "Ongoing Orders" class = "ongoing mediumbutton">
    </form>

    <form action="completedOrders.php" method="post" >
	<input type="submit" value = "Completed Orders" class = "completed mediumbutton">
    </form>
    
</body>
</html>