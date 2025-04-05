<?php
include 'config.php'; // Include database connection
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login_signup.php"); // Redirect to login/signup page
    exit();
}

// Retrieve payment data
$booking_id = $_POST['booking_id'];
$card_number = $_POST['card_number'];
$expiry_date = $_POST['expiry_date'];
$cvv = $_POST['cvv'];

// Simulate payment processing
$payment_successful = true; // Simulate a successful payment

$user_id = $_SESSION['id']; // Assuming user is logged in

if ($payment_successful) {
    // Payment successful, insert into database
    $stmt = $conn->prepare("INSERT INTO payments (user_id, booking_id, card_number, expiry_date, cvv, payment_status) VALUES (?, ?, ?, ?, ?, ?)");
    $status = 'Success'; // Set payment status
    $stmt->bind_param("issssi", $user_id, $booking_id, $card_number, $expiry_date, $cvv, $status);

    if ($stmt->execute()) {
        // HTML output for success
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Payment Result</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </head>
        <body>
            <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="paymentModalLabel">Payment Status</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <h1 class="text-success">Payment Successful!</h1>
                            <p>Your payment for Booking ID: <strong><?php echo htmlspecialchars($booking_id); ?></strong> has been processed successfully.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                $(document).ready(function() {
                    // Show the modal
                    $('#paymentModal').modal('show');

                    // Redirect to index page after 5 seconds
                    setTimeout(function() {
                        window.location.href = 'index.php'; // Change to your index page
                    }, 5000);
                });
            </script>
        </body>
        </html>
        <?php
    } else {
        // Handle database insertion error
        echo "<h1>Payment Failed!</h1>";
        echo "<p>There was an error processing your payment. Please try again.</p>";
    }
} else {
    // Payment failed, display error message
    echo "<h1>Payment Failed!</h1>";
    echo "<p>There was an error processing your payment. Please try again.</p>";
}
?>