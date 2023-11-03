<?php
// Check if the "submitAttendance" button is clicked
if (isset($_POST["submitAttendance"])) {
  // Get the date for the attendance record 
  $date = date("Y-m-d"); // Assuming a date format like YYYY-MM-DD

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "attendance";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $serials = $_POST["serial"];
  $studentIds = $_POST["roll_number"];
  $names = $_POST["name"];
  $deptNames = $_POST["dept_name"];
  $semesters = $_POST["semester"];
  $sessions = $_POST["session"];
  $course_codes = $_POST["course_code"];
  $currDates = $_POST["date"];
  $attendanceStatuses = $_POST['attendance_hidden'];

  // Loop through the data arrays and insert records into the attendance_details table
  for ($i = 0; $i < count($studentIds); $i++) {
    // Sanitize the input data to prevent SQL injection 
    $studentId = $conn->real_escape_string($studentIds[$i]);
    $serial = $conn->real_escape_string($serials[$i]);
    $name = $conn->real_escape_string($names[$i]);
    $deptName = $conn->real_escape_string($deptNames[$i]);
    $course_code = $conn->real_escape_string($course_codes[$i]);
    $semester = $conn->real_escape_string($semesters[$i]);
    $session = $conn->real_escape_string($sessions[$i]);
    $dateUpdate = $conn->real_escape_string($currDates[$i]);
    $attendanceStatus = $conn->real_escape_string($attendanceStatuses[$studentId]);

    // Insert a new record into the attendance_details table with all the details
    $query = "INSERT INTO attendance_details (serial, student_roll, name, course_code, dept_name, session, semester, status, date) 
              VALUES ('$serial', '$studentId', '$name', '$course_code', '$deptName', '$session', '$semester', '$attendanceStatus', '$dateUpdate')";

    // Execute the SQL query
    if ($conn->query($query) !== TRUE) {
      echo "Error inserting record: " . $conn->error;
    }
  }

  
  // Close the attendance database connection
  $conn->close();
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Document</title>
</head>

<body>
  <div class="popup" id="popup">
    <div class="popup-content">
      <p>Attendance Updated Successfully</p>
    </div>
  </div>

</body>

</html>
