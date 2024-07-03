<?php
// Database connection parameters
$servername = "localhost"; // Change this to your MySQL server hostname
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
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $re_enter_password = $_POST['re_enter_password'];
    $phone = $_POST['phone'];

    // Check if passwords match
    if ($password !== $re_enter_password) { 
        echo "Error: Passwords do not match!";
    } else {
        // Insert data into database
        $sql = "INSERT INTO registerbuyer(username, email, password, re_enter_password, phone) VALUES ('$username', '$email', '$password', '$re_enter_password','$phone')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to another HTML file
            header("Location: buyersuccess.html");
            exit(); // Stop further execution
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>
