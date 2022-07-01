<?php

require_once 'connection.php';

if (isset($_POST['update'])) {
      
      $update_id = $_POST['update_id'];
      $item_name = $_POST['item_name'];
      $quantity = $_POST['quantity'];
      $on_hand = $_POST['on_hand'];
      $category_name = $_POST['category_name'];
      $stock_in = $_POST['stock_in'];

      $inventory_run = "UPDATE inventory, category SET item_name = '$item_name', quantity ='$quantity',on_hand ='$on_hand', stock_in ='$stock_in' WHERE item_id = '$update_id'";

      $results = mysqli_query($con, $inventory_run);

      if ($results) {

        header("location:inventory.php");
      }
      else{
        header("location:inventory.php");
      }

      $category_run = "UPDATE category SET category_name = '$category_name' WHERE category_id = '$update_id'";

      $category_result = mysqli_query($con,$category_run);

      if ($category_result) {
          header("location:inventory.php");
      }
      else{
        header("location:inventory.php");
      }
  }  
?>