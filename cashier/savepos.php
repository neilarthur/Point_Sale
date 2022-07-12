<?php  

require_once '../php/connection.php';







if (isset($_POST['save'])) {
	

	$cust = $_POST['custom'];
	$cas = $_POST['cash'];
	$tax = $_POST['taxes'];
	$sub_amount = $_POST['sub_totals'];
	$total_amount = $_POST['totals'];
	$trans = $_POST['trans_profit'];
	$invoys = $_POST['invoys'];



	$total_pay = $cas - $total_amount;


	$bin = "INSERT INTO sales_detail (transac_code, transac_subtotal, customer_id, transac_tax, transac_total, transac_profit, cash, sales_change) Values ('$invoys','$sub_amount','$cust','$tax','$total_amount','$trans','$cas','$total_pay')";

	$results = mysqli_query($con,$bin);

	if ($results) {
		
		header("location: cashier_reciept.php?invoice=$invoys");

	}
	else{
		echo 'error1, ' . $con -> error;
	}
}
?>