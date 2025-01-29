<?php
		if(isset($_GET['teachersignup']))
		{
			?>
				<script>
					location.assign("practise/teacher-signup.php");
				</script>
			<?php
		}else if(isset($_GET['studentsignup']))
		{
			?>
				<script>
					location.assign("practise/student-signup.php");
				</script>
			<?php
		}
?>

<!DOCTYPE html>
<html>
    
<head>
	<title>Login - Admin</title>
    <link rel="stylesheet" href="aset/css/bootstrap.min.css">
    <link rel="stylesheet" href="aset/css/login.css">
	<link rel="stylesheet" href="aset/css/style.css">
	</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="aset/img/programming.gif"class="brand_logo" alt="Logo">
					</div>
				</div>

				<?php
					if(isset($_GET['sign-up']))
					{
						?>
<div class="d-flex justify-content-center form_container">
<form method="POST">
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-user"></i></span>
</div>
<input type="text" name="qwe" class="form-control input_user" placeholder="Name" required>
</div>
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="rty" class="form-control input_pass" placeholder="Father Name" required>
</div>
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="uio" class="form-control input_pass" placeholder="CNIC" required>
</div>		
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="poi" class="form-control input_pass" placeholder="Date OF Birth" required>
</div>
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="plm" class="form-control input_pass" placeholder="Retype Date OF Birth" required>
</div>
<div class="input-group mb-1">
    <div class="input-group-append">
    <span class="input-group-text"><i class="fas fa-key"></i></span>
    </div>
    <select name="userrole" id="" required>
    <option value="">Choose</option>
    <option value="Admin"> Admin </option>
    <option value="Teacher"> Teacher </option>
    


    </select>    
    </div>
<div class="d-flex justify-content-center mt-2 login_container">
<button type="submit" name="signupbtn" class="btn login_btn">Sign Up</button>
</div>
</form>
</div>

<div class="mt-2">
<div class="d-flex links text-white">
<!-- <a href="smart.php?teachersignup=1" class="ml-4 text-white">Sign up for Teacher</a> -->

<a href="smart.php?studentsignup=1" class="ml-4 text-white">Sign up for Student</a>
</div>

</div>

<div class="mt-1">
<div class="d-flex justify-content-center links text-white">
Already Created Account? <a href="smart.php" class="ml-4 text-white">Sign In</a>
</div>
</div>
<?php
}else if(isset($_GET['forgotdob']))
{
	?>
<div class="d-flex justify-content-center form_container">
<form method="POST">
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-user"></i></span>
</div>
<input type="text" name="pname" class="form-control input_user" placeholder="Previous Name" required>
</div>
<!-- <div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="rty" class="form-control input_pass" placeholder="Father Name" required>
</div> -->
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="pcnic" class="form-control input_pass" placeholder="Previous CNIC" required>
</div>		
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="ndob" class="form-control input_pass" placeholder="New Date OF Birth" required>
</div>
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="rndob" class="form-control input_pass" placeholder="Retype New DOB" required>
</div>
<!-- <div class="input-group mb-1">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<select name="userrole" id="" required>
<option value="">Choose</option>
<option value="Admin"> Admin </option>
<option value="Teacher"> Teacher </option>
</select>    
</div> -->
<div class="d-flex justify-content-center mt-2 login_container">
<button type="submit" name="resetdobbtn" class="btn login_btn">Reset Date of Birth</button>
</div>
</form>
</div>

<!-- <div class="mt-2"> -->
<!-- <div class="d-flex links text-white"> -->
<!-- <a href="smart.php?teachersignup=1" class="ml-4 text-white">Sign up for Teacher</a> -->
<!-- 
<a href="smart.php?studentsignup=1" class="ml-4 text-white">Sign up for Student</a>
</div>

</div> -->

<div class="mt-1">
<div class="d-flex justify-content-center links text-white">
Already Remember Date of Birth? <a href="smart.php" class="ml-4 text-white">Sign In</a>
</div>
</div>
<?php
}else{
					?>
<div class="d-flex justify-content-center form_container">
    <form method="POST">
    <div class="input-group mb-2">
         <div class="input-group-append">
             <span span class="input-group-text"><i class="fas fa-user"></i></span>
        </div>
        <input type="text" name="asd" class="form-control input_user" placeholder="CNIC" required>
    </div>
    <div class="input-group mb-2">
    <div class="input-group-append">
    <span class="input-group-text"><i class="fas fa-key"></i></span>
    </div>
    <input type="text" name="fgh" class="form-control input_pass" placeholder="Date OF Birth" required>
    
    </div>
    <!-- <div class="input-group mb-2">
    <div class="input-group-append">
    <span class="input-group-text"><i class="fas fa-key"></i></span>
    </div>
    <select name="userrole" id="" required>
    <option value="">Choose</option>
    <option value="Admin"> Admin </option>
    <option value="Teacher"> Teacher </option>
    <option value="Student"> Student </option>	


    </select>    
    </div> -->

<div class="d-flex justify-content-center mt-3 login_container">
<button type="submit" name="loginBtn" class="btn login_btn">Login</button>
</div>
</form>
</div>

<div class="mt-4">
<div class="d-flex justify-content-center links text-white">
Don't have an account? <a href="?sign-up=1" class="ml-2 text-white">Sign Up</a>
</div>
<div class="d-flex justify-content-center links">
<a href="?forgotdob=1" class="text-white">Forgot your DOB?</a>
</div>
</div>
<?php
					}
				?>
				
				<?php
					if(isset($_GET['registered']))
					{
						?>
							<span class="bg-white text-success text-center my-3"> Your account has been created successfullly!</span>
						<?php
					}else if(isset($_GET['invalid']))
					{
						?>
							<span class="bg-white text-danger text-center my-3"> Date Of Birth mismatched, please try!</span>
						<?php
					}
					else if(isset($_GET['not_registered']))
					{
						?>
							<span class="bg-white text-warning text-center my-3"> Sorry, you are not registered!</span>
						<?php
					}
					else if(isset($_GET['invalid_access']))
					{
						?>
							<span class="bg-white text-danger text-center my-3"> Invalid CNIC or Date Of Birthh!</span>
						<?php
					}else if(isset($_GET['resetdob']))
					{
						?>
							<span class="bg-white text-success text-center my-3"> Date of Birth changed successfully!</span>
						<?php
					}else if(isset($_GET['invaliddob']))
					{
						?>
							<span class="bg-white text-danger text-center my-3"> Date of Birth do not match!</span>
						<?php
					}else if(isset($_GET['invalidnameorcnic']))
					{
						?>
							<span class="bg-white text-danger text-center my-3"> Invalid NAME or CNIC!</span>
						<?php
					}
				?>

			</div>
		</div>
	</div>
	 
			<script src="aset/js/bootstrap.min.js"></script>			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

		
