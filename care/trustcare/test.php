<?php
$servername = "localhost";
$username = "trusjepl_admin";
$password = "Tress12.45-.";
$dbname = "trusjepl_healthcare_db";

// Create connection using musqli_connect function
$conn = mysqli_connect($servername, $username, $password, $database);
// Connection Check
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected Successfully!";
    $conn->close();
}

?>