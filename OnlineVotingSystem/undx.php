<?php
		require_once("admin/enc/konfg.php");

		$fetcingElections = mysqli_query($db,"SELECT * FROM elections") OR die(mysqli_error($db));
		while($data = mysqli_fetch_assoc($fetcingElections))
		{
			$starting_date = $data['startingdate'];
			$ending_date = $data['endingdate'];
			$curr_date = date("Y-m-d");
			$electionid = $data['id'];
			$status = $data['status'];

			if($status == "Active")
			{
				$date1 = date_create($curr_date);
				$date2 = date_create($ending_date);
				$diff = date_diff($date1,$date2);
		
		
				if((int)$diff->format("%R%a") < 0)
				{
					// Update
					mysqli_query($db,"UPDATE elections SET status = 'Expired' WHERE id= '".$electionid."'") OR die(mysqli_error($db));
				}
			}else if($status == "InActive")
			{
				$date1 = date_create($curr_date);
				$date2 = date_create($starting_date);
				$diff = date_diff($date1,$date2);
		
		
				if((int)$diff->format("%R%a") <= 0)
				{
					mysqli_query($db,"UPDATE elections SET status = 'Active' WHERE id = '".$electionid."'") OR die(mysqli_error($db));
				}
			}

		
		}

?>



<!DOCTYPE html>
<html>
    
<head>
	<title>Login - Online Voting System</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
	<link rel="stylesheet" href="assets/css/style.css">
	</head>
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
						<img src="assets/images/logo.gif"class="brand_logo" alt="Logo">
					</div>
				</div>

				<?php
					if(isset($_GET['sign-up']))
					{
						?>
<div class="d-flex justify-content-center form_container">
<form method="POST">
<div class="input-group mb-3">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-user"></i></span>
</div>
<input type="text" name="qwe" class="form-control input_user" placeholder="username" required>
</div>
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="rty" class="form-control input_pass" placeholder="Contact #" required>
</div>
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="Password" name="uio" class="form-control input_pass" placeholder="Password" required>
</div>		
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="password" name="poi" class="form-control input_pass" placeholder="Retype Password" required>
</div>

<div class="d-flex justify-content-center mt-3 login_container">
<button type="submit" name="signupbtn" class="btn login_btn">Sign Up</button>
</div>
</form>
</div>

<div class="mt-4">
<div class="d-flex justify-content-center links text-white">
Already Created Account? <a href="undx.php" class="ml-2 text-white">Sign In</a>
</div>
</div>
<?php
}else if(isset($_GET['forgotpassword']))
{
	?>
<div class="d-flex justify-content-center form_container">
<form method="POST">
<div class="input-group mb-3">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-user"></i></span>
</div>
<input type="text" name="pusername" class="form-control input_user" placeholder="Previous Username" required>
</div>
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="pcontactno" class="form-control input_pass" placeholder="Previous Contact No" required>
</div>
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="Password" name="npassword" class="form-control input_pass" placeholder="New Password" required>
</div>		
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="password" name="rnpassword" class="form-control input_pass" placeholder="Retype New Password" required>
</div>

<div class="d-flex justify-content-center mt-3 login_container">
<button type="submit" name="resetpasswordbtn" class="btn login_btn">Reset Password</button>
</div>
</form>
</div>

<div class="mt-4">
<div class="d-flex justify-content-center links text-white">
Remember your Password? <a href="undx.php" class="ml-2 text-white">Sign In</a>
</div>
</div>
<?php
}
else{
					?>
<div class="d-flex justify-content-center form_container">
<form method="POST">
<div class="input-group mb-3">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-user"></i></span>
</div>
<input type="text" name="asd" class="form-control input_user" placeholder="Contact #" required>
</div>
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="password" name="fgh" class="form-control input_pass" placeholder="password" required>
</div>

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
<a href="?forgotpassword=1" class="text-white">Forgot your password?</a>
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
							<span class="bg-white text-danger text-center my-3"> Passwords mismatched, please try Again!</span>
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
							<span class="bg-white text-danger text-center my-3"> Invalid Contact Number or Password!</span>
						<?php
					}else if(isset($_GET['alreadyexists']))
					{
						?>
							<span class="bg-white text-danger text-center my-3"> Contact number already exists. Please enter a different contact number.</span>
						<?php
					}else if(isset($_GET['resetpassword']))
					{
						?>
							<span class="bg-white text-success text-center my-3"> Password changed successfully!</span>
						<?php
					}else if(isset($_GET['invalidpassword']))
					{
						?>
							<span class="bg-white text-danger text-center my-3"> Passwords do not match!</span>
						<?php
					}else if(isset($_GET['invalidusernameorcontactno']))
					{
						?>
							<span class="bg-white text-danger text-center my-3"> Invalid username or contact number!</span>
						<?php
					}
				?>

			</div>
		
		</div> 
	</div>
	 
			<script src="assets/js/bootstrap.min.js"></script>			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>  

		
