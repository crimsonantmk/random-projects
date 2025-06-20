<?php
// login.php - Login script (for both patients and providers)
require_once 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $userType = $_POST['userType']; // "patient" or "provider"

    $tableName = ($userType == "patient") ? "patients" : "providers";

    $sql = "SELECT id, password FROM " . $tableName . " WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Login successful
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['user_type'] = $userType; // Store user type in session

            if ($userType == "patient") {
                header("Location: patientdashboard.html"); // Redirect to patient dashboard
                exit; // Important to stop further execution
            } else {
                header("Location: providerdashboard.php"); // Redirect to provider dashboard
                exit; // Important to stop further execution
            }
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
    $stmt->close();
}
$conn->close();
?>