<?php
    echo "Your input has been submitted <br> ";
    echo "______________________________________________________<br>";

    $first_name = $_POST["fname"];
    echo "Customer's Name: ".$first_name."<br>";

    $last_name = $_POST["lname"];
    echo "Customer's Last Name: ".$last_name."<br>";

    $email = $_POST["email"];
    echo "Customer's Email: ".$email."<br>";

    $address = $_POST["address"];
    echo "Customer's Address: ".$address."<br>";

    $shoe_size = $_POST["size"];
    echo "Customer's Size: ".$shoe_size."<br>";

    $gender = $_POST['sizing'];
    echo "Gender: ".$gender."<br>";

    $servername = "localhost";
    $username = "KW234";
    $password = "Ke'niah";
    $dbname = "Database_Systems";
    
    $conn = new mysqli($servername,$username,$password,$dbname);
    if ($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    }

    echo "DB connection established!";

    $sql = "INSERT INTO CUSTOMERS (Customer_ID, First_name, Last_name, Email, Home_address, Shoe_size, Sizing_gender)
            VALUES ( 1,'$first_name', '$last_name', '$email',  '$address', $shoe_size, '$gender')";

    

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
    echo "hello";
    $conn->close();
?>
  