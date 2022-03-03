<?php
session_start();

include_once("config.php");

$user = $_SESSION['logged_in'];
$id = $_SESSION['userid'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];

if ($_SESSION['logged_in'] == 'organizer'){
  header("Location: login.php");
}


	$sql = "SELECT * FROM player WHERE playerID='$id'"; 
	$result = $conn->query($sql);

	while($res = $result->fetch_assoc())
	{
    $playerFullName = $res['playerFullName'];
		$playerEmail = $res['playerEmail'];
		$playerGender = $res['playerGender'];
		$playerBirthday = $res['playerBirthday'];
		$playerPhone = $res['playerPhone'];
		$playerPhotoID = $res['playerPhotoID'];
	}	

	$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Update Profile</title>
  <link rel="stylesheet" type="text/css" href="design.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/UpdateProfile.css">
  <link rel="stylesheet" type="text/css" href="css/nav_footer.css">
</head>

<body>
	<div class="ship"></div>

  <header>
  <!-- Navigator -->

    <nav style="background-color: black;" class="navbar navbar-expand-lg">
        <div class="container"><a href="player.html" class="navbar-brand nav-title"><img src="img/logo.png" width="40"> Treasure: Be The King</a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="player.html" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a href="playerprofile.html" class="nav-link text-uppercase font-weight-bold">
                    <?php echo $name; ?></a></li>
                <li class="nav-item"><a href="index.html" class="nav-link text-uppercase font-weight-bold">Logout</a>
                </ul>
            </div>
        </div>
        
      </nav>
  
      <!-- end nav -->
  </header>

  <div class="container">

  <main id="wrapper">
      <div class="row">
          <div class="col-md-5 text-center">
              
              <img id="profileDisplay" src="uploads/<?php echo $playerPhotoID ?>">

<!--               <input type="file" id="selectedFile" style="display: none;"> -->

              <a style="margin-top: 40px;" type="button" href="playerUpdateProfile.php" class="btn btn-default btn-block">Update Profile</a>

<!--               <script>
                  // Get the modal
                  var modal = document.getElementById('id01');
                  // When the user clicks anywhere outside of the modal, close it
                  window.onclick = function (event) {
                      if (event.target == modal) {
                          modal.style.display = "none";
                      }
                  }
              </script> -->
          </div>

          <div class="col-md-7">
              <!--  <h3>Edit Profile</h3> -->
              <h3>My Profile</h3>

                  <div class="form-group">
                      <label for="user_name">
                          Name
                          <abbr title="required">*</abbr>
                      </label>
                      <input class="form-control" type="text" name="playerFullName" id="playerFullName" required value="<?php echo $playerFullName ?>" disabled>
                  </div>

                  <div class="form-group">
                      <label for="user_gender">
                          Gender
                          <abbr title="required">*</abbr>
                      </label>
                      <select class="form-control" style="width: 100%;" name="playerGender" id="playerGender" value="<?php echo $playerGender ?>" required disabled>
                          <option value><?php echo $playerGender ?></option>
                      </select>
                  </div>

                  <div class="form-group">
                      <label for="DOB">Birthday:</label>
                      <input class="form-control" type="date" name="playerBirthday" value="<?php echo $playerBirthday ?>" disabled>
                  </div>

                  <div class="form-group">
                      <label for="user_email">
                          Email
                          <abbr title="required">*</abbr>
                      </label>
                      <input class="form-control" type="email" name="playerEmail" id="playerEmail" value="<?php echo $playerEmail ?>" required disabled>
                  </div>

                  <div class="form-group">
                      <label for="user_phone">
                          Phone
                          <abbr title="required">*</abbr>
                      </label>
                      <input class="form-control" maxlength="30" type="tel" size="30" name="playerPhone" id="playerPhone" value="<?php echo $playerPhone ?>" required disabled>
                  </div>

          </div>
      </div>
  </main>
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

<script type="text/javascript" src="UpdateProfile.js"></script>>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>