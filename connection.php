<?php
    include_once("env.php");

    define('DB_SERVER', getenv("HOST"));
    define('DB_USER', getenv("USERNAME"));
    define('DB_PASS' , getenv("PASSWORD"));
    define('DB_NAME', getenv("DB"));

    $con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME);
    
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>