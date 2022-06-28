<?php

include "../connection.php"; // Using database connection file here

$update_id = $_GET['update_id']; // get id through query string

$del = mysqli_query($con,"delete from users where id = '$update_id'"); // delete query

if($del)
{
    mysqli_close($con); // Close connection
    header("location: user_manager.php"); // redirects to all records page
    exit;
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>