</body>
</html>


<?php
	require_once("admin/enc/konfg.php");

	if(isset($_POST['signupbtn']))
     	{ 		
	$su_username = mysqli_real_escape_string($db, $_POST['qwe']);
	$su_contact_no = mysqli_real_escape_string($db, $_POST['rty']);					
	$su_password = mysqli_real_escape_string($db, sha1($_POST['uio']));					
	$su_retype_password = mysqli_real_escape_string($db, sha1($_POST['poi']));					
	$user_role = "Voter";

	// check contact number existence
	$query = "SELECT * FROM users WHERE contactno = '".$su_contact_no."'";
	$result = mysqli_query($db,$query) or die(mysqli_error($db));
	 if(mysqli_num_rows($result) > 0)
	{
		?>
		<script> location.assign("undx.php?sign-up=1&alreadyexists=1")</script>
		<?php
	}

	else if($su_password == $su_retype_password)
	{
		mysqli_query($db,"INSERT INTO users(username, contactno, password, userrole) VALUES('".$su_username."', '".$su_contact_no."','".$su_password."', '".$user_role."')") or die(mysqli_error($db));
		
		?>
		<script> location.assign("undx.php?sign-up=1&registered=1")</script>
		<?php

	}else{
		?>

		<script> location.assign("undx.php?sign-up=1&invalid=1")</script>
	<?php
	}
}else if(isset($_POST['loginBtn']))

{
	$contact_no = mysqli_real_escape_string($db, $_POST['asd']);					
	$password = mysqli_real_escape_string($db, sha1($_POST['fgh']));					

	$fetchingData = mysqli_query($db,"SELECT * FROM users WHERE contactno = '".$contact_no."'") or die(mysqli_error($db));
	
	if(mysqli_num_rows($fetchingData) > 0)
	{
		$data = mysqli_fetch_assoc($fetchingData);

		if($contact_no == $data['contactno'] AND $password == $data['password'])
		{
			session_start();
			$_SESSION['uzerrole'] = $data['userrole'];
			$_SESSION['uzername'] = $data['username'];
			$_SESSION['uzerid'] = $data['id'];

			if($data['userrole'] == "Admin")
			{
				$_SESSION['key'] = "AdminKey";
					?>
						<script>location.assign("admin/ondx.php?homepage=1")</script>
					<?php
			}else{
				$_SESSION['key'] = "VotersKey";

				?>
				<script>location.assign("voters/andx.php")</script>
				<?php
			}
		}else {
			?>
			<script> location.assign("undx.php?invalid_access=1")</script>	
			<?php
		}
	}else{
		?>
		<script> location.assign("undx.php?sign-up=1&not_registered=1")</script>
		<?php
	}

}else if(isset($_POST['resetpasswordbtn'])) {
	$username = $_POST['pusername'];
  $contact_number = $_POST['pcontactno'];

  $query = "SELECT * FROM users WHERE username = '$username' AND contactno = '$contact_number'";
  $result = mysqli_query($db, $query);

  if (mysqli_num_rows($result) > 0) {
    $newPassword = $_POST['npassword'];
    $retypePassword = $_POST['rnpassword'];

    if ($newPassword == $retypePassword) {
      $hashedPassword = sha1($newPassword);

      $query = "UPDATE users SET password = '$hashedPassword' WHERE username = '$username' AND contactno = '$contact_number'";
      mysqli_query($db, $query);

      ?>
			<script> location.assign("undx.php?forgotpassword=1&resetpassword=1")</script>	
			<?php
    } else {
		?>
		<script> location.assign("undx.php?forgotpassword=1&invalidpassword=1")</script>	
		<?php  }
  } else {
	?>
	<script> location.assign("undx.php?forgotpassword=1&invalidusernameorcontactno=1")</script>	
	<?php  }
}

?>
   
<script>

	// $(document).ready(function() {
	// 	$('#contactno').blur(function() {
	// 		var contactno = $(this).val();
	// 		$.ajax({
	// 			type:'POST',
	// 			url:'undx.php',
	// 			data: {contactno}
	// 			success: function(response) {
	// 				if(response == 'exists')  {
	// 					alert('Contact number already exists.');
	// 				}
	// 			}
	// 		});
	// 	});
	// });
	
</script>