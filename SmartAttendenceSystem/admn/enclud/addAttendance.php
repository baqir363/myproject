<table border="1" cellspacing="0">
<form method="POST">
    <tr>
        <th>Student Name</th>
        <th>P</th>
        <th>A</th>
        <th>L</th>
        <th>H</th>
    </tr>
    <?php
    require_once("knfg.php");
    $fetchingStudents = mysqli_query($db,"SELECT * FROM attendencestudents") OR die(mysqli_error($db));
    while($data=mysqli_fetch_assoc($fetchingStudents))
 {
    $students_name= $data['studentname'];
    $student_id=$data['id'];
    ?>
    <tr>
        <td><?php echo $students_name;?></td>
        <td><input type="checkbox" name="studentPresent[]" id="checkbox1" onclick="toggleCheckbox('checkbox1')" value="<?php echo $student_id; ?>" /></td>
        <td><input type="checkbox" name="studentAbsent[]" id="checkbox2" onclick="toggleCheckbox('checkbox2')" value="<?php echo $student_id; ?>"/></td>
        <td><input type="checkbox" name="studentLeave[]" id="checkbox3" onclick="toggleCheckbox('checkbox3')" value="<?php echo $student_id; ?>"/></td>
        <td><input type="checkbox" name="studentHoliday[]" id="checkbox4" onclick="toggleCheckbox('checkbox4')" value="<?php echo $student_id; ?>"/></td>

    </tr>
    <?php
 }


    ?>
    <tr>
        <td>Select Date (Optional)</td>
        <td colspan="4"> <input type="date" name="selected_date" required/></td>
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
                    mysqli_query($db,"INSERT INTO atendance(studentid,currdate,attendancemonth,attendanceyear,attendanc)
                    VALUES('".$atd ."','".$selected_date."','".$attendance_month."','".$attendance_year."','".$attendance."')") 
                    OR die(mysqli_error($db));
                }   
    }
    if(isset($_POST['studentAbsent']))
    {
        $studentAbsent = $_POST['studentAbsent'];
        $attendance = "A";

        foreach($studentAbsent as $atd)
            {
                mysqli_query($db,"INSERT INTO atendance(studentid,currdate,attendancemonth,attendanceyear,attendanc)
                VALUES('".$atd ."','".$selected_date."','".$attendance_month."','".$attendance_year."','".$attendance."')") OR die(mysqli_error($db));
            }
    }
    if(isset($_POST['studentLeave']))
    {
        $studentLeave = $_POST['studentLeave'];
        $attendance = "L";

        foreach($studentLeave as $atd)
            {
                mysqli_query($db,"INSERT INTO atendance(studentid,currdate,attendancemonth,attendanceyear,attendanc)
                VALUES('".$atd ."','".$selected_date."','".$attendance_month."','".$attendance_year."','".$attendance."')") OR die(mysqli_error($db));
            }
    }
    if(isset($_POST['studentHoliday']))
    {
        $studentHoliday = $_POST['studentHoliday'];
        $attendance = "H";

        foreach($studentHoliday as $atd)
            {
                mysqli_query($db,"INSERT INTO atendance(studentid,currdate,attendancemonth,attendanceyear,attendanc)
                VALUES('".$atd ."','".$selected_date."','".$attendance_month."','".$attendance_year."','".$attendance."')") OR die(mysqli_error($db));
            }
    }
  
   echo "Attendance added successfully";
}





?>









