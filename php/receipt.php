<?php
session_start();

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

if (!isset($_SESSION["username"])) {
    header("location: ../index.php");

}

include 'connection.php';

if (!isset($_SESSION["position"]) || $_SESSION["position"] != 'admin') {
  header("location: ../cashier/dashboard.php?invoice=$finalcode");
  exit;
}

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../style/dash.css">
    <link rel="icon" href="../image/logo.ico">


    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"/>
      <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>

    </head>
    <style type="text/css">
        @media print {
            .sd {
                display: none !important; 
            }
        }
    </style>
    <body>
   
    <div class="page">

        <div class="sidebar sd" >
            <div class="sidebar-header">
                <div class="sidebar-logo-container">
                    <div class="logo-container">
                        <img class="logo-sidebar" src="../image/logo.png" />
                    </div>
                    <div class="sys-name-container mt-2">
                        <p class="sys-name">
                            POS and <br>
                            <span class="brand-subname">
                            Inventory System
                            </span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="sidebar-body">
                <ul class="navigation-list">
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="dashboard.php">
                            <div class="row">
                                <div class="col-2">
                                    <i class='bx bxs-dashboard'></i>
                                </div>
                                <div class="col-9">
                                    Dashboard
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="transaction_report.php?sales=0&trans=0">
                            <div class="row">
                                <div class="col-2">
                                    <i class='bx bxl-product-hunt' ></i>
                                </div>
                                <div class="col-9">
                                    Sales Report
                                </div>
                            </div>
                        </a>
                    </li>

                    <li class="navigation-list-item">
                        <a class="navigation-link" href="transaction.php">
                            <div class="row">
                                <div class="col-2">
                                    <i class='bx bx-transfer-alt'></i>
                                </div>
                                <div class="col-9">
                                    Transaction
                                </div>
                            </div>
                        </a>
                    </li>
                    
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="product.php">
                            <div class="row">
                                <div class="col-2">
                                    <i class='bx bxl-product-hunt' ></i>
                                </div>
                                <div class="col-9">
                                    Products
                                </div>
                            </div>
                        </a>
                    </li>
                     <li class="navigation-list-item">
                        <a class="navigation-link" href="inventory.php">
                            <div class="row">
                                <div class="col-2">
                                    <i class='bx bxs-box'></i>
                                </div>
                                <div class="col-9">
                                    Inventory
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="../cashier/dashboard.php?invoice=<?php echo $finalcode;  ?>">
                            <div class="row">
                                <div class="col-2">
                                    <i class='bx bxs-box'></i>
                                </div>
                                <div class="col-9">
                                    POS
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="customer.php">
                            <div class="row">
                                <div class="col-2">
                                    <i class='bx bx-group'></i>
                                </div>
                                <div class="col-9">
                                    Customer
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="supplier.php">
                            <div class="row">
                                <div class="col-2">
                                    <i class='bx bxs-cart' ></i>
                                </div>
                                <div class="col-9">
                                    Supplier
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="loghistory.php">
                            <div class="row">
                                <div class="col-2">
                                    <i class='bx bx-history'></i>
                                </div>
                                <div class="col-9">
                                    Log History
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="user_manager.php">
                            <div class="row">
                                <div class="col-2">
                                    <i class='bx bxs-user-account'></i>
                                </div>
                                <div class="col-9">
                                    Accounts
                                </div>
                            </div>
                        </a>
                    </li>
                    <hr style="color:rgb(255, 255, 255);margin-top:10px;">
                    <li class="navigation-list-item" style="margin-top: 45%;">
                        <div class="dropdown pb-1">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="col-2">
                                    <img src="../image/user_35px.png" />
                                </div>
                                <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION["username"];  ?></span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1">
                                <li><a class="dropdown-item" href="#">Settings</a></li>
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
                <!--End Sidebar -->

            </div>

        </div>
        <!-- Toggle -->
        <div class="content">
            <div class="navigationBar justify-content-between sd">
                <button id="sidebarToggle" class="btn sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="dropdown pb-1 me-4 ">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="col-2">
                            <img class="mr-3" src="../image/user_35px.png" />
                        </div>
                        <span class="d-none d-sm-inline mx-1 ms-3 text-dark"><?php echo $_SESSION["username"];  ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1">
                         <li><a class="dropdown-item" href="#">Settings</a></li>
                         <li><a class="dropdown-item" href="#">Profile</a></li>
                         <li><hr class="dropdown-divider"></li>
                        <a class="dropdown-item" href="../php/logout.php">Sign out</a>
                    </ul>
                </div>
            </div>
           

             <!-- Main content -->
             <div class="col py-3 d-flex justify-content-center overflow-auto">
                <div class="container">
                <div class="row">
                        <div class="col d-flex justify-content">
                            <br>
                            <div class="w-50">
                                <h2 class="text-dark  text-center" style="text-align: center; margin-right: -30rem;">Mini C Supermarket</h2>
                                <h4 class="text-dark text-center " style="text-align: center; margin-right: -30rem;">Sta Cruz, Laguna</h4>
                                <h6 class="text-dark  text-center" style="text-align: center; margin-right: -30rem;">Cell No#:094956372</h6>
                            </div>                            
                        </div>
                    </div>

                    <!-- Table -->
                    <table class="table">
                            <thead>
                                <tr class="text-light" style="background: #01A7EC;">
                                     <th scope="col"><b>Transaction Code</b></th>
                                    <th scope="col"><b>Product Name</b></th>
                                    <th scope="col"><b>Quantity</b></th>
                                    <th scope="col"><b>Price</b></th>
                                    <th scope="col"><b>Date Purchase</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $id = $_GET['invoice'];

                                $table = mysqli_query($con, "SELECT * FROM sales, sales_detail WHERE(sales_detail.transac_code='{$id}') AND (sales.invoice_code='{$id}')");

                               //$table1 = mysqli_query($con,"SELECT * FROM sales_detail,customers  WHERE(sales_detail.customer_id=customers.customer_id)");

                                while ($rows = mysqli_fetch_assoc($table)) {
                                ?>
                                <tr>
                                    <td><?php echo $rows['transac_code'];  ?></td>
                                    <td><?php echo $rows['product_name'];  ?></td>
                                    <td><?php echo $rows['sales_quantity'];  ?></td>
                                    <td><?php echo $rows['sales_price'];  ?></td>
                                     <td><?php echo $rows['date_purchase'];  ?></td>
                                </tr>
                                <?php } 


                                $table2 = mysqli_query($con,"SELECT * FROM sales_detail WHERE transac_code = '$id' ");

                                while ($bows = mysqli_fetch_assoc($table2)) {
                                ?>

                                <tr>
                                    <th class="text-end" colspan="4">Tax: </th>
                                    <td colspan="5">PHP <?php echo $bows['transac_tax'];  ?></td>
                                </tr>
                                <tr>
                                    <th class="text-end" colspan="4">Subtotal: </th>
                                    <td colspan="5">PHP <?php echo $bows['transac_subtotal'];  ?></td>
                                </tr>
                                <tr>
                                    <th class="text-end" colspan="4">payment: </th>
                                    <td colspan="5">PHP <?php echo $bows['cash'];  ?></td>
                                </tr>
                                <tr>
                                    <th class="text-end" colspan="4">Total: </th>
                                    <td colspan="5">PHP <?php echo $bows['transac_total'];  ?></td>
                                </tr>

                                <tr>
                                    
                                    <th class="text-end" colspan="4">Change: </th>
                                    <td colspan="5">PHP <?php echo $bows['sales_change'];  ?></td>
                                </tr>

                            <?php  } ?>
                            </tbody>
                        </table>
                        <div class="d-grid gap-2 d-md-flex mt-5 justify-content-md-end">

                            <a class="btn btn-success sd hide" href="Daily.php?&id=<?php echo $_GET['invoice'] ?>">Print</a>
                        </div>
                </div> 
                 
             </div>
                 
             </div>
            
        </div>
    </div>


 
<script>
    let sidebarToggle = document.querySelector(".sidebarToggle");
    sidebarToggle.addEventListener("click", function(){
        document.querySelector("body").classList.toggle("active");
        document.getElementById("sidebarToggle").classList.toggle("active");
    })
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>