<?php
    session_start();
    include_once("../includes/dbh.inc.php");
    global $conn;

        if(isset($_POST["save"])){
            $ad_username = $_POST["admin_username"];
            $ad_email = $_POST["admin_email"];
            $ad_password = $_POST["admin_password"];
            $ad_rpassword = $_POST["ad_rpw"];

            echo $ad_username;
            echo $ad_email;
            echo $ad_password;
            echo $ad_rpassword;

            if($ad_password !== $ad_rpassword){
                header("Location: edit.admin.acc.php?unmatched-passwords");
                exit();
            } else {
                if(empty($ad_username) || empty($ad_email) || empty($ad_password) || empty($ad_rpassword)){
                    echo '<script>alert("Input required!")</script>';
                } else {
                    $hashed_ad_pass = password_hash($ad_password, PASSWORD_DEFAULT);

                    $update_admin_account = "UPDATE admin_users SET username = '$ad_username', email_add = '$ad_email', password = '$hashed_ad_pass'";
                    $result_update = mysqli_query($conn, $update_admin_account);
    
                    if($result_update){
                        echo '<script>alert("Admin account has been successfully updated!")</script>';
                        header("Location: main_dashboard.php");
                    } else {
                        echo '<script>alert("Error has occured!")</script>';
                        header("Location: edit.admin.acc.php");
                    }
                }
            }
        }
        else {
            echo '<script>alert("Something went wrong!")</script>';
        }
?>