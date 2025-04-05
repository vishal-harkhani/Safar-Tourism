<?php
// admin_messages.php

$servername = "localhost";
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$dbname = "safar_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to get messages
$sql = "SELECT id, name, email, subject, message, created_at FROM messages";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Messages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 16px;
            text-align: left;
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        table th {
            background-color: #007bff;
            color:#fff;
        }

        table img {
            border-radius: 5px;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .container {
            padding: 20px;
        }

        .alert {
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 5px;
            color: #fff;
            text-align: center;
        }

        .alert.success {
            background-color: #28a745; /* Green */
        }

        .alert.danger {
            background-color: #dc3545; /* Red */
        }    
    </style>
</head>
<body>
        <?php
            include 'admin_header.php';
        ?>
    <h1>Admin Messages</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['subject']}</td>
                            <td>{$row['message']}</td>
                            <td>{$row['created_at']}</td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='6'>No messages found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php
// Close the connection
$conn->close();
?>
