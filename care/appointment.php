<?php
// Include the database connection file
require_once 'connect.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];
    $provider_id = $_POST['provider_id'];
    $appointment_date = $_POST['appointment_date'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];
    $created_at = date('Y-m-d H:i:s');

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO appointments (patient_id, provider_id, appointment_date, status, notes, created_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissss", $patient_id, $provider_id, $appointment_date, $status, $notes, $created_at);

    // Execute and give feedback
    if ($stmt->execute()) {
        echo "<p style='color: green; text-align: center;'>Appointment successfully scheduled!</p>";
    } else {
        echo "<p style='color: red; text-align: center;'>Error: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}
?>