<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "attendance";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $deptName = $_POST["deptName"];
  $semester = $_POST["semester1"];
  $courseCode = $_POST["course_code"];
  $todayDate = $_POST["select_date"];
  $session = $_POST["session"];


  $sql2 = "SELECT * FROM students WHERE dept_name ='$deptName' AND session ='$session'";
  $result2 = $conn->query($sql2);
  if (!$result2) {
    die("Error executing the query: " . $conn->error); // Handle the query error
  }
}

require_once 'fetchData.php';

$departments = fetchData("department");
$courses = fetchData("courses");


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mark Attendance</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="stylesheet" href="styles2.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>

</head>

<body>
  <div class="container">

    <div class="content">
      <div class="section-title">Student Attendance System</div>
      <form action="index.php" method="post">
        <div class="form-section">
          <div class="form-row">
            <div class="form-field">
              <label for="dateInput">Select Date:</label>
              <input type="date" name="select_date" id="date">
            </div>
          </div>
          <div class="form-row">
            <div class="form-field">
              <label for="studentIDInput">Dept Name:</label>
              <!-- <input type="text" name="deptName" id="deptName"> -->
              <select class="form-control" id="deptName" name="deptName">
                <?php foreach ($departments as $department) { ?>
                  <option value="<?php echo $department["dept_name"]; ?>"><?php echo $department["dept_name"]; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-field">
              <label for="semester">Semester:</label>
              <!-- <input type="number" name="semester" id="semester"> -->
              <select name="semester1" id="semester1">
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
                <option value="1">4</option>
                <option value="1">5</option>
                <option value="1">6</option>
                <option value="1">7</option>
                <option value="1">8</option>

              </select>
            </div>
          </div>
          <div class="form-row">
            <div class="form-field">
              <label for="sessionInput">Session:</label>
              <input type="text" name="session" id="session">
            </div>
          </div>
          <div class="form-row">
            <div class="form-field">
              <label for="courseCodeInput">Course:</label>
              <select class="form-control" id="course_code" name="course_code">
                   <!-- Options will be populated dynamically using JavaScript -->
              </select>
            </div>
          </div>
        </div>
        <div class="form-buttons">
          <input type="submit" name="fetchDetails" class="submit-button" value="Fetch Details">
          <!-- <input type="submit" name="submitDetails" class="submit-button" value="Submit"> -->
            <button class="generate-report-button">See Report</button>
        </div>
      </form>

      <div class="table-section">
        <table id="attendanceTable">
          <thead>
            <tr>
              <th>Student ID</th>
              <!-- <th>Serial</th> -->
              <th>Student Name</th>
              <!-- <th>Course Name</th> -->
              <th>Dept name</th>
              <th>Course Code</th>
              <th>Session</th>
              <th>Semester</th>
              <th>Attendance</th>
            </tr>
          </thead>
          <tbody id="attendanceTableBody">
            <form id="attendanceForm" method="post" action="process_attendance.php">
              <?php

              // Loop through the retrieved records and display them in the table
              $attendanceStatus = "";
              if (isset($_POST["fetchDetails"])) {
                if (isset($result2) && $result2->num_rows > 0) {
                  while ($row = $result2->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["roll_number"] . "</td>";
                    // echo "<td>" . $row["serial"] . "</td>";

                    echo "<td>" . $row["name"] . "</td>";
                    // echo "<td>" . $courseName . "</td>";
                    echo "<td>" . $row["dept_name"] . "</td>";
                    echo "<td>" . $_POST["course_code"] . "</td>";
                    echo "<td>" . $row["session"] . "</td>";
                    echo "<td>" . $row["semester"] . "</td>";

                    $studentId = $row["roll_number"];
                    // echo "<td>";

                    echo "<td>";
                    // echo "<label><input type='radio' name='attendance[$studentId]' value='present' " . ($attendanceStatus === 'present' ? 'checked' : '') . "> Present</label> | ";
                    // echo "<label><input type='radio' name='attendance[$studentId]' value='absent' " . ($attendanceStatus === 'absent' ? 'checked' : '') . "> Absent</label>";
                    echo "<label><input type='radio' name='attendance[$studentId]' value='present'> Present</label> | ";
                    echo "<label><input type='radio' name='attendance[$studentId]' value='absent'> Absent</label>";
                    echo "</td>";

                    // echo "<td><a href='update_student.php?student_id=$studentId'>Edit</a> | <a href='deleteStudents.php?student_id=$studentId' onclick='return confirm(\"Are you sure you want to delete this student record?\")'>Delete</a></td>";

                    // echo "</tr>";

                    // Store the values in hidden fields within the form
                    echo "<input type='hidden' name='serial[]' value='" . $row["serial"] . "'>";
                    echo "<input type='hidden' name='roll_number[]' value='" . $row["roll_number"] . "'>";
                    echo "<input type='hidden' name='name[]' value='" . $row["name"] . "'>";
                    echo "<input type='hidden' name='dept_name[]' value='" . $row["dept_name"] . "'>";
                    echo "<input type='hidden' name='semester[]' value='" . $row["semester"] . "'>";
                    echo "<input type='hidden' name='course_code[]' value='" . $_POST["course_code"] . "'>";
                    echo "<input type='hidden' name='session[]' value='" . $row["session"] . "'>";
                    echo "<input type='hidden' name='attendance_hidden[$studentId]' value=''>";
                    // echo "<input type="hidden" name='attendance_hidden[<?php echo $row["roll_number"]; 
                    echo "<input type='hidden' name='date[]' value='" . $todayDate . "'>";

                    echo "</tr>";
                  }
                } else {
                  echo "<tr><td colspan='7'>No records found</td></tr>";
                }
              }

              // echo "<td><a href='update_student.php'>Submit</a></td>";
              $conn->close();
              ?>

              <input type="submit" name="submitAttendance" id="submitAttendance" value="Submit Attendance">
               <!-- <a href="generateReport.php" class="generate-report-button">Generate Report</a> -->
                <!-- <input type="submit" name="fetchDetails" class="submit-button" value="Fetch Details"> -->
            </form>

          </tbody>
        </table>
        <!-- <div class="download-button">
        <button onclick="downloadTable()">Download</button>
      </div> -->
      </div>
    </div>
  </div>
  <script>

    // JavaScript to handle the "Generate Report" button click
  document.addEventListener("DOMContentLoaded", function() {
    const generateReportButton = document.querySelector(".generate-report-button");

    if (generateReportButton) {
      generateReportButton.addEventListener("click", function(event) {
        // Prevent the default link behavior
        event.preventDefault();

        // Redirect to the generateReport.php page
        window.location.href = "generateReport.php";
      });
    }
  });




    $(document).ready(function() {
      $('input[type=radio]').change(function() {
        var studentId = $(this).closest('tr').find('td:first').text();
        var attendanceValue = $(this).val();

        $('input[name="attendance_hidden[' + studentId + ']"]').val(attendanceValue);
      });
    });


    $(document).ready(function() {
    // Function to fetch courses based on the selected department
    function fetchCourses(deptName) {
      $.ajax({
        type: "POST",
        url: "fetchCourses.php", // Create a PHP file to fetch courses based on department
        data: { deptName: deptName },
        success: function(data) {
          // Parse the JSON response and populate the "Course" dropdown
          var courses = JSON.parse(data);
          var courseDropdown = $("#course_code");
          courseDropdown.empty();
          $.each(courses, function(index, course) {
            courseDropdown.append(
              $("<option>")
                .attr("value", course.course_code)
                .text(course.course_code + " " + course.course_name)
            );
          });
        },
      });
    }

    // Event handler for the "Dept Name" dropdown change event
    $("#deptName").change(function() {
      var selectedDept = $(this).val();
      if (selectedDept !== "") {
        fetchCourses(selectedDept);
      } else {
        // Clear the "Course" dropdown if no department is selected
        $("#course_code").empty();
      }
    });
  });



  </script>

  <!-- <script src="script.js"></script> -->
</body>

</html>