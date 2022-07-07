<?php


require_once '../php/connection.php';


if (isset($_POST['delete'])) {
  	
  	$id = $_POST['delete_id'];

  	$delete_run = "DELETE FROM sales WHERE sales_id = '$id'";

  	$delete = mysqli_query($con, $delete_run);

  	if ($delete) {
  		header("location: dashboard.php");
  	}
  	else{
  		echo 'error1, ' . $con -> error;
  	}
  }  
?>