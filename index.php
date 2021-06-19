<?php

include_once("connection.php");

if(isset($_POST['submit'])) {

	$email=$_POST['email'];
  // This application don't have to use passwords yet.
	// $password=$_POST['password'];
  // $encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
	$activationcode=md5($email.time());

	$sql = mysqli_query($con, "SELECT email, status, activationcode FROM users WHERE email='$email'");
  $row = mysqli_fetch_array($sql);

  // If user don't exist already.
	if (mysqli_num_rows($sql) < 1) {
    
		$query=mysqli_query($con,
		"INSERT INTO users(email, activationcode) 
		VALUES('$email', '$activationcode')"
		);

		if ($query) {

			sendVerificationMail($email, $activationcode);
			echo "<script>alert('Registration successful!');</script>";
			echo "<script>window.location = 'index.php';</script>";
		} else {

			echo "<script>alert('Data not inserted');</script>";
		} 
	} else {

    if ($row['status'] == 0) {

      $activationcode = $row['activationcode'];
      sendVerificationMail($email, $activationcode);

      // echo "<script>alert('You have already registered!');</script>";
      $error = "You have already registered!";

    } else {
      
      // echo "<script>alert('User Already exists!');</script>";
      $error = "User Already exists!";
    }	
	} 
}
?>

<!DOCTYPE html>
<html>
<title>MailComics</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container w3-blue">
  <h2>MailComics</h2>
</div>

<form class="w3-container" name="insert" action="" method="post">
  <p>
    <label>Email</label>
    <input type="email" name="email" id="email" class="w3-input" type="text">
    </p>
    <!-- <p>
    <label>Password</label>
    <input type="password" name="password" id="password" class="w3-input" type="text">
    </p> -->
    <p>
    <button class="w3-button w3-blue" type="submit" name="submit" value="submit">Sign Up</button>
  </p>
</form>


</body>
</html> 
