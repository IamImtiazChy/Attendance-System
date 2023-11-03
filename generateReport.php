<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles3.css">
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <title>Student Attendance Report</title>
  <!-- JavaScript to update course codes based on selected department -->
  <script>
    $(document).ready(function() {
      // Initialize the course code dropdown with a default option
      $('#course_code').html('<option value="" disabled selected>Select Course</option>');

      $('#dept_name').change(function() {
        var deptName = $(this).val();
        var courseCodeInput = $('#course_code');

        // Reset the course code dropdown
        courseCodeInput.html('<option value="" disabled selected>Loading...</option>');

        // Use AJAX to fetch course codes based on the selected department
        $.ajax({
          url: 'fetchCourses.php',
          method: 'POST',
          data: { deptName: deptName },
          dataType: 'json',
          success: function(data) {
            // Clear previous options
            courseCodeInput.empty();

            // Add new options based on the fetched courses
            if (data.length > 0) {
              for (var i = 0; i < data.length; i++) {
                courseCodeInput.append($('<option>', {
                  value: data[i].course_code,
                  text: data[i].course_code
                }));
              }
            } else {
              // If no courses found, show a default option
              courseCodeInput.append($('<option>', {
                value: '',
                text: 'No Courses Found'
              }));
            }
          },
          error: function() {
            // Handle AJAX error here
            console.log('Error fetching course codes');
          }
        });
      });
    });
  </script>

</head>
<body>
  <div class="title"><h1>Generate Student Attendance Report</h1></div>
  
  <form method="post">
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" required><br>

    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" required><br>

    <div class="form-field">
    <label for="dept_name">Department:</label>
    <!-- <input type="text" name="dept_name" required> -->
    <select id="dept_name" name="dept_name" required>
    <option value="" disabled selected>Select Department</option>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "attendance";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
      // Fetch department names from the 'department' table and populate the dropdown
      $sql = "SELECT dept_name FROM department";
      $result = $conn->query($sql);

      if (!$result) {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<option value="' . $row["dept_name"] . '">' . $row["dept_name"] . '</option>';
        }
      }
    ?>
  </select>
    
    </div class="form-field">
    <br>

    <div class="form-field">
    <label for="course_code">Course Code:</label>
    <!-- <input type="text" name="course_code" required> -->
    <select id="course_code" name="course_code" required>
        <!-- The course code options will be populated dynamically via JavaScript -->
      </select>
   
    </div class="form-field">
    <br>

    <label for="session">Session:</label>
    <input type="text" name="session" required><br>

    <div class="form-field">
    <label for="semester">Semester:</label> 
    <!-- <input type="text" name="semester" required> -->
    <select type="text" name="semester" id="semester" required>
        <option value="" disabled selected>Select Semester</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
      </select>
   
    </div class="form-field">
    <br>

    <input type="submit" value="Generate Report">
  </form>

  <tbody class="table-container">
  <?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Include fetchData function here
function fetchData($tableName) {
    global $conn;
    $data = array();
    
    $sql = "SELECT * FROM $tableName";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    
    return $data;
}

// Process the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $deptName = $_POST["dept_name"];
  $courseCode = $_POST["course_code"];
  $session = $_POST["session"];
  $semester = $_POST["semester"];

  // Query the attendance records based on the selected criteria
  $sql = "SELECT student_roll, name, course_code, dept_name, session, semester,
          COUNT(DISTINCT date) AS total_days,
          SUM(CASE WHEN status = 'present' THEN 1 ELSE 0 END) AS present_count
          FROM attendance_details
          WHERE dept_name = '$deptName'
          AND course_code = '$courseCode'
          AND session = '$session'
          AND semester = '$semester'
          GROUP BY student_roll, name, course_code, dept_name, session, semester";

  $result = $conn->query($sql);

  if ($result) {
    // Calculate attendance percentages and display the report in a table
    echo '<table>';
    echo '<tr><th>Student Roll</th><th>Name</th><th>Course Code</th><th>Department</th><th>Session</th><th>Semester</th><th>Total Class Held</th><th>Present</th><th>Attendance Percentage</th><th>Attendance Marks</th></tr>';
    
    while ($row = $result->fetch_assoc()) {
      $studentRoll = $row["student_roll"];
      $name = $row["name"];
      $courseCode = $row["course_code"];
      $deptName = $row["dept_name"];
      $session = $row["session"];
      $semester = $row["semester"];
      $totalDays = $row["total_days"];
      $presentCount = $row["present_count"];
      
      // Calculate the attendance percentage
      $attendancePercentage = ($totalDays > 0) ? ($presentCount / $totalDays) * 100 : 0;

      // Calculate attendance marks (assuming 5% for full attendance)
      $attendanceMarks = ($attendancePercentage * 5) / 100;
      
      echo '<tr>';
      echo '<td>' . $studentRoll . '</td>';
      echo '<td>' . $name . '</td>';
      echo '<td>' . $courseCode . '</td>';
      echo '<td>' . $deptName . '</td>';
      echo '<td>' . $session . '</td>';
      echo '<td>' . $semester . '</td>';
      echo '<td>' . $totalDays . '</td>';
      echo '<td>' . $presentCount . '</td>';
      echo '<td>' . number_format($attendancePercentage, 2) . '%' . '</td>';
      echo '<td>' . number_format($attendanceMarks, 2) . '</td>';
      echo '</tr>';
    }
    
    echo '</table>';
  } else {
    echo 'Error executing query: ' . $conn->error;
  }
}

?>
</tbody>

</body>
</html>
