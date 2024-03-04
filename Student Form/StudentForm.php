
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        th,
        td {
            text-align: center;
        }
        .table{
            max-width: 80vw;
        }
        .section{
            background-color: #fff;
            padding: 1.8rem;
            border-radius: 1rem;
            box-shadow: 0 2rem 3rem rgba(132, 139, 200, 0.18);
            transition: all 0.3s ease;
            max-width: 800px;
            margin: 10px auto;
            min-width: 500px;
           
            
}
.container {
        
        max-width: 800px;
      }

    .btn{
        margin-bottom: 50px;
        margin-top: 20px;
        border-radius: 25px;
        
    }

    input[type="text"],[type="date"]{
  border-radius: 25px;
}
    </style>
</head>
<body>   
<div class="container mt-5">
    <div class="section">
    <center><h2 class="text-left">
        STUDENT SATISFACTION SURVEY QUESTIONNAIRE
    </h2></center>
    <p class="text-left">
        Dear Course Delegate/Student,<br>
        Measurement of student satisfaction is of vital importance to evaluate organizations performance. This questionnaire may help us to identify deficiencies, strengths, weaknesses, threats, risks, and opportunities required to be recognized. Your perception of our service will lead to incremental improvements and others could be significantly beneficial for all interested parties. However, the implementation of improvements remains entirely at the discretion of the management, as proper planning, allocation of funds, and the impact on the organization need to be evaluated before action. Students necessarily may not always be right. Complaints in particular need to be investigated by the relevant head of Departments/Sections for validity and accuracy. Management intends to fulfill the needs and expectations of the student to an extent affordable to the management. The implementation of corrections and corrective action is the responsibility of the Head of Department/section.
    </p></div>
<?php
//Database Connection
include('../db_connection.php');
session_start();
$userID = $_GET['id'];

//Fetch Data
$sql = "SELECT * FROM request_form WHERE request_id = $userID";
$result = mysqli_query($conn, $sql);



//Generate the Form
while ($row = mysqli_fetch_assoc($result) ) {
    
   
echo '<form action="StudentFormSubmit.php?id='.$userID.'"method="post">';
echo'       <div class="form-group section">
            <label for="Course">Course:</label>
            <input type="text" class="form-control" id="CourseName" placeholder="Enter Your Course Name" name="CourseName" value="'.$row['course'].'" required>
        </div>';

echo' <div class="form-group section">
            <label for="CourseCode">Course Code:</label>
            <input type="text" class="form-control" id="CourseCode" placeholder="Enter Course Code" name="CourseCode" value="'.$row['course'].'" required>
        </div>';

echo' <div class="form-group section">
            <label for="Batch">Batch:</label>
            <input type="text" class="form-control" id="Batch" placeholder="Enter Your Batch" name="Batch" value="'.$row['batch_no'].'" required>
        </div>';

echo' <div class="form-group section">
            <label for="calendar">Date Of Survey:</label>
            <input type="date" class="form-control" id="calendar" placeholder="Enter Date Of Survey" name="Date" value="'. date('Y-m-d').'" required>
        </div>';

// Fetch the lecturer names associated with the request_id
$sql2 = "SELECT * FROM lecturer_names WHERE request_id = $userID";
$result2 = mysqli_query($conn, $sql2);

// Check if there are any lecturer names
if (mysqli_num_rows($result2) > 0) {
    // echo '<form >';
    $sectionNumber = 1; // Initialize the section number

    while ($row2 = mysqli_fetch_assoc($result2)) {
        echo '<div class="form-group section">';
        echo '<label for="Name' . $sectionNumber . '">' . $row2['lecturer_name'] . '</label>';
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th></th>';
        echo '<th>Excellent</th>';
        echo '<th>Good</th>';
        echo '<th>Satisfactory</th>';
        echo '<th>Poor</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        echo '<tr>';
        echo '<th>Teaching</th>';
        echo '<td><input type="radio" name="Name' . $sectionNumber . '_Teaching" value="Excellent"></td>';
        echo '<td><input type="radio" name="Name' . $sectionNumber . '_Teaching" value="Good"></td>';
        echo '<td><input type="radio" name="Name' . $sectionNumber . '_Teaching" value="Satisfactory"></td>';
        echo '<td><input type="radio" name="Name' . $sectionNumber . '_Teaching" value="Poor"></td>';
        echo '</tr>';
        echo '<tr>';
        echo '<th>Notes/Handouts</th>';
        echo '<td><input type="radio" name="Name' . $sectionNumber . '_Notes" value="Excellent"></td>';
        echo '<td><input type="radio" name="Name' . $sectionNumber . '_Notes" value="Good"></td>';
        echo '<td><input type="radio" name="Name' . $sectionNumber . '_Notes" value="Satisfactory"></td>';
        echo '<td><input type="radio" name="Name' . $sectionNumber . '_Notes" value="Poor"></td>';
        echo '</tr>';
        echo '</tbody>';
        echo '</table>';
        echo '</div>';
        
        $sectionNumber++; // Increment the section number for the next iteration
    }

}}
// Step 8: Close Database Connection
mysqli_close($conn);
?>

