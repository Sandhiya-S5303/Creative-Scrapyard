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
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query the database to check if the user exists with the provided credentials
    $sql = "SELECT * FROM register_seller1  WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, redirect to the success page
        header("Location: home.html");
        exit();
    } else {
        // User not found or invalid credentials, display error message
        echo "Invalid email or password. Please try again.";
    }
}

// Close connection
$conn->close();
?>
