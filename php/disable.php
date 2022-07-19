<?php

require_once 'connection.php';

if ($_GET['disabled']) {
  $disable_id = $_GET['disabled'];
  $status = 'inactive';


  $query= "UPDATE users SET status = '$status' WHERE id ='$disable_id'";
  $query_run = mysqli_query($con, $query);

  


  if ($query_run) {
    echo '<script> alert("Data Updated");</script>';
    header("Location:user_manager.php");
  }
  else{

    echo '<script?> alert ("Data Not Updated"); </script';
  } 
}
elseif ($_GET['enabled']) {
  $disable_id = $_GET['enabled'];
  $status = 'active';


  $query= "UPDATE users SET status = '$status' WHERE id ='$disable_id'";
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