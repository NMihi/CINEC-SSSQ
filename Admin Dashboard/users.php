<?php
include('../db_connection.php');
session_start();



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $users = array();
    while ($row = $result->fetch_assoc()) {
        $users[] = $row;
    }
} else {
    $users = array();
}

// Close the database connection
$conn->close();

// Return the user data as JSON
header('Content-Type: application/json');
echo json_encode($users);
?>
