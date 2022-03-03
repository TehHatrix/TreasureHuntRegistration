<?php

	session_start();
	include_once("config.php");
	$id = $_SESSION['userid'] = 1;

	if (isset($_POST['submit'])) {
		$profileImageName = time().'_'.$_FILES['profileImage']['name'];

		$target = 'uploads/'.$profileImageName;

		if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){

			$sql=mysqli_query($conn,"SELECT organizerPhotoID FROM organizer where organizerID='$id'");
			$num=mysqli_fetch_array($sql);
			if($num>0)
			{
		 		$conn=mysqli_query($conn,"update organizer set organizerPhotoID = '$profileImageName' WHERE organizerID='$id'");
		 		header("Location: updateOrgProfile.php?action=upload_success");
			}else{
				header("Location: updateOrgProfile.php?action=upload_failed");
				
			}

		}else {
			header("Location: updateOrgProfile.php?action=upload_failed");
		}
	}
?>

