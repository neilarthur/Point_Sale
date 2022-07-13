<?php

include_once 'connection.php';


if (isset($_POST['updated'])) {
  	
  	$id = $_POST['update_id'];
    $status = 'archieve';



    $sql= "UPDATE customers SET customer_status = '$status' WHERE customer_id='$id' ";
    $query_run = mysqli_query($con, $sql);

  	if ($query_run) {
  		header("Location:customer.php");
  	}
  	else {

  		echo 'error1, ' . $con -> error;
  	}
  }  
?>