<?php

include 'connection.php';


if(!empty($_GET['code']) && isset($_GET['code']) && (!filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES) === false)) {

        
	$code = $_GET['code'];

	$sql = $con->prepare('SELECT * FROM users WHERE activationcode = ?');
	$sql->bind_param('s', $code); 
	$sql->execute();
	$result = $sql->get_result();
	$sql->close();

	$num = $result->fetch_assoc();

	// If use is present with that activation code.
	if ($num > 0) {
		
		$sql = $con->prepare('SELECT * FROM users WHERE status = 0 AND activationcode = ?');
		$sql->bind_param('s', $code); 
		$sql->execute();
		$result = $sql->get_result();
		$result_array = $result->fetch_assoc();
		
		// If account is not verified.
		if ($result_array > 0)  {

			$sql = $con->prepare('UPDATE users SET status = 1 WHERE activationcode = ?');
			$sql->bind_param('s', $code);
			$sql->execute();
			$sql->close();
			$msg='Your account is activated. Sit back and enjoy comics every 5 minutes.'; 
		} else {
			$msg = 'Your email is already verified.';
		}
	} else {
		$msg = 'Wrong activation code.';
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