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
$courseCode = $_POST['course_code'];
$courseName = $_POST['course_name'];
$facID = $_POST['fac_id'];

// SQL query to insert data into the database
$sql = "INSERT INTO course (course_code, course_name, fac_id)
        VALUES ('$courseCode', '$courseName', '$facID')";



// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Data inserted successfully!');</script>";
    echo "<script>
            setTimeout(function() {
                window.location.href = 'courseUI.php';
            }, 2); // Redirect after 2 seconds (adjust as needed)
        </script>";
        exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();

?>
