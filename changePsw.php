<?php
session_start();
include_once("config.php");
$id = $_SESSION['userid'] = 1;
	

if(isset($_POST['Submit']))
{
 	$oldpass=($_POST['opwd']);
 	$newpassword=($_POST['npwd']);
	$sql=mysqli_query($conn,"SELECT playerPassword FROM player where playerPassword='$oldpass'");
	$num=mysqli_fetch_array($sql);
	if($num>0)
	{
 	$conn=mysqli_query($conn,"update player set playerPassword= '$newpassword' WHERE playerID='$id'");
 	header("Location: playerUpdateProfile.php?action=chg_success");
	// $_SESSION['msg1']="Password Changed Successfully !!";
	// echo 'Success';
	// header('refresh:0;url=playerUpdateProfile.php');
	}
else
{
	header("Location: playerUpdateProfile.php?action=chg_failed");
	// $_SESSION['msg1']="Old Password not match !!";
	// echo "not success";
}
}

?>