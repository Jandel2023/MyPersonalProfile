<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .login-container {
            margin-top: 100px;
        }
        .login-form {
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.3);
        }
        .form-control {
            background-color: #444;
            color: #fff;
            border: none;
        }
        .btn {
            background-color: #00ff00;
            border-color: #00ff00;
        }
    </style>
</head>
<body>
    <div class="container login-container">
        <div class="row justify-content-center">
            <div class="col-md-6 login-form">
                <h2 class="text-center mb-4">Login</h2>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-block">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
