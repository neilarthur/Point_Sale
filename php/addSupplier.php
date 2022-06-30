<?php

require_once 'connection.php';

if (isset($_POST['create'])) {
  	
  	$company_name = $_POST['company_name'];
  	$province = $_POST['province'];
  	$city = $_POST['city'];
  	$phone_no = $_POST['phone_no'];


  	$query_run = "INSERT INTO location (province,city)VALUES('$province','$city')";
  	$location = mysqli_query($con,$query_run);

  
  	if ($location) {
  		
  		header("location:supplier.php");
  	}
  	else{
  		header("location:supplier.php");
  	}



  	$sup_run = "INSERT INTO supplier (location_id,company_name,phone_no)VALUES(LAST_INSERT_ID(),'$company_name','$phone_no')";
  	$supplier = mysqli_query($con,$sup_run);

  	if ($supplier) {
  		
  		header("location:supplier.php");
  	}
  	else{
  		header("location:supplier.php");
  	}
}  
?>