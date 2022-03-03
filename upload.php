<?php

	session_start();
	include_once("config.php");
	$id = $_SESSION['userid'] = 1;

	if (isset($_POST['submit'])) {
		$profileImageName = time().'_'.$_FILES['profileImage']['name'];

		$target = 'uploads/'.$profileImageName;

		if(move_uploaded_file($_FILES['profileImage']['tmp_name'], $target)){

			$sql=mysqli_query($conn,"SELECT playerPhotoID FROM player where playerID='$id'");
			$num=mysqli_fetch_array($sql);
			if($num>0)
			{
		 		$conn=mysqli_query($conn,"update player set playerPhotoID = '$profileImageName' WHERE playerID='$id'");
		 		header("Location: playerUpdateProfile.php?action=upload_success");
			}else{
				header("Location: playerUpdateProfile.php?action=upload_failed");
				
			}

		}else {
			header("Location: playerUpdateProfile.php?action=upload_failed");
		}
	}
?>

<!-- msg = "Image uploaded and saved to database";
  				$css_class = "alert-success";
			}else{
				$msg = "Failed to save";
  				$css_class = "alert-danger";
				
			}

		}else {
			$msg = "Failed to upload";
  			$css_class = "alert-danger";
		} -->

		








<!-- 
		// $file = $_FILES['file'];

	// 	$fileName = $_FILES['file']['name'];
	// 	$fileTmpName = $_FILES['file']['tmp_name'];
	// 	$fileSize = $_FILES['file']['size'];
	// 	$fileError = $_FILES['file']['error'];
	// 	$fileType = $_FILES['file']['type'];

	// 	$fileExt = explode('.', $fileName);
	// 	$fileActualExt = strtolower(end($fileExt));


	// 	$allowed = array('jpg', 'jpeg', 'png', 'pdf');

	// 	if (in_array($fileActualExt, $allowed)) {
	// 		if ($fileError === 0) {
	// 			if ($fileSize < 1000000) {
	// 				$fileNameNew = uniqid('',true).".".$fileActualExt;
	// 				$fileDestination = 'uploads/'.$fileNameNew;

	// 				$sql = "INSERT INTO player (playerPhotoId) VALUES ('$fileNameNew')";
 //  					$conn->query($sql);

	// 				move_uploaded_file($fileTmpName, $fileDestination);
	// 				header("Location: playerUpdateProfile.php?uploadsuccess");
	// 			}else{
	// 				echo "You file is too big";
	// 			}
	// 		}else{
	// 			echo "Ther is an error uploading your file!";
	// 		}
	// 	}else{
	// 		echo "You cannot upload files of this type";
	// 	}
	// }


	// $img_file = $_FILES["img_file"]["name"];
	// $folderName = "images/";
	 
	// // Generate a unique name for the image 
	// // to prevent overwriting the existing image
	// $filePath = $folderName. rand(10000, 990000). '_'. time().'.'.$ext;
	 
	// if ( move_uploaded_file( $_FILES["img_file"]["tmp_name"], $filePath)) {
	//     $sql = "INSERT INTO player VALUES (NULL, '".prepare_input($filePath) ."')";
	//     $msg = ( mysql_query($sql))  ? successMessage("Uploaded and saved to database.") : errorMessage( "Problem in saving to database");
	 
	//   } else {
	//     $msg = errorMessage( "Problem in uploading file");
	//   }
	

	// $msg = "";

 //  // If upload button is clicked ...
 //  if (isset($_POST['upload'])) {
 //  	// Get image name
 //  	$image = $_FILES['image']['name'];
 //  	// Get text
 //  	$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

 //  	// image file directory
 //  	$target = "images/".basename($image);

 //  	$sql = "INSERT INTO images (image, image_text) VALUES ('$image', '$image_text')";
 //  	// execute query
 //  	mysqli_query($db, $sql);

 //  	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
 //  		$msg = "Image uploaded successfully";
 //  	}else{
 //  		$msg = "Failed to upload image";
 //  	}
 //  }


 -->