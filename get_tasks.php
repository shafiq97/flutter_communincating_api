<?php

require_once 'connection.php';

header('Content-Type: application/json');

// Get the email address from the request parameters
if(isset($_GET['email'])){
  $email = $_GET['email'];
  $result = mysqli_query($conn, "SELECT * FROM tasks WHERE assigned_to = '$email'");
}else{
  $result = mysqli_query($conn, "SELECT * FROM tasks");
}

$tasks = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Return the tasks in a JSON response
echo json_encode([
  'tasks' => $tasks,
]);

?>
