<?php
session_start();

    include("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="page.css">

</head>
<body>
    
    <div class="content">
        <div class="about">
            <h1 class="text-center pt-5">Terms and Policy</h1>

            <div class="onlineordering border border-warning" style="margin-top: 50px; margin-left: 175px;  width: 75%;">
            <h3 class="pt-3 ps-3 text-white" style="background-color: orangered; height: 60px;">Terms and Policy</h3>
                
                <h6 class="text-dark text-center ps-4 pe-4 pt-3">Welcome to TopBuds ECommerce Website! Please read the following terms and policies carefully before using our website and making any purchases. By accessing or using our website, you agree to comply with these terms and policies.</h6>

                <ol class="ms-5 pt-3" style="margin-right: 120px;"> 
                    <li class="fw-bold fs-5 pb-2">Privacy Policy:</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>We respect your privacy and are committed to protecting your personal information. Our Privacy Policy outlines how we collect, use, and disclose your information. By using our website, you consent to the practices described in our Privacy Policy.</li>
                           
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Payment:</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>We offer various payment methods, including credit/debit cards, digital wallets, and other secure online payment options. By providing your payment information, you authorize us to charge the applicable amount for your purchases. Payment details are processed securely, and we do not store sensitive payment information.</li>
                           
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Shipping and Delivery:</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>We strive to provide accurate shipping and delivery estimates. However, actual delivery times may vary based on factors beyond our control. Please refer to our Shipping and Delivery Policy for more information on shipping methods, fees, and estimated delivery times for different regions.</li>
                          
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Returns and Refunds:</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>We want you to be fully satisfied with your purchases. If you receive a defective or incorrect item, please contact our customer support within [number of days] of receiving your order for assistance. Our Returns and Refunds Policy provides detailed information on the return process, eligible items, and refund options.</li>
                           
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Product Information and Pricing:</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>We make every effort to display accurate and up-to-date product information, including descriptions, images, and pricing. However, errors or inaccuracies may occur, and we reserve the right to correct such information. In the event of a pricing error, we will contact you to provide options for proceeding with the order.</li>
                           
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Intellectual Property:</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>All content on our website, including logos, trademarks, text, images, and graphics, is protected by intellectual property rights owned by TopBuds. You may not reproduce, distribute, modify, or use any content without our prior written consent.</li>
                          
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Limitation of Liability:</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>We strive to provide accurate information and a seamless shopping experience. However, we are not liable for any direct, indirect, incidental, or consequential damages arising from the use of our website or the purchase of our products. Our liability is limited to the fullest extent permitted by law.</li>
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Governing Law and Jurisdiction:</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>These terms and policies are governed by the laws of the Philippines. Any disputes arising from or relating to these terms and policies shall be subject to the exclusive jurisdiction of the courts in the Philippines.</li>
                           
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Changes to Terms and Policies:</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>We reserve the right to update or modify these terms and policies at any time without prior notice. Changes will be effective immediately upon posting on our website. We recommend reviewing these terms and policies periodically for any updates.</li>
                          
                        </ul>
                </ol> 
            </div>

          

        </div>
<br><br><br>
      <!----2 Columns----->
      

        
        <!-- <div class="row pt-4 pb-5 text-center" style="background-color: orange;">
            <div class="column left" style="width: 40%; height: 400px;">
                <img src="admin-interface/item_images/location.jpg" style="width:450px; height: 400px;" alt="">
            </div>
            <div class="column left" style="width: 40%; height: 400px;">
                <h3 style="margin-top: 100px; margin-left: -100px;">We offer our services to all of the areas within CAVITE.</h3>
            </div>
        </div> -->
        
      <!----Footer Section----->
       <?php 
        include("footer.php");
      ?>
    

    <!---JAVASCRIPT----->

    <script>
        document.addEventListener("DOMContentLoaded", function(){
        document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
    
        element.addEventListener('click', function (e) {

        let nextEl = element.nextElementSibling;
        let parentEl  = element.parentElement;	

        if(nextEl) {
            e.preventDefault();	
            let mycollapse = new bootstrap.Collapse(nextEl);
            
            if(nextEl.classList.contains('show')){
              mycollapse.hide();
            } else {
                mycollapse.show();
                // find other submenus with class=show
                var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                // if it exists, then close all of them
                if(opened_submenu){
                  new bootstrap.Collapse(opened_submenu);
                        }
                    }
                }
            }); // addEventListener
          }) // forEach
        }); 
        // DOMContentLoaded  end
    </script>

    <script>
        // When the user scrolls the page, execute myFunction
    window.onscroll = function() {myFunction()};

    // Get the header
    var header = document.getElementById("myHeader");

    // Get the offset position of the navbar
    var sticky = header.offsetTop;

    // Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
    function myFunction() {
    if (window.pageYOffset > sticky) {
        header.classList.add("sticky");
    } else {
        header.classList.remove("sticky");
    }
    }
    </script>
    
</body>
</html>