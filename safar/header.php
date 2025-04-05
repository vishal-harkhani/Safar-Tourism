<?php
session_start(); // Start the session
$isLoggedIn = isset($_SESSION['loggedin']) && $_SESSION['loggedin']; // Check if user is logged in
?>

<header>
    <div id="menu-bar" class="fas fa-bars"></div>

    <a href="#" class="logo" style="text-decoration:none;"><span>S</span>afar<h6>Tourism</h6></a>
    <nav class="navbar">
        <a href="index.php" style="text-decoration:none;">Home</a>
        <a href="package.php" style="text-decoration:none;">Packages</a>
        <a href="gallary.php" style="text-decoration:none;">Gallary</a>
        <a href="our-client.php" style="text-decoration:none;">Our Clients</a>
        <a href="about.php" style="text-decoration:none;">About Us</a>
    </nav>
    <div class="icons">
        <i class="fas" id="search-btn"></i>
        <?php if ($isLoggedIn): ?>
            <a href="logout.php" id="logout-btn"><i class="fas fa-sign-out-alt"></i></a>
            <a href="profile.php" id="profile-btn"><i class="fas fa-user-circle"></i></a> <!-- Profile link -->
        <?php else: ?>
            <i class="fas fa-user" id="login-btn"></i>
        <?php endif; ?>
    </div>
</header>

<!-- Header End -->
<!-- Login Form -->
<div class="login-form-container">
    <i class="fas fa-times" id="form-close"></i>
    <?php
        include 'login.php';
    ?>
</div>
