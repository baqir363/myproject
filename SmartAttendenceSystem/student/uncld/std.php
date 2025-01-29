<?php
session_start();
    require_once("knfg.php");
    if($_SESSION['key'] != "StudentKey")
    {
        echo "<script>location.assign('../logout.php');</script>";
        die;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student - SMART ATTENDANCE MANAGEMENT SYSTEM!</title>
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


    
<!-- // Function to calculate attendance percentage -->


<div class="d-flex mt-5 login_container">
<form method="POST">
  Student Name: <input type="text" name="studentname" autofocus required>
  <input type="submit" name="submitbtn">
</form>
</div>
<?php

    if(isset($_POST['submitbtn']))
    {
        $studentname = mysqli_real_escape_string($db, $_POST['studentname']);	
        // $query=mysqli_query($db,"INSERT INTO  attendancetable(name) VALUE('".$studentname."')") OR die(mysqli_error($db));
        // if($query === TRUE)
        // {
        //     echo "Attendence recorded successfully." . "<br>";
        // }else {
        //     echo "Error:";
        // }
      
    $query = mysqli_query($db,"SELECT * FROM attendancetable WHERE name = '".$studentname."'")OR die(mysqli_error($db));
    $totalstudent = mysqli_num_rows($query);
    if($totalstudent > 0)
    {    
       
        ?>
        <table cellspacing="0" border="1" cellpadding="0" width="50%">
        <tr>
            <th>Id</th>
            <th>Student Name</th>
            <th>Roll No</th>
            <th>Class</th>
            <th>Session</th>
            <th>Semester</th>
            <th>Date</th>
            <th>Attendance</th>
            <th>Attendance Month</th>
            <th>Attendance Year</th>

        </tr>
    <?php
     $total_classes = 0;
     $attendedclasses = 0;
        while($data = mysqli_fetch_assoc($query))
        {   
            $total_classes++;
            if($data['attended'] == 1)
            {
                $attendedclasses++;
            }
             ?>
            <tr>
             <td><?php echo $data['id']; ?></td>
             <td><?php echo $data['name']; ?></td>
             <td><?php echo $data['rollno']; ?></td>
             <td><?php echo $data['class']; ?></td>
             <td><?php echo $data['session']; ?></td>
             <td><?php echo $data['semester']; ?></td>
             <td><?php echo $data['date']; ?></td>
             <td><?php echo $data['attendance']; ?></td>
             <td><?php echo $data['attendancemonth']; ?></td>
             <td><?php echo $data['attendanceyear']; ?></td>
            </tr>
            <?php
        }

        ?>
        </table>

        <?php
        $attendencepercentage = ($attendedclasses / $total_classes) * 100;
        if($attendencepercentage >=75) 
        {
            echo "<h2> Eligibility for Exam</h2>";
            echo "<p>Congratulation! $studentname is eligible to sit in the exam.</p>";
        }else {
            echo "<h2> Eligibility for Exam</h2>";
            echo "<p>Sorry, $studentname is not eligible to sit in the exam due to low attendance.</p>";
        }
    }else {
        echo "No Attendence records found for $studentname.";
    }
}

?>
<div class="d-flex mt-3 login_container">
<a href="../logout.php" class="btn login_btn bg-primary">Logout</a>
</div>
</body>
</html>












