<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

$email=$_POST['email'];




try {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'elyess.zormati@esprit.tn';
    $mail->Password = 'trylvzxmdxkdnjvnv'; // Use App Password if using 2-step verification
    $mail->SMTPSecure = 'ssl'; // Use TLS instead of SSL
    $mail->Port = 465; // TLS port

    $mail->setFrom('elyess.zormati@esprit.tn');

    // Check if the email key is set in the POST data

        $mail->addAddress($email);

        $mail->isHTML(true);

        $mail->Subject = "livraison recue";
        $mail->Body = "livraison traitée";

        $mail->send();
        header("location:listLivraison.php");

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

