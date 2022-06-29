<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../index.php");

}

include '../connection.php';

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
    
    <body>
   
    <div class="page">

        <div class="sidebar">
            <div class="sidebar-header">
                <div class="sidebar-logo-container">
                    <div class="logo-container">
                        <img class="logo-sidebar" src="../image/logo.png" />
                    </div>
                    <div class="sys-name-container">
                        <p class="sys-name">
                            POS and Inventory<br />
                            <span class="brand-subname">
                                System
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
                                    <i class='bx bxs-home-alt-2'></i>
                                </div>
                                <div class="col-9">
                                    Home
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="navigation-list-item">
                        <a href="#submenu1" data-bs-toggle="collapse" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" >
                            <i class='bx bxs-report bi'></i><span class="mx-2 text-white fs-6 fw-bold">Sales Report</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="Weekly.php" class="nav-link px-2 mx-2 li_one text-white"><span class="d-none d-sm-inline text-white fs-6">Weekly Report</span></a>
                            </li>
                            <li class="w-100">
                                <a href="monthly.php" class="nav-link px-2 mx-2 li_one text-white"> <span class="d-none d-sm-inline text-white fs-6">Monthly Report</span></a>
                            </li>
                            <li>
                                <a href="yearly.php" class="nav-link px-2 mx-2 li_one text-white"> <span class="d-none d-sm-inline text-white fs-6">Yearly Report</span></a>
                            </li>
                        </ul>
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
                                    <i class='bx bx-user' ></i>
                                </div>
                                <div class="col-9">
                                    Accounts
                                </div>
                            </div>
                        </a>
                    </li>
                     <li class="navigation-list-item" style="margin-top: 25%;">
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
            <div class="navigationBar">
                <button id="sidebarToggle" class="btn sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Search bar -->
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Main content -->
            <div class="col py-3 d-flex justify-content-center overflow-auto">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col">
                            <br>
                            <h2 class="text-dark text-start ps-3">Products</h2><br>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="row">
                        <div class="col ">
                            <div class="card">
                                <div class="card-body rounded-3 m-4 table-responsive-sm">
                                    <table class="table table-striped align-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">First</th>
                                                <th scope="col">Last</th>
                                                <th scope="col">Handle</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row">1</th>
                                                <td>Mark</td>
                                                <td>Otto</td>
                                                <td>@mdo</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">2</th>
                                                <td>Jacob</td>
                                                <td>@fat</td>
                                                <td>baliw</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">3</th>
                                                <td>Larry</td>
                                                <td>ulol</td>
                                                <td>@twitter</td>

                                            </tr>
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