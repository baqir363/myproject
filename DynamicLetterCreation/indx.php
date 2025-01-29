<?php 
    require_once("admin/inc/confg.php");

?>


<!DOCTYPE html>
<html>
<head>
    <title>User Login - Dynamic Letter Creation</title>
<link href="../../../Doctor-Appointment-System_PHP/dams/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <!-- <h2>User Login</h2> -->
    <!-- <form method="post" action=""> -->
        <div class="form-group">

                <?php 
                    if(isset($_GET['sign-up']))
                    {
                ?>
                        <div class="container">
    <h2>User Registration</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="designation">Designation:</label>
            <input type="text" class="form-control" id="designation" name="designation" required>
        </div>
        <div class="form-group">
            <label for="department">Department:</label>
            <input type="text" class="form-control" id="department" name="department" required>
        </div>
        <button type="submit" name="sign_up_btn" class="btn btn-primary">Register</button>
        <a href="indx.php">Login</a>
    </form>
</div>
                <?php
                    }else {
                ?>
                      <div class="container">
    <h2>User Login</h2>
    <form method="post" action="">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" name="loginBtn" class="btn btn-primary">Login</button>
        <a href="?sign-up=1">Sign Up</a>
    </form>
</div>
                <?php
                    }
                    
                ?>

                <?php 
                    if(isset($_GET['registered']))
                    {
                ?>
                        <span class="bg-white text-success text-center my-3"> Your account has been created successfully! </span>
                <?php
                    }else if(isset($_GET['invalid'])) {
                ?>
                        <span class="bg-white text-danger text-center my-3"> Passwords mismatched, please try again! </span>
                <?php
                    }else if(isset($_GET['not_registered'])) {
                ?>
                        <span class="bg-white text-warning text-center my-3"> Sorry, you are not registered! </span>
                <?php
                    }else if(isset($_GET['invalid_access'])) {
                ?>
                        <span class="bg-white text-danger text-center my-3"> Invalid username or password! </span>
                <?php
                    }
                ?>
                       
			</div>
		</div>
	</div>

  
</body>
</html>

<?php 
    require_once("admin/inc/confg.php");

    if(isset($_POST['sign_up_btn']))
    {
        $name = $_POST['name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $designation = $_POST['designation'];
        $department = $_POST['department'];
        $user_role = "User"; 
    
        $sql = "INSERT INTO users (name, username, email, password, designation,department,user_role) VALUES
        ('$name', '$username', '$email', '$password', '$designation','$department','$user_role')";
    
        if ($db->query($sql) === TRUE) {
            // echo "Registration successful!";
            ?>
            <script> location.assign("indx.php?sign-up=1&registered=1"); </script>
        <?php
        }
        else {
    ?>
            <script> location.assign("indx.php?sign-up=1&invalid=1"); </script>
    <?php
        }
             
    }else if(isset($_POST['loginBtn']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Query Fetch / SELECT
        $sql = "SELECT * FROM users WHERE username='$username'";
        $result = $db->query($sql);

        
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            if (password_verify($password, $row['password']))
            {
                session_start();
                $_SESSION['user_role'] = $row['user_role'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['department'] = $row['department'];   
                
                if($row['user_role'] == "Admin")
                {
                    $_SESSION['key'] = "AdminKey";
            ?>
                    <script> location.assign("admin/index.php?homepage=1"); </script>
            <?php
                }else {
                    $_SESSION['key'] = "UsersKey";
            ?>
                    <script> location.assign("users/ondx.php"); </script>
            <?php
                }

            }else {
        ?>
                <script> location.assign("indx.php?invalid_access=1"); </script>
        <?php
            }   


        }else {
    ?>
            <script> location.assign("indx.php?sign-up=1&not_registered=1"); </script>
    <?php

        }

    }

?>