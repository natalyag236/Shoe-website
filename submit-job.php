<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and trim user inputs
    $firstName = htmlspecialchars(trim($_POST['first-name']));
    $lastName = htmlspecialchars(trim($_POST['last-name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $homeAddress = htmlspecialchars(trim($_POST['home-address']));
    $shoeSize = (int) htmlspecialchars(trim($_POST['shoe-size']));
    $sizingGender = htmlspecialchars(trim($_POST['sizing-gender']));

    // Check for empty required fields
    if (empty($firstName) || empty($lastName) || empty($email) || empty($homeAddress) || empty($shoeSize) || empty($sizingGender)) {
        echo "<h4 style='color: red;'>All required fields must be filled.</h4>";
        exit();
    }

    // Database connection parameters
    $servername = "localhost";
    $username = "root";  // Default username for MAMP
    $password = "root";  // Default password for MAMP
    $dbname = "customers_db"; // Your database name

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check if the connection was successful
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepared SQL query to insert the form data into the 'customers' table
    $stmt = $conn->prepare("INSERT INTO CUSTOMERS (first_name, last_name, email, home_address, shoe_size, sizing_gender) VALUES (?, ?, ?, ?, ?, ?)");

    // Bind parameters to the SQL query
    $stmt->bind_param($firstName, $lastName, $email, $homeAddress, $shoeSize, $sizingGender);

    // Execute the query and check if it was successful
    if ($stmt->execute()) {
        // If successful, display a success message
        echo "<h4 style='color: green;'>Customer registered successfully!</h4>";
    } else {
        // If there was an error, display the error message
        echo "<h4 style='color: red;'>Error: " . $stmt->error . "</h4>";
    }

    // Close the statement and the connection
    $stmt->close();
    $conn->close();
}
?>
