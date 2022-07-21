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


$pdf ->Cell(40,10,"Transaction Code","1","0","C");
$pdf ->Cell(50,10,"Product Name","1","0","C");
$pdf ->Cell(25,10,"Quantity","1","0","C");
$pdf ->Cell(25,10,"Price","1","0","C");
$pdf ->Cell(35,10,"Date Purchase","1","1","C");
$pdf ->SetFont ('Arial', '', 12);


//table rows



if (isset($_GET['id'])) {

	$id = $_GET['id'];


	$table = mysqli_query($con, "SELECT * FROM sales, sales_detail WHERE(sales_detail.transac_code='{$id}') AND (sales.invoice_code='{$id}')");


	while ($details = mysqli_fetch_array($table)) {

		$pdf ->Cell(40,10,$details['transac_code'],"1","0","C");
		$pdf ->Cell(50,10,$details['product_name'],"1","0","C");
		$pdf ->Cell(25,10,$details['sales_quantity'],"1","0","C");
		$pdf ->Cell(25,10,$details['sales_price'],"1","0","C");
		$pdf ->Cell(35,10,$details['date_purchase'],"1","1","C");
	}

	$table2 = mysqli_query($con,"SELECT * FROM sales_detail WHERE transac_code = '$id' ");

	while ($bows = mysqli_fetch_assoc($table2)) { 

		$pdf ->Cell(40,10, "","0","0","C");
		$pdf ->Cell(50,10, "","0","0","C");
		$pdf ->Cell(25,10, "Tax:","0","0","C");
		$pdf ->Cell(25,10, $bows['transac_tax'],"0","1","C");

		$pdf ->Cell(40,10, "","0","0","C");
		$pdf ->Cell(50,10, "","0","0","C");
		$pdf ->Cell(25,10, "Subtotal:","0","0","C");
		$pdf ->Cell(25,10, $bows['transac_subtotal'],"0","1","C");

		$pdf ->Cell(40,10, "","0","0","C");
		$pdf ->Cell(50,10, "","0","0","C");
		$pdf ->Cell(25,10, "Payment:","0","0","C");
		$pdf ->Cell(25,10, $bows['cash'],"0","1","C");

		$pdf ->Cell(40,10, "","0","0","C");
		$pdf ->Cell(50,10, "","0","0","C");
		$pdf ->Cell(25,10, "Total:","0","0","C");
		$pdf ->Cell(25,10, $bows['transac_total'],"0","1","C");

		$pdf ->Cell(40,10, "","0","0","C");
		$pdf ->Cell(50,10, "","0","0","C");
		$pdf ->Cell(25,10, "Change:","0","0","C");
		$pdf ->Cell(25,10, $bows['sales_change'],"0","1","C");
	}
}

$pdf ->Output();  
?>