

<!DOCTYPE html>
<html>
    
<head>
	<title>Login - Student</title>
    <link rel="stylesheet" href="uncld/css/bootstrap.min.css">
    <link rel="stylesheet" href="../aset/css/login.css">
	<link rel="stylesheet" href="uncld/css/style.css">
	</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="../aset/img/programming.gif"class="brand_logo" alt="Logo">
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
<input type="text" name="qwe" class="form-control input_user" placeholder="Full Name" required>
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
<input type="text" name="uio" class="form-control input_pass" placeholder="Roll No" required>
</div>		
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="plm" class="form-control input_pass" placeholder="Class" required>
</div>
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="okn" class="form-control input_pass" placeholder="Session" required>
</div>	
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="ijb" class="form-control input_pass" placeholder="Semester" required>
</div>	
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="uhv" class="form-control input_pass" placeholder="CNIC" required>
</div>	
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="ygc" class="form-control input_pass" placeholder="Date Of Birth" required>
</div>
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="tfx" class="form-control input_pass" placeholder="Retype Date Of Birth" required>
</div>		
<!-- <div class="input-group mb-2">
    <div class="input-group-append">
    <span class="input-group-text"><i class="fas fa-key"></i></span>
    </div>
    <select name="" id="" required>
    <option value="">Choose</option>
    <option value=""><a href="../teacher/techer.php"> Teacher </a></option>
    <option value=""><a href="../student/stdent.php"> Student </a></option>


    </select>    
    </div> -->
<div class="d-flex justify-content-center mt-3 login_container">
<button type="submit" name="signupbtn" class="btn login_btn">Sign Up</button>
</div>
</form>
</div>


<div class="mt-4">
<div class="d-flex justify-content-center links text-white">
Already Created Account? <a href="stdent.php" class="ml-2 text-white">Sign In</a>
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
    <select name="" id="" required>
    <option value="">Choose</option>
    <option value=""><a href="../smart.php"> Admin </a></option>
    <option value=""><a href="../teacher/techer.php"> Teacher </a></option>
    <option value=""><a href="../student/stdent.php"> Student </a></option>


    </select>    
    </div> -->

<div class="d-flex justify-content-center mt-3 login_container">
<button type="submit" name="loginBtn" class="btn login_btn">Login</button>
</div>
</form>
</div>

<div class="mt-1">
<div class="d-flex links text-white">
<a href="../smart.php" class="ml-4 text-white">Sign in for Admin and Teacher</a>
</div>

</div>
<div class="mt-1">
<div class="d-flex justify-content-center links text-white">
Don't have an account? <a href="?sign-up=1" class="ml-4 text-white">Sign Up</a>
</div>
<div class="d-flex justify-content-center links">
<a href="#" class="text-white">Forgot your DOB?</a>
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
					}
				?>

			</div>
		</div>
	</div>
	 
			<script src="uncld/js/bootstrap.min.js"></script>			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

		
</body>
</html>


<?php
	require_once("../admn/enclud/knfg.php");
	if(isset($_POST['signupbtn']))
     	{ 		
	$su_name = mysqli_real_escape_string($db, $_POST['qwe']);
	$su_fathername = mysqli_real_escape_string($db, $_POST['rty']);
	$su_rollno = mysqli_real_escape_string($db, $_POST['uio']);					
	$su_class = mysqli_real_escape_string($db, $_POST['plm']);					
	$su_session = mysqli_real_escape_string($db, $_POST['okn']);					
	$su_semester = mysqli_real_escape_string($db, $_POST['ijb']);					
	$su_cnic = mysqli_real_escape_string($db, ($_POST['uhv']));					
	$su_dob = mysqli_real_escape_string($db, ($_POST['ygc']));
	$su_retype_dob = mysqli_real_escape_string($db, ($_POST['tfx']));
	$userrole = "Student";					
	if($su_dob == $su_retype_dob)
	{
		mysqli_query($db,"INSERT INTO studentuser(name, fathername,rollno,class,session,semester,cnic, dob, userrole) VALUES('".$su_name."',
         '".$su_fathername."','".$su_rollno."','".$su_class."','".$su_session."','".$su_semester."','".$su_cnic."',
         '".$su_dob."','".$userrole."')") or die(mysqli_error($db));
		
		?>
		<script> location.assign("stdent.php?sign-up=1&registered=1")</script>
		<?php

	}else{
		?>
		<script> location.assign("stdent.php?sign-up=1&invalid=1")</script>
	<?php
	}
}else if(isset($_POST['loginBtn']))

{

	$cnic = mysqli_real_escape_string($db, $_POST['asd']);					
	$dateofbirth = mysqli_real_escape_string($db, ($_POST['fgh']));					

	$fetchingData = mysqli_query($db,"SELECT * FROM studentuser WHERE cnic = '".$cnic."'") or die(mysqli_error($db));
	
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
						<script>location.assign("../admn/asd.php")</script>
					<?php
			}else{
				$_SESSION['key'] = "StudentKey";

				?>
				<script>location.assign("uncld/std.php")</script>
				<?php
			}
		}else {
			?>
			<script> location.assign("stdent.php?invalid_access=1")</script>	
			<?php
		}
	}else{
		?>
		<script> location.assign("stdent.php?sign-up=1&not_registered=1")</script>
		<?php
	}

}

?>
