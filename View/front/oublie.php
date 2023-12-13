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
if(isset($_POST['submit']))
{ 
  $rand = rand(9999,1000);
    $email=$_POST['Email2'];
    $sql = "SELECT Motdepasse FROM utilisateur WHERE Email='$email'";
    $db = config::getConnexion();
    $query = $db->prepare($sql);
    $query->execute();
    $res=$query->fetch(PDO::FETCH_ASSOC);
    $motdepasse = $res['Motdepasse'];

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
    $mail->Body = $rand ;
    $_SESSION['rand']=$rand;
    $_SESSION['md']=$motdepasse;
    $_SESSION['em']=$email;
    $mail->send() ;
    header('location:code.php');

    
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
      <header>recupere mot de passe</header>
               <form method="POST" action="" >
                         <input type="email" name="Email2" placeholder="Enter your Email" class="form-control">
        <a href="login.php">login </a> 
         <input type="submit" name="submit" class="button" value="recuperer">


    </form> 
    </div>

  </div>
  <script src="test.js"></script>
</body>
</html>
