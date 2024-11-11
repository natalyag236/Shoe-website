<?php
$conn = new mysqli("localhost", "root", "root", "Shoes Web");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['shoe_id'])) {
    $shoe_id = $_POST['shoe_id'];
    $quantity = 1;

    $check_sql = "SELECT * FROM Cart WHERE shoe_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("i", $shoe_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $update_sql = "UPDATE Cart SET quantity = quantity + ? WHERE shoe_id = ?";
        $update_stmt = $conn->prepare($update_sql);
        $update_stmt->bind_param("ii", $quantity, $shoe_id);
        $update_stmt->execute();
    } else {
        $insert_sql = "INSERT INTO Cart (shoe_id, quantity) VALUES (?, ?)";
        $insert_stmt = $conn->prepare($insert_sql);
        $insert_stmt->bind_param("ii", $shoe_id, $quantity);
        $insert_stmt->execute();
    }

    header("Location: cart.php");
    exit();
} else {
    echo "No shoe selected to add to cart.";
}

$conn->close();
?>
