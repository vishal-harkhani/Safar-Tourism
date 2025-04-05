<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Star Travels Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        h2 {
            color: #333;
            font-size: 2em;
            margin-bottom: 20px;
        }
        .welcome-message {
            padding:3% 5% 2% 5%;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .welcome-message h1 {
            font-size: 2em;
            margin-top: 0;
        }
        .welcome-message p {
            font-size: 1.2em;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            include 'admin_header.php';
        ?>
        <!-- Welcome Message Section -->
        <h1 style="padding:2% 0 0 2%;">Welcome to, <span style="text-transoform:uppercase;"><span style="color:orange;">S</span>afar Tourism</span> Admin Dashboard!</h1>
        <div class="welcome-message">
            <p>We are thrilled to have you manage and enhance our safari tourism services. From tracking bookings and managing tours to reviewing customer feedback, this dashboard provides you with all the tools needed to oversee our operations efficiently.</p><br>
            <p>Star Travels is dedicated to offering unforgettable safari experiences. Explore diverse safari packages, manage new and existing bookings, and ensure our customers have the adventure of a lifetime. Your role is crucial in delivering excellence and making sure every journey is extraordinary.</p><br>
            <p>Feel free to navigate through the various sections of the admin panel to get insights into recent activities and manage our offerings. If you need any assistance or have any questions, our support team is just a click away.</p>
        </div>
    </div>
</body>
</html>
