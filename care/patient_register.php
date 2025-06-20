<?php
// patient_register.php - Patient registration script
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $photo = $_POST['photo']; //basic example, more secure implementation needed
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $created_at = date("Y-m-d H:i:s");

    $sql = "INSERT INTO patients (first_name, last_name, email, phone, location, photo, password, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $first_name, $last_name, $email, $phone, $location, $photo, $password, $created_at);

    if ($stmt->execute()) {
        echo "Patient registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>