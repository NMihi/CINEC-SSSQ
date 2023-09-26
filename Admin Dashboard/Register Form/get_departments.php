<?php
include('../../db_connection.php');

if (isset($_POST['fac_id'])) {
    $selectedFacId = $_POST['fac_id'];

    // Prepare a parameterized statement to prevent SQL injection
    $sql = "SELECT department FROM department WHERE fac_id = ?";
    
    // Prepare and bind the statement
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $selectedFacId);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    $departmentOptions = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $departmentOptions[] = $row["department"];
        }
    }

    // Generate the HTML for department options
    $options = '';
    foreach ($departmentOptions as $option) {
        $options .= "<option value=\"$option\">$option</option>";
    }

    echo $options;
}

// Close the database connection
$conn->close();
?>
