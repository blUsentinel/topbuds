
    <div class="footer">
        <div class="footer_row">
            <div class="footer_column">
                <h4 class="text-warning">About TopBuds</h1>
                    <h6><a href="aboutus.php" style="text-decoration: none; color: white;">About Us</a></h6>
                    <h6><a href="terms_and_policy.php" style="text-decoration: none; color: white;">Privacy Policy</a></h6>
            </div>
            <div class="footer_column">
                <h4 class="text-warning">Info</h1>
                    <h6><a href="manage_account.php" style="text-decoration: none; color: white;">My Account</a></h6>

                    <?php
                if (isset($_SESSION["userEmailAdd"])) {

                    $selectData = "SELECT * FROM users WHERE email_add ='{$_SESSION["userEmailAdd"]}'";
                    $query = mysqli_query($conn, $selectData);
                    if (mysqli_num_rows($query)) {
                        while ($users = mysqli_fetch_array($query)) {
                            $email_add = $users["email_add"];
                    ?>
                    
                    <?php
                        $cart_quantity = "SELECT * FROM users WHERE email_add ='{$_SESSION["userEmailAdd"]}'";
                        $sql = "SELECT * FROM cart_table WHERE email_add ='{$_SESSION["userEmailAdd"]}'";
                        $mysqliStatus = mysqli_query($conn, $sql);
                        $rows_count_value = mysqli_num_rows($mysqliStatus);         
                    ?>
                         <a href="shoppingcartpage.php?email_add=<?php echo $email_add ?>" style="text-decoration: none; color: white;">
                              My Cart
                        </a>
                    <?php        
                        } 
                    }
                }  else {
                    ?>
                    <a href="loginpage.php" style="text-decoration: none; color: white;">
                        My Cart
                    </a>
                    <?php
                }
            ?>

                   
                    <h6><a href="my_orders.php" style="text-decoration: none; color: white;">Order Status</a></h6>
            </div>
            <div class="footer_column">
                <h4 class="text-warning">Help and FAQs</h1>
                    <h6><a href="help_and_faqs.php" style="text-decoration: none; color: white;">Online Ordering</a></h6>
                    <h6><a href="help_and_faqs.php" style="text-decoration: none; color: white;">Shipping</a></h6>
                    <h6><a href="help_and_faqs.php" style="text-decoration: none; color: white;">Billing</a></h6>
            </div>
            <div class="footer_column" style="width: 400px;">
                <h4 class="text-warning">TopBuds Clothing</h1>

                <h5 style="color: white;" class="mt-5">Links:</h5>
                    <div class="row" >
                        <div class="col-2">
                             <a href="https://www.facebook.com/Topbuddy">
                                <img src="facebook_icon.png" style="height: 50px; width: 50px;" alt="facebook_icon.png">
                             </a>
                        </div>
                        <div class="col-2" style="margin-top: -2px;">
                            <a href="https://www.instagram.com/topbuds.habits/">
                                <img src="instagram_icon.png" style="height: 55px; width: 50px;" alt="instagram_icon.png">
                            </a>
                        </div>
                        <div class="col-8" style="margin-top: -2px;">
                                <img src="gmail_icon.png" style="height: 55px; width: 50px; float: left;" alt="gmail_icon.png">
                                <p class="mt-3" style="margin-left: 60px;">topbudshabits@gmail.com</p>
                        </div>
                    </div>
            </div>
          </div>
            <br><br>
          <hr style="color: white; background-color: white; height: 2px; width: 85%; margin-left: 100px;">
          <h6 style="margin-top: 13px; text-align: center;">(C) 2022 Topbuds Clothing. All Rights Reserved</h6>
      </div>






           