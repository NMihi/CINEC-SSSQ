<?php
// Include your database connection configuration here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "CINEC_SSSQ";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else {
    echo "<script>console.log('connected' );</script>";
}

// Retrieve data from the form
$name = $_POST['name'];
$password = $_POST['password'];
$user_type = $_POST['user_type'];
$email = $_POST['email'];


// SQL query to insert data into survey_form_data table
$sql = "INSERT INTO users (name,password,user_type,email)
        VALUES ('$name','$password','$user_type','$email')";

if ($conn->query($sql) === TRUE) {
    // Get the last inserted form_id
    $user_id = $conn->insert_id;
    echo "Form data saved successfully!";
} 
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>