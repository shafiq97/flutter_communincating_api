<?php
require 'connection.php';


// Fetch tasks from the database
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

$tasks = [];

if ($result->num_rows > 0) {
  // Convert the result set to an array
  while ($row = $result->fetch_assoc()) {
    $tasks[] = $row;
  }
}

// Summarize the tasks by status
$summary = [];

foreach ($tasks as $task) {
  $status = $task['status'];

  // If the status exists in the summary, increment the count
  if (array_key_exists($status, $summary)) {
    $summary[$status]++;
  } else {
    // Otherwise, initialize the count for the status
    $summary[$status] = 1;
  }
}

// Prepare the response data
$response = [
  'tasks' => $tasks,
  'summary' => $summary,
];

// Close the database connection
$conn->close();

// Send the response as JSON
header('Content-Type: application/json');
echo json_encode($response);
