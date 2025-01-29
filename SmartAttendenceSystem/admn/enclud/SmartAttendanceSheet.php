<?php

require_once("knfg.php");
$firstDayofMonth = date("1-m-Y");
$totalDaysInMonth = date("t",strtotime($firstDayofMonth));
$fetchingStudents = mysqli_query($db,"SELECT * FROM attendencestudents") OR die(mysqli_error($db));
$totalNumberofStudents = mysqli_num_rows($fetchingStudents);
$studentsNameArray=array();
$studentsIDsArray=array();
$counter=0;
while($students=mysqli_fetch_assoc($fetchingStudents))
 {
    $studentsNameArray[]= $students['studentname'];
    $studentsIDsArray[]= $students['id'];
 }

?>
    
                  <table border="1" cellspacing="0">
<?php
        for($i=1;$i<=$totalNumberofStudents + 2;$i++)
            {
?> 

<?php
                if($i == 1)
                     { 
?>
                    <tr>
                         <td rowspan="2">Names</td>
<?php
                        for($j=1; $j<=$totalDaysInMonth;$j++)            
                             {
?>
                        <td>
<?php 
                                 echo $j; 
?>
                             </td>
<?php
                                    }
?>
                      </tr>
<?php
                            }else  if($i == 2)
                                   { 
?>
                                <tr>
<?php
                                    for($j=0; $j<$totalDaysInMonth;$j++)            
                                            {
?>
                                                    <td>
<?php
 echo date("D",strtotime("+$j days",strtotime($firstDayofMonth))); 
?>
                                                    </td>
<?php
                                                }
?>
                                    </tr>
<?php

?>

<?php
                                 }else 
                                    { 
?>
                                        <tr>
                                            <td>
<?php                                               
                                                echo $studentsNameArray[$counter];
//                                             $re=mysqli_fetch_assoc($fetchingStudents);
// {
//     echo $re['student_name'];
// }
?>
                                            </td>
<?php
                                           for($j=1; $j<=$totalDaysInMonth;$j++)            
                                                  {
?>                                                        
<?php  
date_default_timezone_set("Asia/karachi");
                $dateOfAttendance = date("Y-m-$j");
                $fetchingStudentsAttendance = mysqli_query($db,"SELECT attendanc FROM atendance WHERE studentid = '".$studentsIDsArray[$counter]."' AND currdate = '".$dateOfAttendance ."'") OR die(mysqli_error($db));
                 $isAttendanceAdded = mysqli_num_rows($fetchingStudentsAttendance);
                 if($isAttendanceAdded > 0)
                 {
                    $studentsAttendance = mysqli_fetch_assoc($fetchingStudentsAttendance);
                    if($studentsAttendance['attendanc'] == "P"){
                        $color="green";
                    }else if($studentsAttendance['attendanc'] == "A")
                    {
                        $color="red";
                    }else if($studentsAttendance['attendanc'] == "L")
                    {
                        $color="brown";
                    }else if($studentsAttendance['attendanc'] == "H")
                    {
                        $color="blue";
                    }
                    ?>
                        <!-- <td> -->
                            <?php
                            echo "<td style= 'background-color: $color; color:white'>".$studentsAttendance['attendanc']."</td>"; 
                            // echo $studentsAttendance['attendance'];
                            // ?>
                            <!-- </td> -->
                    <?php
                 }else {
                    ?>
                        <td></td>
                    <?php
                 }                                 
?>
<?php
                                              } 
?>
    </tr>
    
<?php
$counter++;
?>

<?php

                                                    }
                                                                            }

?>
</table>