<div class="form-group section">
            <p>
                <label for="TTLP">Teaching Training Learning Process:</label><br>
                Please Comment on Standard of Course Material, Lecture Notes, Presentation & Teaching Method, Attendance, Attitudes & Behaviors.
            </p>
            <textarea class="form-control" id="TTLP" name="TTLP" rows="4" cols="50"></textarea>
        </div>
        <div class="form-group section">
            <label for="Name1">Learning Environment & Infrastructure:</label>
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>Excellent</th>
                    <th>Good</th>
                    <th>Satisfactory</th>
                    <th>Poor</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>CLASSROOMS</th>
                    <td><input type="radio" name="CLASSROOMS" value="Excellent"></td>
                    <td><input type="radio" name="CLASSROOMS" value="Good"></td>
                    <td><input type="radio" name="CLASSROOMS" value="Satisfactory"></td>
                    <td><input type="radio" name="CLASSROOMS" value="Poor"></td>
                </tr>
                <tr>
                    <th>OTHER FACILITIES</th>
                    <td><input type="radio" name="FACILITIES" value="Excellent"></td>
                    <td><input type="radio" name="FACILITIES" value="Good"></td>
                    <td><input type="radio" name="FACILITIES" value="Satisfactory"></td>
                    <td><input type="radio" name="FACILITIES" value="Poor"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group section">
            <p>
                <label for="LEI">Learning Environment & Infrastructure:</label><br>
                Please Comment on Standard of Learning Environment / Infrastructure / Teaching Aid / Equipment.
            </p>
            <textarea class="form-control" id="LEI" name="LEI" rows="4" cols="50"></textarea>
        </div>
        <div class="form-group section">
            <label for="Name1">Support Services:</label>
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>Excellent</th>
                    <th>Good</th>
                    <th>Satisfactory</th>
                    <th>Poor</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th>Support Service from the faculty/Dept</th>
                    <td><input type="radio" name="SupportService" value="Excellent"></td>
                    <td><input type="radio" name="SupportService" value="Good"></td>
                    <td><input type="radio" name="SupportService" value="Satisfactory"></td>
                    <td><input type="radio" name="SupportService" value="Poor"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group section">
            <p>
                <label for="SS">Support Services:</label><br>
                Please Comment on Standard of Support Service from the faculty/Dept.
            </p>
            <textarea class="form-control" id="SS" name="SupportServiceComment" rows="4" cols="50"></textarea>
        </div>
        <div class="form-group section">
            <p>
                <label>Attention of management is drawn to the following significant important issues.</label>
            </p>
            <textarea class="form-control" id="AttentionOfManagement" name="AttentionOfManagement" rows="4" cols="50"></textarea>

        </div>
        <center><button type="submit" class="btn btn-primary btn-block">Submit</button></center>

    </form>
</div>


<!-- Add Bootstrap JS and its dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>