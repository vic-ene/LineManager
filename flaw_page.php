<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flaw Page</title>
    <link rel="stylesheet" href="globalUsage/style.css" class="css">
</head>
<body>
    <h1>Flaw Page</h1>

    <?php 
    require 'globalUsage/db.php';
    $order_id = $_POST['order_id'];
    $product_id = $_POST['product_id'];
    $product_type = $_POST['product_type'];
    $state = $_POST['state'];
    if(isset($_POST['flaw_type'])){
        $flaw_type = $_POST['flaw_type'];
    } else $flaw_type = "";
    if(isset($_POST['severity'])){
        $severity = $_POST['severity'];
    }else $severity = ""; 
    ?>

   

    <div class="flaw_buttons">
        <div class="button_block">
            <button onclick="autoComplete()" class="form_button" id = "flaw_type_button" value = "scratch">Scratch</button>
            <button onclick="autoComplete()" class="form_button" id = "flaw_type_button" value = "painting">Painting</button>
            <button onclick="autoComplete()" class="form_button" id = "flaw_type_button" value = "robustness">Robustness</button>
            <button onclick="autoComplete()" class="form_button" id = "flaw_type_button" value = "electricity">Electricity</button>  
        </div>
        <div class="button_block">
            <button onclick="autoComplete()" class="form_button" id = "severity_button" value = "low">Low</button>
            <button onclick="autoComplete()" class="form_button" id = "severity_button" value = "medium">Medium</button>
            <button onclick="autoComplete()" class="form_button" id = "severity_button" value = "high">High</button>
        </div>
    </div>
    <br><br>
    <div class="text-info">
        <p><em>Enter Information concerning the flaw...</em></p>
    </div>
    
 

    <script>

    function autoComplete(){
        if(event.target.id == "flaw_type_button"){
            document.getElementById('flaw_type').value = event.target.value;
        }else if(event.target.id == "severity_button"){
            document.getElementById('severity').value = event.target.value;
        }
    }

    </script>

    <div class="flaw_submit">
        <form action="qualityTests.php" method="post" class= "sameLine" id = "flaw_form">
                <input type="hidden" name = "order_id" value = <?php echo $order_id ?>>
                <input type="hidden" name = "product_id" value = <?php echo $product_id ?>>
                <input type="hidden" name = "product_type" value = <?php echo $product_type ?>>
                <input type="hidden" name = "state" value = <?php echo $state ?>>
                <input type="text" name="flaw_type"  id = "flaw_type" placeholder = "flaw type"  class = "flaw_page" value = <?php echo $flaw_type?>>
                <br><br>
                <input type="severity" name="severity" id = "severity" placeholder = "severity"  class = "flaw_page" value = <?php echo $severity?> >
                <br><br>
                <input onclick = "check()" type="submit" value = "Submit Flaw" class = "flaw_page_submit">
        </form>
    </div>

    <script>
			function check(){
				var ff = document.getElementById("flaw_form");
				var flaw_type = document.getElementById("flaw_type").value;
                var severity = document.getElementById("severity").value;
				if(flaw_type === "" || severity === ""){
					ff.setAttribute('action',"flaw_page.php");
				}
				else{   
					ff.setAttribute('action',"qualityTests.php");
				}
				return true;
			}
		</script>

    </script>

   

    

    
</body>
</html>