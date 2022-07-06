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
      $price = $_POST['price'];
      $exp_date = $_POST['expired'];

      $inventory_run = "UPDATE inventory SET bar_code = '$bar_code', item_name = '$item_name', quantity ='$quantity',on_hand ='$on_hand', stock_in ='$stock_in', category_id = '$category', supplier_id = '$supplier', price ='$price', date_expired='$exp_date' WHERE item_id = '$update_id'";

      $results = mysqli_query($con, $inventory_run);

      if ($results) {

         header("location:inventory.php?success");
      }
      else{

        header("location:inventory.php?failed");

      }
        
  }  
?>