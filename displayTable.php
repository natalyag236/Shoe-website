<?php
    echo "<h2>Customer</h2>";
    $servername = "localhost";
    $username = "KW234";
    $password = "Ke'niah";
    $dbname = "Database_Systems";
    
    $conn = new mysqli($servername,$username,$password,$dbname);
    if ($conn->connect_error){
        die("Connection failed: " .$conn->connect_error);
    }
    echo "DB connection established!<br>"; 

    $sql = "SELECT * FROM CUSTOMERS";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["Customer_ID"]. "-First Name: " . $row["First_name"]. 
        "-Last Name: " . $row["Last_name"] . "<br>";
    }
    } else {
        echo "0 results";
    }
?>