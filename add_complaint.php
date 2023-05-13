<?php
// DB details
include 'connection.php';
// Get the posted data
$postData = $_POST;

// Check whether the posted data is not empty
if (!empty($postData['task_id']) && !empty($postData['complaint_message']) && !empty($postData['complainer_email'])) {
    // Insert the data into the database
    $insert = $conn->query("INSERT INTO `complaints` (`task_id`, `complaint_message`, `complainer_email`) VALUES ('".$postData['task_id']."', '".$postData['complaint_message']."', '".$postData['complainer_email']."')");

    if ($insert) {
        $statusMsg = "Complaint added successfully.";
        $status = "success";
    } else {
        $statusMsg = "Complaint addition failed, please try again.";
        $status = "error";
    }
} else {
    $statusMsg = "All fields are mandatory.";
    $status = "error";
}

// Return the status and message in JSON format
exit(json_encode(array('status' => $status, 'message' => $statusMsg)));
?>
