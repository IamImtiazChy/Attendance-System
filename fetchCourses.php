<?php
// fetchCourses.php

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
  
  // Fetch courses based on the selected department
  $sql = "SELECT course_code, course_name FROM courses WHERE dept_name = '$deptName'";
  $result = $conn->query($sql);

  if ($result) {
    $courses = array();
    while ($row = $result->fetch_assoc()) {
      $courses[] = $row;
    }
    echo json_encode($courses);
  } else {
    echo json_encode(array()); // Return an empty array if no courses found
  }
}

$conn->close();
?>
