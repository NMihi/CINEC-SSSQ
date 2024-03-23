<?php
include('../db_connection.php');
session_start();

if (!isset($_SESSION['user_id'])) {
  header("Location: ../Login/login.html");
  exit;
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
$fac_id=$_SESSION['Faculty'];
$sql = "SELECT * FROM lecturer where fac_id = '$fac_id'";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Input Form</title>
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="Request.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  </head>
  <body>
    <div class="container">
      <h1 class="text-center">Survey Questionnaire Request</h1>
      <form method="post" action="Request.php">
        <div class="section">
          <legend>Program Information</legend>
          <div class="form-group">
            <label for="faculty">Faculty / Department</label>
            <?php
            $sql1 = "SELECT * FROM fac_dep where fac_id = '$fac_id'";
            $result1 = $conn->query($sql1);
            $row1 = $result1->fetch_assoc();
            $data=$row1['fac_or_dep'];
            echo '<select name="fac_dep" id="faculty" class="form-control">
            <option value="'.$row1["fac_or_dep"].'">'.$data.'</option>

          </select>'
            ?>
            
          </div>


          <div class="form-group">
            <label for="course">Name of the Training Program</label>
            <?php
            $sql2 = "SELECT * FROM course where fac_id = '$fac_id'";
            $result2 = $conn->query($sql2);
    
            
            echo '<select name="course" class="form-control" id="course" required>';
            echo '<option value="">Select Program Name</option>';

            if ($result2->num_rows > 0) {
              while ($row2 = $result2->fetch_assoc()) {
                echo '<option value="' . $row2["course_code"] . '">' . $row2["course_name"] . '</option>';
              }
            }

            echo '</select>';
            ?>
          </div>

          <div class="form-group">
            <label for="batch_no">Batch No</label>
            <select name="batch_no" class="form-control" id="batch_no" required></select>
           
          </div>

          <div class="form-group">
            <label for="semester">Semester</label>
            <input
              type="text"
              name="semester"
              class="form-control"
              id="semester"
              placeholder="Enter the Semester"
              required
            />
          </div>

          <div class="form-group">
            <label for="no_of_students">No of Students in the Program</label>
            <input
              type="number"
              name="no_of_students"
              class="form-control"
              id="no_of_students"
              placeholder="Enter the No of Students in the Program"
              required
            />
          </div>
        </div>

        <div class="section">
          <legend>Lecturer Panel</legend>

          <div class="form-group" id="lecture-names">
            <?php
           

            // Create a dropdown with fetched data
            echo '<select name="lecture_name[]" class="form-control" required>';
            echo '<option value="">Select Lecturer</option>';

            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo '<option value="' . $row["lec_name"] . '">' . $row["lec_name"] . '</option>';
              }
            }

            echo '</select>';

            // Close the database connection
            $conn->close();
            ?>
            <br />
          </div>

          <button type="button" id="add-lecture" class="btn btn-success">
            Add More Lecturers
          </button>
        </div>
        <div class="section">
          <legend>Date</legend>

          <div class="form-group">
            <label for="Proposed_Date">Proposed Date for the Survey</label>
            <input
              type="date"
              name="Proposed_Date"
              class="form-control"
              id="Proposed_Date"
              placeholder="Enter your Date"
              required
            />
          </div>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
      </form>
    </div>

    <script>
  // Function to populate the batch_no dropdown based on the selected course
  function populateBatches() {
    var selectedCourse = $('#course').val();
    $.ajax({
      type: 'POST',
      url: 'get_batch.php', // Make sure to create a PHP script to handle this AJAX request
      data: { course: selectedCourse },
      success: function(data) {
        $('#batch_no').html(data); // Populate the batch_no dropdown with the response
      }
    });
  }

  // Attach the populateBatches function to the onchange event of the course dropdown
  $('#course').on('change', populateBatches);
</script>

    <script>
      document.getElementById("add-lecture").addEventListener("click", function () {
        const lectureNamesDiv = document.getElementById("lecture-names");
        const newInput = document.createElement("div");
        newInput.className = "input-group mb-3";

        const selectField = document.createElement("select");
        selectField.name = "lecture_name[]";
        selectField.className = "form-control";
        selectField.required = true;

        const defaultOption = document.createElement("option");
        defaultOption.value = "";
        defaultOption.textContent = "Select Lecturer";
        selectField.appendChild(defaultOption);

        // Fetch data from the PHP variable and populate the dropdown
        <?php
          $result->data_seek(0); // Reset the result set pointer
          while ($row = $result->fetch_assoc()) {
            echo 'const option = document.createElement("option");';
            echo 'option.value = "' . $row["lec_name"] . '";';
            echo 'option.textContent = "' . $row["lec_name"] . '";';
            echo 'selectField.appendChild(option);';
          }
        ?>

        const deleteButton = document.createElement("button");
        deleteButton.type = "button";
        deleteButton.className = "btn btn-danger";
        deleteButton.style.borderRadius = "0 0.25rem 0.25rem 0";
        deleteButton.textContent = "Remove";
        deleteButton.addEventListener("click", function () {
          newInput.remove();
        });

        const inputGroupAppend = document.createElement("div");
        inputGroupAppend.className = "input-group-append";
        inputGroupAppend.appendChild(deleteButton);

        newInput.appendChild(selectField);
        newInput.appendChild(inputGroupAppend);
        lectureNamesDiv.appendChild(newInput);
      });
    </script>
  </body>
</html>
