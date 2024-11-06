<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop - Shoe Website</title>
    <link rel="stylesheet" href="/Shoes%20web/styles.css"> 

</head>
<body>
    <header>
    <header>
        <div class="logo">WearWhen</div>
        <nav>
            <a href="index.htl">Home</a>
            <a href="shop.html">Shop</a>
            <a href="wishlist.html">Wishlist</a>
            <a href="profile.html">Profile</a>
            <a href="cart.html">Cart</a>
        </nav>
    </header>

    </header>

    <!-- Filter Sidebar and Product Grid -->
    <section class="shop">
        <aside class="filter">
            <h2>Filter by</h2>
            <form>
                <label>Size</label>
                <select>
                    <option>All</option>
                    <option>7</option>
                    <option>8</option>
                    <option>9</option>
                    <!-- Add sizes as needed -->
                </select>
                <label>Color</label>
                <select>
                    <option>All</option>
                    <option>Black</option>
                    <option>White</option>
                    <!-- Add colors as needed -->
                </select>
            </form>
        </aside>

        <div class="product-grid">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "root";
            $database = "Shoes Web";

            $conn = new mysqli($servername, $username, $password, $database);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // SQL query to retrieve shoe data
            $sql = "SELECT brand, type, size, color, price, reviews, sizing, number_in_stock, shoes_link FROM Shoes";
            $result = $conn->query($sql);

            // Check if results are returned
            if ($result && $result->num_rows > 0) {
                // Process results here
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='shoe-item'>";
                    echo "<h2>" . htmlspecialchars($row['brand']) . " " . htmlspecialchars($row['type']) . "</h2>";
                    echo "<p><strong>Size:</strong> " . htmlspecialchars($row['size']) . "</p>";
                    echo "<p><strong>Color:</strong> " . htmlspecialchars($row['color']) . "</p>";
                    echo "<p><strong>Price:</strong> $" . htmlspecialchars($row['price']) . "</p>";
                    echo "<p><strong>Reviews:</strong> " . htmlspecialchars($row['reviews']) . "</p>";
                    echo "<p><strong>Sizing:</strong> " . htmlspecialchars($row['sizing']) . "</p>";
                    echo "<p><strong>In Stock:</strong> " . htmlspecialchars($row['number_in_stock']) . "</p>";
                    
                    // Adjust the image path based on where the image is stored
                    if (!empty($row['shoes_link'])) {
                        // Using htmlspecialchars for security
                        $imagePath = "http://localhost:8888/" . htmlspecialchars($row['shoes_link']);
                        echo "<img src='$imagePath' alt='" . htmlspecialchars($row['brand'] . " " . $row['type']) . "' style='width:200px; height:auto;'/>";  
                    } else {
                        echo "<p>No image available</p>";
                    }

                   
                } else {
                echo "No results found.";
            }

            // Close the database connection
            $conn->close();
            ?>
        </div>
    </section>

    <footer>
    <p>&copy; 2024 ShoeBrand. All rights reserved.</p>
        <nav>
            <a href="about.html">About Us</a>
            <a href="contact.html">Contact</a>
            <a href="faq.html">FAQ</a>
        </nav>
    </footer>
</body>
</html>
