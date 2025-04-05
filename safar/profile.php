<?php
include 'database/conn.php'; // Include database connection
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect to login page if not logged in
    exit();
}

// Fetch user information
$userId = $_SESSION['id'];
$stmt = $conn->prepare("SELECT username, email FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
    exit();
}

// Handle logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 3600, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
    }

    header("Location: login.php"); // Redirect to login page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap');

        body {
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Hide scrollbar for iframe */
        }
        .background-iframe {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
            opacity: 0.5; /* Adjust for transparency */
            z-index: -1; /* Place it behind other content */
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff; /* Semi-transparent white background */
            color: #333;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            position: relative; /* Ensure it sits above the iframe */
            z-index: 1;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: orange;
        }
        .user-info {
            margin-bottom: 30px;
            padding: 15px;
            background: #f4f4f4;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .user-info p {
            margin: 10px 0;
            font-size: 18px;
        }
        .back-logo i {
            font-size: 25px;
            color: orange;
            cursor: pointer;
            transition: transform 0.3s;
        }
        .back-logo i:hover {
            transform: scale(1.1);
        }
        button {
            margin-left:40%;
            padding: 10px 18px;
            background: orange;
            color: white;
            border: 5px solid orange;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.5s;
        }
        button:hover {
            color:orange;
            background:none;
        }
    </style>
</head>
<body>
    <iframe class="background-iframe" src="index.php"></iframe>
    <div class="container">
        <div class="back-logo">
            <a href="index.php"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>User Profile</h1>
        <div class="user-info">
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        </div>
        <form method="POST" action="logout.php">
            <button type="submit" name="logout">Logout</button>
        </form>
    </div>
</body>
</html>
