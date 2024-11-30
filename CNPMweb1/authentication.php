<?php
session_start();

if(!isset($_SESSION['authenticated']))
{
    $_SESSION['status'] = "Please Login to Access User Dashboard.!";
    header ('Location: login.php');
    exit(0); 
}

$role = isset($_SESSION['auth_user']['role']) ? $_SESSION['auth_user']['role'] : null;


if ($role == 0 && basename($_SERVER['PHP_SELF']) != "user-dashboard.php") {
    header("Location: user-dashboard.php");
    exit(0);
} elseif ($role == 1 && basename($_SERVER['PHP_SELF']) != "seller-dashboard.php") {
    header("Location: seller-dashboard.php");
    exit(0);
} elseif ($role == 3 && basename($_SERVER['PHP_SELF']) != "admin-dashboard.php") {
    header("Location: admin-dashboard.php");
    exit(0);
}
 
?>