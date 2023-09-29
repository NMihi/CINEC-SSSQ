<?php
include('../db_connection.php');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="user.css" />
    <title>SSSQ Dashboard</title>
  </head>

  <body>
    <div class="container">
      <!-- Sidebar Section -->
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
          <a href="index.html">
            <span class="material-icons-sharp"> dashboard </span>
            <h3>Dashboard</h3>
          </a>
          <a href="home.html">
            <span class="material-icons-sharp"> home </span>
            <h3>Home</h3>
          </a>
          <a href="userManagement.php" class="active">
            <span class="material-icons-sharp"> person_outline </span>
            <h3>User Management</h3>
          </a>

          <a href="report_home.php">
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
      <!-- End of Sidebar Section -->
      <!-- Nav Section -->
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

        <!-- Main Content -->
        <main>
          <h1>User Management</h1>
          <!-- Analyses -->
          <div class="analyse">
            <div class="sales">
              <div class="status">
                <a href="Register Form/admin_register.html">
                  <div class="info">
                    <h1>New Admin User</h1>
                  </div>
                  <div class="progresss">
                    <img src="images/user-gear.png" alt="" />
                  </div>
                </a>
              </div>
            </div>
            <div class="visits">
              <div class="status">
                <a href="Register Form/register.html">
                  <div class="info">
                    <h1>New Client User</h1>
                  </div>
                  <div class="progresss">
                    <img src="images/add-user.png" alt="" />
                  </div>
                </a>
              </div>
            </div>
          </div>
          <!-- End of Analyses -->

          <!-- Recent Orders Table -->
          <div class="recent-orders">
            <h2>Current Users</h2>
            <table>
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>User Type</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["name"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["user_type"] . "</td>";

                    echo "<td><form method='post' action='delete_user.php'>
                              <input type='hidden' name='user_id' value='" . $row["user_id"] . "'>
                              <input type='submit' value='Delete'>
                              </form></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No users found</td></tr>";
            }
            ?>
              </tbody>
            </table>
            <!-- <a href="#">Show All</a> -->
          </div>
          <!-- End of Recent Orders -->
        </main>
        <!-- End of Main Content -->
      </div>
    </div>

    <!-- <script src="orders.js"></script> -->
    <script src="index.js"></script>
    
  </body>
</html>

<?php
// Close the database connection
$conn->close();
?>
