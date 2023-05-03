<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Define database connection parameters
$host = "localhost";
$username = "root";
$password = "";
$database = "communicating";

// Create a database connection
$conn = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

?>