<?php

require_once 'connection.php';

// Get the task data from the request body
$title = $_POST['title'];
$description = $_POST['description'];
$assignedTo = $_POST['assigned_to'];

// Sanitize the inputs to prevent SQL injection attacks
$title = mysqli_real_escape_string($conn, $title);
$description = mysqli_real_escape_string($conn, $description);
$assignedTo = mysqli_real_escape_string($conn, $assignedTo);

// Insert the task into the database
$sql = "INSERT INTO tasks (title, description, assigned_to) VALUES ('$title', '$description', '$assignedTo')";

if (mysqli_query($conn, $sql)) {
  // Task was created successfully, return success flag and message in JSON response
  echo json_encode([
    'success' => true,
    'message' => 'Task created successfully',
  ]);
} else {
  // Task creation failed, return failure flag and message in JSON response
  echo json_encode([
    'success' => false,
    'message' => 'Failed to create task',
  ]);
}

?>
