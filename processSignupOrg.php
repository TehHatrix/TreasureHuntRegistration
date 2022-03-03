<?php

include_once("config.php");
$orgName = $_POST["orgName"];
$orgPhone = $_POST["orgPhone"];
$orgPassword1 = $_POST["orgPassword1"];
//$orgPassword2 = $_POST["orgRpassword"];
$orgEmail = $_POST["orgEmail"];

$passwordHash = md5($orgPassword1);
$stmt = mysqli_query($conn,"INSERT INTO organizer(organizerCompanyName, organizerEmail, organizerPassword, organizerPhone) VALUES ('$orgName', '$orgEmail', '$passwordHash', '$orgPhone')");
mysqli_close($conn);
header("Location: login.php");

?>
