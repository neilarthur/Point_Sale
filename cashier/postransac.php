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