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
  $encrpt = md5($password);

	$query = "SELECT * FROM users WHERE username='".$username."' AND password='".$encrpt."'";
  	$result = mysqli_query($con,$query);


  	$row=mysqli_fetch_array($result);

  	if ($row["position"]=='admin') {

      $_SESSION["position"] = $row['position'];
  		$_SESSION["username"] = $username;
  		$_SESSION["login"]=true;
  		header("Location:dashboard.php?invoice=$finalcode");
  	}
  	elseif ($row["position"]=='cashier') {

       $_SESSION["position"] = $row['position'];
  		 $_SESSION["username"] = $username;
       $_SESSION["id"] =$row['id'];



       $base = $_SESSION['id'];


  		 $_SESSION["login"]=true;





       $data = "UPDATE users SET log_time = now() WHERE id = '$base'";
       $data1 = mysqli_query($con,$data);


       if ($data1) {

        header("Location:../cashier/dashboard.php?invoice=$finalcode&id=$base");
       }
       else{
        echo mysqli_error($con);
       }
  	}
  	else {
  		header("Location: ../index.php?error=Username and Password is incorrect.");
  		exit();
  	}
}

?>