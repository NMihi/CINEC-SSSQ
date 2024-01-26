<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="Styles/form_report.css" />
    <title>SSSQ Dashboard</title>
  </head>

  <body>
  <aside>
        <div class="toggle">
          <div class="logo">
            <img src="images/logo.png" />
            <h2>Cinec<span class="danger">SSSQ</span></h2>
          </div>
          <div class="close" id="close-btn">
            <span class="material-icons-sharp"> close </span>
          </div>
        </div>

        <div class="sidebar">
          <a href="index.html">
            <span class="material-icons-sharp"> dashboard </span>
            <h3>Dashboard</h3>
          </a>
          <a href="home.html">
            <span class="material-icons-sharp"> home </span>
            <h3>Home</h3>
          </a>
          <a href="userManagement.php">
            <span class="material-icons-sharp"> person_outline </span>
            <h3>User Management</h3>
          </a>

          <a href="report_home.php"  class="active">
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
    <div class="container">
      <!-- Sidebar Section -->
      <div></div>
      <!-- End of Sidebar Section -->

      

      
      <!-- Main Content -->
      <main>
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
        <h1>Report</h1>
        <!-- Title-->
        <div class="singleBar">
          <div class="user-list">
            <div class="user">
              <h1>Student Satisfaction Survey Report</h1>
              <h3>Approved by Quality Management System</h3>    
            </div>
          </div>
        </div>
        <!-- End of Title -->

        <!-- Form specification -->
        <div class="doubleBar">
          <div class="sales">
            <div class="status">
              <div class="info">
                <h2>Faculty: </h2>
                <h3>$65,024</h3>
              </div>
            </div>
          </div>
          <div class="sales">
            <div class="status">
              <div class="info">
                <h2>Department: </h2>
                <h3>$65,024</h3>
              </div>
            </div>
          </div>
        </div>


        <div class="singleBar">
          <div class="user-list">
            <div class="Ctitle">
                <h2>Course Title: </h2>
                <h3>$65,024</h3>    
            </div>
          </div>
        </div>


        <div class="quadBar">
          <div class="sales">
            <div class="status">
              <div class="info2">
                <h2>Date</h2>
                <h3>$65,024</h3>
              </div>
            </div>
          </div>
          <div class="sales">
            <div class="status">
              <div class="info2">
                <h2>Batch</h2>
                <h3>$65,024</h3>
              </div>
            </div>
          </div>
          <div class="sales">
            <div class="status">
              <div class="info2">
                <h2>Course Code</h2>
                <h3>$65,024</h3>
              </div>
            </div>
          </div>
          <div class="sales">
            <div class="status">
              <div class="info2">
                <h2>Students</h2>
                <h3>$65,024</h3>
              </div>
            </div>
          </div>
        </div>
        <!-- End of Form specification -->

        <br>
        <!-- Recent Orders Table -->
        <div class="recent-orders">
          <h2>Teaching, Training, Learning Process</h2>
          <table>
            <thead>
              <tr>
                <th>Teaching</th>
                <th>Lecturer</th>
                <th>Notes / Handouts</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
        <!-- End of Recent Orders -->
        <br><br>

        <!-- Start of Learning Environment / Infrastructure -->
        <h2>Learning Environment / Infrastructure</h2>

        <div class="doubleBar">
          <div class="sales">
            <div class="status">
              <div class="info">
                <h2>Classrooms: </h2>
                <h3>Good</h3>
              </div>
            </div>
          </div>
          <div class="sales">
            <div class="status">
              <div class="info">
                <h2>Other Facilities: </h2>
                <h3>Excellent</h3>
              </div>
            </div>
          </div>
        </div>
        <!-- End of Learning Environment / Infrastructure -->
        <br><br>
        <!-- Start of Summary -->
        <h2>Summary</h2>
        <div class="doubleBar">
          <div class="sales">
            <div class="status">
              <div class="info">
                <h2>Teaching: </h2>
                <h3>Good</h3>
              </div>
            </div>
          </div>
          <div class="sales">
            <div class="status">
              <div class="info">
                <h2>Notes / Handouts: </h2>
                <h3>Excellent</h3>
              </div>
            </div>
          </div>
        </div>

        <div class="singleBar">
          <div class="user-list">
            <div class="Ctitle">
                <h2>Teaching, Training, Learning Process: </h2>
                <h3>Good</h3>    
            </div>
          </div>
        </div>

        <div class="doubleBar">
          <div class="sales">
            <div class="status">
              <div class="info">
                <h2>Learning Environment / Infrastructure: </h2>
                <h3>Good</h3>
              </div>
            </div>
          </div>
          <div class="sales">
            <div class="status">
              <div class="info">
                <h2>Support Services from Faculty / Dept.: </h2>
                <h3>Excellent</h3>
              </div>
            </div>
          </div>
        </div>

        <div class="singleBar">
          <div class="user-list">
            <div class="Ctitle">
                <h2>Overall Student Satisfaction: </h2>
                <h3>Good</h3>    
            </div>
          </div>
        </div>
        <br><br>
      </main>
      <!-- End of Main Content -->
    </div>

    <script src="orders.js"></script>
    <script src="form report.js"></script>
  </body>
</html>
