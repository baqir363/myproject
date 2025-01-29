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
    <title>Admin Panel - Blood Donation Bank System</title>
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
                <h1>BLOOD DONATION BANK SYSTEM! </h1>
        <h3>STUDENTS DONATION OF MONTH:<u><?php echo  strtoupper(date("F")); ?>
                </u></h3>
                </div>
            </div>
        </header>
        <div class="row">
            <div class="">
          <?php
          
          $query="SELECT * FROM donors";
          $executingQuery= mysqli_query($db,$query) OR die(mysqli_error($db));
          ?>
          <h2>Donor Registration Students</h2>
          <table cellspacing="0" border="1" width="50%">
              <tr>
                  <th>S.NO</th>
                  <th>Student Name</th>
                  <th>Blood Group</th>
                  <th>contact</th>
                  <th>Date</th>
                  <th>Donation Month</th>
                  <th>Donation Year</th>
                  <th>Curr Time</th>
              </tr>
          
          <?php
          $sno=1;
          while($students= mysqli_fetch_assoc($executingQuery))
          {   
              
              ?>
              <tr>
             <td> <?php echo $sno++;?></td>
             <td> <?php echo $students['name'];?></td>
             <td> <?php echo $students['bloodgroup'];?></td>
             <td> <?php echo $students['contact'];?></td>
             <td> <?php echo $students['date'];?></td>
             <td> <?php echo $students['donationmonth'];?></td>
             <td> <?php echo $students['donationyear'];?></td>
             <td> <?php echo $students['currtime'];?></td>
             
              </tr>
          <?php
          }
          ?>
          </table>
          <?php
          
          ?>
        
            </div>
            <div class="">
           <?php
       
  
     
           ?>
     
            </div>
        </div>
       
    </div>
    <div class="d-flex mt-3 login_container">
<a href="logout.php" class="btn login_btn bg-primary">Logout</a>
</div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
