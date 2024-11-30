<?php
$con = mysqli_connect('localhost', 'root', '', 'phptutorials');
mysqli_set_charset($con, "utf8mb4");

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
?>