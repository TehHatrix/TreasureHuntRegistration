<!-- php for update detail  -->

<?php
include_once("config.php");
if(isset($_POST['submit'])){


    $description = $instruction = $venue = $fee =$regdate = $date = $time = $min = $max = $gameID = null;
    $description = $_POST["description"];
    $instruction = $_POST["instruction"];
    $venue = $_POST["venue"];
    $fee = $_POST["fee"];
    $regdate = $_POST["regdate"];
    $date = $_POST["date"];
    $time = $_POST["time"];
    $gameID = $_POST["gameID"];

    // $sqlupdate = "UPDATE game SET gameDescription = '$description',gameInstruction = '$instruction',gameVenue = '$venue'
    //               ,gameFee = '$fee',gameRegisterDue = '$regdate',gameDate = '$date',gameTime = '$time',gameMinPlayer = '$min'
    //               ,gameMaxPlayer = '$max' WHERE gameID= $gameID";

    // $resultupdate = $conn->query($sqlupdate);

    $stmt = $conn->prepare("UPDATE game SET gameDescription =?,gameInstruction = ?,gameVenue = ? ,gameFee = ?,gameRegisterDue = ?,gameDate = ?,gameTime = ? WHERE gameID= ?");

    $stmt->bind_param("sssssssi", $description, $instruction, $venue, $fee, $regdate, $date, $time, $gameID);
    $stmt->execute();


    // echo $resultupdate;
    //  $conn->query($sqlupdate);
    $link = 'gameDetail.php?id='.$gameID;
     header('refresh:0;url='.$link.' ');
}



?>