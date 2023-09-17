<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinec SSSQ</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"> -->

    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />

</head>
<body>
    <!-- <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                    <a href="#" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                        <span class="fs-5 d-none d-sm-inline">Cinec SSSQ</span>
                    </a>
                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">
                        <li class="nav-item">
                            <a href="index.html" class="nav-link align-middle px-0">
                                <i class="fas fa-home"></i> <span class="ms-1 d-none d-sm-inline">Home</span>
                            </a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="dashboard.html" class="nav-link align-middle px-0">
                                <i class="fas fa-tachometer-alt"></i> <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="adduser.html" class="nav-link align-middle px-0">
                                <i class="fas fa-user-plus"></i> <span class="ms-1 d-none d-sm-inline">Add / Remove User</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="viewStatus.html" class="nav-link px-0 align-middle">
                                <i class="fas fa-spinner"></i> <span class="ms-1 d-none d-sm-inline">View Status</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="reports.html" class="nav-link px-0 align-middle">
                                <i class="fad fa-file-chart-line"></i> <span class="ms-1 d-none d-sm-inline">View Reports</span></a>
                        </li> -->
                        
                    <!-- </ul>
                    <hr>
                    <div class="signout pb-4">
                       

                        <form action="logout.php" method="post">
                            <input type="hidden" name="logout" value="true">
                            <button type="submit" class="dropdown-item">Sign out</button>
                        </form>
                    </div>
                </div>
            </div> -->

            <!-- cont -->

            <!-- <div class="col py-3">
                <h1>Courses</h1>
            </div>

  
        </div>
    </div>    -->


 <!-- new cont -->


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
          <a href="form.html">
            <span class="material-icons-sharp"> view_list </span>
            <h3>Forms</h3>
          </a>
          <a href="course.html">
            <span class="material-icons-sharp"> school </span>
            <h3>Courses</h3>
          </a>

          <a href="batches.html">
            <span class="material-icons-sharp"> grade </span>
            <h3>Batches</h3>
          </a>

          <a href="lectures.html">
            <span class="material-icons-sharp"> person </span>
            <h3>Lecturers</h3>
          </a>

          <a href="account.html">
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

        <h1>Courses</h1>
        <button class="add-course-button" id="add-course-button">Add Course</button>

        <div class="analyse">

        </div>
        <div class="analyse" id="add-course-form">
          <form id="course-form" action="insert_course.php" method="POST">
              <label for="courseName">Course Name:</label>
              <input type="text" id="courseName" name="courseName" required>
  
              <label for="courseID">Course ID:</label>
              <input type="text" id="courseID" name="courseID" required>

              <label for="courseID">Department,:</label>
              <input type="text" id="courseID" name="Department" required>
  
              <button type="submit" class="submit_course">Submit</button>
          </form>
      </div>
            <!-- Table to display submitted inputs -->
        <div class="recent-orders">
        <h2>Submitted Courses</h2>
          <table>
              <thead>
                <tr>
                  <th>Course Name</th>
                  <th>Course ID</th>
                </tr>
              </thead>
            <tbody id="course-table-body"><?php

              include('../db_connection.php');
              
              // Check connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              }else {
                  echo "<script>console.log('connected' );</script>";
              }
              
              // SQL query to fetch data from the table
              $sql = "SELECT course_code, course_name FROM course";
              $result = $conn->query($sql);
              
              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      echo "<tr><td>" . $row["course_code"] . "</td><td>" . $row["course_name"] . "</td></tr>";
                  }
              } else {
                  echo "0 results";
              }
              
              $conn->close();
              ?>
              </tbody>
          </table>
      </div>

    </main>
       <!-- Right Section -->
       <div class="right-section">
        <div class="nav">
          <button id="menu-btn">
            <span class="material-icons-sharp"> menu </span>
          </button>
          <div class="dark-mode">
            <span class="material-icons-sharp active"> light_mode </span>
            <span class="material-icons-sharp"> dark_mode </span>
          </div>

          <div class="profile">
            <div class="info">
              <p>Hey, <b>Reza</b></p>
              <small class="text-muted">Admin</small>
            </div>
            <div class="profile-photo">
              <img src="images/profile-1.jpg" />
            </div>
          </div>
        </div>
        <!-- End of Nav -->

  </div> 
  <script>
    document.addEventListener("DOMContentLoaded", function () {
    const addButton = document.getElementById("add-course-button");
    const addForm = document.getElementById("add-course-form");
    const courseForm = document.getElementById("course-form");
    const courseTableBody = document.querySelector("course-table-body");

    addButton.addEventListener("click", function () {
        addForm.style.display = "block";
    });

    courseForm.addEventListener("submit", function (e) {
        e.Default();

        const courseName = document.getElementById("courseName").value;
        const courseID = document.getElementById("courseID").value;

        // Append submitted data to the table
        const newRow = document.createElement("tr");
        newRow.innerHTML = `<td>${courseName}</td><td>${courseID}</td>`;
        courseTableBody.appendChild(newRow);

        // You'll need to implement code here to insert data into the database

        // Reset form
        courseForm.reset();
      });
    });
  </script>
  <script src="index.js"></script>

    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> -->
  
    
</body>
</html>