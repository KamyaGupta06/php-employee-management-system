<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Dashboard - Employee System</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .dashboard-container {
            background-color: #ffffff;
            padding: 40px 30px;
            width: 400px;
            border-radius: 12px;
            box-shadow: 0px 15px 30px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 25px;
            color: #333;
        }

        .welcome-text {
            font-size: 18px;
            color: #555;
            margin-bottom: 30px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease-in-out;
        }

        .btn:hover {
            background-color: #45a049;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 15px;
            color: #888;
        }
    </style>
</head>
<body>

<div class="dashboard-container">
    <h2>Dashboard</h2>
    <div class="welcome-text">Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</div>

    <a href="addEmp.php" class="btn">Add Employee</a>
    <a href="viewEmp.php" class="btn">View Employees</a>
    <a href="logout.php" class="btn">Logout</a>

    <div class="footer">© 2025 Employee System</div>
</div>

</body>
</html>
