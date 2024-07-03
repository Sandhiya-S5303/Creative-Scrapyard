<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "creativescrapyard"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_POST['address'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $additional_info = $_POST['additional_info'];

    // Insert data into database
    $sql = "INSERT INTO register_seller2 (address, state, city, pincode, additional_info) 
            VALUES ('$address', '$state', '$city', '$pincode', '$additional_info')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to success page
        header("Location: sellersuccess.html");
        exit(); // Stop further execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
