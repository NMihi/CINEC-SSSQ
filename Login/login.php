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
            $_SESSION['user_id'] = $row['usesr_id'];
            $_SESSION['user_name'] = $row['email'];
            header("Location: ./Dashboard/index.html"); // Redirect to the dashboard
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                <h2 class="text-center">Login</h2>
                <form method="post" action="#">
                    <div class="form-group">
                        <label for="loginEmail">Email</label>
                        <input type="email" class="form-control" name="email" id="loginEmail" placeholder="Enter your email" required autocomplete="email">
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" name="password" class="form-control" id="loginPassword" placeholder="Enter your password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <?php
                    if (isset($error_message)) {
                        echo '<div class="alert alert-danger mt-3">' . $error_message . '</div>';
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
