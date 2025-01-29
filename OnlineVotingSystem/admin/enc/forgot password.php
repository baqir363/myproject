<?php
require_once("konfg.php");
// Database connection
// $db = mysqli_connect("localhost", "username", "password", "database");

// Check connection
// if (!$db) {
//   die("Connection failed: " . mysqli_connect_error());
// }

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $contact_number = $_POST['contact_number'];

  // Check if user exists in database
  $query = "SELECT * FROM users WHERE username = '$username' AND contactno = '$contact_number'";
  $result = mysqli_query($db, $query);

  if (mysqli_num_rows($result) > 0) {
    // Generate new password
    $sha1password = sha1($newPassword);
    // Update password in database
    $query = "UPDATE users SET password = '" . $sha1password . "' WHERE username = '".$username."' AND contactno = '".$contact_number."'";
    mysqli_query($db, $query);

    // Display new password
    echo "Your new password is: $newPassword";
  } else {
    echo "Invalid username or contact number!";
  }
}
?>

<form action="" method="post">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>

  <label for="contact_number">Contact Number:</label>
  <input type="text" id="contact_number" name="contact_number" required>

  <button type="submit">Reset Password</button>
</form>



<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $username = $_POST['username'];
  $contact_number = $_POST['contact_number'];

  $query = "SELECT * FROM users WHERE username = '$username' AND contactno = '$contact_number'";
  $result = mysqli_query($db, $query);

  if (mysqli_num_rows($result) > 0) {
    $newPassword = $_POST['new_password'];
    $retypePassword = $_POST['retype_password'];

    if ($newPassword == $retypePassword) {
      $hashedPassword = sha1($newPassword);

      $query = "UPDATE users SET password = '$hashedPassword' WHERE username = '$username' AND contactno = '$contact_number'";
      mysqli_query($db, $query);

      echo "Password changed successfully!";
    } else {
      echo "Passwords do not match!";
    }
  } else {
    echo "Invalid username or contact number!";
  }
}
?>

<form action="" method="POST">
  <label for="username">Username:</label>
  <input type="text" id="username" name="username" required>

  <label for="contact_number">Contact Number:</label>
  <input type="text" id="contact_number" name="contact_number" required>

  <label for="new_password">New Password:</label>
  <input type="password" id="new_password" name="new_password" required>

  <label for="retype_password">Retype Password:</label>
  <input type="password" id="retype_password" name="retype_password" required>

  <button type="submit">Reset Password</button>
</form>