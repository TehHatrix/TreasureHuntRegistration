<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Fill Details for Cash   </title>

    <!-- Icons font CSS-->
    <link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->


    <!-- Vendor CSS-->
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/css/cashmain.css" rel="stylesheet" media="all">
    <link href="assets/css/table.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="image-container set-full-height" style="background-image: url('assets/img/backgroundcash.jpg')">
    <div class="page-wrapper bg-gra-01 p-t-180 p-b-100 font-poppins">
        <div class="wrapper wrapper--w780">
            <div class="card card-3">
                <div class="card-heading">
                    <img src="assets/img/Pirate_Logo.png" alt="" style="width: 100px; height: 100px;">
                    <div class="container">
                        <table class = "thetable" style ="width: 300px;height: 400px;">
                            <tbody>
                                <tr>
                                    <td>Game</td>
                                    <td><?php echo $_SESSION['game'] ?></td>
                                </tr>
                                <tr>
                                    <td>Date</td>
                                    <td><?php echo $_SESSION['date'] ?></td>

                                </tr>
                                <tr>
                                    <td>Time</td>
                                    <td><?php echo $_SESSION['time'] ?></td>
                                </tr>
                                <tr>
                                    <td>Participants</td>
                                    <td><?php echo $_SESSION['participant'] ?></td>
                                </tr>
                                <tr>
                                    <td>Total Price (MYR) </td>
                                    <td><?php echo $_SESSION['price'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-body">
                    <h2 class="title" style= "font-family:'Muli'; color:#252422">Fill in details</h2>
                    
                    <form method="POST" action = "cashprocess.php" >
                        <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Leader Name" name="name" style= "font-family: 'Muli';" required>
                        </div>
                        <div class="input-group">
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="gender" required >
                                    <option disabled="disabled" selected="selected">Gender</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="email" placeholder="Email" name="email" style= "font-family: 'Muli';" required>
                        </div>
                        <div class="input-group">
                            <input class="input--style-3" type="tel" pattern = "[+]{1}[0-9]{11,14}" placeholder="Phone Number e.g +60195153880" name="phone" style= "font-family: 'Muli';" required>
                        </div>
                        <!-- <div class="input-group">
                            <input class="input--style-3" type="text" placeholder="Number of Participants" name="Participants" style= "font-family: 'Muli';">
                        </div> -->
                        <div class="p-t-10">
                            <!-- <form action="receipt.php" method = "get"><button class="btn btn--pill btn--green" type="submit" style="display: none;">hidden</button></form> -->

                                <input type="submit" class="btn btn--pill btn--green"  value="Submit" 
                                     name="Submit" style= "font-family: 'Muli';"  />
                        </br></br>
                            <input type='button' id = 'prevpage' class='btn btn--pill btn--green' name='backpage' style ="align-items: center;" value='I want to change my mind' />
                            <script type="text/javascript">
                                document.getElementById("prevpage").onclick = function () {
                                    location.href = "paymentIndex.php";
                                };
                            </script>   
                            
                     
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="assets/vendor/select2/select2.min.js"></script>
    <script src="assets/vendor/datepicker/moment.min.js"></script>
    <script src="assets/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="assets/js/global.js"></script>

</body>

</html>
<!-- end document-->