<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <title>Travel Gallery</title>
    <style>
/* Existing CSS */
    body {
            background-color: #f1f3f5;
            color: black;
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 50px;
        }
        img{
            height:70%;
            width:100%;
            border-radius:6px;
        }
        .image-container {
            position: relative;
            width: 350px;
            height: 250px;
            overflow: hidden;
            border-radius: 10px;
            margin-bottom: 20px;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure images fit the container */
        }

        .image-container figcaption {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
            padding: 5px;
            box-sizing: border-box;
            font-size: 0.9em;
        }

        .social-icons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .social-icons a {
            margin: 0 10px;
            color: white;
            text-decoration: none;
        }

        /* Full-Screen Overlay Styles */
        .fullscreen-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .fullscreen-image {
            max-width: 500px;
            max-height:500px;
            object-fit:400px; /* Fit within the viewport */
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            font-size: 2em;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        include 'header.php';
    ?>
    <div style="padding-top:70px;">

    <div class="container">
        <div class="image-container">
            <img src="images/packages/kutch.jpg" alt ="Kutch">

        </div>
        <div class="image-container">
            <img src="images/packages/kerla.jpg" alt ="Kerla">
            
        </div>
        <div class="image-container">
            <img src="images/packages/agra.jpg" alt ="Agra">
           
        </div>
        
    </div>
    <div class="container">
        <div class="image-container">
            <img src="images/packages/ooty.webp" alt ="Ooty">
            
        </div>
        <div class="image-container">
            <img src="images/packages/goa.jpg" alt ="Goa">
           
        </div>
        <div class="image-container">
            <img src="images/packages/gulmarg.jpg" alt ="Gulmarg">
         
        </div>
        
    </div>
   
    <div class="container">
        <div class="image-container">
            <img src="images/packages/lakd.jpg" alt ="Lakshadweep">
           
        </div>
        <div class="image-container">
            <img src="images/packages/lonavala.jpg" alt ="Lonavala">
          
        </div>
        <div class="image-container">
            <img src="images/packages/manali.webp" alt ="Manali">
        
        </div>
        
    </div>
   
    <div class="container">
        <div class="image-container">
            <img src="images/packages/madurai.jpg" alt ="Madurai">
          
        </div>
        <div class="image-container">
            <img src="images/packages/jai.jpg" alt ="Jaipur">
          
        </div>
        <div class="image-container">
            <img src="images/packages/jaisalmer.jpg" alt ="Jaisalmer">
            
        </div>
        
    </div>

    
    <div class="container">
        <div class="image-container">
            <img src="images/packages/jodhpur.jpg" alt ="Jodhpur">
          
        </div>
        <div class="image-container">
            <img src="images/packages/auli.webp" alt ="Auli">
          
        </div>
        <div class="image-container">
            <img src="images/packages/ellora.jpg" alt ="Ellora Caves">
            
        </div>
        
    </div>
    
    <div class="container">
        <div class="image-container">
            <img src="images/packages/coorg.jpg" alt ="Coorg">
          
        </div>
        <div class="image-container">
            <img src="images/packages/saputara.png" alt ="Saputara">
          
        </div>
        <div class="image-container">
            <img src="images/packages/w-bangal.jpg" alt ="West-Bangal">
            
        </div>
        
    </div>

    
    <div class="container">
        <div class="image-container">
            <img src="images/packages/siki.jpg" alt ="Sikkim">
          
        </div>
        <div class="image-container">
            <img src="images/packages/somnath.jpg" alt ="Somnath">
          
        </div>
        <div class="image-container">
            <img src="images/packages/Dwarka.jpg" alt ="Dwarka">
            
        </div>
        
    </div>
    <?php
        include 'footer.php';
    ?>

    <!-- Full-screen overlay -->
    <div id="fullscreenOverlay" class="fullscreen-overlay">
        <span id="closeBtn" class="close-btn">&times;</span>
        <img id="fullscreenImage" class="fullscreen-image" src="" alt="Full-screen view">
    </div>

    <script>
        // JavaScript to add captions dynamically
        document.addEventListener('DOMContentLoaded', () => {
            const imageContainers = document.querySelectorAll('.image-container');

            imageContainers.forEach(container => {
                const img = container.querySelector('img');
                const caption = document.createElement('figcaption');
                caption.textContent = img.alt; // Set caption text to the image's alt attribute
                container.appendChild(caption);
            });
        });

        // JavaScript for full-screen view functionality
        const overlay = document.getElementById('fullscreenOverlay');
        const fullscreenImage = document.getElementById('fullscreenImage');
        const closeBtn = document.getElementById('closeBtn');

        function openFullscreen(imgSrc) {
            fullscreenImage.src = imgSrc;
            overlay.style.display = 'flex';
        }

        function closeFullscreen() {
            overlay.style.display = 'none';
        }

        document.querySelectorAll('.image-container img').forEach(img => {
            img.addEventListener('click', () => {
                openFullscreen(img.src);
            });
        });

        closeBtn.addEventListener('click', closeFullscreen);
        overlay.addEventListener('click', (event) => {
            if (event.target === overlay) {
                closeFullscreen();
            }
        });
    </script>
    <!-- JS file link -->
    <script src="js/script.js"></script>
</body>
</html>
