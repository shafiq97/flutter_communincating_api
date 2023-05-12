<?php

include 'connection.php';

// Check connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}

// Get the receiver email from the request query parameters
$receiverEmail = $_GET['receiver_email'];

// Prepare the select query
$sql = "SELECT * FROM messages WHERE receiver_email = '$receiverEmail'";

// Execute the select query
$result = mysqli_query($conn, $sql);

// Check if any messages were found
if (mysqli_num_rows($result) > 0) {
    $messages = array();

    // Loop through each row of the result and add it to the messages array
    while ($row = mysqli_fetch_assoc($result)) {
        $messages[] = $row;
    }

    // Return the messages as JSON
    echo json_encode(array('status' => 'success', 'messages' => $messages));
} else {
    // If no messages were found, return an empty array
    echo json_encode(array('status' => 'success', 'messages' => array()));
}

// Close the database connection
mysqli_close($conn);

?>
