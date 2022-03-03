<?php
session_start();
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
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/index.css">
	<link rel="stylesheet" href="assets/css/invoice.css">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/paper-bootstrap-wizard.css" rel="stylesheet" />
	<link href="assets/css/demo.css" rel="stylesheet" />

	<!-- Fonts and Icons -->
    <link href="https://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">
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
		                        	<h3 class="wizard-title">Your invoice mate!</h3>
		                        	<p class="category">Thank you mate!</p>
		                    	</div>
								<div class="wizard-navigation">	
									<div class="progress-with-circle">
									    <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="1" aria-valuemax="3" style="width: 21%;"></div>
									</div>
									<ul>
			                            <li class = "active">
											<a href="#receipt" data-toggle="tab" aria-expanded="true">
												<div class="icon-circle">
													<i class="ti-receipt"></i>
												</div>
												Invoice
											</a>
										</li>
			                        </ul>
								</div>
		                        <div class="tab-content">								
		                            <div class="tab-pane active" id="receipt">
										
		                                <div class="row">
											<img src="assets/img/thankyou.gif" alt="Thanks" class="center" style=" margin-left: auto; margin-right: auto;display: block;" >
											<br>
											<div id="invoice" style = "margin:auto">

												<div class="toolbar hidden-print">
													<div class="text-right">
														<button id="printInvoice" class="btn btn-info"><i class="fa fa-print"></i> Print</button>
													</div>
													<hr>
												</div>
												<div class="invoice overflow-auto">
													<div style="min-width: 600px">
														<header>
															<div class="row">
																<div class="col">
																	<a target="_blank" href="paymentIndex.php">
																		<img src="assets/img/Pirate_Logo.png" data-holder-rendered="true" height = "100px" width = "100px"/>
																		</a>
																</div>
																<div class="col company-details">
																	<h2 class="name">
																		Treasure Hunter!
																	</h2>
																	<div>Captain Jack Sparrow Home</div>
																	<div>+603-9999999</div>
																	<div>jacksparrow@treasurehunter.com</div>
																</div>
															</div>
														</header>
														<main>
															<div class="row contacts">
																<div class="col invoice-to">
																	<div class="text-gray-light">INVOICE TO:</div>
																	<h2 class="to"><?php echo $_SESSION["Leadername"]; ?></h2>
																	<div class="email"><a href="mailto:<?php echo $_SESSION["LeaderEmail"]; ?>"><?php echo $_SESSION["LeaderEmail"]; ?></a></div>
																</div>
																<div class="col invoice-details">
																	<h1 class="invoice-id">INVOICE <?php echo $_SESSION['InvoiceID']; ?></h1>
																	<div class="date">Date of Invoice: <?php echo date("d/m/Y"); ?> </div>
																	<div class="date">Due Date: <?php 
																	$date = strtotime("+7 day");
																	echo date('d/m/Y', $date); ?></div>
																</div>
															</div>
															<table class = "theinvoicedata" cellspacing="0" cellpadding="0">
																<thead>
																	<tr>
																		<th>#</th>
																		<th class="text-left">Description</th>
																		<th class="text-right">Price</th>
																		<th class="text-right">Participants</th>
																		<th class="text-right">Total</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td class="no">01</td>
																		<td class="text-left"><h3>
																		<?php echo $_SESSION["game"]; ?>
																			</h3>
																			at <?php echo $_SESSION['time']; ?>
																		</td>
																		<td class="unit"><?php echo $_SESSION['gameFee']; ?></td>
																		<td class="qty"><?php echo $_SESSION['participant']; ?></td>
																		<td class="total">RM<?php echo $_SESSION['price']; ?></td>
																	</tr>
																</tbody>
																<tfoot>
																	<tr style="background-color: white;">
																		<td colspan="2"></td>
																		<td colspan="2">SUBTOTAL</td>
																		<td><?php 
																		echo "RM".$_SESSION['price']; ?></td>
																	</tr>
																	<tr style="background-color: white;">
																		<td colspan="2"></td>
																		<td colspan="2">TAX 2%</td>
																		<td>
																		<?php 
																		$tax = (2/100) * $_SESSION['price'];
																		echo "RM".number_format((float)$tax, 2, '.', '');
																		?>
																		</td>
																	</tr>
																	<tr style="background-color: white;">
																		<td colspan="2"></td>
																		<td colspan="2">GRAND TOTAL</td>
																		<td>
																		<?php 
																		$tax = (2/100) * $_SESSION['price'];
																		$grandtotal = $tax + $_SESSION['price'];
																		echo "RM".number_format((float)$grandtotal, 2, '.', '');
																		?>
																		</td>
																	</tr>
																</tfoot>
															</table>
															<div class="thanks">Thank you!</div>
															<div class="notices">
																<div>NOTICE:</div>
																<div class="notice">Please come to the place with this invoice and pay before the due date</div>
															</div>
														</main>
														<footer>
															Invoice was created on a computer and is valid without the signature and seal.
														</footer>
													</div>
													<div></div>
												</div>
											</div>  
										
		                                </div>
		                            </div>
								</div>
								
		                        <div class="wizard-footer">
	                            	<div class="pull-right">
										<input type='button' id = "finishpage" class='btn btn-finish btn-fill btn-danger btn-wd' name='finish' value='Finish' />
										<script type="text/javascript">
											document.getElementById("finishpage").onclick = function () {
												location.href = "homepage.php";
												// <?php
												// session_unset();
												// session_destroy(); 
												// ?> //back to the homepage of Pirate Treasure Hunt!
											};
										</script>
									</div>

	                                <div class="pull-left">
	                                    <!-- <input type='button' class='btn btn-previous btn-default btn-wd' name='previous' value='Previous' /> -->
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


