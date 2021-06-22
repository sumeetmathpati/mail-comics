
<?php
include 'connection.php';

if (!empty($_GET['code']) && isset($_GET['code']) && !filter_input(INPUT_GET, 'code', FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES) === false) {
		
	$code = $_GET['code'];

	if (isset($_GET['unsub']) && (!filter_input(INPUT_GET, 'unsub', FILTER_SANITIZE_NUMBER_INT) === false)) {

		$sql = $con->prepare('DELETE FROM users WHERE activationcode = ?');
		$sql->bind_param('s',$code);
		$sql->execute();
		$sql->close();

		if($sql) {
			$msg = 'You have been unsubscribed!';
		} else {
			$msg = 'You havn\'t subscribed!';
		}
	} else {

		$sql = $con->prepare('DELETE FROM users WHERE activationcode = ? AND status = 0');
		$sql->bind_param('s',$code);
		$sql->execute();
		$sql->close();
		if($sql) {
			$msg = 'Thank you!';
		} else {
			$msg = 'Error';
		}
	}
}  else {
	$msg = 'You are at the wrong place!';
}
?>

<!doctype html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<title>Mail Comics</title>
</head>

<body class="text-center">
	<main class="form-signin">
		<?php echo htmlentities($msg); ?>
	</main>
</body>
</html>