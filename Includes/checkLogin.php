<?php

require_once 'connection.php';

$user_check    = $_SESSION['username'];
$ses_sql       = mysqli_query($connect, "select username from admin where username = '$user_check' ");
$row           = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);
$login_session = $row['username'];

if (!isset($_SESSION['username'])) {
    header("location:login.php");
    die();
}

?>