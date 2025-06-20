<?php
// Include database connection
require('connection.php'); // Replace with your actual connection file

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $cake = trim($_POST["cake"]);
    $quantity = intval($_POST["quantity"]);
    $name = trim($_POST["name"]);
    $contact = trim($_POST["contact"]);
    $address = trim($_POST["address"]);

    // Validate inputs
    if (empty($cake) || empty($quantity) || empty($name) || empty($contact) || empty($address)) {
        echo "<script>
                alert('All fields are required!');
                window.history.back(); // Redirect back to the form
              </script>";
        exit;
    }

    // Prepare and bind statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO orders (cake, quantity, name, contact, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sisss", $cake, $quantity, $name, $contact, $address);

    // Execute the query
    if ($stmt->execute()) {
        echo "<script>
                alert('Order placed successfully!');
                window.location.href = 'index.html'; // Redirect back to the form
              </script>";
    } else {
        echo "<script>
                alert('Failed to place the order. Please try again.');
                window.history.back(); // Redirect back to the form
              </script>";
    }

    // Close the statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>