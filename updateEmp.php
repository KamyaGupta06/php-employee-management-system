<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$error = $success = "";
$id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: viewEmp.php");
    exit();
}

// Fetch employee data
$stmt = $conn->prepare("SELECT empname, empmail, salary, dept FROM emp WHERE empid = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows === 0) {
    header("Location: viewEmp.php");
    exit();
}
$employee = $result->fetch_assoc();
$stmt->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $empname = trim($_POST['empname']);
    $empmail = trim($_POST['empmail']);
    $salary = trim($_POST['salary']);
    $dept = trim($_POST['dept']);

    if (empty($empname) || empty($empmail) || empty($salary) || empty($dept)) {
        $error = "All fields are required!";
    } else {
        $stmt = $conn->prepare("UPDATE emp SET empname = ?, empmail = ?, salary = ?, dept = ? WHERE empid = ?");
        $stmt->bind_param("ssdsi", $empname, $empmail, $salary, $dept, $id);
        if ($stmt->execute()) {
            $success = "Employee updated successfully!";
            header("Location: viewEmp.php");
            exit();
        } else {
            $error = "Error updating employee: " . $stmt->error;
        }
        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Update Employee</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0; padding: 0;
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
            background: white;
            padding: 40px 30px;
            width: 400px;
            border-radius: 12px;
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
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
            background-color: #2196F3;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }
        input[type="submit"]:hover {
            background-color: #1976D2;
        }
        .message {
            margin-bottom: 10px;
            color: green;
        }
        .error {
            margin-bottom: 10px;
            color: red;
        }
        .back-link {
            display: block;
            margin-top: 15px;
            color: #007BFF;
            text-decoration: none;
        }
        
    </style>
</head>
<body>

<div class="form-container">
    <h2>Update Employee</h2>

    <?php if ($success): ?>
        <div class="message"><?= $success ?></div>
    <?php endif; ?>

    <?php if ($error): ?>
        <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <input type="text" name="empname" value="<?= htmlspecialchars($employee['empname']) ?>" placeholder="Name" required />
        <input type="email" name="empmail" value="<?= htmlspecialchars($employee['empmail']) ?>" placeholder="Email" required />
        <input type="number" name="salary" value="<?= htmlspecialchars($employee['salary']) ?>" placeholder="Salary" required />
        <input type="text" name="dept" value="<?= htmlspecialchars($employee['dept']) ?>" placeholder="Department" required />
        <input type="submit" value="Update Employee" />
    </form>

    <a href="viewEmp.php" class="back-link">← Back to Employee List</a>
</div>

</body>
</html>
