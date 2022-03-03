<?php
session_start();

$name = $cardType = $exp = "";
$cnum = $cvv = 0;
$_SESSION['link'] = "creditcard.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['CardType']) && isset($_POST['cname'])&& isset($_POST['cnum'])&& isset($_POST['exp'])&& isset($_POST['cvv']) ){
    $_SESSION['CardType'] = $_POST['CardType'];
    $cardType = $_POST['CardType'];
    if (empty($_POST["cname"]) || is_numeric($_POST['cname']) == 1) { 
        echo 'Please put your name properly!';
        $_SESSION["Error"] = "Your Name is invalid!";
        header("Location: error.php");
        exit();
        return false;
    }
    else {
        $name = $_POST["cname"];
        $_SESSION["Leadername"] = $name;
    }

    if (empty($_POST["cnum"]) || luhn_check($_POST['cnum']) != 1) { 
        echo 'Your Card Number is invalid!';
        $_SESSION["Error"] = "Your Card Number is invalid!";
        header("Location: error.php");
        exit();
        return false;
    }
    elseif(validateCreditCardType($_POST["cnum"]) != 1){
        if ($cardType == 'MasterCard'){
            echo "You have Mastercard but you entered different Card Number!";
            $_SESSION["Error"] = "You have Mastercard but you entered different Card Number!";
            header("Location: error.php");
            exit();
            return false;

        }
        else{
            echo "You have Visa but you entered different Card Number!";
            $_SESSION["Error"] = "You have Visa but you entered different Card Number!";
            header("Location: error.php");
            exit(); 
            return false;
        }

    }
    else {
        $cnum = $_POST["cnum"];
        $_SESSION["cnum"] = $cnum;
    }

    if (empty($_POST["exp"])) { 
        echo 'Please put your Expiration Card Number properly!';
        $_SESSION["Error"] = "Please put your Expiration Card Number properly!";
        header("Location: error.php");
        exit();
        return false;
    }
    else {
        $exp = $_POST["exp"];
        $_SESSION["exp"] = $exp;
    }

    if (empty($_POST["cvv"]) || is_numeric($_POST['cvv']) != 1) { 
        echo 'Your CVV Card is invalid!';
        $_SESSION["Error"] = "Your CVV Card is invalid!";
        header("Location: error.php");
        exit(); 
        return false;
    }
    else {
        $cvv = $_POST["cvv"];
        $_SESSION["cvv"] = $cvv;
    }
    include_once('config.php');

    $getleaderdetail = "SELECT playerEmail,playerPhone FROM player WHERE playerFullName = '".$name."'";
    $detail = $conn->query($getleaderdetail);
    if ($detail -> num_rows > 0){
        while($output = $detail -> fetch_assoc()){
            $email = $output['playerEmail'];
            $_SESSION['Email'] = $email;
            $phone = $output['playerPhone'];
            $_SESSION['Phone'] = $phone;
        }
    }
    $receipt = "INSERT INTO invoice(gameID,gameTitle,leaderName,leaderEmail,leaderPhone,quantity,totalcost)
    VALUES('".$_SESSION['gameID']."','".$_SESSION['game']."','$name','$email', '$phone','".$_SESSION['participant']."','".$_SESSION['price']."')";
    $conn->query($receipt);
    echo "</br></br>A new record added into the table Invoice successfully."; 

    $getinvoiceID = "SELECT invoiceID from invoice WHERE leaderEmail ='".$email."'";
    $resultinvoice = $conn->query($getinvoiceID);
    if ($resultinvoice -> num_rows > 0){
        while($output = $resultinvoice -> fetch_assoc()){
            $invoiceIDcurrent = $output['invoiceID'];
            $_SESSION['InvoiceID'] = $invoiceIDcurrent;
        }
    }

    echo $exp;

    $creditcarddetail = "INSERT INTO creditcarddetail(CardNumber,invoiceID,CardType,CardExpired,CVV)
    VALUES('$cnum','$invoiceIDcurrent','$cardType','$exp','$cvv')";
    $conn->query($creditcarddetail);
    echo "</br></br>A new record added into the table Creditcarddetail successfully."; 

    $currentdate = date('Y-m-d H:i:s');
    $payment = "INSERT INTO payment(invoiceID,amount_paid,date_paid,method) 
    VALUES('$invoiceIDcurrent','".$_SESSION['price']."','$currentdate','Credit Card')";
    $conn->query($payment);
    echo "</br></br>A new record added into the table Payment successfully."; 

    $conn->close();
    header("Location: receiptcreditcard.php");
    exit();

}


function validateCreditCardType($number){
    $number=preg_replace('/\D/', '', $number);
    $cardtype = array(
        "Visa"       => "/^4[0-9]{12}(?:[0-9]{3})?$/",
        "Mastercard" => "/^5[1-5][0-9]{14}$/",
    );
    
    if ($_POST['CardType'] == "Visa" && preg_match($cardtype['Visa'],$number))
    {
        return true;
    }
    else if ($_POST['CardType'] == "MasterCard" && preg_match($cardtype['Mastercard'],$number))
    {
        return true;
    }
    else {  
        return false;
    }
}

function luhn_check($number) {

  // Strip any non-digits (useful for credit card numbers with spaces and hyphens)
  $number=preg_replace('/\D/', '', $number);

  // Set the string length and parity
  $number_length=strlen($number);
  $parity=$number_length % 2;

  // Loop through each digit and do the maths
  $total=0;
  for ($i=0; $i<$number_length; $i++) {
    $digit=$number[$i];
    // Multiply alternate digits by two
    if ($i % 2 == $parity) {
      $digit*=2;
      // If the sum is two digits, add them together (in effect)
      if ($digit > 9) {
        $digit-=9;
      }
    }
    // Total up the digits
    $total+=$digit;
  }

  // If the total mod 10 equals 0, the number is valid
  return ($total % 10 == 0) ? TRUE : FALSE;

}


?>