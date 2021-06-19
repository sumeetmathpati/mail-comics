
<?php
include 'connection.php';

if(!empty($_GET['code']) && isset($_GET['code'])) {

	$code = $_GET['code'];

	$sql = mysqli_query($con,"SELECT * FROM users WHERE activationcode='$code'");
	$num = mysqli_fetch_array($sql);

	if($num > 0) {

		$status = 0;
		$result = mysqli_query($con,"SELECT id FROM users WHERE activationcode='$code' and status='$status'");
		$result_array=mysqli_fetch_array($result);   

		if($result_array>0)  {

			$status=1;
			$result1=mysqli_query($con,"UPDATE users SET status='$status' WHERE activationcode='$code'");
			$msg="Your account is activated. Sit back and enjoy comics every 5 minutes."; 
		} else {

			$msg = "Your email is already verified.";
		}
	} else {

		$msg = "Wrong activation code.";
	}
}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<title>MailComics</title>
</head>

<body class = "text-center">
	<main class = "form-signin">
		<?php echo htmlentities($msg); ?>
	</main>
</body>
</html>