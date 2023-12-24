<?php


// Step 3: Database Connection
include('../db_connection.php');
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.html");
    exit;
  }
//$userID = $_GET['id'];

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "<script>console.log('connected' );</script>";
}

// Retrieve data from the form
$batch = $_POST['batch'];
$course_code = $_POST['course'];

// SQL query to insert data into survey_form_data table
$sql = "INSERT INTO batches (batch_name	,course_code	
)
        VALUES ('$batch','$course_code')";
       
    
         if ($conn->query($sql) === TRUE ) {
                

                // // Redirect to another HTML page batch_id course_code
                // header("Location: ../index.html");
                // exit;
                echo "<script>alert('Data inserted successfully!')</script>";
                 // Redirect to another HTML page
                 echo "<script>
                        setTimeout(function() {
                            window.location.href = 'batches.php';
                        }, 2); // Redirect after 2 seconds (adjust as needed)
                    </script>";
                    exit;
                
            } 
            else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }

        

// Close the database connection
$conn->close();

?>