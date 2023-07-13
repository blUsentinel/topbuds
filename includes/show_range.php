<?php
session_start();
include('dbh.inc.php');

    if(isset($_POST["range"])){
        $range = $_POST["range"];

        if($range == "Daily"){
            $select_range = "SELECT * FROM `orders` WHERE ordered_at = NOW()";
            return $result_select_packages = mysqli_query($conn, $select_packages);

        } else if ($range == "Weekly"){

        } else if ($range == "Monthly"){

        } else if ($range == "Yearly"){

        }
        
        $select_range = "SELECT * FROM `orders` WHERE package_num = '$package'";
        $result_select_packages = mysqli_query($conn, $select_packages);

        if(mysqli_num_rows($result_select_packages) > 0){
            $update_package = "UPDATE `orders` SET order_status = 'Cancelled' WHERE package_num = '$package' AND order_email_add = '$email_add'";
            $result_update_package = mysqli_query($conn, $update_package);

                if($result_update_package){
                    echo "Order has been successfully cancelled.";
                } else {
                    echo "Something went wrong!";
                }

        } else {
            echo "Something went wrong";
        }
    }
    else{
        echo "no";
    }

?>