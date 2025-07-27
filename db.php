<?php
$host = "localhost";
$user = "root";
$pass = "root";
$dbname = "employeedb"; 

$conn = mysqli_connect($host, $user, $pass, $dbname,3307);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
