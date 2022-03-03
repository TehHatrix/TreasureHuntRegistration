<?php
include_once("config.php");
session_start();
$id =  $_SESSION['userid'];

$sql = "SELECT * FROM `organizer` WHERE organizerID = '$id'";

    $result = $conn->query($sql); 
    if($result->num_rows >= 1) {

        $sqldelete = "DELETE FROM `teammembers` WHERE organizerID = $id";
        $conn->query($sqldelete);
        echo $sqldelete;
        $sqldelete = "DELETE FROM `organizer` WHERE organizerID = $id";
        $conn->query($sqldelete);
        echo $sqldelete;

        header("Location: index.html?action=delete_success");
        // echo "<h2>player delete success</h2>";
        // header('refresh:1;url=admin.php#yourplayer');

    } else {
        header("Location: updateOrgProfile.php?action=delete_failed");						
        
        // echo "<h2>Error on deleting player, Please try again.</h2>";
        // header('refresh:0;url=admin.php#yourplayer');
    }

?>