<?php
include('../db_connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
$sql = "SELECT * FROM batches,course where batches.course_code = course.course_code";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinec SSSQ</title>

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="batches1.css" />

</head>
<body>
   

     <div class="container">

        <aside>
            <div class="toggle">
              <div class="logo">
                <img src="images/logo.png" />
                <h2>CINEC<span class="danger">SSSQ</span></h2>
              </div>
              <div class="close" id="close-btn">
                <span class="material-icons-sharp"> close </span>
              </div>
            </div>
    
            <div class="sidebar">
              <a href="index.html" class="active">
                <span class="material-icons-sharp"> home </span>
                <h3>Home</h3>
              </a>
              <a href="form1.html">
                <span class="material-icons-sharp"> view_list </span>
                <h3>Forms</h3>
              </a>
              <a href="course.html">
                <span class="material-icons-sharp"> school </span>
                <h3>Courses</h3>
              </a>
    
              <!-- <a href="#" class="active">
                <span class="material-icons-sharp"> insights </span>
                <h3>Analytics</h3> </a
              >
              <a href="#">
                <span class="material-icons-sharp"> mail_outline </span>
                <h3>Tickets</h3>
                <span class="message-count">27</span>
              </a>
              <a href="#">
                <span class="material-icons-sharp"> inventory </span>
                <h3>Sale List</h3>
              </a> -->
           
             
              <!-- <a href="#">
                <span class="material-icons-sharp"> add </span>
                <h3>New Login</h3>
              </a> -->

              <a href="batches1.html">
                <span class="material-icons-sharp"> grade </span>
                <h3>Batches</h3>
              </a>
    
              <a href="lectures.html">
                <span class="material-icons-sharp"> person </span>
                <h3>Lecturers</h3>
              </a>
    
              <a href="account1.html">
                <span class="material-icons-sharp"> account_circle </span>
                <h3>Account Details</h3>
              </a>
    
              <a href="report.html">
                <span class="material-icons-sharp"> report_gmailerrorred </span>
                <h3>Reports</h3>
              </a>
    
              <a href="settings.html">
                <span class="material-icons-sharp"> settings </span>
                <h3>Settings</h3>
              </a>
              
              <a href="logout.html">
                <span class="material-icons-sharp"> logout </span>
                <h3>Logout</h3>
              </a>

            </div>
          </aside>
          <!-- end of aside -->

          <main>
            <h1>Batches</h1>
            <!-- Analyses -->
            <div class="analyse">
              <div class="sales">
                <div class="status">
                  <div class="info">
                    <form method="post" action="batches1.php">
                      <div class="form-group">
                        <label for="loginEmail">Batch</label>
                        <input
                          type="text"
                          class="form-control"
                          name="batch"
                          id="loginEmail"
                          placeholder="Enter Batch"
                          
                        />
                      </div>
                      <div class="form-group">
                        <label for="loginPassword">Course</label>
                        <input
                          type="text"
                          name="course"
                          class="form-control"
                          id="loginPassword"
                          placeholder="Enter Course"
                          required
                        />
                      </div>
                      <button type="submit" class="btn btn-primary btn-block">
                        Login
                      </button>
                    </form>
                  </div>
                  
                </div>
              </div>
            </div>
            <!-- End of Analyses -->
    
            
    
            <!-- Recent Orders Table -->
            <div class="recent-orders">
              <h2>Recent Orders</h2>
              <table>
                <thead>
                  <tr>
                    <th>Batch</th>
                    <th>Couse</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["batch_name"] . "</td>";
                    echo "<td>" . $row["course_name"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found</td></tr>";
            }
            ?>

                </tbody>
              </table>
              <a href="#">Show All</a>
            </div>
            <!-- End of Recent Orders -->
          
          </main>


      </div> 

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> -->
  
    
</body>
</html>


<?php
// Close the database connection
$conn->close();
?>