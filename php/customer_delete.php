<?php

include_once 'connection.php';


if (isset($_POST['deletedata'])) {
  	
  	$id = $_POST['delete_id'];

  	$sql = "DELETE FROM customers WHERE customer_id = '$id'";
  	$sql_run = mysqli_query($con,$sql);

  	if ($sql_run) {
  		header("Location:customer.php");
  	}
  	else {

  		header("Location:customer.php");
  	}
  }  
?>