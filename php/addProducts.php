<?php

require_once 'connection.php';


if (isset($_POST['create'])) {

	$bar_code = $_POST['bar_code'];
	$item_name = $_POST['item_name'];
	$quantity = $_POST['quantity'];
	$price = $_POST['price'];
	$on_hand = $_POST['on_hand'];
	$supplier = $_POST['supplier'];
	$category = $_POST['category'];
	$stock_in = $_POST['stock_in'];



	
	$sql = "INSERT INTO inventory (category_id,bar_code,item_name,quantity,on_hand,stock_in,price,supplier_id) Values ('$category','$bar_code','$item_name','$quantity','$on_hand','$stock_in','$price','$supplier')";

	$results = mysqli_query($con,$sql);

	if ($results) {
		header("location:inventory.php");
	}
	else {
		header("location:inventory.php");
	}
  }
?>