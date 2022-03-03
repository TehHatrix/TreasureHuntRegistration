<?php
session_start();
include_once("config.php");

$id = $_GET['id'];
$_SESSION['logged_in'];
$userName = $_SESSION['name'];
$organizerID = $_SESSION['userid'];

if ($_SESSION['logged_in'] == 'player' || $_SESSION['logged_in'] ==null){
  header("Location: login.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Game detail</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/admint-gd.css">
  <link href="https://fonts.googleapis.com/css2?family=Anton&family=Noto+Sans+TC:wght@900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/nav_footer.css">

</head>

<body>


  <main>
    <header>
      <!-- Navigator -->
      <nav style="background-color: black;" class="navbar navbar-expand-lg">
        <div class="container"><a href="player.html" class="navbar-brand nav-title"><img src="img/logo.png" width="40"> Treasure: Be The King</a>
          <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

          <div id="navbarSupportedContent" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="admin.php" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
              <li class="nav-item"><a href="orgProfile.php" class="nav-link text-uppercase font-weight-bold"><?php echo $userName?></a></li>
              <li class="nav-item"><a href="processLogout.php" class="nav-link text-uppercase font-weight-bold">Logout</a>
            </ul>
          </div>
        </div>

      </nav>

      <!-- end nav -->
    </header>

    <?php
    $sqlgameDetail = "SELECT * FROM `game` WHERE gameID = $id;";
    $result = $conn->query($sqlgameDetail);

    if ($result->num_rows >= 1) {
      echo "<br>";
      $row = $result->fetch_assoc();
      $organizerID = $row["organizerID"];
      $sqlgetOrganizer = "SELECT organizerCompanyName FROM `organizer` WHERE organizerID = $organizerID;";
      $resultorganizer = $conn->query($sqlgetOrganizer);
      $roworgaznier = $resultorganizer->fetch_assoc();

      if ($row["gamePhotoID"] == null)
        $photoID = "NO.jpg";
      else
        $photoID = $row["gamePhotoID"];
      // '.$row["gameTitle"].';


      echo '<div class="container" style="margin-top: 20px;">
      <div class="card shadow">
        <div class="card-header">
          <div class="row">
            <div class="col-7">
              <h3 class="eventName">' . $row["gameTitle"] . '</h3>

            </div>
            <div class="col-5">

              <!-- ! trigger open the modal -->

              <div style="float: right;" class="btn-group">
                <a href="admin.php" type="button"class="button primary small btndetail">Back</a>
              </div>
            </div>
          </div>

        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-4">
              <img src="profilegame/' . $photoID . '" class="img-fluid eventimg">
            </div>
            <div class="col-8">

            <div class="form-group">
            <label for="description">Description</label>
            <textarea style="font-size: small;" type="text" class="form-control" rows="3" 
            placeholder="' . $row["gameDescription"] . '" readonly></textarea>
          </div>

              <div class="form-group">
                <label for="description">Instruction</label>
                <textarea style="font-size: small;" type="text" class="form-control" rows="3" 
                placeholder="' . $row["gameInstruction"] . '" readonly></textarea>
              </div>
              
              <div class="form-row">
                <div class="form-group col-sm-6">
                <label for="venue">Organizer:</label>
                  <input type="text" class="form-control" placeholder="' . $roworgaznier["organizerCompanyName"] . '" readonly>
                  <label for="venue">Venue:</label>
                  <input type="text" class="form-control" placeholder="' . $row["gameVenue"] . '" readonly>
                  <label for="fee">Fee:</label>
                  <input type="text" class="form-control" placeholder="' . $row["gameFee"] . '" readonly>
                  <label for="regdate">Register Due Date:</label>
                  <input type="text" class="form-control" placeholder="6 Feb 2020" readonly>
                </div>
                <div class="form-group col-sm-6">
                  <label for="date" >Date:</label>
                  <input type="text" class="form-control" placeholder="12 Feb 2020" readonly>
                  <label for="time">Time:</label>
                  <input type="text" class="form-control" placeholder="' . $row["gameTime"] . '" readonly>
                  <label for="maxparticipant">Team registered:</label>
                  <input type="text" class="form-control" placeholder="' . $row["currentTeam"] . '/' . $row["gameMaxTeam"] . '" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    </div>';
    }
    ?>
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
            <li><a href="admin.php">Home</a></li>
            <li><a href="processLogout.php">Logout</a></li>
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

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="js/admint-gd.js"></script>
</body>

</html>