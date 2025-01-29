<?php
session_start();
    require_once("enclud/knfg.php");
    if($_SESSION['key'] != "AdminKey")
    {
        echo "<script>location.assign('logout.php');</script>";
        die;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Smart Attendence Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="../student/uncld/css/bootstrap.min.css">
     <link rel="stylesheet" href="../student/uncld/css/style.css">
     <link rel="stylesheet" href="../student/uncld/css/login.css">
</head>
<body>
    <div class="container-fluid">
        <header class="bg-primary text-white text-center mb-3 py-3">
            <div class="row">
                <div class="col-12">
                <h1>SMART ATTENDANCE MANAGEMENT SYSTEM! </h1>
        <h3>STUDENTS ATTENDANCE OF MONTH:<u><?php echo  strtoupper(date("F")); ?>
                </u></h3>
                </div>
            </div>
        </header>
        <div class="row">
            <div class="col-8">
          <?php
            require_once("enclud/SmartAttendanceSheet.php");
            ?>
            </div>
            <div class="col-4">
           <?php
            require_once("enclud/addingStudents.php");
           echo"<hr>";
           require_once("enclud/addAttendance.php");
           ?>
            <div class="d-flex mt-3 login_container">
<a href="logout.php" class="btn login_btn bg-primary">Logout</a>
</div>
            </div>
        </div>
       
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
