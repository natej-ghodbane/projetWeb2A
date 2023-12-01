<?php

include '../../Controller/ClientC.php';
include 'C:\xampp\htdocs\projet\Model\Client.php';
$error = "";

// create client
$client = null;

// create an instance of the controller
$clientC = new ClientC();
if (
    isset($_POST["id"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["Motdepasse"]) &&
   /* isset($_POST["Motdepasse1"]) &&*/
    isset($_POST["Email"])&&
    isset($_POST["Adresse"])&&
    isset($_POST["Occupation"])
) {
    if (
        !empty($_POST["id"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["Motdepasse"]) &&
       /* !empty($_POST["Motdepasse1"]) &&*/
        !empty($_POST["Email"])&&
        !empty($_POST["Adresse"]) &&
        !empty($_POST["Occupation"])

    ) {
        $client = new Client(
            $_POST['id'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['Motdepasse'],
          /*  $_POST['Motdepasse1'],*/
            $_POST['Email'],
            $_POST['Adresse'],
            $_POST['Occupation'],
           
        );
        $clientC->updateClient($client, $_POST["id"]);
        header('Location:index.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>

<body>
    <button><a href="index.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>



<div class="registration form">
      <header>Signup</header>
      <form action="" method="POST" onsubmit="return test()">
      
      <?php
    if (isset($_POST['id'])) {
        $client = $clientC->showClient($_POST['id']);}

    ?>
        <input type="text" name="id" id="id" placeholder="Client ID" readonly value=" <?php echo $client['id']; ?>">
        <input type="text" name="nom" id="nom" placeholder="Enter your FirstName" value=" <?php echo $client['nom']; ?>">
        <input type="text" name="prenom" id="prenom" placeholder="Enter your LastName"value=" <?php echo $client['prenom']; ?>">
        <input type="password" name="Motdepasse" id="Motdepasse" placeholder="Create a password"value=" <?php echo $client['Motdepasse']; ?>">
        <!-- <input type="password"name="Motdepasse1"  id= "Motdepasse1" placeholder="Confirm your password">  -->
        <input type="text" name="Email" id="Email" placeholder="Enter your email"value=" <?php echo $client['Email']; ?>">
        <input type="text" name="Adresse" id="Adresse" placeholder="Enter your adress"value=" <?php echo $client['Adresse']; ?>">
        <input type="Occupation" name="Occupation" id="Occupation" placeholder="Enter your occupation "value=" <?php echo $client['Occupation']; ?>">
        <input type="submit"  value="Update">
      </form>
      </div>
    <?php
    
    ?>
</body>

</html>