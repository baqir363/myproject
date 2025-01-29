<?php
    require_once("cnfg.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List Application</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="login">
        <center>
        <h1> ToDo List Application</h1>
        <?php 
            if(isset($_GET['form']))
            {
                if($_GET['form']=="login")
                 { ?>
        <h3>Login</h3>
        <form method="POST"> 
            <input type="email" name="dsa" placeholder="Email Address" required autofocus/>
            <input type="password" name="sad" placeholder="Password" required />
            <input type="submit" name="eqw" value="Login" />

        </form>
        <br />
        <span>Does not have a account? <a class="white" href="indx.php?form=register">Create new account! </a></span>
        <br>
        <span> <a class="white" href="indx.php?forgotpassword=1">Forgot Password? </a></span>
<?php

                 }else{
                    ?>
        <h3>Register Now</h3>
        <form method="POST">
            <input type="text" name="asd" placeholder="Username" required autofocus/>
            <input type="email" name="dsa" placeholder="Email Address" required />
            <input type="password" name="sad" placeholder="Password" required />
            <input type="password" name="das" placeholder="Retype Password" required />
            <input type="submit" name="fds" value="Register" />
        </form>
        <?php
            if(isset($_POST['fds'])){
                $asd= $_POST['asd'];
                $dsa= strtolower($_POST['dsa']);
                $sad= sha1($_POST['sad']);
                $das= sha1($_POST['das']);
                    if($sad == $das)
                    {
                        mysqli_query($db,"INSERT INTO users(usersname, email_address, password)
                         VALUES('".$asd."','".$dsa."','".$sad."') ") OR die(mysqli_error($db));
                            ?>
                            <script>location.assign("indx.php?form=register&registered=1");</script>
        
                        <?php
                        //    echo "Congratulations, your account has been created successfuly."; 
                    }else{
                        ?>
                            <script>location.assign("indx.php?form=register&invlaidregistered=1");</script>
        
                        <?php
                        // echo " Password and Retype Password Mismatched, pleade try again.";
                    }
            }
        ?>
        <!-- <br /> -->
        <span> Already created account? <a class="white" href="indx.php?form=login">Login Now </a></span>
                    <?php
                 }
            }else if(isset($_GET['forgotpassword'])){
                ?>
    <h3>Forgot Password</h3>
    <form method="POST">
        <!-- <input type="text" name="asd" placeholder="Username" required autofocus/> -->
        <input type="email" name="pea" placeholder="Previous Email Address" required />
        <input type="password" name="npa" placeholder="New Password" required />
        <input type="password" name="rnp" placeholder="Retype New Password" required />
        <input type="submit" name="rpa" value="Reset Password" />
    </form>
    <?php
      
    ?>
    <br />
    <span>Remember Your Password? <a class="white" href="indx.php?form=login">Login Now </a></span>
                <?php
             }
            else{
                    ?>
                        <h3>Login</h3>
        <form method="POST"> 
            <input type="email" name="dsa" placeholder="Email Address" required autofocus/>
            <input type="password" name="sad" placeholder="Password" required />
            <input type="submit" name="eqw" value="Login" />
        </form>
        <br />
        <span>Does not have a account? <a class="white" href="indx.php?form=register">Create new account! </a></span>
        <br>
        <span> <a class="white" href="indx.php?forgotpassword=1">Forgot Password? </a></span>
                    <?php
            }      

        ?>
        <br />
        <?php
            if(isset($_GET['invalid']))
            {
                ?>
                    <font color="red">Invalid email or password, please try again.</font>
                <?php
            }else if(isset($_GET['notregistered']))
            {
                ?>
                    <font color="blue">Sorry, it looks like you are not registered, please create your account!.</font>
                <?php
            }else if(isset($_GET['resetpassword']))
            {
                ?>
                <font color="green"> Password changed successfully!</font>
                    
                <?php
            }else if(isset($_GET['invalidpassword']))
            {
                ?>
                <font color="red"> Passwords do not match!</font>
                <?php
            }else if(isset($_GET['invalidemail_address']))
            {
                ?>
                <font color="red"> Invalid Email_address!</font>
                <?php
            }else if(isset($_GET['registered']))
            {
                ?>
                <font color="green"> Congratulations, your account has been created successfuly.</font>
                <?php
            }else if(isset($_GET['invlaidregistered']))
            {
                ?>
                <font color="red">Password and Retype Password Mismatched, pleade try again.</font>
                <?php
            }
        ?>
        </center>
    </div>
    
</body>
</html>

<?php
    if(isset($_POST['eqw'])){
    //    From FORM!
        $dsa= strtolower($_POST['dsa']);
        $sad= sha1($_POST['sad']);

        // Fetching Data of the User
        $fetchingUserData=mysqli_query($db,"SELECT * FROM users WHERE email_address = '".$dsa."'") OR die(mysqli_error($db));
        $isUserRegistered = mysqli_num_rows($fetchingUserData);
        if($isUserRegistered > 0)
        {
            $userData = mysqli_fetch_assoc($fetchingUserData);

            // From Database
            $userEmail = $userData['email_address'];
            $userPassword = $userData['password'];
            $user_id = $userData['id'];
            $username = $userData['usersname'];

            if($dsa == $userEmail AND $sad == $userPassword)
            {   
                session_start();
                $_SESSION['key'] = "Authenticated_User_55518";
                $_SESSION['user_id'] = $user_id;
                $_SESSION['usersname'] = $username;
            ?>
                <script>
                location.assign("dashboard.php");
                </script>
                <?php
            }else{
                ?>
                    <script>location.assign("indx.php?invalid=1");</script>

                <?php
            }
        }else{
            ?>
                <script>location.assign("indx.php?notregistered=1")</script>
            <?php
        }
    }else if(isset($_POST['rpa'])){
        $pea = strtolower($_POST['pea']);
      
        $query = "SELECT * FROM users WHERE email_address = '$pea'";
        $result = mysqli_query($db, $query);
      
        if (mysqli_num_rows($result) > 0) {
          $npa = $_POST['npa'];
          $rnp = $_POST['rnp'];
      
          if ($npa == $rnp) {
            $hpa = sha1($npa);
      
            $query = "UPDATE users SET password = '$hpa' WHERE email_address = '$pea'";
            mysqli_query($db, $query);
      
            ?>
                  <script> location.assign("indx.php?forgotpassword=1&resetpassword=1")</script>	
                  <?php
          } else {
              ?>
              <script> location.assign("indx.php?forgotpassword=1&invalidpassword=1")</script>	
              <?php  }
        } else {
          ?>
          <script> location.assign("indx.php?forgotpassword=1&invalidemail_address=1")</script>	
          <?php  }
    }

?>
