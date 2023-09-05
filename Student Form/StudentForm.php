<?php
include('../db_connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "<script>console.log('connected' );</script>";
}

// Retrieve data from the form
$program_name = $_POST['Course'];
$program_code = $_POST['CourseCode'];
$batch_no = $_POST['Batch'];
$survey_date = $_POST['calendar'];
$TTLP = $_POST['TTLP'];
$LEI = $_POST['LEI'];
$Suport_Service = $_POST['Suport_Service'];
$AoM = $_POST['AoM'];


// SQL query to insert data into survey_form_data table
$sql = "INSERT INTO student_data_form (faculty, department, program_name, program_code, batch_no, semester, no_of_students, proposed_date)
        VALUES ('$faculty', '$department', '$program_name', '$program_code', '$batch_no', '$semester', $no_of_students, '$proposed_date')";

if ($conn->query($sql) === TRUE) {
    // Get the last inserted form_id
    $request_id = $conn->insert_id;

    // Insert lecturer names into the lecturer_names table
    foreach ($_POST['lecture_name'] as $lecturer_name) {
        $lecturer_name = $conn->real_escape_string($lecturer_name); // Sanitize input
        $sql = "INSERT INTO lecturer_names (request_id, lecturer_name)
                VALUES ($request_id, '$lecturer_name')";

        if (!$conn->query($sql)) {
            echo "Error inserting lecturer names: " . $conn->error;
            // Rollback the form_data insertion if needed
            $conn->rollback();
            break;
        }
    }

    echo "Form data saved successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>