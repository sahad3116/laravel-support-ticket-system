<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://www.shutterstock.com/image-photo/financial…isory-services-asian-advisor-600nw-1926268628.jpg') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            height: 100vh;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            margin: 0;
        }
        .login-container {
            background: rgba(255, 255, 255, 0.85); 
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            width: 300px;
        }
        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0 20px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 15px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .alert {
            width: 300px;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            text-align: center;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }
        .register-link {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007bff;
            text-decoration: none;
        }
        .register-link:hover {
            text-decoration: underline;
        }
        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            background: #333;
            color: white;
            padding: 8px 12px;
            border-radius: 4px;
            text-decoration: none;
        }
    </style>
</head>
<body>

<a href="{{ route('home') }}" class="back-btn">Back to Home</a>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

<div class="login-container">
    <h2>Login</h2>
    <form action="{{ route('login.user') }}" method="POST">
        @csrf
        <label for="email">Email</label><br>
        <input type="email" id="email" name="email" value="" ><br>

        <label for="password">Password</label><br>
        <input type="password" id="password" name="password" value="" ><br>

        <input type="submit" value="Login">
        <a href="{{ route('register') }}" class="register-link">Don't have an account? Register</a>
    </form>
</div>

</body>
</html>
