<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
session_start();
require 'C:\xampp\htdocs\integration\View\front\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\integration\View\front\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\integration\View\front\phpmailer\src\SMTP.php';
include 'C:\xampp\htdocs\integration\controller\clientC.php';
require('config2.php');
$email = $_SESSION['em'];
$mdp = $_SESSION['md'];
$code = $_SESSION['rand'];

if(isset($_POST['submit']))
{ 
   if(isset($_POST['code']))
   
    {
        if($code==$_POST['code']){
        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true ;
        $mail->Username = 'ghalia.abdelkebir@esprit.tn' ;
        $mail->Password = 'tpyfsbgmjbgcfhif' ;
        $mail->SMTPSecure = 'ssl' ;
        $mail->Port = 465 ;


        $mail->SetFrom('ghalia.abdelkebir@esprit.tn') ;

        $mail->AddAddress($email) ;

        $mail->isHTML(true) ;

        $mail->Subject = "recuperation mot de passe" ;
        $mail->Body = $mdp ;

        $mail->send() ;
        session_destroy();
        header("location:login.php");
    }
    else{
        header("location:oublie.php");
    }
}

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login & Registration Form </title>
  
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
  
    <input type="checkbox" id="check">
    <div class="login form">
      <header>ENTER CODE</header>
               <form method="POST" action="" >
                <input type="number" name="code" placeholder="Enter code recieved" class="form-control">
                <input type="submit" name="submit" class="button" value="valider">


    </form> 
    </div>

  </div>
  <script src="test.js"></script>
</body>
</html>
