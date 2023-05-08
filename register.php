<?php

require_once 'connection.php';

header('Content-Type: application/json');

$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];
$name = $_POST['name'];
$contact = $_POST['contact'];

$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);
$role = mysqli_real_escape_string($conn, $role);
$name = mysqli_real_escape_string($conn, $name);
$contact = mysqli_real_escape_string($conn, $contact);

// if (empty($email) || empty($password) || empty($role) || empty($name) || empty($contact)) {
//     http_response_code(400);
//     echo json_encode(array("success" => false, "message" => "All fields are required."));
//     exit();
// }

$result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

if ($result && mysqli_num_rows($result) > 0) {
    http_response_code(400);
    echo json_encode(array("success" => false, "message" => "Email is already registered."));
    exit();
}

$result = mysqli_query($conn, "INSERT INTO users (email, password, role, name, contact) VALUES ('$email', '$password', '$role', '$name', '$contact')");

if ($result) {
    http_response_code(201);
    echo json_encode(array("success" => true, "message" => "User registered successfully."));
} else {
    http_response_code(500);
    echo json_encode(array("success" => false, "message" => "Failed to register the user."));
}

?>
