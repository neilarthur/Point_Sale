<?php

 include_once("../connection.php");

            // Check If form submitted, insert user data into database.
            if (isset($_POST['add'])) {
                $fullname = $_POST['fullname'];
                $email_address = $_POST['email_address'];
                $contact_no = $_POST['contact_no'];
                $password    = $_POST['password'];
                $position = $_POST['position'];

                $sql = "INSERT INTO users (fullname,email_address,contact_no,password,position) VALUES('$fullname','$email_address','$contact_no','$password','$position')";

                $result = mysqli_query($con,$sql);
                if ($result) {
                	header("location:user_manager.php"); 
                }
                else {
                	header("location:user_manager.php");
                }
            }  
?>