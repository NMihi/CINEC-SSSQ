<?php

include('../db_connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "<script>console.log('connected' );</script>";
}

// SQL query to fetch data from the table
$sql = "SELECT course_code, course_name FROM course";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["course_code"] . "</td><td>" . $row["course_name"] . "</td></tr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
