<?php
    $server = "localhost";
    $user = "ttwpuztg_root";
    $pass = "cvsu";
    $db = "ttwpuztg_rodel_db";


    $conn = mysqli_connect($server, $user, $pass, $db);

    if(!$conn)
    {
        die ("Connection Error... " . mysqli_connect_error());
    }
?>