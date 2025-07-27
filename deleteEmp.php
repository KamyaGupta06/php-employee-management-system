<?php
include 'db.php';
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM emp WHERE empid = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

header("Location: viewEmp.php");
exit();
