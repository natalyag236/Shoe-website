<?php
    // Display the data from the form for debugging purposes
    echo "Your input has been submitted <br> ";
    echo "______________________________________________________<br>";

    // Get POST data and echo it for debugging
    $first_name = isset($_POST["fname"]) ? $_POST["fname"] : "";
    echo "Customer's First Name: " . htmlspecialchars($first_name) . "<br>";

    $last_name = isset($_POST["lname"]) ? $_POST["lname"] : "";
    echo "Customer's Last Name: " . htmlspecialchars($last_name) . "<br>";

    $email = isset($_POST["email"]) ? $_POST["email"] : "";
    echo "Customer's Email: " . htmlspecialchars($email) . "<br>";

    $address = isset($_POST["home_address"]) ? $_POST["home_address"] : "";
    echo "Customer's Home Address: " . htmlspecialchars($address) . "<br>";

    $shoe_size = isset($_POST["shoe_size"]) && is_numeric($_POST["shoe_size"]) ? (int) $_POST["shoe_size"] : null;
    echo "Customer's Shoe Size: " . htmlspecialchars($shoe_size) . "<br>";

    $gender = isset($_POST["sizing_gender"]) ? $_POST["sizing_gender"] : "";
    echo "Gender: " . htmlspecialchars($gender) . "<br>";

    $card_number = isset($_POST["card_number"]) ? $_POST["card_number"] : "";
    echo "Card Number: " . htmlspecialchars($card_number) . "<br>";

    $security_code = isset($_POST["security_code"]) ? $_POST["security_code"] : "";
    echo "Security Code: " . htmlspecialchars($security_code) . "<br>";

    $phone_number = isset($_POST["phone_number"]) ? $_POST["phone_number"] : "";
    echo "Phone Number: " . htmlspecialchars($phone_number) . "<br>";

    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "root";  // MAMP default for Mac
    $dbname = "Shoes web";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if required fields are empty
        if (empty($shoe_size) || empty($first_name) || empty($last_name) || empty($email) || empty($address) || empty($card_number) || empty($security_code) || empty($phone_number)) {
            echo "<h4 style='color: red;'>Error: Some required fields are missing!</h4>";
            exit;
        }

        // Sanitize and process form data
        $first_name = htmlspecialchars(trim($first_name));
        $last_name = htmlspecialchars(trim($last_name));
        $email = htmlspecialchars(trim($email));
        $address = htmlspecialchars(trim($address));
        $shoe_size = (int) htmlspecialchars(trim($shoe_size));  // Ensure shoe_size is an integer
        $gender = htmlspecialchars(trim($gender));
        $card_number = htmlspecialchars(trim($card_number));
        $security_code = htmlspecialchars(trim($security_code));
        $phone_number = htmlspecialchars(trim($phone_number));
        $registration_date = date("Y-m-d");

        // Create a new connection to the database
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check if the connection was successful
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to insert the customer data into the 'customers' table
        $sql = "INSERT INTO customers (first_name, last_name, email, home_address, shoe_size, sizing_gender, registration_date, card_number, security_code, phone_number)
                VALUES ('$first_name', '$last_name', '$email', '$address', $shoe_size, '$gender', '$registration_date', '$card_number', '$security_code', '$phone_number')";

        // Execute the query and check if it was successful
        if ($conn->query($sql) === TRUE) {
            echo "<h2 style='color: green;'>Order Compeleted </h2>";
        } else {
            echo "<h4 style='color: red;'>Error: " . $conn->error . "</h4>";
        }

        // Close the connection
        $conn->close();
    }
?>
