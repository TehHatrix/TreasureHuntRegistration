<?php
include_once("config.php");

$gameID = $_GET["gameid"];
$username = $_SESSION['username']= 'Ali';

?>

<?php echo $username ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Treasure hunts</title>

    <link rel ="stylesheet" href="css/style.css">
    <!--<link rel ="stylesheet" href="css/style1.css">-->
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
                <li class="nav-item"><a href="playerprofile.html" class="nav-link text-uppercase font-weight-bold"><?php echo $username ?></a></li>
                <li class="nav-item"><a href="index.html" class="nav-link text-uppercase font-weight-bold">Logout</a></li>
            </ul>
        </div>
    </div>
    
  </nav>
  <!-- end nav -->

  <!--<div class="container">
    <a href="update.html" style="margin-bottom: 20px;" class=" header-cases"> Update registration  </a>
    </div>-->

    
    </header>
 <main>
    <!--this is my text over the image (section- things with similar context )-->
        <section class="index-banner1" style="background-image: url('images/blackbeard.jpg'); color: #fff;">
            <div class="vertical-center">
                <h1 style="color: #fff;">ADVENTURE AWAITS YOU </h1> 
                <h2 style="text-align: center;"> Go for it!</h2>
            </div>  
        </section> 
    <div class="wrapper">

    <?php 
            $sqlgame = "SELECT * FROM `game` WHERE gameID = $gameID;";
            $resultgame = $conn->query($sqlgame);
            $gametitle = $max = $gameDesc = $gameInst = $price = $current = $time = $venue= "";
            echo "<br>";
            if ($resultgame->num_rows > 0) {
                while ($row = $resultgame->fetch_assoc()) {
                    $gameDesc = $row['gameDescription'];
                    $gametitle = $row['gameTitle'];
                    $gameInst = $row['gameInstruction'];
                    $price= $row['gameFee'];
                    $time = $row['gameTime'];
                    $venue= $row['gameVenue'];
                    $max =$row['gameMaxTeam'];
                    $current = $row['currentTeam'];
                }
            }
            ?>

<h1><?php echo  $gametitle;?></h1>

<p> <?php echo  $gameDesc;?> </p>
<h1>Your hunt</h1>
<p> <?php echo  $gameInst;?> </p>
<br>
</p>
        <br>
        <br>
        <style type="text/css">
          
        </style>
    <div class="inlineDIVcont">
      <div class="inlineDIV">Venue: <?php echo  $venue;?> </div>
      <div class="inlineDIV">Time: <?php echo  $time;?> </div>
      <div class="inlineDIV">(Current/Max) Teams: <?php echo  $current.'/'.$max;?></div>
      <div class="inlineDIV">Price: RM<?php echo  $price;?></div>
    </div>
    <section class ="index-links">
       <?php   echo '<a href="teamregistration.php?gameid='.$gameID.'">' ?>
            <div class="index-boxlink">
                <h3>Register your Team</h3>
            </div>
            </a>
    </section>
    </div>

    </main> 
<br>
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




   
   