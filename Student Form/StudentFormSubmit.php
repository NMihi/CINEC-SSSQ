<?php 
// Step 3: Database Connection
include('../db_connection.php');
$userID = $_GET['id'];

$course_name = $_POST['CourseName'];
$course_code = $_POST['CourseCode'];
$batch_no = $_POST['Batch'];
$current_date = $_POST['Date'];
$TTL= $_POST['TTLP'];
$classrooms= $_POST['CLASSROOMS'];
$facilities= $_POST['FACILITIES'];
$LEI= $_POST['LEI'];
$support_services= $_POST['SupportService'];
$support_services_comment= $_POST['SupportServiceComment'];
$AOM= $_POST['AttentionOfManagement'];




$sql = "INSERT INTO form_submit (request_id,course_name,	course_code, batch,	submitted_date,	TTL,classrooms, other_facilities, LEI, support_services, support_services_comment, AOM	)
        VALUES ('$userID','$course_name', '$course_code', '$batch_no', '$current_date', '$TTL', '$classrooms', '$facilities', '$LEI','$support_services','$support_services_comment','$AOM')";

// if ($conn->query($sql) === TRUE) {
//     // Get the last inserted form_id
//     $sub_id = $conn->insert_id;

//     // Insert lecturer names into the lecturer_names table
//     foreach ($_POST['Name' . $sectionNumber . '_Teaching'] as $teaching) {
//         $teaching = $conn->real_escape_string($teaching); // Sanitize input
//         $sql = "INSERT INTO submitted_lecturers (sub_id, lec_name, teaching, notes)
//                 VALUES ('$sub_id','$lecturer_name','')";

//         if (!$conn->query($sql)) {
//             echo "Error inserting lecturer names: " . $conn->error;
//             // Rollback the form_data insertion if needed
//             $conn->rollback();
//             break;
//         }
//     }

//     header("Location: link.php?id=$request_id");

// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }






// Close the database connection
$conn->close();

?>