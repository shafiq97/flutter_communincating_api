<?php

require_once 'connection.php';

header('Content-Type: application/json');

// Get the email address from the request parameters
$email = $_GET['email'];

// Query the database to fetch the tasks assigned to the user
$result = mysqli_query($conn, "SELECT * FROM tasks WHERE assigned_to = '$email'");
$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Return the tasks in a JSON response
echo json_encode([
  'tasks' => $tasks,
]);

?>
