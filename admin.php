<?php
include_once("config.php");
session_start();

$_SESSION['logged_in'];
$userName = $_SESSION['name'];
$organizerID = $_SESSION['userid'];

if ($_SESSION['logged_in'] == 'player' || $_SESSION['logged_in'] ==null){
  	header("Location: login.php");
}


?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <title> Admin</title>

  <link rel="stylesheet" type="text/css" href="css/admin.css">
  <link rel="stylesheet" type="text/css" href="css/nav_footer.css">

</head>

<body>
  <header>
    <!-- Navigator -->
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container"><a href="admin.php#" class="navbar-brand nav-title"><img src="img/logo.png" width="40">
          Treasure: Be The King</a>
        <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>

        <div id="navbarSupportedContent" class="collapse navbar-collapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active"><a href="admin.php" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
            <li class="nav-item"><a href="#yourGame" class="nav-link text-uppercase font-weight-bold">Your Game</a></li>
            <li class="nav-item"><a href="#game-list-organizer" class="nav-link text-uppercase font-weight-bold">Game List</a></li>
            <li class="nav-item"><a href="orgProfile.php" class="nav-link text-uppercase font-weight-bold"><?php echo $userName?> </a></li>

            <li class="nav-item"><a href="processLogout.php" class="nav-link text-uppercase font-weight-bold">Logout</a>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end Navigator -->

    <!-- carousel -->
    <div id="carouseladmin" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouseladmin" data-slide-to="0" class="active"></li>
        <li data-target="#carouseladmin" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="img/pirate5.jpg" alt="Second slide">
          <div class="carousel-caption d-none d-lg-block">
            <h1>Awards!</h1>
            <p>Game: Krogan have won game of the choice.</p>
            <p><a href="#hunter" class="btn btn-light">Read More</a></p>
          </div>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="img/pirate6.jpg" alt="Third slide">
          <div class="carousel-caption d-none d-lg-block">
            <h1>Important!</h1>
            <p>Site will be update form 3 Feb 2020 10 a.m to 4 Feb 2020 1 a.m. We sorry for the inconvinience cause.</p>
            <p><a href="#hunter" class="btn btn-light">Read More</a></p>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouseladmin" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouseladmin" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- end carousel -->

  </header>

  <main>

    <!-- game section -->
    <div id="yourGame">
      <div class="container">
        <h2 class="text-center section-title">Your Registered Game</h2>
        <div class="row">
          <p class="text-center col"><a href="AddNewGame.php" type="button" class="btn btn-default btn-sx">Register New Game</a></p>
        </div>
        <hr>
      </div>


      <!-- card -->
      <div class="px-5 mx-5">
        <!-- card -->
        <div class="container">

          <?php
          $sqladminreg = "SELECT * FROM `game` WHERE organizerID = $organizerID;";
          $result = $conn->query($sqladminreg);

          echo "<br>";
          if ($result->num_rows > 0) {
            echo "<br>";
            // output data of each row
            while ($row = $result->fetch_assoc()) {
              if ($row["gamePhotoID"] == null)
                $photoID = "NO.jpg";
              else
                $photoID = $row["gamePhotoID"];

              echo '<div class="game-card shadow mb-5"><div class="row">
              <div class="col-5 p-0">
                <img src="profilegame/' . $photoID . '" class="img-fluid">
              </div>

              <div class="col-7">

                <h1 class="font-weight-bold text-center" style="font-size:50px;">' . $row["gameTitle"] . '</h1>';

              echo '<div class="text-center">
                  <a href="gameDetail.php?id=' . $row["gameID"] . '" type="button" class="btn btn-dark btn-sx"
                    style="font-size: xx-small;">Detail</a>
                  <a id="delete-game" type="button" data-toggle="modal" data-target="#confirm-remove-modal'.$row["gameID"].'"
                    style="font-size: xx-small;" class="btn btn-dark btn-sx text-light">Delete</a>
                </div>

                <div class="row ">
                  <div class="col">
                    <p class="card-desc">
                      <span style="font-weight: bold;">Description:</span>
                      <br>
                      ' . $row["gameDescription"] . '
                      </p>
                  </div>

                </div>

                <div class="text-center row card-tag">
                  <div class="col">
                    <p class="btn btn-dark btn-sx" style="font-size: xx-small;">Date : ' . $row["gameDate"] . ' </p>
                    <p class="btn btn-dark btn-sx" style="font-size: xx-small;"> Time : ' . $row["gameTime"] . '</p>
                    <p class="btn btn-dark btn-sx" style="font-size: xx-small;">Fee : RM' . $row["gameFee"] . ' per team</p>
                  </div>
                </div>

              </div>


            </div>
          </div>';
            }
          } else {
            echo "0 results";
          }
          // <!-- Game 1 -->

          ?>

        </div>

      </div>

    </div>


    <!-- Game List Section -->
    <div id="game-list-organizer">

      <div class="container">
        <div class="section-title text-center center">
          <h2>Game</h2>
          <hr>
        </div>


        <table class="table table-striped table-dark">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Venue</th>
              <th scope="col">Date</th>
              <th scope="col">Time</th>
              <th scope="col">Fee</th>
              <th scope="col">Registeration due date</th>
              <th scope="col">Team</th>
              <th scope="col">Description</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $sqlshowallgame = "SELECT * FROM `game` EXCEPT SELECT * FROM `game` WHERE organizerID = $organizerID;";
            $resultallgame = $conn->query($sqlshowallgame);

            echo "<br>";
            if ($resultallgame->num_rows > 0) {
              $gameNo = 1;
              
              while ($row = $resultallgame->fetch_assoc()) {
                if ($row["gameMaxTeam"] == $row["currentTeam"])
                  $currenTeamNo = "Full (" . $row["gameMaxTeam"] . ")";
                else
                  $currenTeamNo = $row["currentTeam"] . '/' . $row["gameMaxTeam"];
                echo '<tr>
              <th scope="row">' . $gameNo . '</th>
              <td>' . $row["gameTitle"] . '</td>
              <td>' . $row["gameVenue"] . '</td>
              <td>' . $row["gameDate"] . '</td>
              <td>' . $row["gameTime"] . '</td>
              <td>RM' . $row["gameFee"] . '</td>
              <td>' . $row["gameRegisterDue"] . '</td>
              <td>' . $currenTeamNo . '</td>
              <td class="text-center"><a href="gameDetailreadOnly.php?id=' . $row["gameID"] . '" class="btn btn-dark text-light">Click Here</a>
              </td>';
                $gameNo++;
              }
            }
            ?>
          </tbody>
        </table>


      </div>

    </div>

  </main>

  <!-- ======= Footer ======= -->
  <footer class="site-footer">

    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-6">
          <h6>About</h6>
          <p class="text-justify">Treasure: <i>Be The King </i> is the largest online destination dedicated to treasure
            hunt game. Here you can discover new games from various of organizer. Join game and win the prize.</p>
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


  <!-- Modal -->
  <?php
  $sqlshowallgame = "SELECT * FROM `game` WHERE organizerID = $organizerID;";
  $resultallgame = $conn->query($sqlshowallgame);

  echo "<br>";
  if ($resultallgame->num_rows > 0) {
    $gameNo = 1;
    while ($row = $resultallgame->fetch_assoc()) {
      if ($row["gameMaxTeam"] == $row["currentTeam"])
        $currenTeamNo = "Full (" . $row["gameMaxTeam"] . ")";
      else {
        $currenTeamNo = $row["currentTeam"] . '/' . $row["gameMaxTeam"];
      }
      echo '<div class="modal fade" id="confirm-remove-modal'.$row["gameID"]. '" tabindex="-1" role="dialog"  aria-labelledby="confirm-remove-modal" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to remove ' . $row["gameTitle"] . '?
              </div>
              <div class="modal-footer">
                <a href=deleteGame.php?id=' . $row["gameID"] . ' type="button" class="btn btn-danger" >Confirm</a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
            </div>
          </div>
        </div>';
    }
  }
  ?>

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="js/admin.js"></script>

</body>

</html>