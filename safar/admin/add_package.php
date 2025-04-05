<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "safar_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process package addition (ensure secure input handling!)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $image = $_POST["image"]; 
    $description = $_POST["description"]; 
    $rating = $_POST["rating"]; 
    $price = $_POST["price"];

    // Prepare and execute the SQL query
    $sql = "INSERT INTO packages (name, image, description, rating, price) VALUES ('$name', '$image', '$description', '$rating', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Package added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>