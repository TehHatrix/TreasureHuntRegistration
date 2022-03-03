<?php
include_once("config.php");
session_start();
$gameTitle = $gameDescription = $gameInstruction = $gameVenue = $gameDate = $gameFee = $gameTime = $gameRegisterDue = $gamePhotoID = $gameMaxTeam = $currentTeam = $organizerID = null;

$organizerID = $_SESSION['userid'];

if(($_FILES['gamePhotoID']['name'])!=''){
$target_dir = "profilegame/";
 $file = $_FILES['gamePhotoID']['name'];
$path = pathinfo($file);
 $filename = $path['filename'];
 $ext = $path['extension'];
 $temp_name = $_FILES['gamePhotoID']['tmp_name'];
 $path_filename_ext = $target_dir.$filename.".".$ext;
 
move_uploaded_file($temp_name,$path_filename_ext);
$gamePhotoID=$_FILES["gamePhotoID"]["name"];
}else{
    $gamePhotoID=null;
}

if(isset($_POST["gameTitle"]) && isset($_POST["gameDesc"]) && isset($_POST["gameInstr"]) && isset( $_POST["gameVenue"]) && isset($_POST["gameDate"]) && isset($_POST["gameFee"]) && isset($_POST["gameTime"]) && isset($_POST["gameRegisterDue"]) && isset($_POST["gameMaxTeam"])){

    $gameTitle = $_POST["gameTitle"];
    $gameDescription = $_POST["gameDesc"];
    $gameInstruction = $_POST["gameInstr"];
    $gameVenue = $_POST["gameVenue"];
    $gameDate = $_POST["gameDate"];
    $gameFee = $_POST["gameFee"];
    $gameTime = $_POST["gameTime"];
    $gameRegisterDue = $_POST["gameRegisterDue"];
    $gameMaxTeam = $_POST["gameMaxTeam"];
    $gameTime = $gameTime . ":00";


    $sql = "SELECT `gameTitle` FROM `game` WHERE gameTitle = '" . $gameTitle . "';";

    $result = $conn->query($sql);
    if ($result->num_rows >= 1) {
        echo "<h2>Game already exists.</h2>";
        header('refresh:2;url=AddNewGame.php');
    } else {
        $SQL = "INSERT INTO `game` (`gameID`, `gameTitle`, `gameDescription`, `gameInstruction`, `gameVenue`, `gameDate`, `gameFee`, `gameTime`, `gameRegisterDue`, `gamePhotoID`, `gameMaxTeam`, `currentTeam`,  `organizerID`) VALUES (NULL, '$gameTitle', '$gameDescription', '$gameInstruction', '$gameVenue', '$gameDate', '$gameFee', '$gameTime', '$gameRegisterDue', '$gamePhotoID', '$gameMaxTeam', '0', $organizerID )";
        $conn->query($SQL);
        header('refresh:0;url=admin.php');
    }
}else{

    header("Location: AddNewGame.php?action=error");
}



?>