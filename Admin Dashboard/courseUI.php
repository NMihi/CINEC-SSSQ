<?php
include('../db_connection.php');
session_start();

if ($_SESSION['user_type']=="Client") {
  header("Location: ../Login/login.html");
  exit;
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
$sql = "SELECT * FROM fac_dep,course where fac_dep.fac_id = course.fac_id";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cinec SSSQ</title>

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="course.css" />
  </head>
  <body>
    <div class="container">
    <aside>
        <div class="toggle">
          <div class="logo">
            <img src="images/logo.png" />
            <h2>CINEC<span class="primary">SSSQ</span></h2>
          </div>
          <div class="close" id="close-btn">
            <span class="material-icons-sharp"> close </span>
          </div>
        </div>

        <div class="sidebar">
          <a href="index.html" class="active">
            <span class="material-icons-sharp"> dashboard </span>
            <h3>Dashboard</h3>
          </a>
          <a href="home.html">
            <span class="material-icons-sharp"> home </span>
            <h3>Home</h3>
          </a>
          <a href="form1.php">
            <span class="material-icons-sharp"> view_list </span>
            <h3>Forms</h3>
          </a>
          <a href="courseUI.php">
            <span class="material-icons-sharp"> school </span>
            <h3>Courses</h3>
          </a>

          <a href="batches.php">
            <span class="material-icons-sharp"> grade </span>
            <h3>Batches</h3>
          </a>

          <a href="lecturesUI.php">
            <span class="material-icons-sharp"> person </span>
            <h3>Lecturers</h3>
          </a>
          <a href="userManagement.php">
            <span class="material-icons-sharp"> person_outline </span>
            <h3>User Management</h3>
          </a>

          <a href="form_report.php">
            <span class="material-icons-sharp"> report_gmailerrorred </span>
            <h3>Reports</h3>
          </a>
          <a href="settings.html">
            <span class="material-icons-sharp"> settings </span>
            <h3>Settings</h3>
          </a>
          <a href="../logout.php">
            <span class="material-icons-sharp"> logout </span>
            <h3>Logout</h3>
          </a>
        </div>
      </aside>
      <!-- end of aside -->

      <main>
        <h1>Courses</h1>
        <!-- Analyses -->
        <div class="analyse">
          <div class="sales">
            <form method="post" action="courses.php" class="form-container">
              <div class="form-group">
              <select class="form-control" name="fac_id" id="fac_id" required>
                <option value="NULL">Select a Faculty / Department</option>
                <?php
                  $sql1 = "SELECT * FROM fac_dep";
                  $result1 = $conn->query($sql1);

                    if ($result1->num_rows > 0) {
                      // Fetch and store faculty names in the array
                      while ($row = $result1->fetch_assoc()) {
                        echo '<option value="'.$row["fac_id"].'">'.$row["fac_or_dep"].'</option>';
                          
                      }
                    }
              
                ?>
              </select>
              </div>
              <div class="form-group">
                <input
                  type="text"
                  name="course_code"
                  class="form-control"
                  id="loginPassword"
                  placeholder="Enter Course Code"
                  required
                />
              </div>
              <div class="form-group">
                <input
                  type="text"
                  name="course_name"
                  class="form-control"
                  id="loginPassword"
                  placeholder="Enter Course Name"
                  required
                />
              </div>
              <button type="submit" class="btn btn-primary btn-block">
                submit
              </button>
            </form>
          </div>
        </div>
        <!-- End of Analyses -->

        <!-- Recent Orders Table -->
        <div class="recent-orders">
          <h2>Recent Orders</h2>
          <table>
            <thead>
              <tr>
                <th>Course ID</th>
                <th>Course Name</th>
              </tr>
            </thead>
            <tbody>
              <?php
            if ($result->num_rows > 0) { while ($row = $result->fetch_assoc()) {
              echo "
              <tr>
                "; echo "
                <td>" . $row["course_code"] . "</td>
                "; echo "
                <td>" . $row["course_name"] . "</td>
                ";  echo "
              </tr>
              "; } } else {
                echo "<tr><td colspan='5'>No courses found</td></tr>";
            } ?>
            </tbody>
          </table>

        </div>
        <!-- End of Recent Orders -->
      </main>
    </div>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> -->
  </body>
</html>

<?php
// Close the database connection
$conn->close(); ?>
