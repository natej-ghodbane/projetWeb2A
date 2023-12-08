<?php

include "../../controller/rec.php";

$rec=new reclamation();
$rec->addreclamation();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


require 'C:\xampp\htdocs\projetWeb2A\View\front\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\projetWeb2A\View\front\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\projetWeb2A\View\front\phpmailer\src\SMTP.php';

if (isset($_POST["send"])) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true ;
    $mail->Username = 'douaa.benjebara@esprit.tn' ;
    $mail->Password = 'utop ghdx yswd ecdy' ;
    $mail->SMTPSecure = 'ssl' ;
    $mail->Port = 465 ;


    $mail->SetFrom('douaa.benjebara@esprit.tn') ;

    $mail->AddAddress($_POST["email"]) ;

    $mail->isHTML(true) ;

    $mail->Subject = 'MediMart/Reclamation' ;
    $mail->Body = 'Votre réclamation a été bien reçue. Vous recevrez une réponse dans les 48 heures.' ;

    $mail->send() ;

}

header('Location:reclamation.html');
?>

