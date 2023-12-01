

<?php
session_start();

//require('C:\xampp\htdocs\projet\config.php');
include 'C:\xampp\htdocs\projetghalia\projet\Controller\clientC.php';
include '../../Model/Client.php';
require_once('config2.php');
$db=config::getConnexion();

   
if (isset($_SESSION['Email'])) {
  header('Location:indexx.php');
 exit();
      
}else if($_POST['submit']){



    
          $Email = $_POST['Email2'];
          $Motdepasse = $_POST['Motdepasse2'];
 
          if(filter_var($Email, FILTER_VALIDATE_EMAIL))
          {
               //$sql = "SELECT * FROM utilisateur WHERE Email = :E mail ";
               $res=clientC::listClients($db);
              
               foreach($res as $t){
                if($t["Email"]==$_POST["Email2"] && $t["Motdepasse"]==$_POST["Motdepasse2"]){
                    
                  $_SESSION['id']=$t['id'];
                       
                 
                   
                    $_SESSION['Email']=$_POST["Email2"];
                    header("location:dashboard.php");
                   
                }
            }
               
               echo "Email ou motdepasse invalid ";
          }
         
 
        }

$error = "";


$client = null;


$clientC = new ClientC();
if (
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["Motdepasse"]) &&
    isset($_POST["Motdepasse1"]) &&
    isset($_POST["Email"]) &&
    isset($_POST["Adresse"])&&
    isset($_POST["Occupation"]) 

) {
    if (
        !empty($_POST['nom']) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["Motdepasse"]) &&
        !empty($_POST["Motdepasse1"]) &&
        !empty($_POST["Email"]) &&
        !empty($_POST["Adresse"]) &&
        !empty($_POST["Occupation"]) 
       
    ) {
        $client = new Client(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['Motdepasse'],
           /* $_POST['Motdepasse1'],*/
            $_POST['Email'],
            $_POST['Adresse'],
            $_POST['Occupation'],
    
        );
        $clientC->addClient($client);
        header('Location:index.html');
    } else
        $error = "Missing information";

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
      <header>Login</header>
      



      <?php 
                    if(isset($errors) && count($errors) > 0)
                    {
                         foreach($errors as $error_msg)
                         {
                              echo '<div class="alert alert-danger">'.$error_msg.'</div>';
                         }
                    }
               ?>
               <form method="POST" action="" >
                         <input type="text" name="Email2" placeholder="Enter Email" class="form-control">
                         <input type="password" name="Motdepasse2" placeholder="Enter Password" class="form-control">
    
        <a href="">Forgot password?</a> 
         <input type="submit" name="submit" class="button" value="Login">


    </form> 

      <div class="signup">
          Don't have an account?
         <label for="check">Signup</label>
      </div>
    </div>


    <div class="registration form">
      <header>Signup</header>
      <form action="" method="POST" onsubmit="return test()" >
        <input type="text" name="nom" id="nom" placeholder="Enter your FirstName">
        <input type="text" name="prenom" id="prenom" placeholder="Enter your LastName">
        <input type="password" name="Motdepasse" id="Motdepasse" placeholder="Create a password">
        <input type="password" name="Motdepasse1" id="Motdepasse1" placeholder="Create a password">
        <input type="text" name="Email" id="Email" placeholder="Enter your email">
        <input type="text" name="Adresse" id="Adresse" placeholder="Enter your adress">
        <!-- <select name = "Occupation">
          <option value="client">client</option>
          <option value="livreur">livreur</option>
          </select> -->
        <input type="Occupation" name="Occupation" id="Occupation" placeholder="Enter your occupation ">
        <input type="submit" class="button" value="Signup">
      </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>
  <script src="test.js"></script>
</body>
</html>
