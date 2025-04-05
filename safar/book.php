<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php"); // Redirect to login/signup page
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safar Booking Form</title>
    <link rel="stylesheet" href="css/book.css">
</head>
<body>
    <div class="container">
        <h1>Book Your Tour</h1>
        <form action="process_booking.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phone">Phone Number:</label>
            <input type="tel" id="phone" name="phone" required>

            <label for="tour">Tour Type:</label>
            <select id="tour" name="tour" required>
                        <option hidden>--None--</option>
                        <option value="jodhpur">Agra</option>
                        <option value="goa">Auli</option>
                        <option value="auli">Coorg</option>
                        <option value="jodhpur">Dwarka</option>
                        <option value="goa">Ellora</option>
                        <option value="auli">Goa</option>
                        <option value="jodhpur">Gulmarg</option>
                        <option value="goa">Jaipur</option>
                        <option value="auli">Jaisalmer</option>
                        <option value="jodhpur">Jodhpur</option>
                        <option value="goa">Kerla</option>
                        <option value="auli">Kutch</option>
                        <option value="jodhpur">Lakshadweep</option>
                        <option value="goa">Lonaval</option>
                        <option value="auli">Madurai</option>
                        <option value="jodhpur">Manali</option>
                        <option value="goa">Mount Abu</option>
                        <option value="auli">Mumbai</option>
                        <option value="jodhpur">Ooty</option>
                        <option value="goa">Saputara</option>
                        <option value="auli">Sikim</option>
                        <option value="jodhpur">Somanath</option>
                        <option value="goa">West-Bangal</option>
                    </select>

            <label for="date">Preferred Date:</label>
            <input type="date" id="date" name="date" required>

            <input class="btn" type="submit" value="Book Now">
        </form>
    </div>
</body>
</html>
