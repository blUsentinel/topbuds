<?php
session_start();
include_once("header.php");
?>

<body>
    <div class="content">
        
    <!----2 Columns----->
    <div class="row" style="height: 2000px;">
        <div class="column left">


        </div>
        <br>
        <!----Column right----->
        <div class="column right" style="background-color: white;">
<!-- 
        <div class="search-result" style="margin-left: 100px;">
            <h1 style="margin-top: 40px;">Search Results</h1>
                <div class="margin-left:100px;">
                    <?php 
                        checkSearch();
                    ?>
                </div>  
        </div> -->
        
            <table>
                <tr>
                    <th>
                        <br><br>
                        <!-- <h1 class="h3">Search Results</h1> -->
                    </th>
                    <!----Page Number Buttons----->
                    <th style="padding-left: 400px;">
                        <div class="nav_buttons">
                           
                        </div>
                    </th>
                </tr>   
            </table>
        <br>
        <!----Sort By Dropdown Menu----->
        <h3 class="h6" style="text-align: left;"></h3>
        <!-- <div class="dropdown">
            <button onclick="clickDropdown()" class="dropbtn dropdown-toggle" style="text-align: left;" 
            data-toggle="dropdown">Sort By</button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="#">Date Added</a>
                    <a href="#">Best Selling</a>
                    <a href="#">Brands</a>
                </div>
        </div> -->

          <!----ITEMS LIST----->
          <!----fetching products from items table in the database ---->
        <?php 
            checkSearch();
        ?>

        </div> <!---for right column--->
      </div> <!---for row--->
    </div>


      <!----Footer Section----->
            <?php
                include("footer.php");
            ?>
    

    <!---JAVASCRIPT----->
    
    <script src="jquery-3.6.3.js"></script>

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

        <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function clickDropdown() {
          document.getElementById("myDropdown").classList.toggle("show");
        }
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
        </script>

        <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
        function clickAccDropdown() {
          document.getElementById("myAccDropdown").classList.toggle("show");
        }
        
        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
          if (!event.target.matches('.accdropbtn')) {
            var dropdowns = document.getElementsByClassName("accdropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
              var openDropdown = dropdowns[i];
              if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
              }
            }
          }
        }
        </script>
</body>
</html>


        

    