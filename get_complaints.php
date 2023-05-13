<?php
header('Content-Type: application/json');

require 'connection.php';

$taskId = $_POST['task_id'];

$sql = "SELECT * FROM complaints WHERE task_id = $taskId";
$result = $conn->query($sql);

$complaints = array();

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $complaints[] = $row;
  }
} 

echo json_encode(['complaints' => $complaints]);

$conn->close();
?>
