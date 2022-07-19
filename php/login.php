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
     


       $datas = "INSERT INTO activity (id,login_time)Values ('$base', now())";
       $datas2 = mysqli_query($con,$datas);

       $_SESSION["login_id"] = mysqli_insert_id($con);

       if ($datas2) {
          header("Location:../cashier/dashboard.php?invoice=$finalcode&id=$base");
       }
       else {
        echo mysqli_error($con);
       }
    }
   
  	else {
  		header("Location: ../index.php?error=Username and Password is incorrect.");
  		exit();
  	}
}

?>