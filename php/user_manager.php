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
    <title>Accounts</title>
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
                                <h2 class="text-dark text-start ps-3 fw-bold">Account Manager </h2>
                            </div>
                            <div class="position-left w-50">
                                <button type="button" class="btn btn-primary px-5 pb-2" data-bs-toggle="modal" data-bs-target="#Modals" style="margin-left: 55%;"><b><i class='bx bxs-plus-circle'></i> </b> ADD</button>
                            </div>
                            
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body rounded-3 m-4 table-responsive-lg">
                                    <table class="table table-striped align-middle" id="AccountTab">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email Address</th>
                                                <th scope="col" style="display: none;">Password</th>
                                                <th scope="col">Contact No</th>
                                                <th scope="col">Position</th>
                                                <th scope="col" style="text-align: center;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //DISPLAY THE DATA IN TABLE
                                            $query=mysqli_query($con,"SELECT * FROM users");
                                            while ($row=mysqli_fetch_assoc($query)) { ?>


                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
                                                <td><?php echo $row['email_address']; ?></td>
                                                <td style="display: none;"><?php echo $row['password']; ?></td>
                                                <td><?php echo $row['contact_no']; ?></td>
                                                <td><?php echo $row['position']; ?></td>
                                                <td>
                                                    <div class="d-flex flex-row justify-content-center">
                                                        <button class="btn btn-warning editbtn mx-2" data-toggle="modal" type="button"><i class="fas fa-edit" data-toggle="tooltip" title="edit"></i>Edit</button>

                                                        <?php
                                                        $status = $row['status'];
                                                        if ($status == 'inactive') { ?>
                                                          <a class="btn btn-success  mx-2" href="disable.php?enabled=<?php 
                                                        echo $row["id"]; ?>" type="button"><i class="fas fa-check-circle"></i> Enable</a>
                                                       <?php  }

                                                       elseif ($status =='active') {

                                                        ?>
                                                            <a class="btn btn-secondary mx-2" href="disable.php?disabled=<?php 
                                                        echo $row["id"]; ?>" type="button"><i class="fas fa-ban"></i> Disable</a>
                                                      <?php   } ?>
                                                            
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


    <!--Add Accounts -->

    <div class="modal fade" id="Modals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" action="addUserAcc.php">
        <div class="modal-header">
          <h4 class="modal-title">Add Accounts</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="name">Username</label>
            <input type="text" class="form-control" name="username">
          </div>
          <div class="form-group">
            <label for="name">Password</label>
            <input type="password" class="form-control" name="password">
          </div>
          <div class="form-group">
            <label for="name">Email address</label>
            <input type="text" class="form-control" name="email_address">
          </div>
          <div class="form-group">
            <label for="name">Contact no:</label>
            <input type="number" class="form-control" name="contact_no">
          </div>
          <div class="form-group mt-2">
            <label for="name">Position</label>
            <select class="form-select" aria-label="Default select example" name="position">
                <option selected>Open this select menu</option>
                <option>admin</option>
                <option>cashier</option>
            </select>
          </div>

          <div class="modal-footer">
              <a type="button" class=" btn btn-danger" data-bs-dismiss="modal">Cancel</a>
            <input type="submit" name="add" class="btn btn-success" value="Add">
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Accounts -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Admin Data </h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </button>
                </div>


                <form action="update_User.php" method="post">

                    <div class="modal-body">

                        <div class="form-group">

                          <input type="hidden" name="update_id" id="update_id">
                            <label> Fullname </label>

                            <input type="text" name="username"  id="username"  class="form-control"
                                placeholder="Enter Fullname"  required >
                        </div>

                        <div class="form-group">
                            <input type="hidden"  name="password" id="password"  class="form-control"
                                placeholder="Enter password"    required >
                        </div>

                         <div class="form-group">
                            <label> Email Address</label>
                            <input type="email" name="email_address" id="email_address"  class="form-control"
                                placeholder="Enter email address"      required >
                        </div>

                        <div class="form-group">
                            <label> Phone Number </label>
                            <input type="text" name="contact_no" id="contact_no" class="form-control"
                                placeholder="Enter Phone Number"    required >
                        </div>

                        <div class="form-group">
                            <label>Position </label>
                            <select class="form-select" aria-label="Default select example" name="position" id="position">
                                <option selected>Open this select menu</option>
                                <option>admin</option>
                                <option>cashier</option>
                            </select>
                        </div>
                        


                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <input type="hidden" name="id" >

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>


<script type="text/javascript">
    
    $(document).ready(function(){
      $('.editbtn').on('click', function(){

        $('#editmodal').modal('show');


        $tr = $(this).closest('tr');

        var data =  $tr.children("td").map(function(){
          return $(this).text();


        }).get();

        console.log(data);


        $('#update_id').val(data[0]);
        $('#username').val(data[1]);
        $('#password').val(data[3]);
        $('#email_address').val(data[2]);
        $('#contact_no').val(data[4]);
        $('#position').val(data[5]);

      })
    });
  </script>

  <script type="text/javascript">

    function myFunction() {

      var input, filter, table, tr, i, j, column_length, count_td;
      column_length = document.getElementById('AccountTab').rows[0].cells.length;
      input = document.getElementById("SearchMo");
      filter = input.value.toUpperCase();
      table = document.getElementById("AccountTab");
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
</body>

</html>