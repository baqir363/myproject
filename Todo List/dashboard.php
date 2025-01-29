<?php
    session_start();
    if($_SESSION['key'] != "Authenticated_User_55518")
    {   
        ?>
            <script>location.assign("logout.php");</script>
        <?php
        die;
    }
  
    require_once("cnfg.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - ToDo List Application</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body class="dashboardBody">
    <header>
        <?php require_once("include/hdr.php"); ?>
    </header>
    <nav>
    
<hr />
<ul>
<a href="dashboard.php"><li>Home</li></a> 
<a href="addNewTask.php"><li>Add New Task</li></a> 
<a href="logout.php"><li>Logout</li></a>
</ul>
<hr />
    </nav>
    <div>
            
<form method="POST">
<label>Change Date: </label>
<input type="date" name="date_filter" required />
<input type="submit" value="Change Date" name="changeDatefilterBtn"/>
</form>
<?php
if(isset($_POST['changeDatefilterBtn']))
{
    $curr_date = $_POST['date_filter'];
}else{
    $curr_date = date("Y-m-d");
}

?>

<?php
    if(isset($_GET['task_id']))
    {
        $updateTaskId = $_GET['task_id'];
        $decodedValue = urldecode(base64_decode($updateTaskId));
        $actualTaskID = round($decodedValue/123456789*12345);

        mysqli_query($db,"UPDATE tasks SET status = 'Accomplished' WHERE id ='".$actualTaskID."'")
         OR die(mysqli_error($db));
        
        ?><center>
        <div style="background-color: white; color: black; width:fit-content">Task Accomplished Successfully!</div>
        </center>
        <?php
    }

?>
<h3>View Tasks</h3>
<center>
<table border="1" cellspacing="0" width="70%">
    <tr>
        <th>S.No</th>
        <th>Description</th>
        <th>Date</th>
        <th>Status</th>
        <th>Action</th>

    </tr>
    <?php
        // Query to fetch Tasks!
        
        $fetchingTasks = mysqli_query($db,"SELECT * FROM tasks WHERE task_date = '".$curr_date."' 
        AND task_added_by_id = '".$_SESSION['user_id']."' ORDER BY status DESC") OR die(mysqli_error($db));
        $isTaskAvaliable = mysqli_num_rows($fetchingTasks);

        if($isTaskAvaliable > 0)
        { $sno = 1;
            while($data = mysqli_fetch_assoc($fetchingTasks))
            {
                $task_id = $data['id'];
                $alteringId = round($task_id * 123456789 /12345);
                $encodedTaskId = urlencode(base64_encode($alteringId));
                
                ?>
                    <tr>
                        <td><center><?php  echo $sno++;   ?></center></td>
                        <td><?php echo $data['task_description'];  ?></td>
                        <td><center><?php  echo date("d-m-Y",strtotime($data['task_date']));?></center></td>
                        <td><center><?php  echo $data['status'];   ?></center></td>
                        <td>
                            <center>
                                <?php
                                    if($data['status'] == 'Pending')
                                    {
                                        ?>
                                            <a href="dashboard.php?task_id=<?php echo $encodedTaskId; ?>"> Accomplish Task</a>
                                        <?php
                                    }else{
                                        ?>
                                       
                                        <img src="WhatsApp Image 2024-01-17 at 7.09.01 PM.jpeg" width="20px">
                                        <img src="WhatsApp Image 2024-01-17 at 7.09.01 PM.jpeg" width="20px">
                                        <img src="WhatsApp Image 2024-01-17 at 7.09.01 PM.jpeg" width="20px">
                               

                                        <?php

                                    
                                    }

                                ?>

                            </center>
                        </td>

                    </tr>

                <?php
            }

        }else{
            ?>
            <tr>
                <td colspan="5"> No any task is avaliable.</td>
            </tr>

            <?php
        }

    ?>

</table>
    </center>
</div>
  

    
</body>
</html>
