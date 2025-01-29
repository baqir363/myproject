<?php
session_start();
    require_once("knfg.php");
    if($_SESSION['key'] != "VotersKey")
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
    <title>Blood Donation Bank</title>
    <link rel="stylesheet" href="../uncld/css/bootstrap.min.css">
     <link rel="stylesheet" href="../uncld/css/style.css">
     <link rel="stylesheet" href="../uncld/css/login.css">

    
</head>
<body>
<h2>Donor Registration</h2>
    <form method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="blood_group">Blood Group:</label><br>
        <input type="text" id="blood_group" name="blood_group" required><br>
        <label for="contact">Contact:</label><br>
        <input type="text" id="contact" name="contact" required><br><br>
        <input type="date" name="selected_date" required/><br>
        <input type="submit" name="submit_donor" value="Register">
    </form>

    <h2>Blood Request</h2>
    <form method="POST">
        Blood Group:<br>
        <input type="text" name="bloodgrouprequest" required><br><br>
        <input type="submit" name="submitbtn">
    </form>

    <div id="donor_list"></div>
    <?php
    // Donor registration
if(isset($_POST['submit_donor'])) {
    $name = $_POST['name'];
    $blood_group = $_POST['blood_group'];
    $contact = $_POST['contact'];
    date_default_timezone_set("Asia/Karachi");
    $currtime = date("h:i:s a");
    if($_POST['selected_date'] == NULL)
    {
        $selected_date = date("Y-m-d");
    }else {
        $selected_date = $_POST['selected_date'];
    }
    // Date Logic Ends
    $donation_month = date("M",strtotime($selected_date));
    $donation_year = date("Y",strtotime($selected_date));
    $sql = "INSERT INTO donors (name, bloodgroup, contact,date,donationmonth,donationyear,currtime) VALUES
     ('".$name."', '".$blood_group."', '".$contact."','".$selected_date."', '".$donation_month."', '".$donation_year."'
     , '".$currtime."')";
    
    if ($db->query($sql) === TRUE) {
        echo "New donor registered successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
}

// Blood request processing
if(isset($_POST['submitbtn'])) {
    $blood_group_request = mysqli_real_escape_string($db, $_POST['bloodgrouprequest']);	
    
    $sql = mysqli_query($db,"SELECT * FROM donors WHERE bloodgroup='".$blood_group_request."'") OR die(mysqli_error($db));
    $totaldonor = mysqli_num_rows($sql);
  

    if ($totaldonor > 0) {

        echo "Blood donors found for $blood_group_request blood group:<br>";
        
        ?>
        <table cellspacing="0" border="1" cellpadding="0" width="50%">
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Blood Group</th>
            <th>Contact</th>
            <th>Date</th>
            <th>Donation Month</th>
            <th>Donation Year</th>
            <th>Curr Time</th>

        </tr>
        <tr>
    <?php
        while($data = mysqli_fetch_assoc($sql)) {
            ?>
            
             <td><?php echo $data['id']; ?></td>
             <td><?php echo $data['name']; ?></td>
             <td><?php echo $data['bloodgroup']; ?></td>
             <td><?php echo $data['contact']; ?></td>
             <td><?php echo $data['date']; ?></td>
             <td><?php echo $data['donationmonth']; ?></td>
             <td><?php echo $data['donationyear']; ?></td>
             <td><?php echo $data['currtime']; ?></td>
            <?php

        ?>
    </tr>


        <?php
        }
    } else {
        echo "No donors found for $blood_group_request blood group";
    }
?>
    </table>
<?php
}

?>
   
<div class="d-flex mt-3 login_container">
<a href="../logout.php" class="btn login_btn bg-primary">Logout</a>
</div>
</body>
</html>













  <!-- <script>
        function requestBlood() {
    var blood_group = document.getElementById("blood_group_request").value;
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("donor_list").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("POST", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("blood_group=" + blood_group + "&submit_request=1");
    
}
</script>
-->
