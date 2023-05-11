<?php

require_once 'connection.php';

header('Content-Type: application/json');

// Query the database to fetch all the employees
$result = mysqli_query($conn, "SELECT * FROM users where role = 'employee'");
$employees = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Return the employees in a JSON response
echo json_encode([
  'employees' => $employees,
]);

?>
