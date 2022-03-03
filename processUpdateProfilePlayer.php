<?php

session_start();

include_once("config.php");
$id =  $_SESSION['userid'];

$playerName = $_POST['playerFullName'];
$playerEmail = $_POST['playerEmail'];
$playerGender = $_POST['playerGender'];
$playerBirthday = $_POST['playerBirthday'];
$playerPhone = $_POST['playerPhone'];

// echo $playerBirthday;
// echo '<br>';
// echo $playerEmail;
// echo '<br>';
// echo $playerGender;
// echo '<br>';
// echo $playerName;
// echo '<br>';
// echo $playerPhone;
// echo '<br>';
// echo $playerBirthday;
// echo '<br>';

$sql = "UPDATE player SET playerFullName = '$playerName', playerGender = '$playerGender', playerEmail = '$playerEmail', playerPhone = '$playerPhone', playerBirthday = '$playerBirthday' WHERE playerID = $id ";
    // $sqlupdate = "UPDATE game SET gameDescription = '$description',gameInstruction = '$instruction',gameVenue = '$venue'
    //               ,gameFee = '$fee',gameRegisterDue = '$regdate',gameDate = '$date',gameTime = '$time',gameMinPlayer = '$min'
    //               ,gameMaxPlayer = '$max' WHERE gameID= $gameID";
// echo $sql;
    $result = $conn->query($sql);


    header('refresh:0;url=playerProfile.php');
?>