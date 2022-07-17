<?php

require_once 'connection.php';


if (isset($_POST['create'])) {

	$bar_code = $_POST['bar_code'];
	$item_name = $_POST['item_name'];
	$quantity = $_POST['quantity'];
	$orig_price = $_POST['orig_price'];
	$price = $_POST['price'];
	$profits = $_POST['profit'];
	$supplier = $_POST['supplier'];
	$category = $_POST['category'];
	$stock_in = $_POST['stock_in'];
	$exp_date = $_POST['expired'];



	
	$sql = "INSERT INTO inventory (category_id, bar_code, item_name, quantity, stock_in, price, orignal_price, profit, supplier_id, date_expired) Values ('$category','$bar_code','$item_name','$quantity','$stock_in','$price','$orig_price','$profits', '$supplier','$exp_date')";

	$results = mysqli_query($con,$sql);

	if ($results) {
		header("location:inventory.php");
	}
	else {
		echo 'error1, ' . $con -> error;
	}
  }
?>