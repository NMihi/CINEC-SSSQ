<?php
include('../db_connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "<script>console.log('connected' );</script>";
}

// Retrieve data from the form
$faculty = $_POST['faculty'];
$department = $_POST['Department'];
$program_name = $_POST['name_t_program'];
$program_code = $_POST['p_code'];
$batch_no = $_POST['batch_no'];
$semester = $_POST['semester'];
$no_of_students = $_POST['no_of_students'];
$proposed_date = $_POST['Proposed_Date'];
$user_id = "1";

// SQL query to insert data into survey_form_data table
$sql = "INSERT INTO request_form (faculty, department, program_name, program_code, batch_no, semester, no_of_students, proposed_date,user_id)
        VALUES ('$faculty', '$department', '$program_name', '$program_code', '$batch_no', '$semester', $no_of_students, '$proposed_date','$user_id')";

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

    header("Location: link.php?id=$request_id");

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>