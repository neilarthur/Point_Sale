<?php

require_once 'connection.php';

if (isset($_POST['update'])) {
      
      $update_id = $_POST['update_id'];
      $bar_code = $_POST['bar_code'];
      $item_name = $_POST['item_name'];
      $quantity = $_POST['quantity'];
      $on_hand = $_POST['on_hand'];
      $supplier = $_POST['supplier'];
      $category = $_POST['category'];
      $stock_in = $_POST['stock_in'];

      $inventory_run = "UPDATE inventory SET bar_code = '$bar_code', item_name = '$item_name', quantity ='$quantity',on_hand ='$on_hand', stock_in ='$stock_in'  WHERE item_id = '$update_id'";

      $results = mysqli_query($con, $inventory_run);

      if ($results) {

         header("location:inventory.php?success");
      }
      else{
        //header("location:inventory.php?failed");

        echo $con ->error;
      }

        $product = "UPDATE inventory SET supplier_id = '$supplier', category_id = '$category' WHERE item_id = '$update_id' ";

        $results_run = mysqli_query($con, $product);

        if ($results_run) {
          header("location:inventory.php?success");
        }
        else{

          echo $con ->error;
        }
        
  }  
?>