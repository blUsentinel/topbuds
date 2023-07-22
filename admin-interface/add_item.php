<?php
include_once("includes/dbh.inc.php");
include_once("includes/functions.inc.php");

if(isset($_POST["addItemBtn"])){
    $item_code = rand(1000, 9999);
    $item_name = $_POST["item_name"];
    $item_price = $_POST["item_price"];
    $item_description = $_POST["item_description"];
    $item_keyword = $_POST["item_keyword"];
    $item_status = "Available";
    // $item_stocks_raw = $_POST["item_stocks"];
    // $item_stocks = intval($item_stocks_raw);
    $item_sold = 0;

    $size_raw = $_POST['size_check'];
    $uc_first = array_map('ucfirst', $size_raw);
    $size = implode(", ", $uc_first);

    if(isset($_POST["sm_txt"]) == false){
        $sm = 0;
    } else {
        $sm = $_POST["sm_txt"];
    }

    if(isset($_POST["md_txt"]) == false){
        $md = 0;
    } else {
        $md = $_POST["md_txt"];
    }   

    if(isset($_POST["lg_txt"]) == false){
        $lg = 0;
    } else {
        $lg = $_POST["lg_txt"];
    }

    if(isset($_POST["xl_txt"]) == false){
        $xl = 0;
    } else {
        $xl = $_POST["xl_txt"];
    }

    $total_stocks = $sm + $md + $lg + $xl;

    echo "<script>alert('$sm' + '$md' + '$lg' + '$xl' + '$total_stocks')</script>";

    //accessing item images
    $item_image1 = $_FILES["item_image1"]["name"];
    $item_image2 = $_FILES["item_image2"]["name"];
    $item_image3 = $_FILES["item_image3"]["name"];

    //  echo "<script>alert('$size' + ' : ' + '$item_code' + ' : ' + '$item_name' + ' : ' + '$item_price' + ' : ' + '$item_description'
    // + ' : ' + '$item_keyword' + ' : ' + '$item_status' + ' : ' + '$item_stocks' + ' : ' + '$item_sold' + ' : ' + '$item_image1' + ' : ' + '$item_image2' + ' : ' + '$item_image3')</script>";

    //accessing image tmp name
    $temp_item_image1 = $_FILES["item_image1"]["tmp_name"];
    $temp_item_image2 = $_FILES["item_image2"]["tmp_name"];
    $temp_item_image3 = $_FILES["item_image3"]["tmp_name"];

    // checks if any forms are empty
    if(empty($item_name) || empty($item_price) || empty($item_description) || empty($item_keyword) 
    || empty($item_image1) || empty($item_image2) || empty($item_image3) || empty($item_status) || empty($item_sold || empty($item_size))){
        echo "<script>alert('Please fill all the available fields!')</script>";
        exit();
    } else {
        move_uploaded_file($temp_item_image1, "./item_images/$item_image1");
        move_uploaded_file($temp_item_image2, "./item_images/$item_image2");
        move_uploaded_file($temp_item_image3, "./item_images/$item_image3");

        //insert query
        $insert_item = "INSERT INTO items 
        (item_code, item_name, item_price, sizes_available, sm_stocks, md_stocks, lg_stocks, xl_stocks, item_description, item_keyword, item_image1, item_image2, item_image3,
         date_added, item_status, num_sold, num_left)
          VALUES 
        ('$item_code', '$item_name', '$item_price', '$size', '$sm', '$md', '$lg', '$xl', '$item_description', '$item_keyword', '$item_image1', '$item_image2',
         '$item_image3', NOW(), '$item_status', '$item_sold', '$total_stocks')";

        $result_query = mysqli_query($conn, $insert_item);
        if($result_query){
            echo "<script>alert('Item has been successfully delivered to the database!')</script>";
        } else {
            echo "<script>alert('An error has occured!')</script>";
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
    <title>Insert Products</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="page.css"> -->
  
</head>
    
<body>

<div class="container shadow-lg bg-white" style="margin-top: 50px; width:100%;">
    <h1 class="text-start pt-3 pb-3">Insert Item</h1>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="main_dashboard.php?products">Products List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="main_dashboard.php?add_item">Add Item</a>
                </li>
            </ul>                                
    </div>

    <div class="container shadow-lg bg-white" style="margin-top: -1px; width:100%;">
    <form action="" method="post" enctype="multipart/form-data"> <!-- enctype attribute to accept images in form -->
                <div class="row">       
                    <div class="col-7" style=" height: 200px;">
                        <div class="btn-group">
                            <div class="form-group ps-3" style="height: 75px; width: 400px;">
                                <small id="s1" class="form-text fst-italic">Item Name<span style="color: red;">*</span></small>
                                <input type="text" class="form-control" name="item_name" id="item_name" placeholder="Item Name" autocomplete="off" required="required">
                            </div>
                            <div class="form-group ps-3" style="background-color: rgb(255, 255, 255); height: 75px;">
                                <small id="s2" class="form-text fst-italic">Item Price<span style="color: red;">*</span></small>
                                <input type="text" class="form-control" name="item_price"  id="item_price" placeholder="Enter Item Price" required="required">
                            </div>
                        </div>

                         <small id="s2" class="form-text fst-italic ps-3">Size<span style="color: red;">*</span></small>
                        <div class="size pt-2 pb-2">
                           
                                <input class="form-check-input ms-3" type="checkbox" value="small" name="size_check[]" id="sm_check">
                                    <label class="form-check-label">
                                        Small
                                    </label>
                                <input type="text" style="width: 7%;" id="sm_txt" name="sm_txt" disabled>

                                <input class="form-check-input" type="checkbox" value="medium" name="size_check[]" id="md_check">
                                    <label class="form-check-label">
                                        Medium
                                    </label>
                                <input type="text" style="width: 7%;" id="md_txt" name="md_txt" disabled>

                                <input class="form-check-input" type="checkbox" value="large" name="size_check[]" id="lg_check">
                                    <label class="form-check-label">
                                        Large
                                    </label>
                                <input type="text" style="width: 7%;" id="lg_txt" name="lg_txt" disabled>

                                <input class="form-check-input" type="checkbox" value="extra Large" name="size_check[]" id="xl_check">
                                    <label class="form-check-label">
                                        Extra Large
                                    </label>
                                <input type="text" style="width: 7%;" id="xl_txt" name="xl_txt" disabled>
                        </div>
                    
                            <div class="form-group ps-3" style="background-color: rgb(255, 255, 255); height: 75px;  margin-bottom: 50px;">
                                <!---<label for="item_description">Item Description</label>-->
                                <small id="s3" class="form-text fst-italic">Item Description<span style="color: red;">*</span></small>
                                <textarea class="form-control" style="height: 100px;" name="item_description" id="item_description" placeholder="Enter Description" required="required"></textarea>
                            </div>
                            

                            
                            
                    </div>
                        <div class="col-4" style="height: 215px;">

                            <div class="form-group" style="background-color: rgb(255, 255, 255); height: 75px; width: 260px;">
                                <small id="s4" class="form-text fst-italic">Item Keyword<span style="color: red;">*</span></small>
                                <input type="text" class="form-control" name="item_keyword" id="item_keyword" placeholder="Enter Item Keyword" required="required">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group" style="background-color: rgb(255, 255, 255); height: 75px;">
                                <small id="s6" class="form-text fst-italic">Item Image 1<span style="color: red;">*</span></small>
                                <input type="file" class="form-control" name="item_image1" id="item_image1" required="required">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group" style="background-color: rgb(255, 255, 255); height: 75px;">
                                <small id="s7" class="form-text fst-italic">Item Image 2<span style="color: red;">*</span></small>
                                <input type="file" class="form-control" name="item_image2" id="item_image2" required="required">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group" style="">
                                <small id="s7" class="form-text fst-italic">Item Image 3<span style="color: red;">*</span></small>
                                <input type="file" class="form-control" name="item_image3" id="item_image3" required="required">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                        </div>
                </div>
                
                <button type="submit" name="addItemBtn" class="btn btn-warning" style="margin-left: 260px; width: 50%;
                margin-top: 200px; font-size: 20px;">Add Item</button>

                <br><br><br>
        </form>
    </div>

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

