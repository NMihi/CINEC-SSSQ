<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user input from the form
    $username = $_POST["email"];
    $password = $_POST["password"];

    // Replace these with your MySQL database credentials
    $hostname = "localhost";  // Change to your MySQL server hostname
    $username_db = "root";  // Change to your MySQL username
    $password_db = "";  // Change to your MySQL password
    $database = "CINEC_SSSQ";    // Change to your MySQL database name

    // Create a database connection
    $conn = new mysqli($hostname, $username_db, $password_db, $database);

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

        // Print user information (you can customize this part)
        if($user['user_type']=='Admin'){
            header("Location: ../Dashboard/index.html");
        }elseif($user['user_type']=='Client'){
            header("Location: ../Request Form/Request.html");
        }elseif($user['user_type']=='Super Admin'){
            header("Location: ../Dashboard/index.html");
        }
    } else {
        // Invalid login
        echo "Invalid username or password. Please try again.";
    }

    // Close the database connection
    $conn->close();
}
?>
