
 <?php
 
 require 'globalUsage/db.php';

  $id = $_POST["id"];
  $case = $_POST["case"];
  $_query;
  $text_for_the_user = "";

  if($case == 'Start Production'){
  	$_query = "UPDATE orders SET status = 'ongoing' WHERE id = $id";
  	$text_for_the_user = "Order $id is now ongoing";
  }

  if($case == 'Set To Completed'){
  	$_query = "UPDATE orders SET status = 'completed', completion_time = NOW() WHERE id = $id" ;
  	$text_for_the_user = "Order $id is now completed";
  }

  mysqli_query($link, $_query);

  mysqli_close($link);
 ?>


 <link rel="stylesheet" href="globalUsage/style.css" class="">

 <title>Update Production</title>
  <?php include "globalUsage/dropdownmenu.html"?>
  
  <h1 align="center"> <?php echo $text_for_the_user ?></h1>

  <br> 

  <form action = "waitingOrders.php" method = "post" class = >
  	<input type="submit"  value = "Waiting Orders" class = "waiting mediumbutton">
  </form>

   <form action = "completedOrders.php" method = "post" class = >
  	<input type="submit"  value = "Completed Orders" class = "completed mediumbutton">
  </form>

   <form action = "ongoingOrders.php" method = "post" class = >
  	<input type="submit"  value = "Ongoing Orders" class = "ongoing mediumbutton">
  </form>

 




