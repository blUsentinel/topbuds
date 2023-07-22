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
            <h1 class="text-center pt-5">Help and FAQs</h1>

            <div class="onlineordering border border-warning" style="margin-top: 50px; margin-left: 175px;  width: 75%;">
            <h3 class="pt-3 ps-3 text-white" style="background-color: orangered; height: 60px;">Online Ordering</h3>
                <ol class="ms-5 pt-3" style="margin-right: 120px;"> 
                    <li class="fw-bold fs-5 pb-2">Accessing the Website:</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>Connect your device to the internet and open a web browser.</li>
                            <li>Enter the URL of the ecommerce website or search for it using a search engine.</li>
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Creating an Account:</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>The website require users to create an account before making a purchase. Look for options like "Sign Up" or "Register" and follow the prompts to create an account.</li>
                            <li>Provide the necessary information, such as your name, email address, and password.</li>
                            <li>Confirm your account through a verification email if required.</li>
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Browsing and Searching</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>Use the search bar or navigate through categories to find the product you want to purchase.</li>
                            <li>Click on product images or titles to access detailed product pages for more information.</li>
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Product Selection</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>On the product page, review the product description, specifications, pricing, and customer reviews.</li>
                            <li>If applicable, select product variations such as size, color, or quantity.</li>
                            <li>Click on the "Add to Cart" or similar button to add the item to your shopping cart.</li>
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Shopping Cart</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>Once you've added items to your cart, you'll typically see a shopping cart icon or a link indicating the number of items in your cart.</li>
                            <li>Click on the cart icon or link to proceed to the shopping cart page.</li>
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Reviewing the Cart</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>On the shopping cart page, review the items you have added.</li>
                            <li>Verify the quantities, variations, and prices.</li>
                            <li>If needed, you can update quantities, remove items, or continue shopping to add more products to your cart.</li>
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Proceeding to Checkout</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>Once you're satisfied with the items in your cart, click on the "Checkout" or a similar button to proceed to the checkout process.</li>
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Providing Shipping Information</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>Enter your shipping address, contact details, and preferred shipping method.</li>
                            <li>If the shipping address is different from the billing address, provide the necessary information for billing as well.</li>
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Selecting a Payment Method</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>Choose your preferred payment method (GCash or Cash-on-Delivery)</li>
                            <li>Double-check the accuracy of your information before proceeding.</li>
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Reviewing and Confirming the Order</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>Review the order summary, including the items, shipping address, payment details, and total cost.</li>
                            <li>Make sure all the information is correct.</li>
                            <li>If available, check the box to agree to the terms and conditions.</li>
                            <li>Click on the "Place Order" or a similar button to confirm your purchase.</li>
                        </ul>
                    <li class="fw-bold fs-5 pb-2">Order Confirmation</li>
                        <ul style="list-style-type:square" class="pb-3">
                            <li>After placing your order, you'll receive an order confirmation page with details of your purchase.</li>
                            <li>You may also receive an order confirmation email.</li>
                            <li>Take note of any order tracking information provided, such as a tracking number or estimated delivery date.</li>
                        </ul>
                </ol> 
            </div>

            <div class="onlineordering border border-warning" style="margin-top: 50px; margin-left: 175px;  width: 75%;">
            <h3 class="pt-3 ps-3 text-white" style="background-color: orangered; height: 60px;">Order Status</h3>
                
                <div class="row text-center">
                    <div class="col">
                        <img src="placed.png" class="mt-3" style="height: 80px; width: 80px;" alt="">
                        <h3 class="">Placed</h3>

                        <p style="font-size: 14px;" class="border-end">"Placed order" refers to the action taken by a customer to submit their purchase request on an ecommerce website. Once an order has been confirmed and processed, the packing process takes place.</p>
                    </div>
                    <div class="col">
                        <img src="packed.png" style="height: 100px; width: 100px;" alt="">
                        <h3 class="">To Ship</h3>

                        <p style="font-size: 14px;" class="border-end">"Packed order" is the stage in the order fulfillment process where the items that the customer has purchased are carefully packaged for shipment.</p>
                    </div>
                    <div class="col">
                        <img src="shipped.png" class="pt-1" style="height: 100px; width: 130px;" alt="">
                        <h3 class="">In-Transit</h3>
                        
                        <p style="font-size: 14px;" class="border-end"> "Shipped order" refers to the stage when the packed order is handed over to the selected shipping carrier for transportation to the customer's designated shipping address.</p>

                    </div>
                    <div class="col">
                        <img src="received.png" style="height: 100px; width: 100px;" alt="">
                        <h3 class="">Received</h3>

                        <p style="font-size: 14px;"> "Received order" denotes the final stage of the order fulfillment process. It occurs when the customer receives the package at their shipping address and acknowledges the successful delivery.</p>
                    </div>
                </div>
            </div>

            <div class="onlineordering border border-warning" style="margin-top: 50px; margin-left: 175px;  width: 75%;">
                <h3 class="pt-3 ps-3 text-white" style="background-color: orangered; height: 60px;">Payment Method</h3>
                    
                    <div class="row text-center pt-5">
                        <div class="col-5 me-3" style="margin-left: 80px; background-color: #fff8b4;">
                            <h1>GCash</h1>

                            <p>We are excited to offer you the convenience of paying for your online purchases using GCash, a widely trusted and secure mobile wallet in the Philippines. GCash allows you to make quick and seamless payments using your smartphone, eliminating the need for physical cash or credit cards.</p>
                        </div>
                        <div class="col-5" style="background-color: #fff8b4;">
                            <h1>Cash-on-Delivery</h1>

                            <p>We understand that convenience is important to you, and that's why we offer Cash on Delivery (COD) as a payment option for your online purchases. With COD, you can pay for your order in cash when it is delivered right to your doorstep.</p>
                        </div>
                    </div>

                    <br><br>
            </div>

            <div class="onlineordering border border-warning" style="margin-top: 50px; margin-left: 175px;  width: 75%;">
                <h3 class="pt-3 ps-3 text-white" style="background-color: orangered; height: 60px;">Order Status</h3>
                
                <div class="image text-center">
                    <img src="shoppingcartpage.png" style="width:90%; height:100%;" alt="">
                    
                    <h3 class="pt-3">Shopping Cart page</h3>
                </div>

                <div class="image text-center">
                    <img src="delete.png" style="width:50%; height:100%;" alt="">
                    
                    <h3 class="pt-3">Users can click "Delete" button to delete items in their carts.</h3>
                </div>

                
              
                

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