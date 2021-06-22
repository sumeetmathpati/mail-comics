<?php

include_once 'connection.php';
include_once 'utils.php';

if(isset($_POST['submit'])) {

	$email = $_POST['email'];
	// This application don't have to use passwords yet.
	// $password=$_POST['password'];
	// $encrypted_password = password_hash($user_password, PASSWORD_DEFAULT);
	$activationcode=md5($email.time());

	$sql = $con->prepare('SELECT email, status, activationcode FROM users WHERE email = ?');
	$sql->bind_param('s', $email); 
	$sql->execute();
	$result = $sql->get_result();
	$row = $result->fetch_assoc();

	// If user don't exist already.
	if ($row < 1) {
		
		$sql = $con->prepare('INSERT INTO users (email, activationcode) VALUES (?, ?)');
		$sql->bind_param('ss', $email, $activationcode);
		$result = $sql->execute();
		$sql->close();

		if ($result) {

			
			sendVerificationMail($email, $activationcode);
			echo '<script>alert(\'Registration successful! Please verify the email using verification link sent to your registered email.\');</script>';

			echo '<script>window.location = \'index.php\';</script>';
			// header("Location: " . (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . "://{$_SERVER['HTTP_HOST']}/index.php", true, 301);
		} else {

			echo '<script>alert(\'Data not inserted\');</script>';
		} 
	} else {

		if ($row['status'] == 0) {

			$activationcode = $row['activationcode'];
			sendVerificationMail($email, $activationcode);

			// echo "<script>alert('You have already registered!');</script>";
			$error = 'You have already registered, please verify the email!';

		} else {
			
			// echo "<script>alert('User Already exists!');</script>";
			$error = 'User Already exists!';
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

	<?php
		if (isset($message)) {
			echo "<div class=\"w3-panel w3-pale-green w3-border\"> <p> $message</p> </div>";
		}
		if (isset($error)) {
			echo "<div class=\"w3-panel w3-pale-red w3-border\"> <p>$error</p> </div>";	
		}
	?>

	<p>Sign up here to recieve comics at every 5 minutes.</p>

	<p>
		<label class="w3-text-blue"><b>Email</b></label>
		<input type="email" name="email" id="email" class="w3-input w3-border" type="text">
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
