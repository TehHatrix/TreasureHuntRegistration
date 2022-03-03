<?php
    session_start();

    include_once("config.php");
    
    $gameID = $_GET['id']; //get gameid
    $userName = $_SESSION['name'];
    
    // change later according to current user
    $userid = $_SESSION['userid'];
    $_SESSION['logged_in'];
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
              <li class="nav-item"><a href="viewNoti.php" class="nav-link text-uppercase font-weight-bold">Message <span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a href="admin.php" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a href="orgProfile.php" class="nav-link text-uppercase font-weight-bold"><?php echo $userName?></a></li>
                <li class="nav-item"><a href="processLogout.php" class="nav-link text-uppercase font-weight-bold">Logout</a>
              </ul>
          </div>
      </div>
      
    </nav>

    <!-- end nav -->
    </header>


    <div class="container" style="margin-top: 20px;">
      <div class="card shadow">
        <div class="card-header">
          <div class="row">
            <div class="col-7">

                <!-- title -->
                <?php
                $sqlgame = "SELECT * FROM game WHERE gameID = $gameID;";
                $resgame = $conn->query($sqlgame);
                $rowgame = $resgame->fetch_assoc();
                $photoID = "";
                if ($rowgame["gamePhotoID"] == null)
                $photoID = "NO.jpg";
              else
                $photoID = $rowgame["gamePhotoID"];
                echo '<h3 class="eventName">'.$rowgame["gameTitle"].'</h3>';

                // !fetch the organizer data
                $sqlorganizer = "SELECT organizerCompanyName FROM organizer WHERE organizerID = ".$rowgame["organizerID"]." ; ";
                $resorganizer = $conn->query($sqlorganizer);
                $roworganizer = $resorganizer->fetch_assoc();
                
                ?>
              

            </div>
            <div class="col-5">

              <div class="btn-group">
                <button id="updateBtn" class="button primary small btndetail">Update Detail</button>
                <button id="notiBtn" class="button primary small btndetail">Send Notification</button>
                <a href="admin.php" type="button"class="button primary small btndetail">Back</a>
              </div>
            </div>
          </div>

          <!--! modal content -->

<!-- update detail modal -->
          <div id="updateModal" class="modal">
            <div class="modal-content">
              <div class="modal-body">
                <span class="close1">&times;</span>
                <h2 class="text-center">Update Detail</h2>

                <form action="" method="POST">
                  <div class="row">
                    <div class="col-12">                      
                      <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" style="font-size: small;" type="text" class="form-control" rows="3" 
                        ><?php  echo $rowgame["gameDescription"];  ?></textarea>
                      </div>
                      
                      <div class="form-group">
                        <label>Instruction</label>
                        <textarea style="font-size: small;" type="text" class="form-control" rows="3" name="instruction" 
                        ><?php  echo $rowgame["gameInstruction"];  ?></textarea>
                      </div>
                      
                      <div class="form-row">
                        <div class="form-group col-sm-6">
                          <label >Venue:</label>
                          <input name="venue" type="text" class="form-control" value="<?php  echo $rowgame["gameVenue"];  ?>" >
                          <label >Fee:</label>
                          <input name="fee" type="text" class="form-control" value="<?php  echo $rowgame["gameFee"];  ?> " >
                          <label >Register Due Date:</label>
                          <input name="regdate" type="date" class="form-control" value="<?php  echo $rowgame["gameRegisterDue"];  ?>" >
                          <input type="hidden" name="gameID" value="<?php echo "$gameID"?>">
                          <input class="button primary small" style="margin-top: 6px;" name="submit" type="submit" >
                        </div>
                        <div class="form-group col-sm-6">
                          <label >Date:</label>
                          <input name="date" type="date" class="form-control" value="<?php  echo $rowgame["gameDate"];  ?>" >
                          <label >Time:</label>
                          <input name="time" type="time" class="form-control" value="<?php  echo $rowgame["gameTime"];  ?>" >
                        </div>
                      </div>
                    </div>
                  </div>
                </form>

                <?php

if(isset($_POST['submit'])){

  $description = $_POST["description"];
  $instruction = $_POST["instruction"];
  $venue = $_POST["venue"];
  $fee = $_POST["fee"];
  $regdate = $_POST["regdate"];
  $date = $_POST["date"];
  $time = $_POST["time"];

  $sqlupdate = "UPDATE game SET gameDescription = '$description',gameInstruction = '$instruction',gameVenue = '$venue'
  ,gameFee = '$fee',gameRegisterDue = '$regdate',gameDate = '$date',gameTime = '$time' WHERE gameID= $gameID";
  $resultupdate = $conn->query($sqlupdate);
}



?>




              </div>
            </div>
          </div>


