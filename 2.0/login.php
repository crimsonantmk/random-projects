<?php
require('connection.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    // Query to check if the user exists
    $query = "SELECT * FROM registration WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);

        // Verify password
        if ($pwd === $user['pwd']) { // Replace with password_verify if using hashed passwords
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fname'] = $user['fname'];
            header("Location: tracking.html"); // Redirect to the dashboard or desired page
            exit();
        } else {
            echo "<h1 style='color: red;'>Incorrect password. Please try again.</h1>";
        }
    } else {
        echo "<h1 style='color: red;'>No account found with this email. Please register.</h1>";
    }
}
?>