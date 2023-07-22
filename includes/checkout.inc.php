<?php
session_start();
include('dbh.inc.php');

if (isset($_SESSION["userEmailAdd"])) {
    $selectData = "SELECT * FROM users WHERE email_add ='{$_SESSION["userEmailAdd"]}'";
    $query = mysqli_query($conn, $selectData);
    echo("<script>console.log('PHP: hahah222a');</script>");

    if (mysqli_num_rows($query)) {
        while ($users = mysqli_fetch_array($query)) {
            $email_add = $users["email_add"];
        }
    }

    if (isset($_POST["orders_id"])) {
        $ordersId = $_POST["orders_id"];
        $payment = $_POST["payment_method"];
        $gcashRef = $_POST["gcashRef"];
        $package_unique_num = mt_rand(100000000000, 999999999999);
        
        $_SESSION['pack_num'] = $package_unique_num;
        echo $_SESSION['checkout'];
        echo("<script>console.log('PHP: hahaha111');</script>");
        if ($_SESSION['checkout']) {
            foreach ($ordersId as $order_id) {
                echo "Cart".$order_id;
                
                echo("<script>console.log('Order ID: " . $order_id . " ". $email_add . "');</script>");
                $select = "SELECT * FROM `cart_table` WHERE item_code = '$order_id' AND email_add = '$email_add'";
                $result = mysqli_query($conn, $select);

                while ($row = mysqli_fetch_assoc($result)) {
                    $item_id = $row["item_id"];
                    $item_code = $row["item_code"];
                    $item_name = $row["item_name"];
                    $item_price = $row["item_price"];
                    $item_size = $row["size"];
                    $item_quantity = $row["quantity"];
                    $item_image = $row["item_image"];

                    $total_price = ($item_price * $item_quantity);

                    // echo $package_unique_num . " " . $item_id . " " . $item_code  . " " . $item_name  . " " . $item_price  . " " . $item_size  . " " . $item_quantity  . " " . $email_add;

                    if($payment == "GCash"){
                        
                        $place_item = "INSERT INTO `orders` 
                        (package_num, order_item_code, order_item_name, order_item_price, 
                        order_item_size, order_item_quantity, order_total_price, payment_method, reference_num,
                        payment_status, order_item_image, order_email_add, order_date, order_status)
                        VALUES ('$package_unique_num', '$item_code', '$item_name',
                        '$item_price', '$item_size', '$item_quantity', '$total_price', '$payment', '$gcashRef', 'Not Paid', '$item_image', '$email_add', NOW(), 'Placed')";

                        $result_place_item = mysqli_query($conn, $place_item);

                    }  else if ($payment == "CoD"){
                       
                        $place_item = "INSERT INTO `orders` 
                        (package_num, order_item_code, order_item_name, order_item_price, 
                        order_item_size, order_item_quantity, order_total_price, payment_method,
                        payment_status, order_item_image, order_email_add, order_date, order_status)
                        VALUES ('$package_unique_num', '$item_code', '$item_name',
                        '$item_price', '$item_size', '$item_quantity', '$total_price', '$payment', 'Not Paid',
                         '$item_image', '$email_add', NOW(), 'Placed')";

                        $result_place_item = mysqli_query($conn, $place_item);
                        if($result_place_item){
                            echo("<script>console.log('SUCCESS COD');</script>");
                        } else {
                            echo("<script>console.log('FAILED COD');</script>");
                        }

                    } else {
                        echo("<script>console.log('Error');</script>"); //NOT GCASH OR COD
                    }
    
                    $select = "SELECT * FROM `items` WHERE item_code = '$item_code'";
                     $result = mysqli_query($conn, $select);

                     while ($row = mysqli_fetch_assoc($result)){
                        $num_left = $row["num_left"];
                        $num_sold = $row["num_sold"];
                        $decrement = $num_left - $item_quantity;
                        $increment = $num_sold + $item_quantity;

                         $update_item = "UPDATE items SET num_left = '$decrement', num_sold = '$increment' WHERE item_code = '$item_code'";
                         $result_update = mysqli_query($conn, $update_item);
                     }
                }

                 echo("<script>console.log('PHP: Success dsadas');</script>");
             
                $delete_items = "DELETE FROM `cart_table` WHERE item_code = '$item_code'";
                $result = mysqli_query($conn, $delete_items);
         
            }
        } else {
            foreach ($ordersId as $order_id) {
                echo "Buy Now".$order_id;
                $select = "SELECT * FROM `checkout_items` WHERE check_code = '$order_id' AND check_email_add = '$email_add'";

                $result = mysqli_query($conn, $select);

                while ($row = mysqli_fetch_assoc($result)) {
                    $item_id = $row["check_id"];
                    $item_code = $row["check_code"];
                    $item_name = $row["check_name"];
                    $item_price = $row["check_price"];
                    $item_size = $row["check_size"];
                    $item_quantity = $row["check_quantity"];
                    $item_image = $row["check_image"];

                    $total_price = ($item_price * $item_quantity);

                    // echo $package_unique_num . " " . $item_id . " " . $item_code  . " " . $item_name  . " " . $item_price  . " " . $item_size  . " " . $item_quantity  . " " . $email_add;

                    if($payment == "GCash"){
                          echo("<script>console.log('sa GCASH');</script>");
                        $place_item = "INSERT INTO `orders` 
                        (package_num, order_item_code, order_item_name, order_item_price, 
                        order_item_size, order_item_quantity, order_total_price, payment_method, reference_num,
                        payment_status, order_item_image, order_email_add, order_date, order_status)
                        VALUES ('$package_unique_num', '$item_code', '$item_name',
                        '$item_price', '$item_size', '$item_quantity', '$total_price', '$payment', '$gcashRef', 'Not Paid', '$item_image', '$email_add', NOW(), 'Placed')";

                        $result_place_item = mysqli_query($conn, $place_item);

                    }  else if ($payment == "CoD"){
                      
                        $place_item = "INSERT INTO `orders` 
                        (package_num, order_item_code, order_item_name, order_item_price, 
                        order_item_size, order_item_quantity, order_total_price, payment_method,
                        payment_status, order_item_image, order_email_add, order_date, order_status)
                        VALUES ('$package_unique_num', '$item_code', '$item_name',
                        '$item_price', '$item_size', '$item_quantity', '$total_price', '$payment', 'Not Paid', '$item_image', '$email_add', NOW(), 'Placed')";

                        $result_place_item = mysqli_query($conn, $place_item);
                        if($result_place_item){
                            echo("<script>console.log('SUCCESS COD');</script>");
                        } else {
                            echo("<script>console.log('FAILED COD');</script>");
                        }

                    } else {
                        echo("<script>console.log('Error');</script>");
                    }

                     $select = "SELECT * FROM `items` WHERE item_code = '$item_code'";
                     $result = mysqli_query($conn, $select);

                     while ($row = mysqli_fetch_assoc($result)){
                        $num_left = $row["num_left"];
                        $num_sold = $row["num_sold"];
                        $decrement = $num_left - $item_quantity;
                        $increment = $num_sold + $item_quantity;

                         $update_item = "UPDATE items SET num_left = '$decrement', num_sold = '$increment' WHERE item_code = '$item_code'";
                         $result_update = mysqli_query($conn, $update_item);
                     }
                }
                
                $delete_items = "DELETE FROM `checkout_items` WHERE check_code = '$order_id''";
                $result = mysqli_query($conn, $delete_items);
            }
            unset($_SESSION['checkout']);
        }
            
    } else {
        echo "no";
    }
}

?>