<?php 
// Step 3: Database Connection
include('../db_connection.php');
$userID = $_GET['id'];

if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else {
        echo "<script>console.log('connected' );</script>";
    }

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




$sql = "INSERT INTO form_submit (request_id,course_name,course_code, batch,submitted_date,TTL,classrooms, other_facilities, LEI, support_services, support_services_comment, AOM)
        VALUES ('$userID','$course_name', '$course_code', '$batch_no', '$current_date', '$TTL', '$classrooms', '$facilities', '$LEI','$support_services','$support_services_comment','$AOM')";

if ($conn->query($sql) === TRUE ) {
        // Get the last inserted form_id
        $sub_id = $conn->insert_id;


        $sql2 = "SELECT * FROM lecturer_names WHERE request_id = $userID";
        $result2 = mysqli_query($conn, $sql2);

// Check if there are any lecturer names
        if (mysqli_num_rows($result2) > 0) {
    // echo '<form >';
                $sectionNumber = 1; // Initialize the section number


                while ($row2 = mysqli_fetch_assoc($result2)) {
                        $lec_name = $row2['lecturer_name'];
                        $teaching = $_POST['Name' . $sectionNumber . '_Teaching'];
                        $notes = $_POST['Name' . $sectionNumber . '_Notes'];

                        $sql3 = "INSERT INTO submitted_lecturers (sub_id, lec_name,teaching,notes)
                        VALUES ('$sub_id', '$lec_name', '$teaching','$notes')";

                        if (!$conn->query($sql3)) {
                                echo "Error inserting lecturer details: " . $conn->error;
                                // Rollback the form_data insertion if needed
                                $conn->rollback();
                                break;
                        }
                        
                        
                        $sectionNumber++; // Increment the section number for the next iteration
                }
        }

    
        echo "<script>alert('Form data saved successfully!')</script>";

        // Redirect to another HTML page
        header("Location: indexed.html");
        exit;
        
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }








// Close the database connection
$conn->close();

?>