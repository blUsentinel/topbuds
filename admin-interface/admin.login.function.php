<?php
        
        function emptyInputLogin($admin_username, $adminPassword){
            $result;
                if(empty($admin_username) || empty($adminPassword)){
                    $result = true;
                } else {
                    $result = false;
                }
                return $result;
        }


        function userExists($conn, $admin_username){
            $sql = "SELECT * FROM admin_users WHERE username = ?;";
            $stmt = mysqli_stmt_init($conn);
    
            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location: admin.login.php?error=stmtfailed");
                exit();
            }
    
            mysqli_stmt_bind_param($stmt, "s", $admin_username);
            mysqli_stmt_execute($stmt);
    
            $resultData = mysqli_stmt_get_result($stmt);
    
            if($row = mysqli_fetch_assoc($resultData)){
                return $row; /** fetch row of data of existing user in the db**/
            } else {
                $result = false;
                return $result;
            }
            mysqli_stmt_close($stmt);
        }

        function loginUser($conn, $admin_username, $adminPassword){
            $user_exists = userExists($conn, $admin_username);

            $pwdHashed = $user_exists["password"];
            $checkPassword = password_verify($adminPassword, $pwdHashed);


            if($pwdHashed === $adminPassword){
                session_start();
                $_SESSION['admin_auth'] = true;   
                $_SESSION["admin_username"] = $user_exists["username"];
                header("Location: main_dashboard.php?dashboard");
                exit();
            } else {
                header("Location: admin.login.php?error=wronglogin");
                exit();
            }
        }













?>


