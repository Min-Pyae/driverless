<?php 
    $host = "localhost";
    $user = "root";
    $password = "";
    $database = "driverless";

    $Connect_DB = mysqli_connect($host, $user, $password, $database) or die ("Couldn't Connect to Database!");
?>