<?php
    // MyWeb Server
    $host = "localhost";
    $dbusername = "alvi118_db1";
    $dbpassword = "";
    $dbname = "alvi118_db1";

    // Create connection
    $connection = new mysqli ($host, $dbusername, $dbpassword, $dbname);
    
    if (mysqli_connect_error()){
        die('Connect Error ('. mysqli_connect_errno() .') '
        . mysqli_connect_error());
    }
?>
