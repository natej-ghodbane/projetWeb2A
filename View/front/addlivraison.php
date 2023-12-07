<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
include 'C:/xampp/htdocs/projetWeb2A/controller/LivraisonC.php';
include 'C:/xampp/htdocs/projetWeb2A/model/Livraison.php';
require 'C:\xampp\htdocs\projetWeb2A\View\front\phpmailer\PHPMailer\src\Exception.php';
require 'C:\xampp\htdocs\projetWeb2A\View\front\phpmailer\PHPMailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\projetWeb2A\View\front\phpmailer\PHPMailer\src\SMTP.php';

$error = "";


$livraison = null;



$livraisonR = new LivraisonC();
if (
    isset($_POST["adresse"]) &&
    isset($_POST["statut"])
) {
    if (
        !empty($_POST["adresse"]) &&
        !empty($_POST["statut"])
    ) {
        $livraison = new Livraison(
            null,
            $_POST['adresse'],
            $_POST['statut']
        );
        $livraisonR->addLivraison($livraison);
        if(isset($_POST["submit"])){
          $email=$_POST["email"];
          $mail = new PHPMailer(true);

          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'elyess.zormati@esprit.tn';
          $mail->Password = 'mgcuwixdieguquqx'; // Use App Password if using 2-step verification
          $mail->SMTPSecure = 'tls'; // Use TLS instead of SSL
          $mail->Port = 587; // TLS port
      
          $mail->setFrom('elyess.zormati@esprit.tn');
      
          // Check if the email key is set in the POST data
      
              $mail->addAddress($email);
      
              $mail->isHTML(true);
      
              $mail->Subject = "livraison recue";
              $mail->Body = " votre livraison est traitée";
      
              $mail->send();
              header('Location:listLivraison.php');
        }
       
        
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="css.css" />
    <title>ajout</title>
    <style>
        * {
          box-sizing: border-box;
        }
        
        input[type=text], select, textarea {
          width: 100%;
          padding: 12px;
          border: 1px solid #ccc;
          border-radius: 4px;
          resize: vertical;
        }
        
        label {
          padding: 12px 12px 12px 0;
          display: inline-block;
        }
        
        input[type=submit] {
          background-color: #123132;
          color: white;
          padding: 12px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          float: right;
        }
        
        input[type=submit]:hover {
          background-color: #ddd;
        }
        
        .container {
          border-radius: 5px;
          background-color: #f2f2f2;
          padding: 20px;
        }
        
        .col-25 {
          float: left;
          width: 25%;
          margin-top: 6px;
        }
        
        .col-75 {
          float: left;
          width: 75%;
          margin-top: 6px;
        }
        
        /* Clear floats after the columns */
        .row::after {
          content: "";
          display: table;
          clear: both;
        }
        
        /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
        @media screen and (max-width: 600px) {
          .col-25, .col-75, input[type=submit] {
            width: 100%;
            margin-top: 0;
          }
        }
        </style>
</head>

<header>

<div class="header">
    <a href="index.html" class="logo"><img src="images/logo.png" alt=""></a>
    <div class="header-right">
      <a href="index.html">Home</a>
      <a href="blog.html">BLOG</a>
      <a href="login.html">Se Connecter</a>
      <a href="panier.html" class="fas fa-shopping-cart"></a>
      <a href="reclamation.html" class="fas fa-headphones"></a>
    </div>
  </div>
  
</header>
<br>



<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>livraison</title>
</head>

<body>
    
    

    <div id="error">
        <?php echo $error; ?>
    </div>
    <h1>formulaire livraison</h1>

    <form action="" method="POST" >


        <table>
           
            <tr>
                <td><label for="adresse"  >AdresseLivraison</label></td>
                <td>
                   <input type="text" name="adresse" > 
                    
                </td>
            </tr>
            <tr>
              
            <td><label for="mail">mail</label></td>
            <td><input type="email" name="email"></td>
              
            </tr>
            <tr>
                <td><label for="statut">StatutLivraison</label></td>
                <td><input type="text" id="statut" name="statut" value="non livrée" /></td>
                
            </tr>
            <tr>
            <td><input type="submit" value="valider" name="submit"></td>
            </tr>
      
        </table>

    </form>
</body>
<footer>
  <script src="livraison.js"></script>
</footer>

</html>