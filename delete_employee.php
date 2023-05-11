<?php

require_once 'connection.php';

header('Content-Type: application/json');

// Get the employee ID from the request parameters
$employee_id = $_POST['id'];

// Query the database to delete the employee with the given ID
$result = mysqli_query($conn, "DELETE FROM users WHERE id = '$employee_id' AND role = 'employee'");

// Check if the employee was successfully deleted
if (mysqli_affected_rows($conn) > 0) {
  $response = [
    'success' => true,
    'message' => 'Employee deleted successfully',
  ];
} else {
  $response = [
    'success' => false,
    'message' => 'Failed to delete the employee. Please try again.',
  ];
}

// Return the response in JSON format
echo json_encode($response);

?>