<?php
include 'config.php'; // Include database configuration
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login_signup.php"); // Redirect to login/signup page
    exit();
}

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$tour = $_POST['tour'];
$date = $_POST['date'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO bookings (name, email, phone, tour, date) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $name, $email, $phone, $tour, $date);

// Execute the query
if ($stmt->execute()) {
    // Booking successful, redirect to payment form with booking ID
    $booking_id = $stmt->insert_id; // Get the last inserted ID
    header("Location: payment_form.php?booking_id=$booking_id&name=" . urlencode($name));
    exit();
} else {
    // Error, output JavaScript to show an alert with the error message
    echo "<script>
            alert('Error: " . $stmt->error . "');
            window.location.href = 'booking_form.php';
          </script>";
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>