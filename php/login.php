<?php

session_start();

include_once 'connection.php';


if ($_SERVER["REQUEST_METHOD"]=="POST") {

  $username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM users WHERE username='".$username."' AND password='".$password."'";
  	$result = mysqli_query($con,$query);


  	$row=mysqli_fetch_array($result);

  	if ($row["position"]=='admin') {

  		$_SESSION["username"] = $username;
  		$_SESSION["login"]=true;
  		header("Location:dashboard.php");
  	}
  	elseif ($row["position"]=='cashier') {

  		 $_SESSION["username"] = $username;
  		 $_SESSION["login"]=true;
  		header("Location:dashboard.php");
  	}
  	else {
  		header("Location: ../index.php?error=username and password is incorrect.");
  		exit();
  	}
}

?>