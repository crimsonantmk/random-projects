<?php
$servername = "localhost"; // Replace with your server name if it's different
$username = "root";        // Replace with your MySQL username
$password = "";            // Replace with your MySQL password
$database = "user_database"; // Replace with the name of your database

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>