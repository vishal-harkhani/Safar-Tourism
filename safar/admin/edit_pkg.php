<?php
include 'admin_conn.php';
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}

// Get the package ID from the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "SELECT * FROM packages WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the package exists
    if ($result->num_rows > 0) {
        $package = $result->fetch_assoc();
    } else {
        echo "<script>alert('Package not found'); window.location.href = 'View_pkg.php';</script>";
        exit();
    }

    // Handle form submission for updating package details
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $imagePath = $package['image']; // Keep existing image unless updated

        // Handle file upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $imageTmpPath = $_FILES['image']['tmp_name'];
            $imageName = basename($_FILES['image']['name']);
            $imagePath = 'admin_img/' . $imageName; // Adjust path as needed

            // Move the uploaded file to the target directory
            if (!move_uploaded_file($imageTmpPath, $imagePath)) {
                echo "<script>alert('Error uploading the image.');</script>";
            }
        }

        // Update the package details in the database
        $update_sql = "UPDATE packages SET name = ?, description = ?, price = ?, image = ? WHERE id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ssssi", $name, $description, $price, $imagePath, $id);

        if ($update_stmt->execute()) {
            echo "<script>alert('Package details updated successfully'); window.location.href = 'View_pkg.php';</script>";
        } else {
            echo "<script>alert('Failed to update package details');</script>";
        }
    }
} else {
    echo "<script>alert('Invalid Package ID'); window.location.href = 'View_pkg.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Package</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f4ff; /* Light background */
        }
        .container {
            margin-top: 50px;
            background-color: #ffffff; /* White background */
            border: 1px solid #007bff; /* Blue border */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        h1 {
            color: #007bff; /* Blue color */
            margin-bottom: 20px;
        }
        .btn-primary {
            background-color: #007bff; /* Blue background */
            border-color: #007bff; /* Blue border */
        }
        .btn-primary:hover {
            background-color: #0056b3; /* Darker blue on hover */
            border-color: #0056b3; /* Darker blue border */
        }
        .image-preview {
            width: 150px;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Package</h1>
        <form id="editPackageForm" action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Package Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($package['name']); ?>" required>
            </div>
            <div class="form-group">
                <label for="description">Description:</label>
                <textarea class="form-control" id="description" name="description" required><?php echo htmlspecialchars($package['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($package['price']); ?>" required>
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                <br>
                <img src="<?php echo htmlspecialchars($package['image']); ?>" alt="Package Image" class="image-preview">
            </div>
            <button type="submit" class="btn btn-success">Update Package</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>