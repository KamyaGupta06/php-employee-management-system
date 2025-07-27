<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Login - Employee System</title>
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

        .login-container {
            background-color: #ffffff;
            padding: 40px 30px;
            width: 350px;
            border-radius: 12px;
            box-shadow: 0px 15px 30px rgba(0,0,0,0.1);
        }

        .login-container h2 {
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
            margin-bottom: 10px; 
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

        .show-password-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            font-size: 14px;
            color: #555;
            user-select: none;
        }

        .show-password-container input[type="checkbox"] {
            margin-right: 8px;
            cursor: pointer;
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
    </style>
</head>
<body>

<div class="login-container">
    <h2>Employee Login</h2>
    <form method="POST" action="auth.php">
        <label for="txtuser">Username</label>
        <input type="text" name="txtuser" id="txtuser" placeholder="Enter your username" required>

        <label for="txtpass">Password</label>
        <input type="password" name="txtpass" id="txtpass" placeholder="Enter your password" required>

        <div class="show-password-container">
            <input type="checkbox" id="showPass" />
            <label for="showPass">Show Password</label>
        </div>

        <input type="submit" value="Login">
    </form>
    <div class="footer">© 2025 Employee System</div>
</div>

<script>
    const showPassCheckbox = document.getElementById('showPass');
    const passwordInput = document.getElementById('txtpass');

    showPassCheckbox.addEventListener('change', function () {
        if (this.checked) {
            passwordInput.type = 'text';
        } else {
            passwordInput.type = 'password';
        }
    });
</script>

</body>
</html>
