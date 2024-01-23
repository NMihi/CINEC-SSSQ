<?php
include('../db_connection.php');
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input from the form
    $username = $_POST["email"];
    $password = $_POST["password"];


    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize user input (for security)
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query the database to check the username and password
    $query = "SELECT * FROM users WHERE email='$username' AND password='$password'";
    $result = $conn->query($query);


    if ($result->num_rows == 1) {
        // User found, fetch user data
        $user = $result->fetch_assoc();
        session_start();

        //set session variables
        $_SESSION['user_id']=$user['user_id'];
        $_SESSION['name']=$user['name'];
        $_SESSION['user_type']=$user['user_type'];
        $_SESSION['Faculty']=$user['fac_dep'];
       


        // Print user information (you can customize this part)
        if($user['user_type']=='Admin'){
            header("Location: ../Admin Dashboard/userManagement.php");
        }elseif($user['user_type']=='Client'){
            header("Location: ../Dashboard1/index.php");
        }elseif($user['user_type']=='Super Admin'){
            header("Location: ../Admin Dashboard/userManagement.php");
        }
    } else {
        // Invalid login
        echo "Invalid username or password. Please try again.";
    }

    // Close the database connection
    $conn->close();
}
?>
 