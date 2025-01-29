<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logins Page</title>
</head>
<body>
    
<select id="user-role" name="user_role">
  <option value="admin">Admin</option>
  <option value="teacher">Teacher</option>
  <option value="student">Student</option>
</select>

<a href="#" id="sign-up-link">Sign Up</a>

<!-- Sign-up form container -->
<div id="sign-up-form-container">
  <!-- Admin sign-up form -->
  <div id="admin-signup-form" style="display: none;">
    <!-- Admin sign-up form fields -->
  </div>

  <!-- Teacher sign-up form -->
  <div id="teacher-signup-form" style="display: none;">
    <!-- Teacher sign-up form fields -->
  </div>

  <!-- Student sign-up form -->
  <div id="student-signup-form" style="display: none;">
    <!-- Student sign-up form fields -->
  </div>
</div>

<!-- Login form -->
<form action="login.php" method="post">
  <input type="text" name="cnic" placeholder="CNIC Number">
  <input type="date" name="dob" placeholder="Date of Birth">
  <select name="user_role">
    <option value="admin">Admin</option>
    <option value="teacher">Teacher</option>
    <option value="student">Student</option>
  </select>
  <button type="submit">Login</button>
  <a href="#" id="sign-up-link">Sign Up</a>
</form>


Login Processing (login.php)

<?php
// Process login form submission
$cnic = $_POST['cnic'];
$dob = $_POST['dob'];
$userRole = $_POST['user_role'];

// Validate user credentials
// ...

// Redirect to sign-up page based on user role
if ($userRole == 'admin') {
  header('Location: admin-signup.php');
} elseif ($userRole == 'teacher') {
  header('Location: teacher-signup.php');
} elseif ($userRole == 'student') {
  header('Location: student-signup.php');
}
?>




<!-- JavaScript: -->
<script>
const userRoleSelect = document.getElementById('user-role');
const signUpLink = document.getElementById('sign-up-link');
const signUpFormContainer = document.getElementById('sign-up-form-container');

userRoleSelect.addEventListener('change', () => {
  const selectedRole = userRoleSelect.value;
  const signUpForm = document.getElementById(`${selectedRole}-signup-form`);

  // Hide all sign-up forms
  signUpFormContainer.querySelectorAll('div').forEach((form) => {
    form.style.display = 'none';
  });

  // Show selected sign-up form
  signUpForm.style.display = 'block';
});

signUpLink.addEventListener('click', (e) => {
  e.preventDefault();
  // Show sign-up form container
  signUpFormContainer.style.display = 'block';
});
</script>
</body>
</html>