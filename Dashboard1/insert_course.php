<?php
include('../db_connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "<script>console.log('connected' );</script>";
}

// Retrieve data from the HTML form
$course_code = $_POST['courseID'];
$course_name = $_POST['courseName'];

// Retrieve the department name selected by the user
$selected_department = $_POST['Department']; // Assuming you have an input field or dropdown for department selection

// Query to retrieve the dep_id based on the selected department
$department_query = "SELECT dep_id FROM department WHERE department = '$selected_department'";
$department_result = $conn->query($department_query);

if ($department_result->num_rows > 0) {
    // Fetch the dep_id
    $row = $department_result->fetch_assoc();
    $dep_id = $row['dep_id'];

// SQL query to insert data into the table
$sql = "INSERT INTO course (course_code, course_name,dep_id) VALUES ('$course_code', '$course_name','$dep_id')";

if ($conn->query($sql) === TRUE) {
    echo "Course added successfully.";
} }else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
