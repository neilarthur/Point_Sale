<?php

require_once 'connection.php';

if (isset($_POST['delete'])) {

	$id = $_POST['delete_id'];

	$sql = "DELETE FROM inventory WHERE item_id = '$id'";
	$sql_run = mysqli_query($con, $sql);

	if ($sql_run) {

		header("location: inventory.php");
	}
	else {
		header("location: inventory.php");
	}
  }  
?>