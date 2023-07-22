<?php
session_start();
include("header.php");
?>

<body>
    <div class="content">
      <div class="row">
        <div class="best-selling" style="margin-left: 100px;">
          <h1 style="margin-top: 40px;">Best-Selling Items</h1>
            <div class="margin-left:100px;">
              <?php 
                displayBestSellingItems();
              ?>
            </div>
        </div>
        <hr>

        <div class="column left" style="margin-bottom: 1000px;">
        </div>
          <br>
        <div class="column right" style="background-color: white; margin-bottom: 1000px;">
                      <table>
                          <tr>
                              <th>
                                  <br><br>
                                  <h1 class="h3">All Products</h1>
                              </th>
                            
                          </tr>   
                      </table>
                  <br><br><br>
                  <!----Sort By Dropdown Menu----->
                  <h3 class="h6" style="text-align: left;"></h3>
                
                  <?php 
                      displayAllItems();
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