<?php

require_once 'connection.php';

if (isset($_POST['update'])) {
  $update_id = $_POST['update_id'];
  $status = 'archive';


  $query= "UPDATE inventory SET status = '$status' WHERE item_id='$update_id'";
  $query_run = mysqli_query($con, $query);

  


  if ($query_run) {
    echo '<script> alert("Data Updated");</script>';
    header("Location:product.php");
  }
  else{

    echo '<script?> alert ("Data Not Updated"); </script';
  }
}  
?>