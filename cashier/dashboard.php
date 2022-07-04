<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../index.php");

}

include '../php/connection.php';


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
             <hr style="color:rgb(255, 255, 255);margin-top:10px;">
            <div class="sidebar-body">
                <ul class="navigation-list">
                    <li class="navigation-list-item">
                        <a class="navigation-link" href="dashboard.php">
                            <div class="row">
                                <div class="col-2">
                                    <i class='bx bxs-home-alt-2'></i>
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
                   
                   <li class="navigation-list-item" style="margin-top: 350px;">
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
                                <li><a class="dropdown-item" href="../php/logout.php">Sign out</a></li>
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
            <div class="container-fluid">
                <p></p>
                <!-- Table -->
                    <div class="row">
                        <div class="col ">
                            <div class="card" >
                                <div class="card-body rounded-3 m-4 table-responsive-sm">
                                    <table class="table table-striped align-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">bar_code</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col">Total</th>
                                                <th scope="col">Profit</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $query_run = mysqli_query($con,"SELECT * FROM sales,inventory WHERE(sales.item_id=inventory.item_id)");

                                            $sql_run = mysqli_query($con,"SELECT * FROM sales");

                                            while ($rows=mysqli_fetch_assoc($query_run) AND $dow=mysqli_fetch_assoc($sql_run)) { ?>
                                            <tr>
                                                <TD><?php echo $rows['bar_code'];  ?></TD>
                                                <TD><?php echo $rows['item_name'];  ?></TD>
                                                <TD><?php echo $rows['price'];  ?></TD>
                                                <TD>
                                                    <div class="d-flex flex-row justify-content-center">
                                                        <button class="btn btn-warning editbtn mx-3" data-toggle="modal" type="button"><i class="fas fa-edit" data-toggle="tooltip" title="edit"></i>-</button>

                                                        <button class="btn btn-danger deletebtn" data-toggle="modal" type="button"><i class="fas fa-trash" data-toggle="tooltip" title="edit"></i>+</button>
                                                </TD>
                                                 <TD><?php echo $dow['Total'];  ?></TD>
                                                 <TD><?php echo $dow['Profit'];  ?></TD>
                                                 <TD>

                                                        <button class="btn btn-danger deletebtn" data-toggle="modal" type="button"><i class="fas fa-trash" data-toggle="tooltip" title="edit"></i>Delete</button>
                                                </TD>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                    <hr>
                                    <table class="table table-striped align-middle" >
                                        <thead>
                                             <tr>
                                                <th>Tax:</th>
                                                <td>0</td>
                                            </tr>
                                            <tr>
                                                <th>Discount:</th>
                                                <td>20%</td>
                                            </tr>
                                            <tr>
                                                <th>Sub total:</th>
                                                <td>PHP 10,000</td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>PHP 20,000</td>
                                            </tr>
                                        </thead>
                                    </table>
                                    <form class="text-center mt-5">
                                        <button class="btn btn-danger mb-3" type="button">
                                            <i class='bx bxs-x-circle'></i> Cancel
                                        </button>
                                        <button class="btn btn-primary mb-3" type="button">
                                            <i class='bx bxs-shopping-bag-alt' ></i> Change
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 col-lg-4">
                            <div class="card border-primary ps-3 pe-3">

                                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search " action="Postransac.php" method="POST">
                                    <p style="margin-top: 10px;">Barcode Select</p>
                                    <select class="form-control bg-light border-0 small mb-3 selectpicker" data-live-search="true" name="barcode">
                                        <option selected></option>
                                        <?php

                                        $cup=mysqli_query($con,"SELECT * FROM inventory");
                                        while($cuprow=mysqli_fetch_array($cup)){ ?>
                                            <option data-tokens="ketchup mustard" value="<?php echo $cuprow['item_id']; ?>"><?php echo $cuprow['bar_code']; ?>- <?php echo $cuprow['item_name']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <button class="btn btn-primary w-100 mb-3" type="submit" name="create">
                                        <i class='bx bx-plus-medical'></i> Add Catalog
                                    </button>
                                    <button class="btn btn-secondary w-100 mb-3" type="button">
                                        <i class='bx bxs-coupon'></i> Voucher
                                    </button>
                                    <button class="btn btn-success w-100 mb-3" type="button">
                                        <i class='bx bx-cart' ></i> New Sale
                                    </button>
                                </form>
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