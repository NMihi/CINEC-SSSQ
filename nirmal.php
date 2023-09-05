
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
    </style>
</head>
<body>
<div class="container mt-5">
    <center><h2 class="text-left">
        STUDENT SATISFACTION SURVEY QUESTIONNAIRE
    </h2></center>
    <p class="text-left">
        Dear Course Delegate/Student,<br>
        Measurement of student satisfaction is of vital importance to evaluate organizations performance. This questionnaire may help us to identify deficiencies, strengths, weaknesses, threats, risks, and opportunities required to be recognized. Your perception of our service will lead to incremental improvements and others could be significantly beneficial for all interested parties. However, the implementation of improvements remains entirely at the discretion of the management, as proper planning, allocation of funds, and the impact on the organization need to be evaluated before action. Students necessarily may not always be right. Complaints in particular need to be investigated by the relevant head of Departments/Sections for validity and accuracy. Management intends to fulfill the needs and expectations of the student to an extent affordable to the management. The implementation of corrections and corrective action is the responsibility of the Head of Department/section.
    </p>
<?php
// Step 3: Database Connection
$conn = mysqli_connect("localhost", "root", "", "CINEC_SSSQ");
$userID = $_GET['id'];

// Step 4: Fetch Data
$sql = "SELECT * FROM request_form WHERE request_id = $userID";
$result = mysqli_query($conn, $sql);

$sql2 = "SELECT * FROM lecturer_names WHERE request_id = $userID";
$result2 = mysqli_query($conn, $sql2);

// Step 5: Generate the Form
echo '<form>';
while ($row = mysqli_fetch_assoc($result)) {
    echo '<input type="text" name="Course_name" value="' . $row['program_name'] . '"><br>';
   
echo '<form action="/submit" method="post">';
echo'       <div class="form-group">
            <label for="Course">Course:</label>
            <input type="text" class="form-control" id="CourseName" placeholder="Enter Your Course Name" name="name" value="'.$row['program_name'].'" required>
        </div>';

echo' <div class="form-group">
            <label for="CourseCode">Course Code:</label>
            <input type="text" class="form-control" id="CourseCode" placeholder="Enter Course Code" name="CourseCode" value="'.$row['program_code'].'" required>
        </div>';

echo' <div class="form-group">
            <label for="Batch">Batch:</label>
            <input type="text" class="form-control" id="Batch" placeholder="Enter Your Batch" name="Batch" value="'.$row['batch_no'].'" required>
        </div>';

echo' <div class="form-group">
            <label for="calendar">Date Of Survey:</label>
            <input type="date" class="form-control" id="calendar" placeholder="Enter Date Of Survey" name="calendar" value="'. date('Y-m-d').'" required>
        </div>';

echo'<div class="form-group">
            <label for="Name1">Mr. Dhanushka Agalakada:</label>
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
                    <th>Teaching</th>
                    <td><input type="radio" name="Name1_Teaching" value="Excellent"></td>
                    <td><input type="radio" name="Name1_Teaching" value="Good"></td>
                    <td><input type="radio" name="Name1_Teaching" value="Satisfactory"></td>
                    <td><input type="radio" name="Name1_Teaching" value="Poor"></td>
                </tr>
                <tr>
                    <th>Notes/Handouts</th>
                    <td><input type="radio" name="Name1_Notes" value="Excellent"></td>
                    <td><input type="radio" name="Name1_Notes" value="Good"></td>
                    <td><input type="radio" name="Name1_Notes" value="Satisfactory"></td>
                    <td><input type="radio" name="Name1_Notes" value="Poor"></td>
                </tr>
                </tbody>
            </table>
        </div>
       ';
}


// echo '</form>';

// Step 8: Close Database Connection
mysqli_close($conn);
?>

<div class="form-group">
            <p>
                <label for="TTLP">Teaching Training Learning Process:</label><br>
                Please Comment on Standard of Course Material, Lecture Notes, Presentation & Teaching Method, Attendance, Attitudes & Behaviors.
            </p>
            <textarea class="form-control" id="TTLP" name="TTLP" rows="4" cols="50"></textarea>
        </div>
        <div class="form-group">
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
                    <td><input type="radio" name="Name1_CLASSROOMS" value="Excellent"></td>
                    <td><input type="radio" name="Name1_CLASSROOMS" value="Good"></td>
                    <td><input type="radio" name="Name1_CLASSROOMS" value="Satisfactory"></td>
                    <td><input type="radio" name="Name1_CLASSROOMS" value="Poor"></td>
                </tr>
                <tr>
                    <th>OTHER FACILITIES</th>
                    <td><input type="radio" name="Name1_FACILITIES" value="Excellent"></td>
                    <td><input type="radio" name="Name1_FACILITIES" value="Good"></td>
                    <td><input type="radio" name="Name1_FACILITIES" value="Satisfactory"></td>
                    <td><input type="radio" name="Name1_FACILITIES" value="Poor"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <p>
                <label for="LEI">Learning Environment & Infrastructure:</label><br>
                Please Comment on Standard of Learning Environment / Infrastructure / Teaching Aid / Equipment.
            </p>
            <textarea class="form-control" id="LEI" name="LEI" rows="4" cols="50"></textarea>
        </div>
        <div class="form-group">
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
                    <td><input type="radio" name="Name1_SupportService" value="Excellent"></td>
                    <td><input type="radio" name="Name1_SupportService" value="Good"></td>
                    <td><input type="radio" name="Name1_SupportService" value="Satisfactory"></td>
                    <td><input type="radio" name="Name1_SupportService" value="Poor"></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="form-group">
            <p>
                <label for="SS">Support Services:</label><br>
                Please Comment on Standard of Support Service from the faculty/Dept.
            </p>
            <textarea class="form-control" id="SS" name="SupportService" rows="4" cols="50"></textarea>
        </div>
        <div class="form-group">
            <p>
                <label>Attention of management is drawn to the following significant important issues.</label>
            </p>
            <textarea class="form-control" id="AttentionOfManagement" name="AttentionOfManagement" rows="4" cols="50"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<!-- Add Bootstrap JS and its dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>