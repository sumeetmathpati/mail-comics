<?php
include_once("connection.php");

$result = mysqli_query($con, "SELECT email, activationcode FROM users");
while($row = mysqli_fetch_array($result)) {
    echo $row['email'];
}
?>