<?php

try {
    
    ini_set('display_errors', 0);
    ini_set('display_startup_errors', 0);
    error_reporting(E_ALL);
    
    $host       = "localhost";
    $user       = "root";
    $password   = "";
    $database   = "teamapp";
    
    $connect = mysqli_connect($host, $user, $password, $database);
    
    if (mysqli_connect_errno($connect)){
        throw new Exception("Connection Failed." . mysqli_connect_errno($connect) . ". <br>" . mysqli_connect_error($connect));
    }
    
    
} catch (Exception $e) {
    echo $e->getMessage();
    die();    
}

?>
