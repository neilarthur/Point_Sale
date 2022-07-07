<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../index.php");

}

include '../php/connection.php';


$cat_run = "SELECT DISTINCT customer_id, first_name , last_name FROM customers order by customer_id asc";

$result_run = mysqli_query($con, $cat_run);

$cat = "<select class='form-control bg-light border-0 small mb-3' name='customers'>
        <option>Select Customers</option>";
  while ($craw = mysqli_fetch_assoc($result_run)) {
    $cat .= "<option value='".$craw['customer_id']."'>".$craw['first_name']." &nbsp; ".$craw['last_name']."</option>";
  }

$cat .= "</select>";


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
                                    <i class='bx bxs-bar-chart-square' ></i>
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
                                                <th scope="col">Barcode</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col" style="text-align: center">Quantity</th>
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
                                                <td hidden=""><?php echo $dow['sales_id'];  ?></td>
                                                <TD><?php echo $dow['product_code'];  ?></TD>
                                                <TD><?php echo $dow['product_name'];  ?></TD>
                                                <TD><?php echo $dow['sales_price'];  ?></TD>
                                                <TD style="text-align:center"><?php echo $dow['sales_quantity'];  ?></TD>
                                                 <TD style="text-align:center"><?php echo $dow['Total'];  ?></TD>
                                                 <TD style="text-align:center"><?php echo $dow['sales_profit'];  ?></TD>
                                                 <TD>
                                                    <button class="btn btn-success quantitybtn " data-dir="up" data-bs-toggle="modal" >
                                                        <i class='bx bx-plus'></i>
                                                    </button>

                                                    <button class="btn btn-danger deletebtn" data-toggle="modal"><i class="fas fa-trash" data-toggle="tooltip" title="edit"></i></button>
                                                         
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
                                    <div class="text-center mt-5">
                                        <button class="btn btn-danger mb-3" type="button">
                                            <i class='bx bxs-x-circle'></i> Cancel
                                        </button>
                                        <button class="btn btn-primary mb-3 changebtn" type="button" data-toggle="modal">
                                            <i class='bx bxs-shopping-bag-alt' ></i> Change
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-5 col-lg-4">
                            <div class="card border-primary ps-3 pe-3">

                                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search " action="postransac.php" method="POST">
                                    <p style="margin-top: 10px;">Barcode Search</p>

                                    <input type="text" class="form-control bg-light border-0 small mb-3" name="bar_code">


                                    <button class="btn btn-primary w-100 mb-3" type="submit" name="create">
                                        <i class='bx bx-plus-medical'></i> Add Catalog
                                    </button>
                                    <button class="btn btn-secondary w-100 mb-3" type="button">
                                        <i class='bx bxs-coupon'></i> Discount
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
<!-- Modal Quantity -->

<div class="modal fade" id="quantity" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Add Quantity</h5>
            </div>
            <form action="updatequantity.php" method="POST">
                <div class="modal-body">
                     <input type="hidden" name="update_id" id="update_id">
                     <input type="number" class="form-control-sm" name="quantity_number" id="sales_quantity"><br><br>
                     <input type="text" class="form-control-sm" name="bar_code" id="bar_code">

                    <div class="modal-footer">
                        <button type="submit" name="update" class="btn btn-success">ADD</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Add Quantity</h5>
            </div>
            <form action="deletecash.php" method="POST">
                <div class="modal-body">
                     <input type="hidden" name="delete_id" id="delete_id">
                    <div class="modal-footer">
                        <button type="submit" name="delete" class="btn btn-success">Delete</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCEL</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Do you want to Save</h5>
            </div>
            <form action="savepos.php" method="POST">
                <div class="modal-body">
                     <input type="hidden" name="save_id" id="save_id">
                     <?php

                     echo $cat;  

                     ?>

                       <p style="margin-top: 10px;">Enter your Cash</p>

                       <input type="number" class="form-control bg-light border-0 small mb-3" name="cash">
                                    
                    <div class="modal-footer">
                        <button type="submit" name="save" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCEL</button>
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
    $(document).ready(function() {
        $('.quantitybtn').on('click', function() {

            $('#quantity').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#update_id').val(data[0]);
            $('#bar_code').val(data[1]);
            $('#sales_quantity').val(data[4]);

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
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('.changebtn').on('click', function() {

            $('#change').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();
            console.log(data);
            $('#save_id').val(data[0]);

        })
    });
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>