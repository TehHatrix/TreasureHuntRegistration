<?php
session_start();
$name = $gender = $email =  "";
$phone = 0;
$_SESSION['link'] = "cashcheckout.php";

if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if (empty($_POST["name"]) || is_numeric($_POST['name']) == 1) { 
        echo 'Please put your name properly!';
        $_SESSION["Error"] = "Please put your name properly!";
        header("Location: error.php");
        exit(); 
        return false;
    }
    else {
        $name = $_POST["name"];
        $_SESSION["Leadername"] = $name;
    }
    if (empty($_POST["gender"])) { 
        echo 'Please choose your gender properly!';
        $_SESSION["Error"] = "Please choose your gender properly!";
        header("Location: error.php");
        exit(); 
        return false;
    }
    else {
        $gender = $_POST["gender"];
        $_SESSION["LeaderGender"] = $gender;
    }

    if (empty($_POST['phone']) ){
        echo 'Please put your phone properly!';
        $_SESSION["Error"] = "Please put your phone properly!";
        header("Location: error.php");
        exit(); 
        return false;
    }
    else {
        $phone = $_POST['phone'];
        $_SESSION["LeaderPhone"] = $phone;
    }

    if (empty($_POST["email"]) ) { 
        echo 'Please put your email properly!';
        $_SESSION["Error"] = "Please put your email properly!";
        header("Location: error.php");
        exit(); 
        return false;
    }
    else {
        $email = $_POST["email"];
        $_SESSION["LeaderEmail"] = $email;
    }
include_once('config.php');
// $validity = "SELECT * FROM invoice WHERE leaderEmail='".$email."'";
// $checksql =  $conn->query($validity); //To Check if there are record existed in the database
// if ($checksql -> num_rows > 0){
//     echo "</br></br>Email already exists in the Database. Please choose another Email. </br></br> ";
// }
    $sql = "INSERT INTO invoice(gameID,gameTitle,leaderName,leaderEmail,leaderPhone,quantity,totalcost) 
    VALUES('".$_SESSION['gameID']."','".$_SESSION['game']."','$name','$email', '$phone','".$_SESSION['participant']."','".$_SESSION['price']."')"; 
    $conn->query($sql);
    echo "</br></br>A new record added into the database successfully."; 
    $getinvoiceID = "SELECT invoiceID from invoice WHERE leaderEmail ='".$email."'";
    $resultinvoice = $conn->query($getinvoiceID);
    if ($resultinvoice -> num_rows > 0){
        while($output = $resultinvoice -> fetch_assoc()){
            $invoiceIDcurrent = $output['invoiceID'];
            $_SESSION['InvoiceID'] = $invoiceIDcurrent;
        }
    }
    $currentdate = date('Y-m-d H:i:s');
    $sql2 = "INSERT INTO payment(invoiceID,amount_paid,date_paid,method) VALUES('$invoiceIDcurrent','".$_SESSION['price']."','$currentdate','Cash')";
    $conn->query($sql2);

    $conn->close();
    header("Location: invoice.php");
    exit();
}


    // echo "</></br> Connection to Database ". $databaseName." are now closed!";
?>