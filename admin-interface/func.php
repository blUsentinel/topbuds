<?php 

if (isset($_POST["submit"])){
    $admin_username = $_POST["username"];
    $adminPassword = $_POST["loginpass"];

    require_once("../includes/dbh.inc.php");
    require_once("admin.login.function.php");

    if(emptyInputLogin($admin_username, $adminPassword) !== false){
        header("Location: admin.login.php?error=emptyinput");
    } else {
        loginUser($conn, $admin_username, $adminPassword);
    }
}

?>