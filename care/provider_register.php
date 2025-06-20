<?php
// provider_register.php - Provider registration script
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $profession = $_POST['profession'];
    $area_focus = $_POST['area_focus'];
    $years_experience = $_POST['years_experience'];
    $service_area = $_POST['service_area'];
    $about = $_POST['about'];
    $photo = $_POST['photo'];//basic example, more secure implementation needed
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
    $created_at = date("Y-m-d H:i:s");
    $verification_documents = $_POST['verification_documents'];//basic example, more secure implementation needed.

    $sql = "INSERT INTO providers (first_name, last_name, email, phone, profession, area_focus, years_experience, service_area, about, photo, password, created_at, verification_documents) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssissssss", $first_name, $last_name, $email, $phone, $profession, $area_focus, $years_experience, $service_area, $about, $photo, $password, $created_at, $verification_documents);

    if ($stmt->execute()) {
        echo "Provider registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}
$conn->close();
?>