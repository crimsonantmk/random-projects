<?php
// connect.php - Database connection script
$servername = "localhost";
$username = "trusjepl";
$password = "";
$dbname = "trusjepl_healthcare_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>