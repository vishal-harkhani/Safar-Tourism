<?php
session_start();

// Replace with your own username and password
$admin_username = "Vishal";
$admin_password = "vishal@27";

$admin_username_1 = "Prakash";
$admin_password_1 = "prakash@27";

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check credentials
    if (($username == $admin_username && $password == $admin_password) || ($username == $admin_username_1 && $password == $admin_password_1)) {
        $_SESSION['admin_logged_in'] = true;
        setcookie(session_name(), session_id(), time() + (86400 * 30), '/');
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        #login-form {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }
        .form-label {
            font-weight: bold;
            color: #343a40;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Admin Login</title>
</head>
<body>
    <div id="login-form">
        <div class="auth-container">
            <div class="tab-pane fade show active" id="login" aria-labelledby="login-tab">
                <h1 class="text-center mt-4">Admin Login</h1>
                <form action="admin_login.php" method="POST">
                    <div>
                        <label for="loginuser" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Admin username" required autofocus>
                    </div>
                    <div class="mt-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Admin password" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100 mt-4">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
