<?php

include_once 'connection.php';


if (isset($_POST['deletedata'])) {
  	
  	$id = $_POST['delete_id'];

  	$sql = "DELETE FROM users WHERE id = '$id'";
  	$sql_run = mysqli_query($con,$sql);

  	if ($sql_run) {
  		header("Location:user_manager.php");
  	}
  	else {

  		header("Location: user_manager.php");
  	}
  }  
?>