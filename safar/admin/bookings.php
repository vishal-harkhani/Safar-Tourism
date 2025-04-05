<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Management - Star Travels</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        h2 {
            color: #333;
            font-size: 2em;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            include 'admin_header.php';
            include 'admin_conn.php'; // Include database configuration

            // Fetch booking data
            $sql = "SELECT * FROM bookings ORDER BY booking_id DESC"; // Order by booking_id
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo '<h2>Booking Details</h2>';
                echo '<table>';
                echo '<thead>';
                echo '<tr>';
                echo '<th>Booking ID</th>';
                echo '<th>Name</th>';
                echo '<th>Email</th>';
                echo '<th>Phone</th>';
                echo '<th>Tour Type</th>';
                echo '<th>Preferred Date</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row["booking_id"] . '</td>';
                    echo '<td>' . $row["name"] . '</td>';
                    echo '<td>' . $row["email"] . '</td>';
                    echo '<td>' . $row["phone"] . '</td>';
                    echo '<td>' . $row["tour"] . '</td>';
                    echo '<td>' . $row["date"] . '</td>';
                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            } else {
                echo '<p>No bookings found.</p>';
            }

            // Close connection
            $conn->close();
        ?>
    </div>
</body>
</html>
