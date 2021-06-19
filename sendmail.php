<?php
include_once("connection.php");
include_once("utils.php");

$result = mysqli_query($con, "SELECT email, activationcode FROM users");
$imgUrl = getImgUrl();


while($row = mysqli_fetch_array($result)) {
    sendComicMail($row['email']);
}
?>