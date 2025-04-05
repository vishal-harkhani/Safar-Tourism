<?php
session_start();
session_unset(); // Clear all session variables
session_destroy(); // Destroy the session

// Delete the session cookie, if it exists
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 3600, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

header("Location: index.php"); // Redirect to home page or login page
exit();
?>
