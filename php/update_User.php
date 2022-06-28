<?php

include_once("../connection.php");


if (isset($_POST['update'])) {
  $update_id = $_POST['update_id'];
  $fullname=$_POST['fullname'];
  $password=$_POST['password'];
  $email_address=$_POST['email_address'];
  $contact_no=$_POST['contact_no'];
  $position = $_POST['position'];

  $query= "UPDATE users SET fullname='$fullname', password='$password', email_address='$email_address', contact_no='$contact_no',position='$position' WHERE id='$update_id' ";

  $query_run = mysqli_query($con, $query);


  if ($query_run) {
    echo '<script> alert("Data Updated");</script>';
    header("Location:user_manager.php");
  }
  else{

    echo '<script?> alert ("Data Not Updated"); </script';
  }
}  
?>