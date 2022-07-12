<?php

require_once '../php/connection.php';


if (isset($_POST['create'])) {

	$bar_code = $_POST['bar_code'];
	$id = $_POST['tans_code'];

	$sql_run = "SELECT * FROM inventory WHERE bar_code='$bar_code'";

	$resulted = mysqli_query($con,$sql_run);

	while ($rows = mysqli_fetch_array($resulted)) {

		$item_id = $rows['item_id'];
		$item_name = $rows['item_name'];
		$price = $rows['price'];
		$profit_inventory = $rows['profit'];

		$quantity = '1';
		$total_price = $price * $quantity;
	}

	if ($resulted) {

		$sql = "INSERT INTO sales (item_id, product_code, invoice_code, product_name, sales_price, sales_quantity, total, sales_profit) Values ('$item_id', '$bar_code', '$id', '$item_name', '$price','$quantity','$total_price','$profit_inventory')";

			$results = mysqli_query($con,$sql);

			if ($results) {

				$invent_run = "SELECT * FROM inventory WHERE bar_code = '$bar_code'";
				$wer = mysqli_query($con,$invent_run);

				if ($wer) {
					while ($row = mysqli_fetch_array($wer)) {

						$qty_inventory = $row['on_hand'];

						$total = $qty_inventory - $quantity;


						$inventory_run = "UPDATE inventory SET on_hand = '$total' WHERE bar_code = '$bar_code'";
		  				$ivty = mysqli_query($con, $inventory_run);


		  				if ($ivty) {
		  					
		  					header("location:dashboard.php?invoice=$id");
		  				}
		  				else{

		  					header("location: dashboard.php?updatefailed&invoice=$id");
		  				}

					}
				}

				else{

					header("location: dashboard.php?insertfailed&invoice=$id");
				}
			}
			else{
				
				header("location: dashboard.php?error404&invoice=$id");
			}
	}
	else{

		header("location: dashboard.php?insertwrong&invoice=$id");
	}
	
}
?>