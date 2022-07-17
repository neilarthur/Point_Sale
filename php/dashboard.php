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

if (!isset($_SESSION["position"]) || $_SESSION["position"] != 'admin') {
  header("location: ../cashier/dashboard.php?invoice=$finalcode");
  exit;
}
include 'connection.php';


?>

<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Dash Css -->
    <link rel="stylesheet" type="text/css" href="../style/dash.css">
    <link rel="icon" href="../image/logo.ico">

    
    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />

    <script src="https://kit.fontawesome.com/8d06153b2a.js" crossorigin="anonymous"></script>
    
    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
      rel="stylesheet"
    />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!-- Box icons -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>

    </head>
    
    <body>

    <div class="page">

        <div class="sidebar">
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
                                   <i class='bx bx-money-withdraw'></i>
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

                </ul>
                <!--End Sidebar -->

            </div>

        </div>
        <!-- Toggle -->
        <div class="content">
            <div class="navigationBar justify-content-between">
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

            <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"></h1>
                    </div>

                    <div class="row">

                        <!-- Accounts Card Example -->
                        <div class="col-xl-3 col-md-6 mb-5">
                            <div class="card border-left-success shadow h-100 py-1">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                ACCOUNTS</div>
                                                <?php

                                                $query = "SELECT id FROM users ORDER BY id";
                                                $query_result = mysqli_query($con,$query);

                                                $row = mysqli_num_rows($query_result);

                                                echo '<h4  class="h4 mb-0 font-weight-bold text-gray-800"><b>'.$row.' Record(s)</b> </h2>';

                                                ?>
                                            </div>
                                        <div class="col-auto mt-2">
                                            <i class='bx bxs-user bx-lg' ></i>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Supplier Card Example -->
                        <div class="col-xl-3 col-md-6 mb-5">
                            <div class="card border-left-success shadow h-100 py-1">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                SUPPLIER</div>

                                                 <?php

                                                $query = "SELECT supplier_id FROM supplier ORDER BY supplier_id";
                                                $query_result = mysqli_query($con,$query);

                                                $row = mysqli_num_rows($query_result);

                                                echo '<h4  class="h4 mb-0 font-weight-bold text-gray-800"><b>'.$row.' Record(s)</b></h4>';

                                                ?>

                                            </div>
                                        <div class="col-auto mt-2">
                                            <i class='bx bxs-cart bx-lg' ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                       
                        <!-- Customers Card Example -->
                        <div class="col-xl-3 col-md-6 mb-5">
                            <div class="card border-left-success shadow h-100 py-1">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                CUSTOMERS</div>

                                                <?php

                                                $query_run = "SELECT customer_id FROM customers WHERE customer_status='active' ORDER BY customer_id";
                                                $query_result = mysqli_query($con,$query_run);

                                                $raw = mysqli_num_rows($query_result);

                                                echo '<h4 class="h4 mb-0 font-weight-bold text-gray-800"><b>'.$raw.' Record(s)</b></h4>';

                                                ?>
                                        </div>
                                        <div class="col-auto mt-2">
                                           <i class='bx bx-male-female bx-lg'></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      

                        <!-- Products Card Example -->
                        <div class="col-xl-3 col-md-6 mb-5">
                            <div class="card border-left-warning shadow h-100 py-1">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                PRODUCTS</div>
                                              <?php

                                                $query_run = "SELECT item_id FROM inventory WHERE status='active' ORDER BY item_id";
                                                $query_result = mysqli_query($con,$query_run);

                                                $raw = mysqli_num_rows($query_result);

                                                echo '<h4 class="h4 mb-0 font-weight-bold text-gray-800""><b>'.$raw.' Record(s)</b></h4>';

                                                ?>
                                        </div>
                                        <div class="col-auto mt-2">
                                           <i class='bx bxl-product-hunt bx-lg' ></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-lg-4">
                            <div class="card shadow h-100 text-dark bg-light mb-3" >
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
                                    <h6 class="m-0 font-weight-bold text-primary"><center>Display Available Products</center></h6>
                                </div>
                                <div class="card-body card-body rounded-3 m-4 table-responsive-lg">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Barcode</th>
                                                <th scope="col">Product Name</th>
                                            </tr>
                                        </thead>
                                    <tbody>
                                        <?php

                                $display = mysqli_query($con, "SELECT * FROM inventory WHERE status='active'");

                                while ($row = mysqli_fetch_array($display)) {
                                ?>
                                        <tr>
                                          <td><?php echo $row['bar_code']; ?></td>
                                          <td><?php echo $row['item_name']; ?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                  </table> 
                                </div>
                                <a class="btn btn-white shadow p-3 bg-white rounded" href="product.php" >View all Products</a>
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