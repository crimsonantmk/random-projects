<?php
// book_appointment.php
require_once 'connect.php'; // Include your database connection script

session_start();

if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_type']) || $_SESSION['user_type'] != 'patient') {
    echo "Access denied.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $providerId = $_POST['provider_id'];
    $appointmentDate = $_POST['appointment_date'];
    $appointmentLocation = $_POST['appointment_location']; // Added this line
    $appointmentNotes = $_POST['appointment_notes'];
    $appointmentTime = $_POST['appointment_time'];
    $patientId = $_SESSION['user_id'];

    // Insert data into the database, including `appointment_location`
    $sql = "INSERT INTO appointments (provider_id, patient_id, appointment_date, appointment_location, appointment_notes, appointment_time) 
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iissss", $providerId, $patientId, $appointmentDate, $appointmentLocation, $appointmentNotes, $appointmentTime);

    if ($stmt->execute()) {
        echo "Appointment booked successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
}
?>