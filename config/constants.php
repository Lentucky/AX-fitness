<?php 
    // //Start Session
    // session_start();

    //Create Constants to Store Non Repeating Values
    // define('SITEURL', 'http://localhost/cinema/');
    // define('LOCALHOST', 'localhost');
    // define('DB_USERNAME', 'root');
    // define('DB_PASSWORD', '');
    // define('DB_NAME', 'ax_fitness');
    
    // $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error($conn)); //Database Connection
    // $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error($conn)); //SElecting Database


    $sname= "localhost";
    $uname= "root";
    $password = "";

    $db_name = "ax_fitness";

    $conn = mysqli_connect($sname, $uname, $password, $db_name);

    if (!$conn) {
        echo "Connection failed!";
    }

