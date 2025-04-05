<?php
session_start();

// Display error or success messages if any
if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
    $message = $_SESSION['error'];
    $alertType = 'danger'; // For error messages
    unset($_SESSION['error']);
} elseif (isset($_SESSION['success']) && !empty($_SESSION['success'])) {
    $message = $_SESSION['success'];
    $alertType = 'success'; // For success messages
    unset($_SESSION['success']);
} else {
    $message = '';
    $alertType = '';
}
?>
<?php
            include 'admin_header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Package</title>
    <link rel="stylesheet" href="css/pkg.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
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
    <div class="container">
        <h1>Add New Package</h1>
        <?php if ($message): ?>
            <div class="alert <?php echo htmlspecialchars($alertType); ?>">
                <?php echo htmlspecialchars($message); ?>
            </div>
        <?php endif; ?>
        <form id="addPackageForm" action="add_pkg.php" method="post" enctype="multipart/form-data">
            <label for="name">Package Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" required>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required>

            <button type="submit">Add Package</button>
        </form>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
