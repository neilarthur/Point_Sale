<?php
require('connection.php');

require('../fpdf184/fpdf.php');



$pdf =  new FPDF();

$pdf ->AddPage();

$pdf ->SetFont ('Arial', 'B', 30);

$pdf ->setTextColor(0,0,0);

$pdf ->Cell(200,10,"Mini C SuperMarket","0","1","C");

$pdf ->SetFont ('Arial', '', 15);


$pdf ->setTextColor(0,0,0);

$pdf ->Cell(200,10," Brgy 4180. Aguinaldo Street ","0","1","C");

$pdf ->SetFont ('Arial', '', 15);


$pdf ->setTextColor(0,0,0);

$pdf ->Cell(200,10,"Sta.Cruz, Laguna","0","1","C");

$pdf ->setLeftMargin(15);


$pdf ->setTextColor(0,0,0);


$pdf ->SetFont ('Arial', 'B', 12);
$pdf ->setTextColor(0,0,0);


$pdf ->Cell(55,10,"Transaction Code","1","0","C");
$pdf ->Cell(60,10,"Customer name","1","0","C");
$pdf ->Cell(30,10,"Total","1","0","C");
$pdf ->Cell(30,10,"Profit","1","1","C");
$pdf ->SetFont ('Arial', '', 12);


//table rows



if (isset($_GET['sales']) && ($_GET['trans'])) {
	
	$sales = $_GET['sales'];
	$trans = $_GET['trans'];

	$code =mysqli_query($con, "SELECT * FROM sales_detail,customers WHERE (sales_detail.customer_id=customers.customer_id) AND (date_purchase BETWEEN '{$sales}' AND '{$trans}') ORDER BY transac_id DESC "); 


	while ($details = mysqli_fetch_array($code)) {

		$pdf ->Cell(55,10,$details['transac_code'],"1","0","C");
		$pdf ->Cell(60,10,$details['first_name']." ". $details['last_name'],"1","0","C");
		$pdf ->Cell(30,10,$details['transac_total'],"1","0","C");
		$pdf ->Cell(30,10,$details['transac_profit'],"1","1","C");
	}


	 $code1 = mysqli_query($con, "SELECT SUM(transac_total) as 'base' FROM sales_detail WHERE (date_purchase BETWEEN '{$sales}' AND '{$trans}') ");

	 $code5 = mysqli_query($con, "SELECT SUM(transac_profit) as 'nums' FROM sales_detail WHERE (date_purchase BETWEEN '{$sales}' AND '{$trans}') ");


	 while ($dows = mysqli_fetch_array($code1) AND $bows = mysqli_fetch_array($code5)) {

	 	$pdf ->Cell(55,10,"","2","0","C");
	 	$pdf ->Cell(60,10,"Total:","0","0","C");
	 	$pdf ->Cell(30,10,$dows['base'],"0","1","C");
	 	$pdf ->Cell(55,10,"","2","0","C");
	 	$pdf ->Cell(60,10,"Profit:","0","0","C");
	 	$pdf ->Cell(30,10,$bows['nums'],"0","1","C");
	 }


}

$pdf ->Output();  
?>