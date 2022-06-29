<?php

require_once '../connection.php';

if (isset($_POST["create"])) {
  	
  	$first_name = $_POST["first_name"];
  	$last_name = $_POST["last_name"];
  	$address = $_POST["address"];
  	$contact_no = $_POST["contact_no"];
  	$product_name = $_POST["product_name"]; 
  	$total = $_POST["total"];
  	$expect_date = $_POST["expect_date"];

  	$sql_run = "INSERT INTO customers (first_name,last_name,address,contact_no,product_name,total,expect_date) VALUES ('$first_name','$last_name','$address','$contact_no','$product_name','$total','$expect_date')";

  	$sql_result = mysqli_query($con,$sql_run);

  	if ($sql_result) {

  		header("location:customer.php");
  	}
  	else{
  		header("location:customer.php");
  	}
  }  
?>