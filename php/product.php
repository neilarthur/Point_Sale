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
                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search ms-3"style="padding-right: 65%;">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."aria-label="Search" aria-describedby="basic-addon2"id="SearchMo" onkeyup="myFunction()">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
                <!--Sign Out-->
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



             
                    <div class="toast" style="position: absolute; top: 0; right: 0;">

                        <div class="toast-header">
                            <button type="button" class="close" data-dismiss="toast" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <?php

                        $expiring = mysqli_query($con, "SELECT * FROM inventory WHERE (( date_expired - INTERVAL 8 DAY) <= current_date()) ORDER BY date_expired asc");

                        while ($bows = mysqli_fetch_array($expiring)) {
                            $datas = $bows['date_expired'];

                            $date = date("Y-M-d", strtotime($datas)); 


                         ?>

                        <div class="toast-body">
                           <h6><?php echo $bows['item_name']." - ".$bows['bar_code']." - ".$date;  ?></h6>
                        </div>
                    <?php } ?>
                    </div>




            <!-- Main content -->
            <div class="col py-3 d-flex justify-content-center overflow-auto">
                <div class="container-fluid">
                    <div class="row" >
                        <h2 class="text-dark text-start ps-3 fw-bold"> Products</h2><br>
                    </div>

                    <div class="row">
                        <div class="col ">
                            <div class="card">
                                <div class="card-body rounded-3 m-4 table-responsive-sm">
                                    <table class="table table-striped align-middle" id="ProductTab">
                                        <thead>
                                            <tr>
                                                <th scope="col">Barcode</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Quantity</th>
                                                <th scope="col" style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $query_run = mysqli_query($con,"SELECT * FROM inventory WHERE status = 'active'");

                                            $sql_run = mysqli_query($con,"SELECT * FROM category,inventory WHERE(category.category_id=inventory.category_id)");

                                            $sup_run = mysqli_query($con,"SELECT * FROM supplier,inventory WHERE(supplier.supplier_id=inventory.supplier_id)");

                                            while ($row=mysqli_fetch_assoc($query_run) AND $rows=mysqli_fetch_assoc($sql_run) AND $crows=mysqli_fetch_assoc($sup_run)) { ?>

                                                <tr>
                                                    <td hidden=""><?php echo $row['item_id'];  ?></td>
                                                    <td><?php echo $row['bar_code'];  ?></td>
                                                    <td><?php echo $row['item_name'];  ?></td>
                                                    <td><?php echo $row['price'];  ?></td>
                                                    <td><?php echo $rows['category_name'];  ?></td>
                                                    <td><?php echo $row['quantity'];  ?></td>
                                                    <td class="d-none"><?php echo $row['on_hand'];  ?></td>
                                                    <td class="d-none"><?php echo $crows['company_name'];  ?></td>
                                                    <td class="d-none"><?php echo $row['stock_in'];  ?></td>

                                                    <td>
                                                        <div class="d-flex flex-row justify-content-center">
                                                            <button class="btn btn-primary editbtn mx-3" data-toggle="modal" type="button"><i class="fas fa-eye"data-toggle="tooltip" title="edit"></i> </i>View</button>

                                                        <button class="btn btn-danger deletebtn" data-toggle="modal" type="button"><i class="fas fa-trash" data-toggle="tooltip" title="edit"></i>Delete</button>
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

        <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="Updateinventory.php" method="Post">
                    <div class="modal-header">
                        <h4 class="title">Inventory Item</h4>
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
                            <input type="text" class="form-control" name="item_name" id="item_name" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="name">quantity</label>
                            <input type="text" class="form-control" name="quantity" id="quantity" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="name">Price</label>
                            <input type="text" class="form-control" name="price" id="price" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="name">Category</label>
                            <input type="text" class="form-control" name="category_name" id="category_name" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="name">Supplier</label>
                            <input type="text" class="form-control" name="company_name" id="company_name" readonly="">
                        </div>
                        <div class="form-group">
                            <label for="name">On Hand</label>
                            <input type="text" class="form-control" name="on_hand" id="on_hand" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="name">Date Stock in </label>
                            <input type="text" class="form-control" name="stock_in" id="stock_in" readonly="">
                        </div>

                        <div class="modal-footer">
                            <a type="button" class=" btn btn-secondary" data-bs-dismiss="modal">Close</a>
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
                <h5 class="modal-title" id="mediumModalLabel">Delete Inventory</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="deleteinventory.php" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="update_id" id="delete_id">

                    <p align="center">Are you sure? You want to Delete these?</p>
                    <div class="modal-footer">
                        <button type="submit" name="update" class="btn btn-success">YES</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">NO</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


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
        $('#quantity').val(data[5]);
        $('#price').val(data[3]);
        $('#category_name').val(data[4]);
        $('#company_name').val(data[7]);
        $('#on_hand').val(data[6]);
        $('#stock_in').val(data[8]);

      })
    });
    function myFunction() {

      var input, filter, table, tr, i, j, column_length, count_td;
      column_length = document.getElementById('ProductTab').rows[0].cells.length;
      input = document.getElementById("SearchMo");
      filter = input.value.toUpperCase();
      table = document.getElementById("ProductTab");
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

    window.onload = (event) => {
  let myAlert = document.querySelectorAll('.toast')[0];
  if (myAlert) {
    let bsAlert = new bootstrap.Toast(myAlert);
    bsAlert.show();
  }
};
</script>



 
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