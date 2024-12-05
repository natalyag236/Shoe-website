<?php


$servername = '127.0.0.1:3307';
$username = 'favour';
$password = '1234';
$dbname = 'customer_db';
echo "<br>";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all orders
$query = "SELECT wishlist.datetime, shoes.shoe_id, shoes.brand,shoes.color, shoes.type, shoes.price, shoes.image_path
FROM wishlist
JOIN shoes ON wishlist.shoe_id = shoes.shoe_id";
$result = $conn->query($query);

if (!$result) {
    die("Query failed: " . $conn->error);
}

$wishlists = []; // Array to store orders

// Fetch all orders and store in $orders array
while ($row = $result->fetch_assoc()) {
    $wishlists[] = $row;
}
