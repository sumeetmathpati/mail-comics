<?php
include_once("connection.php");
include_once("utils.php");

$result = mysqli_query($con, "SELECT email, activationcode FROM users");

$imgJSON = getComicJson();
$imgUrl = $imgJSON->img;
$filename = $imgJSON->safe_title;
$path = '.';
$file = $path . "/" . $filename;
file_put_contents($file,file_get_contents($imgUrl));

while($row = mysqli_fetch_array($result)) {
    sendComicMail($row['email'], $row['activationcode'], $imgUrl, $filename);
}
?>