<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Healthcare Portal</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e3f2fd;
            text-align: center;
            color: #0d47a1;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, button {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #0d47a1;
            border-radius: 5px;
        }
        button {
            background-color: #0d47a1;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #1565c0;
        }
    </style>
</head>
<body>
    <h1>Welcome to the Healthcare Portal</h1>
    <div class="container">
        <h2>Login</h2>
        <input type="email" id="email" placeholder="Enter your email">
        <input type="password" id="password" placeholder="Enter your password">
        <button onclick="login()">Login</button>
        <p>Don't have an account? <a href="#" onclick="showRegister()">Sign up</a></p>
    </div>
    
    <div class="container" id="register" style="display:none;">
        <h2>Register</h2>
        <input type="email" id="reg-email" placeholder="Enter your email">
        <input type="password" id="reg-password" placeholder="Enter a password">
        <button onclick="register()">Sign Up</button>
        <p>Already have an account? <a href="#" onclick="showLogin()">Login</a></p>
    </div>

    <script>
        function showRegister() {
            document.querySelector('.container').style.display = 'none';
            document.getElementById('register').style.display = 'block';
        }
        function showLogin() {
            document.querySelector('.container').style.display = 'block';
            document.getElementById('register').style.display = 'none';
        }
        function login() {
            alert('Login functionality will be implemented with backend support.');
        }
        function register() {
            alert('Registration functionality will be implemented with backend support.');
        }
    </script>
</body>
</html>
