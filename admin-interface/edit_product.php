<?php



include_once("../includes/dbh.inc.php");
include_once("../includes/functions.inc.php");

session_start();
if(empty($_SESSION['admin_username']) || $_SESSION['admin_auth'] == false){
    header("Location: admin.login.php");
    die();
}

if(isset($_POST["updateItemBtn"])){
    $size_raw = $_POST['size_check'];
    $uc_first = array_map('ucfirst', $size_raw);
    $size = implode(", ", $uc_first);
    $item_code = $_GET['item_code'];
    $item_name = $_POST["item_name"];
    $item_price = $_POST["item_price"];
    $item_description = $_POST["item_description"];
    $item_keyword = $_POST["item_keyword"];

     if(isset($_POST["sm_txt"]) == false || $_POST["sm_txt"] == ""){
        $sm = 0;
    } else {
        $sm = $_POST["sm_txt"];
    }

    if(isset($_POST["md_txt"]) == false || $_POST["md_txt"] == ""){
        $md = 0;
    } else {
        $md = $_POST["md_txt"];
    }   

    if(isset($_POST["lg_txt"]) == false || $_POST["lg_txt"] == ""){
        $lg = 0;
    } else {
        $lg = $_POST["lg_txt"];
    }

    if(isset($_POST["xl_txt"]) == false || $_POST["xl_txt"] == ""){
        $xl = 0;
    } else {
        $xl = $_POST["xl_txt"];
    }

    $total_stocks = $sm + $md + $lg + $xl;

    if($total_stocks == 0){
        $status = "Out of Stock";
    } else {
        $status = "Available";
    }

    // echo "<script>alert('$item_code' + ' : ' + '$item_name' + ' : ' + '$item_price' + ' : ' + '$item_description' + ' : ' + '$item_keyword' + ' : ' + '$sm' + ' : ' + '$md' + ' : ' + '$lg' + ' : ' + '$xl' + ' : ' + '$total_stocks' + ' : ' + '$status')</script>";

    //accessing item images
   
    //accessing image tmp name
  

    // checks if any forms are empty
    if(empty($item_name) || empty($item_price) || empty($item_description) || empty($item_keyword)){
        echo "<script>alert('Please fill all the available fields!')</script>";
        exit();
    } else {

        // insert query

        $item_description = mysqli_real_escape_string($conn, $item_description);
        
            $update_item = "UPDATE items SET 
            item_name = '$item_name',
            item_price = '$item_price',
            sm_stocks = '$sm',
            md_stocks = '$md',
            lg_stocks = '$lg',
            xl_stocks = '$xl',
            item_description = '$item_description',
            item_keyword = '$item_keyword',
            num_left = '$total_stocks',
            item_status = '$status'
            WHERE item_code = '$item_code'";
            $result_update = mysqli_query($conn, $update_item);
            if($result_update){
                // header("Location: https://topbuds.x10.bz/admin-interface/main_dashboard.php?products");
                echo "<script>alert('Item has been updated successfully!')</script>";
            } else {
               echo "<script>alert('JAJAJDSDJASDWAa!')</script>";
            }
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="page.css"> -->
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
            <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Orders</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Accounts</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
                </li>
            </ul>
            <span class="navbar-text">
                Navbar text with an inline element
            </span>
            </div>
        </div>
        </nav>


            <!-- SIDEBAR -->

            <div class="row">
                <div class="col-3">
                    <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="height: 600px; width: 280px;">
                        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
                        <span class="fs-4">Sidebar</span>
                        </a>
                        <hr>
                        <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="main_dashboard.php?home" class="nav-link text-white" aria-current="page">
                            <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
                            Home
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
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
                        <!-- <div class="dropdown">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                            <strong>mdo</strong>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                            <li><a class="dropdown-item" href="#">New project...</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Sign out</a></li>
                        </ul>
                        </div> -->
                    </div>
                </div>


                <div class="col-9">
                    <div class="container" style="margin-top: 50px; margin-left: -50px;">
                        <div id="edit_form">

                <h1>Update Data</h1>
                <?php 
                    if(isset($_GET['item_code'])){
                        $item_code = $_GET['item_code'];
                        
                        $select = "SELECT * FROM items WHERE item_code = '$item_code'";
                        $result = mysqli_query($conn, $select);

                        while($row = mysqli_fetch_assoc($result)){
                            $item_name = $row["item_name"];
                            $item_price = $row["item_price"];
                            $sm_stocks = $row["sm_stocks"];
                            $md_stocks = $row["md_stocks"];
                            $lg_stocks = $row["lg_stocks"];
                            $xl_stocks = $row["xl_stocks"];
                            $item_description = $row["item_description"];
                            $item_keyword = $row["item_keyword"];
                            $item_image1 = $row["item_image1"];
                            $item_image2 = $row["item_image2"];
                            $item_image3 = $row["item_image3"];
                        }

                    }               
                ?>

                <br>
                <form action="" method="post" enctype="multipart/form-data"> <!-- enctype attribute to accept images in form -->
                <div class="row">       
                    <div class="col-7" style=" height: 200px;">
                        <div class="btn-group">
                            <div class="form-group ps-3" style="height: 75px; width: 400px;">
                                <small id="s1" class="form-text fst-italic">Item Name<span style="color: red;">*</span></small>
                                <input type="text" class="form-control" name="item_name" id="item_name" value="<?php echo $item_name ?>" placeholder="<?php echo $item_name ?>" autocomplete="off" required="required">
                            </div>
                            <div class="form-group ps-3" style="background-color: rgb(255, 255, 255); height: 75px;">
                                <small id="s2" class="form-text fst-italic">Item Price<span style="color: red;">*</span></small>
                                <input type="text" class="form-control" name="item_price" value="<?php echo $item_price ?>"  id="item_price" placeholder="Enter Item Price" required="required">
                            </div>
                        </div>

                        <small id="s2" class="form-text fst-italic ps-3">Size<span style="color: red;">*</span></small>
                        <div class="size pt-2 pb-2">
                            <?php
                                if($sm_stocks > 0){
                                    ?>
                                    <input class="form-check-input ms-3" type="checkbox" value="small" name="size_check[]" id="sm_check">
                                        <label class="form-check-label">
                                            Small
                                        </label>
                                    <input type="text" style="width: 7%;" id="sm_txt" name="sm_txt" value="<?php echo $sm_stocks ?>">
                                    <?php
                                }else {
                                    ?>
                                    <input class="form-check-input ms-3" type="checkbox" value="small" name="size_check[]" id="sm_check">
                                        <label class="form-check-label">
                                            Small
                                        </label>
                                    <input type="text" style="width: 7%;" id="sm_txt" name="sm_txt" disabled>
                                    <?php
                                }

                                if($md_stocks > 0){
                                    ?>
                                    <input class="form-check-input" type="checkbox" value="medium" name="size_check[]" id="md_check">
                                        <label class="form-check-label">
                                            Medium
                                        </label>
                                    <input type="text" style="width: 7%;" id="md_txt" name="md_txt" value="<?php echo $md_stocks ?>">
                                    <?php
                                } else {
                                     ?>
                                    <input class="form-check-input" type="checkbox" value="medium" name="size_check[]" id="md_check">
                                        <label class="form-check-label">
                                            Medium
                                        </label>
                                    <input type="text" style="width: 7%;" id="md_txt" name="md_txt" disabled>
                                    <?php
                                } 

                                if($lg_stocks){
                                    ?>
                                    <input class="form-check-input" type="checkbox" value="large" name="size_check[]" id="lg_check">
                                        <label class="form-check-label">
                                            Large
                                        </label>
                                    <input type="text" style="width: 7%;" id="lg_txt" name="lg_txt" value="<?php echo $lg_stocks ?>">
                                    <?php
                                } else {
                                    ?>
                                    <input class="form-check-input" type="checkbox" value="large" name="size_check[]" id="lg_check">
                                        <label class="form-check-label">
                                            Large
                                        </label>
                                    <input type="text" style="width: 7%;" id="lg_txt" name="lg_txt" disabled>
                                    <?php
                                }

                                if($xl_stocks > 0){
                                    ?>
                                    <input class="form-check-input" type="checkbox" value="extra Large" name="size_check[]" id="xl_check">
                                        <label class="form-check-label">
                                            Extra Large
                                        </label>
                                    <input type="text" style="width: 7%;" id="xl_txt" name="xl_txt" value="<?php echo $xl_stocks ?>">
                                    <?php
                                } else {
                                    ?>
                                    <input class="form-check-input" type="checkbox" value="extra Large" name="size_check[]" id="xl_check">
                                        <label class="form-check-label">
                                            Extra Large
                                        </label>
                                    <input type="text" style="width: 7%;" id="xl_txt" name="xl_txt" disabled>
                                    <?php
                                }   
                            ?>
                        </div>
                       


                            <div class="form-group ps-3" style="background-color: rgb(255, 255, 255); height: 75px;  margin-bottom: 50px;">
                                <!---<label for="item_description">Item Description</label>-->
                                <small id="s3" class="form-text fst-italic">Item Description<span style="color: red;">*</span></small>
                                <textarea class="form-control" style="height: 100px;" name="item_description" id="item_description" placeholder="<?php echo $item_description ?>" required="required"></textarea>
                            </div>
                           

                            
                            
                    </div>
                        <div class="col-4" style="height: 215px;">

                        
                                                

                            <div class="form-group" style="background-color: rgb(255, 255, 255); height: 75px; width: 260px;">
                                <small id="s4" class="form-text fst-italic">Item Keyword<span style="color: red;">*</span></small>
                                <input type="text" class="form-control" name="item_keyword" value="<?php echo $item_keyword ?>" id="item_keyword" placeholder="Enter Item Keyword" required="required">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            
                        </div>
                </div>
                
                <button type="submit" name="updateItemBtn" class="btn btn-warning" style="margin-left: 40px; width: 50%;
                margin-top: 120px; font-size: 20px;">Update</button>

                <br><br><br>
        </form>
                </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="../jquery-3.6.3.js"></script>
    <script src="./assets/checkout_function.js"></script>


    <script>
        $('input#status_check').on('change', function() {
            $('input#status_check').not(this).prop('checked', false);  
        });
    </script>

    <script>

        $('input[id="sm_check"]').click(function () {
            $('#sm_txt').prop("disabled", !this.checked);
        });

        $('input[id="md_check"]').click(function () {
            $('#md_txt').prop("disabled", !this.checked);
        });

        $('input[id="lg_check"]').click(function () {
            $('#lg_txt').prop("disabled", !this.checked);
        });

        $('input[id="xl_check"]').click(function () {
            $('#xl_txt').prop("disabled", !this.checked);
        });

        $("#click").click(function(){
            var sm = $('#sm_txt').val();

            alert("value is " + sm);
        }); 


        
        // $("#sm_check").on('change', function(){
        //     $('#cashAmount').attr("disabled", !$(this).is(':checked'));
        // })

    </script>

</body>
</html>