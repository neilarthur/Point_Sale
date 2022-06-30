<?php

require_once 'connection.php';

if (isset($_POST['delete'])) {

	$id = $_POST['delete_id'];

	$sql = "DELETE FROM supplier WHERE supplier_id = '$id'";
	$sql_run = mysqli_query($con, $sql);

	if ($sql_run) {
		
		$query_run = "DELETE FROM location WHERE location_id = '$id'";
		$query = mysqli_query($con, $query_run);

		if ($query) {
			header("Location: supplier.php");
		}
		else{
			header("Location: supplier.php");
		}
	}
	else {
		echo "incorrect ";
	}
  }  
?>