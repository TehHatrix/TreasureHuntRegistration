<?php


include_once("config.php");

$orgName = $_POST["orgName"];
$orgPassword1 = $_POST["orgPassword1"];
$orgEmail = $_POST["orgEmail"];


$passwordHash = md5($orgPassword1);
$stmt = $conn->prepare("INSERT INTO organizer (orgName, orgEmail, orgPassword) VALUES (?, ?, ?)");
$stmt->bind_param("sss",$orgName, $orgEmail, $passwordHash);
$stmt->execute();

echo "done";


?>