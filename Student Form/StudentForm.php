<?php
include('../db_connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "<script>console.log('connected' );</script>";
}


// Process form data and insert into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $courseName = $_POST["name"];
    $courseCode = $_POST["CourseCode"];
    $batch = $_POST["Batch"];
    $surveyDate = $_POST["calendar"];
    
    // Insert the main survey information into the database
    $sql = "INSERT INTO survey_responses (course_name, course_code, batch, survey_date)
            VALUES ('$courseName', '$courseCode', '$batch', '$surveyDate')";
    
    if ($conn->query($sql) === TRUE) {
        $surveyID = $conn->insert_id; // Get the ID of the inserted survey
        
        // Insert individual responses into the database
        // You can use a loop to insert responses for each question

        // Example for the "Teaching" question
        $teachingResponse = $_POST["Name1_Teaching"];
        $sql = "INSERT INTO survey_responses_details (survey_id, question, response)
                VALUES ($surveyID, 'Teaching', '$teachingResponse')";
        $conn->query($sql);
        
        // Add similar INSERT queries for other questions
        
        // Redirect to a thank you page or display a success message
        header("Location: thank_you.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
