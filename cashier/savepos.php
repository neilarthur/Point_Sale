<?php  

require_once '../php/connection.php';


if (isset($_POST['save'])) {
	

	$cust = $_POST['custom'];
	$cas = $_POST['cash'];
	$tax = $_POST['taxes'];
	$sub_amount = $_POST['sub_totals'];
	$total_amount = $_POST['totals'];
	$invoys = $_POST['invoys'];
	$dat = $_POST['date'];



	$total_pay = $cas - $total_amount;


	$bin = "INSERT INTO sales_detail (transac_code, transac_subtotal, customer_id, transac_tax, transac_total, cash, sales_change,  date_purchase) Values ('$invoys','$sub_amount','$cust','$tax','$total_amount','$cas','$total_pay','$dat')";

	$results = mysqli_query($con,$bin);

	if ($results) {
		
		header("location: dashboard.php?invoice=$id");

	}
	else{
		echo 'error1, ' . $con -> error;
	}
}
?>