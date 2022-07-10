<?php  

require_once '../php/connection.php';




function createRandomPassword() {
    $chars = "003232303232023232023456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;
    while ($i <= 7) {

        $num = rand() % 33;

        $tmp = substr($chars, $num, 1);

        $pass = $pass . $tmp;

        $i++;

    }
    return $pass;
}
$finalcode='RS-'.createRandomPassword();


if (isset($_POST['save'])) {
	

	$cust = $_POST['custom'];
	$cas = $_POST['cash'];
	$tax = $_POST['taxes'];
	$sub_amount = $_POST['sub_totals'];
	$total_amount = $_POST['totals'];
	$invoys = $_POST['invoys'];



	$total_pay = $cas - $total_amount;


	$bin = "INSERT INTO sales_detail (transac_code, transac_subtotal, customer_id, transac_tax, transac_total, cash, sales_change) Values ('$invoys','$sub_amount','$cust','$tax','$total_amount','$cas','$total_pay')";

	$results = mysqli_query($con,$bin);

	if ($results) {
		
		header("location: dashboard.php?invoice=$finalcode");

	}
	else{
		echo 'error1, ' . $con -> error;
	}
}
?>