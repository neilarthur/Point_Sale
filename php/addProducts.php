<?php

require_once 'connection.php';


if (isset($_POST['create'])) {

	$item_code = $_POST['item_code'];
	$item_name = $_POST['item_name'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$on_hand = $_POST['on_hand'];
	$company_name = $_POST['company_name'];
	$category_name = $_POST['category_name'];
	$stock_in = $_POST['stock_in'];



	$sql_run = "INSERT INTO category (category_name) Values ('$category_name')";

	$sql_results = mysqli_query($con,$sql_run);


	if ($sql_results) {
		
		header("location:inventory.php");
	}
	else {
		header("location: inventory.php");
	}


	
	$sql = "INSERT INTO inventory (category_id,item_code,item_name,quantity,on_hand,stock_in,price,supplier_id) Values (LAST_INSERT_ID(),'$item_code','$item_name','$quantity','$on_hand','$stock_in','$price',LAST_INSERT_ID())";

	$results = mysqli_query($con,$sql);

	if ($results) {
		header("location:inventory.php");
	}
	else {
		header("location:inventory.php");
	}
  }
?>