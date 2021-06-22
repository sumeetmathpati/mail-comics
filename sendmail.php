<?php
include_once 'connection.php';
include_once 'utils.php' ;

$sql = $con->prepare('SELECT email, activationcode FROM users WHERE status = 1');
$sql->execute();
$result = $sql->get_result();
// $result_array = $result->fetch_assoc();


$imgJSON = getComicJson();
$imgUrl = $imgJSON->img;
$filename = $imgJSON->safe_title;
$path = '.';
$file = $path . '/' . $filename. '.png';

if (file_put_contents($file,file_get_contents($imgUrl))) {
	
	// Send mail to all the emails in the db.
	while($row = $result->fetch_assoc()) {
		sendComicMail($row['email'], $row['activationcode'], $imgUrl, $filename);
	}
}

// Delete the fetched image.
unlink($file);

?>