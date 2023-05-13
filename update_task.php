<?php

include 'connection.php';

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Get the task data from the request body
$id          = $_POST['id'];
$title       = $_POST['title'];
$description = $_POST['description'];
$assignee    = $_POST['assignee'];

if (isset($_POST['completed'])) {
    $completed = $_POST['completed'];
    if ($completed == 0) {
        $status = "pending";
    } else {
        $status = "completed";
    }
} else {
    $completed = 0;
}

if (isset($_POST['progress'])) {
    $progress = $_POST['progress'];
} else {
    $progress = 0;
}

// Prepare the update query
$sql = "UPDATE tasks SET title='$title', description='$description', progress='$progress', assigned_to='$assignee', completed='$completed', status = '$status' WHERE id=$id";

// Execute the update query
if (mysqli_query($conn, $sql)) {
    // If the update was successful, return a success message
    echo json_encode(array('status' => 'success', 'message' => 'Task updated successfully'));
} else {
    // If the update failed, return an error message
    echo json_encode(array('status' => 'error', 'message' => 'Failed to update task'));
}

// Close the database connection
mysqli_close($conn);

?>