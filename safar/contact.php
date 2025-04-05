<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
        include 'header.php';
    ?>
    <div style="padding-top:70px;">
    <section id="contact-us">
    <h1>Contact Us</h1>
        <div class="con-container">
            <section class="contact">
                <div class="contact-details">
                    <h2>Get in Touch</h2>
                    <p><strong>Address:</strong> Mavdi Chowk , 150ft main road, Rajkot - Gujrat.</p>
                    <p><strong>Phone:</strong> +91 8200101421  / +91 6352589931</p>
                    <p><strong>Email:</strong> safartourism@gmail.com</p>
                    <h3>Our Location</h3>
                    <div class="map">
                        <!-- Replace the src URL with your actual map URL -->
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.042526865635!2d-122.08424968468122!3d37.42199977982516!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fbb18b8b8d151%3A0x1a4eecf929d87379!2sGoogleplex!5e0!3m2!1sen!2sus!4v1627282959390!5m2!1sen!2sus" 
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="contact-form">
                    <h2>Send Us a Message</h2>
                    <form action="admin_msg_process.php" method="post">
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject:</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Message:</label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        <a href="index.php"><button type="submit">Send Message</button></a>
                    </form>
                </div>
            </section>
        </div>
        </section>
    <?php
        include 'footer.php';
    ?>
</body>
</html>
