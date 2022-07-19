<?php

require_once 'connection.php';

session_start();


if ($_SERVER["REQUEST_METHOD"]=="POST") {

	$ids = $_POST['id'];

	$last_id = $_SESSION['login_id'];


	$myDate = date("d-m-y h:i:s");


	$logout_Querry = "UPDATE activity SET logout_time = '$myDate' WHERE id_act = '$last_id'";
	$logs2 = mysqli_query($con,$logout_Querry);

	if ($logs2) {
		session_destroy();
		header("location:../index.php");
    }
    else{
    	echo mysqli_error($con);
    }
}
?>