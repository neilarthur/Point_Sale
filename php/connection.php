<?php

$hostname = "localhost";
$username = "root";
$password = "";
$dbname = "pointofsales";


$con = mysqli_connect($hostname,$username,$password,$dbname);

if (mysqli_connect_errno()) {
	die("failed to establish connection".mysqli_connect_errno());
}

?>