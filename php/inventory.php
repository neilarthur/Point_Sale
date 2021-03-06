<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../index.php");

}

include 'connection.php';


$cat_run = "SELECT DISTINCT category_name, category_id FROM category order by category_id asc";

$result_run = mysqli_query($con, $cat_run);

$cat = "<select class='form-control mb-3' name='category'>
        <option>Select Category</option>";
  while ($craw = mysqli_fetch_assoc($result_run)) {
    $cat .= "<option value='".$craw['category_id']."'>".$craw['category_name']."</option>";
  }

$cat .= "</select>";


$sup_run = "SELECT DISTINCT company_name, supplier_id FROM supplier order by supplier_id asc";

$resulted = mysqli_query($con, $sup_run);

$supp = "<select class='form-control mb-3' name='supplier'>
        <option>Select Category</option>";
  while ($crow = mysqli_fetch_assoc($resulted)) {
    $supp .= "<option value='".$crow['supplier_id']."'>".$crow['company_name']."</option>";
  }

$supp .= "</select>";




?>
<!doctype html>
<html lang="en">
  <head>
    <title>Inventory</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="../style/dash.css">
    <link rel="icon" href="../image/logo.ico">

    
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

                <!-- Search bar -->
                 <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search ms-3"style="padding-right: 50%;">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."aria-label="Search" aria-describedby="basic-addon2" id="SearchMo" onkeyup="myFunction()">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <i class='bx bx-bell bx-sm'></i><button class="btn bg-white" id="myBtn">Notifications</button>
             <!-- Sign Out -->
                 <div>
                    <div class="dropdown pb-1 me-4">
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
            </div>

          <!-- Main content -->
            <div class="col py-3 d-flex justify-content-center overflow-auto">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col d-flex justify-content">
                            <br>
                            <div class="w-50">
                                <h2 class="text-dark text-start ps-3 fw-bold">Inventory </h2>
                            </div>
                            <div class="position-left w-50">
                                <button type="button" class="btn btn-primary px-5 pb-2" data-bs-toggle="modal" data-bs-target="#create" style="margin-left: 55%;"><b><i class='bx bxs-plus-circle'></i> </b> ADD</button>
                            </div>
                            
                        </div>
                    </div>
                    <section>
                        <div class="container-fluid">
                             <div class="row">
                                 <div class="col-md-12">
                                    <nav>
                                        <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-product-tab" data-bs-toggle="tab" data-bs-target="#nav-product" type="button" role="tab" aria-controls="nav-product" aria-selected="true">Products</button>
                                            <button class="nav-link" id="nav-stock-tab" data-bs-toggle="tab" data-bs-target="#nav-stock" type="button" role="tab" aria-controls="nav-stock" aria-selected="false">Out of Stock</button>
                                            <button class="nav-link" id="nav-expired-tab" data-bs-toggle="tab" data-bs-target="#nav-expired" type="button" role="tab" aria-controls="nav-expired" aria-selected="false">Expired</button>
                                        </div>
                                    </nav>
                                    <!--TAB PRODUCT -->

                                    <div class="tab-content" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-product" role="tabpanel" aria-labelledby="nav-product-tab">
                                            <!-- Table -->
                                            <div class="row">
                                                <div class="col ">
                                                    <div class="card">
                                                        <div class="card-body rounded-3 m-4 table-responsive-sm">
                                                            <table class="table table-striped align-middle" id="InventoryTab">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="display: none;">#</th>
                                                                        <th scope="col">Barcode</th>
                                                                        <th scope="col">Item Name</th>
                                                                        <th scope="col">Quantity</th>
                                                                        <th scope="col">Category</th>
                                                                        <th scope="col">Supplier Name</th>
                                                                        <th scope="col">Date Stock</th>
                                                                        <th scope="col">Original Price</th>
                                                                        <th scope="col">Price</th>
                                                                        <th scope="col">Profit</th>
                                                                        <th scope="col">Expiration Date</th>
                                                                        <th scope="col" style="text-align: center;">Status</th>
                                                                        <th scope="col" style="text-align: center;">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php


                                                                    $query_run = mysqli_query($con,"SELECT * FROM inventory WHERE status = 'active'");

                                                                    $sql_run = mysqli_query($con,"SELECT * FROM category,inventory WHERE(category.category_id=inventory.category_id)");

                                                                    $sup_run = mysqli_query($con,"SELECT * FROM supplier,inventory WHERE(supplier.supplier_id=inventory.supplier_id)");

                                                                    while ($row=mysqli_fetch_assoc($query_run) AND $rows=mysqli_fetch_assoc($sql_run) AND $raw=mysqli_fetch_assoc($sup_run)) { ?>
                                                                    <tr>
                                                                        <td style="display: none;"><?php echo $row['item_id'];  ?></td>
                                                                        <td><?php echo $row['bar_code'];  ?></td>
                                                                        <td><?php echo $row['item_name'];  ?></td>
                                                                        <td ><?php echo $row['quantity'];  ?></td>
                                                                        <td ><?php echo $rows['category_name'];  ?></td>
                                                                        <td><?php echo $raw['company_name'];  ?></td>
                                                                        <td><?php echo $row['stock_in'];  ?></td>
                                                                        <td ><?php echo $row['orignal_price'];  ?></td>
                                                                        <td ><?php echo $row['price'];  ?></td>
                                                                        <td ><?php echo $row['profit'];  ?></td>
                                                                        <td><?php echo $row['date_expired'];  ?></td>

                                                                        <?php 
                                                                        $date = $row['date_expired'];
                                                                        $barcode =$row['bar_code'];
                                                                        $qty = $row['quantity'];
                                                                        
                                                                           if ($date <= date("Y-m-d")) {
                                                                               echo '
                                                                                 <td style="color: red; font-weight: bold;">EXPIRED</td>
                                                                               ';
                                                                               $archive = mysqli_query($con,"UPDATE inventory SET status = 'expired' WHERE bar_code = '$barcode'");
                                                                               if ($archive) {
                                                                                   echo '
                                                                                       <script>
                                                                                            function refreshPage()
                                                                                            {
                                                                                                window.location = window.location.href;
                                                                                            }
                                                                                            setInterval("refreshPage()",0);
                                                                                        </script>
                                                                                                                                                   ';
                                                                               }
                                                                               else{
                                                                                  echo mysqli_error($con);
                                                                               }
                                                                           }
                                                                           elseif($qty <= 0){

                                                                            $outstock = mysqli_query($con,"UPDATE inventory SET status = 'outofstock' WHERE bar_code = '$barcode'"); 
                                                                            echo '<script>
                                                                                    function refreshPage()
                                                                                    {
                                                                                        window.location = window.location.href;
                                                                                    }
                                                                                    setInterval("refreshPage()",0);
                                                                                </script> ';
                                                                                }
                                                                           else{
                                                                            echo '
                                                                                 <td style="color: green; font-weight: bold;">AVAILABLE</td>
                                                                               ';
                                                                           }


                                                                        ?>
                                                                       
                                                                        <td>
                                                                            <div class="d-flex flex-row justify-content-center">
                                                                                <button class="btn btn-warning editbtn mx-3" data-toggle="modal" type="button"><i class="fas fa-edit" data-toggle="tooltip" title="edit"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                <?php }  ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--- OUT OF STOCK TAB -->
                                        <div class="tab-pane fade" id="nav-stock" role="tabpanel" aria-labelledby="nav-stock-tab">
                                            <!-- Table -->
                                            <div class="row">
                                                <div class="col ">
                                                    <div class="card">
                                                        <div class="card-body rounded-3 m-4 table-responsive-sm">
                                                            <table class="table table-striped align-middle" id="InventoryTab">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="display: none;">#</th>
                                                                        <th scope="col">Barcode</th>
                                                                        <th scope="col">Item Name</th>
                                                                        <th scope="col">Quantity</th>
                                                                        <th scope="col">Category</th>
                                                                        <th scope="col">Supplier Name</th>
                                                                        <th scope="col">Date Stock</th>
                                                                        <th scope="col">Original Price</th>
                                                                        <th scope="col">Price</th>
                                                                        <th scope="col">Profit</th>
                                                                        <th scope="col">Expiration Date</th>
                                                                        <th scope="col" style="text-align: center;">Status</th>
                                                                        <th scope="col" style="text-align: center;">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php



                                                                    $sql_run = mysqli_query($con,"SELECT * FROM category,inventory WHERE(category.category_id=inventory.category_id)");

                                                                    $sup_run = mysqli_query($con,"SELECT * FROM supplier,inventory WHERE(supplier.supplier_id=inventory.supplier_id)");

                                                                    $query_run = mysqli_query($con,"SELECT * FROM inventory WHERE status = 'outofstock'");

                                                                    while ($row=mysqli_fetch_assoc($query_run) AND $rows=mysqli_fetch_assoc($sql_run) AND $raw=mysqli_fetch_assoc($sup_run)) { ?>
                                                                    <tr>
                                                                        <?php

                                                                        $date = $row['date_expired'];
                                                                        $barcode =$row['bar_code'];
                                                                        $qty = $row['quantity'];

                                                                        if ($qty <= 0) { ?>

                                                                        <td style="display: none;"><?php echo $row['item_id'];  ?></td>
                                                                        <td><?php echo $row['bar_code'];  ?></td>
                                                                        <td><?php echo $row['item_name'];  ?></td>
                                                                        <td>0</td>
                                                                        <td ><?php echo $rows['category_name'];  ?></td>
                                                                        <td><?php echo $raw['company_name'];  ?></td>
                                                                        <td><?php echo $row['stock_in'];  ?></td>
                                                                        <td ><?php echo $row['orignal_price'];  ?></td>
                                                                        <td ><?php echo $row['price'];  ?></td>
                                                                        <td ><?php echo $row['profit'];  ?></td>
                                                                        <td><?php echo $row['date_expired'];  ?></td>

                                                                        <?php echo '<td style="color: blue; font-weight: bold;">OUT OF STOCK</td>'; ?>

                                                                        <?php }   elseif ($qty > 0) { $active = mysqli_query($con,"UPDATE inventory SET status = 'active' WHERE bar_code = '$barcode'"); 

                                                                        echo '<script>
                                                                        function refreshPage()
                                                                        {
                                                                            window.location = window.location.href;
                                                                        }
                                                                        setInterval("refreshPage()",0);
                                                                        </script> ';
                                                                        } ?>


                                                                       
                                                                        <td>
                                                                            <div class="d-flex flex-row justify-content-center">
                                                                                <button class="btn btn-warning editbtn mx-3" data-toggle="modal" type="button"><i class="fas fa-edit" data-toggle="tooltip" title="edit"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }  ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--EXPIRED  TAB -->
                                        <div class="tab-pane fade" id="nav-expired" role="tabpanel" aria-labelledby="nav-expired-tab">
                                            <!-- Table -->
                                            <div class="row">
                                                <div class="col ">
                                                    <div class="card">
                                                        <div class="card-body rounded-3 m-4 table-responsive-sm">
                                                            <table class="table table-striped align-middle" id="InventoryTab">
                                                                <thead>
                                                                    <tr>
                                                                        <th style="display: none;">#</th>
                                                                        <th scope="col">Barcode</th>
                                                                        <th scope="col">Item Name</th>
                                                                        <th scope="col">Quantity</th>
                                                                        <th scope="col">Category</th>
                                                                        <th scope="col">Supplier Name</th>
                                                                        <th scope="col">Date Stock</th>
                                                                        <th scope="col">Original Price</th>
                                                                        <th scope="col">Price</th>
                                                                        <th scope="col">Profit</th>
                                                                        <th scope="col">Expiration Date</th>
                                                                        <th scope="col" style="text-align: center;">Status</th>
                                                                        <th scope="col" style="text-align: center;">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php


                                                                    $query_run = mysqli_query($con,"SELECT * FROM inventory WHERE status = 'expired'");

                                                                    $sql_run = mysqli_query($con,"SELECT * FROM category,inventory WHERE(category.category_id=inventory.category_id)");

                                                                    $sup_run = mysqli_query($con,"SELECT * FROM supplier,inventory WHERE(supplier.supplier_id=inventory.supplier_id)");

                                                                    while ($row=mysqli_fetch_assoc($query_run) AND $rows=mysqli_fetch_assoc($sql_run) AND $raw=mysqli_fetch_assoc($sup_run)) { ?>
                                                                    <tr>
                                                                        <td style="display: none;"><?php echo $row['item_id'];  ?></td>
                                                                        <td><?php echo $row['bar_code'];  ?></td>
                                                                        <td><?php echo $row['item_name'];  ?></td>
                                                                        <td ><?php echo $row['quantity'];  ?></td>
                                                                        <td ><?php echo $rows['category_name'];  ?></td>
                                                                        <td><?php echo $raw['company_name'];  ?></td>
                                                                        <td><?php echo $row['stock_in'];  ?></td>
                                                                        <td ><?php echo $row['orignal_price'];  ?></td>
                                                                        <td ><?php echo $row['price'];  ?></td>
                                                                        <td ><?php echo $row['profit'];  ?></td>
                                                                        <td><?php echo $row['date_expired'];  ?></td>
                                                                        <td>
                                                                            <?php 
                                                                                $status = $row['status'];
                                                                                if ($status == 'expired') {
                                                                                     echo '
                                                                                       <p style="color: red; font-weight: bold;">EXPIRED</p>
                                                                                       ';
                                                                                }

                                                                            ?>
                                                                        </td>

                                                                     
                                                                       
                                                                        <td>
                                                                            <div class="d-flex flex-row justify-content-center">
                                                                                <button class="btn btn-warning editbtn mx-3" data-toggle="modal" type="button"><i class="fas fa-edit" data-toggle="tooltip" title="edit"></i></button>
                                                                            </div>

                                                                        </td>
                                                                    </tr>
                                                                <?php }  ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div> 
            </div>
        </div> 
    </div>
      <!-- Toast -->
    <div class="toast"  id ="myToast" role="alert" aria-live="assertive" aria-atomic="true" class="toast" data-bs-autohide="false" style="position: absolute; top: 80px; right: 200px;">
        <div class="toast-header">
            <strong class="me-auto ms-2" style="font-size: 17px; color: #FDED04">Expiring Item</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <?php
            $expiring = mysqli_query($con, "SELECT * FROM inventory WHERE (( date_expired - INTERVAL 8 DAY) <= current_date()) AND status ='active' ORDER BY date_expired asc");

                while ($bows = mysqli_fetch_array($expiring)) {
                    $datas = $bows['date_expired'];
                    $date = date("Y-M-d", strtotime($datas)); 
        ?>
            <div class="toast-body" >
                <h6><?php echo $bows['item_name']." - ".$bows['bar_code']." - ".$date;  ?></h6>
            </div>
        <?php } ?>
    </div>
    <!-- END -->


     <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <form action="addProducts.php" method="Post">
                    <div class="modal-header">
                        <h4 class="title">Add Items</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Bar Code</label>
                            <input type="text" class="form-control" name="bar_code" value="<?php $prefix= time()*rand(1, 2); echo strip_tags(substr($prefix ,0,9));?>" required="">
                        </div>
                        <div class="form-group">
                            <label for="name">Item Name</label>
                            <input type="text" class="form-control" name="item_name" required="">
                        </div>
                        <div class="form-group">
                            <label for="name">Quantity</label>
                            <input type="text" class="form-control" name="quantity" required="">
                        </div>
                        <div class="form-group">
                            <label for="name"> Selling Price</label>
                            <input type="text" class="form-control" name="orig_price" id="txt2" onkeyup="sum();" required="">
                        </div>
                        <div class="form-group">
                            <label for="name">Original</label>
                            <input type="text" class="form-control" name="price" id="txt1" onkeyup="sum();" required="">
                        </div>
                        <div class="form-group">
                            <label for="name">Profit</label>
                            <input type="text" class="form-control" name="profit" id="txt3" required="">
                        </div>
                        <div class="form-group">
                            <label for="name">Category </label>
                            <select class="form-select" aria-label="Default select example" name="category">
                                <option>Open this select menu</option>
                                 <?php
                                    $cup=mysqli_query($con,"SELECT * FROM category");
                                    while($cuprow=mysqli_fetch_array($cup)){
                                        ?>
                                            <option value="<?php echo $cuprow['category_id']; ?>"><?php echo $cuprow['category_name']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="name">Supplier </label>
                            <select class="form-select" aria-label="Default select example" name="supplier" >
                                <option selected="">Open this select menu</option>
                                <?php
                                    $sup=mysqli_query($con,"SELECT * FROM supplier");
                                    while($suprow=mysqli_fetch_array($sup)){
                                        ?>
                                            <option value="<?php echo $suprow['supplier_id']; ?>"><?php echo $suprow['company_name']; ?></option>
                                        <?php
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Date Stock in </label>
                            <input type="Date" class="form-control" name="stock_in" required="">
                        </div>

                        <div class="form-group">
                            <label for="name">Expired Date </label>
                            <input type="Date" class="form-control" name="expired" required="">
                        </div>
                        <div class="modal-footer">
                            <a type="button" class=" btn btn-danger" data-bs-dismiss="modal">Cancel</a>
                            <input type="submit" name="create" class="btn btn-success" value="Add">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="Updateinventory.php" method="Post">
                    <div class="modal-header">
                        <h4 class="title"> Update Inventory Item</h4>
                         <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">
                        <div class="form-group">
                            <label for="name">Bar Code</label>
                            <input type="text" class="form-control" name="bar_code" id="bar_code" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="name">Item Name</label>
                            <input type="text" class="form-control" name="item_name" id="item_name">
                        </div>
                        <div class="form-group">
                            <label for="name">quantity</label>
                            <input type="text" class="form-control" name="quantity" id="quantity">
                        </div>
                        <div class="form-group">
                            <label for="name">Category </label>
                            <?php

                              echo $cat;
                            ?>
                        </div>

                        <div class="form-group">
                            <label for="name">Supplier </label>
                        <?php

                              echo $supp;
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="name">Date Stock in </label>
                            <input type="Date" class="form-control" name="stock_in" id="stock_in" required="">
                        </div>
                        <div class="form-group">
                            <label for="name">Original Price </label>
                            <input type="number" class="form-control txt5" name="org_price" id="orignal_price" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="name">Price </label>
                            <input type="number" class="form-control txt4" name="price" id="price" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="name">Profit </label>
                            <input type="number" class="form-control txt6" name="profit" id="profit" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="name">Expired Date </label>
                            <input type="Date" class="form-control" name="expired" id="date_expired" required="">
                        </div>

                        <div class="modal-footer">
                            <a type="button" class=" btn btn-danger" data-bs-dismiss="modal">Cancel</a>
                            <input type="submit" name="update" class="btn btn-success" value="Update">
                        </div>
                    </div>
                </form>
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
    $(document).ready(function(){
        $("#myBtn").click(function(){
            $("#myToast").toast("show");
             });
    });
</script>

<script type="text/javascript">
    
    $(document).ready(function(){
      $('.editbtn').on('click', function(){

        $('#edit').modal('show');


        $tr = $(this).closest('tr');

        var data =  $tr.children("td").map(function(){
          return $(this).text();


        }).get();

        console.log(data);


        $('#update_id').val(data[0]);
        $('#bar_code').val(data[1]);
        $('#item_name').val(data[2]);
        $('#quantity').val(data[3]);
        $('#category_name').val(data[4]);
        $('#company_name').val(data[5]);
        $('#stock_in').val(data[6]);
        $('#orignal_price').val(data[7]);
        $('#price').val(data[8]);
        $('#profit').val(data[9]);
        $('#date_expired').val(data[10]);
      })
    });
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.deletebtn').on('click', function() {

            $('#delete').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#delete_id').val(data[0]);

        })
    });
    function myFunction() {

      var input, filter, table, tr, i, j, column_length, count_td;
      column_length = document.getElementById('InventoryTab').rows[0].cells.length;
      input = document.getElementById("SearchMo");
      filter = input.value.toUpperCase();
      table = document.getElementById("InventoryTab");
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


<script>
    function sum() {
        var txtFirstNumberValue = document.getElementById('txt2').value;
        var txtSecondNumberValue = document.getElementById('txt1').value;
        var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
        if (!isNaN(result)) {
            document.getElementById('txt3').value = result;
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>