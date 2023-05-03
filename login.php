<?php

require_once 'connection.php';

header('Content-Type: application/json');

// Get the email and password from the request body
$email = $_POST['email'];
$password = $_POST['password'];

// Sanitize the inputs to prevent SQL injection attacks
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Query the database to check if the user exists and the password is correct
$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
$user = mysqli_fetch_assoc($result);

if ($user && $password == $user['password']) {
  // User is authenticated, return success flag, message, and role in JSON response
  echo json_encode([
    'success' => true,
    'message' => 'Login successful',
    'role' => $user['roles'],
  ]);
} else {
  // Authentication failed, return failure flag and message in JSON response
  echo json_encode([
    'success' => false,
    'message' => 'Invalid email or password',
  ]);
}

?>
