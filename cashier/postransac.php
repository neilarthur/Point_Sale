<?php

require_once '../php/connection.php';


if (isset($_POST['create'])) {

	$barcode = $_POST['barcode'];


	$sql = "INSERT INTO sales (item_id) Values ('$barcode')";

	$results = mysqli_query($con,$sql);

	if ($results) {
		header("location:dashboard.php");
	}
	else {
		header("location:dashboard.php");
	}
  }
?>