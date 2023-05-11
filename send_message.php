<?php

include 'connection.php';

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Get the request body data
$data = json_decode(file_get_contents('php://input'), true);

$senderEmail = $data['sender_email'];
$receiverEmail = $data['receiver_email'];
$message = $data['message'];

// Prepare the insert query
$sql = "INSERT INTO messages (sender_email, receiver_email, message) VALUES ('$senderEmail', '$receiverEmail', '$message')";

// Execute the insert query
if (mysqli_query($conn, $sql)) {
    // If the insert was successful, return a success message
    echo json_encode(array('message' => 'Message sent successfully'));
} else {
    // If the insert failed, return an error message
    echo json_encode(array('message' => 'Failed to send message'));
}

// Close the database connection
mysqli_close($conn);

?>
