<?php
session_start(); // Start the session

// Check if the user is already logged in; if so, redirect them to the dashboard
if (isset($_SESSION['user_id'])) {
    header("Location: ./Dashboard/index.html");
    exit();
}

// Include the database connection file
include('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT user_id, name, password, user_type, email FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    

    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row['password'])) {
            // Password is correct; log in the user
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_name'] = $row['email'];
            echo "<script>alert('login successfully!')</script>";
            header("Location: ../Dashboard/index.html"); // Redirect to the dashboard
            exit();
        } else {
            $error_message = "Incorrect password";
        }
    } else {
        $error_message = "Email not found";
    }
    
    $stmt->close();
}

$conn->close();
?>


