<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../index.php");

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
                            <i class='bx bxs-report bi'></i><span class="mx-2 text-white ">Sales Report</span></a>
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
                     <li class="navigation-list-item" style="margin-top:45%;">
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
                        <div class="col d-flex justify-content">
                            <br>
                            <div class="w-50">
                                <h2 class="text-dark text-start ps-3 ">Supplier</h2>
                            </div>
                            <div class="position-left w-50">
                                <button type="button" class="btn btn-success px-5 pb-2" data-bs-toggle="modal" data-bs-target="#create" style="margin-left: 55%"><b><i class='bx bxs-plus-circle'></i> </b> ADD</button>
                            </div>
                            
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="row">
                        <div class="col ">
                            <div class="card">
                                <div class="card-body rounded-3 m-4 table-responsive-lg">
                                    <table class="table table-striped align-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Company Name</th>
                                                <th scope="col">Province</th>
                                                <th scope="col">City</th>
                                                <th scope="col">Phone Number</th>
                                                <th scope="col" style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                             <?php

                                            $query_run = mysqli_query($con,"SELECT * FROM supplier");

                                            $sql_run = mysqli_query($con,"SELECT * FROM location");
                                            while ($row=mysqli_fetch_assoc($query_run) AND $rows=mysqli_fetch_assoc($sql_run)) { ?>
                                            <tr>
                                                <td><?php echo $row['supplier_id'];  ?></td>
                                                <td><?php echo $row['company_name'];  ?></td>
                                                <td><?php echo $rows['province'];  ?></td>
                                                <td><?php echo $rows['city'];  ?></td>
                                                <td><?php echo $row['phone_no'];  ?></td>
                                                <td>
                                                    <div class="d-flex flex-row justify-content-center">
                                                        <button class="btn btn-warning editbtn mx-3" data-toggle="modal" type="button"><i class="fas fa-edit" data-toggle="tooltip" title="edit"></i>Edit</button>

                                                        <button class="btn btn-danger deletebtn" data-toggle="modal" type="button"><i class="fas fa-trash" data-toggle="tooltip" title="edit"></i>Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
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

    <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                
                <form action="addSupplier.php" method="Post">
                    <div class="modal-header">
                        <h4 class="title">Add Suppliers</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" class="form-control" name="company_name" required="">
                        </div>
                        <div class="form-group">
                            <label for="name">Province</label>
                            <input type="text" class="form-control" name="province" required="">
                        </div>
                        <div class="form-group">
                            <label for="name">City</label>
                            <input type="text" class="form-control" name="city" required="">
                        </div>
                        <div class="form-group">
                            <label for="name">Phone Number </label>
                            <input type="number" class="form-control" name="phone_no" required="">
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

                <form action="Updatesupplier.php" method="Post">
                    <div class="modal-header">
                        <h4 class="title"> Update Personal Information</h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="update_id" id="update_id">
                        <div class="form-group">
                            <label for="name">Company Name</label>
                            <input type="text" class="form-control" name="company_name" id="company_name">
                        </div>
                        <div class="form-group">
                            <label for="name">Province</label>
                            <input type="text" class="form-control" name="province" id="province">
                        </div>
                        <div class="form-group">
                            <label for="name">city</label>
                            <input type="text" class="form-control" name="city" id="city">
                        </div>
                        <div class="form-group">
                            <label for="name">Phone Number</label>
                            <input type="text" class="form-control" name="phone_no" id="phone_no">
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

        <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Delete Account</h5>
            </div>
            <form action="deletesupplier.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="delete_id" id="delete_id">

                    <p align="center">Are you sure? You want to Delete this Account?</p>
                    <div class="modal-footer">
                        <button type="submit" name="delete" class="btn btn-success">YES</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                    </div>
                </div>
            </form>
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
      $('.editbtn').on('click', function(){

        $('#edit').modal('show');


        $tr = $(this).closest('tr');

        var data =  $tr.children("td").map(function(){
          return $(this).text();


        }).get();

        console.log(data);


        $('#update_id').val(data[0]);
        $('#company_name').val(data[1]);
        $('#province').val(data[2]);
        $('#city').val(data[3]);
        $('#phone_no').val(data[4]);

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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>