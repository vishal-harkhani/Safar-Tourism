<?php
// Database connection details
// ... (same as add_package.php)

// Process package removal
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $packageId = $_POST["package_id"]; 

    // Prepare and execute the SQL query
    $sql = "DELETE FROM packages WHERE id = '$packageId'";

    if ($conn->query($sql) === TRUE) {
        echo "Package removed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>