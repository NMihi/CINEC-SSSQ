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
          <a href="index.php" class="active">
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

          <a href="lectures.html">
            <span class="material-icons-sharp"> person </span>
            <h3>Lecturers</h3>
          </a>

          <a href="account1.html">
            <span class="material-icons-sharp"> account_circle </span>
            <h3>Account Details</h3>
          </a>

          <!-- <a href="report.html">
            <span class="material-icons-sharp"> report_gmailerrorred </span>
            <h3>Reports</h3>
          </a> -->

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

      <!-- Main Content -->
      <main>
        <h1>Dashboard</h1>

        <div class="analyse">

            <div class="forms">
              <div class="status">
                <a href="form1.php">
                  <div class="info">
                    <h2>Forms</h2>
                  </div>
                  <div class="progresss">
                    <img src="images/6324813.png" alt="" />
                  </div>
                </a>
              </div>
            </div>

            <div class="batches">
              <div class="status">
                <a href="batches.php">
                  <div class="info">
                    <h2>Batches</h2>
                  </div>
                  <div class="progresss">
                    <img src="images/6572534.png" alt="" />
                  </div>
                </a>
              </div>
            </div>

            <div class="course">
                <div class="status">
                  <a href="course.html">
                    <div class="info">
                      <h2>Courses</h2>
                    </div>
                    <div class="progresss">
                      <img src="images/4366867.png" alt="" />
                    </div>
                  </a>
                </div>
              </div>
  
              <div class="lectures">
                <div class="status">
                  <a href="lectures.html">
                    <div class="info">
                      <h2>Lecturers</h2>
                    </div>
                    <div class="progresss">
                      <img src="images/3177440.png" alt="" />
                    </div>
                  </a>
                </div>
              </div>

              <div class="account">
                <div class="status">
                  <a href="account1.html">
                    <div class="info">
                      <h2>Account Details</h2>
                    </div>
                    <div class="progresss">
                      <img src="images/Microsoft_Account_Logo.svg.png" alt="" />
                    </div>
                  </a>
                </div>
              </div>

          </div>

      </main>
      <!-- End of Main Content -->

    <script src="orders.js"></script>
    <script src="index.js"></script>


</body>
</html>