<?php
include('../../db_connection.php');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// SQL query to select faculty names from the table
$sql = "SELECT faculty FROM faculty";

// Execute the query
$result = $conn->query($sql);

// Initialize an array to store faculty names
$facultyOptions = array();

if ($result->num_rows > 0) {
    // Fetch and store faculty names in the array
    while ($row = $result->fetch_assoc()) {
        $facultyOptions[] = $row["faculty"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration Page</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <style>
      body {
        background-color: #f8f9fa;
      }
      .container {
        background-color: #fff;
        padding: 1.8rem;
        border-radius: 2rem;
        margin-top: 1rem;
        box-shadow: 0 2rem 3rem rgba(132, 139, 200, 0.18);
        transition: all 0.3s ease;
        max-width: 400px;
        margin: 100px auto;
      }
      .form-control,.btn{
        border-radius: 25px;
        

      }
      
    </style>
  </head>
  <body>
    <div class="container">
      <h2 class="text-center">Registration</h2>
      <form
        method="post"
        action="register.php"
        onsubmit="return validateForm()"
      >
        <div class="form-group">
          <label for="name">Name</label>
          <input
            type="text"
            class="form-control"
            name="name"
            id="Name"
            placeholder="Enter Name"
            required
          />
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="email"
            class="form-control"
            name="email"
            id="email"
            placeholder="Enter email"
            required
          />
        </div>
        <!-- <div class="form-group">
          <label for="user_type">User Type</label>
          <input
            type="text"
            class="form-control"
            name="user_type"
            id="user_type"
            placeholder="Enter user type"
            required
          />
        </div> -->
        <div class="form-group">
          <label for="faculty">Faculty</label>
          <select class="form-control" name="faculty" id="faculty"  placeholder="Enter Faculty"required>
        <?php
        // Loop through faculty options and create <option> elements
        foreach ($facultyOptions as $option) {
            echo "<option value=\"$option\">$option</option>";
        }
        ?>
    </select>
        </div>
        <div class="form-group">
          <label for="department">Department</label>
          <input
            type="text"
            class="form-control"
            name="department"
            id="department"
            placeholder="Enter Department"
            required
          />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input
            type="password"
            class="form-control"
            name="password"
            id="password"
            placeholder="Enter password"
            required
          />
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirm Password</label>
          <input
            type="password"
            class="form-control"
            name="confirmPassword"
            id="confirmPassword"
            placeholder="Confirm password"
            required
            name="confirmPassword"
          />
        </div>
        <button type="submit" class="btn btn-primary btn-block">
          Register
        </button>
      </form>
    </div>

    <script>
      function validateForm() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        if (password !== confirmPassword) {
          alert("Passwords do not match. Please try again.");
          return false; // Prevent form submission
        }

        return true; // Allow form submission
      }
    </script>

    
      <?php
      // Close the database connection
      $conn->close();
      ?>

  </body>
</html>
