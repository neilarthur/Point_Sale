<?php

session_start();

include_once 'connection.php';

function createRandomPassword() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}
$finalcode='RS-'.createRandomPassword();



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
  		header("Location:../cashier/dashboard.php?invoice=$finalcode");
  	}
  	else {
  		header("Location: ../index.php?error=Username and Password is incorrect.");
  		exit();
  	}
}

?>