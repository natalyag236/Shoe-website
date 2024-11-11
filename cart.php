<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - Shoe Website</title>
    <link rel="stylesheet" href="/Shoes%20web/styles.css"> 
</head>
<body>
    <header>
        <div class="logo">WearWhen</div>
        <nav>
            <a href="index.html">Home</a>
            <a href="shop.php">Shop</a>
            <a href="wishlist.html">Wishlist</a>
            <a href="profile.html">Profile</a>
            <a href="cart.php">Cart</a>
        </nav>
    </header>

    <section class="checkout-form">
    <h2>Customer Information</h2>
    <form action="postAction.php" method="POST">
    <div class="form-group">
        <label for="fname">First Name:</label>
        <input type="text" id="fname" name="fname" maxlength="20" required>
    </div>
    <br><br>


    <div class="form-group">
        <label for="lname">Last Name:</label>
        <input type="text" id="lname" name="lname" maxlength="20" required>
    </div>
    <br><br>


    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" maxlength="50" required>
    </div>
    <br><br>


    <div class="form-group">
        <label for="address">Home Address:</label>
        <textarea id="address" name="home_address" rows="3" maxlength="75" required></textarea>
    </div>
    <br><br>

    <div class="form-group">
        <label for="cardnum">Card Number:</label>
        <input type="text" id="cardnum" name="card_number" maxlength="16" required>
    </div>
    <br><br>

    <div class="form-group">
        <label for="secureCode">Security Code:</label>
        <input type="text" id="secureCode" name="security_code" maxlength="4" required>
    </div>
    <br><br>

    <div class="form-group">
        <label for="phonenum">Phone Number:</label>
        <input type="text" id="phonenum" name="phone_number" maxlength="10" required>
    </div>
    <br><br>

    <label for="sizing">Sizing</label>
    <select id="sizing" name="sizing_gender" required>
        <option value="M">Mens</option>
        <option value="W">Womens</option>
        <option value="K">Kids</option>
    </select>
    <br><br>

    <label for="size">Size</label><br>
    <select id="size" name="shoe_size" required>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
    </select>
    <br><br>

    <button type="submit" class="submit-btn">Submit</button>
</form>

    </section>

    <section class="cart">
        <h2>Your Cart</h2>
        
        <div class="cart-items">
            <?php
            $conn = new mysqli("localhost", "root", "root", "Shoes Web");

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT Shoes.brand, Shoes.type, Shoes.size, Shoes.color, Shoes.price, Shoes.shoes_link, Cart.quantity 
                    FROM Cart 
                    JOIN Shoes ON Cart.shoe_id = Shoes.shoe_id";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div class='cart-item'>";
                    echo "<h3>" . htmlspecialchars($row['brand']) . " " . htmlspecialchars($row['type']) . "</h3>";
                    echo "<p>Size: " . htmlspecialchars($row['size']) . "</p>";
                    echo "<p>Color: " . htmlspecialchars($row['color']) . "</p>";
                    echo "<p>Price: $" . htmlspecialchars($row['price']) . "</p>";
                    echo "<p>Quantity: " . htmlspecialchars($row['quantity']) . "</p>";

                    if (!empty($row['shoes_link'])) {
                        $imagePath = "http://localhost:8888/" . htmlspecialchars($row['shoes_link']);
                        echo "<img src='$imagePath' alt='" . htmlspecialchars($row['brand'] . " " . $row['type']) . "' style='width:150px; height:auto;'/>";
                    } else {
                        echo "<p>No image available</p>";
                    }

                    echo "</div><hr>";
                }
            } else {
                echo "<p>Your cart is empty.</p>";
            }

            $conn->close();
            ?>
        </div>
    </section>
</body>
</html>
