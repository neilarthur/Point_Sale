<?php

require_once 'connection.php';

if (isset($_POST["update"])) {
  	$update_id = $_POST["update_id"];
  	$first_name = $_POST["first_name"];
  	$last_name = $_POST["last_name"];
  	$address = $_POST["address"];
  	$contact_no = $_POST["contact_no"];
  	$product_name = $_POST["product_name"];
  	$expect_date = $_POST["expect_date"];
  	$total = $_POST["total"];

  	$customer_run = "UPDATE customers SET first_name ='$first_name', last_name ='$last_name', address ='$address', contact_no ='$contact_no', date_created = '$expect_date' WHERE customer_id = '$update_id'";

  	$query = mysqli_query($con,$customer_run);

  	if ($query) {
  		header("location:customer.php");
  	}
  	else {
  		echo '<script?> alert ("Data Not Updated"); </script';
  	}
  }  
?>