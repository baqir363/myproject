<?php
session_start();
    require_once("knfg.php");
    if($_SESSION['key'] != "TeacherKey")
    {
        echo "<script>location.assign('../../smart.php');</script>";
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher - SMART ATTENDANCE MANAGEMENT SYSTEM!</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
     integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
     <link rel="stylesheet" href="css/bootstrap.min.css">
     <link rel="stylesheet" href="css/style.css">
     <link rel="stylesheet" href="css/login.css">
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

        <table border="1" cellspacing="0">
<form method="POST">
<label for="name">Name:</label>
    <input type="text" id="name" name="name" autofocus required><br><br>
    
    <label for="roll">Roll No:</label>
    <input type="text" id="roll" name="roll" required><br><br>
    
    <label for="class">Class:</label>
    <select id="class" name="class">
    <option value="">Select Class</option>
        <option value="IET">IET</option>
        <option value="CSS">CSS</option>
        <option value="IT">IT</option>
    </select><br><br>
    
    <label for="session">Session:</label>
    <select id="session" name="session">
    <option value="">Select Session</option>
        <option value="2019-2023">2019-2023</option>
        <option value="2020-2024">2020-2024</option>
        <option value="2021-2025">2021-2025</option>
        <option value="2022-2026">2022-2026</option>
        <option value="2023-2027">2023-2027</option>
    </select><br><br>

    <label for="semester">Semester:</label>
    <select id="semester" name="semester">
    <option value="">Select Semester</option>
        <option value="Semester 2">Semester 2</option>
        <option value="Semester 4">Semester 4</option>
        <option value="Semester 6">Semester 6</option>
        <option value="Semester 8">Semester 8</option>
    </select><br>
    
<br>
    <tr>
    <th>Attendance</th>
        <th>P</th>
        <th>A</th>
        <th>L</th>
        <th>H</th>
    </tr>
    <?php
    require_once("../../admn/enclud/knfg.php");
    // $fetchingStudents = mysqli_query($db,"SELECT * FROM  attendancetable") OR die(mysqli_error($db));
    
 ?>

   
 
 <tr>
    <td>Tick One</td>
     <td><input type="checkbox" name="studentPresent[]" id="checkbox1" onclick="toggleCheckbox('checkbox1')" /></td>
     <td><input type="checkbox" name="studentAbsent[]" id="checkbox2" onclick="toggleCheckbox('checkbox2')" /></td>
     <td><input type="checkbox" name="studentLeave[]" id="checkbox3" onclick="toggleCheckbox('checkbox3')" /></td>
     <td><input type="checkbox" name="studentHoliday[]" id="checkbox4" onclick="toggleCheckbox('checkbox4')"/></td>

 </tr>
 <?php

    ?>
    <tr>
        <td>Select Date (Optional)</td>
        <td colspan="4"> <input type="date" name="selected_date" required/></td>
    </tr>
    <tr>
        <td>Please Add Attended</td>
           <td colspan="4"><center> <input type="checkbox" name="addAttendance" value="1" class="form-control"/></center></td>
        </tr>
        <tr>
           <th colspan="5"> <center> <input type="submit" name="addAttendanceBTN"/></center></th>
        </tr>
</form>
</table>
<script>
    function toggleCheckbox(checkboxId) {
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            if(checkbox.id !== checkboxId) {
                checkbox.checked = false;
            }
        });
    }
</script>
<?php
if(isset($_POST['addAttendanceBTN']))
{
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $roll = mysqli_real_escape_string($db, $_POST['roll']);
    $class = mysqli_real_escape_string($db, $_POST['class']);
    $session = mysqli_real_escape_string($db, $_POST['session']);
    $semester = mysqli_real_escape_string($db, $_POST['semester']);
    $attended = isset($_POST['addAttendance']) ? 1 : 0;
    mysqli_query($db,"UPDATE attendancetable SET attended = '$attended' WHERE name='$name'");
 
    date_default_timezone_set("Asia/Karachi");
    // Date Logic Starts
    if($_POST['selected_date'] == NULL)
    {
        $selected_date = date("Y-m-d");
    }else {
        $selected_date = $_POST['selected_date'];
    }
    // Date Logic Ends
    $attendance_month = date("M",strtotime($selected_date));
    $attendance_year = date("Y",strtotime($selected_date));
  
    if(isset($_POST['studentPresent']))
    {
        $studentPresent = $_POST['studentPresent'];
        $attendance = "P";

            foreach($studentPresent as $atd)
                {
                    mysqli_query($db,"INSERT INTO  attendancetable(id,name,rollno,class,session,semester,date,
                attendance,attendancemonth,attendanceyear,attended)
            VALUES('".$atd ."','".$name."','".$roll."','".$class."','".$session."','".$semester."','".$selected_date."','".$attendance."','".$attendance_month."',
            '".$attendance_year."','".$attended."')") OR 
            die(mysqli_error($db));
                }   
    }
    if(isset($_POST['studentAbsent']))
    {
        $studentAbsent = $_POST['studentAbsent'];
        $attendance = "A";

        foreach($studentAbsent as $atd)
            {    mysqli_query($db,"INSERT INTO  attendancetable(id,name,rollno,class,session,semester,date,
                attendance,attendancemonth,attendanceyear,attended)
            VALUES('".$atd ."','".$name."','".$roll."','".$class."','".$session."','".$semester."','".$selected_date."','".$attendance."','".$attendance_month."',
            '".$attendance_year."','".$attended."')") OR 
            die(mysqli_error($db));
            }
    }
    if(isset($_POST['studentLeave']))
    {
        $studentLeave = $_POST['studentLeave'];
        $attendance = "L";

        foreach($studentLeave as $atd)
            {
                mysqli_query($db,"INSERT INTO  attendancetable(id,name,rollno,class,session,semester,date,
                attendance,attendancemonth,attendanceyear,attended)
            VALUES('".$atd ."','".$name."','".$roll."','".$class."','".$session."','".$semester."','".$selected_date."','".$attendance."','".$attendance_month."',
            '".$attendance_year."','".$attended."')") OR 
            die(mysqli_error($db));
            }
    }
    if(isset($_POST['studentHoliday']))
    {
        $studentHoliday = $_POST['studentHoliday'];
        $attendance = "H";

        foreach($studentHoliday as $atd)
            {  mysqli_query($db,"INSERT INTO  attendancetable(id,name,rollno,class,session,semester,date,
                attendance,attendancemonth,attendanceyear,attended)
            VALUES('".$atd ."','".$name."','".$roll."','".$class."','".$session."','".$semester."','".$selected_date."','".$attendance."','".$attendance_month."',
            '".$attendance_year."','".$attended."')") OR 
            die(mysqli_error($db));
            }
    }
    // if(isset($_POST['addAttendance']))
    // {
    //     $attendaceadd = $_POST['addAttendance'];

    //     foreach($attendaceadd as $atd)
    //         {
    //             mysqli_query($db,"INSERT INTO  attendancetable(id,name,rollno,class,session,semester,date,
    //             attendance,attendancemonth,attendanceyear,attended)
    //         VALUES('".$atd ."','".$name."','".$roll."','".$class."','".$session."','".$semester."','".$selected_date."','".$attendance."','".$attendance_month."',
    //         '".$attendance_year."','".$attendaceadd."')") OR 
    //         die(mysqli_error($db));
    //         }
    // }  
 
  
   echo "Attendance added successfully";
}
?>
<div class="d-flex mt-3 login_container">
<a href="../../admn/logout.php" class="btn login_btn bg-primary">Logout</a>
</div>
<br>  
            </div>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
<?php
?>
<?php
?>
