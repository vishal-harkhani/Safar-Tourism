<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login_signup.php"); // Redirect to login/signup page
    exit();
}

$booking_id = $_GET['booking_id'];
$name = $_GET['name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 500px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        p {
            text-align: center;
            color: #666;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #0056b3;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #666;
        }
    </style>
    <script>
        function validateForm() {
            const cardNumber = document.getElementById('card_number').value;
            const expiryDate = document.getElementById('expiry_date').value;
            const cvv = document.getElementById('cvv').value;

            // Validate card number (16 digits)
            if (!/^\d{16}$/.test(cardNumber)) {
                alert('Please enter a valid card number (16 digits).');
                return false;
            }

            // Validate expiry date (MM/YY)
            const expiryParts = expiryDate.split('/');
            if (expiryParts.length !== 2 || !/^\d{2}$/.test(expiryParts[0]) || !/^\d{2}$/.test(expiryParts[1])) {
                alert('Please enter a valid expiry date (MM/YY).');
                return false;
            }

            // Validate CVV (3 or 4 digits)
            if (!/^\d{3,4}$/.test(cvv)) {
                alert('Please enter a valid CVV (3 or 4 digits).');
                return false;
            }

            return true; // All validations passed
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Payment for Booking ID: <?php echo htmlspecialchars($booking_id); ?></h1>
        <p>Name: <?php echo htmlspecialchars($name); ?></p>
        <form action="process_payment.php" method="POST" onsubmit="return validateForm()">
            <input type="hidden" name="booking_id" value="<?php echo htmlspecialchars($booking_id); ?>">
            <div class="form-group">
                <input type="text" id="card_number" name="card_number" placeholder="Card Number" maxlength="16" required>
            </div>
            <div class="form-group">
                <input type="text" id="expiry_date" name="expiry_date" placeholder="Expiry Date (MM/YY)" maxlength="5" required>
            </div>
            <div class="form-group">
                <input type="text" id="cvv" name="cvv" placeholder="CVV" maxlength="4" required>
            </div>
            <button type="submit">Pay Now</button>
        </form>
        <div class="footer">
            <p>Secure payment processing powered by <i class="fab fa-cc-visa"></i> <i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-paypal"></i></p>
        </div>
    </div>
</body>
</html>