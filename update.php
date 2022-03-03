<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treasure hunts: Team Delete</title>
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
                <li class="nav-item active"><a href="../player.html" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                <li class="nav-item"><a href="../playerprofile.html" class="nav-link text-uppercase font-weight-bold">Ali</a></li>
                <li class="nav-item"><a href="../index.html" class="nav-link text-uppercase font-weight-bold">Logout</a></li>
            </ul>
        </div>
    </div>
    
  </nav>

<div style="margin: 0px auto; text-align: center; padding-bottom: 150px; padding-top: 150px;">
<?php
    $servername = "localhost";
    $username = "marijana";
    $password = "marijana123";
    $dbname = "treasure";
    
    $con = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
     $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_POST["deleteTeam"])) {
        $team = $_POST['team'];

        $stmt = $con->prepare("SELECT * FROM team WHERE teamName=:team");
        $stmt->bindParam(':team', $team);
        $stmt->execute();
        $teamFound = $stmt->fetch();

        if ($teamFound == 0) {
            die("Team '".$team."' has not yet been registered.<br>.");
        }
        else{
            $teamID = $teamFound['teamID'];
            $stmt = $con->prepare("DELETE FROM teammembers WHERE teamID=:ID");
            $stmt->bindParam(':ID', $teamID);
                if ($stmt->execute()) {
            
                $stmt = $con->prepare("DELETE FROM team WHERE teamName=:teamN");
                $stmt->bindParam(':teamN', $team);
                    if ($stmt->execute()) {
                        echo "The team '".$team."' has been deleted";
                    }
                    else{
                        echo "An error occurred.";
                    }
                }
        }
    }
    else{
        header("Location: ../update.html");
    }

    $con = null;
    echo "<form><input type='button' value='Go back' onClick='javascript:history.go(-1)'></form>";
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