<?php

// Connect to the database
include 'connection.php';

// Get the ID of the task to delete
$id = $_POST['id'];

// Delete the task from the database
$query = "DELETE FROM tasks WHERE id = $id";
$result = mysqli_query($conn, $query);

// Check if the query was successful
if ($result) {
    // The task was successfully deleted
    $response = array(
        'status' => 'success',
        'message' => 'Task deleted successfully',
    );
} else {
    // There was an error deleting the task
    $response = array(
        'status' => 'error',
        'message' => 'Error deleting task: ' . mysqli_error($conn),
    );
}

// Return the response as JSON
echo json_encode($response);

// Close the database conn
mysqli_close($conn);

?>
