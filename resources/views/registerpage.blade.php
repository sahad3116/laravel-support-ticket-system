<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: url('https://source.unsplash.com/1600x900/?support,technology') no-repeat center center fixed;
            background-size: cover;
            display: flex;
            flex-direction: column;
            height: 100vh;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        .register-form {
            background: rgba(255, 255, 255, 0.85); 
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.3);
            width: 320px;
        }

        .register-form h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .register-form input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .register-form button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            margin-top: 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .register-form button:hover {
            background-color: #45a049;
        }

        .alert {
            width: 320px;
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

        .invalid-feedback {
            color: red;
            font-size: 0.875em;
            margin-top: 0.25rem;
        }

        .back-link,
        .login-link {
            color: #007bff;
            text-decoration: none;
            margin-top: 10px;
            display: inline-block;
            text-align: center;
            width: 100%;
        }

        .back-link:hover,
        .login-link:hover {
            text-decoration: underline;
        }

        .top-link {
            position: absolute;
            top: 20px;
            left: 20px;
            background: #fff;
            padding: 6px 12px;
            border-radius: 5px;
            text-decoration: none;
            color: #000;
            font-weight: bold;
            box-shadow: 0 2px 6px rgba(0,0,0,0.2);
        }
    </style>
</head>
<body>

    <a href="{{ route('home') }}" class="top-link">Back to Home</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('register.user') }}" method="POST" class="register-form">
        @csrf
        <h2>Register</h2>

        <div class="form-group mb-3">
            <input type="text" name="name" placeholder="Full Name"
                   class="form-control @error('name') is-invalid @enderror"
                   value="">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <input type="email" name="email" placeholder="Email Address"
                   class="form-control @error('email') is-invalid @enderror"
                   value="">
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="form-group mb-3">
            <input type="password" name="password" placeholder="Password"
                   class="form-control @error('password') is-invalid @enderror">
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit">Register Account</button>
        <a href="{{ route('login') }}" class="login-link">Already have an account? Login here.</a>
    </form>
</body>
</html>
