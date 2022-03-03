
<?php
include_once("config.php");

$id = $_GET['id'];



$sql = "SELECT * FROM `game` WHERE gameID = '$id';";

    $result = $conn->query($sql); 
    if($result->num_rows >= 1) {
        $sqldelete = "DELETE FROM `game` WHERE gameID = '$id';";
        $conn->query($sqldelete);
        echo "<h2>Game delete success</h2>";
        header('refresh:1;url=admin.php#yourGame');

    } else {						
        
        echo "<h2>Error on deleting game, Please try again.</h2>";
        header('refresh:0;url=admin.php#yourGame');
    }

?>