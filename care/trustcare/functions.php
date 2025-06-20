<?php
// utils/functions.php

/**
 * Starts a secure session. Call this at the beginning of scripts needing session access.
 */
function start_secure_session()
{
    // Set session cookie parameters for better security
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params([
        'lifetime' => $cookieParams['lifetime'],
        'path' => $cookieParams['path'],
        'domain' => $cookieParams['domain'],
        'secure' => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on', // Only send cookie over HTTPS
        'httponly' => true, // Prevent JavaScript access to the session cookie
        'samesite' => 'Lax' // Mitigate CSRF attacks
    ]);

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
}

/**
 * Checks if a patient is logged in.
 *
 * @return bool True if logged in, false otherwise.
 */
function is_patient_logged_in()
{
    return isset($_SESSION['patient_logged_in']) && $_SESSION['patient_logged_in'] === true && isset($_SESSION['patient_id']);
}

/**
 * Checks if an admin is logged in.
 *
 * @return bool True if logged in, false otherwise.
 */
function is_admin_logged_in()
{
    return isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true;
}

/**
 * Checks if a provider is logged in.
 *
 * @return bool True if logged in, false otherwise.
 */
function is_provider_logged_in()
{ // <-- NEW FUNCTION
    return isset($_SESSION['provider_logged_in']) && $_SESSION['provider_logged_in'] === true && isset($_SESSION['provider_id']);
}


/**
 * Sends a JSON response and terminates the script.
 *
 * @param mixed $data Data to encode as JSON.
 * @param int $statusCode HTTP status code (default: 200).
 */
function send_json_response($data, $statusCode = 200)
{
    http_response_code($statusCode);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode($data);
    exit; // Terminate script execution after sending response
}

/**
 * Sanitizes input data (basic example).
 * Consider using more robust libraries like filter_var for specific types.
 *
 * @param string $data The input data.
 * @return string Sanitized data.
 */
function sanitize_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Prevent XSS
    return $data;
}

?>