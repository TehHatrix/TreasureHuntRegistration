<?php

session_start();
include_once("config.php");
$id = $_SESSION['userid'];

$sql = "SELECT * FROM organizer WHERE organizerID=$id"; 
$result = $conn->query($sql);

// $res = $result->fetch_assoc()
while($res = $result->fetch_assoc())
{
  $organizerName = $res['organizerCompanyName'];
  $organizerEmail = $res['organizerEmail'];
  $organizerPhone = $res['organizerPhone'];
  $organizerPhoto = $res['organizerPhotoID'];

}	

$conn->close();

?>

<!DOCTYPE html>
<html>
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
        <div class="container"><a href="admin.html" class="navbar-brand nav-title"><img src="img/logo.png" width="40"> Treasure: Be The King</a>
            <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler navbar-toggler-right"><i class="fa fa-bars"></i></button>
            
            <div id="navbarSupportedContent" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="admin.php" class="nav-link text-uppercase font-weight-bold">Home <span class="sr-only">(current)</span></a></li>
                    <li class="nav-item"><a href="adminProfile.php" class="nav-link text-uppercase font-weight-bold"><?php echo  $organizerName;?></a></li>
                <li class="nav-item"><a href="processLogout.php" class="nav-link text-uppercase font-weight-bold">Logout</a>
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
              <form action="uploadOrg.php" method="post" enctype="multipart/form-data">
              <img src="img/place-holder.png" onclick="triggerClick()" id="profileDisplay">
              <label for="profileImage">Profile Image</label>
              <input type="file" onchange="displayImage(this)" name="profileImage" id="profileImage" class="form-control" style="display: none;">
              <button type="submit" class="btn btn-primary btn-block" name="submit">Change picture</button>

            </form>


              <button type="button" class="btn btn-default btn-block" data-toggle="modal" data-target="#edit-password-modal">Change password</button>
              <!-- Modal -->
              <div aria-hidden="true" aria-labelledby="myModalLabel" class="modal modal-with-faq fade" id="edit-password-modal" role="dialog">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title">Change password</h4>
                          </div>
                          <div class="modal-body">
                              
                              <form class="simple_form edit_user" id="change-password-form" name="chngpwd" action="orgChangePsw.php" method="post" onSubmit="return valid();">
                                  <input name="utf8" type="hidden" value="&#x2713;">
                                  <div class="form-group password optional user_current_password">
                                      <label class="control-label password optional" for="user_current_password">Current password</label>
                                      <input class="form-control password optional" type="password" name="opwd" id="opwd">
                                  </div>
                                  <div class="form-group password optional user_password">
                                      <label class="control-label password optional" for="user_password">New password</label>
                                      <input class="form-control password optional" type="password" name="npwd" id="npwd">
                                  </div>
                                  <div class="form-group password optional user_password_confirmation">
                                      <label class="control-label password optional" for="user_password_confirmation">Confirm password</label>
                                      <input class="form-control password optional" type="password" name="cpwd" id="cpwd">
                                  </div>
                                  <div class="modal-footer">
                              <button aria-hidden="true" class="btn btn-default" data-disable-with="Cancel" data-dismiss="modal">Cancel</button>
                              <button name="Submit" type="submit" class="btn btn-primary">Change Password</button>
                          </div>
                              </form>
                          </div>
                          
                      </div>
                  </div>
              </div>

              <button onclick="document.querySelector('#id01').style.display='block'" type="button" class="btn btn-danger btn-block">Delete account</button>
              <!-- Modal -->
              <div id="id01" class="modal">
                  <span onclick="document.querySelector('#id01').style.display='none'" class="close" title="Delete">×</span>
                  <form class="modal-content" style="width: 40%;" action="edit.php" method="post">
                      <div class="container">
                          <h1>Delete Account</h1>
                          <input type="hidden" name="delete_id">
                          <p>Are you sure you want to delete your account?</p>
                          <div class="clearfix">
                              <button type="button" onclick="document.querySelector('#id01').style.display='none'" class="cancelbtn">Cancel</button>
                              <a href="processDeleteProfileOrg.php" type="button" name="deletedata" onclick="document.querySelector('#id01').style.display='none'" class="deletebtn">Delete</a>
                          </div>
                      </div>
                  </form>
              </div>
              <script>
                  // Get the modal
                  var modal = document.getElementById('id01');
                  // When the user clicks anywhere outside of the modal, close it
                  window.onclick = function (event) {
                      if (event.target == modal) {
                          modal.style.display = "none";
                      }
                  }
              </script>

          </div>

          <div class="col-md-7">
              <!--  <h3>Edit Profile</h3> -->
              <h3>Organizer Profile</h3>

              <form class="simple_form edit_user" method="post" action="processUpdateProfileOrg.php">

                <?php
                    // get 'action' value in url parameter to display corresponding prompt messages
                    $action=isset($_GET['action']) ? $_GET['action'] : "";
                                    
                    // tell the user if access denied
                    if($action =="upload_failed"){
                      echo "<div class='alert alert-danger margin-top-40' role='alert'> Failed to upload.</div>";

                    }elseif ($action =="upload_sucess") {
                      echo "<div class='alert alert-success margin-top-40' role='alert'> Image uploaded and saved to database.</div>";
                    
                    }
                    ?>

                    <?php
                    // get 'action' value in url parameter to display corresponding prompt messages
                    $action=isset($_GET['action']) ? $_GET['action'] : "";
                    if($action =="delete_failed") {
                      echo "<div class='alert alert-danger margin-top-40' role='alert'>Error in deleting player, Please try again.</div>";
                    
                    }
                    ?>

                    <?php
                    if ($action =="chg_sucess") {
                      echo "<div class='alert alert-success margin-top-40' role='alert'>Password Changed Successfully !!</div>";
                    
                    }elseif ($action =="chg_failed") {
                      echo "<div class='alert alert-danger margin-top-40' role='alert'>Old Password not match !!</div>";
                    }

                  ?>


                <div class="form-group">
                <label for="user_name">
                    Company Name
                    <abbr title="required">*</abbr>
                </label>
                <input class="form-control" type="text" name="organizerName" id="organizerName" required value=" <?php echo  $organizerName;?>" >
                </div>

                <div class="form-group">
                <label for="user_email">
                Email
                    <abbr title="required">*</abbr>
                </label>
                <input class="form-control" type="email" name="organizerEmail" id="organizerEmail" value= <?php echo  $organizerEmail;?> required
                    >
                </div>

                <div class="form-group">
                <label for="user_phone">
                Phone Number
                    <abbr title="required">*</abbr>
                </label>
                <input class="form-control" maxlength="30" type="tel" size="30" name="organizerPhone" id="organizerPhone"
                    value=" <?php echo  $organizerPhone;?>" required >
                </div>
                <input type="submit" class="btn btn-primary font-weight-bold">
              </form>
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

    </div>
    </footer><!-- End Footer -->


<script type="text/javascript" src="js/scripts.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</body>
</html>