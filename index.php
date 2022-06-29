
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

</head>
<body>
  
  <div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12 d-flex align-items-center justify-content-center">
      <img src="image/pos.jpg" class="img-fluid" width="700px">
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 mt-4">
      <div class="row">
        <h1 class="display-4 text-start">Point of Sale And <br>Inventory System</h1>
      </div>
      <p></p><br>

      <!-- Login -->
      <div class="card w-75  shadow p-3 mb-5 bg-white rounded" >
        <div class="card-body">
          <div class="row">
            <div class="col">

              <form action="php/login.php" method="POST" class="m-4">
                <?php if (isset($_GET['error'])) { ?>
                  <p class="error"><center><b style="color: red;"><?php echo $_GET['error'];  ?></b></center></p>
                <?php }  
                ?>
                <label class="ms-2" for="email">Username</label>
                <input class="form-control" type="text" name="username"><br>

                <label class="ms-2" for="password">Password</label>
                <input class="form-control" type="password" name="password"><br><br>
                <div class="d-flex justify-content-between align-items-center">

                <input class="form-control" type="hidden" name="position"><br>
                  <!-- Checkbox -->
                  <div class="form-check mb-0">
                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
                    <label class="form-check-label" for="form2Example3">Remember me</label>
                  </div>
                  <a href="#!" class="text-body">Forgot password?</a>
                </div>

                 <div class="text-center text-lg-start mt-4 pt-2">
                  <button type="submit" class="btn btn-primary btn-lg"style="padding-left: 9.5rem; padding-right: 9.5rem;">Login</button>
                  <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"class="link-danger">Register</a></p>
                </div>
                
              </form>
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