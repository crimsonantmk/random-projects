<?php
require('connection.php'); // Include database connection

header('Content-Type: application/json');

// Fetch all orders
$query = "SELECT * FROM orders ORDER BY order_date DESC";
$result = $conn->query($query);

if ($result->num_rows > 0) {
    $orders = [];
    while ($row = $result->fetch_assoc()) {
        $orders[] = $row; // Add each order to the array
    }
    echo json_encode($orders); // Return the orders as JSON
} else {
    echo json_encode([]); // Return an empty array if no orders found
}

// Close connection
$conn->close();
?>