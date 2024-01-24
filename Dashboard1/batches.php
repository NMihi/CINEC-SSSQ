<?php
include('../db_connection.php');
session_start();
$fac_id=$_SESSION['Faculty'];

if ($_SESSION['user_type']!="Client") {
  header("Location: ../Login/login.html");
  exit;
}

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch course data from the database
$sql = "SELECT * FROM batches,course where batches.course_code = course.course_code AND course.fac_id=$fac_id";
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
              <a href="index.php" >
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
    

              <a href="batches.php" class="active">
                <span class="material-icons-sharp"> grade </span>
                <h3>Batches</h3>
              </a>
    
              <a href="lecturesUI.php">
                <span class="material-icons-sharp"> person </span>
                <h3>Lecturers</h3>
              </a>
    
              <a href="account.php">
                <span class="material-icons-sharp"> account_circle </span>
                <h3>Account Details</h3>
              </a>
    
              <a href="../Admin Dashboard/form_report.php">
                <span class="material-icons-sharp"> report_gmailerrorred </span>
                <h3>Reports</h3>
              </a>
    
              <a href="settings.php">
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
            <h1>Batches</h1>
            <!-- Analyses -->
            <div class="analyse">
              <div class="sales">
                
                 
                    <form method="post" action="batches1.php" class="form-container">
                      <div class="form-group">
                        
                      <select class="form-control" name="course" id="course" required>
                        <option value="NULL">Select a Course</option>
                        <?php
                          $sql1 = "SELECT * FROM course where fac_id='$fac_id'";
                          $result1 = $conn->query($sql1);

                            if ($result1->num_rows > 0) {
                              // Fetch and store faculty names in the array
                              while ($row = $result1->fetch_assoc()) {
                                echo '<option value="'.$row["course_code"].'">'.$row["course_name"].'</option>';
                                  
                              }
                            }
                      
                        ?>
                      </select>
                      </div>
                      <div class="form-group">
                        
                        <input
                          type="text"
                          name="batch"
                          class="form-control"
                          id="loginPassword"
                          placeholder="Enter Batch Name"
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
              <h2>Batch List</h2>
              <table>
                <thead>
                  <tr>
                    <th>Batch</th>
                    <th>Course ID</th>
                    <th>Course Name</th>
                  </tr>
                </thead>
                <tbody>
                <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["batch_name"] . "</td>";
                    echo "<td>" . $row["course_code"] . "</td>";
                    echo "<td>" . $row["course_name"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No batches found</td></tr>";
            }
            ?>

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
$conn->close();
?>