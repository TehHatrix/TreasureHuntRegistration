<?php
  session_start();
  $user = $_SESSION['logged_in'];
  $name = $_SESSION['name'];
  $email = $_SESSION['email'];

  if ($_SESSION['logged_in'] == 'organizer'){
    header("Location: login.php");
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treasure hunts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel =" stylesheet" href="../css/style.css">
</head>
<body>
    <header>  
        <!-- Navigator -->
  <nav class="navbar navbar-expand-lg">
    <div class="container"><a href="../player.html" class="navbar-brand nav-title"><img src="img/logo.png" width="40"> Treasure: Be The King</a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
        
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="../player.php" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a href="../playerProfile.php" class="nav-link text-uppercase font-weight-bold"><?php echo $name; ?></a></li>
                <li class="nav-item"><a href="../index.html" class="nav-link text-uppercase font-weight-bold">Logout</a></li>
            </ul>
        </div>
    </div>
    
  </nav>

  <div style="margin: 0px auto; text-align: center; padding-bottom: 200px; padding-top: 200px;">

<?php

$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "thetreasure";
	$con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  

			//Collect Form data, Escape them, and assign them to variables
				$team 	   = 	$_POST["team"];
				$leaderID	 = 	$playerid = $_SESSION['userid'];
				$terms	   = 	$_POST["terms"];

			if ($team=='') {
				die("Enter a name for your team");
			}
      elseif ($terms!=='on') {
				die("Kindly our accept terms and conditions! <br>"."<form><input type='button' value='Go back' onClick='javascript:history.go(-1)'></form>");
			}
			else {
				#echo $team." ".$mem1." ".$terms;
				// prepare sql and bind parameters
				try{
				  $stmt = $con->prepare("INSERT INTO team (playerID, teamName) VALUES (:leaderID, :teamName)");
				  
				  $stmt->bindParam(':leaderID', $leaderID);
				  $stmt->bindParam(':teamName', $team);
				  $stmt->execute();
				
				if (!$stmt) {
						echo "Insert failed!"."<form><input type='button' value='Go back' onClick='javascript:history.go(-1)'></form>";
					}	
				else{
					echo "Your team '".$team."' has been created.<br>";
          echo '<form><input type="button" value="Add Players now" onClick="javascript:history.go(-1)"></form>';

				}
				
			 }
				catch(PDOException $e) {
	  				echo "Error: " . $e->getMessage();
				}
			}
			$con = null;
?>
</div>

  <!-- ======= Footer ======= -->
	<footer class="site-footer" style="margin-top: 40px;">
    
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <h6>About</h6>
              <p class="text-justify">Treasure: <i>Be The King </i> is the largest online destination dedicated to treasure hunt game. Here you can discover new games from various of organizer. Join game and win the prize.</p>
            </div>
      
            <div class="col-xs-6 col-md-3">
              <h6>Tag</h6>
              <ul class="footer-links">
                <li><a href="../index.html#about">About Us</a></li>
                <li><a href="../index.html#team">Our Team</a></li>
                <li><a href="../index.html#contact">Contact Us</a></li>
    
              </ul>
            </div>
      
            <div class="col-xs-6 col-md-3">
              <h6>Quick Links</h6>
              <ul class="footer-links">
                <li><a href="player.html">Home</a></li>
                <li><a href="index.html">Logout</a></li>
              </ul>
            </div>
          </div>
          <hr>
        </div>
      
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
              <p class="copyright-text">Copyright &copy; 2020 All Rights Reserved by 
           <a href="#">Treasure: Be the King</a>.
              </p>
            </div>
      
            <div class="col-md-4 col-sm-6 col-xs-12">
              <ul class="social-icons">
                <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a class="instagram" href="#"><i class="fa fa-instagram"></i></a></li>  
              </ul>
            </div>
          </div>
        </div>
    </footer><!-- End Footer -->

</body>
</html>