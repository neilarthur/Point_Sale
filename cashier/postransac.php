<?php

require_once '../php/connection.php';


if (isset($_POST['create'])) {

	$bar_code = $_POST['bar_code'];


	$sql_run = "SELECT * FROM inventory WHERE bar_code='$bar_code'";

	$resulted = mysqli_query($con,$sql_run);

	while ($rows = mysqli_fetch_array($resulted)) {
		$item_id = $rows['item_id'];
		$item_name = $rows['item_name'];
		$price = $rows['price'];

		$quantity = '1';
	}

	if ($resulted) {
		
			$sql = "INSERT INTO sales (item_id,bar_code, item_name, sales_price,sales_quantity) Values ('$item_id', '$bar_code', '$item_name', '$price','$quantity')";
			$results = mysqli_query($con,$sql);

			if($results){

				$invent_run = "SELECT * FROM inventory WHERE bar_code = '$bar_code'";
				$wer = mysqli_query($con,$invent_run);

		  		if ($wer) {

		  			while ($row = mysqli_fetch_array($wer)) {

		  				$qty_inventory = $row['quantity'];

		  				$total = $qty_inventory - $quantity;


		  				$inventory_run = "UPDATE inventory SET quantity = '$total' WHERE bar_code = '$bar_code'";
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
						header("location: dashboard.php");
					}
					else{
						echo $con -> error;
						#header("location:dashboard.php?failed");
					}
			}
	else {
		header("location:dashboard.php");
	}
  }
?>