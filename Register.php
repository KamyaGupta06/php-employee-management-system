<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Register - Employee System</title>
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

        .register-container {
            background-color: #ffffff;
            padding: 40px 30px;
            width: 400px;
            border-radius: 12px;
            box-shadow: 0px 15px 30px rgba(0,0,0,0.1);
        }

        .register-container h2 {
            text-align: center;
            margin-bottom: 25px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: 600;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease-in-out;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #4CAF50;
            outline: none;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.4);
        }

        input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            font-weight: bold;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 15px;
            color: #888;
        }

        .link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .link a {
            color: #4CAF50;
            text-decoration: none;
        }

        .link a:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body>

<div class="register-container">
    <h2>Create Account</h2>
    <form method="POST" action="register_process.php">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Choose a username" required>

        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Create a password" required>

        <label for="password_confirm">Confirm Password</label>
        <input type="password" name="password_confirm" id="password_confirm" placeholder="Confirm your password" required>

        <input type="submit" value="Register">
    </form>

    <div class="link">
        Already have an account? <a href="login.php">Login here</a>
    </div>

    <div class="footer">© 2025 Employee System</div>
</div>

</body>
</html>
