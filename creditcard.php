<?php
session_start();
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Credit Card Checkout</title>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/creditcardmain.css">

</head>

<body>

<div class="card">
<div class="container px-4 py-5 mx-auto" >
  <div class="row d-flex justify-content-center">
    
      <div class="col-5">
          <h4 class="heading">Shopping Bag</h4>
      </div>
      <div class="col-7">
          <div class="row text-right">
              <div class="col-4">
                  <h6 class="mt-2">Format</h6>
              </div>
              <div class="col-4">
                  <h6 class="mt-2">Quantity</h6>
              </div>
              <div class="col-4">
                  <h6 class="mt-2">Price</h6>
              </div>
          </div>
      </div>
  </div>
  <div class="row d-flex justify-content-center border-top">
      <div class="col-5">
          <div class="row d-flex">
          <?php
           if ($_SESSION['game'] == "Black Beards Treasure"){
            echo "<div class='book'> <img src='assets/img/games 2.jpg' class='book-img'> </div>";
             }
            elseif($_SESSION['game'] == "Nazi Gold"){ 
           echo "<div class='book'> <img src='assets/img/games 3.jpg' class='book-img'> </div>";
            }
            elseif($_SESSION['game'] == "Mission Possible Kuala Lumpur"){ 
           echo "<div class='book'> <img src='assets/img/games 4.jpg' class='book-img'> </div>";
            }
            elseif($_SESSION['game'] == "007 Plus 1"){ 
           echo "<div class='book'> <img src='assets/img/games 5.jpg' class='book-img'> </div>";
            }
            elseif($_SESSION['game'] == "Jack Sparrows Island Hopping"){ 
           echo "<div class='book'> <img src='assets/img/games 6.jpg' class='book-img'> </div>";
            }
            elseif($_SESSION['game'] == "Funny Bunny Easter Hunt"){ 
           echo "<div class='book'> <img src='assets/img/games 7.jpg' class='book-img'> </div>";
            }
          ?>
              <!-- <div class='book'> <img src='assets/img/games 2.jpg' class='book-img'> </div> -->
              <div class="my-auto flex-column d-flex pad-left">
                  <h6 class="mob-text"><?php echo $_SESSION['game']; ?></h6>
                  <p class="mob-text">at <?php echo $_SESSION['time']; ?></p>
              </div>
          </div>
      </div>
      <div class="my-auto col-7">
          <div class="row text-right">
              <div class="col-4">
                  <p class="mob-text">Games</p>
              </div>
              <div class="col-4">
                  <div class="row d-flex justify-content-end px-3">
                      <p class="mb-0" id="cnt1"><?php echo $_SESSION['participant']; ?></p>
                      <!-- <div class="d-flex flex-column plus-minus"> <span class="vsm-text plus">+</span> <span class="vsm-text minus">-</span> </div> -->
                  </div>
              </div>
              <div class="col-4">
                  <h6 class="mob-text"><?php echo $_SESSION['price']; ?></h6>
              </div>
          </div>
      </div>
  </div>
</div>  
  <form method = "post" action = "creditprocess.php">
  <div class="row justify-content-center">
      <div class="col-lg-12">
          <div class="card">
              <div class="row">
                  <div class="col-lg-3 radio-group">
                      <div class="row d-flex px-3 radio">
                       <label>
                       <input type="radio" id= "radio1" name="CardType" style = "position:fixed; opacity:0;" value="MasterCard" onClick="CB(this.value);" checked required>
                       <img class="pay" src="assets/img/mastercard.jpg"> MasterCard
                        </label>
                      </div>
                      <div class="row d-flex px-3 radio gray">
                      <label>
                       <input type="radio" id= "radio2" name="CardType" style = "position:fixed; opacity:0;" value="Visa" onClick="CB(this.value);" required>
                       <img class="pay" src="assets/img/visa.jpg"> Visa
                        </label>
                      </div>
                  </div>
                  <div class="col-lg-5">    
                      <div class="row px-2">
                          <div class="form-group col-md-6"> <label class="form-control-label">Name on Card</label><div id="ecard"></div> <input type="text" id="cname" name="cname" placeholder="Johnny Doe" required> </div>
                          <div class="form-group col-md-6"> <label id = "cardnum" class="form-control-label">Card Number </label>
                         <input type="tel" inputmode ="numeric" pattern = "[0-9\s]{13,19}" id="cnum" name="cnum" maxlength="19" placeholder="1111 2222 3333 4444" required> </div>
                      </div>
                      <div class="row px-2">
                          <div class="form-group col-md-6"> <label class="form-control-label">Expiration Date</label> <input type="text" id="exp" pattern = "(0[1-9]|1[012])/[0-9]{4}" maxlength="7" name="exp" placeholder="MM/YYYY" required> </div>
                          <div class="form-group col-md-6"> <label class="form-control-label">CVV</label> <input type="password" inputmode = "numeric" maxlength="3" pattern = "[0-9]{3}" id="cvv" name="cvv" placeholder="***" required> </div>
                      </div>
                  </div>
                  <div class="col-lg-4 mt-2">
                      <div class="row d-flex justify-content-between px-4">
                          <p class="mb-1 text-left">Subtotal</p>
                          <h6 class="mb-1 text-right">RM<?php echo $_SESSION['price']; ?></h6>
                      </div>
                      <div class="row d-flex justify-content-between px-4">
                          <p class="mb-1 text-left">Tax 2%</p>
                          <h6 class="mb-1 text-right">RM
                            <?php 
                            echo number_format((float) (2/100) * $_SESSION['price'], 2, '.', '');
                          ?></h6>
                      </div>
                      <div class="row d-flex justify-content-between px-4" id="tax">
                          <p class="mb-1 text-left">Total</p>   
                          <h6 class="mb-1 text-right">RM <?php 
                            $tax = (2/100) * $_SESSION['price'];
                            $grandtotal = $tax + $_SESSION['price'];
                            echo number_format((float)$grandtotal, 2, '.', '');
                          ?></h6>   
                      </div>
                        <button class="btn-block btn-blue" type="submit"> <span> <span id="checkout">Checkout</span> <span id="check-amt">RM <?php 
                            $tax = (2/100) * $_SESSION['price'];
                            $grandtotal = $tax + $_SESSION['price'];
                            echo number_format((float)$grandtotal, 2, '.', '');
                          ?></span> </span> </button>

                      <input type='button' id = 'prevpage' class='btn-block btn-blue' name='backpage' style ="align-items: center; color: white;" value='I want to change my mind' />
                      <script type="text/javascript">
                          document.getElementById("prevpage").onclick = function () {
                              location.href = "paymentIndex.php";
                          };
                      </script>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </form>
</div>

</div>
</div>
</body>


<script src="assets/js/creditcard.js" type="text/javascript"></script>


</html>