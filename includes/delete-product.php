<?php
session_start();
include('dbh.inc.php');

    if(isset($_POST['it_code'])){
        $item_code = $_POST['it_code'];

        // echo "HERE : " . $item_code;

        $delete_query = "DELETE FROM items WHERE item_code = '$item_code'";
        $result_query = mysqli_query($conn, $delete_query);

        echo "Successfully deleted item " . $item_code . " from the database!";

    } else {
        echo "Error";
    }

    // if(isset($_POST["package_num"])){
    //     $package = $_POST["package_num"];
        
    //     $select_packages = "SELECT * FROM `orders` WHERE package_num = '$package'";
    //     $result_select_packages = mysqli_query($conn, $select_packages);

    //     if(mysqli_num_rows($result_select_packages) > 0){
    //         $update_package = "UPDATE `orders` SET order_status = 'Cancelled' WHERE package_num = '$package' AND order_email_add = '$email_add'";
    //         $result_update_package = mysqli_query($conn, $update_package);

    //             if($result_update_package){
    //                 echo "Order has been successfully cancelled.";
    //             } else {
    //                 echo "Something went wrong!";
    //             }

    //     } else {
    //         echo "Something went wrong";
    //     }
    // }
    // else{
    //     echo "no";
    // }

?>