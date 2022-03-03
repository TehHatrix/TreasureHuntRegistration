<?php


include_once("config.php");

$playerName = $_POST["playerName"];
$playerPassword1 = $_POST["playerPassword1"];
$playerEmail = $_POST["playerEmail"];


$passwordHash = md5($playerPassword1);
$stmt = mysqli_query($conn,"INSERT INTO player(playerFullName, playerEmail, playerPassword) VALUES ('$playerName', '$playerEmail', '$passwordHash')");
mysqli_close($stmt);
header("Location: login.php");

?>