<?php
include('../db_connection.php');



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST["user_id"];
    
    // Delete the user with the given ID from the database
    $sql = "DELETE FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    
    if ($stmt->execute()) {
        echo "User deleted successfully.";
    } else {
        echo "<script>alert('This user can not be deleted')</script>";
        echo "Error deleting user: " . $conn->error;
    }
    
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
