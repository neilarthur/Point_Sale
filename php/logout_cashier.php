<?php

require_once 'connection.php';

session_start();

session_destroy();

header("location:../index.php");

if ($_SERVER["REQUEST_METHOD"]=="POST") {

	$ids = $_POST['id_act'];


	$data = "UPDATE users SET out_time = now() WHERE id = '$ids'";
    $data1 = mysqli_query($con,$data);

       if ($data1) {
         header("Location:../cashier/dashboard.php?invoice=$finalcode&id=$base");
       }
       else{
        echo mysqli_error($con);
       }
}
?>