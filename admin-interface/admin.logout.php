<?php

session_start();

if(isset($_SESSION['admin_auth']) && $_SESSION == true){
    unset($_SESSION['admin_auth']);
    unset($_SESSION["admin_username"]);
}

session_unset();
session_destroy();

header("Location: admin.login.php");
exit();
?>