<!--!notification modal  -->
          <div id="notiModal" class="modal">
            <div class="modal-content">
              <div class="modal-body">
                <span class="close2">&times;</span>
                <h2 class="text-center">Send Notification</h2>

                <form action="sendNoti.php" method="POST">

                    <div class="form-row">
                      <div class="form-group col-sm-6">
                        <label for="title">Title:</label>
                        <input name="title" type="text" class="form-control">
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="recepient">Recepient Team:</label>
                        <!-- <input type="text" class="form-control" name="recepientTeam"> -->
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="inputGroupSelect01">Team:</label>
                          </div>
                          <select name="teamid" class="custom-select" id="inputGroupSelect01">
                          <option selected>Choose...</option>
                          <?php
                            $sqlteam = "SELECT * FROM team WHERE gameId = $gameID;";
                            $resteam = $conn->query($sqlteam);
                            while($rowteam = $resteam->fetch_assoc()){
                              echo '<option value="' .$rowteam["teamID"]. '">' .$rowteam["teamName"]. '</option>';
                            }
                          ?>
                          </select>
                        </div>

                      </div>
                    </div>
                    <div class="form-group">
                      <label for="message">Message:</label>
                      <textarea name="message" class="form-control" rows="4" ></textarea>
                    </div>
                    <div class="text-center">
                      <input class="button primary small" type="submit" name="sendnoti"></input>
                    </div>

                </form>
            
              </div>
            </div>  
          </div>

          <!-- php for update notification -->
          <?php

            if(isset($_POST['sendnoti'])){
              $title = $_POST["title"];
              $teamid = $_POST["teamid"];
              $content = $_POST["message"];
              // echo $content.'      <br>'.$teamid;
              if($_POST['teamid']>0){
                $sqlnoti = "INSERT INTO playermessage (senderID, recipientID, title, notificationtext) VALUES ('$userid', '$teamid', '$title', '$content');";
                // $resnoti = $conn->query($sqlnoti);
                if ($conn->query($sqlnoti)) {
                  echo '<script type="text/javascript">alert("Message sended successfully") </script>';
                }
              }else{
                echo '<script type="text/javascript">alert("Message not sended") </script>';
                
              }

            }
          
          ?>
                        

          <!-- ! end of modal -->

        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-4">
              <img src="<?php  echo 'profilegame/'.$photoID;  ?>" class="img-fluid eventimg">
            </div>
            <div class="col-8">
              
              <div class="form-group">
                <label for="description">Description</label>
                <textarea style="font-size: small;" type="text" class="form-control" rows="3" 
                readonly><?php  echo $rowgame["gameDescription"];  ?></textarea>
              </div>
              
              <div class="form-group">
                <label>Instruction</label>
                <textarea style="font-size: small;" type="text" class="form-control" rows="3" 
                readonly><?php  echo $rowgame["gameInstruction"];  ?></textarea>
              </div>

              <div class="form-row">
                <div class="form-group col-sm-6">
                  <label >Organizer:</label>
                  <input type="text" class="form-control" placeholder="<?php echo $roworganizer["organizerCompanyName"]; ?>" readonly>
                  <label >Venue:</label>
                  <input type="text" class="form-control" placeholder="<?php  echo $rowgame["gameVenue"];  ?>" readonly>
                  <label >Fee:</label>
                  <input type="text" class="form-control" placeholder="<?php  echo $rowgame["gameFee"];  ?> " readonly>
                  <label >Register Due Date:</label>
                  <input type="text" class="form-control" placeholder="<?php  echo $rowgame["gameRegisterDue"];  ?>" readonly>
                </div>
                <div class="form-group col-sm-6">
                  <label >Date:</label>
                  <input type="text" class="form-control" placeholder="<?php  echo $rowgame["gameDate"];  ?>" readonly>
                  <label >Time:</label>
                  <input type="text" class="form-control" placeholder="<?php  echo $rowgame["gameTime"];  ?>" readonly>
                  <label >Team registered:</label>
                  <input type="text" class="form-control" placeholder="<?php  echo $rowgame["currentTeam"].'/'.$rowgame["gameMaxTeam"];  ?>" readonly>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button class="collapsible" type="button">View Player List</button>
      <div class="content">


        <!-- !start php player list -->
          <?php 
            $sqlteam = "SELECT * FROM team WHERE gameId = $gameID;";
            $resteam = $conn->query($sqlteam);
            // $rowteam = $resteam->fetch_assoc();
            $totalteam = $resteam->num_rows ;

            if ($totalteam>0){
// carousel slide with each team
                echo '<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">';
                echo '
                <div class="carousel-inner">';
                $count = 0;
                while($rowteam = $resteam->fetch_assoc()){
                    $current = $rowteam["teamID"];
                    // echo $rowteam["teamName"].'<br>'.$current;

                    $count++;
                    if($count == 1){
                        echo'
                        <div style="margin-top: 5px; background-color: white" class="carousel-item active">
                        <h1 class="text-center">' .$rowteam["teamName"]. '</h1>
                        <table class="table" >
                        <thead class="thead-dark">
                        <tr>    
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        </tr>
                        </thead>
                        <tbody>';
                    }else{
                        echo'
                        <div style="margin-top: 5px; background-color: white" class="carousel-item ">
                        <h1 class="text-center">' .$rowteam["teamName"]. '</h1>
                        <table class="table">
                        <thead class="thead-dark">
                        <tr>    
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        </tr>
                        </thead>
                        <tbody>';
                    }

                    $sqlplayerlist = "SELECT teammembers.playerID, player.playerFullName, player.playerPhone, player.playerEmail FROM teammembers INNER JOIN
                    player ON teammembers.playerID = player.playerID WHERE teamID = $current;";
                    $resplayerlist = $conn->query($sqlplayerlist);
                    // player fname email phone table
                    while($rowplayerlist = $resplayerlist->fetch_assoc()){
                        // echo $rowplayerlist["playerFullName"];
                        echo '
                        <tr>
                        <td> ' .$rowplayerlist["playerFullName"]. '</td> 
                        <td> ' .$rowplayerlist["playerEmail"]. '</td> 
                        <td> ' .$rowplayerlist["playerPhone"]. '</td>             
                        </tr>';
                    }
                    echo '
                    </table>
                    </div>';
                }

                echo '
                </div>
                <a class="carousel-control-prev"  href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" style="background-color: grey" aria-hidden="true"></span>
                <span class="sr-only" >Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" style="background-color: grey" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
                </div>';


                
            }else {
                echo '<h3> No team has registered</h3>';
            }
          ?>

      </div>

    </div>
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

  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

  <script
  src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script
  src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
  crossorigin="anonymous"></script>
  <script src="js/admint-gd.js"></script>
  <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
</script>
</body>
</html>