<?php
session_start();

if (!isset($_SESSION["email_address"])) {
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
                        <div class="dropdown pb-1 ">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class='bx bxs-report bi'></i>
                                <span class="mx-2 text-white"> Sales Report</span>
                            </a>
                            <ul class="dropdown-menu text-small shadow">
                                <li><a class="dropdown-item" href="weekly.php">Weekly Report</a></li>
                                <li><a class="dropdown-item" href="monthly.php">Monthly Report</a></li>
                                <li><a class="dropdown-item" href="yearly.php">Yearly Report</a></li>
                            </ul>
                        </div>
                        
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
                    <li class="navigation-list-item">
                        <div class="dropdown pb-1">
                            <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="col-2">
                                    <i class='bx bx-user'></i>
                                </div>
                                <span class="d-none d-sm-inline mx-1"><?php echo $_SESSION["email_address"];  ?></span>
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
                            <h2 class="text-dark text-start ps-3">Account Manager</h2>
                            <button type="button" class="btn btn-success  pb-2" data-bs-toggle="modal" data-bs-target="#Modals">ADD</button>
                        </div>
                    </div>

                    <!-- Table -->
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body rounded-3 m-4 table-responsive-sm">
                                    <table class="table table-striped align-middle">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Fullname</th>
                                                <th scope="col">Email Address</th>
                                                <th scope="col" style="display: none;">Password</th>
                                                <th scope="col">Contact No</th>
                                                <th scope="col">Position</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //DISPLAY THE DATA IN TABLE
                                            $query=mysqli_query($con,"SELECT * FROM users");
                                            while ($row=mysqli_fetch_assoc($query)) { ?>


                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['fullname']; ?></td>
                                                <td><?php echo $row['email_address']; ?></td>
                                                <td style="display: none;"><?php echo $row['password']; ?></td>
                                                <td><?php echo $row['contact_no']; ?></td>
                                                <td><?php echo $row['position']; ?></td>
                                                <td>
                                                    <button class="btn btn-warning editbtn" data-toggle="modal" type="button"><i class="fas fa-edit" data-toggle="tooltip" title="edit"></i>Edit</button>
                                                     <td><a onClick= "javascript: return confirm('Please confirm deletion');" href="user_delete.php?update_id=<?php echo $row['id']; ?>" type="button" class="btn btn-danger deletebtn"><i class="fas fa-trash" data-toggle="tooltip" title="edit"></i></a></td>
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


    <!--add Accounts -->

    <div class="modal fade" id="Modals" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <form method="post" action="addUserAcc.php">
        <div class="modal-header">
          <h4 class="modal-title">Add Accounts</h4>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="name">Fullname</label>
            <input type="text" class="form-control" name="fullname">
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
            <input type="text" class="form-control" name="contact_no">
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
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>


                <form action="update_User.php" method="post">

                    <div class="modal-body">

                        <div class="form-group">

                          <input type="hidden" name="update_id" id="update_id">
                            <label> Fullname </label>

                            <input type="text" name="fullname"  id="fullname"  class="form-control"
                                placeholder="Enter Fullname"  required >
                        </div>

                        <div class="form-group">
                            <label> Password</label>
                            <input type="Password"  name="password" id="password"  class="form-control"
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
        $('#fullname').val(data[1]);
        $('#password').val(data[3]);
        $('#email_address').val(data[2]);
        $('#contact_no').val(data[4]);
        $('#position').val(data[5]);

      })
    });
  </script>
</body>

</html>