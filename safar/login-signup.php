<?php
include 'database/conn.php'; // Include database connection
session_start(); // Start the session

// Handle signup
if (isset($_POST['signup'])) 
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confpass = $_POST['conf-pass'];

    // Check if the password and confirm password fields match
    if ($password !== $confpass) 
    {
        echo '<script>
                alert("Passwords do not match. Please try again.");
              </script>';
    } 
    else 
    {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashedPassword);

        if ($stmt->execute()) 
        {
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $stmt->insert_id; // Assign the last inserted ID
            $_SESSION['username'] = $username;

            setcookie(session_name(), session_id(), time() + (86400 * 30), '/');
            header("Location: index.php"); 
            exit();
        } 
        else 
        {
            echo "<p class='text-center text-danger'>Error: " . $stmt->error . "</p>";
        }
        $stmt->close();
    }
}

// Handle login
if (isset($_POST['login'])) 
{
    $username = $_POST['username']; 
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) 
    {
        $user = $result->fetch_assoc();
    
        if (password_verify($password, $user['password'])) 
        {
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $user['id'];
            $_SESSION['username'] = $username;

            setcookie(session_name(), session_id(), time() + (86400 * 30), '/');
            header("Location: index.php");
            exit();
        } 
        else 
        {
            echo '<script>
                alert("Invalid email or password.");
              </script>'; 
        }
    } 
    else 
    {
        echo '<script>
                alert("Invalid email or password.");
              </script>';
    }
    $stmt->close();
}

?>