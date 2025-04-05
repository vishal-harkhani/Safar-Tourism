<?php 
include 'database/conn.php';
include 'login-signup.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Safar</title>
</head>
<body>
<div id="login-form">
    <div class="auth-container">
        <ul class="nav nav-tabs" id="authTabs">
            <li class="nav-item">
                <a class="nav-link active" id="login-tab" data-bs-toggle="tab" href="#login" aria-controls="login" aria-selected="true">Login</a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link" id="signup-tab" data-bs-toggle="tab" href="#signup" aria-controls="signup" aria-selected="false">Sign Up</a>
            </li>
        </ul>
        <div class="tab-content" id="authTabsContent">
            <!-- Login Form -->
            <div class="tab-pane fade show active" id="login" aria-labelledby="login-tab">
                <h1 class="text-center mt-4">Login</h1>
                <form method="POST" id="welcomeform">
                    <div class="mb-3">
                        <label for="loginuser" class="form-label">Username</label>
                        <input type="text" class="form-control" id="loginuser" name="username" placeholder="Enter your username" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" name="login" class="btn">Login</button>
                    <!-- <p class="text-center mt-3"><a href="forgot-password.php">Forgot your password?</a></p> -->
                </form>
            </div>
            <!-- Sign Up Form -->
            <div class="tab-pane fade" id="signup" aria-labelledby="signup-tab">
                <h1 class="text-center mt-4">Sign Up</h1>
                <form method="POST">
                    <div class="mb-3">
                        <label for="signupName" class="form-label">Username</label>
                        <input type="text" class="form-control" id="signupName" name="username" placeholder="Enter username" required autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="signupEmail" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label">Password</label>
                        <input type="password" class="form-control" id="signupPassword" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="mb-3">
                        <label for="signupConfirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="signupConfirmPassword" name="conf-pass" placeholder="Confirm your password" required>
                    </div>
                    <button type="submit" name="signup" class="btn btn-primary w-100">Sign Up</button>
                    <p class="text-center mt-3">Already have an account? <a href="Login.php" id="loginTabLink">Login</a></p>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>