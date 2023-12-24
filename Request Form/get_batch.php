<?php
// get_batch.php

include('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['course'])) {
    $selectedCourse = $_POST['course'];

    // Perform a database query to get batch numbers based on the selected course
    $sql = "SELECT * FROM batches WHERE course_code = '$selectedCourse'";
    $result = $conn->query($sql);

    // Build the HTML options for the batch_no dropdown
    $options = '<option value="">Select Batch</option>';
    while ($row = $result->fetch_assoc()) {
        $options .= '<option value="' . $row['batch_id'] . '">' . $row['batch_name'] . '</option>';
    }

    echo $options;
} else {
    // Invalid request
    echo 'Invalid request';
}
?>
