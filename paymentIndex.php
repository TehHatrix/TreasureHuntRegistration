<?php
session_start();
include('config.php');

$user = $_SESSION['logged_in'];
$name = $_SESSION['name'];
$email = $_SESSION['email'];

if ($_SESSION['logged_in'] == 'organizer'){
  header("Location: login.php");
}

$_SESSION['game'] = "Nazi Gold";
$_SESSION['date'] = "10/7/2020";
$_SESSION['participant'] = 2;

$sql = "SELECT gameTime,gameDate,gameFee,gameVenue,gameID FROM game WHERE gameTitle = '".$_SESSION['game']."'";
$result = $conn -> query($sql);
if ($result -> num_rows > 0){
	while ($row = $result -> fetch_assoc()){
		$_SESSION['time'] = $row['gameTime'];
		$_SESSION['venue'] = $row["gameVenue"];
		$_SESSION['gameID'] = $row["gameID"];
		$_SESSION['gameFee'] = $row['gameFee'];
	}
}
$gettotalprice =$_SESSION['gameFee'];
// $gettotalprice = $_SESSION['participant'] * $_SESSION['gameFee'];
$_SESSION['price'] = number_format((float)$gettotalprice, 2, '.', '');

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/Pirate_Logo.png" />
	<link rel="icon" type="image/png" href="assets/img/Pirate_Logo.png" />
	<title>Pirates Payment</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/index.css">
	<link rel="stylesheet" href="assets/css/invoice.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />
	<link href="assets/css/demo.css" rel="stylesheet" />

	<!-- Fonts and Icons -->
    <!-- <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet"> -->
	<link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
	<link href="assets/css/themify-icons.css" rel="stylesheet">

	</head>

	<body>
	<div class="image-container set-full-height" style="background-image: url('assets/img/bg2jpg.jpg')">
	         <div class="logo-container">
	            <div class="logo">
	                <img src="assets/img/pirate_logo2.png">
	            </div>
	            <div class="brand">
	                The Pirates!
	            </div>
	        </div>
	    </a>

	    <!--   Big container   -->
	    <div class="container">
	        <div class="row">
		        <div class="col-sm-2 col-sm-offset-2"></div>

		            <!--      Wizard container        -->
		            <div class="wizard-container" style = "width: 1200px; height: auto	;">
		                <div class="card wizard-card" data-color="orange" id="wizard">
		                <form action="" method="">	
		                    	<div class="wizard-header text-center">
		                        	<h3 class="wizard-title">Choose yer game, matey!</h3>
		                        	<p class="category">Pay us sum' rum!</p>
		                    	</div>
								<div class="wizard-navigation">	
									<div class="progress-with-circle">
									    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
									</div>
									<ul>
			                            <li>
											<a href="#location" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-game"></i>
												</div>
												Confirm Details
											</a>
										</li>
										<li>
											<a href="#type" data-toggle="tab">
												<div class="icon-circle">
													<i class="ti-money"></i>
												</div>
												Pay
											</a>
										</li>
			                        </ul>
								</div>
		                        <div class="tab-content">
		                            <div class="tab-pane" id="location">
		                            	<div class="row">
		                                	<div class="col-sm-12">
		                                    	<h5 class="info-text"> Let's confirm with the basic details, Captain! </h5>
		                            		</div>
		                                	<div class="col-sm-5 col-sm-offset-1">
		                                    	<div class="form-group">
													<label>Games</label>
													<select class="form-control" style=" box-sizing: content-box;" disabled>
													<option disabled="" selected="">- Games -</option>
														<?php 
														 if ($_SESSION['game'] == "Black Beards Treasure"){
															 echo "<option value = 'Black Beards Treasure' selected>Black Beard's Treasure</option>";
														 }
														 elseif($_SESSION['game'] == "Nazi Gold"){ 
															echo "<option value = 'Nazi Gold' selected>Nazi Gold</option>";
														 }
														 elseif($_SESSION['game'] == "Mission Possible Kuala Lumpur"){ 
															echo "<option value = 'Mission Possible Kuala Lumpur' selected>Mission Possible Kuala Lumpur</option>";
														 }
														 elseif($_SESSION['game'] == "007 Plus 1"){ 
															echo "<option value = '007 Plus 1' selected>007 Plus 1</option>	";
														 }
														 elseif($_SESSION['game'] == "Jack Sparrows Island Hopping"){ 
															echo "<option value = 'Jack Sparrows Island Hopping' selected>Jack Sparrow's Island Hopping</option>";
														 }
														 elseif($_SESSION['game'] == "Funny Bunny Easter Hunt"){ 
															echo "<option value = 'Funny Bunny Easter Hunt' selected>Funny Bunny Easter Hunt</option>";
														 }
														?>
													</select>
												</div>
												<div class="row">
													<div class="col form-group">
														<label>Date</label><br>
														<p><?php echo $_SESSION['date']; ?></p>
													</div>
													<div class="col form-group">
														<label>Time</label><br>
														<p><?php echo $_SESSION['time']; ?></p>
													</div>
														<div class="col form-group">
															<label>Venue</label><br>
															<p><?php echo $_SESSION['venue'];?> </p>
														</div>
												</div>
												<div class="form-group"></div>
														<div class="form-group">
															<label>Price</label>
															<div class="input-group">
																<input class="form-control" type="text" placeholder="" value ="<?php echo $_SESSION['price']; ?>" readonly>
																<span class="input-group-addon">RM</span>
															</div>
														</div>
														<div class="form-group" style = "height : auto ; overflow: visible;">
															<label>How many are ya mate?</label>
															<div class="input-group">
																<input class="form-control" type="text" placeholder="" value= "<?php echo $_SESSION['participant']; ?>" readonly>
																<span class="input-group-addon">Players</span>
															</div>
														</div>
		                                	</div>	

		                                	<div class="col-sm-12 col-sm-5 col-md 5 mmb">
		                                    	<div class="form-group">
														<?php 
														 if ($_SESSION['game'] == "Black Beards Treasure"){
															 echo "<img src='assets/img/games 2.jpg' alt='Games' style='margin: auto 70px; float:left;width:400px;height:400px;border-radius: 8px;'>";
														 }
														 elseif($_SESSION['game'] == "Nazi Gold"){ 
															echo "<img src='assets/img/games 3.jpg' alt='Games' style='margin: auto 70px; float:left;width:400px;height:400px;border-radius: 8px;'>";
														 }
														 elseif($_SESSION['game'] == "Mission Possible Kuala Lumpur"){ 
															echo "<img src='assets/img/games 4.jpg' alt='Games' style='margin: auto 70px; float:left;width:400px;height:400px;border-radius: 8px;'>";
														 }
														 elseif($_SESSION['game'] == "007 Plus 1"){ 
															echo "<img src='assets/img/games 5.jpg' alt='Games' style='margin: auto 70px; float:left;width:400px;height:400px;border-radius: 8px;'>";
														 }
														 elseif($_SESSION['game'] == "Jack Sparrows Island Hopping"){ 
															echo "<img src='assets/img/games 6.jpg' alt='Games' style='margin: auto 70px; float:left;width:400px;height:400px;border-radius: 8px;'>";
														 }
														 elseif($_SESSION['game'] == "Funny Bunny Easter Hunt"){ 
															echo "<img src='assets/img/games 7.jpg' alt='Games' style='margin: auto 70px; float:left;width:400px;height:400px;border-radius: 8px;'>";
														 }
														?>
		                                    	</div>
		                                	</div>
		                            	</div>
		                            </div>
		                            <div class="tab-pane" id="type">
		                                <h5 class="info-text">How do you want to pay us? </h5>
		                                <div class="row">
		                                    <div class="col-sm-8 col-sm-offset-2">
		                                        <div class="col-sm-4 col-sm-offset-2">
													<div class="choice" data-toggle="wizard-checkbox" onclick='window.location.assign("creditcard.php")'>
		                                                <input type="checkbox" id ="credit1" name="credit" value="Design">
		                                                <div class="card card-checkboxes card-hover-effect" >
															<i class="ti-credit-card"></i>	
															<p>Credit Card</p>
		                                                </div>
		                                            </div>
		                                        </div>
		                                        <div class="col-sm-4">
													<div class="choice" data-toggle="wizard-checkbox" onclick='window.location.assign("cashcheckout.php")'>
		                                                <input type="checkbox" id ="cash1" name="cash" value="Design2" >
		                                                <div class="card card-checkboxes card-hover-effect" >
		                                                    <i class="ti-money"></i>
															<p>Cash</p>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
								</div>
								
		                        <div class="wizard-footer">
	                            	<div class="pull-right">
	                                    <input type='button' class='btn btn-next btn-fill btn-danger btn-wd' name='next' value='Next' />
										<input type='button' class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish' />
									</div>

	                                <div class="pull-left">	
										<input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' />
										<input type='button' id = 'prevpage' class='btn btn-backpage btn-default btn-wd' name='backpage' value='Back to the team page' />
										<script type="text/javascript">
											document.getElementById("prevpage").onclick = function () {
												location.href = "teamregistration.php?gameid=<?php echo $_SESSION['gameID']; ?>";
											};
										</script>
									</div>	
	                                <div class="clearfix"></div>
		                        </div>
		                    </form>
		                </div>
		            </div> <!-- wizard container -->
		        </div>
	        </div> <!-- row -->
	    </div> <!--  big container -->

	</div>

</body>

	<!--   Core JS Files   -->
	<script src="assets/js/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="assets/js/demo.js" type="text/javascript"></script>
	<script src="assets/js/invoice.js" type="text/javascript"></script>
	<script src="assets/js/paper-bootstrap-wizard.js" type="text/javascript"></script>

	<!--  More information about jquery.validate here: https://jqueryvalidation.org/	 -->
	<script src="assets/js/jquery.validate.min.js" type="text/javascript"></script>

</html>
