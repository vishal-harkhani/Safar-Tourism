<?php
include 'admin_conn.php'; // Ensure this file contains the database connection details
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Query to fetch all packages from the database
$sql = "SELECT * FROM packages";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Packages</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
        }
        .container {
            padding: 20px;
            border-radius: 10px;
            background-color: white; /* White background for content */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        .card-header-custom {
            background-color: #007bff; /* Blue background for header */
            color: white;
        }
        .table {
            background-color: #e7f1ff; /* Light blue background for table */
        }
        .table th {
            background-color: #007bff; /* Blue header */
            color: white;
        }
        .table img {
            border-radius: 5px; /* Rounded corners for images */
        }
        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include 'admin_header.php'; ?>

    <div class="container mt-5">
        <h1 class="text-center">View Packages</h1>

        <?php
        // Display success or error messages
        if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
            echo '<div class="alert alert-danger">' . htmlspecialchars($_SESSION['error']) . '</div>';
            unset($_SESSION['error']);
        } elseif (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
            echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['success']) . '</div>';
            unset($_SESSION['success']);
        }
        ?>

        <div class="card card-custom text-white">
            <div class="card-header card-header-custom text-center">
                <h3>Package List</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>Package Name</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                        ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($row["name"]); ?></td>
                                        <td><?php echo htmlspecialchars($row["description"]); ?></td>
                                        <td>&#8360; <?php echo htmlspecialchars($row["price"]); ?></td>
                                        <td>
                                            <img src="<?php echo $row['image']; ?>" alt="Package Image" style="width: 100px; height: auto;">
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="edit_pkg.php?id=<?php echo urlencode($row["id"]); ?>" class="btn btn-sm btn-primary">Edit</a>
                                                <a href="delete_pkg.php?id=<?php echo urlencode($row["id"]); ?>" class="btn btn-sm btn-danger" onclick='return confirm("Are you sure you want to delete this package?");'>Delete</a>
                                            </div>
                                        </td>
                                    </tr>
                        <?php
                                }
                            } else {
                                echo "<tr><td colspan='5' class='text-center'><h3>No packages found</h3></td></tr>";
                            }
                        ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
