<?php
include 'admin_conn.php'; // Ensure this file contains the correct database connection details
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Get form data
$packageName = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

// Handle image upload
$targetDir = "admin_img/"; // Directory where images will be stored
$targetFile = $targetDir . basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

// Check if image file is an actual image
$check = getimagesize($_FILES["image"]["tmp_name"]);
if ($check === false) {
    die("File is not an image.");
}

// Check file size (optional - here limiting to 5MB)
if ($_FILES["image"]["size"] > 5000000) {
    die("Sorry, your file is too large.");
}

// Allow certain file formats
if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
    die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
}

// Move the uploaded file to the target directory
if (!move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
    die("Sorry, there was an error uploading your file.");
}

// Insert package into the database with additional fields
$sql = "INSERT INTO packages (name, description, price, image) VALUES ('$packageName', '$description', '$price', '$targetFile')";

if ($conn->query($sql) === TRUE) {
    echo "New package added successfully.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();

// Redirect back to packages view
header("Location: View_pkg.php");
exit();
?>