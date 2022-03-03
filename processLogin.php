<?php
//including the database connection file
include_once("config.php");

session_start();

echo $_POST['choice'];
echo  $_POST['email'];
echo $_POST['password'];

//2. validate login
if (isset($_POST['choice']) && isset($_POST['email']) && isset($_POST['password']) ){
  // if the user has just tried to log in
  $choice = $_POST['choice'];
  $user_email = $_POST['email'];
  $password = $_POST['password'];
  //(b) Apply PHP hash functions used in (a)(iii) to store hashed password in the database 
  $hashedpassword = md5($password);
	$emailsql = $choice.'Email';
	$passwordsql = $choice.'Password';
	$idsql = $choice.'ID';
	$name = "";

	$sql="";
	if($choice == 'player'){
		$sql = "SELECT * FROM `player` WHERE playerEmail='$user_email' and playerPassword='$hashedpassword'";
		$name = $choice.'FullName';
	}else{
		$sql = "SELECT * FROM `organizer` WHERE organizerEmail='$user_email' and organizerPassword='$hashedpassword'";
		$name = $choice.'CompanyName';
	}

	echo $sql;
  $result = $conn->query($sql);
  
	if ($result->num_rows > 0) {
		// if they are in the database, register the user in session
		while($res = $result->fetch_assoc()) {
			$userid = $res["$idsql"];
			$name = $res["$name"];
			$email = $res["$emailsql"]; 
		}
		
		//registering session variables
		$_SESSION['logged_in'] = $choice;
		$_SESSION['userid'] = $userid;
		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;
		//echo "Session variables are set. <br>";
		
		//echo "Login successfully. <br>";
		//redirect to profile.php

		if($choice == 'player')
			header("Location: player.php");
		else
			header("Location: admin.php");
		
	}else{
	//echo "Invalid username or password.<br>";
	//echo "<a class=\"nav-link\" href=\"login.php\">Log In</a>";
	// header("Location: login.php?action=login_failed");
	echo "failed";
	}
	
}else{
	echo "Please enter a valid username and password.";
}

  //Freeing Resources and Closing Connection using mysqli	
  $conn->close();

?>