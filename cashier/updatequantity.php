<?php

require_once '../php/connection.php';


if (isset($_POST['update'])) {
  	
  	$update = $_POST['update_id'];
  	$qty = $_POST['quantity_number'];
  	$code = $_POST['bar_code'];
    $id = $_POST['update_code'];


  	$sales_run = "UPDATE sales SET sales_quantity = '$qty' WHERE sales_id = '$update'";

  	if ($con -> query($sales_run) === TRUE) {

  		$sql_run = "SELECT * FROM inventory WHERE bar_code = '$code'";
  		$results = mysqli_query($con,$sql_run);

  		if ($results) {

  			while ($row = mysqli_fetch_array($results)) {

          $price_inventory = $row['price'];

  				$qty_inventory = $row['quantity'];


  				$total = ($qty_inventory - $qty) + 1;

          $total_price = $price_inventory * $qty;



  				$inventory_run = "UPDATE inventory SET quantity = '$total' WHERE bar_code = '$code'";
  				$ivty = mysqli_query($con, $inventory_run);

  				if ($ivty) {


            $s_price = "UPDATE sales SET total = '$total_price' WHERE product_code = '$code'";
            $s_total = mysqli_query($con,$s_price);

            if ($s_total) {

              $updatestock = "SELECT * FROM inventory WHERE bar_code = '$code'";
              $updates = mysqli_query($con,$updatestock);

              while ($bows = mysqli_fetch_array($updates)) {
                
                $qtys = $bows['quantity']; 

                if ($qtys <= 0) {

                  $stat = "UPDATE inventory SET status = 'outofstock' WHERE bar_code ='$code'";
                  $stats = mysqli_query($con,$stat);

                  if ($stats) {

                    header("location: dashboard.php?invoice=$id");
                  }
                  else {
                     echo 'error1, ' . $con -> error;
                  }
                }
                else{
                   echo 'error2, ' . $con -> error;
                }
              }
            }
            else{
              echo 'error3, ' . $con -> error;
            }
  
  				}
  				else {
  					echo 'error4, ' . $con -> error;
  				}
  			}
  		}
  		else{
  			echo 'error5, ' . $con -> error;
  		}
  	}
  	else {
  		echo 'error6, ' . $con -> error;
  	}
}
else{
	echo 'error7, ' . $con -> error;
}

?>