</body>
</html>


<?php
	require_once("admn/enclud/knfg.php");
	if(isset($_POST['signupbtn']))
     	{ 		
	$su_name = mysqli_real_escape_string($db, $_POST['qwe']);
	$su_fathername = mysqli_real_escape_string($db, $_POST['rty']);					
	$su_cnic = mysqli_real_escape_string($db, ($_POST['uio']));					
	$su_dob = mysqli_real_escape_string($db, ($_POST['poi']));
	$su_retype_dob = mysqli_real_escape_string($db, ($_POST['plm']));					
	$user_role = mysqli_real_escape_string($db, ($_POST['userrole']));					

	if($su_dob == $su_retype_dob)
	{
		mysqli_query($db,"INSERT INTO users(name, fathername, cnic, dob, userrole) VALUES('".$su_name."', '".$su_fathername."'
        ,'".$su_cnic."','".$su_dob."','".$user_role."')") or die(mysqli_error($db));
		
		?>
		<script> location.assign("smart.php?sign-up=1&registered=1")</script>
		<?php

	}else{
		?>
		<script> location.assign("smart.php?sign-up=1&invalid=1")</script>
	<?php
	}
}else if(isset($_POST['loginBtn']))

{

	$cnic = mysqli_real_escape_string($db, $_POST['asd']);					
	$dateofbirth = mysqli_real_escape_string($db, ($_POST['fgh']));					

	$fetchingData = mysqli_query($db,"SELECT * FROM users WHERE cnic = '".$cnic."'") or die(mysqli_error($db));
	
	if(mysqli_num_rows($fetchingData) > 0)
	{
		$data = mysqli_fetch_assoc($fetchingData);
		
	
		if($cnic == $data['cnic'] AND $dateofbirth == $data['dob'])
		{
			session_start();
			$_SESSION['uzerrole'] = $data['userrole'];
			$_SESSION['uzername'] = $data['name'];
			$_SESSION['uzerid'] = $data['id'];

			if($data['userrole'] == "Admin")
			{
				$_SESSION['key'] = "AdminKey";
					?>
						<script>location.assign("admn/asd.php")</script>
					<?php
			}else{
                $_SESSION['key'] = "TeacherKey";
                ?>
                <script>location.assign("teacher/oncld/tec.php")</script>
                <?php
            }
		}else {
			?>
			<script> location.assign("smart.php?invalid_access=1")</script>	
			<?php
		}
	}else{
		?>
		<script> location.assign("smart.php?not_registered=1")</script>
		<?php
	}

}else if(isset($_POST['resetdobbtn'])) {
	$pname = $_POST['pname'];
  $pcnic = $_POST['pcnic'];

  $query = "SELECT * FROM users WHERE name = '$pname' AND cnic = '$pcnic'";
  $result = mysqli_query($db, $query);

  if (mysqli_num_rows($result) > 0) {
    $ndob = $_POST['ndob'];
    $rndob = $_POST['rndob'];

    if ($ndob == $rndob) {

      $query = "UPDATE users SET dob = '$ndob' WHERE name = '$pname' AND cnic = '$pcnic'";
      mysqli_query($db, $query);

      ?>
			<script> location.assign("smart.php?forgotdob=1&resetdob=1")</script>	
			<?php
    } else {
		?>
		<script> location.assign("smart.php?forgotdob=1&invaliddob=1")</script>	
		<?php  }
  } else {
	?>
	<script> location.assign("smart.php?forgotdob=1&invalidnameorcnic=1")</script>	
	<?php  }
}


?>
