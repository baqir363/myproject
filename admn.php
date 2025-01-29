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
						<img src="aset/img/banner2.jpg"class="brand_logo" alt="Logo">
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
<input type="text" name="rty" class="form-control input_pass" placeholder="CNIC" required>
</div>
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="text" name="uio" class="form-control input_pass" placeholder="Designation" required>
</div>		
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="password" name="poi" class="form-control input_pass" placeholder="Password" required>
</div>
<div class="input-group mb-2">
<div class="input-group-append">
<span class="input-group-text"><i class="fas fa-key"></i></span>
</div>
<input type="password" name="plm" class="form-control input_pass" placeholder="Retype Password" required>
</div>

<div class="d-flex justify-content-center mt-2 login_container">
<button type="submit" name="signupbtn" class="btn login_btn">Sign Up</button>
</div>
</form>
</div>


<div class="mt-1">
<div class="d-flex justify-content-center links text-white">
Already Created Account? <a href="admn.php" class="ml-2 text-white">Sign In</a>
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
    <input type="password" name="fgh" class="form-control input_pass" placeholder="Password" required>
    
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
<a href="#" class="text-white">Forgot your Password?</a>
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
							<span class="bg-white text-danger text-center my-3"> Password mismatched, please try!</span>
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
							<span class="bg-white text-danger text-center my-3"> Invalid CNIC or Password!</span>
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
	require_once("admin/enclud/knfg.php");
	if(isset($_POST['signupbtn']))
     	{ 		
	$su_name = mysqli_real_escape_string($db, $_POST['qwe']);
	$su_cnic = mysqli_real_escape_string($db, $_POST['rty']);					
	$su_designation = mysqli_real_escape_string($db, ($_POST['uio']));					
	$su_password = mysqli_real_escape_string($db, ($_POST['poi']));
	$su_retype_password = mysqli_real_escape_string($db, ($_POST['plm']));					
	$user_role = "Voter";
	if($su_password == $su_retype_password)
	{
		mysqli_query($db,"INSERT INTO admin(name, cnic, designation,password, userrole) VALUES('".$su_name."',
        '".$su_cnic."','".$su_designation."','".$su_password."','".$user_role."')") or die(mysqli_error($db));
		
		?>
		<script> location.assign("admn.php?sign-up=1&registered=1")</script>
		<?php

	}else{
		?>
		<script> location.assign("admn.php?sign-up=1&invalid=1")</script>
	<?php
	}
}else if(isset($_POST['loginBtn']))

{

	$cnic = mysqli_real_escape_string($db, $_POST['asd']);					
	$password = mysqli_real_escape_string($db, ($_POST['fgh']));					

	$fetchingData = mysqli_query($db,"SELECT * FROM admin WHERE cnic = '".$cnic."'") or die(mysqli_error($db));
	
	if(mysqli_num_rows($fetchingData) > 0)
	{
		$data = mysqli_fetch_assoc($fetchingData);
		
	
		if($cnic == $data['cnic'] AND $password == $data['password'])
		{
			session_start();
			$_SESSION['uzerrole'] = $data['userrole'];
			$_SESSION['uzername'] = $data['name'];
			$_SESSION['uzerid'] = $data['id'];

			if($data['userrole'] == "Admin")
			{
				$_SESSION['key'] = "AdminKey";
					?>
						<script>location.assign("admin/bank.php")</script>
					<?php
			}else{
                $_SESSION['key'] = "VotersKey";
                ?>
                <script>location.assign("student/uncld/donor.php")</script>
                <?php
            }
		}else {
			?>
			<script> location.assign("admn.php?invalid_access=1")</script>	
			<?php
		}
	}else{
		?>
		<script> location.assign("admn.php?not_registered=1")</script>
		<?php
	}

}

?>
