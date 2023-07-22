<?php
session_start();
include('dbh.inc.php');

    if(isset($_POST["range"])){
        $range = $_POST["range"];

        if($range == "Daily"){
            $select_range = "SELECT * FROM `orders` WHERE ordered_at = NOW()";
            $result_select_packages = mysqli_query($conn, $select_packages);

            if(){
                echo "
                
                <table class="table table-bordered border-primary table-success mt-2">
                <thead class="text-center fw-bold">
                    <tr>
                        <th>Package Number</th>
                        <!-- <th>Item Code</th> -->
                        <th>Item Image</th>
                        <th>Item Name</th>
                        <th>Item Total Price</th>
                        <th>Ordered At</th>
                        <th>Payment Method</th>
                        <th>Paid</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <?php
                while ($row = mysqli_fetch_assoc($select_list)) {
                    ?>
                    <tr style="font-size: 14px;">
                        <td class="text-center">
                            <?php echo $row["package_num"] ?>
                        </td>
                        <!-- <td class="text-center"><?php echo $row["order_item_code"] ?></td> -->
                        <td class="text-center">
                            <img src="../admin-interface/item_images/<?= $row["order_item_image"] ?>" height="50" width="50"
                                alt="" />
                        </td>
                        <td>
                            <?php echo $row["order_item_name"] ?>
                        </td>
                        <td class="text-center">₱
                            <?php echo $row["order_item_price"] + 45 ?>.00
                        </td>
                        <td class="text-center">
                            <?php echo $row["order_date"] ?>
                        </td>
                        <td class="text-center">
                            <?php echo $row["payment_method"] ?>
                        </td>
                        <td class="text-center">
                            <?php echo $row["payment_status"] ?>
                        </td>
                        <td class="text-center">
                            <?php echo $row["order_status"] ?>
                        </td>
                        <!-- <td class="text-center"><button type="button" class="btn btn-link">Edit</button></td> -->
                    </tr>

                    <?php
                }
                ;
                ?>
                
                ";
            }

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