<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <link rel="stylesheet" href="styles/student_grades.css" />
  <link rel="stylesheet" href="styles/default.css" />
  <link rel="icon" href="styles/icon.png" />
  <meta charset="utf-8">
  <title>Student Grades</title>
</head>

<body>

  <header class="banner">
    <a href="index.html"><img src="styles/stoodle-logo.png" class="logo"></a>
    <div class="banner-title">Grades</div>
    <ul class="banner-info">
      <li><a href="AboutUs.html">About Us</a></li>
      <li><a href="Support.html">Support</a></li>
    </ul>
  </header>

  <nav>
    <a href="students.html" id="dashboard">Dashboard</a>
    <a href="student_grades.php">Grades</a>
    <a href="scontact_info.html">Contact Info</a>
  </nav>

  <div class="content">

    <h2>SOEN 287 - Section Q</h2>
    <h3>FALL 2022</h3>

    <br>

    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";
    
    $deliv1 = array();
    $deliv2 = array();
    $deliv3 = array();
    $midExam = array();
    $finExam = array();

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    
    $sql = "SELECT studentID, del1, del2, del3, midterm, final FROM student";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<caption>Student Grades</caption>";
        echo "<tr>";
        echo "<th> Student ID </th>";
        echo "<th> Deliverable #1 </th>";
        echo "<th> Deliverable #2 </th>";
        echo "<th> Deliverable #3 </th>";
        echo "<th> Midterm </th>";
        echo "<th> Final </th>";
        echo "</tr>";


        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["studentID"] . "</td>";
            echo "<td>" . $row["del1"] . "</td>";
            $deliv1[] = $row["del1"];
            echo "<td>" . $row["del2"] . "</td>";
            $deliv2[] = $row["del2"];
            echo "<td>" . $row["del3"] . "</td>";
            $deliv3[] = $row["del3"];
            echo "<td>" . $row["midterm"] . "</td>";
            $midExam[] = $row["midterm"];
            echo "<td>" . $row["final"] . "</td>";
            $finExam[] = $row["final"];
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

        echo"<br>";
    echo "<table>";
    echo "<caption>Student Statistics</caption>";
    echo "<tr>";
    echo "<th> </th>";
    echo "<th> Average </th>";
    echo "<th> Median </th>";
    echo "<th> Standard Deviation </th>";
    echo "</tr>";

    $del1_total = array_sum($deliv1);
    $del2_total = array_sum($deliv2);
    $del3_total = array_sum($deliv3);
    $midExam_total = array_sum($midExam);
    $finExam_total = array_sum($finExam);

    sort($deliv1);
    sort($deliv2);
    sort($deliv3);
    sort($midExam);
    sort($finExam);

    $length = count($deliv1);
    $second_half_length = $length / 2;
    $first_half_length = $second_half_length - 1;
    $first_half = $deliv1[$first_half_length];
    $second_half = $deliv1[$second_half_length];
    $median_del1 = ($first_half + $second_half) / 2;

    $length = count($deliv2);
    $second_half_length = $length / 2;
    $first_half_length = $second_half_length - 1;
    $first_half = $deliv2[$first_half_length];
    $second_half = $deliv2[$second_half_length];
    $median_del2 = ($first_half + $second_half) / 2;

    $length = count($deliv3);
    $second_half_length = $length / 2;
    $first_half_length = $second_half_length - 1;
    $first_half = $deliv3[$first_half_length];
    $second_half = $deliv3[$second_half_length];
    $median_del3 = ($first_half + $second_half) / 2;

    $length = count($midExam);
    $second_half_length = $length / 2;
    $first_half_length = $second_half_length - 1;
    $first_half = $midExam[$first_half_length];
    $second_half = $midExam[$second_half_length];
    $median_midterm = ($first_half + $second_half) / 2;

    $length = count($finExam);
    $second_half_length = $length / 2;
    $first_half_length = $second_half_length - 1;
    $first_half = $finExam[$first_half_length];
    $second_half = $finExam[$second_half_length];
    $median_final = ($first_half + $second_half) / 2;

    function std_deviation($arr){
        $arr_size=count($arr);
        $mu=array_sum($arr)/$arr_size;
        $ans=0;
        foreach($arr as $elem){
            $ans+=pow(($elem-$mu),2);
        }
        return sqrt($ans/$arr_size);
    }

    echo "<tr>";
    echo "<td>Deliverable #1</td>";
    echo "<td>" . ($del1_total/count($deliv1)) . "</td>";
    echo "<td>" . $median_del1 . "</td>";
    echo "<td>" . std_deviation($deliv1) . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Deliverable #2</td>";
    echo "<td>" . ($del2_total/count($deliv2)) . "</td>";
    echo "<td>" . $median_del2 . "</td>";
    echo "<td>" . std_deviation($deliv2) . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Deliverable #3</td>";
    echo "<td>" . ($del3_total/count($deliv3)) . "</td>";
    echo "<td>" . $median_del3 . "</td>";
    echo "<td>" . std_deviation($deliv3) . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Midterm</td>";
    echo "<td>" . ($midExam_total/count($midExam)) . "</td>";
    echo "<td>" . $median_midterm . "</td>";
    echo "<td>" . std_deviation($midExam) . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>Final</td>";
    echo "<td>" . ($finExam_total/count($finExam)) . "</td>";
    echo "<td>" . $median_final . "</td>";
    echo "<td>" . std_deviation($finExam) . "</td>";
    echo "</tr>";

    echo "</table>";
    
    mysqli_close($conn);
?>
</body>

</html>