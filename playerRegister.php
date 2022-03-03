<?php 
  
  // include_once("config.php");

//  if (! empty($_POST["register-player"])) {
    
//     $playerName = filter_var($_POST["playerName"], FILTER_SANITIZE_STRING);
//     $playerPassword1 = filter_var($_POST["playerPassword1"], FILTER_SANITIZE_STRING);
//     $playerEmail = filter_var($_POST["playerEmail"], FILTER_SANITIZE_STRING);

//     include_once("config.php");

    
    
//     if($valid == true) {
//         if ($_POST['playerPassword1'] != $_POST['playerPassword2']) {
//             $errorMessage[] = 'Passwords should be same.';
//             $valid = false;
//         }
        
//         if (! isset($error_message)) {
//             if (! filter_var($_POST["playerEmail"], FILTER_VALIDATE_EMAIL)) {
//                 $errorMessage[] = "Invalid email address.";
//                 $valid = false;
//             }
//         }    
//     }
//     else {
//         $errorMessage[] = "All fields are required.";
//     }
    
//     if ($valid == false) {
//         return $errorMessage;
//     }
//     return;
  
//     function validateMember(){
//       $valid = true;
//       $errorMessage = array();
//       foreach ($_POST as $key => $value) {
//           if (empty($_POST[$key])) {
//               $valid = false;
//           }
//       }

//     function isMemberExists($name, $email){
//       include_once("config.php");
//       $player_check_query = "SELECT * FROM player WHERE playerName='$playerName' OR playerEmail='$playerEmail' LIMIT 1";
//       $result = $conn->query($player_check_query);
//       $user = $result->fetch_assoc();
      
//       return $user;
//     }

//     function insertMemberRecord($username, $email, $password){
//       include_once("config.php");
//       $passwordHash = md5($password);
//       $stmt = $conn->prepare("INSERT INTO player(playerName, playerEmail, playerPassword) VALUES (?, ?, ?)");
//       $stmt->bind_param("sss",$username, $email, $passwordHash);
//       $stmt->execute();
//       echo "<h2>Registration successful.</h2>";
//       $stmt-> close();
//     }

//     include_once("config.php");
//     $errorMessage = $conn->validateMember($playerName, $playerPassword1, $playerEmail);
    
//     if (empty($errorMessage)) {
//         $playerCount = $conn->isMemberExists($playerName, $playerEmail);
        
//         if ($playerCount == 0) {
//             $insertId = $conn->insertMemberRecord($playerName, $playerEmail, $playerPassword1);
//             if (! empty($insertId)) {
//                 header("Location: thankyou.php");
//             }
//         } else {
//             $errorMessage[] = "User already exists.";
//         }
//     }
// }
//   }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Player Register</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/player.css">
  <link rel ="stylesheet" href="css/nav_footer.css">
</head>
<body>
  <header>
    <nav style="background-color: black; font-family:arial;" class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="index.html"><img src="img/logo.png" width="40">Treasure: Be The King</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle dropdown-toggle-dark text-uppercase font-weight-bold" id="navbardrop" data-toggle="dropdown">
                Login / Register
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="playerRegister.php">Register - As a Player</a>
                <a class="dropdown-item" href="organizerRegister.php">Register - As a Organizer</a>
                <a class="dropdown-item" href="login.php">Login</a>
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
  
  <main id="wrapper">
    <div class="row">
      <div class="col-md-8">
        <h2>Register and apply to 10000+ adventurous and trilling tresure hunt games </h2>
        <img src="img/sidebar1.jpg" class="sidebar">
      </div>  

      <div class="col-md-4" id="container">
        <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Sign Up as Player</h4>
            </div>
            <div class="modal-body">


              <form method="post" action="processSignupPlayer.php">
                <!-- <div class="alert alert info " hidden> -->
                
              <!-- </div> -->
                
                <div class="form-group">
                  <label for="name">Name</label>
                  <input class="form-control" type="text" name="playerName" id="playerName" placeholder="John Doe" value="<?php if(isset($_POST['playerName'])) echo $_POST['playerName']; ?>">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input class="form-control" type="email" name="playerEmail" id="playerEmail" placeholder="john@example.com" value="<?php if(isset($_POST['playerEmail'])) echo $_POST['playerEmail']; ?>">
                </div>
                
                <div class="form-group">
                  <label for="password">Password</label>
                  <input class="form-control" type="password" name="playerPassword1" id="player[password]" placeholder="Must be at least 6 characters" value="" >
                </div>

                <div class="form-group">
                  <label for="rpassword">Repeat Password</label>
                  <input class="form-control" type="password" name="playerPassword2" id="player[rpassword]" placeholder="Must be at least 6 characters" value="" >
                </div>

                <div>
                  <input type="submit" name="register-player" value="Register" class="btn">
              </div>
                <p class="text-center">Already registered? <a href="login.php">Login</a></p>
              </form>

            </div>
          </div>
        </div>
      </div>
  </main>
  
  <!-- ======= Footer ======= -->
<footer class="site-footer" style="margin-top: 100px; font-family:arial; background-image: url(img/logincontainer.jpg);">
    
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
            <li><a href="login.php">Login</a></li>
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
<!-- JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>





