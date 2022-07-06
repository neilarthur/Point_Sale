<?php

require_once '../php/connection.php';


if (isset($_POST['update'])) {
  	
  	$id = $_POST['update_id'];
  	$qty = $_POST['quantity_number'];
  	$code = $_POST['bar_code'];

  	$sales_run = "UPDATE sales SET sales_quantity = '$qty' WHERE bar_code = '$code'";

  	if ($con -> query($sales_run) === TRUE) {

  		$sql_run = "SELECT * FROM inventory WHERE bar_code = '$code'";
  		$results = mysqli_query($con,$sql_run);

  		if ($results) {

  			while ($row = mysqli_fetch_array($results)) {

  				$qty_inventory = $row['quantity'];

  				$total = ($qty_inventory - $qty) + 1;


  				$inventory_run = "UPDATE inventory SET quantity = '$total' WHERE bar_code = '$code'";
  				$ivty = mysqli_query($con, $inventory_run);

  				if ($ivty) {
  					
  					header("location:dashboard.php");
  				}
  				else {
  					echo 'error1, ' . $con -> error;
  				}
  			}
  		}
  		else{
  			echo 'error2, ' . $con -> error;
  		}
  	}
  	else {
  		echo 'error3, ' . $con -> error;
  	}
}
else{
	echo 'error4, ' . $con -> error;
}

?>