<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #000;
            color: #fff;
        }
        .signup-container {
            margin-top: 100px;
        }
        .signup-form {
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
    <div class="container signup-container">
        <div class="row justify-content-center">
            <div class="col-md-6 signup-form">
                <h2 class="text-center mb-4">Sign-up</h2>
                <form action="signup.php" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-block">Sign-up</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
