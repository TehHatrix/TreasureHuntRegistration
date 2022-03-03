<?php
include_once("config.php");
session_start();

$user = $_SESSION['logged_in'];
$playerid = $_SESSION['userid'];
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Treasure hunts</title>

    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel =" stylesheet" href="css/style.css">
    <!--<link rel =" stylesheet" href="css/style1.css">-->
    
</head>
<body>
    <header>
    
        <!-- Navigator -->
      <nav class="navbar navbar-expand-lg">
        <div class="container"><a href="player.php" class="navbar-brand nav-title"><img src="img/logo.png" width="40"> Treasure: Be The King</a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="player.php" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a href="playerProfile.php" class="nav-link text-uppercase font-weight-bold"><?php echo $name; ?></a></li>
                    <li class="nav-item"><a href="index.html" class="nav-link text-uppercase font-weight-bold">Logout</a></li>
                </ul>
            </div>
        </div>
        
      </nav>
      <!-- end nav -->
      <!--
      <div class="container">
        <a href="update.html" style="margin-bottom: 20px;" class=" header-cases"> Update registration  </a>
        </div>
      -->
    </header>
       
        <section class="index-banner" style="background-image: url('images/indi1.jpg');">
            <div class="vertical-center">
                <h1>FIND YOUR INNER <br>INDIANA JONES </h1> 
                <h2> There is no age to have fun ! </h2>
            </div>
        </section>

        <style type="text/css">
          
        </style>

        <div class="wholeDIV">
          <h1>Our Treasure Hunts</h1> 
        

          <?php 
            $sqlshowallgame = "SELECT * FROM `game`;";
            $resultallgame = $conn->query($sqlshowallgame);

            echo "<br>";
            if ($resultallgame->num_rows > 0) {
                while ($row = $resultallgame->fetch_assoc()) {

                echo '<a href="pirate.php?gameid='.$row["gameID"].'">
                    <div class="index-boxlink">
                        <h3>'.$row['gameTitle'].'</h3>
                    </div>
                </a>';


                echo '<div class="gameCont">
        <div class="divLeft"> 
        <a href="pirate.php?gameid='.$row["gameID"].'"> 
            <div class="index-boxlink">
                <h4 id="grayLinkLeft"> Treasure</h4>
            </div>
          </a> 
        </div>
        <div class="divRight"> 
          <h5 id="grayLink">'.$row["gameDate"].'</h5>
          <a href="teamregistration.php?gameid='.$row["gameID"].'"><h5 id="grayLink">Register</h5></a>
          <a href="update.html"><h5 id="grayLink">Cancel registration</h5></a> 
        </div>
      </div>';}}
            ?>
        

        <br>
        <br>
        <br>
              
        </div>

    <!-- ======= Footer ======= -->
	<footer class="site-footer" >
    
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <h6>About</h6>
              <p class="text-justify">Treasure: <i>Be The King </i> is the largest online destination dedicated to treasure hunt game. Here you can discover new games from various of organizer. Join game and win the prize.</p>
            </div>
      
            <div class="col-xs-6 col-md-3">
              <h6>Tag</h6>
              <ul class="footer-links">
                <li><a href="index.html#about">About Us</a></li>
                <li><a href="index.html#team">Our Team</a></li>
                <li><a href="index.html#contact">Contact Us</a></li>
    
              </ul>
            </div>
      
            <div class="col-xs-6 col-md-3">
              <h6>Quick Links</h6>
              <ul class="footer-links">
                <li><a href="player.php">Home</a></li>
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
