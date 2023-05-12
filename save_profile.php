<?php
header('Content-Type: application/json');

// Replace with your own database credentials
require 'connection.php';

$name = $_POST["name"];
$email = $_POST["email"];
$contact = $_POST["contact"];

$sql = "UPDATE users SET name = ?, contact = ? WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $contact, $email);
$result = $stmt->execute();

if ($result) {
  echo json_encode(["success" => true, "message" => "Profile updated successfully"]);
} else {
  echo json_encode(["success" => false, "message" => "Error updating profile"]);
}

$stmt->close();
$conn->close();
?>
