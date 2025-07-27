<?php
session_start();
include 'db.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $result = $conn->query("SELECT COUNT(*) AS count FROM user");
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        // Admin exists, show message and stop
        echo '<div style="
    padding: 40px 30px;
    width: 400px;
    margin: 100px auto; 
    background-color: #ffffff; 
    border-radius: 12px; 
    box-shadow: 0px 15px 30px rgba(0,0,0,0.1);
    text-align: center;
    color: #555; 
    font-weight: 700;
    font-size: 16px;
    font-family: \'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif;
">
    Admin account already registered.<br><br>
    Please <a href="login.php" style="color:red; font-weight:600; text-decoration:none;">login here</a>
</div>
';
        exit();
    }

    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $password_confirm = $_POST['password_confirm'];

    // Basic validation
    if (empty($username) || empty($password) || empty($password_confirm)) {
        die('Please fill all fields.');
    }
    if ($password !== $password_confirm) {
        die('Passwords do not match.');
    }

    // Check if username exists
    $stmt = $conn->prepare("SELECT id FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        die('Username already taken.');
    }
    $stmt->close();

    // Hash password and insert
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashed_password);

    if ($stmt->execute()) {
        // Registration successful
        header('Location: login.php?registered=1');
        exit();
    } else {
        die('Registration failed: ' . $stmt->error);
    }
}
?>
