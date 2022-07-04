<?php

require_once 'connection.php';

if (isset($_POST['update'])) {
      
      $update_id = $_POST['update_id'];
      $company_name = $_POST['company_name'];
      $province = $_POST['province'];
      $city = $_POST['city'];
      $phone_no = $_POST['phone_no'];


      $supplier_run = 'UPDATE supplier e join location l on l.location_id=e.location_id set company_name="'.$company_name.'", l.province ="'.$province.'", l.city ="'.$city.'", phone_no="'.$phone_no.'" WHERE
          supplier_id ="'.$update_id.'"'; 

      $results = mysqli_query($con, $supplier_run);

      if ($results) {

        header("location:supplier.php");
      }
      else{
        header("location:supplier.php");
      }

  }  
?>