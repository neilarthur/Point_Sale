<?php
session_start();

if (!isset($_SESSION["username"])) {
    header("location: ../index.php");

}


include '../php/connection.php';





$cat_run = "SELECT DISTINCT customer_id, first_name , last_name FROM customers order by customer_id asc";

$result_run = mysqli_query($con, $cat_run);

$cat = "<select class='form-control bg-light border-0 small mb-3' name='custom'>
        <option>Select Customers</option>";
  while ($craw = mysqli_fetch_assoc($result_run)) {
    $cat .= "<option value='".$craw['customer_id']."'>".$craw['first_name']." &nbsp; ".$craw['last_name']."</option>";
  }

$cat .= "</select>";


?>


<?php
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
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Font Awesome -->
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
      rel="stylesheet"
    />

    <link rel="icon" href="../image/logo.ico">
    
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" />

    </head>
    
    <body style="background-color: rgb(230, 230, 230);">
   
    <div class="page">

        <?php

        if ($_SESSION['position'] =='admin') { ?> 

        <nav class="navbar navbar-dark fw-bold" style="background-color: rgb(78, 115, 223);">

                
                <a class="navbar-brand" href="../php/dashboard.php">
                <img src="../image/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> Point of Sale and Inventory System</a>

                 <div class="dropdown pb-1 me-4">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <div class="col-2 ms-4">
                        <img class="mr-3" src="../image/user_35px.png" />
                    </div>
                    <span class="d-none d-sm-inline mx-1 ms-3"><?php echo $_SESSION["username"];  ?></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1">
                    
                        <a class="dropdown-item" href="../php/logout.php">Sign out</a>
                    </li>
                </ul>

            </div>

        </nav>


            <?php } elseif ($_SESSION['position'] =='cashier') { ?>

                <nav class="navbar navbar-dark fw-bold" style="background-color: rgb(78, 115, 223);">

                
                <a class="navbar-brand" href="#">
                <img src="../image/logo.png" width="30" height="30" class="d-inline-block align-top" alt=""> Point of Sale and Inventory System</a>

                <div class="dropdown pb-1 me-4">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="col-2 ms-4">
                            <img class="mr-3" src="../image/user_35px.png" />
                        </div>
                        <span class="d-none d-sm-inline mx-1 ms-3"><?php echo $_SESSION["username"];  ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-white text-small shadow" aria-labelledby="dropdownUser1">

                        <form action="../php/logout_cashier.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $_SESSION['id']  ?>">
                             <input type="hidden" name="times" value="<?php echo $_SESSION['login_id']  ?>">
                           <input type="submit" class="dropdown-item" value="Sign out">
                        </form>
                            
                        
                    </ul>
                </div>

        </nav>
           <?php } ?>

        <div class="content">

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
                                                <th scope="col">Invoice</th>
                                                <th scope="col" style="padding-left:20px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $id = $_GET['invoice'];

                                            $sql_run = mysqli_query($con,"SELECT * FROM sales WHERE invoice_code = '$id'");

                                            while ($dow=mysqli_fetch_assoc($sql_run)) { ?>
                                            <tr>
                                                <td hidden=""><?php echo $dow['sales_id'];  ?></td>
                                                <TD><?php echo $dow['product_code'];  ?></TD>
                                                <TD><?php echo $dow['product_name'];  ?></TD>
                                                <TD><?php echo $dow['sales_price'];  ?></TD>
                                                <TD style="text-align:center"><?php echo $dow['sales_quantity'];  ?></TD>
                                                 <TD style="text-align:center"><?php echo $dow['Total'];  ?></TD>
                                                 <TD style="text-align:center"><?php echo $dow['sales_profit'];  ?></TD>
                                                 <TD><?php echo $dow['invoice_code'];  ?></TD>
                                                 <TD>
                                                    <button class="btn btn-success quantitybtn " data-dir="up" data-bs-toggle="modal" >
                                                        <i class='bx bx-plus'></i>
                                                    </button>

                                                    <button class="btn btn-danger deletebtn" data-bs-toggle="modal"><i class="fas fa-trash" data-toggle="tooltip" title="edit"></i></button>
                                                         
                                                </TD>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!--CARD Product-->
                            <div class="row justify-content-start mt-5">
                                <div class="col-lg-12">
                                    <div class="card shadow h-100 text-dark bg-light mb-3" >
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between" >
                                            <h6 class="m-0 font-weight-bold text-primary"><center>Available Products</center></h6>
                                        </div>
                                        <div class="card-body card-body rounded-3 m-4 table-responsive-lg">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Quantity</th>
                                                        <th scope="col">Date of Expiration</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php

                                                    $display = mysqli_query($con, "SELECT * FROM inventory WHERE status='active'");
                                                    while ($row = mysqli_fetch_array($display)) {

                                                    ?>

                                                    <tr>
                                                        <td><?php echo $row['item_name']; ?></td>
                                                        <td><?php echo $row['quantity']; ?></td>
                                                        <th><?php echo $row['date_expired']; ?></th>
                                                        <?php 
                                                                    $date = $row['date_expired'];
                                                                    $barcode =$row['bar_code'];
                                                                    $qty = $row['quantity'];
                                                                    
                                                                       if ($date == date("Y-m-d")) {
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
                                                    </tr>
                                                <?php } ?>

                                            </tbody>
                                        </table> 
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                        <div class="col-12 col-md-5 col-lg-4" >
                            <div class="card border-primary ps-3 pe-3">

                                <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search " action="postransac.php" method="POST">
                                    <p style="margin-top: 10px;">Barcode Search</p>

                                    <?php   
                                    if (isset($_GET['error404'])) {

                                        echo "<p class='text-danger'>Barcode Not Found</p>";
                                    }
                                    ?>


                                    <input type="text" class="form-control bg-light border-0 small mb-3" name="bar_code" autocomplete="off" id="search-box"  required="">

                                    <div id="suggesstion-box"></div>



                                    <div class="input-group mb-3">
                                        <input type="hidden" class ="form-control" name="tans_code" value="<?php echo $id=$_GET['invoice']; ?>" />
                                    </div>

                                    



                                    <?php
                                        $sales_detail = mysqli_query($con,"SELECT sum(total) as 'details' FROM sales WHERE invoice_code = '$id'");

                                        $sign = mysqli_query($con,"SELECT sum(sales_profit) as 'prof' FROM sales WHERE invoice_code = '$id'");

                                        while ($bows=mysqli_fetch_assoc($sales_detail) AND $lows=mysqli_fetch_assoc($sign) ) { 

                                            $total_tax = $bows['details'] * 0.12;
                                            $total_amount = $bows['details'] + $total_tax;
                                    ?>

                                    <div class="input-group mb-3">
                                        <span class="input-group-text">Tax:</span>
                                        <span class="input-group-text">???</span>
                                        <input type="number" class="form-control" name="tax" value="<?php echo $total_tax;  ?>" readonly>
                                    </div>
                                     <div class="input-group mb-3">
                                         <span class="input-group-text">Sub total:</span>
                                         <span class="input-group-text">???</span>
                                         <input type="number" class="form-control" name="sub_total" value="<?php echo $bows['details'];  ?>"readonly >
                                     </div>

                                    <div class="input-group mb-3">
                                         <span class="input-group-text">Profit:</span>
                                         <span class="input-group-text">???</span>
                                         <input type="number" class="form-control" name="sale_profit" value="<?php echo $lows['prof'];  ?>"readonly >
                                     </div>

                                     
                                     <div class="input-group mb-3">
                                        <span class="input-group-text">Total:</span>
                                        <span class="input-group-text">???</span>
                                        <input type="number" class="form-control" name="total" value="<?php echo $total_amount;  ?>" readonly>

                                     </div>

                                    <?php
                                    }  
                                    ?>

                                    <button class="btn btn-primary w-100 mb-3" type="submit" name="create">
                                        <i class='bx bx-plus-medical'></i> Add Catalog
                                    </button>
                                    <button class="btn btn-secondary w-100 mb-3 changebtn" type="button" data-toggle="modal">
                                        <i class="fas fa-users"></i></i> Customer
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
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="updatequantity.php" method="POST">
                <div class="modal-body">
                     <input type="hidden" name="update_id" id="update_id">
                     <span>Input:</span>
                     <input type="number" class="form-control bg-light border-0 small mb-3" name="quantity_number" id="sales_quantity">
                     <input type="hidden" class="form-control-sm" name="bar_code" id="bar_code">
                     <input type="hidden" name="update_code" value="<?php echo $id=$_GET['invoice']; ?>">

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
                <h5 class="modal-title" id="mediumModalLabel">DELETE PRODUCTS</h5>
            </div>


            <form action="deletecash.php" method="POST">
               

                <div class="modal-body">
                     <input type="hidden" name="delete_id" id="delete_id">
                     <h6>Do you want to delete ? </h6>
                     <input type="hidden" name="tans_code" value=" <?php echo $id=$_GET['invoice']; ?>">
                    <div class="modal-footer">
                        <button type="submit" name="delete" class="btn btn-success">Yes</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="change" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">Enter Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="savepos.php" method="POST">
                <div class="modal-body">
                     <?php

                     echo $cat;

                     $sales_detail = mysqli_query($con,"SELECT sum(total) as 'details' FROM sales WHERE invoice_code = '$id'");



                     while ($bows=mysqli_fetch_assoc($sales_detail)) { 


                     ?>
                       <p style="margin-top: 10px;">Enter your Cash:</p>

                       <input type="number" class="form-control bg-light border-0 small mb-3" name="cash" required="">

                       <input type="hidden" class="form-control-sm" name="sales_can">

                        <input type="hidden" name="taxes" value="<?php echo $total_tax;  ?>" readonly>
                        <input type="hidden" name="sub_totals" value="<?php echo $bows['details'];  ?>"readonly >
                        <input type="hidden" name="totals" value="<?php echo $total_amount;  ?>" readonly>
                        <input type="hidden" name="trans_profit" value="<?php echo $lows['prof'];  ?>" readonly>
                        <input type="hidden" name="invoys" value="<?php echo $id=$_GET['invoice']; ?>">

                    <?php } ?>

                                    
                    <div class="modal-footer">
                        <button type="submit" name="save" class="btn btn-success">Submit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
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

<script type="text/javascript">
    // AJAX call for autocomplete 
$(document).ready(function() {
    $("#search-box").keyup(function() {
        $.ajax({
            type: "POST",
            url: "pos.php",
            data: 'keyword=' + $(this).val(),
            beforeSend: function() {
                $("#search-box").css("background", "#FFF url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data) {
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                $("#search-box").css("background", "#FFF");
            }
        });
    });
});



function selectProduct(val) {
    $("#search-box").val(val);
    $("#suggesstion-box").hide();
}

    window.onload = (event) => {
  let myAlert = document.querySelectorAll('.toast')[0];
  if (myAlert) {
    let bsAlert = new bootstrap.Toast(myAlert);
    bsAlert.show();
  }
};
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</body>

</html>