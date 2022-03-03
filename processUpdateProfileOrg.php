<?php

session_start();

include_once("config.php");
$id = $_SESSION['userid'];

$organizerName = $_POST['organizerName'];
$organizerEmail = $_POST['organizerEmail'];
$organizerPhone = $_POST['organizerPhone'];

// echo $playerBirthday;
// echo '<br>';
// echo $playerEmail;
// echo '<br>';
// echo $playerGender;
// echo '<br>';
// echo $playerName;
// echo '<br>';
// echo $organizerPhone;
// echo '<br>';
// echo $playerBirthday;
// echo '<br>';

$sql = "UPDATE organizer SET organizerCompanyName = '$organizerName', organizerEmail = '$organizerEmail', organizerPhone = $organizerPhone WHERE organizerID = $id ";
// echo $sql;
    // $sqlupdate = "UPDATE game SET gameDescription = '$description',gameInstruction = '$instruction',gameVenue = '$venue'
    //               ,gameFee = '$fee',gameRegisterDue = '$regdate',gameDate = '$date',gameTime = '$time',gameMinPlayer = '$min'
    //               ,gameMaxPlayer = '$max' WHERE gameID= $gameID";
    $result = $conn->query($sql);


    header('refresh:0;url=orgProfile.php');
?>