<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("methods.php");
$method = new method();
        if(isset($_POST['submit']))
        {
               $method->upload2($_FILES['file']);
        }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <link rel="stylesheet" href="styles/upload.css" />
    <link rel="stylesheet" href="styles/default.css">
    <meta charset="utf-8">
    <title>Upload Documents</title>
</head>

<body>
    <header class="banner">
        <a href="index.html"><img src="styles/stoodle-logo.png" class="logo"></a>
        <div class="banner-title">Upload Documents</div>
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
        <h2>Upload documents assignments & slides here:</h2>
        <div class="fileupload-container">
        
        <form class="" action="upload.php" method="post" enctype="multipart/form-data">
        <label for="">Choose Your PDF File</label><br>
        <input id="pdf" type="file" name="file" value="" required><br><br>
        <input id="upload" type="submit" name="submit" value="Upload">


        </div>
    </div>

   


</body>

</html>