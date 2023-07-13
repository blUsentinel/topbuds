<?php
include_once("../includes/dbh.inc.php");
include_once("../includes/functions.inc.php");

session_start();
if(empty($_SESSION['admin_username']) || $_SESSION['admin_auth'] == false){
    header("Location: admin.login.php");
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TopBuds - Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="page.css"> -->
    <script src="jquery-3.6.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
      </script>
</head>
<body>

    <div class="container-fluid p-0">
        <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Topbuds</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="btn-group">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
                    Admin
                </button>
                <ul class="dropdown-menu dropdown-menu-lg-end">
                    <li><button class="dropdown-item" type="button" onclick="">Edit Account</button></li>
                    <li><button class="dropdown-item" type="button" onclick="window.location.href='admin.logout.php'">Sign Out</button></li>
                </ul>
            </div>

        </div>                        
        </nav>
            <!-- SIDEBAR -->

            <div class="row">
                <div class="col-3">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 600px; width: 280px;">
                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                        <span class="fs-4">Admin Panel</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                        <li>
                            <a href="main_dashboard.php?dashboard" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                            Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="main_dashboard.php?orders" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#table"/></svg>
                            Orders
                            </a>
                        </li>
                        <li>
                            <a href="main_dashboard.php?products" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#grid"/></svg>
                            Products
                            </a>
                           
                        </li>
                        <li>
                            <a href="main_dashboard.php?users" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#people-circle"/></svg>
                            Users
                            </a>
                        </li>
                        </ul>
                        <hr>
                    
                        
                    </div>
                </div>

                <div class="col-9">
                    <div class="container" style="margin-top: 50px; margin-left: -50px;">

                        <h1>Edit Admin Account</h1>

                        <form action="update.admin.acc.php" method="post" style="height: 400px; width: 880px;
                                        margin-left: 120px; background-color: white; margin-top: 40px;">
                                            <div class="edit_profile" style="padding-left: 10px; padding-top: 30px; ">
                                            <h1>Edit My Account Info</h1>

                                                <div class="row mt-3">
                                                    <div class="col-3" style="width: 220px;">
                                                        <label style="font-size: 14px;" for="userName">Username<span style="color: red;">*</span></label>
                                                        <input type="search" class="form-control" id="admin_username" name="admin_username" value="<?php echo $first_name; ?>"  style="width: 200px;">
                                                    </div>
                                                    <div class="col-3" style="width: 220px;">
                                                        <label style="font-size: 14px;" for="adminEmail">Email Address<span style="color: red;">*</span></label>
                                                        <input type="search" class="form-control" id="admin_email" name="admin_email" value="<?php echo $email_address; ?>" style="width: 200px;">
                                                    </div>
                                                </div>

                                                <div class="row mt-3">
                                                    <div class="col-3" style="width: 220px;">
                                                        <label style="font-size: 14px;" for="pw">Password<span style="color: red;">*</span></label>
                                                        <input type="password" class="form-control" id="admin_password" name="admin_password" value="<?php echo $last_name; ?>" style="width: 200px;">
                                                    </div>
                                                    <div class="col-3" style="width: 220px;">
                                                        <label style="font-size: 14px;" for="rpw">Repeat Password<span style="color: red;">*</span></label>
                                                        <input type="password" class="form-control" id="ad_rpw" name="ad_rpw" value="<?php echo $last_name; ?>" style="width: 200px;">
                                                    </div>
                                                </div>

                                            
                                            <button type="submit" name="save" class="btn btn-primary" style="margin-left: 1px; width: 25%;
                                            margin-top: 40px; height: 50px;">Save</button>
                                        </div>
                                        
                                    <br><br>    
                                    <br><br>
                                    </form> 










                        <?php
                            if(isset($_GET["products"])){
                                include("products.php");
                                if(isset($_GET["products_list"])){
                                    include("products.php");
                                }
                                if(isset($_GET["add_item"])){
                                    include("add_item.php");
                                }
                            }
                            if(isset($_GET["dashboard"])){
                                include("default.php");
                            }
                            if(isset($_GET["orders"])){
                                include("orders.php");
                            }
                            if(isset($_GET["users"])){
                                include("users.php");
                            }
                            if(isset($_GET["add_item"])){
                                include("add_item.php");
                            } 
                            if(isset($_GET["sales_report"])){
                                include("sales_report.php");
                            }
                            if(isset($_GET["placed_orders"])){
                                include("placed_orders.php");
                            }
                            if(isset($_GET["to_ship"])){
                                include("to_ship.php");
                            } 
                            if(isset($_GET["in_transit"])){
                                include("in_transit.php");
                            } 
                            if(isset($_GET["delivered"])){
                                include("delivered.php");
                            } 
                            if(isset($_GET["cancelled"])){
                                include("cancelled.php");
                            } 
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
       integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>
</html>