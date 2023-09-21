<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="styles/grades.css" />
  <link rel="stylesheet" href="styles/default.css">
  <meta charset="utf-8">
  <title>Input Grades</title>
</head>

<body>
  <header class="banner">
    <a href="index.html"><img src="styles/stoodle-logo.png" class="logo"></a>
    <div class="banner-title">Input Grades</div>
    <ul class="banner-info">
      <li><a href="AboutUs.html">About Us</a></li>
      <li><a href="Support.html">Support</a></li>
    </ul>
  </header>
  <nav>
    <a href="teachers.html" id="dashboard">Dashboard</a>
    <a href="participant.php">Student List </a>
    <a href="tgrades.php">Input Grades</a>
    <a href="tcontact_info.html">Contact Info</a>
  </nav>

  <div class="content">
  <div class="page">
    <h2>SOEN 287 - Section Q</h2>
    <h3>FALL 2022</h3>

    <div class="container">
      <div id="data">
           
<?php 
  $server = "localhost";
  $user = "root";
  $password = "";
  $dbName = "test";

  $connection = mysqli_connect($server, $user, $password, $dbName);

  if (!$connection) {
      die("Error connecting to the database" . mysqli_connect_error());
  }

  $sql = "SELECT studentID,studentName,del1,del2,del3,midterm,final,feedback FROM student";

  $students = mysqli_query($connection, $sql);

  if (mysqli_num_rows($students) > 0) 
      $headers = ["studentID", "studentName", "del1", "del2", "del3", "midterm","final","feedback"];

      displayTable($students, $headers);


  function displayTable($st, $h)
  {

      echo '<table>';
      echo '<tr>';

      foreach ($h as $k => $v) {

          echo '<th>' . $v . '</th>';
      }

      echo '</tr>';

      while ($student = mysqli_fetch_assoc($st)) {

          echo '<tr>';

          foreach ($h as $key => $value) {
              echo '<td>' . $student[$value] . '</td>';
          }

          echo '</tr>';
      }
      echo '</table>';
  }


  mysqli_close($connection);
  ?>

<h3>Update the student grades by uploading a CSV file</h3>
        <div class="csv">
           <a href="gradesupload.php"><button type = "submit" name="sub" value="import" id="uploadButton">UPLOAD GRADES</button> </a>
        </div>
    

  </div>
</div>

  <script src="script/tgrades.js"></script>

</body>

</html>