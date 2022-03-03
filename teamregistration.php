<?php
include_once("config.php");

$gameID = $_GET["gameid"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treasure hunts</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel =" stylesheet" href="css/style.css">
</head>
<body>
    <header>  
        <!-- Navigator -->
  <nav class="navbar navbar-expand-lg">
    <div class="container"><a href="player.html" class="navbar-brand nav-title"><img src="img/logo.png" width="40"> Treasure: Be The King</a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
        
        <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="player.html" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a href="playerProfile.php" class="nav-link text-uppercase font-weight-bold"><?php echo $name; ?></a></li>
                <li class="nav-item"><a href="index.html" class="nav-link text-uppercase font-weight-bold">Logout</a></li>
            </ul>
        </div>
    </div>
    
  </nav>
  <!-- end nav -->

  <!--<div class="container">
    <a href="update.html" style="margin-bottom: 20px;" class=" header-cases"> Update registration  </a>
    <a href="paymentindex.html" style="margin-bottom: 20px;" class=" header-cases"> Make Payment  </a>
    </div>-->

    </header>
 <main>
    <!--this is my text over the image (section- things with similar context )-->
        <section class="index-banner2" style="background-image: url('images/adventure.jpg');">
            <div class="vertical-center">
                <h1  style="color: #fff;">HERE YOUR ADVENTURE BEGINS</h1> 
                <h2 style="color: #fff; text-align: center;"> Good luck!</h2>
                
            </div>  
        </section> 
    <div class="wrapper">
        <h1>On the trail of Blackbeard</h1>
    
    <p>Please fill in this form to register your team. Required information is marked with an asterisk (*).</p>
    <br>

    <form action="regteam.php" method="post">
      <div class="label-allign">
        <label>Team Name*: <input type="text" name="team" required></label><br>
        <br>
        <label>Leader contact no*: <input type="number" name="leader" required></label><br>
        <br> 
        Accept
        <a href="termAndCond.html" >Terms & Conditions*
          <label> <input type="checkbox" name="terms"></label><br><br>
          <input type="submit" name="Submit" value="Register Team" style="padding: 3px;">
        </a>
      </div>  
    </form>
    <br>
<hr/>
<div id="teamupdate"></div>
<p> Please add your team members</p>
    <form action="newTeamMembers.php" method="post">
       
      <div class="label-allign">
        <label>Team Name*: <input type="text" name="team" required></label>
        <br>
        <br>

        <label>Player 1 : 
          <br>
          <input type="text" name="playerID1"></label><br>
        <br>
        <label>Player 2 : <input type="text" name="playerID2"></label><br>
        <br>
        <label>Player 3  : <input type="text" name="playerID3"></label><br>
        <br>
        <label>Player 4  : <input type="text" name="playerID4"></label><br>
        <br>
        <label>Player 5  : <input type="text" name="playerID5"></label><br>
        <br>
        <label>Player 6  : <input type="text" name="playerID6"></label><br>
        <br>
        <input type="submit" name="Submit" value="Add Members" style="padding: 3px;">
        <br>
      </div>
    </form>
    <br>
    <section class ="index-links">
        
        <a target="_blank" href="paymentindex.php">
          <div class="index-boxlink">
              <h3>Make Payment</h3>
          </div>
      </a>
    </section>

</main> 

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




   
   