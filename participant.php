<?php
include("methods.php");
$method = new method();

if(isset($_POST['sub'])){
    $method->import($_FILES['file']['tmp_name']);
}
$query_select = "SELECT studentID,studentName FROM student";
$result = mysqli_query($method, $query_select);


?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
        <link rel="stylesheet" href="styles/participant.css"/>
        <link rel="stylesheet" href="styles/default.css">
        <script src="script/participant.js"></script>
        <meta charset="utf-8">
        <title>Student Roster</title>
</head>

<body>
<header class="banner">
        <a href="index.html"><img src="styles/stoodle-logo.png" class="logo"></a>
        <div class="banner-title">Student Roster</div>
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
        <h2> SOEN 287 - SECTION Q</h2>

            
            <table>
                <tr id = "head">
                    <th> Student ID</th>
                    <th> Student Name </th></tr>

                <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                           
                ?>  
                          <tr>  
                               <td><?php echo $row["studentID"]; ?></td>  
                               <td><?php echo $row["studentName"]; ?></td>  
                          </tr>  
                <?php  
                          }  
                ?>  

            </table>
    
        <h3>Update the student roster by uploading a CSV file</h3>
        <div class="csv">
           <a href="rosterupload.php"><button type = "submit" name="sub" value="import" id="uploadButton">UPLOAD ROSTER</button> </a>
        </div>
    </div>
    


</body>

</html>



