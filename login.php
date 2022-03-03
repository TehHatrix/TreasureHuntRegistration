<!DOCTYPE html>
<html lang="en" >
 
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Alegreya+Sans+SC&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/login.css">
  <link rel ="stylesheet" href="css/nav_footer.css">
 
  
</head>
 
<body style="background-image: url(img/bg.png);">
  <header>
    <nav style="background-color: black; font-family:Arial;" class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.html"><img src="img/logo.png" width="40">Treasure: Be The King</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle dropdown-toggle-dark text-uppercase font-weight-bold" href="#" id="navbardrop" data-toggle="dropdown">
                Register
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="playerRegister.php">Register - As a Player</a>
                <a class="dropdown-item" href="organizerRegister.php">Register - As a Organizer</a>
              </div>
            </li>
            <li class="nav-item">
              <a href="index.html" class="nav-link text-uppercase font-weight-bold">Home</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </header>

  <main class="container">
    <div id="wrapper">
      <h1 class="text-center">Login as:</h1>
      <!-- <div id="textbox">
        <img src="img/organizer.png"/ style="margin-left: 10px;" height="200px"><span class="tickmark"></span>
        <img src="img/player.png"/ style="margin-left: 10px;" height="200px"><span class="tickmark"></span>
      </div> -->

      <div class="main">
        <form method="post" action="processLogin.php">

              <?php
            // get 'action' value in url parameter to display corresponding prompt messages
            $action=isset($_GET['action']) ? $_GET['action'] : "";
                            
            // tell the user if access denied
            if($action =="login_failed"){
                echo "<div class='alert alert-danger margin-top-40' role='alert'> Access Denied. <br />
                Incorrect username or password.
                </div>";                 
            }
              ?>
          
          <div id="textbox">
          <input type="radio" name="choice" value="organizer" id="organizer" class="input-hidden" />
            <label for="organizer" > 
              <img src="img/organizer.png" />
              Organizer
            </label>

          <input type="radio" name="choice" value="player" id="player" class="input-hidden" />
              <label for="player">
                <img src="img/player.png" />
                Player
              </label>
          </div>
          
          <div>
            <label for="email">Email</label>
            <input id="email" name="email" type="email" class="styl" required />
          </div>
         
          <div>
            <label for="password">Password</label>
            <input id="password" name="password" type="password" class="styl" required/>
            <button onclick="document.querySelector('#id01').style.display='block'" type="button" style="font-size: 20px; color: black; font-weight: bolder;" class="btn">Forgot password?</button>
          </div>

          <button class="login" type="submit">Login</button>
        </form>                 

      </div>
      <div id="id01" class="modal">
        <span onclick="document.querySelector('#id01').style.display='none'" class="close" title="Forgot Password">×</span>
        <form class="modal-content" action="/action_page.php">
          <div class="container">
            <h3 class="text-center"><b>Forgot Password</b></h3>
            <p>Please enter your e-mail address. You will receive an e-mail along with a link which can be used to reset your password.</p>
            <form role="form" id="forgot-password-form" method="post">
              <div class="form-group">
                Email:<br>
                <input type="email" class="form-control input-lg" id="forgot-email" name="email" placeholder="Your email"> 
              </div>
              <button type="submit" class="forgetpasswordbtn" id="forgot-password-submit">Submit</button>
            </form>
          </div>
        </form>
      </div>
    </div>

    <!-- ======= Footer ======= -->
  
  </main>
  <footer class="site-footer " style="margin-top: 50px; font-family:Arial;">
    
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
            <li><a href="index.html">Home</a></li>
            <li><a href="#">Sign Up</a></li>
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

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
  <script  src="js/function.js"></script>
  <!-- JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
 
</body>
</html>