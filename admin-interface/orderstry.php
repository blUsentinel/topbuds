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
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
      </script>
    <script src="../jquery-3.6.3.js"></script>
   
      <script src="../assets/generate_report.js"></script>
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
                    <li><button class="dropdown-item" type="button" onclick="window.location.href='my_acc.php'">My Account</button></li>
                    <li><button class="dropdown-item" type="button" onclick="window.location.href='admin.logout.php'">Sign Out</button></li>
                </ul>
            </div>

        </div>                        
        </nav>
            <!-- SIDEBAR -->

            <div class="row">
                <div class="col-3">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 600px; width: 200px;">
                      
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                        <li>
                            <a href="main_dashboard.php?dashboard" class="nav-link text-white">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
                            Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="orders.php" class="nav-link text-white">
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
                    <div class="container" style="margin-top: 50px; margin-left: -140px;">
                        <div class="container shadow-lg bg-white" style="margin-top: 50px; width:100%;">
        <h1 class="text-start pt-3 pb-3">Orders List</h1>
            <ul class="nav nav-tabs nav-fill">
                <li class="nav-item">
                    <a class="nav-link" href="main_dashboard.php?orders">Orders List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main_dashboard.php?placed_orders">Placed Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main_dashboard.php?to_ship">To Ship</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main_dashboard.php?in_transit">In-Transit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main_dashboard.php?delivered">Delivered</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main_dashboard.php?cancelled">Cancelled</a>
                </li>
            </ul>                                
    </div>
    <div class="list-of-products">
        <?php
            //define total number of results you want per page  
            $results_per_page = 10;  
        
            //find the total number of results stored in the database  
            $query = "SELECT * FROM orders";  
            $result = mysqli_query($conn, $query);  
            $number_of_result = mysqli_num_rows($result);  

            //determine the total number of pages available  
            $number_of_page = ceil ($number_of_result / $results_per_page); 

            //determine which page number visitor is currently on  
            if (!isset ($_GET['page']) ) {  
                $page = 1;  
            } else {  
                $page = $_GET['page'];  
            }  

            //determine the sql LIMIT starting number for the results on the displaying page  
            $page_first_result = ($page-1) * $results_per_page;  

            $select_list = mysqli_query($conn, "SELECT * FROM orders LIMIT " . $page_first_result . ',' . $results_per_page);
        ?>

        <table class="table table-bordered border-primary table-success">
            <thead class="text-center fw-bold">
                <tr>
                    <th>Package Number</th>
                    <th>Item Image</th>
                    <th>Item Name</th>
                    <th>Size</th>
                    <th>Qty</th>
                    <th>Item Total Price</th>
                    <th>Ordered At</th>
                    <th>Payment Method</th>
                    <th>Ref #</th>
                    <th>Paid</th>
                    <th style="width: 15%">Status</th>
                    
                </tr>
            </thead>
            <?php
                $previousData = "";
                while($row = mysqli_fetch_assoc($select_list)){      
            ?>
                <tr style="font-size: 14px;">
                <?php
                     if($row["package_num"] != $previousData){
                        ?>

                            <td class="text-center"><?php echo $row["package_num"] ?></td>

                        <?php    
                     } else {
                        ?>
                        
                            <td></td>

                        <?php
                     }
                ?>
                   
                    <td class="text-center">
                        <img src="../admin-interface/item_images/<?= $row["order_item_image"] ?>" height="50" width="50" alt="" />
                    </td>
                    <td class="text-center"><?php echo $row["order_item_name"] ?></td>
                    <td class="text-center"><?php echo $row["order_item_size"] ?></td>
                    <td class="text-center"><?php echo $row["order_item_quantity"] ?></td>

                    <?php
                        if($row["package_num"] != $previousData){
                            ?>
                                <td class="text-center">₱<?php echo $row["order_total_price"]?>.00</td>
                            <?php    
                        } else {
                            ?>
                            
                                <td></td>

                            <?php
                        }
                    ?>

                    <?php 
                        // $num = $row["package_num"];

                        if($row["package_num"] != $previousData){
                        ?>
                          
                            <td class="text-center"><?php echo $row["order_date"] ?></td>
                            <td class="text-center"><?php echo $row["payment_method"] ?></td>
                            <td class="text-center"><?php echo $row["reference_num"] ?></td>
                            
                            <td class="text-center" style="width:10%">
                            
                                <select class="form-select" payment-id=<?php echo $row["order_item_code"];?>
                                payment-email=<?php echo $row["order_email_add"];?> payment-package_num=<?php echo $row["package_num"];?>
                                name="payment_status_change" aria-label="Default select example">
                                    <option value="<?php echo $row["payment_status"];?>" selected><?php echo $row["payment_status"];?></option>

                                    <?php 
                                        if($row["payment_method"] == "CoD" && $row["order_status"] != "Delivered"){
                                            ?>
                                          
                                            <?php
                                        } else if($row["payment_method"] == "CoD" && $row["order_status"] == "Delivered"){
                                            ?>
                                                 <option value="Paid" selected>Paid</option>
                                            <?php
                                        } else {
                                            if($row["payment_status"] == "Paid"){
                                            ?>
                                                <option value="Not Paid">Not Paid</option> 
                                            <?php
                                            } else if ($row["payment_status"] == "Not Paid") {
                                                ?>
                                                    <option value="Paid">Paid</option>
                                                <?php
                                            } 
                                        }
                                        ?>
                                </select>
                            </td>

                            <td>

                            <select class="form-select" status-id=<?php echo $row["order_item_code"];?> 
                            status-email=<?php echo $row["order_email_add"];?> status-package_num=<?php echo $row["package_num"];?>
                            name="order_status_change" aria-label="Default select example">
                                <option value="<?php echo $row["order_status"];?>" selected><?php echo $row["order_status"];?></option>

                                <?php 

                                    if($row["order_status"] == "Placed"){
                                        ?>
                                            <option value="To Ship">To Ship</option>
                                            <option value="In-Transit">In-Transit</option>
                                            <option value="Delivered">Delivered</option>
                                            <option value="Cancelled">Cancelled</option>    
                                        <?php
                                    } else if ($row["order_status"] == "To Ship") {
                                        ?>
                                            <option value="Placed">Placed</option>
                                            <option value="In-Transit">In-Transit</option>
                                            <option value="Delivered">Delivered</option>
                                            <option value="Cancelled">Cancelled</option>
                                        <?php
                                    } else if ($row["order_status"] == "In-Transit"){
                                        ?>
                                            <option value="Placed">Placed</option>
                                            <option value="To Ship">To Ship</option>
                                            <option value="Delivered">Delivered</option>
                                            <option value="Cancelled">Cancelled</option>
                                        <?php
                                    } else if ($row["order_status"] == "Delivered"){
                                        ?>
                                                <option value="Placed">Placed</option>
                                                <option value="To Ship">To Ship</option>
                                                <option value="In-Transit">In-Transit</option>
                                                <option value="Cancelled">Cancelled</option>
                                        <?php
                                    } else if ($row["order_status"] == "Cancelled"){
                                        ?>
                                                   
                                        <?php
                                    }
                                ?>
                            </select>
                            </td>
                        <?php
                        } else {
                            ?>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                
                                
                            <?php
                          
                        }
                    ?>
                </tr>
                    
            <?php
                  $previousData = $row["package_num"];
                };
            ?>
            <?php
                //display the link of the pages in URL  
                for($page = 1; $page<= $number_of_page; $page++) {  
                    echo '<a href = "orderstry.php?page=' . $page . '">' . $page . ' </a>';  
                }   
            ?>z
        </table>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>