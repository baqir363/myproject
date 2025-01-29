<?php
    session_start();
    if($_SESSION['key'] != "Authenticated_User_55518")
    {   
        ?>
            <script>location.assign("logout.php");</script>
        <?php
        die;
    }
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Task - Todo List Application</title>
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
    <center>
<table width="50%" border="1" cellspacing="0">
   
<form method="POST">
   
    <tr>
        <td>Task Description</td>
        <td><input type="text" name="task_description" style="width: 97%;" required autofocus></td>
    </tr>
    <tr>
        <td>Select Date (Optional)</td>
        <td><input type="date" name="task_date" style="width: 98%;" ></td>
    </tr>
    <tr>
        <td colspan="2"><center><input type="submit" value="Add Task" name="addTask"></center></td>
    </tr>

    </form>

</table>

    <br />

    <?php
    if(isset($_GET['added']))
    {
        ?>
            <div style="background-color: white; color:black; width:fit-content">Task Added Successfully</div>

<?php
    }


?>
<br /><br />
    <b><i>Task Developed by Muhammad Baqir</i></b>
</center>

    </div>
    
</body>
</html>


<?php
    if(isset($_POST['addTask']))
    {   require_once("cnfg.php");
        $task_description = $_POST['task_description'];
        $status = "Pending";
        $task_added_on_date = date("Y-m-d");
        $task_added_by_id =  $_SESSION['user_id'];

        if($_POST['task_date'] == "")
        {
            $task_date = date("Y-m-d"); 
        }else{
            $task_date = $_POST['task_date'];
        }
        // Insert Query!
mysqli_query($db, "INSERT INTO tasks(task_description,task_date,status,task_added_by_id,task_added_on_date)
VALUE('".$task_description ."','".$task_date ."','".$status ."','".$task_added_by_id ."','".$task_added_on_date ."')
")  OR die(mysqli_error($db));

        ?>
            <script>
                location.assign("addNewTask.php?added=1");
            </script>

        <?php
    }
?>