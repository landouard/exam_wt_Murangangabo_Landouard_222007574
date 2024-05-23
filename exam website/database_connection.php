<?php
    // Connection details
    $host = "localhost";
    $user = "landouard";
    $pass = "222007574";
    $database = "copywriting";

    // Creating connection
    $connection = new mysqli($host, $user, $pass, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }