<?php
include('../db_connection.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.html");
    exit;
  }

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "<script>console.log('connected' );</script>";
}

// Assuming you have form handling logic to retrieve data from the POST request
$lecturerID = $_POST['lec_id'];
$lecturerName = $_POST['lec_name'];
$departmentID = $_POST['dep_id'];

// SQL query to insert data into the database
$sql = "INSERT INTO lecturer (lec_id, lec_name, dep_id)
        VALUES ('$lecturerID', '$lecturerName', '$departmentID')";



// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Data inserted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

?>
