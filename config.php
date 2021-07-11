<?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "Sparks_Bank";

    $conn = new mysqli($host, $username, $password, $database);

    if(mysqli_connect_error()) {
        echo("Connection failed due to -> ".mysqli_connect_error());
        die();
    }
?>