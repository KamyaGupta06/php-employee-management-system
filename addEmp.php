<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empname = $_POST['empname'];
    $empmail = $_POST['empmail'];
    $salary = $_POST['salary'];
    $dept = $_POST['dept'];

    if (empty($empname) || empty($empmail) || empty($salary) || empty($dept)) {
        $error = "All fields are required!";
    } else {
        $stmt = $conn->prepare("INSERT INTO emp (empname, empmail, salary, dept) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $empname, $empmail, $salary, $dept);

        if ($stmt->execute()) {
            $success = "Employee added successfully!";
        } else {
            $error = "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Add Employee - Employee System</title>
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

        .form-container {
            background-color: #ffffff;
            padding: 40px 30px;
            width: 400px;
            border-radius: 12px;
            box-shadow: 0px 15px 30px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"],
        input[type="email"],
        input[type="number"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 16px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .message {
            color: green;
            margin-bottom: 10px;
        }

        .error {
            color: red;
            margin-bottom: 10px;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 15px;
            color: #888;
        }

        .back-link {
            display: block;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
        }

    </style>
</head>
<body>

<div class="form-container">
    <h2>Add Employee</h2>

    <?php if ($success) echo "<div class='message' id='msg'>$success</div>"; ?>
<?php if ($error) echo "<div class='error' id='msg'>$error</div>"; ?>


    <form method="POST">
        <input type="text" name="empname" placeholder="Name" required />
        <input type="email" name="empmail" placeholder="Email" required />
        <input type="number" name="salary" placeholder="Salary" required />
        <input type="text" name="dept" placeholder="Department" required />
        <input type="submit" value="Add Employee" />
    </form>

    <a class="back-link" href="dashboard.php">← Back to Dashboard</a>
    <div class="footer">© 2025 Employee System</div>
</div>

</body>
<script>
    setTimeout(function () {
        var msg = document.getElementById("msg");
        if (msg) {
            msg.style.display = "none";
        }
    }, 3000);
</script>
</html>