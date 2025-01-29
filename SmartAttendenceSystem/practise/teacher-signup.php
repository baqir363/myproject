

<!DOCTYPE html>
<html>
    
<head>
	<title>Teacher-sign-up</title>
    <link rel="stylesheet" href="../aset/css/bootstrap.min.css">
    <link rel="stylesheet" href="../aset/css/login.css">
	<link rel="stylesheet" href="../aset/css/style.css">
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
					// if(isset($_GET['sign-up']))
					// {
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
<!-- <div class="input-group mb-1">
    <div class="input-group-append">
    <span class="input-group-text"><i class="fas fa-key"></i></span>
    </div> -->
    <!-- <select name="" id="" required>
    <option value="">Choose</option>
    <option value=""><a href="techer.php"> Teacher </a></option>
    <option value=""><a href="../student/stdent.php"> Student </a></option> -->


    <!-- </select>     -->
    <!-- </div> -->
<div class="d-flex justify-content-center mt-2 login_container">
<button type="submit" name="signupbtn" class="btn login_btn">Sign Up</button>
</div>
</form>
</div>


<div class="mt-1">
<div class="d-flex justify-content-center links text-white">
Already Created Account? <a href="../smart.php" class="ml-2 text-white">Sign In</a>
</div>
</div>
<?php
// }	
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
	 
			<script src="../aset/js/bootstrap.min.js"></script>			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

		
</body>
</html>


<?php
	require_once("../admn/enclud/knfg.php");
	if(isset($_POST['signupbtn']))
     	{ 		
	$su_name = mysqli_real_escape_string($db, $_POST['qwe']);
	$su_fathername = mysqli_real_escape_string($db, $_POST['rty']);					
	$su_cnic = mysqli_real_escape_string($db, ($_POST['uio']));					
	$su_dob = mysqli_real_escape_string($db, ($_POST['poi']));	
	$su_retype_dob = mysqli_real_escape_string($db, ($_POST['plm']));					
	$user_role = "Teacher";
	if($su_dob == $su_retype_dob)
	{
		mysqli_query($db,"INSERT INTO teacheruser(name, fathername, cnic, dob, userrole) VALUES('".$su_name."', '".$su_fathername."'
        ,'".$su_cnic."','".$su_dob."','".$user_role."')") or die(mysqli_error($db));
		
		?>
		<script> location.assign("techer.php?sign-up=1&registered=1")</script>
		<?php

	}else{
		?>
		<script> location.assign("techer.php?sign-up=1&invalid=1")</script>
	<?php
	}
}