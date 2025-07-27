<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include 'db.php'; 

$search = '';
if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
    $stmt = $conn->prepare("SELECT * FROM emp WHERE empname LIKE ? OR empmail LIKE ? ORDER BY empid DESC");
    $like = "%$search%";
    $stmt->bind_param("ss", $like, $like);
} else {
    $stmt = $conn->prepare("SELECT * FROM emp ORDER BY empid DESC");
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Employees</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(to right, #74ebd5, #ACB6E5);
            padding: 40px;
        }

        .container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.1);
            max-width: 900px;
            margin: auto;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        .search-box {
            text-align: center;
            margin-bottom: 20px;
        }

        .search-box input[type="text"] {
            width: 60%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }

        .search-box button {
            padding: 10px 15px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
        }

        .back-link {
            text-decoration: none;
            color: #4CAF50;
            font-weight: bold;
            display: inline-block;
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #f4f4f4;
            color: #333;
        }

        .btn {
    padding: 6px 10px;
    text-decoration: none;
    font-weight: bold;
    border-radius: 6px;
    display: inline-block;
    margin-right: 6px;
    min-width: 60px;
    text-align: center;
    white-space: nowrap;
    box-sizing: border-box;
    
}

.btn-update {
    background-color: #2196F3;
    color: white;
    margin-bottom:5px;
}

.btn-delete {
    background-color: #f44336;
    color: white;
}

    </style>
</head>
<body>

<div class="container">
    <a class="back-link" href="dashboard.php">← Back to Dashboard</a>
    <h2>Employee List</h2>

    <div class="search-box">
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Search by name or email" value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <?php if ($result->num_rows > 0): ?>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Salary</th>
                <th>Department</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['empid']) ?></td>
                    <td><?= htmlspecialchars($row['empname']) ?></td>
                    <td><?= htmlspecialchars($row['empmail']) ?></td>
                    <td><?= htmlspecialchars($row['salary']) ?></td>
                    <td><?= htmlspecialchars($row['dept']) ?></td>
                    <td>
                        <div class="b">
                        <a href="updateEmp.php?id=<?= $row['empid'] ?>" class="btn btn-update">Update</a>
                        <a href="deleteEmp.php?id=<?= $row['empid'] ?>" class="btn btn-delete" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</a>
                        </div>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p style="text-align:center; color: #777;">No employees found.</p>
    <?php endif; ?>
</div>

</body>
</html>
