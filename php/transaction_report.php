<?php
session_start();

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

    
    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />
    
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

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

        <div class="sidebar sd">
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
                                    <i class='bx bxs-report'></i>
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
                                    <i class='bx bx-transfer-alt' ></i>
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
            <div class="navigationBar sd">
                <button id="sidebarToggle" class="btn sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Search bar -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search ms-3">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."aria-label="Search" aria-describedby="basic-addon2" id="SearchMo" onkeyup="myFunction()">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- Main content -->

            <!-- Main content -->
            <div class="col py-3 d-flex justify-content-center overflow-auto">
                 <div class="container-fluid">
                <div class="row sd">
                        <div class="col d-flex justify-content">
                            <br>
                            <div class="w-50">
                                <h2 class="text-dark text-start ps-3 fw-bold mb-4">Sales Report </h2>
                            </div>                            
                        </div>
                    </div>
                    <div class="sd">
                        <form action="transaction_report.php" method="GET" >
                            <div class="row g-3 align-items-center justify-content-center mb-1">
                                <div class="col-auto">
                                    <span class="input-group-text" id="basic-addon1">From</span>
                                    <input type="date" name="sales" class="form-control input-sm">
                                </div>
                                <div class="col-auto">
                                    <span class="input-group-text" id="basic-addon1">To</span>
                                    <input type="date" name="trans" class="form-control ">
                                </div>
                                <div class="col-auto">
                                    <input type="submit" class="btn btn-primary">
                                </div>
                                <div class="justify-content-center">
                                    <p style="text-align: center; font-weight: bold;">Show Date:</p>
                                    <h5 class="text-center">From: <?php echo $_GET['sales']."  To: ".$_GET['trans'];  ?></h5>
                                </div> 
                            </div>
                        </form>
                    </div>

                
              

                <!-- Table -->

                    <div class="row">
                        <div class="col ">
                            <div class="card">
                                <div class="card-body rounded-3 m-4 table-responsive-sm">
                                    <table class="table table-striped align-middle" id="SalesTab">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Transaction Code</th>
                                                <th scope="col">Customer name</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Profit</th>
                                                <th scope="col">Date Purchase</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $sales = $_GET['sales'];
                                            $trans = $_GET['trans'];

                                            $code = mysqli_query($con,"SELECT * FROM sales_detail,customers WHERE(sales_detail.customer_id=customers.customer_id) AND (date_purchase BETWEEN '{$sales}' AND '{$trans}') ORDER BY transac_id DESC ");


                                            while ($row = mysqli_fetch_array($code)) {




                                            ?>
                                            <tr>
                                                <td><?php echo $row['transac_id'];  ?></td>
                                                <td><?php echo $row['transac_code'];  ?></td>
                                                <td><?php echo $row['first_name']." ". $row['last_name'];  ?></td>
                                                <td><?php echo $row['transac_total'];  ?></td>
                                                <td><?php echo $row['transac_profit'];  ?></td>
                                                <td><?php echo $row['date_purchase'];  ?></td>


                                            </tr>
                                            <?php } ?>
                                            <tr>
                                                <?php

                                                $les = $_GET['sales'];
                                                $ans = $_GET['trans'];

                                                $code1 = mysqli_query($con, "SELECT SUM(transac_total) as 'base' FROM sales_detail WHERE (date_purchase BETWEEN '{$les}' AND '{$ans}') ");


                                                $code5 = mysqli_query($con, "SELECT SUM(transac_profit) as 'nums' FROM sales_detail WHERE (date_purchase BETWEEN '{$les}' AND '{$ans}') ");


       
                                                while ($cow = mysqli_fetch_array($code1) AND $num = mysqli_fetch_array($code5)) { 

                                                 ?>
                                                <th class="text-end" colspan="3">Total: </th>
                                                <td colspan="2">PHP <?php echo $cow['base'];  ?></td>
                                                <tr>
                                                    <th class="text-end" colspan="3">Profit: </th>
                                                    <td colspan="2">PHP <?php echo $num['nums'];  ?></td>
                                                </tr>


                                            </tr>
                                        <?php  } ?>

                                            
                                        </tbody>
                                    </table>
                                    <div class="d-grid gap-2 d-md-flex mt-5 justify-content-md-end">
                                        <button class="btn btn-success sd hide" onClick="window.print()">Print this page</button>
                                    </div>
                                </div>
                            </div>
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
<script type="text/javascript">
    function myFunction() {
        var input, filter, table, tr, i, j, column_length, count_td;
        column_length = document.getElementById('SalesTab').rows[0].cells.length;
        input = document.getElementById("SearchMo");
        filter = input.value.toUpperCase();
        table = document.getElementById("SalesTab");
        tr = table.getElementsByTagName("tr");
        for (i = 1; i < tr.length; i++) {
        count_td = 0;
        for (j = 1; j < column_length - 1; j++) {
          td = tr[i].getElementsByTagName("td")[j];

          if (td) {
            if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
              count_td++;
            }
          }
        }
        if (count_td > 0) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }

    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>