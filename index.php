
<?php

session_start();

if (isset($_SESSION["login"])) {
    header("location: php/dashboard.php");

}

include_once 'php/connection.php';  

?>



<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style/styles.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />

</head>
<body style="background-color: rgb(78, 115, 223);">
<div class="container" style="margin-top: 10%;">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card-group mb-0">
          <div class="card p-4">
            <div class="card-body">
              <h1 style="text-align:center;">Welcome</h1>
              <p class="text-bold" style="text-align:center;">Point of Sale and Inventory System</p>
               <?php if (isset($_GET['error'])) { ?>
                  <p class="error"><center><b style="color: red;"><?php echo $_GET['error'];  ?></b></center></p>
                <?php }  
                ?>

              <form action="php/login.php" method="POST" class="m-1">
                <div class="input-group mb-3">
                   <span class="far fa-user p-2"></span>
                   <input class="form-control" type="text" name="username" placeholder=" Username">
              </div>
              <div class="input-group mb-4">
                <span class="fas fa-lock p-2"></span>
                <input class="form-control" type="password" name="password" required placeholder="Password">
              </div>
              <div class="row w-75 ms-5">
                <button type="submit" class="btn btn-primary px-4">Login</button>
              </div>
              </form>
            </div>
          </div>
          <div class="card text-white py-5 d-md-down-none" style="width:44%">
            <div class="card-body text-center">
              <div>
                <img src="image/pos.jpg" class="img-fluid" width="500px">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</html>