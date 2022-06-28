<?php

session_start();

include_once 'connection.php';


if ($_SERVER["REQUEST_METHOD"]=="POST") {

	$email_address = $_POST['email_address'];
	$password = $_POST['password'];

	$query = "SELECT * FROM users WHERE email_address='".$email_address."' AND password='".$password."'";
  	$result = mysqli_query($con,$query);


  	$row=mysqli_fetch_array($result);

  	if ($row["position"]=='admin') {

  		$_SESSION["email_address"] = $email_address;
  		$_SESSION["login"]=true;
  		header("Location: php/dashboard.php");
  	}
  	elseif ($row["position"]=='cashier') {

  		 $_SESSION["email_address"] = $email_address;
  		 $_SESSION["login"]=true;
  		header("Location: php/dashboard.php");
  	}
  	else {
  		header("Location: index.php?error=username and password is incorrect.");
  		exit();
  	}
}

?>