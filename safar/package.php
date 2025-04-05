<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tourism Packages</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- Add Font Awesome CSS if needed -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
<?php
    include 'header.php';
    include 'admin/admin_conn.php'; // Make sure this file has the correct path to your database connection

    // Fetch packages from the database
    $sql = "SELECT * FROM packages";
    $result = $conn->query($sql);
?>
<div style="padding-top:40px;">
    <section class="po-pl" id="po-pl">
        <h1 class="heading">
            <span>T</span>
            <span>o</span>
            <span>p</span>
            <span class="space"></span>
            <span>P</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1>
        <div class="box-container">
            <?php
            if ($result->num_rows > 0) {
                // Output data for each row
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="box">';
                    echo '<img src="' . htmlspecialchars($row["image"]) . '" alt="' . htmlspecialchars($row["name"]) . '">';
                    echo '<div class="content">';
                    echo '<h3><i class="fas fa-map-marker-alt"></i>' . htmlspecialchars($row["name"]) . '</h3>';
                    echo '<p>' . htmlspecialchars($row["description"]) . '</p>';
                    echo '<div class="stars">';
                    
                    // Check if rating key exists and is numeric
                    $rating = isset($row["rating"]) ? (int)$row["rating"] : 0;
                    for ($i = 0; $i < 5; $i++) {
                        if ($i < $rating) {
                            echo '<i class="fas fa-star"></i>';
                        } else {
                            echo '<i class="far fa-star"></i>';
                        }
                    }
                    echo '</div>';
                    
                    // Check if price and original_price keys exist
                    $price = isset($row["price"]) ? htmlspecialchars($row["price"]) : 'N/A';
                    $original_price = isset($row["original_price"]) ? htmlspecialchars($row["original_price"]) : 'N/A';
                    
                    echo '<div class="price">&#8360; ' . $price . ' <span>&#8360;' . $original_price . '</span></div>';
                    echo '<a href="book.php" class="btn">Book Now</a>';
                    echo '</div>';
                    echo '</div>';
                }
            } 
            ?>
            <div class="box">
                <img src="images/packages/kutch.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Kutch</h3>
                    <p>Kutch is an erstwhile princely state of India holding onto its grandeur nature from the past. </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/kerla.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Kerla</h3>
                    <p>Kerala, known as "God's Own Country," features tranquil backwaters and lush landscapes.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>
            
            <div class="box">
                <img src="images/packages/lakd.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Lakshadweep</h3>
                    <p>Lakshadweep: Pristine coral atolls with clear waters, white sands, and excellent snorkeling.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/jodhpur.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Jodhpur</h3>
                    <p>Jodhpur, the second largest city in Rajasthan is popularly known as the Blue City. </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/coorg.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Coorg</h3>
                    <p>Coorg is an enchanting land of misty hills, lush green valleys, and cascading waterfalls</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/manali.webp" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Manali</h3>
                    <p>Manali will take your breath away dventure experiences in the heart of Himalayas.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

        </div>
    </section>
    <!-- 2 section -->
    <section class="po-pl" id="po-pl">
        <h1 class="heading">
            <span>s</span>
            <span>e</span>
            <span>a</span>
            <span>s</span>
            <span>o</span>
            <span>n</span>
            <span class="space"></span>
            <span>P</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1>
        <h1 class="heading">
        <span>w</span>
        <span>i</span>
        <span>n</span>
        <span>t</span>
        <span>e</span>
        <span>r</span>
        </h1>
        <div class="box-container">

            <div class="box">
                <img src="images/packages/kutch.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Kutch</h3>
                    <p>Kutch is an erstwhile princely state of India holding onto its grandeur nature from the past.  </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/w-bangal.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>West-Bengal</h3>
                    <p>West Bengal is a state in eastern India, between the Himalayas and the Bay of Bengal.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500</div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>
            
            <div class="box">
                <img src="images/packages/ooty.webp" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Ooty</h3>
                    <p>Ooty, the "Queen of Hill Stations," offers picturesque tea gardens, cool climate and viewpoints.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/manali.webp" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Manali</h3>
                    <p>Manali will take your breath away dventure experiences in the heart of Himalayas.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/gulmarg.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Gulmarg</h3>
                    <p>Gulmarg literally means “Meadow of flowers” its stunning landscapes and excellent skiing opportunities.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

        </div>
        <h1 class="heading">
        <span>s</span>
        <span>u</span>
        <span>m</span>
        <span>m</span>
        <span>e</span>
        <span>r</span>
        </h1>
        <div class="box-container">

            <div class="box">
                <img src="images/packages/auli.webp" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Auli</h3>
                    <p>Auli: A picturesque hill station renowned for its pristine slopes and excellent skiing conditions. </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/mb.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Mount Abu</h3>
                    <p>Mount Abu: Rajasthan's only hill station, offering cool climate, scenic views, and historic temples.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500</div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>
            
            <div class="box">
                <img src="images/packages/siki.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Sikkim</h3>
                    <p>Sikkim: A serene Himalayan state with stunning landscapes, vibrant monasteries, and diverse flora and fauna.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/jaisalmer.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Jaisalmer</h3>
                    <p>The dramatic desert fortress of Jaisalmer is an exotic city in Rajasthan’s great Thar Desert.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/jodhpur.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Jodhpur</h3>
                    <p>Jodhpur, the second largest city in Rajasthan is popularly known as the Blue City. </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

        </div>
        <h1 class="heading">
        <span>m</span>
        <span>o</span>
        <span>n</span>
        <span>s</span>
        <span>o</span>
        <span>o</span>
        <span>n</span>
        </h1>
        <div class="box-container">

            <div class="box">
                <img src="images/packages/saputara.png" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Saputara</h3>
                    <p>Saputara is a quaint little hill station in the Dang district of Gujarat. </p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/kerla.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Kerla</h3>
                    <p>Kerala, known as "God's Own Country," features tranquil backwaters and lush landscapes.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500</div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>
            
            <div class="box">
                <img src="images/packages/ellora.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Ellora Caves</h3>
                    <p>Ellora Caves: Ancient rock-cut temples showcasing stunning architecture and intricate carvings.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/lonavala.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Lonavala</h3>
                    <p>Lonavala: Popular hill station with lush greenery, scenic waterfalls, and charming viewpoints.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

            <div class="box">
                <img src="images/packages/coorg.jpg" alt="">
                <div class="content">
                    <h3><i class="fas fa-map-marker-alt"></i>Coorg</h3>
                    <p>Coorg is an enchanting land of misty hills, lush green valleys, and cascading waterfalls.</p>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <div class="price">&#8360; 3,500 <span>&#8360;9,000</span></div>
                    <a href="book.php" class="btn">Book Now</a>
                </div>
            </div>

        </div>
    </section> 
    <?php
        include 'footer.php';
    ?>
    <!-- JS file link -->
    <script src="js/script.js"></script>
</body>
</html>
