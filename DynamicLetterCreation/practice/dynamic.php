<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Letter Creation</title>
</head>
<body>
<form method="POST">
    <center>
<label for="list of office"> List of Office</label>
<select name="lis" id="list"> 
<option value="as">--Select Office--</option>
<option value="registrar"> Office of the Registrar</option>
<option value="IET">Office of IET</option>
<option value="IT">Office of IT</option>
<option value="CS">Office of CS</option>
</select>
<br><br>

<label for="To"> To</label>
<select name="to" id="to"> 
<option value="as">--Select To--</option>
<option value="Dr.shafiq">Dr.Shafiq</option>
<option value="Ali">Sir.Ali raza</option>
<option value="Aown">Sir.Aown</option>
<option value="Haseeb">Sir.Haseeb</option>
</select><br><br>

<label for="subject">Subject</label>
<input type="text" name="sub" id="subject">
<br><br>

<textarea name="mess" id="message" cols="50" rows="4" placeholder="Text Area"></textarea>
<br><br>

<label for="from"> From</label>
<select name="fro" id="from"> 
<option value="sa">--Select To--</option>
<option value="m.arif">Muhammad Arif Khan</option>
<option value="Dr.shafiq">Dr.Shafiq</option>
<option value="Ali">Sir.Ali raza</option>
<option value="Aown">Sir.Aown</option>
<option value="Haseeb">Sir.Haseeb</option>
</select><br><br>

<label for="designation"> Designation</label>
<select name="des" id="designation"> 
<option value="da">--Select To--</option>
<option value="vc"> Vice Chancellor</option>
<option value="registrar">Registrar</option>
<option value="hod">HOD</option>
</select><br><br>

    
<label for="cc">CC:</label>
<br>
<select name="cc" id="c">
    <option value="fa">--Select To--</option>
    <option value="sec">Secretary to Vice Chancellor, MCUT DG Khan.</option>
    <option value="tre">Treasurer MCUT DG Khan.</option>
    <option value="res">Resident Auditor, MCUT DG Khan.</option>
    <option value="cont">Controller Examination MCUT DG Khan.</option>
    <option value="inc">Incharge/HOD Computing & Information Technology.</option>
    <option value="tra">Transport Officer MCUT DG Khan.</option>
    <option value="off">Office Copy.</option>
</select><br><br>
<input type="date" name="selected_date" required/>
<br><br>
<input type="submit" name="createbtn">
</form>
</center>
<?php
require_once("confg.php");
if(isset($_POST['createbtn']))
{
    $listofoffice = mysqli_real_escape_string($db, $_POST['lis']);
    $to = mysqli_real_escape_string($db, $_POST['to']);
    $subject = mysqli_real_escape_string($db, $_POST['sub']);
    $message = mysqli_real_escape_string($db, $_POST['mess']);
    $from = mysqli_real_escape_string($db, $_POST['fro']);
    $designation = mysqli_real_escape_string($db, $_POST['des']);
    $cc = mysqli_real_escape_string($db, $_POST['cc']);
 
    date_default_timezone_set("Asia/Karachi");
    $currtime = date("h:i:s a");
    
    // Date Logic Starts
    if($_POST['selected_date'] == NULL)
    {
        $selected_date = date("Y-m-d");
    }else {
        $selected_date = $_POST['selected_date'];
    }
    // Date Logic Ends
    $letter_month = date("M",strtotime($selected_date));
    $letter_year = date("Y",strtotime($selected_date));
            
        mysqli_query($db,"INSERT INTO  dynamic(listofoffice,tos,subject,message,froms,designation,cc,currdate,lettermonth,letteryear)
        VALUES('".$listofoffice ."','".$to."','".$subject."','".$message."','".$from."','".$designation."','".$cc."',
        '".$selected_date."','".$letter_month."','".$letter_year."')") OR 
        die(mysqli_error($db));
                
   
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
 
  
   echo "Letter Create Successfully";
}
?>




</body>
</html>