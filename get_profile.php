<?php
header('Content-Type: application/json');

require 'connection.php';

$email = $_GET["email"];

$sql = "SELECT name, email FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // Fetch user data
  $row = $result->fetch_assoc();
  echo json_encode($row);
} else {
  // User not found
  echo json_encode(["error" => "User not found"]);
}

$stmt->close();
$conn->close();
?>
